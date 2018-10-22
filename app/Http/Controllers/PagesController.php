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
            // 'korisnici' => array((object)$korisnik_1, (object)$korisnik_2, (object)$korisnik_3, (object)$korisnik_4),
            'korisnici' => $korisnici);
            return view('pages.admin')->with($data);
            }
            $data = array(
                // 'title' => 'Logged in as user N.N',
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
        // Zadatak: (riješeno)
        // $korisnik_1 = ['ime'=>'Pero', 'prezime'=>'Perić', 'tel'=>'0312456798'];
        // $korisnik_2 = ['ime'=>'Zvonko', 'prezime'=>'Zvonimirović', 'tel'=>'0312456798'];
        // $korisnik_3 = ['ime'=>'Zdenko', 'prezime'=>'Zdenković', 'tel'=>'0312456798'];
        // $korisnik_4 = ['ime'=>'Ivica', 'prezime'=>'Ivković', 'tel'=>'0312456798'];
        // -----------------------------------------------------------
        // Novi zadatak: iz databaze se povlace podatci
        $korisnici = User::all(); //možda je bolje User::get(); jer se može mijenjati.
        $data = array(
            'title' => 'Logged in as admin',
            'paragraf' => 'Registrirani korisnici:',
            // 'korisnici' => array((object)$korisnik_1, (object)$korisnik_2, (object)$korisnik_3, (object)$korisnik_4),
            'korisnici' => $korisnici
        );
        $data = $data;
        // dump($data);
        // dd($data);
        return view('pages.admin')->with($data);
    }
    public function users(){
        
        $korisnici = User::all();
        $data = array(
            // 'title' => 'Logged in as user N.N',
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
            // 'korisnici' => array((object)$korisnik_1, (object)$korisnik_2, (object)$korisnik_3, (object)$korisnik_4),
            'korisnici' => $korisnici,
            'title' => 'Form',
        );
        $user = User::create($request->all());
        return back()->with($data);
    }
    public function save_data(StoreBlogPost $request){  
        // dd($request->User);
        
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
    public function destroy(){
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
    
}