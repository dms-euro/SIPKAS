<?php

namespace App\Http\Controllers;

use App\Models\Saldo;
use App\Models\Tagihan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class AdminController
{

    public function index()
    {
        $year = now()->year;

        $totalPemasukan = Saldo::where('tipe', 'pemasukan')->sum('saldo');
        $totalPengeluaran = Saldo::where('tipe', 'pengeluaran')->sum('saldo');
        $totalKas = $totalPemasukan- $totalPengeluaran;

        $tagihanAktif = Tagihan::aktif()->count();
        $tagihanSelesai = Tagihan::selesai()->count();

        $pembayaranBaru = Saldo::pemasukan()
            ->whereMonth('created_at', now()->month)
            ->count();

        $months = [];
        $chartData = [];

        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);

            $months[] = $date->format('M');

            $totalSaldo = Saldo::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->sum('saldo');

            $chartData[] = $totalSaldo;
        }

        // Aktivitas terbaru
        $aktivitas = Saldo::with('tagihan')
            ->latest()
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalKas',
            'tagihanAktif',
            'tagihanSelesai',
            'pembayaranBaru',
            'months',
            'chartData',
            'aktivitas'
        ));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
