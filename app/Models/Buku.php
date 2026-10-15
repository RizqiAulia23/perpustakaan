<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Buku extends Model
{
    protected $table = 'buku';
    protected $primaryKey = 'id_buku';
    public $timestamps = false;

    protected $fillable = [
        'isbn',
        'judul',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'id_kategori',
        'stok',
        'lokasi_rak',
    ];

    protected function casts(): array
    {
        return [
            'tahun_terbit' => 'integer',
            'stok' => 'integer',
        ];
    }

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(
            KategoriBuku::class,
            'id_kategori',
            'id_kategori'
        );
    }

    public function peminjaman(): HasMany
    {
        return $this->hasMany(
            Peminjaman::class,
            'id_buku',
            'id_buku'
        );
    }
}
