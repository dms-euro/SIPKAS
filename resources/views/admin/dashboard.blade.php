@extends('layouts.app')
@section('title', 'Dashboard Admin')
@section('content')
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Card 1 -->
        <div class="bg-white/70 backdrop-blur-xl rounded-2xl shadow-xl shadow-green-500/10 border border-white/50 p-6 hover:shadow-2xl hover:scale-105 transition-all duration-300"
            data-aos="fade-up" data-aos-delay="100">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <p class="text-gray-500 text-sm font-semibold uppercase tracking-wide">Total Kas</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2 font-display">Rp 12.4M</p>
                </div>
                <div class="bg-gradient-to-br from-green-500 to-emerald-600 p-4 rounded-xl shadow-lg">
                    <i class="ri-wallet-3-line text-white text-2xl"></i>
                </div>
            </div>
            <div class="flex items-center">
                <div class="flex items-center bg-green-50 px-2 py-1 rounded-lg">
                    <i class="ri-arrow-up-line text-green-600 text-sm"></i>
                    <span class="text-green-600 text-sm font-bold ml-1">8.5%</span>
                </div>
                <span class="text-gray-500 text-sm ml-2">vs bulan lalu</span>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="bg-white/70 backdrop-blur-xl rounded-2xl shadow-xl shadow-blue-500/10 border border-white/50 p-6 hover:shadow-2xl hover:scale-105 transition-all duration-300"
            data-aos="fade-up" data-aos-delay="200">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <p class="text-gray-500 text-sm font-semibold uppercase tracking-wide">Tagihan Aktif</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2 font-display">24 Kelas</p>
                </div>
                <div class="bg-gradient-to-br from-blue-500 to-indigo-600 p-4 rounded-xl shadow-lg">
                    <i class="ri-bill-line text-white text-2xl"></i>
                </div>
            </div>
            <div class="flex items-center">
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 h-2 rounded-full" style="width: 80%"></div>
                </div>
                <span class="text-gray-600 text-sm font-semibold ml-3 whitespace-nowrap">80%</span>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="bg-white/70 backdrop-blur-xl rounded-2xl shadow-xl shadow-amber-500/10 border border-white/50 p-6 hover:shadow-2xl hover:scale-105 transition-all duration-300"
            data-aos="fade-up" data-aos-delay="300">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <p class="text-gray-500 text-sm font-semibold uppercase tracking-wide">Pembayaran Baru</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2 font-display">18</p>
                </div>
                <div class="bg-gradient-to-br from-amber-500 to-orange-600 p-4 rounded-xl shadow-lg relative">
                    <i class="ri-exchange-dollar-line text-white text-2xl"></i>
                    <span class="absolute -top-1 -right-1 w-4 h-4 bg-red-500 rounded-full animate-ping"></span>
                </div>
            </div>
            <div class="flex items-center">
                <span class="text-amber-600 text-sm font-semibold bg-amber-50 px-3 py-1 rounded-lg">Menunggu
                    konfirmasi</span>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="bg-white/70 backdrop-blur-xl rounded-2xl shadow-xl shadow-emerald-500/10 border border-white/50 p-6 hover:shadow-2xl hover:scale-105 transition-all duration-300"
            data-aos="fade-up" data-aos-delay="400">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <p class="text-gray-500 text-sm font-semibold uppercase tracking-wide">Telah Bayar</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2 font-display">22 Kelas</p>
                </div>
                <div class="bg-gradient-to-br from-emerald-500 to-teal-600 p-4 rounded-xl shadow-lg">
                    <i class="ri-checkbox-circle-line text-white text-2xl"></i>
                </div>
            </div>
            <div class="flex items-center">
                <div class="flex items-center bg-emerald-50 px-2 py-1 rounded-lg">
                    <i class="ri-arrow-up-line text-emerald-600 text-sm"></i>
                    <span class="text-emerald-600 text-sm font-bold ml-1">73.3%</span>
                </div>
                <span class="text-gray-500 text-sm ml-2">dari total</span>
            </div>
        </div>
    </div>

    <!-- Charts and Recent Activity -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">

        <!-- Chart Section -->
        <div class="bg-white/70 backdrop-blur-xl rounded-2xl shadow-xl shadow-green-500/10 border border-white/50 p-6 hover:shadow-2xl transition-all duration-300"
            data-aos="fade-right" data-aos-delay="200">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800 font-display">Statistik Kas</h2>
                    <p class="text-gray-500 text-sm">6 Bulan Terakhir</p>
                </div>
                <select
                    class="bg-white/60 backdrop-blur-sm border-2 border-gray-200 rounded-xl px-4 py-2 text-sm font-semibold focus:outline-none focus:border-green-500 focus:ring-4 focus:ring-green-500/10 transition-all">
                    <option>2024</option>
                    <option>2023</option>
                    <option>2022</option>
                </select>
            </div>
            <div id="chart"></div>
        </div>

        <!-- Recent Activity -->
        <div class="bg-white/70 backdrop-blur-xl rounded-2xl shadow-xl shadow-green-500/10 border border-white/50 p-6 hover:shadow-2xl transition-all duration-300"
            data-aos="fade-left" data-aos-delay="200">
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-800 font-display">Aktivitas Terbaru</h2>
                <p class="text-gray-500 text-sm">Update real-time sistem</p>
            </div>

            <div class="space-y-4 max-h-96 overflow-y-auto pr-2 custom-scrollbar">
                <div
                    class="flex items-start p-3 bg-green-50/50 backdrop-blur-sm rounded-xl hover:bg-green-50 transition-all duration-300 border border-green-100/50">
                    <div class="bg-gradient-to-br from-green-500 to-emerald-600 p-2.5 rounded-lg mr-3 shadow-md">
                        <i class="ri-checkbox-circle-line text-white"></i>
                    </div>
                    <div class="flex-1">
                        <p class="font-semibold text-gray-800">Kelas X IPA 1 telah membayar</p>
                        <p class="text-gray-500 text-sm flex items-center mt-1">
                            <i class="ri-money-dollar-circle-line mr-1 text-green-600"></i>
                            Rp 150.000
                            <span class="mx-2">•</span>
                            <i class="ri-time-line mr-1"></i>
                            10 menit yang lalu
                        </p>
                    </div>
                </div>

                <div
                    class="flex items-start p-3 bg-blue-50/50 backdrop-blur-sm rounded-xl hover:bg-blue-50 transition-all duration-300 border border-blue-100/50">
                    <div class="bg-gradient-to-br from-blue-500 to-indigo-600 p-2.5 rounded-lg mr-3 shadow-md">
                        <i class="ri-add-circle-line text-white"></i>
                    </div>
                    <div class="flex-1">
                        <p class="font-semibold text-gray-800">Tagihan baru untuk Kelas XII IPS 2</p>
                        <p class="text-gray-500 text-sm flex items-center mt-1">
                            <i class="ri-money-dollar-circle-line mr-1 text-blue-600"></i>
                            Rp 200.000
                            <span class="mx-2">•</span>
                            <i class="ri-time-line mr-1"></i>
                            1 jam yang lalu
                        </p>
                    </div>
                </div>

                <div
                    class="flex items-start p-3 bg-amber-50/50 backdrop-blur-sm rounded-xl hover:bg-amber-50 transition-all duration-300 border border-amber-100/50">
                    <div class="bg-gradient-to-br from-amber-500 to-orange-600 p-2.5 rounded-lg mr-3 shadow-md">
                        <i class="ri-alert-line text-white"></i>
                    </div>
                    <div class="flex-1">
                        <p class="font-semibold text-gray-800">Kelas XI IPA 3 belum membayar</p>
                        <p class="text-gray-500 text-sm flex items-center mt-1">
                            <i class="ri-calendar-line mr-1 text-amber-600"></i>
                            Jatuh tempo 2 hari lagi
                        </p>
                    </div>
                </div>

                <div
                    class="flex items-start p-3 bg-purple-50/50 backdrop-blur-sm rounded-xl hover:bg-purple-50 transition-all duration-300 border border-purple-100/50">
                    <div class="bg-gradient-to-br from-purple-500 to-pink-600 p-2.5 rounded-lg mr-3 shadow-md">
                        <i class="ri-file-chart-line text-white"></i>
                    </div>
                    <div class="flex-1">
                        <p class="font-semibold text-gray-800">Laporan bulanan November dibuat</p>
                        <p class="text-gray-500 text-sm flex items-center mt-1">
                            <i class="ri-user-line mr-1 text-purple-600"></i>
                            Oleh Admin
                            <span class="mx-2">•</span>
                            <i class="ri-time-line mr-1"></i>
                            3 jam yang lalu
                        </p>
                    </div>
                </div>

                <div
                    class="flex items-start p-3 bg-teal-50/50 backdrop-blur-sm rounded-xl hover:bg-teal-50 transition-all duration-300 border border-teal-100/50">
                    <div class="bg-gradient-to-br from-teal-500 to-cyan-600 p-2.5 rounded-lg mr-3 shadow-md">
                        <i class="ri-checkbox-circle-line text-white"></i>
                    </div>
                    <div class="flex-1">
                        <p class="font-semibold text-gray-800">Kelas X IPS 1 telah membayar</p>
                        <p class="text-gray-500 text-sm flex items-center mt-1">
                            <i class="ri-money-dollar-circle-line mr-1 text-teal-600"></i>
                            Rp 150.000
                            <span class="mx-2">•</span>
                            <i class="ri-time-line mr-1"></i>
                            5 jam yang lalu
                        </p>
                    </div>
                </div>
            </div>

            <div class="mt-6 pt-4 border-t border-gray-200">
                <a href="#"
                    class="flex items-center justify-center text-green-600 font-semibold hover:text-green-700 transition-colors group">
                    Lihat semua aktivitas
                    <i class="ri-arrow-right-line ml-2 group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white/70 backdrop-blur-xl rounded-2xl shadow-xl shadow-green-500/10 border border-white/50 p-6 mb-8 hover:shadow-2xl transition-all duration-300"
        data-aos="fade-up" data-aos-delay="300">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800 font-display">Aksi Cepat</h2>
            <p class="text-gray-500 text-sm">Shortcut untuk tugas umum</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <a href="tagihan.html"
                class="group bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl p-6 text-white shadow-lg hover:shadow-2xl hover:scale-105 transition-all duration-300 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-24 h-24 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/2">
                </div>
                <div class="relative z-10">
                    <div
                        class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <i class="ri-add-line text-3xl"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-2">Buat Tagihan Baru</h3>
                    <p class="text-green-100 text-sm">Tambah tagihan kas untuk kelas tertentu</p>
                </div>
            </a>

            <a href="transaksi.html"
                class="group bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl p-6 text-white shadow-lg hover:shadow-2xl hover:scale-105 transition-all duration-300 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-24 h-24 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/2">
                </div>
                <div class="relative z-10">
                    <div
                        class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <i class="ri-check-double-line text-3xl"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-2">Konfirmasi Pembayaran</h3>
                    <p class="text-blue-100 text-sm">Verifikasi dan konfirmasi pembayaran kas</p>
                </div>
            </a>

            <a href="rekapitulasi.html"
                class="group bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl p-6 text-white shadow-lg hover:shadow-2xl hover:scale-105 transition-all duration-300 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-24 h-24 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/2">
                </div>
                <div class="relative z-10">
                    <div
                        class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <i class="ri-download-line text-3xl"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-2">Download Laporan</h3>
                    <p class="text-purple-100 text-sm">Ekspor data rekapitulasi kas sekolah</p>
                </div>
            </a>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Set current year
        document.getElementById('footerYear').textContent = new Date().getFullYear();

        // ApexCharts Configuration
        document.addEventListener('DOMContentLoaded', function() {
            var options = {
                series: [{
                    name: 'Kas Terkumpul',
                    data: [1800000, 2050000, 1900000, 2200000, 2400000, 2150000]
                }],
                chart: {
                    height: 320,
                    type: 'area',
                    toolbar: {
                        show: false
                    },
                    fontFamily: 'Outfit, sans-serif',
                },
                colors: ['#10b981'],
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth',
                    width: 3
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shadeIntensity: 1,
                        opacityFrom: 0.6,
                        opacityTo: 0.1,
                        stops: [0, 90, 100]
                    }
                },
                xaxis: {
                    categories: ['Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                    labels: {
                        style: {
                            colors: '#6b7280',
                            fontSize: '12px',
                            fontWeight: 600
                        }
                    }
                },
                yaxis: {
                    labels: {
                        formatter: function(value) {
                            return 'Rp ' + (value / 1000000).toFixed(1) + 'M';
                        },
                        style: {
                            colors: '#6b7280',
                            fontSize: '12px',
                            fontWeight: 600
                        }
                    }
                },
                tooltip: {
                    y: {
                        formatter: function(value) {
                            return 'Rp ' + value.toLocaleString('id-ID');
                        }
                    },
                    style: {
                        fontSize: '14px',
                        fontFamily: 'Outfit, sans-serif'
                    }
                },
                grid: {
                    borderColor: '#e5e7eb',
                    strokeDashArray: 5,
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
        });
    </script>?
@endpush
