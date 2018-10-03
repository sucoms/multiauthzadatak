@extends('layouts.app')
@section('content')
    <div class="container">
    <h1>{{$title}}</h1>
    <h3>{{$paragraf}}</h3>
    @if (count($podatak) > 0)
    <ul>
        @foreach ($podatak as $podatci)
            <li>{{$podatci}}</li>
        @endforeach
    </ul>
    @endif
    </div>
    @endsection