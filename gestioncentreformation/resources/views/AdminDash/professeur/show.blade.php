@include ('AdminDash.includesAdmin.header')
 
@section('body')
    <h1 class="mb-0">Detail de professeur</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Prenom</label>
            <input type="text" name="prenom" class="form-control" placeholder="Prenom" value="{{ $professeur->prenom }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Nom</label>
            <input type="text" name="nom" class="form-control" placeholder="Nom" value="{{ $professeur->nom }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Email</label>
            <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $professeur->email }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label" for="password">Mot de passe</label>
            <input type="password" name="password" class="form-control" id="password" autocomplete="off" value="{{ $professeur->password }}" readonly>
            <input type="checkbox" onclick="document.getElementById('password').type = this.checked ? 'text' : 'password';"> Afficher le mot de passe
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Numéro de téléphone</label>
            <input type="tel" name="tel" class="form-control" placeholder="Numéro de téléphone" value="0{{ $professeur->tel }}" readonly>
        </div>        
    </div>
    <div class="row">
        <div class="form-group">
            <label for="matiere_id">Matiére :</label>
            <select name="matiere_id" class="form-control">
                <option value="">Voiçi vos matiéres</option>
                @foreach ($matiereProfesseurs as $matiereProfesseur)
                <option value="{{ $matiereProfesseur->matiere->id }}"name="matiere_id">{{ $matiereProfesseur->matiere->nomMatiere }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <label for="groupe_formation_id">Groupe de formation :</label>
            <select name="groupe_formation_id" class="form-control">
                <option value="">Voiçi vos groupes de formations</option>
                @foreach ($groupeFormationProfesseurs as $groupeFormationProfesseur)
                <option value="{{ $groupeFormationProfesseur->groupeFormation->id }}"name="groupe_formation_id">{{ $groupeFormationProfesseur->groupeFormation->nomGroupe }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Modifier le : </label>
            <input type="text" name="updated_at" class="form-control" placeholder="Modifier Le" value="{{ $professeur->updated_at }}" readonly>
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

@include ('AdminDash.includesAdmin.footer')n
