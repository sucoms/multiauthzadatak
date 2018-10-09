@extends('layouts.app')
@section('content')
    <div class="container">
    <h1>{{$title}}</h1>
    <h2>{{$title2}}</h2>
    {{-- 
        Login jumbotron jednog dana
    --}}
    {{-- <form>
        <input type="button" value="{{$login}}" onclick="window.location.href='/login'" />
        <input type="button" value="{{$register}}" onclick="window.location.href='/register'" />
    </form> --}}
    </div>
    @endsection
        
