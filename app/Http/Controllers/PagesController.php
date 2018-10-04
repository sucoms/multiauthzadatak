<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $data =  array(
            'title' => 'Dobrodošli,',
            'title2' => 'da biste nastavili, ulogirajte se!',
            'login' => 'Login',
            'register' => 'Register'
        );
        return view('pages.index')->with($data);
    }
    public function admin(){
        // Zadatak:
        $korisnik_1 = ['ime'=>'Pero', 'prezime'=>'Perić', 'tel'=>'0312456798'];
        $korisnik_2 = ['ime'=>'Zvonko', 'prezime'=>'Zvonimirović', 'tel'=>'0312456798'];
        $korisnik_3 = ['ime'=>'Zdenko', 'prezime'=>'Zdenković', 'tel'=>'0312456798'];
        $korisnik_4 = ['ime'=>'Ivica', 'prezime'=>'Ivković', 'tel'=>'0312456798'];
        $data = array(
            'title' => 'Logged in as admin',
            'paragraf' => 'Registrirani korisnici:',
            'korisnici' => ['N.N.', 'M.M.', 'B.B.'],
            'korisnik_1' => $korisnik_1,
            'korisnik_2' => $korisnik_2,
            'korisnik_3' => $korisnik_3,
            'korisnik_4' => $korisnik_4
        );
        return view('pages.admin')->with($data);
    }
    public function users(){
        $data = array(
            'title' => 'Logged in as user N.N',
            'paragraf' => 'Podatci korisnika:',
            'podatak' => ['Email: n.n.@test.com', 'Phone: 0123456789']
        );
        return view('pages.users')->with($data);
    }
}
