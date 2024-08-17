<!-- right content -->
    
@include ('AdminDash.includesAdmin.header') 
@section('body')
    <h1 class="mb-0">Ajouter un étudiant</h1>
    <hr />
    <form action="{{ route('etudiant.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="hidden" name="etudiant_id" class="form-control" placeholder="ID" value="{{old('id')}}"> 
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="prenom" class="form-control @error('prenom') is-invalid @enderror" placeholder="Prenom" value="{{old('prenom')}}"> 
                @error('prenom')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" placeholder="Nom" value="{{old('nom')}}"> 
                @error('nom')
                    <div class="invalid-feedback">{{ $message }}</div>
                 @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{old('email')}}"> 
                @error('eamil')
                  <div class="invalid-feedback">{{ $message }}</div>
                 @enderror
            </div>
            <div class="col">
                <input type="text" name="pass" class="form-control @error('pass') is-invalid @enderror" placeholder="Mot de passe" value="{{old('pass')}}"> 
                @error('pass')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>        
        <div class="row mb-3">
            <div class="col">
                <input type="date" name="dateInscription" class="form-control @error('dateInscription') is-invalid @enderror" placeholder="Date d'inscription (yyyy-mm-jj)" value="{{old('dateInscription')}}"> 
                @error('dateInscription')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <input type="tel" name="tel" class="form-control @error('tel') is-invalid @enderror" placeholder="Numero de téléphone" value="{{old('tel')}}"> 
                @error('tel')
                    <div class="invalid-feedback">{{ $message }}</div>
                 @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="adresse" class="form-control @error('adresse') is-invalid @enderror" placeholder="Adresse" value="{{old('adresse')}}"> 
                @error('adresse')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <input type="text" name="CIN" class="form-control @error('CIN') is-invalid @enderror" placeholder="CIN" value="{{old('CIN')}}"> 
                @error('CIN')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
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