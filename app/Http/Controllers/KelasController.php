<?php

namespace App\Http\Controllers;

use App\Models\Tagihan;
use App\Models\Saldo;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class KelasController extends Controller
{
    /**
     * Display dashboard for class/user
     */
    public function dashboard()
    {
        $user = Auth::user();
        $userId = $user->id;

        $tagihans = Tagihan::where('users_id', $userId)
            ->orderBy('jatuh_tempo', 'desc')
            ->latest()->get();

        $saldos = Saldo::where('entities', $userId)
            ->with('tagihan')
            ->orderBy('created_at', 'desc')
            ->get();
        $totalPemasukan = Saldo::where('tipe', 'pemasukan')->sum('saldo');
        $totalPengeluaran = Saldo::where('tipe', 'pengeluaran')->sum('saldo');
        $saldoAkhir = $totalPemasukan - $totalPengeluaran;

        return view('kelas.dashboard', compact('tagihans', 'saldos','totalPemasukan','totalPengeluaran','saldoAkhir'));
    }
}
