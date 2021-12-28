<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'NIP' => '3761904300010001',
            'name' => 'Admin Damkar Utama',
            'role' => 'admin',
            'email' => 'admindamkarutama@gmail.com',
            'password' => bcrypt('admin123'),
        ]);
        DB::table('users')->insert([
            'NIP' => '0000000000000000',
            'name' => 'Admin Keamanan',
            'role' => 'adminkeamanan',
            'email' => 'adminkeamanan@gmail.com',
            'password' => bcrypt('keamananadmin123'),
        ]);
    }
}
