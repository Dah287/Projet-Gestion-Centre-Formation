@include ('AdminDash.includesAdmin.header')
 
@section('body')
    <h1 class="mb-0">Modifier professeur</h1>
    <hr />
    <form action="{{ route('professeur.update', $professeur->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Prenom</label>
                <input type="text" name="prenom" class="form-control @error('prenom') is-invalid @enderror" placeholder="Prenom" value="{{ $professeur->prenom }}" >
                @error('prenom')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col mb-3">
                <label class="form-label">Nom</label>
                <input type="text" name="nom" class="form-control  @error('nom') is-invalid @enderror" placeholder="Nom" value="{{ $professeur->nom }}" >
                @error('nom')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ $professeur->email }}" >
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col mb-3">
                <label class="form-label" for="password">Mot de passe</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" autocomplete="off" value="{{ $professeur->password }}">
                <input type="checkbox" onclick="document.getElementById('password').type = this.checked ? 'text' : 'password';"> Afficher le mot de passe
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Numéro de téléphone</label>
                <input type="tel" name="tel" class="form-control @error('tel') is-invalid @enderror" placeholder="Numero de téléphone" value="{{ $professeur->tel }}" >
                @error('tel')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Modifier</button>
            </div>
        </div>
    </form>
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