<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserPegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('pegawai')->insert([
            'user_id' => '1',
            'NIP' => '3761904300010001',
            'nama_lengkap'=>'Admin Damkar Utama',
            'email' => 'admindamkarutama@gmail.com',
            'jabatan' => 'ketua',
            'jenis_kelamin' => 'L',
            'tempat_tugas' => 'Tangerang',
            'wilayah' => 'Jakarta Pusat',
            
        ]);
    
    }
}
