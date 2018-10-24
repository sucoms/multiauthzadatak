@extends('layouts.app')
@section('content')
    {{-- <style>
        table{
            border-style: solid!important;
            width: 40%!important;
        }
        td, th{
            border: 2px!important;
            border-color: #000000!important;
            text-align: center!important;
            padding: 6px!important;
        }
        td{
            border-style: ridge!important;
        }
    </style> --}}
    <div class="container">
        
    {{-- ispisati tablicu korisnika navedenih u kontroleru i to redoslijedom: prezime | ime | telefon --}}
        

{{-- @php
    dd($korisnici);
@endphp --}}
{{-- Ucitava podatke svih korisnika --}}
        {{-- <div class="col-lg-4" >
            <input type="text" class="form-control" name="search" id="search" placeholder="Pretraži korisnike">
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered ">
                <tr>
                    <th>Prezime</th>
                    <th>Ime</th>
                    <th>Telefon</th>
                    <th>Admin</th>
                    <th></th>
                </tr>
                @if (count($korisnici) > 0)
                    @foreach ($korisnici as $korisnik)
                        <tr> --}}
                            {{-- poziv za array attribute --}}
                            {{-- <td>{{$korisnik['prezime']}}</td>
                            <td>{{$korisnik['ime']}}</td>
                            <td>{{$korisnik['tel']}}</td> --}}
                            {{-- poziv za object attribute --}}
                            {{-- <td>{{$korisnik->surname}}</td>
                            <td>{{$korisnik->name}}</td>
                            <td>{{$korisnik->phone}}</td>
                            <td>
                                <div class="form-group{{ $korisnik }}">
                                    <select name="role_id" class="form-control">
                                        <option value="1">Admin</option>
                                        <option value="2">User</option>
                                    </select>
                                    
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    {{ Form::submit('Potvrdi', ['class' => 'btn btn-secondary btn-sm']) }}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
                <tbody>

                </tbody>
            </table>
        </div> --}}
        <h1>{{$title}}, {{Auth::user()->name}} {{Auth::user()->surname}}.</h1>
        <h3>{{$paragraf}}</h3>
        <hr>
        {!! Form::open(['action' => 'PagesController@action', 'method' => 'POST' ]) !!}
        @include('pages.live_search')
        {!! Form::close() !!}

        
        <hr>
        <h1>Dodaj novog korisnika</h1>
        {!! Form::open(['action' => 'PagesController@adminForma', 'method' => 'POST' ]) !!}
        @include('pages.adminForma')
        {!! Form::close() !!}
    </div>

@endsection