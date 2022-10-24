@extends('pages.index.index')

@section('title', '- CONNEXION')

@section('content')


    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
          <h3>Un mail de réinitialisation de votre mot de passe vous a été envoyé.</h3>
		    <p>Veuillez vérifier votre boite mail puis reprendre la saisie des données.</p>
	          	
				  <div class="form-group">
                  <a href="{{route('connexion')}}" class="btn btn-primary">RETOUR</a>
						</div>
	          	    
          		</div>
			 
          				
    			</div>
    		</div>
    	</div>


		@stop

