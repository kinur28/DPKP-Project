@extends('layouts.de-master')
@section('title', 'Edit Gedung')
@section('content')
<div class="container">
		  <div class="d-flex align-items-center p-3 my-3 text-dark bg-info rounded shadow-sm">
		  	<div class="me-2 p-2">
				 
				<a class="text-dark" href="/Dashboard/data-laporan-gedung/{{$data_gedung->id}}/detail">
					<h5 class="text-dark "><i class="fas fa-chevron-left"></i>Kembali</h5>
				</a>
					
				
			</div>
			  
			  
			  	<h1 class="h3 mb-0 text-dark ms-5 me-5"><i class="fas fa-edit"></i></i>Edit Data Gedung</h1>
			  
			
		  </div>

		  <div class="my-3 p-3 bg-body rounded shadow-sm">
		  	
		  	<div class="col-md-7 mx-auto col-lg-8">
		  	@if(session('sukses'))
					<div class="my-auto mx-5 alert alert-success" role="alert">
					  {{session('sukses')}}
					</div>
			@endif

			<form class="row g-3" action="/Dashboard/data-laporan-gedung/{{$data_gedung->id}}/update" method="POST" enctype="multipart/form-data">
		  		{{csrf_field()}}
		  		
		  		<img src="{{$data_gedung->getFotoProfile()}}" class="mx-auto" style="width: 250px; height: 250px; object-fit: cover;">
				<div class="mx-auto text-center">
				  	<label for="fotoprofile">Ganti Foto Profile Gedung</label>
				  	<input type="file" name="foto_profile" id="fotoprofile">
				</div>
			  <div class="col-12">
					<label class="form-label" for="inlineFormInputGroupUsername">Wilayah</label>  
					<input type="text" class="form-control" id="wilayah" name="wilayah" value="{{$data_gedung->wilayah}}" >
			  </div>
			  <div class="col-12">
					<label class="form-label" for="inlineFormInputGroupUsername">Nama Gedung</label>  
					<input type="text" class="form-control" id="namagedung" name="nama_gedung" value="{{$data_gedung->nama_gedung}}" >
			  </div>
			  <div class="col-12">
					<label class="form-label" for="inlineFormInputGroupUsername">Alamat</label>  
					<input type="text" class="form-control" id="alamat" name="alamat" value="{{$data_gedung->alamat}}" >
			  </div>
			  <div class="col-12">
			  	<label class="form-label" for="inlineFormInputGroupUsername">Klasifikasi</label>
			    <select class="form-select" type="text" id="klasifikasi" name="klasifikasi">
				  <option selected>Pilih Klasifikasi</option>
				  <option value="Rendah" @if($data_gedung->klasifikasi == 'Rendah') selected @endif>Rendah</option>
				  <option value="Sedang" @if($data_gedung->klasifikasi == 'Sedang') selected @endif>Sedang</option>
				  <option value="Tinggi" @if($data_gedung->klasifikasi == 'Tinggi') selected @endif>Tinggi</option>
				  
				</select>
			  </div>
			  <div class="col-12">
					<label class="form-label" for="inlineFormInputGroupUsername">Nama FSM</label>  
					<input type="text" class="form-control" id="namafsm" name="nama_fsm" value="{{$data_gedung->nama_fsm}}">
			  </div>
			  <div class="col-12">
					<label class="form-label" for="inlineFormInputGroupUsername">Tahun Pelatihan</label>  
					<input type="text" class="form-control" id="tahunpelatihan" name="tahun_pelatihan" value="{{$data_gedung->tahun_pelatihan}}" >
			  </div>
			  <div class="col-12">
					<label class="form-label" for="inlineFormInputGroupUsername">Struktur MKKG</label>  
					<input type="file" class="form-control" id="struktruMKKG" name="struktur_mkkg" value="{{$data_gedung->struktur_mkkg}}" >
					<p>File yang sudah dimasukkan : {{$data_gedung->struktur_mkkg}} </p>
			  </div>
			  
			  <div class="col-12">
			  	<label class="form-label" for="inlineFormInputGroupUsername">Keterangan</label>
			    <select class="form-select" type="text" id="keterangan" name="keterangan">
				  <option selected>Pilih Keterangan</option>
				  <option value="Belum" @if($data_gedung->keterangan == 'Belum') selected @endif>Belum</option>
				  <option value="Sudah" @if($data_gedung->keterangan == 'Sudah') selected @endif>Sudah</option> 
				</select>
			  </div>
			  <div  class="col-12">
					<label class="form-label" for="inlineFormInputGroupUsername">Surat Keterangan Pelatihan</label>  
					<input type="file" class="form-control" id="suratketeranganpelatihan" name="surat_keterangan_pelatihan">
					<p>File yang sudah dimasukkan : {{$data_gedung->surat_keterangan_pelatihan}}</p>
			  </div>
			 
			  
			  <div class="col-12">
					<label class="form-label" for="inlineFormInputGroupUsername">Foto Dokumentasi</label>  
					<input type="file" class="form-control" id="fotodokumentasi" name="foto_dokumentasi" value="{{$data_gedung->foto_dokumentasi}}" >
					<p>File yang sudah dimasukkan : {{$data_gedung->foto_dokumentasi}}</p>
			  </div>
			  
			  	
				  <div class="col-md-2">
				    <button type="submit" class="btn btn-warning">Update</button>
				  </div>
			  
				 
			</form>
			</div>
		  </div>
@stop