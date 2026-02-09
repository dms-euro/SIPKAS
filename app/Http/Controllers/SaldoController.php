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
        $saldo = Saldo::with('tagihan')->paginate(15);
        $tagihanList = Tagihan::select('id', 'nama_tagihan')->get();
        $totalPemasukan = Saldo::where('tipe', 'pemasukan')->sum('saldo');
        $totalPengeluaran = Saldo::where('tipe', 'pengeluaran')->sum('saldo');
        $saldoAkhir = $totalPemasukan - $totalPengeluaran;

        return view('admin.saldo', compact(
            'jenisOptions',
            'saldo',
            'tagihanList',
            'totalPemasukan',
            'totalPengeluaran',
            'saldoAkhir',
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
