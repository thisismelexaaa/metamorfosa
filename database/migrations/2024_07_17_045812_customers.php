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

            $table->string('name');
            $table->string('no_tlp')->unique();
            $table->string('jenis_kelamin');
            $table->date('tgl_lahir');
            $table->string('alamat');
            $table->string('nama_ayah');
            $table->string('pekerjaan_ayah');
            $table->string('nama_ibu');
            $table->string('pekerjaan_ibu');
            $table->string('layanan');
            $table->string('sub_layanan');
            $table->string('support_teacher');
            $table->date('tgl_masuk');
            $table->date('tgl_selesai');
            $table->string('keluhan');
            $table->string('status');

            $table->string('hasil_konsul')->nullable();
            $table->string('total_biaya')->nullable();
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
