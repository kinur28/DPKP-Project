<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelaksanaanmkkg extends Model
{
    use HasFactory;
    protected $table = 'pelaksanaanmkkg';
    protected $fillable = ['tahapan_program_kerja','struktur_organisasi','tugas_dan_fungsi','koordinasi','sarana_prasarana','standar_operasional_prosedur_dan_RTDK','Pelatihan_dan_simulasi_evakuasi_kebakaran','pengesahan'];

    public function gedung()
    {
        return $this->belongsTo(Gedung::class);

    }

    public function getTahapanProgramKerja()
    {
        

        return asset('PelaksanaanMKKG/TahapanProgramKerja/'.$this->tahapan_program_kerja);
    }
    public function getStrukturOrg(){
        return asset('PelaksanaanMKKG/StrukturOrganisasi/'.$this->struktur_organisasi);
    }
    public function getTugasdanFungsi(){
        return asset('PelaksanaanMKKG/TugasdanFungsi/'.$this->tugas_dan_fungsi);
    }
    public function getKoordinasi(){
        return asset('PelaksanaanMKKG/Koordinasi/'.$this->koordinasi);
    }
    public function getSaranaPrasarana(){
        return asset('PelaksanaanMKKG/SaranaPrasarana/'.$this->sarana_prasarana);
    }
    public function getStandarOpRTDK(){
        return asset('PelaksanaanMKKG/StandarOperasionalProsedurdanRTDK/'.$this->standar_operasional_prosedur_dan_RTDK);
    }
    public function getPSEK(){
        return asset('PelaksanaanMKKG/PelatihandanSimulasiEvakuasiKebakaran/'.$this->Pelatihan_dan_simulasi_evakuasi_kebakaran);
    }
    public function getPengesahan(){
        return asset('PelaksanaanMKKG/Pengesahan/'.$this->pengesahan);
    }
}
