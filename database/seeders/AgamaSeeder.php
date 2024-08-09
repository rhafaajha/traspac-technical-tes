<?php

namespace Database\Seeders;

use App\Models\Agama;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        $agama = [
            ['nama_agama' => 'Islam'],
            ['nama_agama' => 'Kristen'],
            ['nama_agama' => 'Katholik'],
            ['nama_agama' => 'Hindu'],
            ['nama_agama' => 'Buddha'],
            ['nama_agama' => 'Konghucu'],
        ];

        foreach ($agama as &$item) {
            $item['created_at'] = $now;
            $item['updated_at'] = $now;
        }

        // DB::table('agamas')->insert($agama);
        Agama::insert($agama);
    }
}
