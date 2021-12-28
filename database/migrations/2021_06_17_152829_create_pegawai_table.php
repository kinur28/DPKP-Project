<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('NIP')->unique();
            $table->string('nama_lengkap');
            $table->string('email');
            $table->string('jabatan');
            $table->string('jenis_kelamin');
            $table->string('tempat_tugas');
            $table->string('wilayah');
            $table->string('foto_profile')->nullable();
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
        Schema::dropIfExists('pegawai');
    }
}