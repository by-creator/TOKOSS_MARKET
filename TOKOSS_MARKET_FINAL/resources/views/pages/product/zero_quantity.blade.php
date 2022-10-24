@extends('pages.index.index')

@section('title', '- COMMANDE')

@section('content')
  
	
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
          <h3>Vous n'avez commandé aucun produit.</h3>
		    <p>Veuillez définir la quantité à commander avant de l'ajouter au panier.</p>
	          	
				  <div class="form-group">
                  <a href="{{route('shop')}}" class="btn btn-primary">RETOUR</a>
						</div>
	          	    
          		</div>
			 
          				
    			</div>
    		</div>
    	</div>


		@stop

