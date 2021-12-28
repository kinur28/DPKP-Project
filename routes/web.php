<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\AuthController::class, 'index'])->name('login');
Route::post('/postlogin', [App\Http\Controllers\AuthController::class, 'postlogin']);
Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout']);

Route::group(['middleware'=>['auth','cekRole:adminkeamanan']],function(){
	Route::get('/Dashboard-keamanan/{id}/resetpassword', [App\Http\Controllers\DashboardController::class, 'reset']);
});

Route::group(['middleware'=>['auth','cekRole:admin']],function(){
	
	Route::get('/Dashboard/data-karyawan', [App\Http\Controllers\KaryawanController::class, 'datakaryawan']);
	Route::get('/Dashboard/data-karyawan/tambah', [App\Http\Controllers\KaryawanController::class, 'tambahkaryawan']);
	
	Route::post('/Dashboard/data-karyawan/tambahkaryawan', [App\Http\Controllers\KaryawanController::class, 'tambahdatakaryawan']);
	Route::get('/Dashboard/data-karyawan/{id}/edit', [App\Http\Controllers\KaryawanController::class, 'editdatakaryawan']);
	Route::post('/Dashboard/data-karyawan/{id}/update', [App\Http\Controllers\KaryawanController::class, 'updatedatakaryawan']);
	Route::get('/Dashboard/data-karyawan/{id}/delete', [App\Http\Controllers\KaryawanController::class, 'deletedatakaryawan']);
	Route::get('/Dashboard/data-karyawan/{id}/Profile', [App\Http\Controllers\KaryawanController::class, 'profiledatakaryawan']);
	Route::get('/Dashboard/data-laporan-gedung/search', [App\Http\Controllers\GedungController::class, 'searchdatagedung']);
	Route::get('/Dashboard/data-karyawan/search', [App\Http\Controllers\KaryawanController::class, 'searchdatakaryawan']);
	Route::get('/Dashboard/data-laporan-gedung', [App\Http\Controllers\GedungController::class, 'semuadatagedung']);
	route::get('/exportdatakaryawan',  [App\Http\Controllers\KaryawanController::class, 'karyawanexport'])->name('karyawanexport');
	route::get('/exportdatagedung',  [App\Http\Controllers\GedungController::class, 'gedungexport'])->name('gedungexport');
});

