@extends('layouts.app')
@section('title', 'Manajemen Tagihan')
@section('content')
    <!-- Form Container -->
    <div class="bg-white/70 backdrop-blur-xl rounded-2xl shadow-xl shadow-green-500/10 border border-white/50 overflow-hidden mb-8"
        data-aos="fade-up" data-aos-delay="200">
        <!-- Form Header -->
        <div class="bg-gradient-to-r from-emerald-500 to-emerald-600 px-6 py-5 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/2"></div>
            <div class="relative z-10 flex items-center">
                <div
                    class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center mr-4 border border-white/30 shadow-lg">
                    <i class="ri-file-add-line text-white text-2xl"></i>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-white font-display">Form Buat Tagihan</h2>
                    <p class="text-emerald-100 text-sm mt-1">Tagihan akan dibuat untuk semua kelas yang terdaftar</p>
                </div>
            </div>
        </div>

        <!-- Form Content -->
        <div class="p-6">
            <form action="{{ route('admin.tagihan.store') }}" method="POST" id="tagihanForm">
                @csrf

                <!-- Informasi Tagihan -->
                <div class="mb-8">
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 bg-emerald-100 rounded-xl flex items-center justify-center mr-3">
                            <i class="ri-information-line text-emerald-600 text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 font-display">Informasi Tagihan</h3>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nama Tagihan -->
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-3">
                                <span class="text-red-500">*</span> Nama Tagihan
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="ri-file-text-line text-gray-800 text-xl"></i>
                                </div>
                                <input type="text" name="nama_tagihan" value="{{ old('nama_tagihan') }}" required
                                    class="w-full pl-12 pr-4 py-4 bg-white/60 backdrop-blur-sm border-2 border-gray-200 rounded-xl focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition-all duration-300 outline-none font-semibold"
                                    placeholder="Contoh: Infaq Jumat/1-Januari" autocomplete="off">
                            </div>
                            <p class="text-xs text-gray-400">
                                Gunakan nama yang unik agar tidak bentrok dengan tagihan lain.
                            </p>
                        </div>
                        <!-- Jenis Tagihan -->
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-3">
                                <span class="text-red-500">*</span> Jenis Tagihan
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="ri-bill-line text-gray-800 text-xl"></i>
                                </div>
                                <select name="jenis" id="jenis" required
                                    class="w-full pl-12 pr-12 py-4 bg-white/60 backdrop-blur-sm
                                            border-2 border-gray-200 rounded-xl
                                            focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10
                                            transition-all duration-300 outline-none font-semibold
                                            appearance-none">
                                    <option value="" disabled selected>Pilih jenis tagihan</option>
                                    <option value="infaq">Infaq</option>
                                    <option value="sosial">Sosial</option>
                                    <option value="kegiatan">Kegiatan</option>
                                </select>
                            </div>
                        </div>
                        <!-- Jumlah -->
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-3">
                                <span class="text-red-500">*</span> Jumlah (Rp)
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="ri-money-dollar-circle-line text-gray-800 text-xl"></i>
                                </div>
                                <input type="number" name="jumlah" value="{{ old('jumlah') }}" required min="0"
                                    class="w-full pl-12 pr-4 py-4 bg-white/60 backdrop-blur-sm border-2 border-gray-200 rounded-xl focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition-all duration-300 outline-none font-semibold"
                                    placeholder="50000" autocomplete="off">
                            </div>
                        </div>
                        <!-- Jatuh Tempo -->
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-3">
                                <span class="text-red-500">*</span> Jatuh Tempo
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="ri-calendar-line text-gray-800 text-xl"></i>
                                </div>
                                <input type="date" name="jatuh_tempo" value="{{ old('jatuh_tempo') }}" required
                                    class="w-full pl-12 pr-4 py-4 bg-white/60 backdrop-blur-sm border-2 border-gray-200 rounded-xl focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition-all duration-300 outline-none font-semibold cursor-pointer">
                            </div>
                        </div>
                        <!-- Keterangan -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-gray-700 mb-3">
                                Deskripsi / Keterangan
                            </label>
                            <div class="relative">
                                <textarea name="keterangan" rows="4"
                                    class="w-full px-4 py-4 bg-white/60 backdrop-blur-sm border-2 border-gray-200 rounded-xl focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition-all duration-300 outline-none resize-none"
                                    placeholder="Tambahkan keterangan tentang tagihan ini (opsional)">{{ old('keterangan') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                    <a href="{{ route('admin.tagihan.index') }}"
                        class="px-6 py-3 bg-white/60 backdrop-blur-sm border-2 border-gray-200 text-gray-700 font-bold rounded-xl hover:bg-white hover:border-gray-300 transition-all duration-300 flex items-center shadow-md hover:shadow-lg">
                        <i class="ri-close-line mr-2 text-xl"></i> Batal
                    </a>
                    <button type="submit"
                        class="px-6 py-3 bg-gradient-to-r from-emerald-600 to-emerald-600 text-white font-bold rounded-xl shadow-lg shadow-emerald-500/50 hover:shadow-xl hover:shadow-emerald-500/60 transform hover:-translate-y-0.5 transition-all duration-300 flex items-center">
                        <i class="ri-save-line mr-2 text-xl"></i> Simpan Tagihan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Daftar Tagihan -->
    <div class="bg-white/70 backdrop-blur-xl rounded-2xl shadow-xl shadow-green-500/10 border border-white/50 overflow-hidden"
        data-aos="fade-up" data-aos-delay="400">
        <div class="px-6 py-5 bg-gradient-to-r from-gray-50 to-green-50/30 border-b border-gray-200">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                <!-- Left Section: Title and Info -->
                <div class="flex items-center">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center mr-3 shadow-md">
                        <i class="ri-file-list-3-line text-white text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-800 font-display">Semua Tagihan</h3>
                        <p class="text-sm text-gray-600">Daftar semua tagihan yang telah dibuat</p>
                    </div>
                </div>

                <!-- Right Section: Filters and Search -->
                <div class="flex flex-col sm:flex-row gap-3">
                    <!-- Search Input -->
                    <div class="relative flex-1">
                        <input type="text" id="searchInput"
                            class="w-full p-3 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white/80 backdrop-blur-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-300"
                            placeholder="Cari nama tagihan atau kelas...">
                        <i class="ri-search-line absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    </div>

                    <!-- Filter Controls -->
                    <div class="flex gap-2">
                        <!-- Month Filter -->
                        <div class="relative">
                            <select id="filterMonth"
                                class="w-full p-3 pl-10 text-sm border border-gray-300 rounded-lg bg-white/80 backdrop-blur-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-300 appearance-none cursor-pointer">
                                <option value="">Semua Bulan</option>
                                @for ($m = 1; $m <= 12; $m++)
                                    <option value="{{ $m }}">
                                        {{ \Carbon\Carbon::create()->month($m)->translatedFormat('F') }}
                                    </option>
                                @endfor
                            </select>
                            <i
                                class="ri-calendar-line absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                            <i
                                class="ri-arrow-down-s-line absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                        </div>

                        <!-- Year Filter -->
                        <div class="relative">
                            <select id="filterYear"
                                class="w-full p-3 pl-10 text-sm border border-gray-300 rounded-lg bg-white/80 backdrop-blur-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-300 appearance-none cursor-pointer">
                                <option value="">Semua Tahun</option>
                                @foreach ($tagihans->pluck('jatuh_tempo')->map(fn($d) => \Carbon\Carbon::parse($d)->year)->unique() as $year)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endforeach
                            </select>
                            <i
                                class="ri-calendar-2-line absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                            <i
                                class="ri-arrow-down-s-line absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                        </div>
                    </div>
                    <button onclick="printTagihan()"
                        class="px-4 py-2 bg-emerald-600 text-white rounded-xl shadow hover:bg-emerald-700 transition">
                        <i class="ri-printer-line mr-1"></i> Print
                    </button>
                </div>
            </div>
        </div>

        @if ($tagihans->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200" id="tagihanTable">
                    <thead class="bg-gradient-to-r from-gray-50 to-green-50/30">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">No
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Nama
                                Tagihan</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Jatuh
                                Tempo</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Jenis
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Status
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                                Nominal
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                                Progress</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody id="tagihanBody" class="bg-white/40 backdrop-blur-sm divide-y divide-gray-200">
                        @foreach ($tagihans as $index => $tagihan)
                            <tr class="hover:bg-white/60 transition-all duration-200 tagihan-row"
                                data-nama="{{ strtolower($tagihan->nama_tagihan) }}"
                                data-bulan="{{ \Carbon\Carbon::parse($tagihan->jatuh_tempo)->month }}"
                                data-tahun="{{ \Carbon\Carbon::parse($tagihan->jatuh_tempo)->year }}">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-500 text-center">
                                    {{ $index + 1 }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="font-bold text-gray-900">{{ $tagihan->nama_tagihan }}</div>
                                    <div class="text-xs text-gray-500 flex items-center mt-1">
                                        <i class="ri-calendar-line mr-1"></i>
                                        {{ \Carbon\Carbon::parse($tagihan->jatuh_tempo)->format('d M Y') }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <i class="ri-time-line text-gray-800 mr-2"></i>
                                        <span
                                            class="text-sm font-semibold text-gray-900">{{ \Carbon\Carbon::parse($tagihan->jatuh_tempo)->format('d M Y') }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <i class="ri-bill-line text-gray-800 mr-2"></i>
                                        <span class="text-sm font-semibold text-gray-900">{{ $tagihan->jenis }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @php
                                        $percentage =
                                            $tagihan->total_kelas > 0
                                                ? round(($tagihan->selesai / $tagihan->total_kelas) * 100)
                                                : 0;
                                    @endphp
                                    @if ($percentage == 100)
                                        <span
                                            class="inline-flex items-center px-3 py-1.5 rounded-xl text-xs font-bold bg-gradient-to-r from-green-500 to-emerald-600 text-white shadow-md">
                                            <i class="ri-checkbox-circle-line mr-1.5"></i>
                                            Selesai 100%
                                        </span>
                                    @elseif($percentage > 0)
                                        <span
                                            class="inline-flex items-center px-3 py-1.5 rounded-xl text-xs font-bold bg-gradient-to-r from-yellow-500 to-amber-600 text-white shadow-md">
                                            <i class="ri-progress-4-line mr-1.5"></i>
                                            {{ $percentage }}% Selesai
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center px-3 py-1.5 rounded-xl text-xs font-bold bg-gradient-to-r from-gray-500 to-slate-600 text-white shadow-md">
                                            <i class="ri-time-line mr-1.5"></i>
                                            Aktif
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-emerald-600">
                                    Rp {{ number_format($tagihan->jumlah, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="w-32">
                                        <div class="w-full bg-gray-200 rounded-full h-3 overflow-hidden">
                                            <div class="bg-gradient-to-r from-green-500 to-emerald-600 h-3 rounded-full transition-all duration-500"
                                                style="width: {{ $percentage }}%"></div>
                                        </div>
                                        <div class="text-xs text-gray-600 mt-1.5 text-center font-semibold">
                                            {{ $tagihan->selesai }} / {{ $tagihan->total_kelas }}
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('admin.tagihan.show', $tagihan->nama_tagihan) }}"
                                            class="p-2 bg-emerald-50 hover:bg-emerald-100 text-emerald-600 rounded-lg transition-all duration-300 hover:shadow-md group"
                                            title="Lihat Detail">
                                            <i class="ri-eye-line text-lg group-hover:scale-110 transition-transform"></i>
                                        </a>
                                        <form action="{{ route('admin.tagihan.delete', $tagihan->nama_tagihan) }}"
                                            method="POST" class="inline"
                                            onsubmit="return confirm('Hapus tagihan {{ $tagihan->nama_tagihan }}?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="p-2 bg-red-50 hover:bg-red-100 text-red-600 rounded-lg transition-all duration-300 hover:shadow-md group"
                                                title="Hapus">
                                                <i
                                                    class="ri-delete-bin-line text-lg group-hover:scale-110 transition-transform"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $tagihans->links() }}
                </div>
            </div>
        @else
            <div class="text-center py-16">
                <div class="w-20 h-20 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="ri-file-list-3-line text-gray-800 text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2 font-display">Belum ada tagihan</h3>
                <p class="text-gray-500 mb-6">Buat tagihan pertama Anda untuk mengelola pembayaran kas sekolah</p>
            </div>
        @endif
    </div>
@endsection
@push('scripts')
    <script>
        const searchInput = document.getElementById('searchInput');
        const filterMonth = document.getElementById('filterMonth');
        const filterYear = document.getElementById('filterYear');
        const rows = document.querySelectorAll('.tagihan-row');

        function filterTable() {
            const search = searchInput.value.toLowerCase();
            const month = filterMonth.value;
            const year = filterYear.value;

            rows.forEach(row => {
                const nama = row.dataset.nama;
                const rowMonth = row.dataset.bulan;
                const rowYear = row.dataset.tahun;

                const matchSearch = nama.includes(search);
                const matchMonth = !month || month === rowMonth;
                const matchYear = !year || year === rowYear;

                row.style.display = (matchSearch && matchMonth && matchYear) ?
                    '' :
                    'none';
            });
        }

        searchInput.addEventListener('input', filterTable);
        filterMonth.addEventListener('change', filterTable);
        filterYear.addEventListener('change', filterTable);
    </script>

    <script>
        function printTagihan() {
            const rows = document.querySelectorAll('#tagihanBody tr');
            let printedRows = '';

            rows.forEach((row, index) => {
                if (row.style.display !== 'none') {
                    const cells = row.querySelectorAll('td');

                    printedRows += `
                <tr>
                    <td>${index + 1}</td>
                    <td>${cells[1].innerText}</td>
                    <td>${cells[2].innerText}</td>
                    <td>${cells[3].innerText}</td>
                    <td>${cells[5].innerText}</td>
                </tr>
            `;
                }
            });

            if (printedRows === '') {
                alert('Tidak ada data untuk dicetak');
                return;
            }

            const printWindow = window.open('', '', 'width=900,height=600');

            printWindow.document.write(`
        <html>
        <head>
            <title>Data Tagihan</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    padding: 20px;
                }
                h2 {
                    text-align: center;
                    margin-bottom: 20px;
                }
                table {
                    width: 100%;
                    border-collapse: collapse;
                    font-size: 12px;
                }
                th, td {
                    border: 1px solid #000;
                    padding: 6px;
                }
                th {
                    background: #f3f4f6;
                }
            </style>
        </head>
        <body>
            <h2>Data Tagihan</h2>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Tagihan</th>
                        <th>Jatuh Tempo</th>
                        <th>Jenis</th>
                        <th>Nominal</th>
                    </tr>
                </thead>
                <tbody>
                    ${printedRows}
                </tbody>
            </table>
        </body>
        </html>
    `);

            printWindow.document.close();
            printWindow.focus();
            printWindow.print();
        }
    </script>
@endpush
