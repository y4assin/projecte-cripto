@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Historial de {{ $crypto->nombre }}</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Precio</th>
                <th>Volumen</th>
                <th>Market Cap</th>
            </tr>
        </thead>
        <tbody>
            @foreach($historicData as $historic)
            <tr>
                <td>{{ $historic->created_at->format('Y-m-d H:i:s') }}</td>
                <td>${{ number_format($historic->price, 2) }}</td>
                <td>${{ number_format($historic->volume, 2) }}</td>
                <td>${{ number_format($historic->market_cap, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
