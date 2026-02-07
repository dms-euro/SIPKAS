@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-header fw-bold">
        📊 Kas Kelas Saya
    </div>

    <div class="card-body">
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>Nama Tagihan</th>
                    <th>Nominal</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tagihan as $t)
                <tr>
                    <td>{{ $t->nama_tagihan }}</td>
                    <td>Rp {{ number_format($t->nominal) }}</td>
                    <td>
                        @if($t->pembayaran_id)
                            <span class="badge bg-success">SUDAH BAYAR</span>
                        @else
                            <span class="badge bg-danger">BELUM BAYAR</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
