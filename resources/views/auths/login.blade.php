<!DOCTYPE html>
<html>
	<head>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="">
	    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
	    <meta name="generator" content="Hugo 0.83.1">
	    <title>DPKP</title>


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

	      body, html {
 			height: 100%;
  			margin: 0;
		  }
		
	    </style>
  </head>
    <body>
    
	<header>
	  <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color:rgb(0, 38, 153);">
	    <div class="container-fluid">
	    	<div class="navbar-brand fs-6" href="#">
	    		<h1 class="fs-4 text-light">DPKP</h1>
	      		<h2 class="fs-6 text-danger" style="line-height: 0.1rem">G-Data</h3>
	    	</div>
	      
	      
	    </div>
	  </nav>
	</header>

	<main class="text-center bg-light" style="  height: 100%;">
        <div class="container pt-md-5"> 
	        <div class="bg-img justify-content-center img-thumbnail px-3 py-3 pt-md-5 pb-md-4 mx-auto  h-50" style="border-radius:12px; width:420px ;">
			          <img src=" {{ asset('images/Logodamkar.jpg') }}" style="width: 372px; height: 293px; ">
			          <div class="navbar-brand fs-6 text-wrap" href="#">

					    		<h1 class="fs-4 text-dark justify-content-center">Dinas Penanggulangan Kebakaran dan Penyelamatan</h1>
					     		<h2 class="fs-5 text-danger justify-content-center" style="line-height: 0.7rem">Gedung Data</h3>
					    	</div>
			          <form class="justify-content-center" action="/postlogin" method="POST">
			          	{{ csrf_field() }}
				    			<h1 class="h3 mb-3 fw-normal">Please Login</h1>

				    			<div class="form-floating">
				      			<input name="email" type="email" class="form-control" id="signin-email" placeholder="name@example.com" required>
				      			<label for="signin-email">Email address</label>
			    				</div>
			    				<div class="form-floating">
			      				<input name="password"type="password" class="form-control" id="signin-password" placeholder="Password" required>
			      				<label for="signin-password">Password</label>
			    				</div>

				    			@if(session('error'))
										<div class=" alert alert-danger" role="alert">
										  {{session('error')}}
										</div>
									@endif
			    				<button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
			   				</form>
	        </div>
      	</div>
   
	</main>


	    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

      
  

</body>
</html>