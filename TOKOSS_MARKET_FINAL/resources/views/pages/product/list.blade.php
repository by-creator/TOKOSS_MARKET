<!DOCTYPE html>
<html lang="en">
  <head>
  @extends('layouts/head')
    @section('title', 'PRODUCT-LIST')
  </head>
  <body class="goto-here">
  @include('layouts/ban')
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	@include('layouts/nav_admin')
	  </nav>
    <!-- END nav -->

    <section id="home-section" class="hero">
		  @include('layouts/header')
    </section>

    <section class="ftco-section">
			@include('layouts/icons')
		</section>
		

    <section class="ftco-section" id="our_product">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<span class="subheading">Produits populaires</span>
            <h2 class="mb-4">Nos produits</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>   		
    	</div>
		
    	<div class="container">
		
    		<div class="row" >
			@foreach($productData as $data)
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
					<img class="img-fluid" src="{{ url('products/images/'.$data->image) }}" style="height: 100px; width: 150;" alt="Colorlib Template">
    					
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="{{route('product.filter',['id'=>$data->id])}}">{{$data->name}}</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span class="price-sale">{{$data->price}} FCFA</span></p>
		    					</div>
	    					</div>
    					</div>
    				</div>
    			</div>
				@endforeach
    		</div>
			
    	</div>
		
    </section>
		
		<section class="ftco-section img" style="background-image: url(../../template/images/bg_3.jpg);">
    	<div class="container">
				<div class="row justify-content-end">
          <div class="col-md-6 heading-section ftco-animate deal-of-the-day ftco-animate">
          	<span class="subheading">Best Price For You</span>
            <h2 class="mb-4">Deal of the day</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
            <h3><a href="#">Spinach</a></h3>
            <span class="price">$10 <a href="#">now $5 only</a></span>
            <div id="timer" class="d-flex mt-5">
						  <div class="time" id="days"></div>
						  <div class="time pl-3" id="hours"></div>
						  <div class="time pl-3" id="minutes"></div>
						  <div class="time pl-3" id="seconds"></div>
						</div>
          </div>
        </div>   		
    	</div>
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