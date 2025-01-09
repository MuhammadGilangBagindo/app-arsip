<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisDokumen extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'jenis_dokumen';

    // Kolom yang dapat diisi
    protected $fillable = [
        'jenis_dokumen',
    ];

    /**
     * Relasi ke model ArsipDokumen
     */
    public function arsipDokumen()
    {
        return $this->hasMany(ArsipDokumen::class, 'jenis_dokumen', 'jenis_dokumen');
    }
}
