<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitKerja extends Model
{
    use HasFactory;

    protected $table = 'unit_kerjas';

    /**
     * Relasi ke data pegawai melalui kolom unit_kerja_id.
     */
    public function dataPegawaisByUnitKerja()
    {
        return $this->hasMany(DataPegawai::class, 'unit_kerja_id');
    }

    /**
     * Relasi ke data pegawai melalui kolom tempat_tugas_id.
     */
    public function dataPegawaisByTempatTugas()
    {
        return $this->hasMany(DataPegawai::class, 'tempat_tugas_id');
    }
}
