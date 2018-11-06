@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Logged in as {{Auth::user()->name}} {{Auth::user()->surname}}</h1>
        <h3>{{$paragraf}}</h3>
        <ul>
            <li>Phone: {{Auth::user()->phone}}</li>
            <li>Email: {{Auth::user()->email}}</li>
        </ul>
        <hr>
    </div>
    @endsection