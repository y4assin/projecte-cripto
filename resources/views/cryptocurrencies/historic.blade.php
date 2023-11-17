<table>
    <tr>
        <th>Date</th>
        <th>Price</th>
        <!-- otros encabezados -->
    </tr>
    @foreach($historicData as $historic)
    <tr>
        <td>{{ $historic->created_at->toDateString() }}</td>
        <td>{{ $historic->price }}</td>
        <!-- otros datos -->
    </tr>
    @endforeach
</table>