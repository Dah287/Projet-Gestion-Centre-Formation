<!-- right content -->
    
@include ('AdminDash.includesAdmin.header')  
@section('body')
    <h1 class="mb-0">Détail formation étudiant</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Spécialité</label>
            <input type="text" name="specialite" class="form-control" placeholder="Spécialité" value="{{ $etudiantFormation->formation->specialite }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Prix</label>
            <input type="text" name="nvPrix" class="form-control" placeholder="Prix" value="{{ $etudiantFormation->nvPrix }} DH" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Periode</label>
            <input type="text" name="periode" class="form-control" placeholder="Periode" value="{{ $etudiantFormation->formation->periode }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Etudiant</label>
            <input type="text" name="etudiant" class="form-control" placeholder="Etudiant" value="{{ $etudiantFormation->etudiant->prenom }} {{ $etudiantFormation->etudiant->nom }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Modifier le : </label>
            <input type="text" name="updated_at" class="form-control" placeholder="Modifier Le" value="{{ $etudiantFormation->updated_at }}" readonly>
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

