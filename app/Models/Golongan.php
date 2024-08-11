<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    use HasFactory;

    protected $table = 'golongans';

    public function dataPegawais()
    {
        return $this->hasMany(DataPegawai::class, 'golongan_id');
    }
}
