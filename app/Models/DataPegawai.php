<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPegawai extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'foto',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'jk',
        'golongan_id',
        'eselon_id',
        'jabatan_id',
        'tempat_tugas_id',
        'agama_id',
        'unit_kerja_id',
        'no_hp',
        'npwp',
    ];

    public function golongan()
    {
        return $this->belongsTo(Golongan::class, 'golongan_id');
    }

    public function eselon()
    {
        return $this->belongsTo(Eselon::class, 'eselon_id');
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id');
    }

    public function agama()
    {
        return $this->belongsTo(Agama::class, 'agama_id');
    }

    /**
     * Relasi ke UnitKerja melalui kolom unit_kerja_id.
     */
    public function unit_kerja()
    {
        return $this->belongsTo(UnitKerja::class, 'unit_kerja_id');
    }

    /**
     * Relasi ke UnitKerja melalui kolom tempat_tugas_id.
     */
    public function tempat_tugas()
    {
        return $this->belongsTo(UnitKerja::class, 'tempat_tugas_id');
    }
}
