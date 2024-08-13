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
            $table->unsignedBigInteger('id_customer');
            $table->unsignedBigInteger('id_layanan');
            $table->unsignedBigInteger('id_sub_layanan');
            $table->string('kode_konsultasi');
            $table->string('id_support_teacher');
            $table->text('keluhan');
            $table->text('hasil_konsultasi')->nullable();
            $table->date('tgl_masuk');
            $table->date('tgl_selesai')->nullable();

            $table->enum('status_bayar', ['1', '2']);
            $table->decimal('sisa_bayar', 15, 2);
            $table->decimal('total_harga', 15, 2);
            $table->integer('dibayar')->nullable();

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
