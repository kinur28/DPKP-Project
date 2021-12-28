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
						<li>@if(auth()->user()->role == 'admin')<a class="dropdown-item" href="{{url('/Dashboard/data-karyawan/tambah')}}">Tambah Pegawai</a></li>@endif
			            @if(auth()->user()->role == 'admin' || auth()->user()->role == 'userkaryawan')
			            <li>
						    <form class="dropdown-item " href="{{route('profile')}}"  method="GET" action="/Dashboard/profile">
						      	<input type="hidden" class="form-control" name="user_id" value="{{auth()->user()->id}}" aria-label="Search">
						      	<button type="submit" style="padding: 0;  display: block; width: 150px; border: none; text-align: left; background: none;" class="nav-link text-dark">
	 								Profile
							    </button>
						    </form>
						</li>        
						
			            <li><a class="dropdown-item" href="/Dashboard/changepassword">Ganti Password</a></li>
			            @endif
						<li><a class="dropdown-item" href="/logout">Logout</a></li>
					</ul>
				</div>
  			</div>

		</header>


		<main>
			

				@yield('content')
		
				
		</main>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/cd1e50ba3b.js" crossorigin="anonymous"></script>

</body>
</html>