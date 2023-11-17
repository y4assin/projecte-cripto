<table>
    <tr>
        <th>Date</th>
        <th>Price</th>
        <!-- otros encabezados -->
    </tr>
    @foreach($historicalData as $data)
    <tr>
        <td>{{ $data->created_at->toDateString() }}</td>
        <td>{{ $data->price }}</td>
        <!-- otros datos -->
    </tr>
    @endforeach
</table>