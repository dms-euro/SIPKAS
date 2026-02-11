<!DOCTYPE html>
<!-- resources/views/kelas/dashboard.blade.php -->
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Kelas - Kas Sekolah</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- Remix Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Outfit', sans-serif;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-slate-50 via-green-50/30 to-emerald-50/50 min-h-screen">

    <!-- Navbar -->
    <nav class="bg-white/80 backdrop-blur-xl border-b border-white/50 shadow-lg sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-3">
                    <div
                        class="w-10 h-10 bg-gradient-to-br from-green-600 to-emerald-600 rounded-lg flex items-center justify-center shadow-md">
                        <i class="ri-bank-line text-white text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-lg font-bold text-gray-800">Kas Sekolah</h1>
                        <p class="text-xs text-gray-500">Portal Kelas</p>
                    </div>
                </div>

                <div class="flex items-center space-x-3">
                    <div class="hidden sm:flex items-center space-x-2 bg-white/60 rounded-lg px-3 py-2">
                        <div
                            class="h-8 w-8 bg-gradient-to-br from-green-500 to-emerald-600 rounded-lg flex items-center justify-center text-white font-bold text-xs">
                            {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800 text-sm">{{ auth()->user()->name }}</p>
                            <p class="text-xs text-gray-500">{{ auth()->user()->email }}</p>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="p-2 bg-red-50 hover:bg-red-100 text-red-600 rounded-lg transition-all">
                            <i class="ri-logout-box-line text-xl"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-6xl mx-auto px-4 sm:px-6 py-6 sm:py-8">

        <!-- Welcome -->
        <div class="bg-white/70 backdrop-blur-xl rounded-xl shadow-lg border border-white/50 p-4 sm:p-6 mb-6">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-1">
                Halo, {{ auth()->user()->name }}! 👋
            </h2>
            <p class="text-gray-600 text-sm sm:text-base">{{ now()->translatedFormat('l, d F Y') }}</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
            <!-- Pemasukan -->
            <div class="bg-white/70 backdrop-blur-xl rounded-xl shadow-lg border border-white/50 p-4 sm:p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-500 font-semibold uppercase mb-1">Pemasukan</p>
                        <p class="text-xl sm:text-2xl font-bold text-green-600">
                            Rp {{ number_format($totalPemasukan, 0, ',', '.') }}
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                        <i class="ri-arrow-up-line text-green-600 text-2xl"></i>
                    </div>
                </div>
            </div>

            <!-- Pengeluaran -->
            <div class="bg-white/70 backdrop-blur-xl rounded-xl shadow-lg border border-white/50 p-4 sm:p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-500 font-semibold uppercase mb-1">Pengeluaran</p>
                        <p class="text-xl sm:text-2xl font-bold text-red-600">
                            Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                        <i class="ri-arrow-down-line text-red-600 text-2xl"></i>
                    </div>
                </div>
            </div>

            <!-- Saldo -->
            <div class="bg-white/70 backdrop-blur-xl rounded-xl shadow-lg border border-white/50 p-4 sm:p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-500 font-semibold uppercase mb-1">Total Saldo</p>
                        <p class="text-xl sm:text-2xl font-bold text-blue-600">
                            Rp {{ number_format($saldoAkhir, 0, ',', '.') }}
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                        <i class="ri-wallet-line text-blue-600 text-2xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tagihan -->
        <div class="bg-white/70 backdrop-blur-xl rounded-xl shadow-lg border border-white/50 overflow-hidden mb-6">
            <div class="px-4 sm:px-6 py-4 bg-gradient-to-r from-green-500 to-emerald-600">
                <h3 class="text-lg sm:text-xl font-bold text-white flex items-center">
                    <i class="ri-bill-line mr-2"></i>
                    Daftar Tagihan
                </h3>
            </div>

            @if ($tagihans->count() > 0)
                <!-- Desktop Table -->
                <div class="hidden sm:block overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">Nama Tagihan
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">Jenis</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">Jatuh Tempo
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">Jumlah</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($tagihans as $tagihan)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        <div class="font-semibold text-gray-900">{{ $tagihan->nama_tagihan }}</div>
                                        @if ($tagihan->keterangan)
                                            <div class="text-xs text-gray-500 mt-1">
                                                {{ Str::limit($tagihan->keterangan, 40) }}</div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="px-2 py-1 text-xs font-semibold bg-purple-100 text-purple-700 rounded">
                                            {{ $tagihan->jenis }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-600">
                                        {{ \Carbon\Carbon::parse($tagihan->jatuh_tempo)->format('d M Y') }}
                                    </td>
                                    <td class="px-6 py-4 font-bold text-blue-600">
                                        Rp {{ number_format($tagihan->jumlah, 0, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($tagihan->status == 'selesai')
                                            <span
                                                class="px-3 py-1 text-xs font-bold bg-green-100 text-green-700 rounded-full">
                                                <i class="ri-checkbox-circle-line"></i> Lunas
                                            </span>
                                        @else
                                            <span
                                                class="px-3 py-1 text-xs font-bold bg-orange-100 text-orange-700 rounded-full">
                                                <i class="ri-time-line"></i> Belum Bayar
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Mobile Cards -->
                <div class="sm:hidden divide-y divide-gray-200">
                    @foreach ($tagihans as $tagihan)
                        <div class="p-4">
                            <div class="flex justify-between items-start mb-2">
                                <div class="flex-1">
                                    <h4 class="font-bold text-gray-900 mb-1">{{ $tagihan->nama_tagihan }}</h4>
                                    <span class="px-2 py-1 text-xs font-semibold bg-purple-100 text-purple-700 rounded">
                                        {{ $tagihan->jenis }}
                                    </span>
                                </div>
                                @if ($tagihan->status == 'selesai')
                                    <span class="px-2 py-1 text-xs font-bold bg-green-100 text-green-700 rounded-full">
                                        Lunas
                                    </span>
                                @else
                                    <span
                                        class="px-2 py-1 text-xs font-bold bg-orange-100 text-orange-700 rounded-full">
                                        Pending
                                    </span>
                                @endif
                            </div>
                            <div class="mt-2 space-y-1 text-sm">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Jatuh Tempo:</span>
                                    <span
                                        class="font-semibold">{{ \Carbon\Carbon::parse($tagihan->jatuh_tempo)->format('d M Y') }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Jumlah:</span>
                                    <span class="font-bold text-blue-600">Rp
                                        {{ number_format($tagihan->jumlah, 0, ',', '.') }}</span>
                                </div>
                                @if ($tagihan->keterangan)
                                    <div class="pt-2 text-xs text-gray-500 border-t mt-2">
                                        {{ $tagihan->keterangan }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <i class="ri-file-list-3-line text-gray-300 text-5xl mb-3"></i>
                    <p class="text-gray-500">Belum ada tagihan</p>
                </div>
            @endif
        </div>

        <footer class="text-center py-6 text-gray-500 text-sm" data-aos="fade-up" data-aos-delay="400">
            <div class="container mx-auto px-4 text-center">
                <!-- Baris Atas: Credit Developer dengan Link -->
                <div class="mb-3 flex items-center justify-center space-x-2 text-sm">
                    <span class="text-gray-600">Segelas</span>
                    <span class="text-red-500 text-lg leading-none"><i class="ri-cup-fill"></i></span>
                    <span class="text-gray-600">untuk</span>
                    <a href="https://github.com/dms-euro" target="_blank" rel="noopener noreferrer"
                        class="group inline-flex items-center gap-1.5 font-semibold text-indigo-600 transition-all duration-300 hover:text-indigo-800 hover:underline underline-offset-2">
                        <i class="ri-github-fill text-lg"></i>
                        <span>dms-euro</span>
                        <i
                            class="ri-external-link-line text-xs opacity-0 transition-opacity group-hover:opacity-100"></i>
                    </a>
                </div>

                <!-- Baris Tengah: Hak Cipta Dinamis dan Nama Aplikasi -->
                <p class="text-gray-500 text-xs sm:text-sm">
                    <i class="ri-copyright-line mr-0.5 inline align-middle"></i>
                    <span id="footerYear" class="inline align-middle"></span>
                    <span class="mx-1 align-middle">·</span>
                    <span class="font-medium text-gray-700 align-middle">SIPKAS</span>
                    <span class="mx-1 align-middle hidden xs:inline">·</span>
                    <span class="align-middle block xs:inline text-gray-400">Sistem Informasi Kas Sekolah</span>
                </p>
            </div>
        </footer>

    </main>

</body>

</html>
