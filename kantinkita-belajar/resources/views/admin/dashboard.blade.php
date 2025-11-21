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
        <div class="bg-[#f7f7f7] shadow-lg rounded-xl p-6">
            <h2 class="text-2xl font-extrabold mb-4">DATA PENDAPATAN</h2>

            <div class="w-full h-80">
                <canvas id="incomeChart"></canvas>
            </div>
        </div>

    </div>


    {{-- SCRIPT CHART (SLIM BAR + JUMLAH TRANSAKSI) --}}
    <script>
        const ctx = document.getElementById('incomeChart').getContext('2d');

        const months = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
        const incomeData = @json(array_values($income)); // ini dianggap jumlah transaksi
        const incomeLabels = @json(array_keys($income));

        const fixedLabels = incomeLabels.map(b => months[b-1]);

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: fixedLabels,
                datasets: [{
                    label: '',
                    data: incomeData,

                    // === BATANG KECIL (Slim Bar) ===
                    barThickness: 22,
                    maxBarThickness: 24,
                    borderWidth: 0,

                    backgroundColor: [
                        '#2563eb', '#38bdf8', '#eab308', '#f97316', '#ef4444',
                        '#d946ef', '#7c3aed', '#3b82f6', '#38bdf8', '#22c55e',
                        '#2563eb'
                    ],
                }]
            },

            options: {
                responsive: true,
                maintainAspectRatio: false,

                plugins: {
                    legend: { display: false },
                    tooltip: {
                        callbacks: {
                            label: (ctx) => "Jumlah transaksi: " + ctx.formattedValue
                        }
                    }
                },

                scales: {
                    x: {
                        grid: { display: false },
                        ticks: {
                            color: '#000',
                            font: { size: 14, weight: '600' }
                        }
                    },
                   y: {
    beginAtZero: true,
    max: 10000,   // << FIX UTAMA → memaksa batas
    grid: {
        color: '#e5e7eb',
        lineWidth: 1,
    },
    ticks: {
        color: '#6b7280',
        font: { size: 12 },
        callback: (value) => value.toLocaleString('id-ID') + " transaksi"
    }
}


                }
            }
        });
    </script>

</body>
</html>
