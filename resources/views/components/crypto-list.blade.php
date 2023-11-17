<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4 p-3 bg-primary text-white">Crypto Currency Table</h1>

    <table class=" min-w-full table table-bordered table-striped table-hover">
        <thead class="bg-yellow-200 text-gray-600">
            <tr>
                <th class="text-left py-3 px-4 font-semibold">#</th>
                <th class="text-left py-3 px-4 font-semibold">Nombre</th>
                <th class="text-left py-3 px-4 font-semibold">Símbolo</th>
                <th class="text-left py-3 px-4 font-semibold">Logo</th>
                <th class="text-left py-3 px-4 font-semibold">Precio</th>
                <th class="text-left py-3 px-4 font-semibold">Volumen</th>
                <th class="text-left py-3 px-4 font-semibold">Market Cap</th>

            </tr>
        </thead>
        <tbody class="text-gray-300">
            @foreach ($cryptos as $index => $crypto)
                <tr>
                    <td class="py-3 px-4">{{ $index + 1 }}</td>
                    <td class="py-3 px-4">{{ $crypto->nombre }}</td>
                    <td class="py-3 px-4">{{ $crypto->simbolo }}</td>
                    <td class="py-3 px-4"><img src="{{ $crypto->logo }}" alt="" width="40"></td>
                    <td class="py-3 px-4">{{ $crypto->precio }}$</td>
                    <td class="py-3 px-4">{{ $crypto->volumen }}</td>
                    <td class="py-3 px-4">{{ $crypto->market_cap }}$</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
