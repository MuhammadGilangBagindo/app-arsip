<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArsipDokumenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arsip_dokumen', function (Blueprint $table) {
            $table->id('id'); // Kolom nomor sebagai primary key
            $table->string('nama_dokumen'); // Kolom nama dokumen
            $table->string('nomor_dokumen'); // Kolom nomor dokumen
            $table->date('tanggal_pembuatan'); // Kolom tanggal pembuatan
            $table->string('jenis_dokumen'); // Kolom jenis dokumen
            $table->string('file'); // Kolom file dokumen untuk menyimpan path file
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arsip_dokumen');
    }
}
