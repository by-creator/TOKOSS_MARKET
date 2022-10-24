<!DOCTYPE html>
<html lang="en">
  <head>
  @extends('layouts/head')
  </head>
  <body class="goto-here">
  @include('layouts/ban')
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	@include('layouts/nav_vendor')
	  </nav>
    <!-- END nav -->
  
    @yield('content')
    <input id="defaulterrormessage" type="hidden" th:value="{{$user = App\Models\User::find(Session::get('id'));}} ">
      

		<section class="ftco-section ftco-category ftco-no-pt">
			@include('layouts/category')
		</section>

		<section id="command">
    @include('pages/command.create')
    </section>

   

    <section id="product">
    

    <div class="hero-wrap hero-bread" style="background-image: url('../../template/images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="/">ACCUEIL</a></span> <span>//</span> <span>AJOUT DE PRODUITS</span></p>
            <h1 class="mb-0 bread">GESTION DE PRODUITS</h1>
          </div>
        </div>
      </div>
    </div>

	
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
						<form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" class="billing-form">
						@csrf
							<h3 class="mb-4 billing-heading">FORMULAIRE DE PRODUIT</h3>

							<div class="col-lg-6 mb-5 ftco-animate">
							<label for="name">Image du produit</label>
							<div class="image-area mt-4"><img id="imageResult" src="../../template/images/product.png" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>
							</div>

							<div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
							
							<input id="upload" name="image" type="file" onchange="readURL(this);" class="form-control border-0" required="">
							<input id="defaulterrormessage" type="hidden" th:value="{{$category = App\Models\Category::orderBy('name','asc')->get();}} ">
							
							</div>

							<div >
								<div class="form-group">
								<label for="name">Catégorie du produit</label>
									<div class="select-wrap">
									<div class="icon"><span class="ion-ios-arrow-down"></span></div>
									<select  name="category" id="" class="form-control select-wrap" required="">
									<option value="">Choisissez une catégorie</option>
									@foreach($category as $c)
									<option value="{{$c->id}}">{{$c->name}}</option>
									@endforeach
									
									</select>
								</div>
		   					</div>

							<div class="row align-items-end">

								

								<div class="col-md-6">
								<div class="form-group">
									<label for="name">Nom du produit</label>
								<input name="name" type="text" class="form-control" required="Ce champ est obligatoire" placeholder="Entrez le nom du produit">
								</div>
								</div>

								<div class="col-md-6">
								<div class="form-group">
									<label for="name">Description du produit</label>
								<input name="description" type="text" class="form-control" required="Ce champ est obligatoire" placeholder="Entrez la description du produit">
								</div>
								</div>

								<div class="col-md-6">
								<div class="form-group">
									<label for="name">Quantité du produit</label>
								<input name="quantity" type="number" class="form-control" required="Ce champ est obligatoire" placeholder="Entrez la quantité du produit">
								</div>
								</div>

								<div class="col-md-6">
								<div class="form-group">
									<label for="name">Prix unitaire du produit</label>
								<input name="price" type="number" class="form-control" required="Ce champ est obligatoire" placeholder="Entrez le prix du produit">
								</div>
								</div>
						


								</div>

						<div class="form-group">
							<input type="submit" value="VALIDER" class="btn btn-primary py-3 px-5">
						</div>
	          	    
          	</div>
		
    		
    	</div>
    
</form>
</section>

<section class="ftco-section ftco-product">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="product-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>IMAGE</th>
						        <th>CATEGORIE</th>
						        <th>PRODUIT</th>
						        <th>QUANTITE</th>
						        <th>PRIX</th>
								<th>MODIFIER</th>
								<th>SUPPRIMER</th>
						      </tr>
						    </thead>
						    <tbody>
							<input id="defaulterrormessage" type="hidden" th:value="{{$productData = App\Models\Product::where('user_id', '=',Session::get('id'))->get();}} ">
							
								@foreach($productData as $product)
								<input id="defaulterrormessage" type="hidden" th:value="{{$category = App\Models\Category::find($product->category_id);}} ">
								
								
						      <tr class="text-center">
						       <td class="image">
							   <a href="#" class="img-prod"><img class="img-fluid" src="{{ url('products/images/'.$product->image) }}" style="height: 100px; width: 150;" alt="Colorlib Template"></a>
							   </td>
							   
							   <td class="category">{{$category->name}}</td>

								
						        
						        <td class="product-name">
						        	<h3>{{$product->name}}</h3>
						        	<p>{{$product->description}}</p>
						        </td>
						        
						        <td class="quantity">{{$product->quantity}}</td>
								<td class="price">{{$product->price}} FCFA</td>

								<td>
							 	
									<a class="btn btn-primary py-3 px-5"  href="{{route('product.edit',['id'=>$product->id])}}" onClick = "return confirm('Voulez-vous modifier ce produit ?')">+</a>
								
							  </td>  

							  <td>
								
							 	 <a class="btn btn-primary py-3 px-5" href="{{route('product.delete',['id'=>$product->id])}}" onClick = "return confirm('Voulez-vous supprimer ce produit ?')">x</a>
								
							</td>
						      </tr><!-- END TR-->
							 @endforeach
						     
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
    		
    				</div>
    			
    		</div>
			</div>
		</section>

  <script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});

		function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imageResult')
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$(function () {
    $('#upload').on('change', function () {
        readURL(input);
    });
});

/*  ==========================================
    SHOW UPLOADED IMAGE NAME
* ========================================== */
var input = document.getElementById( 'upload' );
var infoArea = document.getElementById( 'upload-label' );

input.addEventListener( 'change', showFileName );
function showFileName( event ) {
  var input = event.srcElement;
  var fileName = input.files[0].name;
  infoArea.textContent = 'File name: ' + fileName;
}

	</script>
    

    </section>

    <section id="stock">
    @include('pages/stock.create')
    </section>
   	
	<section class="ftco-section bg-light">
			@include('layouts/icons')
		</section>

	
    <footer class="ftco-footer ftco-section">
      @include('layouts/footer')
    </footer>

    
    @include('layouts/js')

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>



    
  </body>
</html>