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
            @foreach($historicalData as $data)
            <tr>
                <td>{{ $data->created_at->format('Y-m-d H:i:s') }}</td>
                <td>${{ number_format($data->price, 2) }}</td>
                <td>${{ number_format($data->volume, 2) }}</td>
                <td>${{ number_format($data->market_cap, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
