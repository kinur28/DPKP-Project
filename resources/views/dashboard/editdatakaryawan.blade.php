@extends('layouts.de-master')
@section('title', 'Edit Karyawan')
@section('content')
<div class="container">
		  <div class="d-flex align-items-center p-3 my-3 text-dark bg-info rounded shadow-sm">
		  	
			  <div class="me-2 p-2">
			  	<a class="text-decoration-none" href="{{ url('/Dashboard/data-karyawan') }}">
			  		<h5 class="text-dark "><i class="fas fa-chevron-left"></i>Kembali</h5>
			  	</a>
			  </div>
			  
			  
			  	<h1 class="h3 mb-0 text-dark ms-5 me-5"><i class="fas fa-user-edit"></i>Edit Data Pegawai</h1>
			 
			
		  </div>

		  <div class="my-3 p-3 bg-body rounded shadow-sm">
		  	<div class="col-md-7 mx-auto col-lg-8">
		  	<form class="row g-3" action="/Dashboard/data-karyawan/{{$data_karyawan->id}}/update" method="POST" enctype="multipart/form-data">
		  		{{csrf_field()}}
		  		<img src="{{$data_karyawan->getFotoProfile()}}" class="justify-content-center" style="width: 150px; height: 150px;border-radius: 50%; object-fit: cover;">
			  <div class="col-12">
					<label class="form-label" for="inlineFormInputGroupUsername">NIP</label>  
					<input type="text" class="form-control" id="NIP" name="NIP" value="{{$data_karyawan->NIP}}" readonly>
			  </div>
			  <div class="col-12">
			    <label class="form-label" for="inlineFormInputGroupUsername">Nama Lengkap</label>
				    <div class="input-group">
				      <div class="input-group-text"><i class="fas fa-user-alt"></i></div>
				      <input type="text" class="form-control" id="namalengkap" name="nama_lengkap" placeholder="Nama Lengkap" value="{{$data_karyawan->nama_lengkap}}">
				    </div>
			  </div>
			  <div class="col-12">
			    <label class="form-label" for="inlineFormInputGroupUsername">Email</label>
				    <div class="input-group">
				      <div class="input-group-text"><i class="fas fa-envelope"></i></div>
				      <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{$data_karyawan->email}}" >
				    </div>
			  </div>
			  <div class="col-12">
			    <label class="form-label" for="inlineFormInputGroupUsername">Jabatan</label>
				    <div class="input-group">
				      
				      <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan" value="{{$data_karyawan->jabatan}}">
				    </div>
			  </div>
			  <div class="col-12">
			  	<label class="form-label" for="inlineFormInputGroupUsername">Jenis Kelamin</label>
			    <select class="form-select" id="jeniskelamin" name="jenis_kelamin" aria-label="Default select example">
				  <option selected>Pilih Jenis Kelamin</option>
				  <option value="P" @if($data_karyawan->jenis_kelamin == 'P') selected @endif>Perempuan</option>
				  <option value="L" @if($data_karyawan->jenis_kelamin == 'L') selected @endif>Laki-laki</option>
				</select>
			  </div>
			  <div class="col-12">
			   	<label class="form-label" for="inlineFormInputGroupUsername">Tempat Tugas</label>  
				<input type="text" class="form-control" id="tempattugas" name="tempat_tugas" placeholder="Tempat Tugas" value="{{$data_karyawan->tempat_tugas}}">
			  </div>
			  <div class="col-12">
			  	<label class="form-label" for="inlineFormInputGroupUsername">Wilayah</label>
			    <select class="form-select" id="wilayah" name="wilayah" aria-label="Default select example">
				  <option selected>Pilih Wilayah</option>
				  <option value="Jakarta Pusat" @if($data_karyawan->wilayah == 'Jakarta Pusat') selected @endif>Jakarta Pusat</option>
				  <option value="Jakarta Utara" @if($data_karyawan->wilayah == 'Jakarta Utara') selected @endif>Jakarta Utara</option>
				  <option value="Jakarta Timur" @if($data_karyawan->wilayah == 'Jakarta Timur') selected @endif>Jakarta Timur</option>
				  <option value="Jakarta Barat" @if($data_karyawan->wilayah == 'Jakarta Barat') selected @endif>Jakarta Barat</option>
				  <option value="Jakarta Selatan" @if($data_karyawan->wilayah == 'Jakarta Selatan') selected @endif>Jakarta Selatan</option>
				  <option value="Kepulauan Seribu"  @if($data_karyawan->wilayah == 'Kepulauan Seribu') selected @endif>Kepulauan Seribu</option>
				</select>
			  </div>
			  <div class="col-12 bg-light">
			  	<label for="fotoprofile">Ganti Foto Profile</label>
			  	<input type="file" name="foto_profile" id="fotoprofile">
			  	
			  </div>
			  <div class="col-md-2">
			    <a href="{{ url('/Dashboard/data-karyawan') }}" type="submit" class="btn btn-secondary">cancel</a>
			  </div>
			  <div class="col-md-2">
			    <button type="submit" class="btn btn-warning">Update</button>
			  </div>
			</form>
			</div>
		  </div>
@stop