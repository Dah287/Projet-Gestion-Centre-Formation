@include ('AdminDash.includesAdmin.header') 
 
@section('body')
    <h1 class="mb-0">Ajouter un profssseur</h1>
    <hr />
    <form action="{{ route('professeur.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="prenom" class="form-control @error('prenom') is-invalid @enderror" placeholder="Prenom">
                @error('prenom')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" placeholder="Nom">
                @error('nom')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <input type="text" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Mot de passe" >
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>        
        <div class="row mb-3">
            <div class="col">
                <input type="tel" name="tel" class="form-control @error('tel') is-invalid @enderror" placeholder="Numero de téléphone">
                @error('tel')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-primary">Submit</button>
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