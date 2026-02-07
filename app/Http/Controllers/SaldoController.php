<?php

namespace App\Http\Controllers;

use App\Models\Saldo;
use App\Models\Tagihan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Carbon;

class SaldoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $jenisOptions = ['kegiatan', 'sosial', 'pengembangan sekolah'];
        $saldo = Saldo::with('tagihan')->get();
        $saldos = Saldo::all();
        $tagihanList = Tagihan::select('id', 'nama_tagihan')->get();
        $totalPemasukan = Saldo::where('tipe', 'pemasukan')->sum('saldo');
        $totalPengeluaran = Saldo::where('tipe', 'pengeluaran')->sum('saldo');
        $saldoAkhir = $totalPemasukan - $totalPengeluaran;

        // $bulan = $request->bulan;
        // $tahun = $request->tahun ?? date('Y');

        // // $totalTagihanCount = Tagihan::count();
        // // $tagihanSelesai = Tagihan::where('status', 'selesai')->count();
        // // $bulan = $request->bulan;
        // // $tahun = $request->tahun ?? date('Y');
        // // $currentYear = date('Y');
        // $pemasukanSekarang = Saldo::where('tipe', 'pemasukan')
        //     ->when($bulan, fn($q) => $q->whereMonth('created_at', $bulan))
        //     ->whereYear('created_at', $tahun)
        //     ->sum('saldo');

        // $bulanLalu = Carbon::now()->subMonth();
        // $pemasukanBulanLalu = Saldo::where('tipe', 'pemasukan')
        //     ->whereMonth('created_at', $bulanLalu->month)
        //     ->whereYear('created_at', $bulanLalu->year)
        //     ->sum('saldo');

        // // hitung persentase
        // if ($pemasukanBulanLalu > 0) {
        //     $persentasePemasukan = round(
        //         (($pemasukanSekarang - $pemasukanBulanLalu) / $pemasukanBulanLalu) * 100
        //     );
        // } else {
        //     $persentasePemasukan = 0;
        // }

        // $pemasukanBulanIni = Saldo::where('tipe', 'pemasukan')
        //     ->whereMonth('created_at', now()->month)
        //     ->sum('saldo');

        // $pemasukanBulanLalu = Saldo::where('tipe', 'pemasukan')
        //     ->whereMonth('created_at', now()->subMonth()->month)
        //     ->sum('saldo');

        // $persentasePemasukan = 0;

        // if ($pemasukanBulanLalu > 0) {
        //     $persentasePemasukan = (($pemasukanBulanIni - $pemasukanBulanLalu) / $pemasukanBulanLalu) * 100;
        // }

        // $totalTagihan = Tagihan::sum('jumlah');

        return view('admin.saldo', compact(
            'jenisOptions',
            // 'persentasePemasukan',
            // 'bulan',
            // 'tahun',
            // 'currentYear',
            // 'totalTagihanCount',
            // 'tagihanSelesai',
            'saldo',
            'saldos',
            // 'bulan',
            // 'tahun',
            // 'kelasList',
            'tagihanList',
            'totalPemasukan',
            'totalPengeluaran',
            'saldoAkhir',
            // 'totalTagihan'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tagihan_id' => 'nullable',
            'entities' => 'nullable',
            'saldo' => 'required',
            'tipe' => 'required',
            'keterangan' => 'required',
        ]);

        Saldo::create([
            'tagihan_id' => $request->tagihan_id,
            'entities' => $request->entities,
            'saldo' => $request->saldo,
            'tipe' => $request->tipe,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->back()->with('success', 'Transaksi berhasil dicatat!');
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
        $saldo = Saldo::findOrFail($id);
        $saldo->delete();
        return redirect()->back()->with('success', 'Transaksi berhasil dihapus!');
    }
}
