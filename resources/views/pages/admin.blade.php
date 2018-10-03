@extends('layouts.app')
@section('content')
    <div class="container">
    <h1>{{$title}}</h1>
    <p>{{$paragraf}}</p>
    @if (count($korisnici) > 0)
    <ul>
        @foreach ($korisnici as $korisnik)
            <li>{{$korisnik}}</li>
        @endforeach
    </ul>
    </div>
@endif
@endsection