<!DOCTYPE html>
<html>
	<head>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
		
	    <meta name="description" content="">
	    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
	    <meta name="generator" content="Hugo 0.83.1">
	    <title>DPKP - @yield('title')</title>


	    <!-- Bootstrap core CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">

	    
	
		<meta name="theme-color" content="#7952b3">


	    <style>
	      .bd-placeholder-img {
	        font-size: 1.125rem;
	        text-anchor: middle;
	        -webkit-user-select: none;
	        -moz-user-select: none;
	        user-select: none;
	      }

	      @media (min-width: 768px) {
	        .bd-placeholder-img-lg {
	          font-size: 3.5rem;
	        }

	      }
	     
		  @media (min-width:960px) { 
		  	body {font-size:1rem;} 
		  	


		  }
		  @media (min-width:1100px) { body {font-size:1.1rem;} }

	      body, html {
 			height: 100%;
  				margin: 0px;
  				bottom: 0px;
  				top: 0px;

		  }
		  a{
		  	text-decoration: none;
		  }
		  img.fotoprofile{
		  	border-radius: 50%; 
		  	object-fit: cover;
		  	border-color: black;
		  }
		  main{
		  	

		    min-height:100%;
		    
		    overflow-x: hidden;

		  }

			
	    </style>
  </head>
  <body class="bg-light">
    	<header class="bd-header py-3 d-flex align-items-stretch border-bottom border-dark" style="background-color: rgb(0, 38, 153)">
  			<div class="container-fluid d-flex align-items-center">
	    		<div class="d-flex align-items-center fs-4 text-white mb-0" href="#">
			    	<h1 class="text-light me-3">DPKP</h1>
			      	<h2 class="text-danger me-3" style="line-height: 0.1rem">G-Data</h3>
			    </div>
    			
    			<div class="ms-auto">
					<a href="#" class="d-block link-light text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
						<span class="text-light"><img src="{{auth()->user()->getFotoProfile()}}" class="fotoprofile" style="width: 40px; height: 40px;">{{auth()->user()->name}}</span>
					</a>
					<ul class="option dropdown-menu text-small shadow" aria-labelledby="dropdownUser2" style="">
						<li><a class="dropdown-item" href="/logout">Logout</a></li>
					</ul>
				</div>
  			</div>

		</header>


		<main>
			<div class="container">
				<div class="d-flex align-items-center p-3 my-3 text-light bg-dark rounded shadow-sm">
					<h3>Keamanan Akun</h3>

				</div>
				<div class="my-3 p-3 bg-body rounded shadow-sm">
					@if(session('sukses'))
						<div class=" alert alert-success" role="alert">
						{{session('sukses')}}
						</div>
					@endif
					<div class="mx-4 card-body w-80 bg-light mb-light border border-secondary mb-2 rounded">
						<nav class="navbar navbar-expand-lg navbar-light bg-light rounded" aria-label="Twelfth navbar example">
							<div class="container-fluid">
							    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample10" aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
							    <span class="navbar-toggler-icon"></span>
					   			</button>

					    	<div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample10">
						        
						    <form class="navbar-nav form-inline" method="GET" action="/Dashboard/data-karyawan/search" role="search">
							  		
							  	<input type="search" class="nav-item form-control" name="cari" placeholder="Search..." aria-label="Search">
								<select class="nav-item form-select" id="wilayah" name="type" aria-label="Default select example">
									<option value="" selected>--Search By--</option>
									<option value="NIK">NIP</option>
									<option value="nama_lengkap">Nama Lengkap</option>
									<option value="wilayah">Wilayah</option>
								</select>
								<button class="nav-item btn btn-outline-dark">Search</button>
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
									<td>{{ $index +1 }}</td>	
									<td>{{ $karyawan->NIP }}</td>
									<td>{{ $karyawan->nama_lengkap }}</td>
									<td>{{ $karyawan->jabatan }}</td>
									<td>{{ $karyawan->tempat_tugas}} </td>
									<td>{{ $karyawan->wilayah }}</td>
									<td><a href="/Dashboard-keamanan/{{$karyawan->id}}/resetpassword" class="btn btn-warning btn-sm">Reset Password</a></td>
								</tr>
							</tbody>
							@endforeach
						</table>
					</div>

				</div>
			
			</div>
	
			
				
		</main>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/cd1e50ba3b.js" crossorigin="anonymous"></script>

</body>
</html>