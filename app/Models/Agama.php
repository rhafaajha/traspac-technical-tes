<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    use HasFactory;

    protected $table = 'agamas';

    public function dataPegawais()
    {
        return $this->hasMany(DataPegawai::class, 'agama_id');
    }
}
