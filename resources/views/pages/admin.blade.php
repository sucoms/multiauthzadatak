@extends('layouts.app')
@section('content')
     <style>
        .modal-content{
            width: 500px;
            height: 200px;
            background-color: #F5F5F5;
            border-radius: 4px; 
            text-align: center;
            padding: 20px;
            position: relative;
        }
        .remove-button{
            height:25px;
            width:25px;
            position: relative;
            left: 40%;
            right: -60%;
        }
        .close{
            position: absolute;
            top: 0;
            right: -50%;
            left: -50%;
            color: #ffffff;
            opacity: 10;
            font-size: 20px;
        }
        .modal-backdrop.fade{
            opacity: 0.5!important;
        }
        .fade:not(.show){
            opacity: 1;
        }
    </style>
    <div class="container">
        <h1>{{$title}}, {{Auth::user()->name}} {{Auth::user()->surname}}.</h1>
        <h3>{{$paragraf}}</h3>

        <hr>

        @include('pages.live_search')
        
        <hr>
        
        <h1>Dodaj novog korisnika</h1>
        
        @include('pages.adminForma')
    </div>
    <script>
        
    </script>

@endsection