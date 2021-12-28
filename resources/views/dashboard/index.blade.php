@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')

	<div class="nav-scroller bg-dark shadow-sm" >
		<nav class="nav nav-underline">
			<ul class="nav d-flex justify-content-center ">
				<li class="p-1">
					<a href="{{ url('/Dashboard') }}" class="nav-link active text-blue">
						Dashboard
					</a>
				</li>
				@if(auth()->user()->role == 'admin')
				<li class="p-1">	    
					<a href="{{ url('/Dashboard/data-karyawan') }}" class="nav-link text-white">
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
				<h3>Dashboard</h3>
			</div>
		@if(auth()->user()->role == 'admin')
			<div >
				<div class="card my-3 p-3 bg-body rounded shadow-smmy-3 p-3 bg-body rounded shadow-sm">

					<h4 class="card-header text-dark bg-body p-3 border-bottom pb-2 mb-0">Data Pegawai Baru</h4>
					

					@foreach($data_karyawan as $karyawan)
					<div class="alert alert-success my-2 mx-3" role="alert">
						<img src="{{auth()->user()->getFotoProfile()}}" class="fotoprofile" style="width: 40px; height: 40px;"> {{ $karyawan->nama_lengkap }} telah di tambahkan.
					</div>
					@endforeach
					<div class="card-footer bg-body"><a class="text-blue"href="{{ url('/Dashboard/data-karyawan') }}">Tampilkan Semua>></a>
					</div>
				</div>

				<div class="card my-3 p-3 bg-body rounded shadow-smmy-3 p-3 bg-body rounded shadow-sm">
					<h5 class="card-header text-dark bg-body p-3 border-bottom pb-2 mb-0">Data Gedung Baru</h5>

					<div class="card-body container">
							<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
								
								@foreach($data_gedung as $gedung)
							
						        <div class="col">
						          <div class="card shadow-sm" style="width: 18rem;">
						            <img style="width: 100%; height: 200px;"src="{{$gedung->getFotoProfile()}}" class="card-img-top">

						            <div class="card-body">
						              <h5 class="card-title">{{ $gedung->nama_gedung }}</h5>
								    <p class="card-text">Nama Fsm : {{$gedung->nama_fsm}}<br>Wilayah :{{$gedung->wilayah}}<br>Klasifikasi : {{$gedung->klasifikasi}}</p>
								    
						              <div class="d-flex justify-content-between align-items-center">
						                
						                <small class="text-muted">{{$gedung->updated_at}}</small>
						              </div>
						            </div>
						          </div>
						        </div>
						    
       		 			@endforeach
       		 				</div>
						</div>
					<div class="card-footer bg-body"><a class="text-blue"href="{{ url('/Dashboard/data-laporan-gedung') }}">Tampilkan Semua>></a>
					</div>
				</div>
			</div>
		@endif

		@if(auth()->user()->role == 'userkaryawan')
			<div>
				<div class="card my-3 p-3 bg-body rounded shadow-smmy-3 p-3 bg-body rounded shadow-sm">

					<h5 class="card-header text-dark bg-body p-3 border-bottom pb-2 mb-0">Data Gedung Baru</h5>
						<div class="card-body container">
							<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
								@foreach($data_gedung as $gedung)
							
						        <div class="col">
						          <div class="card shadow-sm" style="width: 18rem;">
						            <img style="width: 100%; height: 200px;"src="{{$gedung->getFotoProfile()}}" class="card-img-top">

						            <div class="card-body">
						              <h5 class="card-title">{{ $gedung->nama_gedung }}</h5>
								    <p class="card-text">Nama Fsm : {{$gedung->nama_fsm}}<br>Wilayah :{{$gedung->wilayah}}<br>Klasifikasi : {{$gedung->klasifikasi}}</p>
								    
						              <div class="d-flex justify-content-between align-items-center">
						                
						                <small class="text-muted">{{$gedung->updated_at}}</small>
						              </div>
						            </div>
						          </div>
						        </div>
						    
       		 			@endforeach
       		 				</div>
						</div>
					
					
					
					
					<div class="card-footer bg-body"><a class="text-blue " href="{{ url('/Dashboard/lihat-semua-gedung') }}">Tampilkan Semua>></a>
					</div>
				</div>
			</div>
		@endif
	</div>

@stop
			   	 	
				