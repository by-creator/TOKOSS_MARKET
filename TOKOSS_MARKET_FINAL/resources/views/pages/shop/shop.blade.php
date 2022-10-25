<!DOCTYPE html>
<html lang="en">
  <head>
    @extends('layouts/head')
    @section('title', 'SHOP')
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
          	<p class="breadcrumbs"><span class="mr-2"><a href="/">ACCUEIL</a></span> <span>//</span> <span>PRODUITS</span></p>
            <h1 class="mb-0 bread">PRODUITS</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-10 mb-5 text-center">
    				<ul class="product-category">
    					<li><a href="{{route('shop')}}" >TOUT LES PRODUITS</a></li>
						<br>
						<br>
						@foreach($categoryData as $category)
    					<li><a href="{{route('shop.filter',['id'=>$category->id])}}">{{$category->name}}</a></li>
						@endforeach
    				</ul>
    			</div>
    		</div>

			<form action="" method="post">

			<div class="container">
		
    		<div class="row" >
			@foreach($productData as $product)
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
					<a href="{{route('product.filter',['id'=>$product->id])}}" class="img-prod"><img class="img-fluid" src="{{ url('products/images/'.$product->image) }}" style="height: 100px; width: 150;" alt="Colorlib Template"></a>
    					<div class="overlay"></div>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="{{route('product.filter',['id'=>$product->id])}}">{{$product->name}}</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span class="price-sale">{{$product->price}} FCFA</span></p>
		    					</div>
	    					</div>
	    					<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a href="{{route('product.filter',['id'=>$product->id])}}" class="add-to-cart d-flex justify-content-center align-items-center text-center">
	    								<span><i class="ion-ios-cart"></i></span>
	    							</a>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
				@endforeach

				
    		</div>
    	</div>

		</form>
			
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