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
        $title =  'Welcome to admin page!';
        return view('pages.admin')->with('title', $title);
    }
    public function users(){
        $title =  'Welcome to users page!';
        return view('pages.users')->with('title', $title);
    }
}
