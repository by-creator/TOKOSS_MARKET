
@extends('pages.index.index_admin')

@section('title', '- CATEGORIE')

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('../../template/images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="/">ACCUEIL</a></span> <span>//</span> <span>MODIFICATION DES UTILISATEURS</span></p>
            <h1 class="mb-0 bread">GESTION UTILISATEUR</h1>
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
						<form action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data" class="billing-form">
                        <input type="hidden" name="id" class="form-control" value="{{$user->id}}">
						@csrf
							<h3 class="mb-4 billing-heading">FORMULAIRE DE MODIFICATION DES UTILISATEURS</h3>
	          	<div class="row align-items-end">
	          		<div class="col-md-6">
	                <div class="form-group">
	                	<label for="firstname">Prénom(s)</label>
	                  <input name="firstname" type="text" class="form-control" required="Ce champ est obligatoire" value="{{$user->firstname}}">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="lastname">Nom</label>
	                  <input name="lastname" type="text" class="form-control" required="Ce champ est obligatoire"  value="{{$user->lastname}}">
	                </div>
                </div>
              
		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="adress">Adresse</label>
	                  <input name="adress" type="text" class="form-control" required="Ce champ est obligatoire" value="{{$user->adress}}">
	                </div>
		            </div>
		            <div class="col-md-6">
		            	<div class="form-group">
		            		<label for="city">Ville</label>
	                  <input name="city" type="text" class="form-control" required="Ce champ est obligatoire" value="{{$user->city}}">
	                </div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
	                <div class="form-group">
	                	<label for="tel">Téléphone</label>
	                  <input name="tel" type="text" class="form-control" required="Ce champ est obligatoire"  value="{{$user->tel}}">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="email">Email </label>
	                  <input name="email" type="email" class="form-control" required="Ce champ est obligatoire"  value="{{$user->email}}">
	                </div>
                </div>
				<div class="col-md-6">
	                <div class="form-group">
	                	<label for="password">Mot de passe </label>
	                  <input name="password" type="password" class="form-control" required="Ce champ est obligatoire" placeholder="Entrez votre mot de passe">
	                </div>
                </div>
				<div class="col-md-6">
	                <div class="form-group">
	                	<label for="confirm_password">Confirmez le mot de passe </label>
	                  <input name="confirm_password" type="password" class="form-control" required="Ce champ est obligatoire" placeholder="Confirmez votre mot de passe">
	                </div>
                </div>
				<div class="col-md-6">
	                <div class="form-group">
	                	<label for="trade_name">Nom commercial (nom affiché lors des ventes) </label>
	                  <input name="trade_name" type="text" class="form-control" required="Ce champ est obligatoire" value="{{$user->trade_name}}">
	                </div>
                </div>
                <div class="w-100"></div>

				<div class="form-group">
					<input type="submit" value="VALIDER" class="btn btn-primary py-3 px-5">
				</div>

			
                
	            </div>
	          </form><!-- END -->
					
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->

	@stop