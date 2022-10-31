@extends('pages.index.index_admin')

@section('title', '- PRODUITS')

@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url('../../template/images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="/">ACCUEIL</a></span> <span>//</span> <span>RECHERCHE DE PRODUITS</span></p>
            <h1 class="mb-0 bread">GESTION DE PRODUITS</h1>
          </div>
        </div>
      </div>
    </div>
	<h1>
    </h1>

<section class="ftco-section ftco-category">
			<div class="container">
				<div class="row">
                <h3 class="mb-4 billing-heading">RÉSUTAT DE LA RECHERCHE</h3>
    			<div class="col-md-12 ftco-animate">
    				<div class="category-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>N°</th>
						        <th>NOM</th>
								<th>MODIFIER</th>
						        <th>SUPPRIMER</th>
						      </tr>
						    </thead>
						    <tbody>
								@foreach($productData as $product)								
								
						      <tr class="text-center">
							  <td class="product-id">PROD_{{$product->id}}</td>
							  <td class="product-name">{{$product->name}}</td>
						        	
						        	
                              <td ><a class="btn btn-primary py-3 px-5" href="{{route('product.edit',['id'=>$product->id])}}" onClick = "return confirm('Voulez-vous supprimer cette catégorie?')">+</a></td>
							  <td ><a class="btn btn-primary py-3 px-5" href="{{route('product.delete',['id'=>$product->id])}}" onClick = "return confirm('Voulez-vous supprimer cette catégorie?')">x</a></td>
						         
						    	

						      </tr><!-- END TR-->
							 @endforeach
						     
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
    
		</section>

		@stop

