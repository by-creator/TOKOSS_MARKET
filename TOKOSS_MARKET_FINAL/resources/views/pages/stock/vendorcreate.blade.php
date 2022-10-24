
    <div class="hero-wrap hero-bread" style="background-image: url('../../template/images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="/">ACCUEIL</a></span> <span>//</span> <span>AJOUT DE PRODUITS</span></p>
            <h1 class="mb-0 bread">GESTION DE STOCK</h1>
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
						<form action="{{ route('stock.store') }}" method="POST" enctype="multipart/form-data" class="billing-form">
						@csrf
                        <input id="defaulterrormessage" type="hidden" th:value="{{$product = App\Models\Product::where('user_id', '=',Session::get('id'))->get();}} ">
                        <input id="defaulterrormessage" type="hidden" th:value="{{$productAction = App\Models\ProductAction::all();}} ">
						<input id="defaulterrormessage" type="hidden" th:value="{{$stockData = App\Models\Stock::where('product_id', '=',Session::get('id'))->get();}} ">

							<h3 class="mb-4 billing-heading">FORMULAIRE DE STOCK</h3>
	          	<div class="row align-items-end">
                    
	          		<div class="col-md-6">
	                <div class="form-group">
	                	<label for="date">Date</label>
	                  <input name="date" type="date" class="form-control" required="Ce champ est obligatoire" placeholder="Entrez une date">
	                </div>
	                </div>

                   		</div>

                           <div >
                        <div class="form-group">
                        <label for="product">Produit</label>
                            <div class="select-wrap">
                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                            <select  name="product" id="" class="form-control select-wrap" required="">
                            <option value="">Choisissez un produit</option>
                            @foreach($product as $p)
                            <option value="{{$p->id}}">{{$p->name}}</option>
                            @endforeach
                            
                            </select>
                        </div>
		   					</div>

                               <div >
								<div class="form-group">
								<label for="product_action">Action sur le produit</label>
									<div class="select-wrap">
									<div class="icon"><span class="ion-ios-arrow-down"></span></div>
									<select  name="product_action" id="" class="form-control select-wrap" required="">
									<option value="">Choisissez une action</option>
									@foreach($productAction as $pa)
									<option value="{{$pa->id}}">{{$pa->name}}</option>
									@endforeach
									
									</select>
								</div>
								</div>
		   			

                    <div class="col-md-6">
	                <div class="form-group">
	                	<label for="stock">Quantité</label>
	                  <input name="quantity" type="number" class="form-control" required="Ce champ est obligatoire" placeholder="Entrez une quantité">
	                </div>
	                </div>


				  <div class="form-group">
							<input type="submit" value="VALIDER" class="btn btn-primary py-3 px-5">
						</div>
	          	    
          		</div>
			 
          				
    			</div>
    		</div>
    	</div>
    
</form>

<section class="ftco-section ftco-stock">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="stock-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>DATE</th>
						        <th>PRODUIT</th>
						        <th>ACTION</th>
						        <th>QUANTITE</th>
								<th>MODIFIER</th>
						        <th>SUPPRIMER</th>
						      </tr>
						    </thead>
						    <tbody>
								@foreach($stockData as $stock)		
                                <input id="defaulterrormessage" type="hidden" th:value="{{$pData = App\Models\Product::where('id', '=',$stock->product_id)->get();}} ">
                                <input id="defaulterrormessage" type="hidden" th:value="{{$pnameData = $pData->first();}} ">
                                <input id="defaulterrormessage" type="hidden" th:value="{{$paData = App\Models\ProductAction::where('id', '=',$stock->product_action_id)->get();}} ">
                                <input id="defaulterrormessage" type="hidden" th:value="{{$panameData = $paData->first();}} ">
						
								
						      <tr class="text-center">
							  <td class="stock-date">{{$stock->date}}</td>
							  <td class="stock-date">{{$pnameData->name}}</td>
							  <td class="stock-date">{{$panameData->name}}</td>
							  <td class="stock-date">{{$stock->quantity}}</td>
							  <td class="product-remove"><a href="#" onClick = "return confirm('Voulez-vous supprimer ce produit ?')"><span class="ion-ios-brush"></span></a></td>
							  <td class="product-remove"><a href="#" onClick = "return confirm('Voulez-vous supprimer ce produit ?')"><span class="ion-ios-close"></span></a></td>
						         
						      </tr><!-- END TR-->
							 @endforeach
						     
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
    
		</section>

	

