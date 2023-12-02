<x-app-layout>
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4 p-3 bg-white">{{ $crypto->nombre }}</h1>

        <canvas class="bg-white" id="cryptoChart" height="100px"></canvas>

        <table class="min-w-full bg-white overflow-hidden shadow-lg">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="text-left py-3 px-4 font-semibold">Nombre</th>
                    <th class="text-left py-3 px-4 font-semibold">Símbolo</th>
                    <th class="text-left py-3 px-4 font-semibold">Precio</th>
                    <th class="text-left py-3 px-4 font-semibold">Actualizado por última vez</th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                <tr>
                    <td class="py-3 px-4">{{ $crypto->nombre }}</td>
                    <td class="py-3 px-4">{{ $crypto->simbolo }}</td>
                    <td class="py-3 px-4">{{ $crypto->precio }}$</td>
                    <td class="py-3 px-4">{{ $crypto->historyUpdated_at }}</td>
                </tr>
            </tbody>
        </table>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script type="text/javascript">
        // Consigue el historial de la BD
        var historial = {{ $crypto-> historial }};

        // Filtro para formatar la fecha como dd/mm/aa, hh:mm
        const filtroFecha = {
            day: "2-digit",
            month: "2-digit",
            year: "2-digit",
            hour: "2-digit",
            minute: "2-digit"
        };

        // Recorre el historial y separa en dos arrays paralelos los datos de dia y precio
        var dia = [];
        var precio = [];
        for (var i = 0; i < historial.length; i++) {
            var dateUnix = historial[i][0];
            var date = new Intl.DateTimeFormat("es", filtroFecha).format(dateUnix);

            dia.push(date);
            precio.push(historial[i][1]);
        }

        // Datos del gráfico
        const labels = dia;
        const data = {
            labels: labels,
            datasets: [{
                label: 'Precio ($)',
                backgroundColor: 'rgb(154, 241, 158)',
                borderColor: 'rgb(19, 192, 27)',
                data: precio,
                borderWidth: 1,
                fill: true
            }]
        };

        const config = {
            type: 'line',
            data: data,
            options: {}
        };

        const cryptoChart = new Chart(
            document.getElementById('cryptoChart'),
            config
        );
    </script>
</x-app-layout>