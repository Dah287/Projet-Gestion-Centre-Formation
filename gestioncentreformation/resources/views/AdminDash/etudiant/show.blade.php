<!-- right content -->
    
@include ('AdminDash.includesAdmin.header')  
@section('body')
    <h1 class="mb-0">Detail d'étudiant</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Prenom</label>
            <input type="text" name="prenom" class="form-control" placeholder="Prenom" value="{{ $etudiant->prenom }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Nom</label>
            <input type="text" name="nom" class="form-control" placeholder="Nom" value="{{ $etudiant->nom }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Email</label>
            <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $etudiant->email }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label" for="password">Mot de passe</label>
            <input type="password" name="password" class="form-control" id="password" autocomplete="off" value="{{ $etudiant->pass }}" readonly>
            <input type="checkbox" onclick="document.getElementById('password').type = this.checked ? 'text' : 'password';"> Afficher le mot de passe
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">CIN</label>
            <input type="text" name="CIN" class="form-control" placeholder="CIN" value="{{ $etudiant->CIN }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Numéro de téléphone</label>
            <input type="tel" name="tel" class="form-control" placeholder="Numéro de téléphone" value="0{{ $etudiant->tel }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <label for="groupe_formation_id">Formation & Groupe de formation :</label>
            <select name="groupe_formation_id" class="form-control">
                <option value="">Voiçi vos groupes de formations</option>
                @foreach ($etudiantGroupeFormations as $etudiantGroupeFormation)
                <option value="{{ $etudiantGroupeFormation->groupeFormation->formation->specialite}}  &nbsp;&nbsp; {{ $etudiantGroupeFormation->groupeFormation->formation->periode}} &nbsp;&nbsp; {{ $etudiantGroupeFormation->groupeFormation->formation->prix}}  &nbsp;&nbsp; {{ $etudiantGroupeFormation->groupeFormation->id }}"name="groupe_formation_id">{{ $etudiantGroupeFormation->groupeFormation->nomGroupe }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Modifier le : </label>
            <input type="text" name="updated_at" class="form-control" placeholder="Modifier Le" value="{{ $etudiant->updated_at }}" readonly>
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

