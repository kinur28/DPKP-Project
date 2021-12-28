@extends('layouts.de-master')
@section('title', 'Tambah Pegawai')
@section('content')
<div class="container">
		  <div class="d-flex align-items-center p-3 my-3 text-dark bg-info rounded shadow-sm">
		  	
			  <div class="me-5 p-2">
			  	<a class="text-decoration-none" href="{{ url('/Dashboard/data-karyawan') }}">
			  		<h5 class="text-dark "><i class="fas fa-chevron-left"></i>Kembali</h5>
			  	</a>
			  </div>
			  
			  
			  	<h1 class="h3 mb-0 text-dark ms-5 me-5"><i class="fas fa-user-plus"></i> Tambah Data Pegawai</h1>
			 
			
		  </div>

		  <div class="my-3 p-3 bg-body rounded shadow-sm">
		  	<div class="col-md-7 mx-auto col-lg-8">
		  	<form class="row g-3" action="/Dashboard/data-karyawan/tambahkaryawan" method="POST"  enctype="multipart/form-data">
		  		{{csrf_field()}}
		  		
			  <div class="col-12">
				<label class="form-label" for="inlineFormInputGroupUsername">NIP</label>  
				<input type="text" class="form-control" id="NIP" name="NIP" placeholder="NIP" required>
			  </div>
			  <div class="col-12">
			    <label class="form-label" for="inlineFormInputGroupUsername">Nama Lengkap</label>
				    <div class="input-group">
				      <div class="input-group-text"><i class="fas fa-user-alt"></i></div>
				      <input type="text" class="form-control" id="namalengkap" name="nama_lengkap" placeholder="Nama Lengkap" required>
				    </div>
			  </div>
			  <div class="col-12">
			    <label class="form-label" for="inlineFormInputGroupUsername">Email</label>
				    <div class="input-group">
				      <div class="input-group-text"><i class="fas fa-envelope"></i></div>
				      <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
				    </div>
			  </div>
			  <div class="col-12">
			    <label class="form-label" for="inlineFormInputGroupUsername">Jabatan</label>
				    <div class="input-group">
				      
				      <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan" required>
				    </div>
			  </div>
			  <div class="col-12">
			  	<label class="form-label" for="inlineFormInputGroupUsername">Jenis Kelamin</label>
			    <select class="form-select" id="jeniskelamin" name="jenis_kelamin" aria-label="Default select example" required>
				  <option selected>Pilih Jenis Kelamin</option>
				  <option value="P">Perempuan</option>
				  <option value="L">Laki-laki</option>
				</select>
			  </div>
			  <div class="col-md-12">
			    <label class="form-label" for="inlineFormInputGroupUsername">Tempat Tugas</label>  
				<input type="text" class="form-control" id="tempattugas" name="tempat_tugas" placeholder="Tempat Tugas" required>
			  </div>
			  
			  <div class="col-12">
			  	<label class="form-label" for="inlineFormInputGroupUsername">Wilayah</label>
			    <select class="form-select" id="wilayah" name="wilayah" aria-label="Default select example" required>
				  <option selected>Pilih Wilayah</option>
				  <option value="Jakarta Pusat">Jakarta Pusat</option>
				  <option value="Jakarta Utara">Jakarta Utara</option>
				  <option value="Jakarta Timur">Jakarta Timur</option>
				  <option value="Jakarta Barat">Jakarta Barat</option>
				  <option value="Jakarta Selatan">Jakarta Selatan</option>
				  <option value="Kepulauan Seribu">Kepulauan Seribu</option>
				</select>
			  </div>
			 
			  <div class="col-md-2">
			    <a href="{{ url('/Dashboard/data-karyawan') }}" type="submit" class="btn btn-secondary">cancel</a>
			  </div>
			  <div class="col-md-2">
			    <button type="submit" class="btn btn-primary">Submit</button>
			  </div>
			</form>
			</div>
		  </div>
</div>
@stop