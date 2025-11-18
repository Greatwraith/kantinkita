<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>

<body class="bg-gray-100 flex">

    {{-- SIDEBAR --}}
    @include('components.sidebar')

    <div class="flex-1 p-8">

        {{-- HEADER --}}
        <h1 class="text-3xl font-bold mb-1">Beranda</h1>
        <p class="text-gray-600 mb-6">Selamat datang kembali!</p>


        {{-- STATISTIC CARDS --}}
        <div class="grid grid-cols-4 gap-6 mb-10">

            <div class="bg-white shadow-md rounded-xl p-6 text-center">
                <h3 class="text-3xl font-bold">{{ $menus }}</h3>
                <p class="text-gray-600">Total Menu</p>
            </div>

            <div class="bg-white shadow-md rounded-xl p-6 text-center">
                <h3 class="text-3xl font-bold">{{ $totalPesanan }}</h3>
                <p class="text-gray-600">Total Pesanan</p>
            </div>

            <div class="bg-white shadow-md rounded-xl p-6 text-center">
                <h3 class="text-3xl font-bold">{{ $transaksiHariIni }}</h3>
                <p class="text-gray-600">Transaksi Hari Ini</p>
            </div>

            <div class="bg-white shadow-md rounded-xl p-6 text-center">
                <h3 class="text-3xl font-bold">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</h3>
                <p class="text-gray-600">Total Pendapatan</p>
            </div>

        </div>


        {{-- GRAFIK --}}
        <div class="bg-white shadow-lg rounded-xl p-6">
            <h2 class="text-xl font-bold mb-4">DATA PENDAPATAN</h2>

            <canvas id="incomeChart" height="100"></canvas>
        </div>

    </div>



    {{-- SCRIPT CHART --}}
    <script>
        const ctx = document.getElementById('incomeChart').getContext('2d');

        const months = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];

        const incomeData = @json(array_values($income));
        const incomeLabels = @json(array_keys($income));

        const fixedLabels = incomeLabels.map(b => months[b-1]);

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: fixedLabels,
                datasets: [{
                    label: 'Pendapatan Bulanan',
                    data: incomeData,
                    borderWidth: 1,
                    backgroundColor: [
                        '#3b82f6','#22c55e','#facc15','#ef4444','#8b5cf6',
                        '#0ea5e9','#14b8a6','#f97316','#7c3aed','#a3e635','#4ade80','#60a5fa'
                    ],
                }]
            },
            options: { responsive: true, scales: { y: { beginAtZero: true } } }
        });
    </script>

</body>
</html>
