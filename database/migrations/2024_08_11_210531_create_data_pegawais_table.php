<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_pegawais', function (Blueprint $table) {
            $table->id()->primary();
            $table->timestamps();
            $table->integer('nip')->index()->unique();
            $table->string('foto')->nullable();
            $table->longText('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->longText('alamat');
            $table->enum('jk', ['L', 'P']);
            $table->foreignId('golongan_id')->constrained('golongans')->onDelete('cascade');
            $table->foreignId('eselon_id')->nullable()->constrained('eselons')->onDelete('cascade');
            $table->foreignId('jabatan_id')->nullable()->constrained('jabatans')->onDelete('cascade');
            $table->foreignId('tempat_tugas_id')->nullable()->constrained('unit_kerjas')->onDelete('cascade');
            $table->foreignId('agama_id')->constrained('agamas')->onDelete('cascade');
            $table->foreignId('unit_kerja_id')->nullable()->constrained('unit_kerjas')->onDelete('cascade');
            $table->string('no_hp')->nullable();
            $table->string('npwp')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pegawais');
    }
};
