@extends('layouts.app')
@section('content')
    <div class="container">
    <h1>{{$title}}</h1>
    {!! Form::open(['action' => 'PagesController@form', 'method' => 'POST' ]) !!}
        @include('pages.adminForma')
    {!! Form::close() !!}
    </div>
    @endsection
        
