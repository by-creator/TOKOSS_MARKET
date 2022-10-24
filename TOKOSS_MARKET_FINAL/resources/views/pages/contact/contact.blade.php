<!DOCTYPE html>
<html lang="en">
  <head>
  @extends('layouts/head')
    @section('title', 'CONTACT')
  </head>
  <body class="goto-here">
  @include('layouts/ban')
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    @include('layouts/nav')
	  </nav>
    <!-- END nav -->

    <div class="hero-wrap hero-bread" style="background-image: url('../../template/images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="/">ACCUEIL</a></span> <span>//</span> <span>CONTACT</span></p>
            <h1 class="mb-0 bread">CONTACT</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section contact-section bg-light">
    @include('layouts/contact')
    </section>

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