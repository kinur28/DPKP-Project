<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Exports\KaryawanExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

use Hash;

class KaryawanController extends Controller
{
    public function datakaryawan(Request $request)
    {
        if($request->has('cari')){
            $data_karyawan = \App\Models\Pegawai::where('nama_lengkap','LIKE','%'.$request->cari.'%')->get();
        }else{
            $data_karyawan = \App\Models\Pegawai::all();  
        }
        
        return view('dashboard.datakaryawan',['data_karyawan' => $data_karyawan]);
    }
    public function tambahkaryawan()
    {
        return view('dashboard.tambahkaryawan');
    }
    public function tambahdatakaryawan(Request $request)
    {
        

        //insert ke table user
        $user = new \App\Models\User;
        $user->NIP = $request->NIP;
        $user->role = 'userkaryawan';
        $user->name = $request->nama_lengkap;
        $user->email = $request->email;
        $user->password = bcrypt('rahasia');
        $user->remember_token = Str::random(60);
        $user->save();

        //insert ke table karyawan
        $request->request->add(['user_id' => $user->id]);
        $karyawan = \App\Models\Pegawai::create($request->all
            ());
        
        return redirect('/Dashboard/data-karyawan')->with('sukses','Data berhasil dimasukkan.');
    }
    public function editdatakaryawan($id)
    {
        $data_karyawan = \App\Models\Pegawai::find($id);
        return view('dashboard.editdatakaryawan',['data_karyawan' => $data_karyawan]);
    }
    public function updatedatakaryawan(Request $request,$id)
    {
        $data_karyawan = \App\Models\Pegawai::find($id);

        $data_karyawan->update($request->all());
        if($request->hasFile('foto_profile')){
            $request->file('foto_profile')->move('images/',$request->file('foto_profile')->getClientOriginalName());
            $data_karyawan->foto_profile = $request->file('foto_profile')->getClientOriginalName();
            $data_karyawan->save();

        }

        if($data_karyawan->save()){
            $userid = \App\Models\User::where('id',$data_karyawan->user_id)->get();
            $user = \App\Models\User::find($userid)->first();
            $user->update($request->all());
            if($request->hasFile('foto_profile')){
                $user->foto_profile = $request->file('foto_profile')->getClientOriginalName();
                
            }
            $user->name = $request->nama_lengkap;
            $user->email = $request->email;
            $user->save();
        }
        
        
        
        return redirect('/Dashboard/data-karyawan')->with('sukses','Data berhasil diperbaharui.');
    }
    public function deletedatakaryawan($id)
    {
        $data_karyawan = \App\Models\Pegawai::find($id);
        $userid = \App\Models\User::where('id',$data_karyawan->user_id)->get();
        $user = \App\Models\User::find($userid)->first();
        $user->delete();
        $data_karyawan->delete();
    
        return redirect('/Dashboard/data-karyawan')->with('sukses','Data berhasil dihapus.');
    }
    public function profiledatakaryawan($id)
    {
        $data_karyawan = \App\Models\Pegawai::find($id);
         return view('dashboard.profiledatakaryawan',['data_karyawan' => $data_karyawan]);
    }
    public function searchdatakaryawan(Request $request)
    {
        
        $cari = $request->cari;
        $type = $request->type;
         
        if(empty($cari) && empty($type)){
            $data_karyawan = \App\Models\Pegawai::all();
        }elseif($type == 'NIK') {
             $data_karyawan = \App\Models\Pegawai::where('NIK','LIKE','%'.$cari.'%')->get();
        }elseif($type == 'wilayah') {
            $data_karyawan = \App\Models\Pegawai::where('wilayah','LIKE','%'.$cari.'%')->get();
        }elseif($type == 'nama_lengkap'){
            $data_karyawan = \App\Models\Pegawai::where('nama_lengkap','LIKE','%'.$cari.'%')->get();
        }else{
            $data_karyawan = \App\Models\Pegawai::where('NIK','LIKE','%'.$cari.'%')
            ->orwhere('wilayah','LIKE','%'.$cari.'%')
            ->orwhere('nama_lengkap','LIKE','%'.$cari.'%')->get();
        }
        
        return view('dashboard.datakaryawan',['data_karyawan' => $data_karyawan]);
    }
    
    public function karyawanexport(){
        return Excel::download(new KaryawanExport,'Datapegawai.xlsx');
    }
    public function pagechangepassword()
    {
        return view('dashboard.changepassword');
    }
    public function changepassword(Request $request)
    {
        $request->validate([
            'password_lama'=>'required|min:6|max:100',
            'password_baru'=>'required|min:6|max:100',
            'konfirmasi_password_baru'=>'required|same:password_baru'
        ]); 

        $current_user = auth()->user();
        
        if(Hash::check($request->password_lama,$current_user->password)){
            
            $current_user->update([
                'password'=>bcrypt($request->password_baru)
            ]);
           
                
            return redirect()->back()->with('sukses','Password berhasil diperbaharui.');
            
            
        }else{
            return redirect()->back()->with('error','Password lama tidak sesuai.');
        } 

        
    }
     public function pageprofile(Request $request)
    {
        
        if($request->has('user_id')){
            $data_karyawan = \App\Models\Pegawai::where('user_id','LIKE','%'.$request->user_id.'%')->first();
        }
        return view('dashboard.profile',['data_karyawan' => $data_karyawan]);
    } 

    public function editprofile(Request $request)
    {
        
        if($request->has('user_id')){
            $data_karyawan = \App\Models\Pegawai::where('user_id','LIKE','%'.$request->user_id.'%')->first();
        }
        return view('dashboard.editprofile',['data_karyawan' => $data_karyawan]);
    }
     public function updateprofilekaryawan(Request $request,$id)
    {
        $data_karyawan = \App\Models\Pegawai::find($id);

        $data_karyawan->update($request->all());
        if($request->hasFile('foto_profile')){
            $request->file('foto_profile')->move('images/',$request->file('foto_profile')->getClientOriginalName());
            $data_karyawan->foto_profile = $request->file('foto_profile')->getClientOriginalName();
            $data_karyawan->save();

        }

        if($data_karyawan->save()){
            $userid = \App\Models\User::where('id',$data_karyawan->user_id)->get();
            $user = \App\Models\User::find($userid)->first();
            $user->update($request->all());
            if($request->hasFile('foto_profile')){
                $user->foto_profile = $request->file('foto_profile')->getClientOriginalName();
                
            }
            $user->name = $request->nama_lengkap;
            $user->email = $request->email;
            $user->save();
        }
        
        
        
        return redirect('/Dashboard')->with('sukses','Profile berhasil diperbaharui.');
    } 
}
