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
    var historial =  {{ $crypto->historial }};

    const labels = [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
    ];

    const data = {
        labels: labels,
        datasets: [{
            label: 'Precio',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [0, 10, 5, 2, 20, 30, 45],
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