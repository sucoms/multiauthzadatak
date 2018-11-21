<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Http\Requests\StoreBlogPost;
use App\Http\Requests\UpdateUserData;
use Hash;
use Auth;
use Flash;
use Redirect;
use DB;

class PagesController extends Controller
{
            
    /**
     * Index metoda otvaranja početne stranice admina/korisnika
     *
     * Otvara stranicu ovisno o tome tko je ulogiran
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory view
     */
    public function index()
    {
        // $user = User::find(1);
        // $role = Role::find(1);
        // $user->roles()->detach($role);
        // dd($user->roles);
        $korisnici = User::all();
        $user = Auth::User();
        if ($user) {
            if ($user->IsAdmin()) {
                $data = array(
                'title' => 'Logged in as admin',
                'paragraf' => 'Registrirani korisnici:',
                'korisnici' => $korisnici,
                'modal' => 'Želite li uistinu obrisati korisnika?');
                    return view('pages.admin')->with($data);
            }
            $data = array(
                'paragraf' => 'Podatci korisnika:',
                'podatak' => ['Email: n.n.@test.com', 'Phone: 0123456789'],
                'korisnici' => $korisnici
            );
            return view('pages.users')->with($data);
        }
        $data =  array(
            'title' => 'Dobrodošli,',
            'title2' => 'da biste nastavili, ulogirajte se!',
            'login' => 'Login',
            'register' => 'Register'
            
        );
        return view('pages.index')->with($data);
    }
            
    /**
     * Admin metoda otvaranja početne stranice admina
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory view
     */
    public function admin()
    {
        $korisnici = User::all();
        $data = array(
            'title' => 'Ulogirani ste kao admin.',
            'paragraf' => 'Registrirani korisnici:',
            'korisnici' => $korisnici,
            'modal' => 'Želite li uistinu obrisati korisnika?'
        );
        return view('pages.admin')->with($data);
    }
        
    /**
     * Users metoda otvaranja početne stranice korisnika
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory view
     */
    public function users()
    {
        $korisnici = User::all();
        $data = array(
            'paragraf' => 'Podatci korisnika:',
            'podatak' => ['Email: n.n.@test.com', 'Phone: 0123456789'],
            'korisnici' => $korisnici
        );
        return view('pages.users')->with($data);
    }
    
    /**
     * Form metoda registriranja korisnika
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory view
     */
    public function form()
    {
        $data = array(
            'title' => 'Form',
        );
        return view('pages.form')->with($data);
    }
        
    /**
     * adminForma metoda kreiranja korisnika
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Http\Requests\StoreBlogPost
     *
     * @return \Illuminate\Http\RedirectResponse back
     */
    public function adminForma(StoreBlogPost $request)
    {
        $korisnici = User::all();
        $data = array(
            'title' => 'Logged in as admin',
            'paragraf' => 'Registrirani korisnici:',
            'korisnici' => $korisnici,
            'title' => 'Form',
            'modal' => 'Želite li uistinu obrisati korisnika?'
        );
        $user = User::create($request->all());
        $r = Role::find(2);
        $user->roles()->attach($r);
        return back()->with($data);
    }
    
    /**
     * Save_data metoda spremanja korisnika u bazu
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Http\Requests\StoreBlogPost
     *
     * @return \Illuminate\Http\RedirectResponse route(login)
     */
    public function save_data(StoreBlogPost $request)
    {
        $user = User::create($request->all());
        $r = Role::find(2);
        $user->roles()->attach($r);
        return redirect()->route('login');
    }

    /**
     * Settings metoda promjena postavki korisnika
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory view
     */
    public function settings()
    {
        $user = Auth::user();
        $data = array(
            'title' => 'Settings',
            'user' => $user
        );
        return view('pages.settings')->with($data);
    }

