@extends('layouts.de-master')
@section('title', 'Tambah Gedung')
@section('content')
<div class="container">
	<div class="d-flex align-items-center p-3 my-3 text-dark bg-info rounded shadow-sm">
		  	
		<div class="me-5 p-2">
				  	
			@if(auth()->user()->role == 'userkaryawan')
					<form href="{{ url('/Dashboard/data-gedung') }} "  method="GET" action="/Dashboard/data-gedung">
						<input type="hidden" class="form-control" name="user_id" value="{{auth()->user()->id}}" aria-label="Search">
						<button type="submit" style ="padding: 0; border: none;background: none;"class="nav-link h5 text-dark bg-info">
							<i class="fas fa-chevron-left"></i>Kembali
						</button>
					</form>
			@endif
		</div>
			  
			  
			  	<h1 class="h3 mb-0 text-dark ms-5 me-5 "><i class="fas fa-user-plus"></i> Tambah Data Gedung</h1>
			  
			
	 </div>

		  <div class="my-3 p-3 bg-body rounded shadow-sm">
		  	<div class="col-md-7 mx-auto col-lg-8">
		  		@if(session('sukses'))
					<div class="mx-5 alert alert-success" role="alert">
					  {{session('sukses')}}
					</div>
					@endif
		  	<form class="row g-3" action="/Dashboard/data-gedung/tambahgedung" method="POST" enctype="multipart/form-data">
		  		{{csrf_field()}}
		  		<input type="hidden" name="user_id" value="{{auth()->user()->id}}">
		  		<img src="{{url('/images/gedung/profile/default.png')}}" class="mx-auto" style="width: 350px; height: 250px; object-fit: cover;">
		  		<div class="col-12 mx-auto text-center">
					<label for="fotoprofile">Foto Profile Gedung</label>
					<input id="fotoprofile" name="foto_profile" type="file" class="file" data-show-preview="false">
				</div>
				
				<div class="col-12">
					<label class="form-label" for="inlineFormInputGroupUsername">Nama Gedung</label>  
					<input type="text" class="form-control" id="namagedung" name="nama_gedung" placeholder="Masukkan Nama Gedung">
				</div>
				<div class="col-12">
					<label class="form-label" for="inlineFormInputGroupUsername">Alamat</label>  
					<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat Gedung">
				</div>
				
				<div class="col-12">
					<label class="form-label" for="inlineFormInputGroupUsername">Nomor Telepon</label>  
					<input type="text" class="form-control" id="nomortelp" name="nomor_telp" placeholder="Masukkan Nomor Telepon">
				</div>

				<div class="col-12">
					<label class="form-label" for="inlineFormInputGroupUsername">Wilayah</label>
					<select class="form-select" id="wilayah" name="wilayah" aria-label="Default select example">
						<option selected>Pilih Wilayah</option>
						<option value="Jakarta Pusat">Jakarta Pusat</option>
						<option value="Jakarta Utara">Jakarta Utara</option>
						<option value="Jakarta Timur">Jakarta Timur</option>
						<option value="Jakarta Barat">Jakarta Barat</option>
						<option value="Jakarta Selatan">Jakarta Selatan</option>
						<option value="Kepulauan seribu">Kepulauan Seribu</option>
					</select>
				</div>
				
				<div class="col-12">
					<label class="form-label" for="inlineFormInputGroupUsername">Klasifikasi</label>
					<select class="form-select" id="klasifikasi" name="klasifikasi" aria-label="Default select example">
						<option selected>Pilih Klasifikasi</option>
						<option value="Rendah">Rendah</option>
						<option value="Sedang">Sedang</option>
						<option value="Tinggi">Tinggi</option>
					</select>
				</div>
				<div class="col-12">
					<label class="form-label" for="inlineFormInputGroupUsername">Nama FSM</label>
					<input type="text" class="form-control" id="namafsm" name="nama_fsm" placeholder="Masukkan Nama FSM">
				</div>
				<div class="col-12">
					<label class="form-label" for="inlineFormInputGroupUsername">Tahun Pelatihan</label>
					<input type="text" class="form-control" id="tahunpelatihan" name="tahun_pelatihan" placeholder="Masukkan Tahun Pelatihan">
				</div>
				
				
				<div class="col-12">
					<label class="form-label" for="inlineFormInputGroupUsername">Struktur MKKG</label>  
					<input type="file" class="form-control" id="struktruMKKG" name="struktur_mkkg">
			  </div>
				<div class="col-12">
					<label class="form-label" for="inlineFormInputGroupUsername">Keterangan</label>
					<select class="form-select" id="keterangan" name="keterangan" onchange="showDiv(this)" >
						<option selected>Pilih Keterangan</option>
						<option value="Sudah" >Sudah</option>
						<option value="Belum" >Belum</option>
					</select>
					
				</div>
				<div id="hidden_div" style="display:none;" class="col-12">
					<label class="form-label" for="inlineFormInputGroupUsername">Surat Keterangan Pelatihan</label>  
					<input type="file" class="form-control" id="suratketeranganpelatihan" name="surat_keterangan_pelatihan">
			  </div>
				
				

				<div class="col-12">
					<label class="form-label" for="inlineFormInputGroupUsername">Foto Dokumentasi</label>  
					<input type="file" class="form-control" id="fotodokumentasi" name="foto_dokumentasi">
			  </div>
				<div class="col-md-2">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
			</div>
		  </div>
</div>
@stop