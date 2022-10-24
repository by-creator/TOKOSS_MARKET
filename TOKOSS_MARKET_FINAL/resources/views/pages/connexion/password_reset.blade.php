<!DOCTYPE html>
<html lang="en">
  <head>
	  
  @extends('layouts/head')
    @section('title', 'CONNEXION')
  </head>
  <body class="goto-here">
  @include('layouts/ban')
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    @include('layouts/nav')
	  </nav>
    <!-- END nav -->
   

    <div class="hero-wrap hero-bread" style="background-image: url('../../template/images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="/">CONNEXION</a></span> <span>//</span> <span>CONNECTEZ-VOUS</span></p>
            <h1 class="mb-0 bread">CONNEXION</h1>
          </div>
        </div>
      </div>
    </div>

	
	<section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
						<form form action="{{ route('connexion.password_reset_store') }}" method="POST" enctype="multipart/form-data" class="billing-form" class="billing-form">
						@csrf	
						<h3 class="mb-4 billing-heading">RÉINITIALISER VOTRE MOT DE MASSE</h3>
	          	<div class="row align-items-end">
	          		
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="email">Entrez votre adresse email </label>
	                  <input name="email" type="email" class="form-control" required="Ce champ est obligatoire" placeholder="Entrez votre adresse mail">
	                </div>
                </div>
				
                <div class="w-100"></div>

				

				<div class="form-group">
					<input type="submit" value="VALIDER" class="btn btn-primary py-3 px-5">
				</div>
                
	            </div>
				
				<div>
				  <p>Pour vous inscrire <a href="{{route('inscription')}}">Cliquez ici</a></p>
			  </div>
	          </form><!-- END -->
					
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->

	<section class="ftco-section bg-light">
			@include('layouts/icons')
		</section>

		<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
      @include('layouts/newsletter')
    </section>
    <footer class="ftco-footer ftco-section">
    @include('layouts/footer')
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  @include('layouts/js')

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
    
  </body>
</html>