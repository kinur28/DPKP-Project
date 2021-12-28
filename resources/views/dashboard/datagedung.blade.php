@extends('layouts.master')
@section('title', 'Gedung')
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
					<a href="{{ url('/Dashboard/data-karyawan') }}" class="nav-link text-white">
						Data Pegawai
					</a>
				</li>
				<li class="p-1">
					<a href="{{ url('/Dashboard/data-laporan-gedung') }}" class="nav-link text-blue">
						Data Laporan Gedung
					</a>
				</li>
				@endif
				@if(auth()->user()->role == 'userkaryawan')
				<li class="p-1">
					<form href="{{ url('/Dashboard/data-gedung') }} "  method="GET" action="/Dashboard/data-gedung">
						<input type="hidden" class="form-control" name="user_id" value="{{auth()->user()->id}}" aria-label="Search">
						<button type="submit" style="padding: 0; border: none; background: none;" class=" mt-2 nav-link text-blue">
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
				@if(auth()->user()->role == 'admin')
				<h3>Data Laporan Gedung</h3>
				@endif
				@if(auth()->user()->role == 'userkaryawan')
				<h3>Pendataan Gedung</h3>
				@endif
			</div>
			<div class="card">
				<div class="mx-4 card-body w-80 justify-content-center" >
					@if(auth()->user()->role == 'admin')
						<div class="d-flex justify-content-md-end">
						    <a href="{{ route('gedungexport') }}" class="btn btn-success btn-lg">Export</a>
						</div>
					@endif
					@if(auth()->user()->role == 'userkaryawan')
						
						<div class="d-flex justify-content-md-end">
						    <a href="/Dashboard/data-gedung/tambah" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Laporkan Gedung</a>
						</div>
					@endif
				</div>
			
			
				<br>
				@if(session('sukses'))
					<div class="w-80 my-auto mx-5 alert alert-success" role="alert">
					  {{session('sukses')}}
					</div>
				@endif
					
				
					@if(auth()->user()->role == 'admin')
					<div class="mx-4 card-body w-80 bg-light mb-light border border-secondary mb-2 rounded">
						<nav class="navbar navbar-expand-lg navbar-primary rounded" aria-label="Twelfth navbar example">
					    <div class="container-fluid">
					        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample10" aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
					          <span class="navbar-toggler-icon"></span>
					        </button>

					       <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample10">
						        
						        <form class="navbar-nav form-inline" method="GET" action="/Dashboard/data-laporan-gedung/search" role="search">
							  		
							  		<input type="search" class="nav-item form-control" name="cari" placeholder="Search..." aria-label="Search">
								    <select class="nav-item form-select" id="wilayah" name="type" aria-label="Default select example" required>
										<option value="" selected>--Search By--</option>
										<option value="NIK">NIK</option>
										<option value="wilayah">Wilayah</option>
										<option value="nama_gedung">Nama Gedung</option>
										<option value="nama_fsm">Nama FSM</option>
										
									</select>
									<button class="nav-item btn btn-outline-dark">Search</button>
									<a class="nav-item btn btn-primary" href="{{ url('/Dashboard/data-laporan-gedung') }}">All</a>
									
						        </form>
					        </div>
					    </div>
					    </nav>
					</div>
					@endif	
				
				<div class="mx-4" style="position:relative;">	
					<table class="table table-responsive table-hover table-sm" style="width: 100%">
						<thead class="table-light">
							<tr>
							
								<th>NO</th>
								<th>WILAYAH</th>
								<th>NAMA GEDUNG</th>
								<th>ALAMAT</th>
								<th>NAMA FSM</th>
								<th>TAHUN PELATIHAN</th>

								
							</tr>
						</thead>
						
						@foreach($data_gedung as $index => $gedung)
						<tbody>
							<tr>
								
								<td><a class="text-dark" href="/Dashboard/data-laporan-gedung/{{$gedung->id}}/detail">{{ $index +1 }}</a></td>
								<td><a class="text-dark" href="/Dashboard/data-laporan-gedung/{{$gedung->id}}/detail">{{ $gedung->wilayah }}</a></td>
								<td><a class="text-dark" href="/Dashboard/data-laporan-gedung/{{$gedung->id}}/detail">{{ $gedung->nama_gedung }}</a></td>
								<td><a class="text-dark" href="/Dashboard/data-laporan-gedung/{{$gedung->id}}/detail">{{ $gedung->alamat }}</a></td>
								<td><a class="text-dark" href="/Dashboard/data-laporan-gedung/{{$gedung->id}}/detail">{{ $gedung->nama_fsm }}</a></td>
								<td><a class="text-dark" href="/Dashboard/data-laporan-gedung/{{$gedung->id}}/detail">{{ $gedung->tahun_pelatihan}}</a></td>
								
							</tr>
						</tbody>
						@endforeach
						
					</table>
			   	</div>
			</div>
	</div>	
	


@stop
