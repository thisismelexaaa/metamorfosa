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
        Schema::create('konsultasi', function (Blueprint $table) {
            $table->id();
            $table->string('id_layanan');
            $table->string('id_customer');
            $table->string('profesional');
            $table->string('keluhan');
            $table->string('hasil_konsultasi');
            $table->string('tgl_masuk');
            $table->string('tgl_selesai');

            $table->string('status_bayar');
            $table->string('sisa_bayar');
            $table->string('total_bayar');

            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konsultasi');
    }
};
