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
    {Schema::create('pendidikan', function (Blueprint $table) {
        $table->id();
        $table->string('nip');
        $table->foreign('nip')->references('nip')->on('pegawai')->onDelete('cascade');;
        $table->string('nama_pendidikan');
        $table->string('gelar');
        $table->string('program');
        $table->date('tahun_lulus');
        // Tambahkan kolom lainnya untuk informasi pendidikan
        $table->timestamps();
    });
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendidikan');
    }
};
