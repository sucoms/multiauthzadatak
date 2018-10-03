<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $data =  array(
            'title' => 'Dobrodošli,',
            'title2' => 'da biste nastavili, ulogirajte se!'
        );
        return view('pages.index')->with($data);
    }
    public function admin(){
        $data = array(
            'title' => 'Logged in as admin',
            'paragraf' => 'Registrirani korisnici:',
            'korisnici' => ['N.N.', 'M.M.', 'B.B.']
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
