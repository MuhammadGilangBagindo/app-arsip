<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArsipDokumen extends Model
{
    use HasFactory;

    protected $table = 'arsip_dokumen';

    protected $fillable = [
        'nama_dokumen',
        'nomor_dokumen',
        'tanggal_pembuatan',
        'jenis_dokumen',
        'file',
    ];

    public function jenisDokumen()
    {
        return $this->belongsTo(JenisDokumen::class, 'jenis_dokumen', 'jenis_dokumen');
    }

    /**
     * Scope untuk laporan arsip berdasarkan filter.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string|null $jenisDokumen
     * @param string|null $tanggalAwal
     * @param string|null $tanggalAkhir
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilterLaporan($query, $jenisDokumen = null, $tanggalAwal = null, $tanggalAkhir = null)
    {
        // Filter berdasarkan jenis dokumen (jika diisi)
        if ($jenisDokumen && $jenisDokumen !== 'semua') {
            $query->where('jenis_dokumen', $jenisDokumen);
        }

        // Filter berdasarkan tanggal (jika diisi)
        if ($tanggalAwal && $tanggalAkhir) {
            $query->whereBetween('tanggal_pembuatan', [$tanggalAwal, $tanggalAkhir]);
        }

        return $query;
    }
}
