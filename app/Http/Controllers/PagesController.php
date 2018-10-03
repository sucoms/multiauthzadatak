<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title =  'Welcome to index page!';
        return view('pages.index')->with('title', $title);
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
        $title =  'Logged in as user!';
        return view('pages.users')->with('title', $title);
    }
}
