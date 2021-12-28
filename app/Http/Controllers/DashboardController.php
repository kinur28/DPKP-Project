<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user()->role;
        $role = \App\Models\Pegawai::find($user);

        if($user == 'adminkeamanan'){
           $data_karyawan = \App\Models\Pegawai::all();
           return view('security.index',['data_karyawan' => $data_karyawan]);
        }

        $data_karyawan = \App\Models\Pegawai::latest()->take(3)->get();

        $data_gedung = \App\Models\Gedung::latest()->take(3)->get();
    
        
        
        
        return view('dashboard.index',['data_karyawan' => $data_karyawan],['data_gedung' => $data_gedung]);
    }
    public function reset($id)
    {
        $pegawai = \App\Models\Pegawai::find($id);
        $user = \App\Models\User::find($pegawai->user_id);
        $user->update([
            'password'=>bcrypt('rahasia')
        ]);
        $user->save();
        return redirect()->back()->with('sukses','Reset Password Berhasil.');
    }
    
    
}
