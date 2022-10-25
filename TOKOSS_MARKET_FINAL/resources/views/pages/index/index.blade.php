<!DOCTYPE html>
<html lang="en">
  <head>
  @extends('layouts/head')
    @section('title', 'INDEX')
  </head>
  <body class="goto-here">
  @include('layouts/ban')
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	@include('layouts/nav')
	  </nav>
    <!-- END nav -->
    

    <section id="home-section" class="hero">
		  @include('layouts/header')
    </section>

    @yield('content')

    <section class="ftco-section">
			@include('layouts/icons')
		</section>

		<section class="ftco-section ftco-category ftco-no-pt">
			@include('layouts/category')
		</section>


    <section class="ftco-section testimony-section">
    @include('layouts/testimony')
    </section>

    <hr>

		
	<section class="ftco-section bg-light">
			@include('layouts/icons')
		</section>

    <section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
		@include('layouts/newsletter')
		</section>


    <footer class="ftco-footer ftco-section">
      @include('layouts/footer')
    </footer>

    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  @include('layouts/js')
    
  </body>
</html>