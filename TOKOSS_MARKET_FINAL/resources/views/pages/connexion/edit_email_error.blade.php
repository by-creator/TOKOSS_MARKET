@extends('pages.index.index')

@section('title', '- INSCRIPTION')

@section('content')
  
	
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
          <h3>L'adresse saisie ne correspon à aucun utilisateur.</h3>
		    <p>Veuillez vérifier puis reprendre la saisie des données.</p>
	          	
				  <div class="form-group">
                  <a href="{{route('connexion.edit')}}" class="btn btn-primary">RETOUR</a>
						</div>
	          	    
          		</div>
			 
          				
    			</div>
    		</div>
    	</div>


		@stop

