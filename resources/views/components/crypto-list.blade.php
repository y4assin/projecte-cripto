<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4 p-3 bg-white">Crypto Currency Table</h1>

    <table class="min-w-full bg-white rounded-lg overflow-hidden shadow-lg">
        <thead class="bg-gray-100 text-gray-700">
            <tr>
                <th class="text-left py-3 px-4 font-semibold">#</th>
                <th class="text-left py-3 px-4 font-semibold">Nombre</th>
                <th class="text-left py-3 px-4 font-semibold">Símbolo</th>
                <th class="text-left py-3 px-4 font-semibold">Precio</th>
                <th class="text-left py-3 px-4 font-semibold">Volumen</th>
                <th class="text-left py-3 px-4 font-semibold">Market Cap</th>
            </tr>
        </thead>
        <tbody class="text-gray-600">
            @foreach ($cryptos as $index => $crypto)
                <tr>
<<<<<<< HEAD
                    <td class="py-3 px-4 ">{{ $index + 1 }}</td>
                    <td class="py-3 px-4 bg-purple-200"><a href="#">{{ $crypto->nombre }}</a></td>
                    <td class="py-3 px-4 bg-pink-200">{{ $crypto->simbolo }}</td>
                    <td class="py-3 px-4 bg-purple-200">{{ $crypto->precio }}$</td>
                    <td class="py-3 px-4 bg-pink-200">{{ $crypto->volumen }}</td>
                    <td class="py-3 px-4 bg-purple-200">{{ $crypto->market_cap }}$</td>
=======
                    <td class="py-3 px-4">{{ $index + 1 }}</td>
                    <td class="py-3 px-4"><a href="{{route('cryptos.show',['crypto'=>$crypto])}}">{{$crypto->nombre }}</a></td>
                    <td class="py-3 px-4">{{ $crypto->simbolo }}</td>
                    <td class="py-3 px-4">{{ $crypto->precio }}$</td>
                    <td class="py-3 px-4">{{ $crypto->volumen }}</td>
                    <td class="py-3 px-4">{{ $crypto->market_cap }}$</td>
>>>>>>> b6b3a16f9731fb630b17c973731f813335efbf26
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
