<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';
    protected $fillable = ['NIP','nama_lengkap','email','jabatan','jenis_kelamin','tempat_tugas','wilayah','foto_profile','user_id'];
    public function user()
    {
        return $this->hasOne(User::class);
    }
    public function getFotoProfile()
    {
        if(!$this->foto_profile){
            return asset('images/default.png');
        }

        return asset('images/'.$this->foto_profile);
    }
}
