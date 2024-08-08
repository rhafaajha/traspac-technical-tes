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
        Schema::create('golongan', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('kode')->index();
            $table->longText('nama_pangkat');
            $table->timestamps();
        });

        Schema::create('eselon', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('kode')->index();
            $table->longText('jabatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('golongan');
        Schema::dropIfExists('eselon');
    }
};
