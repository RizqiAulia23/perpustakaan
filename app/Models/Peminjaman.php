<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';
    protected $primaryKey = 'id_pinjam';
    public $timestamps = false;

    protected $fillable = [
        'id_anggota',
        'id_buku',
        'tgl_pinjam',
        'tgl_jatuh_tempo',
        'tgl_kembali',
        'denda',
    ];

    protected function casts(): array
    {
        return [
            'tgl_pinjam' => 'date',
            'tgl_jatuh_tempo' => 'date',
            'tgl_kembali' => 'date',
            'denda' => 'decimal:2',
        ];
    }

    public function anggota(): BelongsTo
    {
        return $this->belongsTo(
            Anggota::class,
            'id_anggota',
            'id_anggota'
        );
    }

    public function buku(): BelongsTo
    {
        return $this->belongsTo(
            Buku::class,
            'id_buku',
            'id_buku'
        );
    }
}
