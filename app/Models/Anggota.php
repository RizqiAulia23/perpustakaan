<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Anggota extends Model
{
    protected $table = 'anggota';
    protected $primaryKey = 'id_anggota';
    public $timestamps = false;

    protected $fillable = [
        'kode_anggota',
        'nama',
        'jenis_kelamin',
        'tgl_daftar',
    ];

    protected function casts(): array
    {
        return [
            'tgl_daftar' => 'date',
        ];
    }

    public function peminjaman(): HasMany
    {
        return $this->hasMany(
            Peminjaman::class,
            'id_anggota',
            'id_anggota'
        );
    }
}
