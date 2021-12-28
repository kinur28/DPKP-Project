@extends('layouts.master')
@section('title', 'Semua Gedung')
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
						Data Karyawan
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
					<a href="{{ url('/Dashboard/lihat-semua-gedung') }}" class="nav-link text-blue ">
						Lihat Semua Gedung
					</a>
				</li>  
				@endif
			</ul>
		</nav>
	</div>
	<div class="container">
		<div class="d-flex align-items-center p-3 my-3 text-dark bg-info rounded shadow-sm">

			<h3>Data Laporan Gedung</h3>

		</div>
		<div class="card">
			

			<div class="mx-4 card-body w-80 bg-light mb-light border border-secondary mb-2 mt-2 rounded">
				<nav class="navbar navbar-expand-lg navbar-primary rounded" aria-label="Twelfth navbar example">
					<div class="container-fluid">
					    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample10" aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
					        <span class="navbar-toggler-icon"></span>
					    </button>

					    <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample10">
						        
						    <form class="navbar-nav form-inline" method="GET" action="/Dashboard/data-laporan-gedung/search" role="search">
							  		
							  	<input type="search" class="nav-item form-control" name="cari" placeholder="Search..." aria-label="Search">
								<select class="nav-item form-select" id="wilayah" name="type" aria-label="Default select example">
									<option value="" selected>--Search By--</option>
										<option value="NIK">NIK</option>
										<option value="wilayah">Wilayah</option>
										<option value="nama_gedung">Nama Gedung</option>
										<option value="nama_fsm">Nama FSM</option>
								</select>
								<button class="nav-item btn btn-outline-dark">Search</button>
						    </form>
					    </div>
					</div>
				</nav>
			</div>
					
				
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
							<td><a class="text-dark" href="/Dashboard/data-laporan-gedung/{{$gedung->id}}/detailsemua">{{ $gedung->wilayah }}</a></td>
							<td><a class="text-dark" href="/Dashboard/data-laporan-gedung/{{$gedung->id}}/detailsemua">{{ $gedung->nama_gedung }}</a></td>
							<td><a class="text-dark" href="/Dashboard/data-laporan-gedung/{{$gedung->id}}/detailsemua">{{ $gedung->alamat }}</a></td>
							<td><a class="text-dark" href="/Dashboard/data-laporan-gedung/{{$gedung->id}}/detailsemua">{{ $gedung->nama_fsm }}</a></td>
							<td><a class="text-dark" href="/Dashboard/data-laporan-gedung/{{$gedung->id}}/detailsemua">{{ $gedung->tahun_pelatihan}}</a></td>
							
						</tr>
					</tbody>
					@endforeach
						
				</table>
			</div>
		</div>
	</div>	
	
@stop