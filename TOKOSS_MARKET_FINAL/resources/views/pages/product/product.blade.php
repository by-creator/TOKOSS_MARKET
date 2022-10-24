<!DOCTYPE html>
<html lang="en">
  <head>
  @extends('layouts/head')
    @section('title', 'PRODUCT')
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
	@foreach($productData as $product)
	<form action="{{ route('cart.store',['id'=>$product->id]) }}" method="POST" enctype="multipart/form-data">
	

		@csrf
    <section class="ftco-section" id="product">
    	<div class="container">
    		<div class="row">
			
			
    			<div class="col-lg-6 mb-5 ftco-animate">
    				<a href="images/product-1.jpg" class="image-popup"><img src="{{ url('products/images/'.$product->image) }}" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
				<input id="defaulterrormessage" type="hidden" th:value="{{$user = App\Models\User::Find($product->user_id);}} ">
				

				
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
    				<h3>NOM : {{$product->name}}</h3>
					<p>DESCRIPTION : {{$product->description}}</p>
    				<div class="rating d-flex">
							
							<p class="text-left mr-4">
								 <span style="color: #000;">BOUTIQUE : {{$user->trade_name}} </span>
							</p>
							
						</div>

						
    				<p class="price"><span>PRIX : {{$product->price}} FCFA</span></p>
    				

					<div class="rating d-flex">
							
							<p class="text-left mr-4">
								 <span style="color: #000;">QUANTITE : {{$product->quantity}} produits restants</span>
							</p>
							
						</div>
						<div class="row mt-4">
							<div class="col-md-6">
								<div class="form-group d-flex">
		              <div class="select-wrap">
	                </div>
		            </div>
							</div>
							<div class="w-100"></div>
							<div class="input-group col-md-6 d-flex mb-3">
	             	<span class="input-group-btn mr-2">
	                	<button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
	                   <i class="ion-ios-remove"></i>
	                	</button>
	            		</span>
	             	<input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
	             	<span class="input-group-btn ml-2">
	                	<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
	                     <i class="ion-ios-add"></i>
	                 </button>
	             	</span>
	          	</div>
	          	<div class="w-100"></div>
	          	
          	</div>

			  <div class="form-group">
							<input type="submit" value="VALIDER" class="btn btn-primary py-3 px-5">
						</div>
	    	
    			</div>
				@endforeach
    		</div>
    	</div>
    </section>
</form>


    <section class="ftco-section">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<span class="subheading">Products</span>
            <h2 class="mb-4">Related Products</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>   		
    	</div>
    	<div class="container">
    		<div class="row">
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="../../template/images/product-1.jpg" alt="Colorlib Template">
    						<span class="status">30%</span>
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="#">Bell Pepper</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span class="mr-2 price-dc">$120.00</span><span class="price-sale">$80.00</span></p>
		    					</div>
	    					</div>
	    					<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
	    								<span><i class="ion-ios-menu"></i></span>
	    							</a>
	    							<a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
	    								<span><i class="ion-ios-cart"></i></span>
	    							</a>
	    							<a href="#" class="heart d-flex justify-content-center align-items-center ">
	    								<span><i class="ion-ios-heart"></i></span>
	    							</a>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="../../template/images/product-2.jpg" alt="Colorlib Template">
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="#">Strawberry</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span>$120.00</span></p>
		    					</div>
	    					</div>
    						<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
	    								<span><i class="ion-ios-menu"></i></span>
	    							</a>
	    							<a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
	    								<span><i class="ion-ios-cart"></i></span>
	    							</a>
	    							<a href="#" class="heart d-flex justify-content-center align-items-center ">
	    								<span><i class="ion-ios-heart"></i></span>
	    							</a>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="../../template/images/product-3.jpg" alt="Colorlib Template">
	    					<div class="overlay"></div>
	    				</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="#">Green Beans</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span>$120.00</span></p>
		    					</div>
	    					</div>
    						<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
	    								<span><i class="ion-ios-menu"></i></span>
	    							</a>
	    							<a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
	    								<span><i class="ion-ios-cart"></i></span>
	    							</a>
	    							<a href="#" class="heart d-flex justify-content-center align-items-center ">
	    								<span><i class="ion-ios-heart"></i></span>
	    							</a>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="../../template/images/product-4.jpg" alt="Colorlib Template">
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="#">Purple Cabbage</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span>$120.00</span></p>
		    					</div>
	    					</div>
    						<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
	    								<span><i class="ion-ios-menu"></i></span>
	    							</a>
	    							<a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
	    								<span><i class="ion-ios-cart"></i></span>
	    							</a>
	    							<a href="#" class="heart d-flex justify-content-center align-items-center ">
	    								<span><i class="ion-ios-heart"></i></span>
	    							</a>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
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

  <script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});
	</script>
    
  </body>
</html>