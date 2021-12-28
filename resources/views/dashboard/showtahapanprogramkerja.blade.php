@extends('layouts.de-master')
@section('title', 'View Tahapan Program Kerja')
@section('content')
<div class="container">
	<div class="d-flex align-items-center p-3 my-3 text-dark bg-info rounded shadow-sm">
		  	
		<div class="me-5 p-2">
			@if(auth()->user()->role == 'admin')
				<a class="text-decoration-none" href="{{ url('/Dashboard/data-laporan-gedung') }}">
					<h5 class="text-dark "><i class="fas fa-chevron-left"></i>Kembali</h5>
				</a>
		  	@endif
			@if(auth()->user()->role == 'userkaryawan')
				<a class="text-dark" href="/Dashboard/data-laporan-gedung/{{$data_gedung->id}}/detail">
					<h5 class="text-dark "><i class="fas fa-chevron-left"></i>Kembali</h5>
				</a>
			@endif
		</div>
			  
			  
		<h1 class="h3 mb-0 text-dark ms-5 me-5">Tahapan Program Kerja Gedung : {{$data_gedung->nama_gedung}}</h1>
			  
			
	</div>
	<div class="my-3 p-3 bg-body rounded shadow-sm">
		<div class="col-md-7 mx-auto col-lg-8 mb-3">
			<iframe style="width: 700px; height: 900px;" src="{{$data_pelaksanaan->getTahapanProgramKerja()}}"></iframe>
		</div>
	</div>
</div>
@stop