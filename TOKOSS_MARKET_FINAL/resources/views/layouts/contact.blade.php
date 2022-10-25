<div class="container">
      	<div class="row d-flex mb-5 contact-info">
          <h3>Contcatez-Nous</h3>
          <div class="w-100"></div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>Addresse:</span><br> Avenue Cheick Anta Diop, Dakar, Sénégal</p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>Phone:</span><a href="tel://+221776720018"><br> +221-77-672-00-18</a></p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>Email:</span> <a href="mailto:marcdamien04@gmail.com">marcdamien04@gmail.com</a></p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>Website :</span> <a href="{{route('index')}}"><br>tokoos_market</a></p>
	          </div>
          </div>
        </div>
        <div class="row block-9">
          <div class="col-md-6 order-md-last d-flex">
          <form action="{{ route('user.contact') }}" method="POST" enctype="multipart/form-data" class="billing-form">
            @csrf
              <div class="form-group">
                <input type="text" name="name" class="form-control" required placeholder="Entrez votre nom">
              </div>
              <div class="form-group">
                <input type="email" name="email" class="form-control" required placeholder="Entrez votre adresse e-mail">
              </div>
              <div class="form-group">
                <input type="text" name="subject" class="form-control" required placeholder="Entrez un sujet">
              </div>
              <div class="form-group">
                <textarea name="message" id="" cols="30" rows="7" class="form-control" required placeholder="Entrez votre message"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="ENVOYER" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          
          </div>

          <div class="col-md-6 d-flex">
          	<div id="map" class="bg-white"></div>
          </div>
        </div>
      </div>