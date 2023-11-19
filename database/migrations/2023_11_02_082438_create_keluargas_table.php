<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('keluarga', function (Blueprint $table) {
            $table->id(); // Kolom id sebagai auto_increment primary key
            $table->bigInteger('nik')->unsigned(); // Kolom nik sebagai foreign key
            $table->string('nama_pasangan');
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->string('dokumen');
            $table->timestamps();

            // Definisi foreign key untuk kolom nik
            $table->foreign('nik')->references('nik')->on('biodata')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('keluarga');
    }
};
