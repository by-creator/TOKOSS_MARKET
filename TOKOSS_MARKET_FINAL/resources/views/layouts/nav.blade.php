
<div class="container">
<a href="/" class="img-prod"><img class="img-fluid" src="{{ url('template/images/logo.jpg') }}" style="height: 100px; width: 150;" alt="Colorlib Template"></a>
	      <a class="navbar-brand" href="/">TOKOSS MARKET</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="/" class="nav-link">ACCUEIL</a></li>
	          <li class="nav-item active dropdown">
              	<a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">PAGES</a>
				<div class="dropdown-menu" aria-labelledby="dropdown04">
					<a class="dropdown-item" href="{{route('shop')}}">Boutique</a>
					<a class="dropdown-item" href="{{route('cart.list')}}">Panier</a>
				</div>
            	</li>
	          <li class="nav-item"><a href="{{route('about')}}" class="nav-link">À PROPOS</a></li>
	          <li class="nav-item"><a href="{{route('contact')}}" class="nav-link">CONTACT</a></li>	          
	          <li class="nav-item cta cta-colored"><a href="{{route('cart.list')}}" class="nav-link"><span class="icon-shopping_cart"></span></a></li>
			  <li class="nav-item"><a href="{{route('connexion')}}" class="nav-link">CONNEXION / INSCRIPTION</a></li>
			  
	        </ul>
			
	      </div>
		  
	    </div>
		