@extends('layouts.app')
@section('content')
    <style>
        table{
            border-style: solid;
            width: 30%;
        }
        td, th{
            border: 2px;
            border-color: #000000;
            text-align: left;
            padding: 6px;
        }
        td{
            border-style: ridge
        }
    </style>
    <div class="container">
    {{-- ispisati tablicu korisnika navedenih u kontroleru i to redoslijedom: prezime | ime | telefon --}}
    <h1>{{$title}}</h1>
    <p>{{$paragraf}}</p>
    @if (count($korisnici) > 0)
    <ul>
        @foreach ($korisnici as $korisnik)
            <li>{{$korisnik}}</li>
        @endforeach
    </ul>
    @endif
    <table>
        <tr>
            <th>Prezime</th>
            <th>Ime</th>
            <th>Telefon</th>
        </tr>
        <tr>
            <td>{{$prezime1}}</td>
            <td>{{$ime1}}</td>
            <td>{{$tel1}}</td>
        </tr>
        <tr>
            <td>{{$prezime2}}</td>
            <td>{{$ime2}}</td>
            <td>{{$tel2}}</td>
        </tr>
        <tr>
            <td>{{$prezime3}}</td>
            <td>{{$ime3}}</td>
            <td>{{$tel3}}</td>
        </tr>
        <tr>
            <td>{{$prezime4}}</td>
            <td>{{$ime4}}</td>
            <td>{{$tel4}}</td>
        </tr>
    </table>
    </div>

@endsection