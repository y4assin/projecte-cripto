

@extends('layouts.app')

@section('content')
    <h1>Listado de Criptomonedas</h1>

    <ul>
        @foreach ($cryptocurrencies as $crypto)
            <li>{{ $crypto->name }} - {{ $crypto->symbol }}</li>        
        @endforeach
    </ul>
@endsection
