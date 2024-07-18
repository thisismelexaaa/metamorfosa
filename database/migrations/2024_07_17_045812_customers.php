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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('no_daftar')->unique();
            $table->string('nama');
            $table->string('nik')->unique();
            $table->string('nama_bapak');
            $table->string('nama_ibu');
            $table->string('alamat');
            $table->string('layanan');
            $table->date('tgl_lahir');
            $table->date('tgl_masuk');
            $table->date('durasi_konsultasi');
            $table->string('profesional');
            $table->string('hasil_konsul');
            $table->string('biaya');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
