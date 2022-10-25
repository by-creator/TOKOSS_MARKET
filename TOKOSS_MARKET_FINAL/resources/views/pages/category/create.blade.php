
    <div class="hero-wrap hero-bread" style="background-image: url('../../template/images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="/">ACCUEIL</a></span> <span>//</span> <span>AJOUT DE PRODUITS</span></p>
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
						<form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data" class="billing-form">
						@csrf
							<h3 class="mb-4 billing-heading">FORMULAIRE DE CATEGORIE</h3>
	          	<div class="row align-items-end">
	          		<div class="col-md-6">
	                <div class="form-group">
	                	<label for="category">Catégorie</label>
	                  <input name="category" type="text" class="form-control" required="Ce champ est obligatoire" placeholder="Entrez une catégorie">
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

<section class="ftco-section ftco-category">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="category-list">
					<div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
						<form action="{{ route('category.search') }}" method="POST" enctype="multipart/form-data" class="billing-form">
						@csrf
	          	<div class="row align-items-end">
	          		<div class="col-md-6">
	                <div class="form-group">
	                	<label for="category">Rechercher une catégorie</label>
	                  <input name="category_search" type="text" class="form-control" required="Ce champ est obligatoire" placeholder="Entrez le nom d'une catégorie">
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
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>NOM</th>
								<th>MODIFIER</th>
						        <th>SUPPRIMER</th>
						      </tr>
						    </thead>
							<input id="defaulterrormessage" type="hidden" th:value="{{$categoryData = App\Models\Category::orderBy('name','asc')->get();}} ">
						    <tbody>
								@foreach($categoryData as $category)								
								
						      <tr class="text-center">
							  <td class="category-name">{{$category->name}}</td>
						        	
						        	
						      <td>
							 	
									<a class="btn btn-primary py-3 px-5"  href="{{route('category.edit',['id'=>$category->id])}}" onClick = "return confirm('Voulez-vous modifier cette catégorie ?')">+</a>
								
							  </td>  

							  <td>
								
							 	 <a class="btn btn-primary py-3 px-5" href="{{route('category.delete',['id'=>$category->id])}}" onClick = "return confirm('Voulez-vous supprimer cette catégorie ?')">x</a>
								
							</td>
						         
						    	

						      </tr><!-- END TR-->
							 @endforeach
						     
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
    
		</section>

