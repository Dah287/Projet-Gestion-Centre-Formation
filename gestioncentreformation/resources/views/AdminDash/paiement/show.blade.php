@include ('AdminDash.includesAdmin.header') 

@section('body')
    <h1 class="mb-0">Détail de paiement</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Formation</label>
            <input type="text" name="formation" class="form-control" placeholder="Formation" value="{{ $paiement->formation->specialite }}   {{ $paiement->formation->periode }}   {{ $paiement->formation->prix }} DH" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Etudiant</label>
            <input type="text" name="etudiant" class="form-control" placeholder="Etudiant" value="{{ $paiement->etudiant->prenom }} {{ $paiement->etudiant->nom }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Montant</label>
            <input type="text" name="montant" class="form-control" placeholder="Montant" value="{{ $paiement->montant }} DH" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Reste</label>
            <input type="text" name="reste" class="form-control" placeholder="Numéro de téléphone" value="{{ $paiement->reste }} DH" readonly>
        </div>        
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Date de paiement</label>
            <input type="text" name="datePaiement" class="form-control" placeholder="Email" value="{{ $paiement->datePaiement }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Modifier le : </label>
            <input type="text" name="updated_at" class="form-control" placeholder="Modifier Le" value="{{ $paiement->updated_at }}" readonly>
        </div>
    </div>
    @endsection  
</div>
</div>
    <div class="container">
     <div class="row"  style="width: -300px;margin-left: 20%;margin-top: 10%;">
      <div class="col">
        @yield('body')
       </div>
     </div>
    </div>
<!-- end right content-->

@include ('AdminDash.includesAdmin.footer')