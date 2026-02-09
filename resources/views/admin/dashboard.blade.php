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
                    <p class="text-3xl font-bold text-gray-800 mt-2 font-display">
                        Rp {{ number_format($totalKas, 0, ',', '.') }}
                    </p>
                </div>
                <div class="bg-gradient-to-br from-green-500 to-emerald-600 p-4 rounded-xl shadow-lg">
                    <i class="ri-wallet-3-line text-white text-2xl"></i>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="bg-white/70 backdrop-blur-xl rounded-2xl shadow-xl shadow-blue-500/10 border border-white/50 p-6 hover:shadow-2xl hover:scale-105 transition-all duration-300"
            data-aos="fade-up" data-aos-delay="200">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <p class="text-gray-500 text-sm font-semibold uppercase tracking-wide">Tagihan Aktif</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2 font-display">
                        {{ $tagihanAktif }} Tagihan
                    </p>
                </div>
                <div class="bg-gradient-to-br from-blue-500 to-indigo-600 p-4 rounded-xl shadow-lg">
                    <i class="ri-bill-line text-white text-2xl"></i>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="bg-white/70 backdrop-blur-xl rounded-2xl shadow-xl shadow-amber-500/10 border border-white/50 p-6 hover:shadow-2xl hover:scale-105 transition-all duration-300"
            data-aos="fade-up" data-aos-delay="300">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <p class="text-gray-500 text-sm font-semibold uppercase tracking-wide">Pembayaran Baru</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2 font-display">
                        {{ $pembayaranBaru }}
                    </p>
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
                    <p class="text-3xl font-bold text-gray-800 mt-2 font-display">
                        {{ $tagihanSelesai }}
                    </p>
                </div>
                <div class="bg-gradient-to-br from-emerald-500 to-teal-600 p-4 rounded-xl shadow-lg">
                    <i class="ri-checkbox-circle-line text-white text-2xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts and Recent Activity -->
    <div class="grid grid-cols-1 lg:grid-cols-1 gap-8 mb-8">
        <!-- Chart Section -->
        <div class="bg-white/70 backdrop-blur-xl rounded-2xl shadow-xl shadow-green-500/10 border border-white/50 p-6 hover:shadow-2xl transition-all duration-300"
            data-aos="fade-right" data-aos-delay="200">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800 font-display">Statistik Saldo</h2>
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
    </div>

@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            var options = {
                series: [{
                    name: 'Total Saldo',
                    data: @json($chartData)
                }],

                chart: {
                    height: 320,
                    type: 'area',
                    toolbar: {
                        show: false
                    }
                },
                colors: ['#10b981'],
                stroke: {
                    curve: 'smooth',
                    width: 3
                },
                xaxis: {
                    categories: @json($months)
                },
                yaxis: {
                    labels: {
                        formatter: function(value) {
                            return 'Rp ' + value.toLocaleString('id-ID');
                        }
                    }
                },
                tooltip: {
                    y: {
                        formatter: function(value) {
                            return 'Rp ' + value.toLocaleString('id-ID');
                        }
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
        });
    </script>
@endpush
