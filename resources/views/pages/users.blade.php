@extends('layouts.app')
@section('content')
    <div class="container">
    {{-- @unless (Auth::check())
        You are not signed in. (da se ne zaboravi za svaki slucaj nek bude tu)
    @endunless --}}

    {{-- Ucitava podatke korisnika --}}
    <h1>Logged in as {{Auth::user()->name}} {{Auth::user()->surname}}</h1>
    <h3>{{$paragraf}}</h3>

    <ul>
            <li>Phone: {{Auth::user()->phone}}</li>
            <li>Email: {{Auth::user()->email}}</li>
    </ul>
    <hr>

    </div>
    @endsection