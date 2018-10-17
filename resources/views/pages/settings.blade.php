@extends('layouts.app')
@section('content')
    <div class="container">
    <h1>{{$title}}</h1>
    {!! Form::open(['action' => ['PagesController@update', Auth::user()], 'method' => 'POST' ]) !!}
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <p>Your name:</p>
            {{ Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Your new Name']) }}
            @if ($errors->has('name'))
                <span class="class-block">
                    {{$errors->first('name')}}
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
            <p>Your surname:</p>
            {{ Form::text('surname', $user->surname, ['class' => 'form-control', 'placeholder' => 'Your new Surname']) }}
            @if ($errors->has('surname'))
                <span class="class-block">
                    {{$errors->first('surname')}}
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <p>Your email:</p>
            {{ Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Your new Email']) }}
            @if ($errors->has('email'))
                <span class="class-block">
                    {{$errors->first('email')}}
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
            <p>Your phone:</p>
            {{ Form::text('phone', $user->phone, ['class' => 'form-control', 'placeholder' => 'Your new Phone']) }}
            @if ($errors->has('phone'))
                <span class="class-block">
                    {{$errors->first('phone')}}
                </span>
            @endif
        </div>
        <hr>
        {{Form::hidden('_method', 'PUT')}}
        <div class="form-group">
            {{ Form::submit('Potvrdite', ['class' => 'btn btn-primary']) }}
        </div>
        
        {{ csrf_field() }}
    {!! Form::close() !!}
    
    {!! Form::open(['action' => ['PagesController@destroy', Auth::user()], 'method' => 'POST']) !!}
        <div class="form-group">
            {{ Form::submit('Obrišite račun', ['class' => 'btn btn-danger']) }}
        </div>
        {{Form::hidden('_method', 'DELETE')}}
    {!!Form::close()!!}
    </div>
    @endsection
        