    /**
     * Update metoda ažuriranja podataka korisnika
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Http\Requests\UpdateUserData
     *
     * @return \Illuminate\Http\RedirectResponse back
     */
    public function update(UpdateUserData $request)
    {
        $user = Auth::user();
        $user->update($request->all());
        $data = array(
            'user' => $user
        );
        return redirect()->back();
    }

    /**
     * Destroy metoda brisanja korisnika
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory view
     */
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $loged_in_user = User::findOrFail(Auth::user()->id);
            $user = User::findOrFail($request->get('id'));
            if ($loged_in_user->IsAdmin()) {
                if ($user->delete()) {
                    $data = User::all();
                    return json_encode($this->generateUserTable($data));
                }
            }
        }

        $user = Auth::user();
        Auth::logout();
        if ($user->delete()) {
            $data = array(
                'title' => 'Dobrodošli,',
                'title2' => 'da biste nastavili, ulogirajte se!',
            );
            return view('pages.index')->with($data);
        }
    }
    
    /**
     * Action metoda očitavanja korisnika na admin stranici
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return generateUserTable $data
     */
    public function action(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->get('query');
            if ($query != '') {
                $data = User::where('surname', 'like', '%'.$query.'%')
                    ->orWhere('name', 'like', '%'.$query.'%')
                    ->orWhere('phone', 'like', '%'.$query.'%')
                    ->orderBy('id')
                    ->get();
            } else {
                $data = User::orderBy('id')
                    ->get();
            }
            return json_encode($this->generateUserTable($data));
        }
    }

    public function postUserRole(Request $request)
    {
        if ($request->ajax()) {
            $loged_in_user = User::findOrFail(Auth::user()->id);
            $user = User::findOrFail($request->get('id'));
            $r1 = Role::find(1);
            $r2 = Role::find(2);
            if ($loged_in_user->IsAdmin()) {
                if ($request->get('admin_role')==1) {
                    $user->roles()->attach($r1);
                } else {
                    $user->roles()->detach($r1);
                }
                if ($request->get('korisnik_role')==1) {
                    $user->roles()->attach($r2);
                } else {
                    $user->roles()->detach($r2);
                }
            }
            $data = User::all();
            return json_encode($this->generateUserTable($data));
        }
    }
    
    /**
     * GenerateUserTable metoda očitavanja korisnika u tablici na admin stranici
     *
     * @param  $data
     *
     * @return array
     */
    public function generateUserTable($data)
    {
        // return User::find(5)->roles;
        $total_row = $data->count();
        $output = "";
        if ($total_row > 0) {
            foreach ($data as $row) {
                $roleNames = '';
                $userRoles = $row->roles()->pluck('id')->toArray();
                foreach (Role::all() as $roles1) {
                    $checked = '';
                // var_dump($userRoles);
                // var_dump($roles1->id);
                        // var_dump($roles1);
                    if (in_array($roles1->id, $userRoles, true)) {
                        $checked = 'checked="checked"';
                    }
                    $roleNames .= $roles1->role != null ? $roles1->role.' '.'<input type="checkbox" '.$checked.' name="role" value="'.$roles1->id.'" class="checkbox'.$roles1->id.'" id="'.$roles1->id.'">'.' ' : '';
                }
                        
                $output .= '
                    <tr>
                        <td>'.$row->surname.'</td>
                        <td>'.$row->name.'</td>
                        <td>'.$row->phone.'</td>
                        <td>'.$roleNames.'</td>
                        <td><button type="button" id="potvrdi" class="potvrdi-button btn btn-primary" data-id="'.$row->id.'">
                        <div class="potvrdi">Potvrdi</div>
                        </button></td>
                        <td><button type="button" id="rowId" class="remove-button btn btn-danger" data-id="'.$row->id.'">
                        <div class="close">&#120;</div>
                        </button></td>
                    </tr>
                ';
            }
        } else {
            $output = '
                <tr>
                    <td align="center" colspan="5">Nema podataka</td>
                </tr>
            ';
        }
        return array(
            'table_data'  => $output,
            'total_data'  => $total_row,
        );
    }
}
