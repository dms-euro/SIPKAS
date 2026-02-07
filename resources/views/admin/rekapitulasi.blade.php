<!DOCTYPE html>
<!-- resources/views/admin/rekap.blade.php -->
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekapitulasi - Kas Sekolah</title>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Tailwind CSS -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- Remix Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Outfit', sans-serif;
        }
        .font-display {
            font-family: 'Space Grotesk', monospace;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0.05);
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, #10b981, #059669);
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(to bottom, #059669, #047857);
        }

        /* Animation for stats cards */
        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.4); }
            50% { box-shadow: 0 0 0 10px rgba(16, 185, 129, 0); }
        }

        .pulse-glow {
            animation: pulse-glow 2s infinite;
        }

        /* Smooth tab transition */
        .tab-content {
            transition: opacity 0.3s ease;
        }

        /* Status badges */
        .status-badge-selesai {
            background: linear-gradient(to right, #10b981, #059669);
            color: white;
        }
        .status-badge-pending {
            background: linear-gradient(to right, #f59e0b, #d97706);
            color: white;
        }
        .status-badge-terlambat {
            background: linear-gradient(to right, #ef4444, #dc2626);
            color: white;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-slate-50 via-green-50/30 to-emerald-50/50 min-h-screen relative overflow-x-hidden">

    <!-- Animated Background Elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none z-0">
        <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-gradient-to-br from-green-400/20 to-emerald-500/20 rounded-full blur-3xl animate-pulse" style="animation-duration: 4s;"></div>
        <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-gradient-to-tr from-teal-400/20 to-green-500/20 rounded-full blur-3xl animate-pulse" style="animation-duration: 5s; animation-delay: 1s;"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[400px] h-[400px] bg-gradient-to-r from-emerald-400/10 to-green-400/10 rounded-full blur-3xl animate-pulse" style="animation-duration: 6s; animation-delay: 2s;"></div>
    </div>

    <div class="flex relative z-10">

        <!-- Sidebar -->
        <aside class="fixed inset-y-0 left-0 w-72 bg-white/80 backdrop-blur-xl border-r border-white/50 shadow-2xl shadow-green-500/10 z-40" data-aos="fade-right" data-aos-duration="800">

            <!-- Logo Header -->
            <div class="h-20 bg-gradient-to-r from-green-600 via-emerald-600 to-teal-600 flex items-center justify-center relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-white/10 to-transparent"></div>
                <div class="relative flex items-center space-x-3 z-10">
                    <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center border border-white/30 shadow-lg">
                        <i class="ri-bank-line text-white text-2xl"></i>
                    </div>
                    <div>
                        <h1 class="text-white font-bold text-xl font-display">Kas Sekolah</h1>
                        <p class="text-green-100 text-xs font-medium">Admin Portal v2.0</p>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="px-4 py-6 space-y-8">
                <!-- Menu Utama -->
                <div>
                    <p class="text-xs uppercase text-gray-500 font-bold tracking-wider px-4 mb-3">Menu Utama</p>
                    <div class="space-y-1">
                        <a href="{{ route('dashboard.admin') }}" class="group flex items-center py-3 px-4 text-gray-700 hover:bg-white/60 backdrop-blur-sm rounded-xl transition-all duration-300 hover:shadow-md">
                            <div class="w-10 h-10 bg-green-50 group-hover:bg-green-100 rounded-lg flex items-center justify-center mr-3 transition-colors">
                                <i class="ri-dashboard-line text-lg text-green-600"></i>
                            </div>
                            <span class="font-semibold">Dashboard</span>
                        </a>

                        <a href="{{ route('admin.tagihan.index') }}" class="group flex items-center py-3 px-4 text-gray-700 hover:bg-white/60 backdrop-blur-sm rounded-xl transition-all duration-300 hover:shadow-md">
                            <div class="w-10 h-10 bg-emerald-50 group-hover:bg-emerald-100 rounded-lg flex items-center justify-center mr-3 transition-colors">
                                <i class="ri-bill-line text-lg text-emerald-600"></i>
                            </div>
                            <span class="font-semibold">Tagihan Kas</span>
                        </a>

                        <a href="{{ route('admin.saldo.index') }}" class="group flex items-center py-3 px-4 text-gray-700 hover:bg-white/60 backdrop-blur-sm rounded-xl transition-all duration-300 hover:shadow-md">
                            <div class="w-10 h-10 bg-amber-50 group-hover:bg-amber-100 rounded-lg flex items-center justify-center mr-3 transition-colors">
                                <i class="ri-wallet-line text-lg text-amber-600"></i>
                            </div>
                            <span class="font-semibold">Saldo</span>
                        </a>

                        <a href="{{ route('admin.rekap.index') }}" class="group flex items-center py-3 px-4 bg-gradient-to-r from-green-500 to-emerald-600 text-white rounded-xl shadow-lg shadow-green-500/50 transform transition-all duration-300 hover:shadow-xl hover:scale-105">
                            <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center mr-3">
                                <i class="ri-file-chart-line text-lg"></i>
                            </div>
                            <span class="font-semibold">Rekapitulasi</span>
                        </a>
                    </div>
                </div>

                <!-- Menu Akun -->
                <div>
                    <p class="text-xs uppercase text-gray-500 font-bold tracking-wider px-4 mb-3">Akun</p>
                    <div class="space-y-1">
                        <div class="flex items-center py-3 px-4 bg-white/40 backdrop-blur-sm rounded-xl border border-white/50">
                            <div class="h-10 w-10 bg-gradient-to-br from-green-500 to-emerald-600 rounded-lg flex items-center justify-center text-white font-bold mr-3 shadow-md">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">{{ auth()->user()->name }}</p>
                                <p class="text-xs text-gray-500 capitalize">{{ auth()->user()->role }}</p>
                            </div>
                        </div>

                        <form method="POST" action="{{ route('logout') }}" class="m-0">
                            @csrf
                            <button type="submit" class="w-full group flex items-center py-3 px-4 text-gray-700 hover:bg-red-50 rounded-xl transition-all duration-300 hover:shadow-md">
                                <div class="w-10 h-10 bg-red-50 group-hover:bg-red-100 rounded-lg flex items-center justify-center mr-3 transition-colors">
                                    <i class="ri-logout-box-line text-lg text-red-600"></i>
                                </div>
                                <span class="font-semibold">Keluar</span>
                            </button>
                        </form>
                    </div>
                </div>
            </nav>

            <!-- Sidebar Footer -->
            <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-white/80 to-transparent backdrop-blur-sm">
                <div class="bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl p-4 text-white shadow-lg">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-sm font-semibold">Periode Aktif</span>
                        <span class="text-xs bg-white/20 px-2 py-1 rounded-full">
                            {{ $bulan ? \Carbon\Carbon::createFromFormat('m', $bulan)->format('M') : 'All' }} {{ $tahun }}
                        </span>
                    </div>
                    <div class="w-full bg-white/20 rounded-full h-2">
                        <div class="bg-white rounded-full h-2" style="width: {{ $totalTagihanCount > 0 ? ($tagihanSelesai / $totalTagihanCount) * 100 : 0 }}%"></div>
                    </div>
                    <p class="text-xs text-green-100 mt-2">
                        {{ $tagihanSelesai }} dari {{ $totalTagihanCount }} tagihan selesai
                    </p>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="ml-72 flex-1 p-8 min-h-screen">

            <!-- Header with Breadcrumb -->
            <header class="mb-8" data-aos="fade-down" data-aos-duration="800">
                <!-- Breadcrumb -->
                <nav class="flex mb-4" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-2">
                        <li class="inline-flex items-center">
                            <a href="{{ route('dashboard.admin') }}" class="inline-flex items-center text-sm text-gray-600 hover:text-green-600 transition-colors">
                                <i class="ri-home-line mr-2"></i>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <i class="ri-arrow-right-s-line text-gray-400"></i>
                                <span class="ml-2 text-sm text-green-600 font-semibold">Rekapitulasi</span>
                            </div>
                        </li>
                    </ol>
                </nav>

                <div class="bg-white/70 backdrop-blur-xl rounded-2xl shadow-xl shadow-green-500/10 border border-white/50 p-6">
                    <div class="flex justify-between items-center">
                        <div>
                            <h1 class="text-4xl font-bold text-gray-800 font-display mb-1">Rekapitulasi</h1>
                            <p class="text-gray-600 flex items-center">
                                <i class="ri-file-chart-line mr-2 text-green-600"></i>
                                Analisis lengkap aktivitas, tagihan, dan saldo kas sekolah
                                @if($bulan || $tahun != $currentYear)
                                    <span class="ml-2 text-sm bg-green-100 text-green-800 px-2 py-1 rounded-full">
                                        Periode: {{ $bulan ? \Carbon\Carbon::createFromFormat('m', $bulan)->format('F') : 'Semua Bulan' }} {{ $tahun }}
                                    </span>
                                @endif
                            </p>
                        </div>
                        <div class="hidden md:flex items-center space-x-3">
                            <div class="bg-gradient-to-br from-green-500 to-emerald-600 p-4 rounded-xl shadow-lg">
                                <i class="ri-bar-chart-2-line text-white text-3xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Flash Messages -->
            @if (session('success'))
            <div class="mb-6 bg-green-50/80 backdrop-blur-sm border-2 border-green-200 rounded-2xl p-4 shadow-lg" id="successMessage" data-aos="fade-in">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center mr-3 shadow-md">
                        <i class="ri-checkbox-circle-line text-white text-xl"></i>
                    </div>
                    <div>
                        <p class="font-bold text-green-800">Berhasil!</p>
                        <p class="text-sm text-green-600 mt-0.5">{{ session('success') }}</p>
                    </div>
                    <button onclick="this.parentElement.parentElement.remove()" class="ml-auto text-green-600 hover:text-green-800 transition-colors">
                        <i class="ri-close-line text-xl"></i>
                    </button>
                </div>
            </div>
            @endif

            @if (session('error'))
            <div class="mb-6 bg-red-50/80 backdrop-blur-sm border-2 border-red-200 rounded-2xl p-4 shadow-lg" data-aos="fade-in">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-rose-600 rounded-xl flex items-center justify-center mr-3 shadow-md">
                        <i class="ri-error-warning-line text-white text-xl"></i>
                    </div>
                    <div>
                        <p class="font-bold text-red-800">Error!</p>
                        <p class="text-sm text-red-600 mt-0.5">{{ session('error') }}</p>
                    </div>
                    <button onclick="this.parentElement.parentElement.remove()" class="ml-auto text-red-600 hover:text-red-800 transition-colors">
                        <i class="ri-close-line text-xl"></i>
                    </button>
                </div>
            </div>
            @endif

            <!-- Filter Section -->
            <div class="bg-white/70 backdrop-blur-xl rounded-2xl shadow-xl shadow-green-500/10 border border-white/50 p-6 mb-8" data-aos="fade-up" data-aos-delay="200">
                <form id="filterForm" method="GET" action="{{ route('admin.rekap.index') }}" class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-4 md:space-y-0">
                    <div>
                        <h2 class="text-xl font-bold text-gray-800 font-display mb-1">Filter Periode</h2>
                        <p class="text-sm text-gray-600">Pilih periode untuk melihat rekap data</p>
                    </div>
                    <div class="flex flex-wrap gap-4">
                        <div class="flex items-center space-x-2">
                            <label class="text-sm font-medium text-gray-700">Bulan:</label>
                            <select name="bulan" id="filterBulan" class="px-4 py-2 bg-white/60 backdrop-blur-sm border-2 border-gray-200 rounded-xl focus:border-green-500 focus:ring-4 focus:ring-green-500/10 transition-all duration-300 outline-none font-medium">
                                <option value="">Semua Bulan</option>
                                @foreach(range(1, 12) as $month)
                                    <option value="{{ str_pad($month, 2, '0', STR_PAD_LEFT) }}"
                                        {{ $bulan == str_pad($month, 2, '0', STR_PAD_LEFT) ? 'selected' : '' }}>
                                        {{ \Carbon\Carbon::createFromFormat('m', $month)->translatedFormat('F') }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex items-center space-x-2">
                            <label class="text-sm font-medium text-gray-700">Tahun:</label>
                            <select name="tahun" id="filterTahun" class="px-4 py-2 bg-white/60 backdrop-blur-sm border-2 border-gray-200 rounded-xl focus:border-green-500 focus:ring-4 focus:ring-green-500/10 transition-all duration-300 outline-none font-medium">
                                @for($year = $currentYear; $year >= 2020; $year--)
                                    <option value="{{ $year }}" {{ $tahun == $year ? 'selected' : '' }}>
                                        {{ $year }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                        <button type="submit" class="px-6 py-3 bg-gradient-to-r from-green-600 to-emerald-600 text-white font-bold rounded-xl shadow-lg shadow-green-500/50 hover:shadow-xl hover:shadow-green-500/60 transform hover:-translate-y-0.5 transition-all duration-300 flex items-center">
                            <i class="ri-filter-line mr-2"></i> Terapkan Filter
                        </button>
                        <a href="{{ route('admin.rekap.index') }}" class="px-6 py-3 bg-white/60 backdrop-blur-sm border-2 border-gray-200 text-gray-700 font-bold rounded-xl hover:bg-white hover:border-gray-300 transition-all duration-300 flex items-center">
                            <i class="ri-refresh-line mr-2"></i> Reset
                        </a>
                    </div>
                </form>
            </div>

            <!-- Stats Overview -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8" data-aos="fade-up" data-aos-delay="300">
                <!-- Total Pemasukan -->
                <div class="bg-gradient-to-br from-green-50 to-emerald-50/70 backdrop-blur-xl rounded-2xl shadow-xl shadow-green-500/10 border border-green-100/50 p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <p class="text-sm text-gray-600">Total Pemasukan</p>
                            <p class="text-3xl font-bold text-gray-800">
                                Rp {{ number_format($totalPemasukan, 0, ',', '.') }}
                            </p>
                        </div>
                        <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center shadow-lg">
                            <i class="ri-arrow-down-line text-white text-2xl"></i>
                        </div>
                    </div>
                    <div class="flex items-center text-sm">
                        @if($persentasePemasukan > 0)
                            <span class="text-green-600 font-bold flex items-center">
                                <i class="ri-arrow-up-line mr-1"></i> {{ abs($persentasePemasukan) }}%
                            </span>
                            <span class="text-gray-500 ml-2">naik dari bulan lalu</span>
                        @elseif($persentasePemasukan < 0)
                            <span class="text-red-600 font-bold flex items-center">
                                <i class="ri-arrow-down-line mr-1"></i> {{ abs($persentasePemasukan) }}%
                            </span>
                            <span class="text-gray-500 ml-2">turun dari bulan lalu</span>
                        @else
                            <span class="text-gray-600">Stabil dari bulan lalu</span>
                        @endif
                    </div>
                </div>

                <!-- Total Tagihan -->
                <div class="bg-gradient-to-br from-blue-50 to-sky-50/70 backdrop-blur-xl rounded-2xl shadow-xl shadow-blue-500/10 border border-blue-100/50 p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <p class="text-sm text-gray-600">Total Tagihan</p>
                            <p class="text-3xl font-bold text-gray-800">
                                Rp {{ number_format($totalTagihan, 0, ',', '.') }}
                            </p>
                        </div>
                        <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-sky-600 rounded-xl flex items-center justify-center shadow-lg">
                            <i class="ri-bill-line text-white text-2xl"></i>
                        </div>
                    </div>
                    <div class="text-sm text-gray-500">
                        {{ $totalTagihanCount }} tagihan aktif •
                        @if($totalTagihanCount > 0)
                            {{ round(($tagihanSelesai / $totalTagihanCount) * 100) }}% selesai
                        @else
                            Tidak ada tagihan
                        @endif
                    </div>
                </div>

                <!-- Saldo Tersedia -->
                <div class="bg-gradient-to-br from-purple-50 to-violet-50/70 backdrop-blur-xl rounded-2xl shadow-xl shadow-purple-500/10 border border-purple-100/50 p-6 pulse-glow">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <p class="text-sm text-gray-600">Saldo Tersedia</p>
                            <p class="text-3xl font-bold text-gray-800">
                                Rp {{ number_format($saldoTersedia, 0, ',', '.') }}
                            </p>
                        </div>
                        <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-violet-600 rounded-xl flex items-center justify-center shadow-lg">
                            <i class="ri-wallet-line text-white text-2xl"></i>
                        </div>
                    </div>
                    <div class="flex items-center text-sm">
                        @php
                            $avgMonthlyExpense = $saldoKeluar > 0 ? $saldoKeluar / 12 : 0;
                            $monthsCovered = $avgMonthlyExpense > 0 ? floor($saldoTersedia / $avgMonthlyExpense) : 0;
                        @endphp
                        @if($monthsCovered > 0)
                            <span class="text-purple-600 font-bold flex items-center">
                                <i class="ri-shield-check-line mr-1"></i> Cukup untuk {{ $monthsCovered }} bulan
                            </span>
                        @else
                            <span class="text-yellow-600 font-bold flex items-center">
                                <i class="ri-alert-line mr-1"></i> Perlu penambahan saldo
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Navigation Tabs -->
            <div class="mb-8" data-aos="fade-up" data-aos-delay="400">
                <div class="bg-white/70 backdrop-blur-xl rounded-2xl shadow-xl shadow-green-500/10 border border-white/50 p-2">
                    <nav class="flex space-x-2" role="tablist">
                        <button id="tab-aktivitas" class="tab-button flex-1 py-3 px-4 text-center font-bold rounded-xl transition-all duration-300 bg-gradient-to-r from-green-500 to-emerald-600 text-white shadow-lg" onclick="showTab('aktivitas')">
                            <i class="ri-history-line mr-2"></i> Aktivitas Terbaru
                        </button>
                        <button id="tab-tagihan" class="tab-button flex-1 py-3 px-4 text-center font-bold rounded-xl transition-all duration-300 hover:bg-white/60 text-gray-700" onclick="showTab('tagihan')">
                            <i class="ri-bill-line mr-2"></i> Rekap Tagihan
                        </button>
                        <button id="tab-saldo" class="tab-button flex-1 py-3 px-4 text-center font-bold rounded-xl transition-all duration-300 hover:bg-white/60 text-gray-700" onclick="showTab('saldo')">
                            <i class="ri-wallet-line mr-2"></i> Rekap Saldo
                        </button>
                    </nav>
                </div>
            </div>

            <!-- Tab Content: Aktivitas Terbaru -->
            <div id="content-aktivitas" class="tab-content" data-aos="fade-up" data-aos-delay="500">
                <div class="bg-white/70 backdrop-blur-xl rounded-2xl shadow-xl shadow-green-500/10 border border-white/50 overflow-hidden mb-8">
                    <div class="px-6 py-5 bg-gradient-to-r from-gray-50 to-green-50/30 border-b border-gray-200">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center mr-3 shadow-md">
                                    <i class="ri-history-line text-white text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 font-display">Aktivitas Terbaru</h3>
                                    <p class="text-sm text-gray-600">10 transaksi terbaru dalam sistem</p>
                                </div>
                            </div>
                            <div class="text-sm text-gray-600">
                                {{ $aktivitas->count() }} aktivitas
                            </div>
                        </div>
                    </div>

                    @if($aktivitas->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gradient-to-r from-gray-50 to-green-50/30">
                                    <tr>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Waktu</th>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Aktivitas</th>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">User</th>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Keterangan</th>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Nominal</th>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white/40 backdrop-blur-sm divide-y divide-gray-200">
                                    @foreach($aktivitas as $activity)
                                        <tr class="hover:bg-white/60 transition-all duration-200">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-semibold text-gray-900">{{ $activity['waktu'] }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="w-8 h-8 rounded-lg flex items-center justify-center mr-2
                                                        {{ $activity['tipe'] == 'masuk' ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }}">
                                                        <i class="{{ $activity['tipe'] == 'masuk' ? 'ri-arrow-down-line' : 'ri-arrow-up-line' }}"></i>
                                                    </div>
                                                    <span class="font-bold text-gray-900">{{ $activity['aktivitas'] }}</span>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="w-8 h-8 bg-gradient-to-br from-green-500 to-emerald-600 rounded-lg flex items-center justify-center text-white font-bold text-sm mr-2">
                                                        {{ strtoupper(substr($activity['user'], 0, 1)) }}
                                                    </div>
                                                    <span class="font-semibold text-gray-900">{{ $activity['user'] }}</span>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-600 max-w-xs truncate">{{ $activity['keterangan'] }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="font-bold {{ $activity['tipe'] == 'masuk' ? 'text-green-600' : 'text-red-600' }}">
                                                    {{ $activity['tipe'] == 'masuk' ? '+' : '-' }}Rp {{ number_format($activity['nominal'], 0, ',', '.') }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="inline-flex items-center px-3 py-1.5 rounded-xl text-xs font-bold
                                                    {{ $activity['tipe'] == 'masuk' ? 'status-badge-selesai' : 'status-badge-pending' }}">
                                                    <i class="ri-checkbox-circle-line mr-1.5"></i>
                                                    {{ $activity['tipe'] == 'masuk' ? 'Pemasukan' : 'Pengeluaran' }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-16">
                            <div class="w-20 h-20 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                                <i class="ri-history-line text-gray-400 text-3xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2 font-display">Tidak ada aktivitas</h3>
                            <p class="text-gray-500">Belum ada aktivitas yang tercatat</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Tab Content: Rekap Tagihan -->
            <div id="content-tagihan" class="tab-content hidden" data-aos="fade-up" data-aos-delay="500">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                    <!-- Chart Tagihan -->
                    <div class="bg-white/70 backdrop-blur-xl rounded-2xl shadow-xl shadow-green-500/10 border border-white/50 p-6">
                        <div class="flex items-center justify-between mb-6">
                            <div>
                                <h3 class="text-xl font-bold text-gray-800 font-display">Trend Tagihan</h3>
                                <p class="text-sm text-gray-600">Jumlah tagihan per bulan {{ $tahun }}</p>
                            </div>
                        </div>
                        <div class="h-80">
                            <canvas id="tagihanChart"></canvas>
                        </div>
                    </div>

                    <!-- Detail Tagihan -->
                    <div class="bg-white/70 backdrop-blur-xl rounded-2xl shadow-xl shadow-green-500/10 border border-white/50 overflow-hidden">
                        <div class="px-6 py-5 bg-gradient-to-r from-gray-50 to-blue-50/30 border-b border-gray-200">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-sky-600 rounded-xl flex items-center justify-center mr-3 shadow-md">
                                        <i class="ri-file-list-2-line text-white text-xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-bold text-gray-800 font-display">Status Tagihan</h3>
                                        <p class="text-sm text-gray-600">Detail status tagihan</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="space-y-4">
                                <div class="flex items-center justify-between p-4 bg-gradient-to-r from-green-50 to-emerald-50/50 rounded-xl border border-green-100">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                                            <i class="ri-checkbox-circle-line text-green-600"></i>
                                        </div>
                                        <div>
                                            <p class="font-bold text-gray-800">Tagihan Selesai</p>
                                            <p class="text-sm text-gray-600">Lunas tepat waktu</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-2xl font-bold text-green-600">{{ $tagihanSelesai }}</p>
                                        @php
                                            $percentage = $totalTagihanCount > 0 ? round(($tagihanSelesai / $totalTagihanCount) * 100) : 0;
                                        @endphp
                                        <p class="text-sm text-gray-600">{{ $percentage }}% dari total</p>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between p-4 bg-gradient-to-r from-yellow-50 to-amber-50/50 rounded-xl border border-yellow-100">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center mr-3">
                                            <i class="ri-time-line text-yellow-600"></i>
                                        </div>
                                        <div>
                                            <p class="font-bold text-gray-800">Tagihan Pending</p>
                                            <p class="text-sm text-gray-600">Menunggu pembayaran</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-2xl font-bold text-yellow-600">{{ $tagihanPending }}</p>
                                        @php
                                            $percentage = $totalTagihanCount > 0 ? round(($tagihanPending / $totalTagihanCount) * 100) : 0;
                                        @endphp
                                        <p class="text-sm text-gray-600">{{ $percentage }}% dari total</p>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between p-4 bg-gradient-to-r from-red-50 to-rose-50/50 rounded-xl border border-red-100">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center mr-3">
                                            <i class="ri-alert-line text-red-600"></i>
                                        </div>
                                        <div>
                                            <p class="font-bold text-gray-800">Tagihan Terlambat</p>
                                            <p class="text-sm text-gray-600">Melewati jatuh tempo</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-2xl font-bold text-red-600">{{ $tagihanTerlambat }}</p>
                                        @php
                                            $percentage = $totalTagihanCount > 0 ? round(($tagihanTerlambat / $totalTagihanCount) * 100) : 0;
                                        @endphp
                                        <p class="text-sm text-gray-600">{{ $percentage }}% dari total</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab Content: Rekap Saldo -->
            <div id="content-saldo" class="tab-content hidden" data-aos="fade-up" data-aos-delay="500">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                    <!-- Chart Saldo -->
                    <div class="bg-white/70 backdrop-blur-xl rounded-2xl shadow-xl shadow-green-500/10 border border-white/50 p-6">
                        <div class="flex items-center justify-between mb-6">
                            <div>
                                <h3 class="text-xl font-bold text-gray-800 font-display">Perkembangan Saldo</h3>
                                <p class="text-sm text-gray-600">Saldo bersih per bulan {{ $tahun }}</p>
                            </div>
                        </div>
                        <div class="h-80">
                            <canvas id="saldoChart"></canvas>
                        </div>
                    </div>

                    <!-- Ringkasan Saldo -->
                    <div class="bg-white/70 backdrop-blur-xl rounded-2xl shadow-xl shadow-green-500/10 border border-white/50 p-6">
                        <div class="flex items-center justify-between mb-6">
                            <div>
                                <h3 class="text-xl font-bold text-gray-800 font-display">Ringkasan Saldo</h3>
                                <p class="text-sm text-gray-600">Detail pemasukan dan pengeluaran</p>
                            </div>
                        </div>
                        <div class="space-y-6">
                            <div class="grid grid-cols-2 gap-4">
                                <div class="p-4 bg-gradient-to-br from-green-50 to-emerald-50/50 rounded-xl border border-green-100">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                                            <i class="ri-arrow-down-line text-green-600"></i>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-600">Total Pemasukan</p>
                                            <p class="text-xl font-bold text-gray-800">
                                                Rp {{ number_format($saldoMasuk, 0, ',', '.') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-4 bg-gradient-to-br from-red-50 to-rose-50/50 rounded-xl border border-red-100">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center mr-3">
                                            <i class="ri-arrow-up-line text-red-600"></i>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-600">Total Pengeluaran</p>
                                            <p class="text-xl font-bold text-gray-800">
                                                Rp {{ number_format($saldoKeluar, 0, ',', '.') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4 bg-gradient-to-br from-blue-50 to-sky-50/50 rounded-xl border border-blue-100">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                            <i class="ri-wallet-3-line text-blue-600"></i>
                                        </div>
                                        <div>
                                            <p class="font-bold text-gray-800">Saldo Bersih</p>
                                            <p class="text-sm text-gray-600">Pemasukan - Pengeluaran</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-2xl font-bold text-blue-600">
                                            Rp {{ number_format($saldoTersedia, 0, ',', '.') }}
                                        </p>
                                        @php
                                            $percentage = $saldoMasuk > 0 ? round(($saldoTersedia / $saldoMasuk) * 100) : 0;
                                        @endphp
                                        <p class="text-sm text-gray-600">{{ $percentage }}% dari pemasukan</p>
                                    </div>
                                </div>
                            </div>
                            @if($distribusiSaldo->count() > 0)
                            <div class="p-4 bg-gradient-to-br from-purple-50 to-violet-50/50 rounded-xl border border-purple-100">
                                <h4 class="font-bold text-gray-800 mb-3">Top 5 Saldo per User</h4>
                                <div class="space-y-3">
                                    @foreach($distribusiSaldo as $saldo)
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 bg-gradient-to-br from-purple-500 to-violet-600 rounded-lg flex items-center justify-center text-white font-bold text-sm mr-2">
                                                {{ strtoupper(substr($saldo['nama'], 0, 1)) }}
                                            </div>
                                            <span class="font-medium text-gray-800">{{ $saldo['nama'] }}</span>
                                        </div>
                                        <span class="font-bold text-gray-800">
                                            Rp {{ number_format($saldo['saldo'], 0, ',', '.') }}
                                        </span>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="mt-8 text-center py-6 text-gray-500 text-sm" data-aos="fade-up" data-aos-delay="600">
                <p class="flex items-center justify-center">
                    <i class="ri-copyright-line mr-1"></i>
                    {{ date('Y') }} Admin Web Kas Sekolah. Sistem manajemen kas sekolah terintegrasi.
                    @if($bulan || $tahun != $currentYear)
                        • Periode: {{ $bulan ? \Carbon\Carbon::createFromFormat('m', $bulan)->translatedFormat('F') : 'Semua Bulan' }} {{ $tahun }}
                    @endif
                </p>
            </footer>
        </main>
    </div>

    <!-- AOS Animation Script -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            easing: 'ease-out-cubic',
            once: true,
            offset: 50
        });

        // Tab Navigation
        function showTab(tabName) {
            // Hide all tab contents
            document.querySelectorAll('.tab-content').forEach(tab => {
                tab.classList.add('hidden');
            });

            // Remove active class from all tab buttons
            document.querySelectorAll('.tab-button').forEach(button => {
                button.classList.remove('bg-gradient-to-r', 'from-green-500', 'to-emerald-600', 'text-white', 'shadow-lg');
                button.classList.add('text-gray-700', 'hover:bg-white/60');
            });

            // Show selected tab content
            document.getElementById(`content-${tabName}`).classList.remove('hidden');

            // Add active class to selected tab button
            const activeButton = document.getElementById(`tab-${tabName}`);
            activeButton.classList.add('bg-gradient-to-r', 'from-green-500', 'to-emerald-600', 'text-white', 'shadow-lg');
            activeButton.classList.remove('text-gray-700', 'hover:bg-white/60');

            // Initialize charts when tab is shown
            if (tabName === 'tagihan') {
                initTagihanChart();
            } else if (tabName === 'saldo') {
                initSaldoChart();
            }
        }

        // Chart data from PHP
        const chartTagihanData = @json($chartTagihan);
        const chartSaldoData = @json($chartSaldo);

        // Prepare chart data
        function prepareChartData() {
            const months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'];

            // Prepare tagihan data
            const tagihanData = [];
            for (let i = 1; i <= 12; i++) {
                const monthData = chartTagihanData.find(item => parseInt(item.bulan) === i);
                tagihanData.push(monthData ? parseInt(monthData.total) : 0);
            }

            // Prepare saldo data
            const saldoData = [];
            for (let i = 1; i <= 12; i++) {
                const monthData = chartSaldoData.find(item => parseInt(item.bulan) === i);
                saldoData.push(monthData ? parseInt(monthData.total) : 0);
            }

            return {
                labels: months,
                tagihan: tagihanData,
                saldo: saldoData
            };
        }

        let tagihanChart = null;
        let saldoChart = null;

        function initTagihanChart() {
            const ctx = document.getElementById('tagihanChart');
            if (!ctx) return;

            if (tagihanChart) {
                tagihanChart.destroy();
            }

            const chartData = prepareChartData();

            tagihanChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: chartData.labels,
                    datasets: [{
                        label: 'Jumlah Tagihan',
                        data: chartData.tagihan,
                        backgroundColor: 'rgba(16, 185, 129, 0.8)',
                        borderColor: '#10b981',
                        borderWidth: 2,
                        borderRadius: 8,
                        borderSkipped: false
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return `${context.dataset.label}: ${context.raw}`;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)'
                            },
                            ticks: {
                                font: {
                                    family: "'Outfit', sans-serif"
                                },
                                color: '#6b7280'
                            }
                        },
                        x: {
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)'
                            },
                            ticks: {
                                font: {
                                    family: "'Outfit', sans-serif"
                                },
                                color: '#6b7280'
                            }
                        }
                    }
                }
            });
        }

        function initSaldoChart() {
            const ctx = document.getElementById('saldoChart');
            if (!ctx) return;

            if (saldoChart) {
                saldoChart.destroy();
            }

            const chartData = prepareChartData();

            saldoChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: chartData.labels,
                    datasets: [{
                        label: 'Saldo Bersih',
                        data: chartData.saldo,
                        backgroundColor: 'rgba(16, 185, 129, 0.1)',
                        borderColor: '#10b981',
                        borderWidth: 3,
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const value = context.raw;
                                    const formatted = new Intl.NumberFormat('id-ID', {
                                        style: 'currency',
                                        currency: 'IDR',
                                        minimumFractionDigits: 0
                                    }).format(value);
                                    return `Saldo: ${formatted}`;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: false,
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)'
                            },
                            ticks: {
                                font: {
                                    family: "'Outfit', sans-serif"
                                },
                                color: '#6b7280',
                                callback: function(value) {
                                    if (value >= 1000000 || value <= -1000000) {
                                        return 'Rp ' + (value / 1000000).toFixed(1) + 'jt';
                                    } else if (value >= 1000 || value <= -1000) {
                                        return 'Rp ' + (value / 1000).toFixed(0) + 'rb';
                                    }
                                    return 'Rp ' + value;
                                }
                            }
                        },
                        x: {
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)'
                            },
                            ticks: {
                                font: {
                                    family: "'Outfit', sans-serif"
                                },
                                color: '#6b7280'
                            }
                        }
                    }
                }
            });
        }

        // Auto hide flash messages after 5 seconds
        setTimeout(() => {
            const successMsg = document.getElementById('successMessage');
            if (successMsg) successMsg.style.display = 'none';
        }, 5000);

        // Initialize charts on page load
        document.addEventListener('DOMContentLoaded', function() {
            initTagihanChart();

            // Add form submission loading
            const filterForm = document.getElementById('filterForm');
            if (filterForm) {
                filterForm.addEventListener('submit', function() {
                    const submitBtn = this.querySelector('button[type="submit"]');
                    if (submitBtn) {
                        submitBtn.innerHTML = '<i class="ri-loader-4-line animate-spin mr-2"></i> Memproses...';
                        submitBtn.disabled = true;
                    }
                });
            }
        });
    </script>

</body>

</html>
