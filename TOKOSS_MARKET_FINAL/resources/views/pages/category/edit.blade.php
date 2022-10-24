@extends('pages.index.index_admin')

@section('title', '- CATEGORIE')

@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url('../../template/images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="/">ACCUEIL</a></span> <span>//</span> <span>MODIFICATION DE CATÉGORIE</span></p>
            <h1 class="mb-0 bread">GESTION DE CATEGORIE</h1>
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
						<form action="{{ route('category.update') }}" method="POST" enctype="multipart/form-data" class="billing-form">
						@csrf
							<h3 class="mb-4 billing-heading">FORMULAIRE DE MODIFICATION DE CATEGORIE</h3>
	          	<div class="row align-items-end">
	          		<div class="col-md-6">
	                <div class="form-group">
	                	<label for="category">Catégorie</label>
						<input type="hidden" name="id" class="form-control" value="{{$category->id}}">
	                  <input name="name" type="text" class="form-control" required="Ce champ est obligatoire" value="{{$category->name}}">
	                </div>
	              </div>

				  <div class="form-group">
							<input type="submit" value="VALIDER" class="btn btn-primary py-3 px-5">
						</div>
	          	    
          		</div>
			 
				  </form>	
    			</div>
    		</div>
    	</div>
    
</section>


		@stop

