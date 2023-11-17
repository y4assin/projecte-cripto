<div class="container mx-auto bg-black" >
    <h1 class="text-2xl font-bold mb-4 p-3 bg-primary text-white">Today's Cryptocurrency Prices by Market Cap
    </h1>
    <style>
        .clock-widget-text {
          font-size: 12px; /* Ajusta el tamaño del texto según sea necesario */
          display: inline-block; /* Asegura que el contenedor se ajuste al tamaño del texto */
          max-width: 150px; /* Establece un ancho máximo para evitar que el widget se vuelva demasiado ancho */
          overflow: hidden; /* Oculta cualquier contenido que pueda desbordar el ancho máximo */
          text-overflow: ellipsis; /* Agrega puntos suspensivos (...) al final del texto si se corta debido al ancho máximo */
        }
      </style>
    <script src="https://cdn.logwork.com/widget/text.js"></script>
    <a href="https://logwork.com/clock-widget/" class="clock-widget-text" data-language="es" data-textcolor="#ffffff" data-digitscolor="#ffffff">Barcelona, Spain</a>
    <table class=" min-w-full table table-bordered table-striped table-hover">
        <thead class="bg-green-200 text-black-600">
            <tr>
                <th class="text-left py-3 px-4 font-semibold">#</th>
                <th class="text-left py-3 px-4 font-semibold">Logo</th>
                <th class="text-left py-3 px-4 font-semibold">Nombre</th>
                <th class="text-left py-3 px-4 font-semibold">Precio</th>
                <th class="text-left py-3 px-4 font-semibold">Volumen</th>
                <th class="text-left py-3 px-4 font-semibold">Market Cap</th>

            </tr>
        </thead>
        <tbody class="text-gray-300">
            @foreach ($cryptos as $index => $crypto)
                <tr>
                    <td class="py-3 px-4">{{ $index + 1 }}</td>
                    <td class="py-3 px-4"><img src="{{ $crypto->logo }}" alt="" width="40"></td>
                    <td class="py-3 px-4">{{ $crypto->nombre }} {{$crypto->simbolo }}</td>
                    <td class="py-3 px-4">${{ $crypto->precio }}</td>
                    <td class="py-3 px-4">{{ $crypto->volumen }}</td>
                    <td class="py-3 px-4">${{ $crypto->market_cap }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
