@extends('pages.index.index')

@section('title', '- CONNEXION')

@section('content')
   
	
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
          <h3>L'utilisateur saisi n'existe pas ou ne se trouve pas dans la base de données</h3>
		    <p>Veuillez vérifier puis reprendre la saisie des données.</p>
	          	
				  <div class="form-group">
                  <a href="{{route('connexion')}}" class="btn btn-primary">RETOUR</a>
						</div>
	          	    
          		</div>
			 
          				
    			</div>
    		</div>
    	</div>


		@stop

