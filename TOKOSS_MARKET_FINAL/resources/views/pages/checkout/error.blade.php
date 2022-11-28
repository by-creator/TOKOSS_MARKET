@extends('pages.index.index')

@section('title', '- COMMANDES')

@section('content')
 
   
	
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
         
          <h3>Votre commande est un échec car vous n'avez aucun produit dans votre panier !</h3>
		    <p>Pour retourner au menu principal </p>
           
				  <div class="form-group">
                  <a href="{{route('shop')}}" class="btn btn-primary">CLIQUEZ ICI</a>
						</div>
	          	    
          		</div>

             
			 
          				
    			</div>
    		</div>
        
    	</div>


		@stop

