<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Saldo;
use App\Models\Tagihan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class RekapController extends Controller
{
    public function index(Request $request)
    {
        // Ambil parameter filter
        $bulan = $request->bulan; // 01 - 12 atau null untuk semua bulan
        $tahun = $request->tahun ?? date('Y');
        $currentYear = date('Y');

        // =====================
        // TOTAL PEMASUKAN
        // =====================
        $totalPemasukan = Saldo::where('tipe', 'masuk')
            ->when($bulan, function ($query) use ($bulan) {
                return $query->whereMonth('created_at', $bulan);
            })
            ->whereYear('created_at', $tahun)
            ->sum('saldo');

        // =====================
        // TOTAL TAGIHAN
        // =====================
        $totalTagihan = Tagihan::when($bulan, function ($query) use ($bulan) {
                return $query->whereMonth('created_at', $bulan);
            })
            ->whereYear('created_at', $tahun)
            ->sum('jumlah');

        // =====================
        // SALDO TERSEDIA
        // =====================
        $saldoMasuk = Saldo::where('tipe', 'masuk')->sum('saldo');
        $saldoKeluar = Saldo::where('tipe', 'keluar')->sum('saldo');
        $saldoTersedia = $saldoMasuk - $saldoKeluar;

        // =====================
        // STATISTIK TAGIHAN
        // =====================
        $tagihanSelesai = Tagihan::where('status', 'selesai')
            ->when($bulan, function ($query) use ($bulan) {
                return $query->whereMonth('created_at', $bulan);
            })
            ->whereYear('created_at', $tahun)
            ->count();

        $tagihanPending = Tagihan::where('status', 'pending')
            ->when($bulan, function ($query) use ($bulan) {
                return $query->whereMonth('created_at', $bulan);
            })
            ->whereYear('created_at', $tahun)
            ->count();

        $tagihanTerlambat = Tagihan::where('status', 'terlambat')
            ->when($bulan, function ($query) use ($bulan) {
                return $query->whereMonth('created_at', $bulan);
            })
            ->whereYear('created_at', $tahun)
            ->count();

        $totalTagihanCount = $tagihanSelesai + $tagihanPending + $tagihanTerlambat;

        // =====================
        // AKTIVITAS TERBARU
        // =====================
        $aktivitas = Saldo::with(['user', 'tagihan'])
            ->latest()
            ->limit(10)
            ->get()
            ->map(function ($item) {
                return [
                    'waktu' => $item->created_at->format('H:i • d M Y'),
                    'aktivitas' => $item->tipe === 'masuk' ? 'Pembayaran Tagihan' : 'Pengeluaran',
                    'user' => $item->user->name ?? 'Tidak diketahui',
                    'keterangan' => $item->keterangan ?? ($item->tagihan->nama_tagihan ?? 'Tidak ada keterangan'),
                    'status' => 'selesai',
                    'nominal' => $item->saldo,
                    'tipe' => $item->tipe
                ];
            });

        // =====================
        // DATA CHART TAGIHAN (PER BULAN)
        // =====================
        $chartTagihan = Tagihan::select(
                DB::raw('MONTH(created_at) as bulan'),
                DB::raw('COUNT(*) as total')
            )
            ->whereYear('created_at', $tahun)
            ->when($bulan, function ($query) use ($bulan) {
                return $query->whereMonth('created_at', $bulan);
            })
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        // =====================
        // DATA CHART SALDO BULANAN
        // =====================
        $chartSaldo = Saldo::select(
                DB::raw('MONTH(created_at) as bulan'),
                DB::raw('SUM(CASE WHEN tipe = "masuk" THEN saldo ELSE -saldo END) as total')
            )
            ->whereYear('created_at', $tahun)
            ->when($bulan, function ($query) use ($bulan) {
                return $query->whereMonth('created_at', $bulan);
            })
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        // =====================
        // DATA UNTUK DISTRIBUSI SALDO PER USER
        // =====================
        $distribusiSaldo = Saldo::select(
                'users_id',
                DB::raw('SUM(CASE WHEN tipe = "masuk" THEN saldo ELSE -saldo END) as total_saldo')
            )
            ->with('user')
            ->groupBy('users_id')
            ->having('total_saldo', '>', 0)
            ->orderByDesc('total_saldo')
            ->limit(5)
            ->get()
            ->map(function ($item) {
                return [
                    'nama' => $item->user->name ?? 'User ' . $item->users_id,
                    'saldo' => $item->total_saldo
                ];
            });

        // =====================
        // RINGKASAN BULAN INI
        // =====================
        $bulanIni = date('m');
        $tahunIni = date('Y');

        $pemasukanBulanIni = Saldo::where('tipe', 'masuk')
            ->whereMonth('created_at', $bulanIni)
            ->whereYear('created_at', $tahunIni)
            ->sum('saldo');

        $pengeluaranBulanIni = Saldo::where('tipe', 'keluar')
            ->whereMonth('created_at', $bulanIni)
            ->whereYear('created_at', $tahunIni)
            ->sum('saldo');

        $saldoBulanIni = $pemasukanBulanIni - $pengeluaranBulanIni;

        // =====================
        // PERBANDINGAN BULAN LALU
        // =====================
        $bulanLalu = Carbon::now()->subMonth()->format('m');
        $tahunBulanLalu = Carbon::now()->subMonth()->format('Y');

        $pemasukanBulanLalu = Saldo::where('tipe', 'masuk')
            ->whereMonth('created_at', $bulanLalu)
            ->whereYear('created_at', $tahunBulanLalu)
            ->sum('saldo');

        $persentasePemasukan = $pemasukanBulanLalu > 0
            ? round((($pemasukanBulanIni - $pemasukanBulanLalu) / $pemasukanBulanLalu) * 100, 1)
            : 0;

        return view('admin.rekapitulasi', compact(
            'totalPemasukan',
            'totalTagihan',
            'saldoTersedia',
            'saldoMasuk',
            'saldoKeluar',
            'tagihanSelesai',
            'tagihanPending',
            'tagihanTerlambat',
            'totalTagihanCount',
            'aktivitas',
            'chartTagihan',
            'chartSaldo',
            'distribusiSaldo',
            'pemasukanBulanIni',
            'pengeluaranBulanIni',
            'saldoBulanIni',
            'persentasePemasukan',
            'bulan',
            'tahun',
            'currentYear'
        ));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    /**
     * Export data rekap ke PDF
     */
    public function exportPdf(Request $request)
    {
        // Logic untuk export PDF
        $bulan = $request->bulan;
        $tahun = $request->tahun ?? date('Y');

        // Ambil data yang sama dengan index
        $data = $this->getRekapData($bulan, $tahun);

        // Return PDF view atau download
        // Implementasi PDF menggunakan library seperti dompdf
    }

    /**
     * Export data rekap ke Excel
     */
    public function exportExcel(Request $request)
    {
        // Logic untuk export Excel
        $bulan = $request->bulan;
        $tahun = $request->tahun ?? date('Y');

        // Ambil data yang sama dengan index
        $data = $this->getRekapData($bulan, $tahun);

        // Return Excel download
        // Implementasi Excel menggunakan library seperti Laravel Excel
    }

    /**
     * Helper function untuk mendapatkan data rekap
     */
    private function getRekapData($bulan, $tahun)
    {
        // Reuse logic dari index method
        // ...
    }
}
