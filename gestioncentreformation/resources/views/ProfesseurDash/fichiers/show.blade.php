@include ('ProfesseurDash.includesProfesseur.header') 
 
@section('body')
    <h1 class="mb-0">Détail de fichier</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Type</label>
            <input type="text" name="type" class="form-control" placeholder="type" value="{{ $fichier->type }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Fichier</label>
                <a href="{{ url($fichier->fichier) }}" name="fichier" class="form-control" style="color:blue;" target="_blank"> {{$fichier->fichier}} </a>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Video</label>
                <a href="{{ url($fichier->video) }}" name="video" class="form-control" style="color:blue;" target="_blank"> {{$fichier->video}} </a>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Titre</label>
            <input type="text" name="titre" class="form-control" placeholder="Titre" value="{{ $fichier->titre }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Matiere</label>
            <input type="text" name="matiere" class="form-control" placeholder="Matiere" value="{{ $fichier->matiere->nomMatiere }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Ajouter le :</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Modifier Le" value="{{ $fichier->updated_at }}" readonly>
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

@include ('ProfesseurDash.includesProfesseur.footer')