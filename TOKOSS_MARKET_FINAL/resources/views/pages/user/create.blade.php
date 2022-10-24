

<div class="hero-wrap hero-bread" style="background-image: url('../../template/images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="/">ACCUEIL</a></span> <span>//</span> <span>AJOUT DE PRODUITS</span></p>
            <h1 class="mb-0 bread">GESTION DE FOURNISSEUR</h1>
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
						<form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data" class="billing-form">
						@csrf
							<h3 class="mb-4 billing-heading">FORMULAIRE DE FOURNISSEUR</h3>
	          	<div class="row align-items-end">
	          		<div class="col-md-6">
	                <div class="form-group">
	                	<label for="firstname">Prénom(s)</label>
	                  <input name="firstname" type="text" class="form-control" required="Ce champ est obligatoire" placeholder="Entrez votre prénom">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="lastname">Nom</label>
	                  <input name="lastname" type="text" class="form-control" required="Ce champ est obligatoire"  placeholder="Entrez votre nom">
	                </div>
                </div>
              
		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="adress">Adresse</label>
	                  <input name="adress" type="text" class="form-control" required="Ce champ est obligatoire"  placeholder="Entrez votre adresse">
	                </div>
		            </div>
		            <div class="col-md-6">
		            	<div class="form-group">
		            		<label for="city">Ville</label>
	                  <input name="city" type="text" class="form-control" required="Ce champ est obligatoire" placeholder="Entrez votre ville">
	                </div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
	                <div class="form-group">
	                	<label for="tel">Téléphone</label>
	                  <input name="tel" type="text" class="form-control" required="Ce champ est obligatoire"  placeholder="Entrez votre téléphone">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="email">Email </label>
	                  <input name="email" type="email" class="form-control" required="Ce champ est obligatoire"  placeholder="Entrez votre adresse mail">
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
	                  <input name="trade_name" type="text" class="form-control" required="Ce champ est obligatoire" placeholder="Entrez votre nom commercial">
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


    <section class="ftco-section ftco-user">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="user-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>BOUTIQUE</th>
						        <th>PRENOM</th>
						        <th>NOM</th>
						        <th>ADRESSE</th>
						        <th>VILLE</th>
						        <th>TEL</th>
						        <th>EMAIL</th>
						        <th>ROLE</th>
								<th>MODIFIER</th>
						        <th>SUPPRIMER</th>
						      </tr>
						    </thead>
							<input id="defaulterrormessage" type="hidden" th:value="{{$userData = App\Models\User::all();}} ">
						    <tbody>
								@foreach($userData as $user)	
								<input id="defaulterrormessage" type="hidden" th:value="{{$role = App\Models\Role::find($user->role_id);}} ">
							
								
						      <tr class="text-center">
							  <td class="trade_name">{{$user->trade_name}}</td>
							  <td class="firstname">{{$user->firstname}}</td>
							  <td class="lastname">{{$user->lastname}}</td>
							  <td class="adress">{{$user->adress}}</td>
							  <td class="city">{{$user->city}}</td>
							  <td class="tel">{{$user->tel}}</td>
							  <td class="email">{{$user->email}}</td>
							  <td class="role_id">{{$role->name}}</td>
						        	
						        
							  <td>
							 	
								 <a class="btn btn-primary py-3 px-5"  href="{{route('user.edit',['id'=>$user->id])}}" onClick = "return confirm('Voulez-vous modifier cet utilisateur ?')">+</a>
							 
						   </td>  

						   <td>
							 
							   <a class="btn btn-primary py-3 px-5" href="{{route('user.delete',['id'=>$user->id])}}" onClick = "return confirm('Voulez-vous supprimer cet utilisateur ?')">x</a>
							 
						 </td>

						      </tr><!-- END TR-->
							 @endforeach
						     
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
    
		</section>


	