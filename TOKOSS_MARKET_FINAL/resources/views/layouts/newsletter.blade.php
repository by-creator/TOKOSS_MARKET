<div class="container py-4">
        <div class="row d-flex justify-content-center py-5">
          <div class="col-md-6">
          	<h2 style="font-size: 22px;" class="mb-0">Abonnez-vous à notre newsletter</h2>
          	<span>Recevez des mises à jour par e-mail sur nos dernières boutiques et offres spéciales</span>
          </div>
          <div class="col-md-6 d-flex align-items-center">
          <form action="{{ route('user.newsletter') }}" method="POST" enctype="multipart/form-data" class="billing-form">
          @csrf   
          <div class="form-group d-flex">
                <input type="email" name="email" class="form-control" placeholder="Entrer l'adresse e-mail">
                <input type="submit" value="VALIDER" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          </div>
        </div>
      </div>