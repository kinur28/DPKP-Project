@extends('layouts.de-master')
@section('title', 'Ganti Password')
@section('content')
	<div class="container">
		<div class="d-flex align-items-center p-3 my-3 text-dark bg-info rounded shadow-sm">
		  	
			 <div class="me-a5 p-2">
			  	<a class="text-decoration-none" href="{{ url('/Dashboard') }}">
			  		<h5 class="text-dark"><i class="fas fa-chevron-left"></i>Kembali</h5>
			  	</a>
			  </div>
			  
			  
			  	<h1 class="h3 mb-0 text-dark ms-5 me-5">Ganti Password</h1>
			  
			
		</div>
		 <div class="my-3 p-3 bg-body rounded shadow-sm">
		  	<div class="col-md-7 mx-auto col-lg-8 ">
		  		@if(session('error'))
					<div class=" alert alert-danger" role="alert">
					{{session('error')}}
					</div>
				@endif
				@if(session('sukses'))
					<div class=" alert alert-success" role="alert">
					{{session('sukses')}}
					</div>
				@endif

		  		<form class="row g-3" action="{{route('updatepassword')}}" method="POST" onsubmit="return validate()">
		  			{{csrf_field()}}
		  			<div class="col-12">
			    		<label class="form-label">Password Lama</label>
					    
					    <input type="Password" class="form-control" id="passwordlama" name="password_lama" placeholder="Masukkan password lama" required>
					    
			  		</div>
			  		<div class="col-12">
			    		<label class="form-label">Password Baru</label>
					    
					    <input type="Password" class="form-control" id="passwordbaru" name="password_baru" placeholder="Masukkan password baru" required>
					    
			  		</div>
			  		<div class="col-12">
			    		<label class="form-label">Konfirmasi Password Baru</label>
					    
					    <input type="Password" class="form-control" id="konfirmasipasswordbaru" name="konfirmasi_password_baru" placeholder="Konfirmasi password baru" onkeyup="check(this)" required>
					    <error class="text-danger" id="alert"></error>
					    
			  		</div>
			  		<div class="col-md-2">
					    <button type="submit" class="btn btn-primary">Submit</button>
					</div>
			  	</form>	
		  	</div>
		 </div>
	</div>
@stop
