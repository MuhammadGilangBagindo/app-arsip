<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisDokumenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_dokumen', function (Blueprint $table) {
            $table->id('id'); // Kolom nomor sebagai primary key
            $table->string('jenis_dokumen')->unique(); // Kolom jenis dokumen dengan nilai unik
            $table->timestamps(); // Kolom created_at dan updated_at
        });

        // Menambahkan foreign key di tabel arsip_dokumen
        Schema::table('arsip_dokumen', function (Blueprint $table) {
            $table->foreign('jenis_dokumen')->references('jenis_dokumen')->on('jenis_dokumen')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Menghapus foreign key terlebih dahulu
        Schema::table('arsip_dokumen', function (Blueprint $table) {
            $table->dropForeign(['jenis_dokumen']);
        });

        Schema::dropIfExists('jenis_dokumen');
    }
}
