<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGedungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gedung', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('foto_profile')->nullable();
            $table->string('nama_gedung'); 
            $table->string('alamat');
            $table->string('nomor_telp')->nullable();
            $table->string('wilayah');
            $table->string('klasifikasi');
            $table->string('nama_fsm')->nullable();
            $table->string('tahun_pelatihan');
            $table->string('struktur_mkkg')->nullable();
            $table->string('keterangan');
            $table->string('surat_keterangan_pelatihan')->nullable();
            $table->string('foto_dokumentasi')->nullable();
            $table->integer('pelaksanaanmkkg_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gedung');
    }
}
