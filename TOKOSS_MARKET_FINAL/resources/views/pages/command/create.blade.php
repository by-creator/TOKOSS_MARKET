
    <div class="hero-wrap hero-bread" style="background-image: url('../../template/images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="/">ACCUEIL</a></span> <span>//</span> <span>COMMANDES</span></p>
            <h1 class="mb-0 bread">GESTION DE COMMANDES</h1>
          </div>
        </div>
      </div>
    </div>
	<h1>
    </h1>

<section class="ftco-section ftco-command">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="command-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>CLIENT</th>
						        <th>ADRESSE</th>
						        <th>CONTACT</th>
						        <th>PRODUIT</th>
						        <th>QUANTITE</th>
						        <th>PRIX</th>
								<th>STATUT</th>
								<th>MODIFIER</th>
						        <th>ARCHIVER</th>
						      </tr>
						    </thead>
						    <tbody>
							<input id="defaulterrormessage" type="hidden" th:value="{{$commandDataCollection = App\Models\Command::where('user_id', '=',Session::get('id'))->get();}} ">
							<input id="defaulterrormessage" type="hidden" th:value="{{$commandData = $commandDataCollection->first();}} ">
							
								
							@foreach($commandDataCollection as $command)

							<input id="defaulterrormessage" type="hidden" th:value="{{$state = App\Models\State::find($command->state_id);}} ">
							<input id="defaulterrormessage" type="hidden" th:value="{{$product = App\Models\Product::find($command->product_id);}} ">
							<input id="defaulterrormessage" type="hidden" th:value="{{$user = App\Models\User::find($command->user_command_id);}} ">
							
								
						      <tr class="text-center">
							  <td class="product-name">
						        	<h3>{{$user->lastname}}</h3>
						        	<p>{{$user->firstname}}</p>
						        </td>
								<td class="product-name">
						        	<h3>{{$user->adress}}</h3>
						        	<p>{{$user->city}}</p>
						        </td>
								<td class="product-name">
						        	<h3>{{$user->email}}</h3>
						        	<p>{{$user->tel}}</p>
						        </td>
							  
								<td class="product-name">
						        	<h3>{{$product->name}}</h3>
						        	<p>{{$product->description}}</p>
						        </td>
							  <td class="command-date">{{$command->quantity}}</td>
							  <td class="command-date">{{$command->price}}</td>
							  <td class="command-date">{{$state->name}}</td>
							  <td>
							 	
								 <a class="btn btn-primary py-3 px-5"  href="{{route('command.edit',['id'=>$command->id])}}" onClick = "return confirm('Voulez-vous modifier cette commande ?')">+</a>
							 
						   </td>  

						   <td>
							 
							   <a class="btn btn-primary py-3 px-5" href="{{route('command.delete',['id'=>$command->id])}}" onClick = "return confirm('Voulez-vous supprimer cette commande ?')">x</a>
							 
						 </td>
						      </tr><!-- END TR-->
							 @endforeach
						     
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
    
		</section>

	

