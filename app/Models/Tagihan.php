<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    protected $table = 'tagihans';

    protected $fillable = [
        'users_id',
        'nama_tagihan',
        'jenis',
        'jumlah',
        'status',
        'jatuh_tempo',
        'keterangan',
    ];

    protected $casts = [
        'jatuh_tempo' => 'date',
        'jumlah' => 'integer'
    ];

    public function saldo()
    {
        return $this->hasMany(Saldo::class, 'tagihan_id');
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
     * Scope untuk tagihan aktif (belum selesai)
     */
    public function scopeAktif($query)
    {
        return $query->whereIn('status', ['pending', 'terlambat']);
    }

    /**
     * Scope untuk tagihan selesai
     */
    public function scopeSelesai($query)
    {
        return $query->where('status', 'selesai');
    }
}
