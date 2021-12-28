<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelaksanaanmkkgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelaksanaanmkkg', function (Blueprint $table) {
            $table->id();
            $table->string('tahapan_program_kerja')->nullable();
            $table->string('struktur_organisasi')->nullable();
            $table->string('tugas_dan_fungsi')->nullable();
            $table->string('koordinasi')->nullable();
            $table->string('sarana_prasarana')->nullable();
            $table->string('standar_operasional_prosedur_dan_RTDK')->nullable();
            $table->string('Pelatihan_dan_simulasi_evakuasi_kebakaran')->nullable();
            $table->string('pengesahan')->nullable();
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
        Schema::dropIfExists('pelaksanaanmkkg');
    }
}
