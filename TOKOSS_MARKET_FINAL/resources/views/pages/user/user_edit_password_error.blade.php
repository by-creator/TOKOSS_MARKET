@extends('pages.index.index_admin')

@section('title', '- USER')

@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url('../../template/images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="/">ACCUEIL</a></span> <span>//</span> <span>MODIFICATION DES UTILISATEURS</span></p>
            <h1 class="mb-0 bread">GESTION DE UTILISATEURS</h1>
          </div>
        </div>
      </div>
    </div>
	<h1>
    </h1>
	
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
          <h3>Les mots de passes saisi sont incompatibles</h3>
		    <p>Veuillez vérifier puis reprendre la saisie des données.</p>
	          	
				  <div class="form-group">
                  <a href="{{route('index.admin')}}" class="btn btn-primary">RETOUR</a>
						</div>
	          	    
          		</div>
			 
          				
    			</div>
    		</div>
    	</div>


		@stop

