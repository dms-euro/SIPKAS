@extends('layouts.app');
@section('title', 'Pencatatan Saldo')
@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Total Pemasukan -->
        <div class="bg-white/70 backdrop-blur-xl rounded-2xl shadow-xl shadow-green-500/10 border border-white/50 p-6 hover:shadow-2xl hover:scale-105 transition-all duration-300"
            data-aos="fade-up" data-aos-delay="100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-1">Total Pemasukan
                    </p>
                    <p class="text-3xl font-bold text-green-600 font-display">Rp
                        {{ number_format($totalPemasukan, 0, ',', '.') }}</p>
                    <p class="text-xs text-gray-500 mt-2 flex items-center">
                        <i class="ri-file-list-line mr-1"></i>
                        {{ $saldo->where('tipe', 'pemasukan')->count() }} transaksi
                    </p>
                </div>
                <div
                    class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center shadow-lg">
                    <i class="ri-arrow-up-line text-white text-3xl"></i>
                </div>
            </div>
        </div>

        <!-- Total Pengeluaran -->
        <div class="bg-white/70 backdrop-blur-xl rounded-2xl shadow-xl shadow-red-500/10 border border-white/50 p-6 hover:shadow-2xl hover:scale-105 transition-all duration-300"
            data-aos="fade-up" data-aos-delay="200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-1">Total
                        Pengeluaran</p>
                    <p class="text-3xl font-bold text-red-600 font-display">Rp
                        {{ number_format($totalPengeluaran, 0, ',', '.') }}</p>
                    <p class="text-xs text-gray-500 mt-2 flex items-center">
                        <i class="ri-file-list-line mr-1"></i>
                        {{ $saldo->where('tipe', 'pengeluaran')->count() }} transaksi
                    </p>
                </div>
                <div
                    class="w-16 h-16 bg-gradient-to-br from-red-500 to-pink-600 rounded-2xl flex items-center justify-center shadow-lg">
                    <i class="ri-arrow-down-line text-white text-3xl"></i>
                </div>
            </div>
        </div>

        <!-- Saldo Akhir -->
        <div class="bg-white/70 backdrop-blur-xl rounded-2xl shadow-xl {{ $saldoAkhir >= 0 ? 'shadow-emerald-500/10' : 'shadow-red-500/10' }} border border-white/50 p-6 hover:shadow-2xl hover:scale-105 transition-all duration-300"
            data-aos="fade-up" data-aos-delay="300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-1">Saldo Akhir</p>
                    <p class="text-3xl font-bold {{ $saldoAkhir >= 0 ? 'text-emerald-600' : 'text-red-600' }} font-display">
                        Rp {{ number_format($saldoAkhir, 0, ',', '.') }}
                    </p>
                    <p class="text-xs text-gray-500 mt-2 flex items-center">
                        <i class="ri-file-list-line mr-1"></i>
                        {{ $saldo->count() }} total transaksi
                    </p>
                </div>
                <div
                    class="w-16 h-16 bg-gradient-to-br {{ $saldoAkhir >= 0 ? 'from-emerald-500 to-teal-600' : 'from-red-500 to-orange-600' }} rounded-2xl flex items-center justify-center shadow-lg">
                    <i class="{{ $saldoAkhir >= 0 ? 'ri-wallet-line' : 'ri-alarm-warning-line' }} text-white text-3xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Form Tambah Transaksi -->
    <div class="bg-white/70 backdrop-blur-xl rounded-2xl shadow-xl shadow-green-500/10 border border-white/50 overflow-hidden mb-8"
        data-aos="fade-up" data-aos-delay="400">
        <div class="bg-gradient-to-r from-green-500 to-emerald-600 px-6 py-5 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/2">
            </div>
            <div class="relative z-10 flex items-center">
                <div
                    class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center mr-4 border border-white/30 shadow-lg">
                    <i class="ri-add-circle-line text-white text-2xl"></i>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-white font-display">Tambah Transaksi Manual</h2>
                    <p class="text-green-100 text-sm mt-1">Catat pemasukan dari luar atau pengeluaran untuk
                        keperluan sekolah</p>
                </div>
            </div>
        </div>

        <div class="p-6">
            <form action="{{ route('admin.saldo.store') }}" method="POST" id="transaksiForm">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Tipe Transaksi -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-3">
                            <span class="text-red-500">*</span> Tipe Transaksi
                        </label>
                        <div class="grid grid-cols-2 gap-4">
                            <label class="relative cursor-pointer">
                                <input type="radio" name="tipe" value="pemasukan" class="peer sr-only" checked>
                                <div
                                    class="bg-white/60 backdrop-blur-sm border-2 border-gray-200 rounded-xl p-4 peer-checked:border-green-500 peer-checked:bg-green-50 hover:border-green-300 transition-all duration-300 text-center shadow-md hover:shadow-lg">
                                    <div
                                        class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center mx-auto mb-2">
                                        <i class="ri-arrow-up-line text-green-600 text-xl"></i>
                                    </div>
                                    <span
                                        class="text-sm font-bold text-gray-700 peer-checked:text-green-600">Pemasukan</span>
                                </div>
                            </label>
                            <label class="relative cursor-pointer">
                                <input type="radio" name="tipe" value="pengeluaran" class="peer sr-only">
                                <div
                                    class="bg-white/60 backdrop-blur-sm border-2 border-gray-200 rounded-xl p-4 peer-checked:border-red-500 peer-checked:bg-red-50 hover:border-red-300 transition-all duration-300 text-center shadow-md hover:shadow-lg">
                                    <div
                                        class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center mx-auto mb-2">
                                        <i class="ri-arrow-down-line text-red-600 text-xl"></i>
                                    </div>
                                    <span
                                        class="text-sm font-bold text-gray-700 peer-checked:text-red-600">Pengeluaran</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Jumlah -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-3">
                                <span class="text-red-500">*</span> Jumlah (Rp)
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="ri-money-dollar-circle-line text-gray-600 text-xl"></i>
                                </div>
                                <input type="number" name="saldo" id="saldo" required min="0" step="1000"
                                    class="w-full pl-12 pr-4 py-4 bg-white/60 backdrop-blur-sm border-2 border-gray-200 rounded-xl focus:border-green-500 focus:ring-4 focus:ring-green-500/10 transition-all duration-300 outline-none font-semibold"
                                    placeholder="0">
                            </div>
                        </div>

                        <!-- Jenis-->
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-3">
                                <span class="text-red-500">*</span>Jenis
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="ri-group-line text-gray-600 text-xl"></i>
                                </div>
                                <select name="jenis"
                                    class="w-full pl-12 pr-4 py-4 bg-white/60 backdrop-blur-sm border-2 border-gray-200 rounded-xl focus:border-green-500 focus:ring-4 focus:ring-green-500/10 transition-all duration-300 outline-none font-semibold appearance-none cursor-pointer">
                                    <option value="">-- Pilih Jenis --</option>
                                    @foreach ($jenisOptions as $jenis)
                                        <option value="{{ $jenis }}">{{ ucfirst($jenis) }}</option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                    <i class="ri-arrow-down-s-line text-gray-600"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <!-- Ditujukan ke -->
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-3">
                                <span class="text-red-500">*</span>Pemberi/Penerima
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="ri-group-line text-gray-600 text-xl"></i>
                                </div>
                                <input type="text" name="entities" id="entities" required
                                    class="w-full pl-12 pr-4 py-4 bg-white/60 backdrop-blur-sm border-2 border-gray-200 rounded-xl focus:border-green-500 focus:ring-4 focus:ring-green-500/10 transition-all duration-300 outline-none font-semibold"
                                    placeholder="Pemberi/Penerima">
                                <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                    <i class="ri-user-line text-gray-600"></i>
                                </div>
                            </div>
                            <p class="text-xs text-gray-500 mt-2 flex items-center">
                                <i class="ri-information-line mr-1"></i>
                                Biarkan kosong jika transaksi umum
                            </p>
                        </div>
                        <!-- Tagihan Terkait -->
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-3">
                                Tagihan Terkait
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="ri-bill-line text-gray-600 text-xl"></i>
                                </div>
                                <select name="tagihan_id"
                                    class="w-full pl-12 pr-4 py-4 bg-white/60 backdrop-blur-sm border-2 border-gray-200 rounded-xl focus:border-green-500 focus:ring-4 focus:ring-green-500/10 transition-all duration-300 outline-none font-semibold appearance-none cursor-pointer">
                                    <option value="">-- Pilih Tagihan (Opsional) --</option>
                                    @foreach ($tagihanList as $tagihan)
                                        <option value="{{ $tagihan->id }}">{{ $tagihan->nama_tagihan }}</option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                    <i class="ri-arrow-down-s-line text-gray-600"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Keterangan -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-gray-700 mb-3">
                            <span class="text-red-500">*</span> Keterangan
                        </label>
                        <div class="relative">
                            <textarea name="keterangan" id="keterangan" rows="4" required
                                class="w-full px-4 py-4 bg-white/60 backdrop-blur-sm border-2 border-gray-200 rounded-xl focus:border-green-500 focus:ring-4 focus:ring-green-500/10 transition-all duration-300 outline-none resize-none"
                                placeholder="Contoh: Donasi dari alumni angkatan 2020, Pembelian alat tulis untuk kelas X, dll"></textarea>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200 mt-6">
                    <button type="reset"
                        class="px-6 py-3 bg-white/60 backdrop-blur-sm border-2 border-gray-200 text-gray-700 font-bold rounded-xl hover:bg-white hover:border-gray-300 transition-all duration-300 flex items-center shadow-md hover:shadow-lg">
                        <i class="ri-close-line mr-2 text-xl"></i> Reset Form
                    </button>
                    <button type="submit"
                        class="px-6 py-3 bg-gradient-to-r from-green-600 to-emerald-600 text-white font-bold rounded-xl shadow-lg shadow-green-500/50 hover:shadow-xl hover:shadow-green-500/60 transform hover:-translate-y-0.5 transition-all duration-300 flex items-center">
                        <i class="ri-save-line mr-2 text-xl"></i> Simpan Transaksi
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Daftar Transaksi -->
    <div class="bg-white/70 backdrop-blur-xl rounded-2xl shadow-xl shadow-green-500/10 border border-white/50 overflow-hidden"
        data-aos="fade-up" data-aos-delay="500">
        <div class="px-6 py-5 bg-gradient-to-r from-gray-50 to-green-50/30 border-b border-gray-200">
            <div class="flex items-center">
                <div
                    class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center mr-3 shadow-md">
                    <i class="ri-file-list-3-line text-white text-xl"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-gray-800 font-display">Riwayat Transaksi</h3>
                    <p class="text-sm text-gray-600">Semua catatan pemasukan dan pengeluaran kas sekolah</p>
                </div>
            </div>
        </div>

        @if ($saldo->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200" id="transaksiTable">
                    <thead class="bg-gradient-to-r from-gray-50 to-green-50/30">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                                Tanggal</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                                Tipe</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                                Pemberi/Penerima</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                                Tagihan</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                                Keterangan</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                                Jumlah</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white/40 backdrop-blur-sm divide-y divide-gray-200">
                        @foreach ($saldo as $transaksi)
                            <tr class="hover:bg-white/60 transition-all duration-200">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <i class="ri-calendar-line text-gray-600 mr-2"></i>
                                        <div>
                                            <div class="text-sm font-semibold text-gray-900">
                                                {{ \Carbon\Carbon::parse($transaksi->created_at)->format('d M Y') }}
                                            </div>
                                            <div class="text-xs text-gray-500">
                                                {{ \Carbon\Carbon::parse($transaksi->created_at)->format('H:i') }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if ($transaksi->tipe == 'pemasukan')
                                        <span
                                            class="inline-flex items-center px-3 py-1.5 rounded-xl text-xs font-bold bg-gradient-to-r from-green-500 to-emerald-600 text-white shadow-md">
                                            <i class="ri-arrow-up-line mr-1.5"></i>
                                            Pemasukan
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center px-3 py-1.5 rounded-xl text-xs font-bold bg-gradient-to-r from-red-500 to-pink-600 text-white shadow-md">
                                            <i class="ri-arrow-down-line mr-1.5"></i>
                                            Pengeluaran
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    @if (!empty($transaksi->entities))
                                        {{ $transaksi->entities }}
                                    @elseif ($transaksi->tagihan && $transaksi->tagihan->user)
                                        {{ $transaksi->tagihan->user->name }}
                                    @else
                                        Umum
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if ($transaksi->tagihan)
                                        <div class="text-sm font-semibold text-gray-900">
                                            {{ $transaksi->tagihan->nama_tagihan }}</div>
                                    @else
                                        <span class="text-gray-600 text-sm">-</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="max-w-xs text-sm text-gray-700" title="{{ $transaksi->keterangan }}">
                                        {{ Str::limit($transaksi->keterangan, 50) }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div
                                        class="text-sm font-bold {{ $transaksi->tipe == 'pemasukan' ? 'text-green-600' : 'text-red-600' }}">
                                        {{ $transaksi->tipe == 'pemasukan' ? '+' : '-' }}
                                        Rp {{ number_format($transaksi->saldo, 0, ',', '.') }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <form action="{{ route('admin.saldo.destroy', $transaksi->id) }}" method="POST"
                                        onsubmit="return confirm('Hapus transaksi ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="p-2 bg-red-50 hover:bg-red-100 text-red-600 rounded-lg transition-all duration-300 hover:shadow-md group"
                                            title="Hapus">
                                            <i
                                                class="ri-delete-bin-line text-lg group-hover:scale-110 transition-transform"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="bg-gradient-to-r from-green-500 to-emerald-600">
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-right text-sm font-bold text-white">
                                Total Saldo Akhir:
                            </td>
                            <td colspan="2" class="px-6 py-4 text-sm font-bold text-white">
                                Rp {{ number_format($saldoAkhir, 0, ',', '.') }}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        @else
            <div class="text-center py-16">
                <div class="w-20 h-20 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="ri-file-list-3-line text-gray-600 text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2 font-display">Belum ada transaksi</h3>
                <p class="text-gray-500">Mulai catat transaksi pertama Anda menggunakan form di atas</p>
            </div>
        @endif
    </div>
@endsection

@push('scripts')
    <script>
        // Print Function
        function printTable() {
            const printWindow = window.open('', '_blank');
            printWindow.document.write(`
                <html>
                <head>
                    <title>Laporan Transaksi Kas Sekolah</title>
                    <style>
                        body { font-family: 'Arial', sans-serif; margin: 30px; }
                        h1 { color: #059669; text-align: center; margin-bottom: 30px; }
                        .info { margin-bottom: 30px; padding: 20px; background: #f0fdf4; border-radius: 10px; border-left: 4px solid #059669; }
                        .info-item { margin-bottom: 8px; font-size: 14px; }
                        .info-item strong { color: #047857; }
                        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
                        th, td { border: 1px solid #d1d5db; padding: 12px; text-align: left; font-size: 13px; }
                        th { background-color: #059669; color: white; font-weight: bold; }
                        .pemasukan { color: #059669; font-weight: bold; }
                        .pengeluaran { color: #dc2626; font-weight: bold; }
                        .total-row { font-weight: bold; background-color: #ecfdf5; border-top: 2px solid #059669; }
                        .text-center { text-align: center; }
                    </style>
                </head>
                <body>
                    <h1>📊 Laporan Transaksi Kas Sekolah</h1>
                    <div class="info">
                        <div class="info-item"><strong>Total Pemasukan:</strong> Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</div>
                        <div class="info-item"><strong>Total Pengeluaran:</strong> Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}</div>
                        <div class="info-item"><strong>Saldo Akhir:</strong> Rp {{ number_format($saldoAkhir, 0, ',', '.') }}</div>
                        <div class="info-item"><strong>Total Transaksi:</strong> {{ $saldo->count() }} transaksi</div>
                        <div class="info-item"><strong>Dicetak pada:</strong> ${new Date().toLocaleString('id-ID')}</div>
                    </div>
                    ${document.getElementById('transaksiTable').outerHTML}
                </body>
                </html>
            `);
            printWindow.document.close();
            printWindow.print();
        }
    </script>
@endpush
