@extends('layouts.app')
@section('title', 'Manajemen Tagiha')
@section('content')
    <!-- Header Informasi Tagihan -->
    <div class="bg-white/70 backdrop-blur-xl rounded-2xl shadow-xl shadow-green-500/10 border border-white/50 overflow-hidden mb-8"
        data-aos="fade-up" data-aos-delay="200">
        <div class="bg-gradient-to-r from-green-500 to-emerald-600 px-6 py-5 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/2">
            </div>
            <div class="relative z-10 flex items-center">
                <div
                    class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center mr-4 border border-white/30 shadow-lg">
                    <i class="ri-bill-line text-white text-2xl"></i>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-white font-display">{{ $nama_tagihan }}</h2>
                    <p class="text-green-100 text-sm mt-1">
                        {{ $selesai }} selesai • {{ $pending }} pending • Total
                        {{ $tagihans->count() }} kelas
                    </p>
                </div>
            </div>
        </div>

        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-gradient-to-br from-green-50 to-emerald-50/50 rounded-xl p-4 border border-green-100">
                    <div class="flex items-center mb-2">
                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="ri-calendar-line text-green-600"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Jatuh Tempo</p>
                            <p class="text-lg font-bold text-gray-800">
                                @if ($firstTagihan)
                                    {{ \Carbon\Carbon::parse($firstTagihan->jatuh_tempo)->format('d M Y') }}
                                @else
                                    -
                                @endif
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-blue-50 to-sky-50/50 rounded-xl p-4 border border-blue-100">
                    <div class="flex items-center mb-2">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="ri-money-dollar-circle-line text-blue-600"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Nilai Tagihan / Kelas</p>
                            <p class="text-lg font-bold text-gray-800">
                                Rp {{ number_format($jumlahPerKelas, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-purple-50 to-violet-50/50 rounded-xl p-4 border border-purple-100">
                    <div class="flex items-center mb-2">
                        <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="ri-loader-4-line animate-spin text-purple-600"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Progress Pembayaran</p>
                            <div class="flex items-center">
                                <div class="w-full bg-gray-200 rounded-full h-2.5 mr-3">
                                    <div class="bg-gradient-to-r from-green-500 to-emerald-600 h-2.5 rounded-full transition-all duration-500"
                                        style="width: {{ $percentage }}%"></div>
                                </div>
                                <span class="text-sm font-bold text-green-600">{{ $percentage }}%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if ($firstTagihan && $firstTagihan->keterangan)
                <div class="bg-gradient-to-br from-gray-50 to-slate-50/50 rounded-xl p-4 border border-gray-200">
                    <h3 class="text-sm font-bold text-gray-700 mb-2 flex items-center">
                        <i class="ri-information-line mr-2 text-gray-500"></i> Keterangan:
                    </h3>
                    <p class="text-gray-600">{{ $firstTagihan->keterangan }}</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Statistik Ringkas -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8" data-aos="fade-up" data-aos-delay="300">
        <div class="bg-white/70 backdrop-blur-xl rounded-2xl shadow-xl shadow-green-500/10 border border-white/50 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Total Kelas</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $tagihans->count() }}</p>
                </div>
                <div
                    class="w-12 h-12 bg-gradient-to-br from-blue-500 to-sky-600 rounded-xl flex items-center justify-center shadow-md">
                    <i class="ri-group-line text-white text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white/70 backdrop-blur-xl rounded-2xl shadow-xl shadow-green-500/10 border border-white/50 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Selesai</p>
                    <p class="text-2xl font-bold text-green-600">{{ $selesai }}</p>
                    <p class="text-xs text-gray-500 mt-1">
                        Rp {{ number_format($selesai * $jumlahPerKelas, 0, ',', '.') }}
                    </p>
                </div>
                <div
                    class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center shadow-md">
                    <i class="ri-checkbox-circle-line text-white text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Daftar Tagihan per Kelas -->
    <div class="bg-white/70 backdrop-blur-xl rounded-2xl shadow-xl shadow-green-500/10 border border-white/50 overflow-hidden"
        data-aos="fade-up" data-aos-delay="400">
        <div
            class="px-6 py-5 bg-gradient-to-r from-gray-50 to-green-50/30 border-b border-gray-200 flex justify-between items-center">
            <div class="flex items-center">
                <div
                    class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center mr-3 shadow-md">
                    <i class="ri-file-list-3-line text-white text-xl"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-gray-800 font-display">Daftar Tagihan per Kelas</h3>
                    <p class="text-sm text-gray-600">Detail status pembayaran setiap kelas</p>
                </div>
            </div>
            <div class="flex space-x-3">
                <button onclick="printTable()"
                    class="px-6 py-3 bg-white/60 backdrop-blur-sm border-2 border-gray-200 text-gray-700 font-bold rounded-xl hover:bg-white hover:border-gray-300 transition-all duration-300 flex items-center shadow-md hover:shadow-lg">
                    <i class="ri-printer-line mr-2"></i> Cetak
                </button>
                <div class="flex space-x-2">
                    <button onclick="filterTable('all')"
                        class="px-4 py-2 text-xs rounded-full bg-primary-100 text-primary-700 font-bold">
                        Semua ({{ $tagihans->count() }})
                    </button>
                    <button onclick="filterTable('selesai')"
                        class="px-4 py-2 text-xs rounded-full bg-green-100 text-green-700 font-bold">
                        Selesai ({{ $selesai }})
                    </button>
                    <button onclick="filterTable('pending')"
                        class="px-4 py-2 text-xs rounded-full bg-yellow-100 text-yellow-700 font-bold">
                        Pending ({{ $pending }})
                    </button>
                </div>
            </div>
        </div>

        @if ($tagihans->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200" id="tagihanTable">
                    <thead class="bg-gradient-to-r from-gray-50 to-green-50/30">
                        <tr>
                            <th
                                class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider text-center">
                                No</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                                Nama Kelas</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                                Email</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                                Jenis</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                                Jumlah</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                                Status</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                                Tanggal Update</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white/40 backdrop-blur-sm divide-y divide-gray-200">
                        @foreach ($tagihans as $index => $tagihan)
                            <tr class="hover:bg-white/60 transition-all duration-200" data-status="{{ $tagihan->status }}">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-500 text-center">
                                    {{ $index + 1 }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div
                                            class="w-10 h-10 bg-gradient-to-br from-green-100 to-emerald-200 rounded-lg flex items-center justify-center mr-3">
                                            <i class="ri-building-2-line text-green-600"></i>
                                        </div>
                                        <div>
                                            <div class="font-bold text-gray-900">
                                                {{ $tagihan->user->name ?? 'Tidak diketahui' }}
                                            </div>
                                            <div class="text-xs text-gray-500">ID: {{ $tagihan->users_id }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                    {{ $tagihan->user->email ?? '-' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                    {{ $tagihan->jenis }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="font-bold text-gray-800">
                                        @php
                                            $saldoKelas = $tagihan->saldo?->sum('saldo') ?? 0;
                                        @endphp
                                        Rp {{ number_format($saldoKelas, 0, ',', '.') }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if ($tagihan->status == 'selesai')
                                        <span
                                            class="inline-flex items-center px-3 py-1.5 rounded-xl text-xs font-bold bg-gradient-to-r from-green-500 to-emerald-600 text-white shadow-md">
                                            <i class="ri-checkbox-circle-line mr-1.5"></i>
                                            Selesai
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center px-3 py-1.5 rounded-xl text-xs font-bold bg-gradient-to-r from-yellow-500 to-amber-600 text-white shadow-md">
                                            <i class="ri-time-line mr-1.5"></i>
                                            Pending
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                    {{ $tagihan->updated_at ? \Carbon\Carbon::parse($tagihan->updated_at)->format('d M Y H:i') : '-' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if ($tagihan->status != 'selesai')
                                        <button type="button"
                                            onclick="konfirmasiSaldo({{ $tagihan->id }}, '{{ $tagihan->user->name ?? $tagihan->users_id }}')"
                                            class="px-4 py-2 bg-gradient-to-r from-green-500 to-emerald-600 text-white font-bold rounded-xl shadow-lg shadow-green-500/50 hover:shadow-xl hover:shadow-green-500/60 transform hover:-translate-y-0.5 transition-all duration-300 flex items-center">
                                            <i class="ri-check-double-line mr-2"></i>
                                            Tandai Selesai
                                        </button>
                                    @else
                                        <span class="text-gray-400 cursor-not-allowed flex items-center">
                                            <i class="ri-check-double-line mr-2"></i>
                                            Sudah Selesai
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-16">
                <div class="w-20 h-20 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="ri-file-list-3-line text-gray-400 text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2 font-display">Data tidak ditemukan</h3>
                <p class="text-gray-500 mb-6">Tidak ada data tagihan untuk ditampilkan</p>
            </div>
        @endif
    </div>
@endsection

@push('scripts')
    <script>
        // Filter tabel berdasarkan status
        function filterTable(status) {
            const rows = document.querySelectorAll('#tagihanTable tbody tr');
            rows.forEach(row => {
                const rowStatus = row.getAttribute('data-status');
                let show = false;

                switch (status) {
                    case 'all':
                        show = true;
                        break;
                    case 'selesai':
                        show = rowStatus === 'selesai';
                        break;
                    case 'pending':
                        show = rowStatus === 'pending';
                        break;
                }
                row.style.display = show ? '' : 'none';
            });
        }

        // Cetak tabel
        function printTable() {
            const printWindow = window.open('', '_blank');
            printWindow.document.write(`
                <html>
                <head>
                    <title>Detail Tagihan - {{ $nama_tagihan }}</title>
                    <style>
                        body { font-family: Arial, sans-serif; margin: 20px; }
                        h1 { color: #333; }
                        .info { margin-bottom: 20px; padding: 15px; background: #f9f9f9; border-radius: 5px; }
                        .info-item { margin-bottom: 5px; }
                        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
                        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
                        th { background-color: #f4f4f4; font-weight: bold; }
                        .selesai { color: green; }
                        .pending { color: orange; }
                        .terlambat { color: red; }
                        .text-right { text-align: right; }
                        .text-center { text-align: center; }
                    </style>
                </head>
                <body>
                    <h1>Detail Tagihan: {{ $nama_tagihan }}</h1>
                    <div class="info">
                        <div class="info-item"><strong>Jatuh Tempo:</strong> {{ $firstTagihan ? \Carbon\Carbon::parse($firstTagihan->jatuh_tempo)->format('d M Y') : '-' }}</div>
                        <div class="info-item"><strong>Jumlah per Kelas:</strong> Rp {{ number_format($jumlahPerKelas, 0, ',', '.') }}</div>
                        <div class="info-item"><strong>Total Kelas:</strong> {{ $tagihans->count() }}</div>
                        <div class="info-item"><strong>Selesai:</strong> {{ $selesai }} | <strong>Pending:</strong> {{ $pending }}</div>
                        <div class="info-item"><strong>Dicetak pada:</strong> ${new Date().toLocaleString('id-ID')}</div>
                    </div>
                    ${document.getElementById('tagihanTable').outerHTML}
                </body>
                </html>
            `);
            printWindow.document.close();
            printWindow.print();
        }

        // Konfirmasi Saldo
        function konfirmasiSaldo(tagihanId, namaKelas) {
            Swal.fire({
                title: 'Konfirmasi Pembayaran',
                html: `
                    <div class="text-left">
                        <p class="mb-3 text-gray-600">
                            Pembayaran dari <b class="text-gray-800">${namaKelas}</b>
                        </p>
                        <div class="mt-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Masukkan saldo (uang masuk)</label>
                            <input type="number" id="saldo"
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-green-500 focus:ring-4 focus:ring-green-500/10 transition-all duration-300 outline-none"
                                placeholder="Contoh: 50000">
                        </div>
                    </div>
                `,
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Simpan',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#10b981',
                cancelButtonColor: '#6b7280',
                preConfirm: () => {
                    const saldo = document.getElementById('saldo').value;
                    if (!saldo || saldo <= 0) {
                        Swal.showValidationMessage('Saldo wajib diisi dan harus lebih dari 0');
                        return false;
                    }
                    return saldo;
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    kirimSaldo(tagihanId, result.value);
                }
            });
        }

        // Kirim saldo ke server
        function kirimSaldo(tagihanId, saldo) {
            fetch(`/tagihan/selesai/${tagihanId}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        saldo: saldo
                    })
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Saldo berhasil disimpan',
                        timer: 1500,
                        showConfirmButton: false,
                        background: '#f0fdf4',
                        color: '#065f46'
                    }).then(() => {
                        window.location.reload();
                    });
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Terjadi kesalahan saat menyimpan saldo',
                        background: '#fef2f2',
                        color: '#991b1b'
                    });
                });
        }
    </script>
@endpush
