@extends('pages.index.index')

@section('title', '- CONNEXION')

@section('content')


    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
          <h3>Votre mot de passe a été réinitialisé avec succès.</h3>
		    <p>Veuillez vous connecter avec vos nouvelles informations de connection.</p>
	          	
				  <div class="form-group">
                  <a href="{{route('connexion')}}" class="btn btn-primary">RETOUR</a>
						</div>
	          	    
          		</div>
			 
          				
    			</div>
    		</div>
    	</div>


		@stop

