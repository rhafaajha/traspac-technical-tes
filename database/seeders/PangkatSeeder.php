<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PangkatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        $data = [
            'golongans' => [
                ['kode' => 'I/a', 'nama_pangkat' => 'Juru Muda'],
                ['kode' => 'I/b', 'nama_pangkat' => 'Juru Muda Tingkat I'],
                ['kode' => 'I/c', 'nama_pangkat' => 'Juru'],
                ['kode' => 'I/d', 'nama_pangkat' => 'Juru Tingkat I'],
                ['kode' => 'II/a', 'nama_pangkat' => 'Pengatur Muda'],
                ['kode' => 'II/b', 'nama_pangkat' => 'Pengatur Muda Tingkat I'],
                ['kode' => 'II/c', 'nama_pangkat' => 'Pengatur'],
                ['kode' => 'II/d', 'nama_pangkat' => 'Pengatur Tingkat I'],
                ['kode' => 'III/a', 'nama_pangkat' => 'Penata Muda'],
                ['kode' => 'III/b', 'nama_pangkat' => 'Penata Muda Tingkat I'],
                ['kode' => 'III/c', 'nama_pangkat' => 'Penata'],
                ['kode' => 'III/d', 'nama_pangkat' => 'Penata Tingkat I'],
                ['kode' => 'IV/a', 'nama_pangkat' => 'Pembina'],
                ['kode' => 'IV/b', 'nama_pangkat' => 'Pembina Tingkat I'],
                ['kode' => 'IV/c', 'nama_pangkat' => 'Pembina Utama Muda'],
                ['kode' => 'IV/d', 'nama_pangkat' => 'Pembina Utama Madya'],
                ['kode' => 'IV/e', 'nama_pangkat' => 'Pembina Utama'],
            ],
            'jabatans' => [
                ['kode' => 'I', 'jabatan' => 'Ketua'],
                ['kode' => 'I', 'jabatan' => 'Sekretaris Jenderal (Sekjen)'],
                ['kode' => 'I', 'jabatan' => 'Inspektur Jenderal (Irjen)'],
                ['kode' => 'I', 'jabatan' => 'Direktur Jenderal (Dirjen)'],
                ['kode' => 'II', 'jabatan' => 'Kepala Biro'],
                ['kode' => 'II', 'jabatan' => 'Kepala Pusat'],
                ['kode' => 'II', 'jabatan' => 'Sekretaris Direktorat Jenderal (Sekditjen)'],
                ['kode' => 'II', 'jabatan' => 'Sekretaris Badan'],
                ['kode' => 'III', 'jabatan' => 'Kepala Bagian'],
                ['kode' => 'III', 'jabatan' => 'Kepala Bidang'],
                ['kode' => 'III', 'jabatan' => 'Sekretaris Badan'],
                ['kode' => 'III', 'jabatan' => 'Sekretaris Dinas'],
                ['kode' => 'III', 'jabatan' => 'Kepala UPT'],
                ['kode' => 'IV', 'jabatan' => 'Kepala Sub Bagian'],
                ['kode' => 'IV', 'jabatan' => 'Kepala Seksi'],
            ],
            'eselons' => [
                ['kode' => 'I'],
                ['kode' => 'II'],
                ['kode' => 'III'],
                ['kode' => 'IV'],
            ],
        ];

        foreach ($data as $table => &$rows) {
            foreach ($rows as &$row) {
                $row['created_at'] = $now;
                $row['updated_at'] = $now;
            }
            DB::table($table)->insert($rows);
        }
    }
}
