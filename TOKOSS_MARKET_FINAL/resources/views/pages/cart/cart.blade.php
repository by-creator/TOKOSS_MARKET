<!DOCTYPE html>
<html lang="en">
  <head>
  @extends('layouts/head')
    @section('title', 'CART')
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
          	<p class="breadcrumbs"><span class="mr-2"><a href="/">ACCUEIL</a></span> <span>//</span> <span>PANIER</span></p>
            <h1 class="mb-0 bread">PANIER</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
				<form action="{{ route('checkout.store') }}" method="POST" enctype="multipart/form-data" class="billing-form">
					@csrf
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>Image</th>
						        <th>Boutique</th>
						        <th>Produit</th>
						        <th>Prix</th>
						        <th>Quantité</th>
						        <th>Total</th>
						      </tr>
						    </thead>
						    <tbody>
								@foreach($cartData as $cart)
								<input name="productData" id="defaulterrormessage" type="hidden" th:value="{{$productData = App\Models\Product::find($cart->product_id);}} ">
								<input id="defaulterrormessage" type="hidden" th:value="{{$userData = App\Models\User::find($productData->user_id);}} ">
								
								
						      <tr class="text-center">
							  <td class="product-remove"><a href="{{route('cart.delete',['id'=>$cart->id])}}" onClick = "return confirm('Voulez-vous supprimer ce produit ?')"><span class="ion-ios-close"></span></a></td>
						        
						        <td class="image-prod">
								
									<a href="#" class="img-prod"><img class="img-fluid" src="{{ url('products/images/'.$productData->image) }}" style="height: 100px; width: 150;" alt="Colorlib Template"></a>

								</td>
								<td class="user-trade_name">{{$userData->trade_name}}</td>
						        
						        <td class="product-name">
						        	<h3>{{$productData->name}}</h3>
						        	<p>{{$productData->description}}</p>
						        </td>
						        
						        <td class="price">{{$productData->price}} FCFA</td>
						        
						        <td class="quantity">{{$cart->quantity}}</td>
						        	
					          
						        
						        <td class="total">{{$cart->price}} FCFA</td>
						      </tr><!-- END TR-->
							 @endforeach
						     
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>

			
	          

				  <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    			
				  		<div class="form-group">
							<input type="submit" value="COMMANDER" class="btn btn-primary py-3 px-5">
						</div>
    				</div>
	             
	            </form>
    		
    			
    			
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