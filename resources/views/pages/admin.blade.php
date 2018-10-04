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
        @if (count($korisnik_1) > 0)
        <tr>
            <td>{{$korisnik_1['prezime']}}</td>
            <td>{{$korisnik_1['ime']}}</td>
            <td>{{$korisnik_1['tel']}}</td>
        </tr>
        @endif
        @if (count($korisnik_2) > 0)
        <tr>
            <td>{{$korisnik_2['prezime']}}</td>
            <td>{{$korisnik_2['ime']}}</td>
            <td>{{$korisnik_2['tel']}}</td>
        </tr>
        @endif
        @if (count($korisnik_3) > 0)
        <tr>
            <td>{{$korisnik_3['prezime']}}</td>
            <td>{{$korisnik_3['ime']}}</td>
            <td>{{$korisnik_3['tel']}}</td>
        </tr>
        @endif
        @if (count($korisnik_4) > 0)
        <tr>
            <td>{{$korisnik_4['prezime']}}</td>
            <td>{{$korisnik_4['ime']}}</td>
            <td>{{$korisnik_4['tel']}}</td>
        </tr>
        @endif

    </table>
    </div>

@endsection