@include ('AdminDash.includesAdmin.header') 

@section('body')
    <h1 class="mb-0">Détail de formation</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Spécialité</label>
            <input type="text" name="specialite" class="form-control" placeholder="Prenom" value="{{ $formation->specialite }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Période</label>
            <input type="text" name="periode" class="form-control" placeholder="Email" value="{{ $formation->periode }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Prix</label>
            <input type="text" name="prix" class="form-control" placeholder="Numéro de téléphone" value="{{ $formation->prix }} DH" readonly>
        </div>        
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Modifier le : </label>
            <input type="text" name="updated_at" class="form-control" placeholder="Modifier Le" value="{{ $formation->updated_at }}" readonly>
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