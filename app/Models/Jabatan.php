<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    protected $table = 'jabatans';

    public function dataPegawais()
    {
        return $this->hasMany(DataPegawai::class, 'jabatan_id');
    }
}
