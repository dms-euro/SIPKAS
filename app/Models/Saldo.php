<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Saldo extends Model
{
    protected $table = 'saldos';

    protected $fillable = [
        'tagihan_id',
        'entities',
        'saldo',
        'tipe',
        'jenis',
        'keterangan',
    ];

    protected $casts = [
        'saldo' => 'integer'
    ];

    public function tagihan()
    {
        return $this->belongsTo(Tagihan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    /**
     * Scope untuk filter berdasarkan bulan
     */
    public function scopeFilterByMonth($query, $month)
    {
        if ($month) {
            return $query->whereMonth('created_at', $month);
        }
        return $query;
    }

    /**
     * Scope untuk filter berdasarkan tahun
     */
    public function scopeFilterByYear($query, $year)
    {
        if ($year) {
            return $query->whereYear('created_at', $year);
        }
        return $query;
    }

    /**
     * Scope untuk pemasukan
     */
    public function scopePemasukan($query)
    {
        return $query->where('tipe', 'masuk');
    }

    /**
     * Scope untuk pengeluaran
     */
    public function scopePengeluaran($query)
    {
        return $query->where('tipe', 'keluar');
    }

    /**
     * Scope untuk aktivitas terbaru
     */
    public function scopeAktivitasTerbaru($query, $limit = 10)
    {
        return $query->latest()->limit($limit);
    }
}
