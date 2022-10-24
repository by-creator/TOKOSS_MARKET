@extends('pages.index.index_vendor')

@section('title', '- COMMANDE')

@section('content')
   
<input id="defaulterrormessage" type="hidden" th:value="{{$user = App\Models\User::find(Session::get('id'));}} ">
    <div class="hero-wrap hero-bread" style="background-image: url('../../template/images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="/">ACCUEIL</a></span> <span>//</span> <span>MODIFICATION DE COMMANDE</span></p>
            <h1 class="mb-0 bread">GESTION DE COMMANDE</h1>
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
		  <form action="{{ route('command.update') }}" method="POST" enctype="multipart/form-data" class="billing-form">
			@csrf
							<h3 class="mb-4 billing-heading">Détails de la commande</h3>
              <input type="hidden" th:value="{{$product = App\Models\Product::find($command->product_id);}} ">
              <input type="hidden" th:value="{{$user = App\Models\User::find($command->user_command_id);}} ">
              <input type="hidden" th:value="{{$state = App\Models\State::orderBy('name','asc')->get();}} ">

              <input type="hidden" name="id" class="form-control" value="{{$command->id}}">

              <br>
              <br>
              <h3 class="mb-4 billing-heading">Détails du client</h3>
	          	<div class="row align-items-end">
	          		<div class="col-md-6">
	                <div class="form-group">
	                	<label for="firstname">Prénom(s)</label>
	                  <input name="firstname" type="text" class="form-control" value="{{$user->firstname}}" required="Ce champ est obligatoire">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="lastname">Nom</label>
	                  <input name="lastname" type="text" class="form-control" value="{{$user->lastname}}" required="Ce champ est obligatoire">
	                </div>
                </div>
              
		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="adress">Adresse</label>
	                  <input name="adress" type="text" class="form-control" value="{{$user->adress}}" required="Ce champ est obligatoire">
	                </div>
		            </div>
		            <div class="col-md-6">
		            	<div class="form-group">
		            		<label for="city">Ville</label>
	                  <input name="city" type="text" class="form-control" value="{{$user->city}}" required="Ce champ est obligatoire">
	                </div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
	                <div class="form-group">
	                	<label for="phone">Téléphone</label>
	                  <input name="tel" type="number" class="form-control" value="{{$user->tel}}" required="Ce champ est obligatoire">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="email">Email </label>
	                  <input name="email" type="email" class="form-control" value="{{$user->email}}" required="Ce champ est obligatoire">
	                </div>
                  
                </div>
              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="phone">Nom du produit</label>
	                  <input name="product_name" type="text" class="form-control" value="{{$product->name}}"  required="Ce champ est obligatoire">
	                </div>
                </div>

                <div class="col-md-6">
	                <div class="form-group">
	                	<label for="phone">Description du produit</label>
	                  <input name="product_description" type="text" class="form-control" value="{{$product->description}}" required="Ce champ est obligatoire">
	                </div>
                </div>

                <div class="col-md-6">
	                <div class="form-group">
	                	<label for="phone">Quantité du produit</label>
	                  <input name="product_quantity" type="number" class="form-control" value="{{$command->quantity}}"  required="Ce champ est obligatoire">
	                </div>
                </div>

                <div class="col-md-10">
								<div class="form-group">
								<label for="name">Statut de la commande</label>
									<div class="select-wrap">
									<div class="icon"><span class="ion-ios-arrow-down"></span></div>
									<select  name="state" id="" class="form-control select-wrap" required="">
									<option value="">Choisissez l'état de la commande</option>
									@foreach($state as $s)
									<option value="{{$s->id}}">{{$s->name}}</option>
									@endforeach
									
									</select>
								</div>
		   					</div>


                <div class="w-100"></div>
				    <div class="form-group">
							<input type="submit" value="VALIDER" class="btn btn-primary py-3 px-5">
						</div>
	            </div>
	          </form><!-- END -->
					</div>
         
				
    </section> <!-- .section -->
	
@stop