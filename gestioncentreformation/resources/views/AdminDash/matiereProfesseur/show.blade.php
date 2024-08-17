<!-- right content -->
    
@include ('AdminDash.includesAdmin.header')  
@section('body')
    <h1 class="mb-0">Detail matiere professeur</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Professeur :</label>
            <input type="text" name="professeur" class="form-control" placeholder="Professeur" value="{{ $matiereProfesseur->professeur->prenom }} {{ $matiereProfesseur->professeur->nom }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Matiére :</label>
            <input type="text" name="Matiére" class="form-control" placeholder="Matiére" value="{{ $matiereProfesseur->matiere->nomMatiere }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Modifier le : </label>
            <input type="text" name="updated_at" class="form-control" placeholder="Modifier Le" value="{{ $matiereProfesseur->updated_at }}" readonly>
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

