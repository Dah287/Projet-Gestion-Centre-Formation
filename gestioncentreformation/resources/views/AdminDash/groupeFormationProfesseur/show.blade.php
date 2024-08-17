<!-- right content -->
    
@include ('AdminDash.includesAdmin.header')  
@section('body')
    <h1 class="mb-0">Detail matiere professeur</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Professeur :</label>
            <input type="text" name="professeur" class="form-control" placeholder="Professeur" value="{{ $groupeFormationProfesseur->professeur->prenom }} {{ $groupeFormationProfesseur->professeur->nom }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Groupe formation :</label>
            <input type="text" name="groupeFormation" class="form-control" placeholder="Groupe formation" value="{{ $groupeFormationProfesseur->groupeFormation->nomGroupe }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Modifier le : </label>
            <input type="text" name="updated_at" class="form-control" placeholder="Modifier Le" value="{{ $groupeFormationProfesseur->updated_at }}" readonly>
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

