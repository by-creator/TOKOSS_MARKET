<!DOCTYPE html>
<html lang="en">
  <head>
  @extends('layouts/head')
    @section('title', 'CHECKOUT')
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
          	<p class="breadcrumbs"><span class="mr-2"><a href="/">ACCUEIL</a></span> <span>//</span> <span>PAIEMENT</span></p>
            <h1 class="mb-0 bread">PAIEMENT</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
		  <h3 class="mb-4 billing-heading" align="center">Détails de la commande</h3>
		
		  <br>

		  <form action="{{ route('checkout.search_store') }}" method="POST" enctype="multipart/form-data" class="billing-form">
			@csrf
							<h3 class="mb-4 billing-heading">Vous avez déjà passé une commande ici ?</h3>

	          	<div class="row align-items-end">

			
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="email">Email </label>
	                  <input name="email" type="email" class="form-control" placeholder="Entrer votre email" required="Ce champ est obligatoire">
	                </div>
                </div>
                <div class="w-100"></div>
				<div class="form-group">
							<input type="submit" value="RECHERCHER" class="btn btn-primary py-3 px-5">
						</div>
	            </div>
	          </form><!-- END -->


		  <form action="{{ route('command.store') }}" method="POST" enctype="multipart/form-data" class="billing-form">
			@csrf
							
	          	<div class="row align-items-end">

				


				  <div class="col-md-6">
	                <div class="form-group">
	                	<label for="firstname">Prénom(s)</label>
	                  <input name="firstname" type="text" class="form-control" placeholder="Entrer votre prénom" required="Ce champ est obligatoire">
	                </div>
	              </div>

	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="lastname">Nom</label>
	                  <input name="lastname" type="text" class="form-control" placeholder="Entrer votre nom" required="Ce champ est obligatoire">
	                </div>
                </div>
              
		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="adress">Adresse</label>
	                  <input name="adress" type="text" class="form-control" placeholder="Entrer votre adresse" required="Ce champ est obligatoire">
	                </div>
		            </div>
		            <div class="col-md-6">
		            	<div class="form-group">
		            		<label for="city">Ville</label>
	                  <input name="city" type="text" class="form-control" placeholder="Entrer votre ville" required="Ce champ est obligatoire">
	                </div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
	                <div class="form-group">
	                	<label for="phone">Téléphone</label>
	                  <input name="tel" type="number" class="form-control" placeholder="Entrer votre téléphone" required="Ce champ est obligatoire">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="email">Email </label>
	                  <input name="email" type="email" class="form-control" placeholder="Entrer votre email" required="Ce champ est obligatoire">
	                </div>
                </div>
                <div class="w-100"></div>
				<div class="form-group">
							<input type="submit" value="VALIDER" class="btn btn-primary py-3 px-5">
						</div>
	            </div>
	          </form><!-- END -->
					</div>
					<div class="col-xl-5">
	          <div class="row mt-5 pt-3">
	          	<div class="col-md-12 d-flex mb-5">
	          		<div class="cart-detail cart-total p-3 p-md-4">
					  
	          			<h3 class="billing-heading mb-4">Détails du panier</h3>
						  @foreach($cartData as $cart)
						  <input name="productData" id="defaulterrormessage" type="hidden" th:value="{{$productData = App\Models\Product::find($cart->product_id);}} ">
						  <tr class="text-center">
	          			<p class="d-flex">
		    						<span>Produit </span>
		    						<td><span>{{$productData->name}}</span></td>
		    					</p>
		    					<p class="d-flex">
		    						<span>Quantité</span>
		    						<span>{{$cart->quantity}}</span>
									
		    					</p>
								<p class="d-flex">
		    						<span>Prix Unitaire</span>
		    						<span>{{$price = $productData->price}} FCFA</span>
		    					</p>
		    						
								<p class="d-flex total-price">
		    						<span>Total</span>
									
		    						<span>{{$t = $cart->quantity * $productData->price}} FCFA</span>
		    					</p>		
		    					<hr>
							</tr>
							
								@endforeach
								<p class="d-flex total-price">
		    						<span>Frais de livraison</span>
									
		    						<span>500 FCFA</span>
		    					</p>
								<p class="d-flex total-price">
		    						<span>Total à payer</span>
									
		    						<span>{{$total = App\Models\Cart::sum('price') + 500 ;}} FCFA</span>
		    					</p>
								</div>
	          	</div>
	          	
	          </div>
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->

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