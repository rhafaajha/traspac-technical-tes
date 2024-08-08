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
        Schema::create('main_data', function (Blueprint $table) {
            $table->id()->primary();
            $table->timestamps();
            $table->integer('nip')->index()->unique();
            $table->string('foto')->nullable();
            $table->longText('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->longText('alamat');
            $table->enum('jk', ['L', 'P']);
            $table->foreignId('golongan');
            $table->foreignId('eselon')->nullable();
            $table->foreignId('jabatan')->nullable();
            $table->foreignId('tempat_tugas')->nullable();
            $table->foreignId('agama');
            $table->foreignId('unit_kerja')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('npwp')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('main_data');
    }
};
