@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')
	<div class="nav-scroller bg-dark shadow-sm" >
		<nav class="nav nav-underline">
			<ul class="nav d-flex justify-content-center ">
				<li class="p-1">
					<a href="{{ url('/Dashboard') }}" class="nav-link active text-white">
						Dashboard
					</a>
				</li>
				@if(auth()->user()->role == 'admin')
				<li class="p-1">	    
					<a href="{{ url('/Dashboard/data-karyawan') }}" class="nav-link text-blue">
						Data Pegawai
					</a>
				</li>
				<li class="p-1">
					<a href="{{ url('/Dashboard/data-laporan-gedung') }}" class="nav-link text-white">
						Data Laporan Gedung
					</a>
				</li>
				@endif
				@if(auth()->user()->role == 'userkaryawan')
				<li class="p-1">
					<form href="{{ url('/Dashboard/data-gedung') }} "  method="GET" action="/Dashboard/data-gedung">
						<input type="hidden" class="form-control" name="user_id" value="{{auth()->user()->id}}" aria-label="Search">
						<button type="submit" style="padding: 0; border: none; background: none;" class=" mt-2 nav-link text-white">
			 				Pendataan Gedung
						</button>
					</form>
				</li>  	
				<li class="p-1">
					<a href="{{ url('/Dashboard/lihat-semua-gedung') }}" class="nav-link text-white ">
						Lihat Semua Gedung
					</a>
				</li>  
				@endif
			</ul>
		</nav>
	</div>
	<div class="container">
		<div class="d-flex align-items-center p-3 my-3 text-dark bg-info rounded shadow-sm">
				<h3>Data Pegawai</h3>
		</div>
		<div class="card">
			<div class="mx-4 card-body w-80 justify-content-center">
				<div class="d-flex justify-content-md-end">
					<a href="{{ route('karyawanexport') }}" class="btn btn-success btn-lg">Export</a>
					<a href="{{ url('/Dashboard/data-karyawan/tambah') }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Tambah Pegawai</a>
				</div>
					
			</div>
			
			@if(session('sukses'))
				<div class="w-80 my-auto mx-5 alert alert-success" role="alert">
					{{session('sukses')}}
				</div>
			@endif
			<div class="mx-4 card-body w-80 bg-light mb-light border border-secondary mb-2 rounded">
				<nav class="navbar navbar-expand-lg navbar-light bg-light rounded" aria-label="Twelfth navbar example">
					
					<div class="container-fluid">
					    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample10" aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
					    <span class="navbar-toggler-icon"></span>
					    </button>

					    <div class="collapse navbar-collapse justify-content-lg-center" id="navbarsExample10">
						        
						    <form class="navbar-nav form-inline" method="GET" action="/Dashboard/data-karyawan/search" role="search">
							  		
							  	<input type="search" class="nav-item form-control" name="cari" placeholder="Search..." aria-label="Search">
								<select class="nav-item form-select" id="wilayah" name="type" aria-label="Default select example" required>
									<option value="" selected>--Search By--</option>
									<option value="NIK">NIP</option>
									<option value="nama_lengkap">Nama Lengkap</option>
									<option value="wilayah">Wilayah</option>
								</select>
								<button class="nav-item btn btn-outline-dark">Search</button>

								<a class="nav-item btn btn-primary" href="{{ url('/Dashboard/data-karyawan') }}">All</a>
						    </form>
					    </div>
					</div>
				</nav>
			</div>
			<div class="mx-4" style="position:relative;">	
				<table class="table table-hover table-sm" style="width: 100%">
					<thead class="table-light">
						<tr>
							<th>NO</th>
							<th>NIP</th>
							<th>NAMA LENGKAP</th>
							<th>JABATAN</th>
							<th>TEMPAT TUGAS</th>
							<th>WILAYAH</th>
							<th>AKSI</th>
						</tr>
					</thead >
					@foreach($data_karyawan as $index => $karyawan)
					<tbody>
						<tr>
							<td><a class="text-dark" href="/Dashboard/data-karyawan/{{$karyawan->id}}/Profile">{{ $index +1 }}</a></td>	
							<td><a class="text-dark" href="/Dashboard/data-karyawan/{{$karyawan->id}}/Profile">{{ $karyawan->NIP }}</a></td>
							<td><a class="text-dark" href="/Dashboard/data-karyawan/{{$karyawan->id}}/Profile">{{ $karyawan->nama_lengkap }}</a></td>
							<td><a class="text-dark"href="/Dashboard/data-karyawan/{{$karyawan->id}}/Profile">{{ $karyawan->jabatan }}</a></td>
							<td><a class="text-dark"href="/Dashboard/data-karyawan/{{$karyawan->id}}/Profile">{{ $karyawan->tempat_tugas }}</a></td>
							<td><a class="text-dark"href="/Dashboard/data-karyawan/{{$karyawan->id}}/Profile">{{ $karyawan->wilayah }}</a></td>
							<td><a href="/Dashboard/data-karyawan/{{$karyawan->id}}/edit" class="btn btn-warning btn-sm"><i class="fas fa-user-edit"></i></a><a href="/Dashboard/data-karyawan/{{$karyawan->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Apakah yakin data akan dihapus?')"><i class="fas fa-trash-alt"></i></a></td>
						</tr>
					</tbody>
					@endforeach
				</table>
			</div>
		</div>
		
	</div>
	
@stop