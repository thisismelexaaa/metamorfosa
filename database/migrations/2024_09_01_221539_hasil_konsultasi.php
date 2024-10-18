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
        Schema::create('hasil_konsultasi', function (Blueprint $table) {
            $table->id();
            $table->string('id_konsultasi');
            $table->string('id_sub_layanan');
            $table->string('id_layanan');
            $table->string('id_user');
            $table->string('id_customer');
            $table->integer('hari');
            $table->text('hasil');
            $table->string('foto_notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konsultasi_hasil');
    }
};
