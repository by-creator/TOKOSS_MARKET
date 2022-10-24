@extends('pages.index.index')

@section('title', '- CONNEXION')

@section('content')


    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
          <h3>Les informations saisies sont incorrectes et ne correspondent à aucun utilisateur.</h3>
		    <p>Veuillez vérifier puis reprendre la saisie des données.</p>
	          	
				  <div class="form-group">
                  <a href="{{route('connexion')}}" class="btn btn-primary">RETOUR</a>
						</div>
	          	    
          		</div>
			 
          				
    			</div>
    		</div>
    	</div>


		@stop

