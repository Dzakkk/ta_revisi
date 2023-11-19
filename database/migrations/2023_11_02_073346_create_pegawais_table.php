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
    Schema::create('biodata', function (Blueprint $table) {
        $table->bigIncrements('nik');
        $table->string('nip');
        $table->foreign('nip')->references('nip')->on('pegawai')->onDelete('cascade');;
        $table->string('nama');
        $table->string('agama');
        $table->string('karpeg')->nullable();
        $table->enum('jenis_kelamin', ['L', 'P']);
        $table->string('status_perkawinan');
        $table->string('tempat_lahir');
        $table->date('tanggal_lahir');
        $table->string('telepon');
        $table->string('alamat');
        $table->string('photo_pas');
        $table->index('nik');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biodata');
    }
};
