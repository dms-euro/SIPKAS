<?php

namespace App\Http\Controllers;

use App\Models\Saldo;
use App\Models\Tagihan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TagihanController extends Controller
{
    public function index()
    {
        $tagihans = Tagihan::select(
            'nama_tagihan',
            'jatuh_tempo',
            'jumlah',
            'jenis'
        )
            ->selectRaw('COUNT(*) as total_kelas')
            ->selectRaw("SUM(status = 'selesai') as selesai")
            ->selectRaw("SUM(status = 'pending') as pending")
            ->groupBy('nama_tagihan', 'jatuh_tempo', 'jumlah', 'jenis')
            ->simplePaginate(15);

        return view('admin.tagihan', compact('tagihans'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'nama_tagihan' => 'required|unique:tagihans,nama_tagihan',
            'jumlah' => 'nullable',
            'jenis' => 'required',
            'jatuh_tempo' => 'required|date',
            'keterangan' => 'nullable',
        ]);

        $kelasList = User::where('role', 'kelas')->get();

        foreach ($kelasList as $kelas) {
            Tagihan::create([
                'users_id' => $kelas->id,
                'nama_tagihan' => $request->nama_tagihan,
                'jumlah' => $request->jumlah,
                'jenis' => $request->jenis,
                'status' => 'pending',
                'jatuh_tempo' => $request->jatuh_tempo,
                'keterangan' => $request->keterangan,
            ]);
        }

        return back()->with('success', 'Tagihan berhasil dibuat');
    }


    public function show($nama_tagihan)
    {
        $tagihans = Tagihan::with(['user', 'saldo'])->where('nama_tagihan', $nama_tagihan)->get();
        $totalTagihan   = $tagihans->count();
        $selesai        = $tagihans->where('status', 'selesai')->count();
        $pending        = $tagihans->where('status', 'pending')->count();
        $percentage     = $totalTagihan > 0 ? round(($selesai / $totalTagihan) * 100) : 0;

        $firstTagihan   = $tagihans->first();
        $jumlahPerKelas = $firstTagihan ? $firstTagihan->jumlah : 0;
        return view('admin.tagihan-detail', compact('tagihans', 'nama_tagihan', 'selesai', 'pending', 'percentage', 'firstTagihan', 'jumlahPerKelas'));
    }


    public function selesai(Request $request, $id)
    {
        $request->validate([
            'saldo' => 'required|numeric|min:1'
        ]);

        $tagihan = Tagihan::findOrFail($id);

        Saldo::create([
            'tagihan_id' => $tagihan->id,
            'users_id' => $tagihan->users_id,
            'saldo' => $request->saldo,
            'tipe' => 'pemasukan',
            'keterangan' => 'Pembayaran ' . $tagihan->nama_tagihan
        ]);

        $tagihan->update([
            'status' => 'selesai'
        ]);

        return response()->json([
            'success' => true
        ]);
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
    public function destroy(string $nama_tagihan)
    {
        $tagihan = Tagihan::findOrFail($nama_tagihan);
        $tagihan->delete();
        return redirect()->back()->with('success', 'Data Tagihan sudah di hapus');
    }
}
