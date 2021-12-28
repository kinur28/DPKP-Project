<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\GedungExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class GedungController extends Controller
{
    public function datagedung(Request $request)
    {
        if($request->has('user_id')){
            $data_gedung = \App\Models\Gedung::where('user_id','LIKE','%'.$request->user_id.'%')->get();
        }else{
            $data_gedung = \App\Models\Gedung::all();  
        }
       
        return view('dashboard.datagedung',compact(['data_gedung']));
    }
    public function tambahgedung()
    {
        
        return view('dashboard.tambahgedung');
    }
    public function tambahdatagedung(Request $request)
    {
        
        if($request->has('user_id')){
            $data_gedung = \App\Models\Gedung::where('user_id','LIKE','%'.$request->user_id.'%')->get();
        }else{
            $data_gedung = \App\Models\Gedung::all();  
        }
        
        
        $pelaksanaanmkkg = new \App\Models\Pelaksanaanmkkg;
        
        $pelaksanaanmkkg->save();

        $request->request->add(['pelaksanaanmkkg_id' => $pelaksanaanmkkg->id]);
        $data_gedungbaru = \App\Models\Gedung::create($request->all());
        
        if($request->hasFile('foto_profile')){
            $request->file('foto_profile')->move('images/gedung/profile/',$request->file('foto_profile')->getClientOriginalName());
            $data_gedungbaru->foto_profile = $request->file('foto_profile')->getClientOriginalName();
            $data_gedungbaru->save();
        }
        if($request->hasFile('struktur_mkkg')){
           $filesmkkg = $request->file('struktur_mkkg');
            $filenamemkkg = $filesmkkg->getClientOriginalName();
            $request->struktur_mkkg->move('strukturmkkgs/',$filenamemkkg);
            $data_gedungbaru->struktur_mkkg = $filenamemkkg;
            $data_gedungbaru->save();
        }
        if($request->hasFile('surat_keterangan_pelatihan')){
           $filesskp = $request->file('surat_keterangan_pelatihan');
            $filenameskp= $filesskp->getClientOriginalName();
            $request->surat_keterangan_pelatihan->move('SuratKeteranganPelatihan/',$filenameskp);
            $data_gedungbaru->surat_keterangan_pelatihan = $filenameskp;
            $data_gedungbaru->save();
        }
        if($request->hasFile('foto_dokumentasi')){
           $filesfotodok = $request->file('foto_dokumentasi');
            $filenamefotodok= $filesfotodok->getClientOriginalName();
            $request->foto_dokumentasi->move('FotoDokumentasi/',$filenamefotodok);
            $data_gedungbaru->foto_dokumentasi = $filenamefotodok;
            $data_gedungbaru->save();
        }
        return redirect()->back()->with('sukses','Data berhasil dilaporkan');
    }
    public function semuadatagedung(Request $request)
    {
        
            $data_gedung = \App\Models\Gedung::all();  
         
        
       
        return view('dashboard.datagedung',compact(['data_gedung']));
    }
    public function lihatsemuagedung(Request $request)
    {
        
            $data_gedung = \App\Models\Gedung::all();  
         
        
       
        return view('dashboard.lihatsemuagedung',compact(['data_gedung']));
    }
    public function searchdatagedung(Request $request)
    {
        
        $cari = $request->cari;
        $type = $request->type;
         
        if(empty($cari) && empty($type)){
            $data_gedung = \App\Models\Gedung::all();
        }elseif($type == 'NIK') {
             $data_gedung = \App\Models\Gedung::where('NIK','LIKE','%'.$cari.'%')->get();
        }elseif($type == 'wilayah') {
            $data_gedung = \App\Models\Gedung::where('wilayah','LIKE','%'.$cari.'%')->get();
        }elseif($type == 'nama_gedung'){
            $data_gedung = \App\Models\Gedung::where('nama_gedung','LIKE','%'.$cari.'%')->get();
        }elseif($type == 'nama_fsm'){
           $data_gedung = \App\Models\Gedung::where('nama_fsm','LIKE','%'.$cari.'%')->get();
        }else{
            $data_gedung = \App\Models\Gedung::where('NIK','LIKE','%'.$cari.'%')
            ->orwhere('wilayah','LIKE','%'.$cari.'%')
            ->orwhere('nama_gedung','LIKE','%'.$cari.'%')
            ->orwhere('nama_fsm','LIKE','%'.$cari.'%')->get();
        }
        
        return view('dashboard.datagedung',compact(['data_gedung']));
    }

    public function detailgedung($id)
    {
        $data_gedung = \App\Models\Gedung::find($id);
        $data_pelaksanaan = \App\Models\Pelaksanaanmkkg::find($data_gedung->pelaksanaanmkkg_id);
         return view('dashboard.detailgedung',['data_gedung' => $data_gedung],['data_pelaksanaan' => $data_pelaksanaan]);
    }
    public function detailsemuagedung($id)
    {
        $data_gedung = \App\Models\Gedung::find($id);
        $data_pelaksanaan = \App\Models\Pelaksanaanmkkg::find($data_gedung->pelaksanaanmkkg_id);
         return view('dashboard.detailsemuagedung',['data_gedung' => $data_gedung],['data_pelaksanaan' => $data_pelaksanaan]);
    }
    public function gedungexport(){
        return Excel::download(new GedungExport,'Datagedung.xlsx');
    }

    public function editgedung($id)
    {
        
        $data_gedung = \App\Models\Gedung::find($id);

        return view('dashboard.editdatagedung',['data_gedung' => $data_gedung])->with('sukses','Data berhasil diperbaharui.');
    }
    public function updatedatagedung(Request $request,$id)
    {
        
        $data_gedung = \App\Models\Gedung::find($id);
        $data_pelaksanaan = \App\Models\Gedung::find($data_gedung->pelaksanaanmkkg_id);

        $data_gedung->update($request->all());
        if($request->hasFile('foto_profile')){
            $request->file('foto_profile')->move('images/gedung/profile/',$request->file('foto_profile')->getClientOriginalName());
            $data_gedung->foto_profile = $request->file('foto_profile')->getClientOriginalName();
            $data_gedung->save();
        }
        if($request->hasFile('struktur_mkkg')){
           $filesmkkg = $request->file('struktur_mkkg');
            $filenamemkkg = $filesmkkg->getClientOriginalName();
            $request->struktur_mkkg->move('strukturmkkgs/',$filenamemkkg);
            $data_gedung->struktur_mkkg = $filenamemkkg;
            $data_gedung->save();
        }
        if($request->hasFile('surat_keterangan_pelatihan')){
           $filesskp = $request->file('surat_keterangan_pelatihan');
            $filenameskp= $filesskp->getClientOriginalName();
            $request->surat_keterangan_pelatihan->move('SuratKeteranganPelatihan/',$filenameskp);
            $data_gedung->surat_keterangan_pelatihan = $filenameskp;
            $data_gedung->save();
        }
        if($request->hasFile('foto_dokumentasi')){
           $filesfotodok = $request->file('foto_dokumentasi');
            $filenamefotodok= $filesfotodok->getClientOriginalName();
            $request->foto_dokumentasi->move('FotoDokumentasi/',$filenamefotodok);
            $data_gedung->foto_dokumentasi = $filenamefotodok;
            $data_gedung->save();
        }


        return view('dashboard.detailgedung',['data_gedung' => $data_gedung],['data_pelaksanaan' => $data_gedung])->with('sukses','Data berhasil diperbaharui.');
    }

    public function deletegedung($id)
    {
        $data_gedung = \App\Models\Gedung::find($id);
        $data_pelaksanaan = \App\Models\Gedung::find($data_gedung->pelaksanaanmkkg_id);
        
        $data_gedung->delete();
        $data_pelaksanaan->delete();
        
        $data_karyawan = \App\Models\Pegawai::latest()->take(3)->get();

        $data_gedung = \App\Models\Gedung::latest()->take(3)->get();
        
        
        return view('dashboard.index',['data_karyawan' => $data_karyawan],['data_gedung' => $data_gedung])->with('sukses','Data berhasil dihapus.');
    }
    public function searchlihatsemuagedung(Request $request)
    {
        
        $cari = $request->cari;
        $type = $request->type;
         
        if(empty($cari) && empty($type)){
            $data_gedung = \App\Models\Gedung::all();
        }elseif($type == 'NIK') {
             $data_gedung = \App\Models\Gedung::where('NIK','LIKE','%'.$cari.'%')->get();
        }elseif($type == 'wilayah') {
            $data_gedung = \App\Models\Gedung::where('wilayah','LIKE','%'.$cari.'%')->get();
        }elseif($type == 'nama_gedung'){
            $data_gedung = \App\Models\Gedung::where('nama_gedung','LIKE','%'.$cari.'%')->get();
        }elseif($type == 'nama_fsm'){
           $data_gedung = \App\Models\Gedung::where('nama_fsm','LIKE','%'.$cari.'%')->get();
        }else{
            $data_gedung = \App\Models\Gedung::where('NIK','LIKE','%'.$cari.'%')
            ->orwhere('wilayah','LIKE','%'.$cari.'%')
            ->orwhere('nama_gedung','LIKE','%'.$cari.'%')
            ->orwhere('nama_fsm','LIKE','%'.$cari.'%')->get();
        }
        
        return view('dashboard.lihatsemuagedung',compact(['data_gedung']));
    }

    public function pelaksanaanmkkggedung($id){
        $data_pelaksanaan = \App\Models\Pelaksanaanmkkg::find($id);
        $data_gedung =  \App\Models\Pelaksanaanmkkg::find($data_pelaksanaan->id);
        

        return view('dashboard.pelaksanaanmkkggedung',compact(['data_pelaksanaan']),compact(['data_gedung']));
    }

    public function showstrukturmkkg($id){
        $data_gedung = \App\Models\Gedung::find($id);
         return view('dashboard.showstrukturmkkg',compact('data_gedung'));
    }

    public function downloadStrukturMkkg($file){
        return response()->download('strukturmkkgs/'.$file);
    }
    public function showSuratSKP($id){
        $data_gedung = \App\Models\Gedung::find($id);
         return view('dashboard.showsuratketeranganpelatihan',compact('data_gedung'));
    }

    public function downloadSuratSKP($file){
        return response()->download('SuratKeteranganPelatihan/'.$file);
    }
    public function showFotoDokumentasi($id){
        $data_gedung = \App\Models\Gedung::find($id);
         return view('dashboard.showfotodokumentasi',compact('data_gedung'));
    }

    public function downloadFotoDokumentasi($file){
        return response()->download('FotoDokumentasi/'.$file);
    }

    public function updatePelaksanaanMkkg(Request $request, $id){
        $data_pelaksanaan = \App\Models\Pelaksanaanmkkg::find($id);
        $data_gedung = \App\Models\gedung::find($data_pelaksanaan->id);

        $data_pelaksanaan->update($request->all());
        if($request->hasFile('tahapan_program_kerja')){
           $filestpk = $request->file('tahapan_program_kerja');
            $filenametpk= $filestpk->getClientOriginalName();
            $request->tahapan_program_kerja->move('PelaksanaanMKKG/TahapanProgramKerja/',$filenametpk);
            $data_pelaksanaan->tahapan_program_kerja = $filenametpk;
            $data_pelaksanaan->save();
        }
        if($request->hasFile('struktur_organisasi')){
           $filesso = $request->file('struktur_organisasi');
            $filenameso= $filesso->getClientOriginalName();
            $request->struktur_organisasi->move('PelaksanaanMKKG/StrukturOrganisasi/',$filenameso);
            $data_pelaksanaan->struktur_organisasi = $filenameso;
            $data_pelaksanaan->save();
        }
        if($request->hasFile('tugas_dan_fungsi')){
           $filestdf = $request->file('tugas_dan_fungsi');
            $filenametdf= $filestdf->getClientOriginalName();
            $request->tugas_dan_fungsi->move('PelaksanaanMKKG/TugasdanFungsi/',$filenametdf);
            $data_pelaksanaan->tugas_dan_fungsi = $filenametdf;
            $data_pelaksanaan->save();
        }
        if($request->hasFile('koordinasi')){
           $fileskoor = $request->file('koordinasi');
            $filenamekoor= $fileskoor->getClientOriginalName();
            $request->koordinasi->move('PelaksanaanMKKG/Koordinasi/',$filenamekoor);
            $data_pelaksanaan->koordinasi = $filenamekoor;
            $data_pelaksanaan->save();
        }
        if($request->hasFile('sarana_prasarana')){
           $filessp = $request->file('sarana_prasarana');
            $filenamesp= $filessp->getClientOriginalName();
            $request->sarana_prasarana->move('PelaksanaanMKKG/SaranaPrasarana/',$filenamesp);
            $data_pelaksanaan->sarana_prasarana = $filenamesp;
            $data_pelaksanaan->save();
        }
        if($request->hasFile('standar_operasional_prosedur_dan_RTDK')){
           $filessopRTDK = $request->file('standar_operasional_prosedur_dan_RTDK');
            $filenamesopRTDK= $filessopRTDK->
            getClientOriginalName();
            $request->standar_operasional_prosedur_dan_RTDK->move('PelaksanaanMKKG/StandarOperasionalProsedurdanRTDK/',$filenamesopRTDK);
            $data_pelaksanaan->standar_operasional_prosedur_dan_RTDK = $filenamesopRTDK;
            $data_pelaksanaan->save();
        }
        if($request->hasFile('Pelatihan_dan_simulasi_evakuasi_kebakaran')){
           $filespsek = $request->file('Pelatihan_dan_simulasi_evakuasi_kebakaran');
            $filenamepsek= $filespsek->getClientOriginalName();
            $request->Pelatihan_dan_simulasi_evakuasi_kebakaran->move('PelaksanaanMKKG/PelatihandanSimulasiEvakuasiKebakaran/',$filenamepsek);
            $data_pelaksanaan->Pelatihan_dan_simulasi_evakuasi_kebakaran = $filenamepsek;
            $data_pelaksanaan->save();
        }
        if($request->hasFile('pengesahan')){
           $filespengesahan = $request->file('pengesahan');
            $filenamepengesahan= $filespengesahan->getClientOriginalName();
            $request->pengesahan->move('PelaksanaanMKKG/Pengesahan/',$filenamepengesahan);
            $data_pelaksanaan->pengesahan = $filenamepengesahan;
            $data_pelaksanaan->save();
        }

        return view('dashboard.detailgedung',['data_pelaksanaan' => $data_pelaksanaan],['data_gedung' => $data_gedung])->with('suksesmkkg','Data Pelaksanaan berhasil diperbaharui.');
    }


    public function showTahapanProgramKerja($id){
        $data_pelaksanaan = \App\Models\Pelaksanaanmkkg::find($id);
        $data_gedung = \App\Models\Gedung::find($data_pelaksanaan->id);
         return view('dashboard.showtahapanprogramkerja',['data_pelaksanaan' => $data_pelaksanaan],['data_gedung' => $data_gedung]);
    }
    public function downloadTahapanProgramKerja($file){
        return response()->download('PelaksanaanMKKG/TahapanProgramKerja/'.$file);
    }
    public function showStrukturOrg($id){
        $data_pelaksanaan = \App\Models\Pelaksanaanmkkg::find($id);
        $data_gedung = \App\Models\Gedung::find($data_pelaksanaan->id);
         return view('dashboard.showstrukturorganisasi',['data_pelaksanaan' => $data_pelaksanaan],['data_gedung' => $data_gedung]);
    }
    public function downloadStrukturOrg($file){
        return response()->download('PelaksanaanMKKG/StrukturOrganisasi/'.$file);
    }
    public function showTugasdanFungsi($id){
        $data_pelaksanaan = \App\Models\Pelaksanaanmkkg::find($id);
        $data_gedung = \App\Models\Gedung::find($data_pelaksanaan->id);
         return view('dashboard.showtugasdanfungsi',['data_pelaksanaan' => $data_pelaksanaan],['data_gedung' => $data_gedung]);
    }
    public function downloadTugasdanFungsi($file){
        return response()->download('PelaksanaanMKKG/TugasdanFungsi/'.$file);
    }
    public function showkoor($id){
        $data_pelaksanaan = \App\Models\Pelaksanaanmkkg::find($id);
        $data_gedung = \App\Models\Gedung::find($data_pelaksanaan->id);
         return view('dashboard.showkoordinasi',['data_pelaksanaan' => $data_pelaksanaan],['data_gedung' => $data_gedung]);
    }
    public function downloadkoor($file){
        return response()->download('PelaksanaanMKKG/Koordinasi/'.$file);
    }
    public function showsarpras($id){
        $data_pelaksanaan = \App\Models\Pelaksanaanmkkg::find($id);
        $data_gedung = \App\Models\Gedung::find($data_pelaksanaan->id);
         return view('dashboard.showsaranaprasarana',['data_pelaksanaan' => $data_pelaksanaan],['data_gedung' => $data_gedung]);
    }
    public function downloadsarpras($file){
        return response()->download('PelaksanaanMKKG/SaranaPrasarana/'.$file);
    }
    public function showStandarOpRTDK($id){
        $data_pelaksanaan = \App\Models\Pelaksanaanmkkg::find($id);
        $data_gedung = \App\Models\Gedung::find($data_pelaksanaan->id);
         return view('dashboard.showstandaroprtdk',['data_pelaksanaan' => $data_pelaksanaan],['data_gedung' => $data_gedung]);
    }
    public function downloadStandarOpRTDK($file){
        return response()->download('PelaksanaanMKKG/StandarOperasionalProsedurdanRTDK/'.$file);
    }
    public function showPSEK($id){
        $data_pelaksanaan = \App\Models\Pelaksanaanmkkg::find($id);
        $data_gedung = \App\Models\Gedung::find($data_pelaksanaan->id);
         return view('dashboard.showpsek',['data_pelaksanaan' => $data_pelaksanaan],['data_gedung' => $data_gedung]);
    }
    public function downloadPSEK($file){
        return response()->download('PelaksanaanMKKG/PelatihandanSimulasiEvakuasiKebakaran/'.$file);
    }
    public function showPengesahan($id){
        $data_pelaksanaan = \App\Models\Pelaksanaanmkkg::find($id);
        $data_gedung = \App\Models\Gedung::find($data_pelaksanaan->id);
         return view('dashboard.showpengesahan',['data_pelaksanaan' => $data_pelaksanaan],['data_gedung' => $data_gedung]);
    }
    public function downloadPengesahan($file){
        return response()->download('PelaksanaanMKKG/Pengesahan/'.$file);
    }
}
