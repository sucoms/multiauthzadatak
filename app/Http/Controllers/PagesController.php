<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\StoreBlogPost;
use App\Http\Requests\UpdateUserData;
use Hash;
use Auth;
use Flash;
use Redirect;
use DB;


class PagesController extends Controller
{   
    public function index(){
        $korisnici = User::all();
        $user = Auth::User();
        if($user){
        if ($user->IsAdmin()){
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
    public function admin(){
        $korisnici = User::all(); 
        $data = array(
            'title' => 'Ulogirani ste kao admin.',
            'paragraf' => 'Registrirani korisnici:',
            'korisnici' => $korisnici,
            'modal' => 'Želite li uistinu obrisati korisnika?'
        );
        return view('pages.admin')->with($data);
    }
    public function users(){
        $korisnici = User::all();
        $data = array(
            'paragraf' => 'Podatci korisnika:',
            'podatak' => ['Email: n.n.@test.com', 'Phone: 0123456789'],
            'korisnici' => $korisnici
        );
        return view('pages.users')->with($data);
    }
    public function form(){
        $data = array(
            'title' => 'Form',
        );
        return view('pages.form')->with($data);
    }
    public function adminForma(StoreBlogPost $request){
        $korisnici = User::all();
        $data = array(
            'title' => 'Logged in as admin',
            'paragraf' => 'Registrirani korisnici:',
            'korisnici' => $korisnici,
            'title' => 'Form',
            'modal' => 'Želite li uistinu obrisati korisnika?'
        );
        $user = User::create($request->all());
        return back()->with($data);
    }
    public function save_data(StoreBlogPost $request){
        $user = User::create($request->all());
        return redirect()->route('login');
    }
    public function settings(){
        $user = Auth::user();
        $data = array(
            'title' => 'Settings',
            'user' => $user
        );
        return view('pages.settings')->with($data);
    }
    public function update(UpdateUserData $request){
        $user = Auth::user();
        $user->update($request->all());
        $data = array(
            'user' => $user
        );
        return redirect()->back();
    }

    public function destroy(Request $request){
        if($request->ajax()){
            $loged_in_user = User::findOrFail(Auth::user()->id);
            $user = User::findOrFail($request->get('id'));
            if ($loged_in_user->IsAdmin()){
                if($user->delete()){
                    $data = DB::table('users')->orderBy('id')->get();
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
    
    public function action(Request $request){        
        if($request->ajax()){
            $query = $request->get('query');
            if($query != ''){
                $data = DB::table('users')
                    ->where('surname', 'like', '%'.$query.'%')
                    ->orWhere('name', 'like', '%'.$query.'%')
                    ->orWhere('phone', 'like', '%'.$query.'%')
                    ->orderBy('id')
                    ->get();
            }else {
                $data = DB::table('users')
                    ->orderBy('id')
                    ->get();
            }            
            return json_encode($this->generateUserTable($data));           
        }
    }

    public function generateUserTable($data){
        $total_row = $data->count();
        $output = "";
        if($total_row > 0){
            foreach($data as $row){
                $output .= '
                    <tr>
                        <td>'.$row->surname.'</td>
                        <td>'.$row->name.'</td>
                        <td>'.$row->phone.'</td>
                        <td><button type="button" id="rowId" class="remove-button btn btn-danger" data-id="'. $row->id .'">
                        <div class="close">&#120;</div>
                        </button></td>
                    </tr>
                ';
            }
        }else{
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