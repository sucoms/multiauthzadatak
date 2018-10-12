@extends('layouts.app')
@section('content')
    <div class="container">
    <h1>{{$title}}</h1>
    {!! Form::open(['action' => 'PagesController@form', 'method' => 'POST' ]) !!}
        <div class="form-group">
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name']) }}
        </div>
        <div class="form-group">
            {{ Form::label('surname', 'Surname:') }}
            {{ Form::text('surname', '', ['class' => 'form-control', 'placeholder' => 'Surname']) }}
        </div>
        <div class="form-group">
            {{ Form::label('email', 'Email:') }}
            {{ Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Email']) }}
        </div>
        <div class="form-group">
            {{ Form::label('password', 'Password:') }}
            {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}
        </div>
        <div class="form-group">
            {{ Form::label('phone', 'Phone:') }}
            {{ Form::text('phone', '', ['class' => 'form-control', 'placeholder' => 'Phone']) }}
        </div>
        <div class="form-group">
            {{ Form::submit('Submit', ['class' => 'btn btn-secondary']) }}
        </div>
    {!! Form::close() !!}
    </div>
    @endsection
        
