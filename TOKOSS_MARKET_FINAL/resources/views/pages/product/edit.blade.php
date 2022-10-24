<!DOCTYPE html>
<html lang="en">
  <head>
  @extends('layouts/head')
  </head>
  <body class="goto-here">
  @include('layouts/ban')
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	@include('layouts/nav_admin')
	  </nav>
    <!-- END nav -->
  
    @yield('content')
    <input id="defaulterrormessage" type="hidden" th:value="{{$user = App\Models\User::find(Session::get('id'));}} ">
      
    <section id="product">
    

    <div class="hero-wrap hero-bread" style="background-image: url('../../template/images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="/">ACCUEIL</a></span> <span>//</span> <span>MODIFICATION DE PRODUITS</span></p>
            <h1 class="mb-0 bread">GESTION DE PRODUITS</h1>
          </div>
        </div>
      </div>
    </div>

	
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
						<form action="{{ route('product.update') }}" method="POST" enctype="multipart/form-data" class="billing-form">
						@csrf
							<h3 class="mb-4 billing-heading">FORMULAIRE DE MODIFICATION DE PRODUIT</h3>
							<input type="hidden" name="id" class="form-control" value="{{$product->id}}">

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
								<input name="name" type="text" class="form-control" required="Ce champ est obligatoire" value="{{$product->name}}">
								</div>
								</div>

								<div class="col-md-6">
								<div class="form-group">
									<label for="name">Description du produit</label>
								<input name="description" type="text" class="form-control" required="Ce champ est obligatoire" value="{{$product->description}}">
								</div>
								</div>

								<div class="col-md-6">
								<div class="form-group">
									<label for="name">Quantité du produit</label>
								<input name="quantity" type="number" class="form-control" required="Ce champ est obligatoire" value="{{$product->quantity}}">
								</div>
								</div>

								<div class="col-md-6">
								<div class="form-group">
									<label for="name">Prix unitaire du produit</label>
								<input name="price" type="number" class="form-control" required="Ce champ est obligatoire" value="{{$product->price}}">
								</div>
								</div>
						


								</div>

						<div class="form-group">
							<input type="submit" value="VALIDER" class="btn btn-primary py-3 px-5">
						</div>
	          	    
          	</div>

			 
			 
          				
    		
    	</div>
    
</form>


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