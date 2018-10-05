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
        <h3>{{$paragraf}}</h3>

{{-- @php
    print_r($korisnici)
@endphp --}}

        <table>
            <tr>
                <th>Prezime</th>
                <th>Ime</th>
                <th>Telefon</th>
            </tr>
            @if (count($korisnici) > 0)
                @foreach ($korisnici as $korisnik)
                    <tr>
                        {{-- poziv za array atribute --}}
                        {{-- <td>{{$korisnik['prezime']}}</td>
                        <td>{{$korisnik['ime']}}</td>
                        <td>{{$korisnik['tel']}}</td> --}}
                        {{-- poziv za object atribute --}}
                        <td>{{$korisnik->surname}}</td>
                        <td>{{$korisnik->name}}</td>
                        <td>{{$korisnik->phone}}</td>
                    </tr>
                @endforeach
            @endif

        </table>
    </div>

@endsection