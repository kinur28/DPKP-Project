<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gedung extends Model
{
    use HasFactory;

    protected $table = 'gedung';
    protected $fillable = ['foto_profile','nama_gedung','alamat','wilayah','klasifikasi','nama_fsm','tahun_pelatihan','struktur_mkkg','keterangan','surat_keterangan_pelatihan','foto_dokumentasi','user_id','pelaksanaanmkkg_id', 'nomor_telp'];

    public function user()
    {
        return $this->belongsTo(User::class);

    }
    public function pelaksanaanmkkg()
    {
        return $this->hasOne(Pelaksanaanmkkg::class);
    }
    
    public function getFotoProfile()
    {
        if(!$this->foto_profile){
            return asset('images/gedung/profile/default.png');
        }

        return asset('images/gedung/profile/'.$this->foto_profile);
    }
    public function getStrukturMkkg()
    {
        

        return asset('strukturmkkgs/'.$this->struktur_mkkg);
    }
    public function getSuratKeteranganPelatihan()
    {
        

        return asset('SuratKeteranganPelatihan/'.$this->surat_keterangan_pelatihan);
    }
    public function getFotoDokumentasi()
    {
        

        return asset('FotoDokumentasi/'.$this->foto_dokumentasi);
    }
    

}
