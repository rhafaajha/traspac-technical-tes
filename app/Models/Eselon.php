<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eselon extends Model
{
    use HasFactory;

    protected $table = 'eselons';

    public function dataPegawais()
    {
        return $this->hasMany(DataPegawai::class, 'eselon_id');
    }
}
