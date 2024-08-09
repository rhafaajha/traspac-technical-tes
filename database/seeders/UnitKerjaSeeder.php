<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        $data = [
            ['tempat_tugas' => 'Pemprov DKI Jakarta', 'unit_kerja' => 'Kantor Gubernur Provinsi DKI Jakarta'],
            ['tempat_tugas' => 'Pemprov DKI Jakarta', 'unit_kerja' => 'Kantor Ketua Kelompok Pengaduan'],
            ['tempat_tugas' => 'Pemprov DKI Jakarta', 'unit_kerja' => 'Kantor Ketua Subkelompok Pengawasan Koperasi Usaha Kecil dan Menengah'],
            ['tempat_tugas' => 'Pemprov DKI Jakarta', 'unit_kerja' => 'Kantor Wakil Dinas Perhubungan, Bidang Pelayaran dan Penerbangan'],
            ['tempat_tugas' => 'Pemprov DKI Jakarta', 'unit_kerja' => 'Sekretariat Daerah'],
            ['tempat_tugas' => 'Pemprov DKI Jakarta', 'unit_kerja' => 'Sekretariat Daerah Walikota Administrasi Jakarta Utara'],
            ['tempat_tugas' => 'Pemprov DKI Jakarta', 'unit_kerja' => 'Biro Pemerintahan'],
            ['tempat_tugas' => 'Pemprov DKI Jakarta', 'unit_kerja' => 'Dinas Perindustrian Perdagangan, Koperasi, Usaha Kecil dan Menengah'],
            ['tempat_tugas' => 'Pemprov DKI Jakarta', 'unit_kerja' => 'Dinas Perhubungan'],
            ['tempat_tugas' => 'Pemprov DKI Jakarta', 'unit_kerja' => 'Dinas Pemberdayaan, Perlindungan Anak, dan Pengendalian Penduduk'],
            ['tempat_tugas' => 'Pemprov DKI Jakarta', 'unit_kerja' => 'Seksi Badan Usaha dan Jasa Angkutan Pelayaran dan Penerbangan'],
            ['tempat_tugas' => 'Pemprov DKI Jakarta', 'unit_kerja' => 'Seksi Pengendalian Penduduk dan Keluarga Berencana'],
            ['tempat_tugas' => 'Kementerian Perindustrian', 'unit_kerja' => 'Inspektorat Jenderal Kementerian Perindustrian'],
            ['tempat_tugas' => 'Kementerian Perindustrian', 'unit_kerja' => 'Direktorat Jenderal Industri Kecil, Menengah, dan Aneka'],
            ['tempat_tugas' => 'Kementerian Perindustrian', 'unit_kerja' => 'Direktorat Jenderal Ketahanan, Perwilayahan dan Akses Industri Internasional'],
            ['tempat_tugas' => 'Kementerian Perindustrian', 'unit_kerja' => 'Direktorat Jenderal Industri Agro'],
            ['tempat_tugas' => 'Kementerian Perindustrian', 'unit_kerja' => 'Badan Pengembangan Sumber Daya Manusia Industri'],
            ['tempat_tugas' => 'Kementerian Perindustrian', 'unit_kerja' => 'Balai Standardisasi dan Pelayanan Jasa Industri Pontianak'],
            ['tempat_tugas' => 'Kementerian Perindustrian', 'unit_kerja' => 'Balai Standardisasi dan Pelayanan Jasa Industri Surabaya'],
            ['tempat_tugas' => 'Kementerian Perindustrian', 'unit_kerja' => 'Balai Standardisasi dan Pelayanan Jasa Industri Ambon'],
            ['tempat_tugas' => 'Kementerian Perindustrian', 'unit_kerja' => 'Balai Diklat Industri Yogyakarta'],
            ['tempat_tugas' => 'Kementerian Perindustrian', 'unit_kerja' => 'Balai Besar Standardisasi dan Pelayanan Jasa Industri Hasil Perkebunan, Mineral, Logam, dan Maritim'],
            ['tempat_tugas' => 'Kementerian Perindustrian', 'unit_kerja' => 'Politeknik Industri Petrokimia Banten'],
            ['tempat_tugas' => 'Kementerian Perindustrian', 'unit_kerja' => 'Politeknik STMI Jakarta'],
            ['tempat_tugas' => 'Kementerian Perindustrian', 'unit_kerja' => 'Akademi Komunitas Industri Tekstil dan Produk Tekstil Surakarta'],
            ['tempat_tugas' => 'Badan Nasional Penanggulangan Bencana', 'unit_kerja' => 'Pusat Pengendalian Operasi'],
            ['tempat_tugas' => 'Badan Nasional Penanggulangan Bencana', 'unit_kerja' => 'Deputi Bidang Sistem dan Strategi'],
            ['tempat_tugas' => 'Badan Nasional Penanggulangan Bencana', 'unit_kerja' => 'Deputi Bidang Pencegahan'],
            ['tempat_tugas' => 'Badan Nasional Penanggulangan Bencana', 'unit_kerja' => 'Deputi Bidang Rehabilitasi dan Konstruksi'],
            ['tempat_tugas' => 'Badan Nasional Penanggulangan Bencana', 'unit_kerja' => 'Deputi Bidang Penanganan Darurat'],
            ['tempat_tugas' => 'Badan Nasional Penanggulangan Bencana', 'unit_kerja' => 'Deputi Bidang Logistik dan Peralatan'],
            ['tempat_tugas' => 'Kementerian Kesehatan', 'unit_kerja' => 'Direktorat Penyediaan Tenaga Kesehatan'],
            ['tempat_tugas' => 'Kementerian Kesehatan', 'unit_kerja' => 'Direktorat Pencegahan dan Pengendalian Penyakit Tidak Menular'],
            ['tempat_tugas' => 'Kementerian Kesehatan', 'unit_kerja' => 'Direktorat Pelayanan Kesehatan Rujukan'],
            ['tempat_tugas' => 'Kementerian Kesehatan', 'unit_kerja' => 'Direktorat Peningkatan Mutu Tenaga Kesehatan'],
            ['tempat_tugas' => 'Kementerian Kesehatan', 'unit_kerja' => 'Sekretariat Direktorat Jenderal Kefarmasian dan Alat Kesehatan'],
            ['tempat_tugas' => 'Kementerian Kesehatan', 'unit_kerja' => 'Sekretariat Direktorat Jenderal Pelayanan Kesehatan'],
            ['tempat_tugas' => 'Kementerian Kesehatan', 'unit_kerja' => 'Pusat Pengembangan Kompetensi Aparatur Sipil Negara Kemenkes'],
            ['tempat_tugas' => 'Kementerian Kesehatan', 'unit_kerja' => 'Biro Umum Kementerian Kesehatan'],
            ['tempat_tugas' => 'Kementerian Kesehatan', 'unit_kerja' => 'Biro Organisasi dan Sumber Daya Manusia'],
            ['tempat_tugas' => 'Kementerian Kesehatan', 'unit_kerja' => 'Balai Pelatihan Kesehatan Mataram'],
            ['tempat_tugas' => 'Kementerian Kesehatan', 'unit_kerja' => 'Balai Besar Laboratorium Kesehatan Jakarta'],
            ['tempat_tugas' => 'Kementerian Kesehatan', 'unit_kerja' => 'Rumah Sakit Umum Pusat Dr. Hasan Sadikin Bandung'],
            ['tempat_tugas' => 'Kementerian Kesehatan', 'unit_kerja' => 'Rumah Sakit Umum Pusat Dr. Sardjito Yogyakarta'],
            ['tempat_tugas' => 'Kementerian Kesehatan', 'unit_kerja' => 'Politeknik Kesehatan Kementerian Kesehatan Tanjungpinang'],
            ['tempat_tugas' => 'Kementerian Kesehatan', 'unit_kerja' => 'Kantor Kesehatan Pelabuhan Kelas II Kendari'],
            ['tempat_tugas' => 'MPR RI', 'unit_kerja' => 'Deputi Bidang Pengkajian dan Pemasyarakatan Konstitusi'],
            ['tempat_tugas' => 'MPR RI', 'unit_kerja' => 'Deputi Bidang Administrasi, Biro Sumber Daya Manusia, Organisasi, dan Hukum'],
            ['tempat_tugas' => 'MPR RI', 'unit_kerja' => 'Biro Pengkajian Konstitusi'],
            ['tempat_tugas' => 'MPR RI', 'unit_kerja' => 'Biro Hubungan Masyarakat dan Sistem Informasi'],
            ['tempat_tugas' => 'MPR RI', 'unit_kerja' => 'Biro Sumber Daya Manusia, Organisasi, dan Hukum'],
            ['tempat_tugas' => 'MPR RI', 'unit_kerja' => 'Biro Sekretariat Pimpinan'],
            ['tempat_tugas' => 'MPR RI', 'unit_kerja' => 'Biro Persidangan dan Pemasyarakatan Konstitusi'],
        ];

        foreach ($data as &$item) {
            $item['created_at'] = $now;
            $item['updated_at'] = $now;
        }

        DB::table('unit_kerjas')->insert($data);
    }
}
