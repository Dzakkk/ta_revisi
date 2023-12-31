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
        Schema::create('pelatihan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelatihan');
            $table->string('jenis_pelatihan');
            $table->string('nip');
            $table->foreign('nip')->references('nip')->on('pegawai')->onDelete('cascade');;
            $table->date('waktu_pelatihan');
            $table->string('lama_pelatihan');
            $table->string('dokumen');
            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelatihan');
    }
};