Route::group(['middleware'=>['auth','cekRole:admin,userkaryawan,adminkeamanan']],function(){
	Route::get('/Dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

	Route::get('/Dashboard/profile', [App\Http\Controllers\KaryawanController::class, 'pageprofile'])->name('profile');
	Route::get('/Dashboard/changepassword', [App\Http\Controllers\KaryawanController::class, 'pagechangepassword']);
	Route::post('Dashboard/updatePassword',[App\Http\Controllers\KaryawanController::class, 'changepassword'])->name('updatepassword');
	
	Route::get('/Dashboard/data-laporan-gedung/{id}/detail', [App\Http\Controllers\GedungController::class, 'detailgedung']);
	Route::get('/Dashboard/Edit-Profile', [App\Http\Controllers\KaryawanController::class, 'editprofile'])->name('editprofile');
	Route::post('/Dashboard/Edit-Profile/{id}/update', [App\Http\Controllers\KaryawanController::class, 'updateprofilekaryawan']);
	Route::get('/Dashboard/data-laporan-gedung/{id}/delete', [App\Http\Controllers\GedungController::class, 'deletegedung']);
	Route::get('/Dashboard/data-laporan-gedung/{id}/edit', [App\Http\Controllers\GedungController::class, 'editgedung']);
	
	Route::post('/Dashboard/data-laporan-gedung/{id}/update', [App\Http\Controllers\GedungController::class, 'updatedatagedung']);

	Route::get('/Dashboard/data-laporan-gedung/view/{id}/strukturmkkg', [App\Http\Controllers\GedungController::class, 'showstrukturmkkg']);
	Route::get('/Dashboard/data-laporan-gedung/download/{file}/strukturmkkg', [App\Http\Controllers\GedungController::class, 'downloadStrukturMkkg']);

	Route::get('/Dashboard/data-laporan-gedung/view/{id}/suratketeranganpelatihan', [App\Http\Controllers\GedungController::class, 'showSuratSKP']);
	Route::get('/Dashboard/data-laporan-gedung/download/{file}/suratketeranganpelatihan', [App\Http\Controllers\GedungController::class, 'downloadSuratSKP']);

	Route::get('/Dashboard/data-laporan-gedung/view/{id}/fotodokumentasi', [App\Http\Controllers\GedungController::class, 'showFotoDokumentasi']);
	Route::get('/Dashboard/data-laporan-gedung/download/{file}/fotodokumentasi', [App\Http\Controllers\GedungController::class, 'downloadFotoDokumentasi']);

	Route::get('/Dashboard/data-laporan-gedung/view/{id}/tahapanprogramkerja', [App\Http\Controllers\GedungController::class, 'showTahapanProgramKerja']);
	Route::get('/Dashboard/data-laporan-gedung/download/{file}/tahapanprogramkerja', [App\Http\Controllers\GedungController::class, 'downloadTahapanProgramKerja']);

	Route::get('/Dashboard/data-laporan-gedung/view/{id}/strukturorganisasi', [App\Http\Controllers\GedungController::class, 'showStrukturOrg']);
	Route::get('/Dashboard/data-laporan-gedung/download/{file}/strukturorganisasi', [App\Http\Controllers\GedungController::class, 'downloadStrukturOrg']);

	Route::get('/Dashboard/data-laporan-gedung/view/{id}/tugasdanfungsi', [App\Http\Controllers\GedungController::class, 'showTugasdanFungsi']);
	Route::get('/Dashboard/data-laporan-gedung/download/{file}/tugasdanfungsi', [App\Http\Controllers\GedungController::class, 'downloadTugasdanFungsi']);

	Route::get('/Dashboard/data-laporan-gedung/view/{id}/koordinasi', [App\Http\Controllers\GedungController::class, 'showkoor']);
	Route::get('/Dashboard/data-laporan-gedung/download/{file}/koordinasi', [App\Http\Controllers\GedungController::class, 'downloadkoor']);

	Route::get('/Dashboard/data-laporan-gedung/view/{id}/saranaprasarana', [App\Http\Controllers\GedungController::class, 'showsarpras']);
	Route::get('/Dashboard/data-laporan-gedung/download/{file}/saranaprasarana', [App\Http\Controllers\GedungController::class, 'downloadsarpras']);

	Route::get('/Dashboard/data-laporan-gedung/view/{id}/standaroperasionaldanRTDK', [App\Http\Controllers\GedungController::class, 'showStandarOpRTDK']);
	Route::get('/Dashboard/data-laporan-gedung/download/{file}/standaroperasionaldanRTDK', [App\Http\Controllers\GedungController::class, 'downloadStandarOpRTDK']);

	Route::get('/Dashboard/data-laporan-gedung/view/{id}/pelatihandansimulasievaluasikebakaran', [App\Http\Controllers\GedungController::class, 'showPSEK']);
	Route::get('/Dashboard/data-laporan-gedung/download/{file}/pelatihandansimulasievaluasikebakaran', [App\Http\Controllers\GedungController::class, 'downloadPSEK']);

	Route::get('/Dashboard/data-laporan-gedung/view/{id}/pengesahan', [App\Http\Controllers\GedungController::class, 'showPengesahan']);
	Route::get('/Dashboard/data-laporan-gedung/download/{file}/pengesahan', [App\Http\Controllers\GedungController::class, 'downloadPengesahan']);

});

Route::group(['middleware'=>['auth','cekRole:userkaryawan']],function(){
	/*Route::get('/Dashboard', [App\Http\Controllers\DashboardController::class, 'indexkaryawan']);*/
	Route::get('/Dashboard/data-gedung', [App\Http\Controllers\GedungController::class, 'datagedung']);
	Route::get('/Dashboard/lihat-semua-gedung', [App\Http\Controllers\GedungController::class, 'lihatsemuagedung']);
	Route::get('/Dashboard/lihat-semua-gedung/search', [App\Http\Controllers\GedungController::class, 'searchlihatsemuagedung']);
	Route::get('/Dashboard/data-laporan-gedung/{id}/detailsemua', [App\Http\Controllers\GedungController::class, 'detailsemuagedung']);

		Route::get('/Dashboard/data-gedung/tambah', [App\Http\Controllers\GedungController::class, 'tambahgedung']);
	Route::post('/Dashboard/data-gedung/tambahgedung', [App\Http\Controllers\GedungController::class, 'tambahdatagedung']);
	Route::get('/Dashboard/data-laporan-gedung/{id}/pelaksanaanmkkg',[App\Http\Controllers\GedungController::class, 'pelaksanaanmkkggedung']);
	Route::post('/Dashboard/pelaksanaanmkkg/{id}/update',[App\Http\Controllers\GedungController::class, 'updatePelaksanaanMkkg']);
});

// Route::get('/', function () {
//     return view('welcome');
// });
