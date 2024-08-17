@include ('AdminDash.includesAdmin.header')
 
@section('body')
    <h1 class="mb-0">Modifier salle</h1>
    <hr />
    <form action="{{ route('salle.update', $salle->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Nom de la salle</label>
                <input type="text" name="nomSalle" class="form-control @error('prenom') is-invalid @enderror" placeholder="Nom de la salle" value="{{ $salle->nomSalle }}" >
            </div>
        </div>        
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Capacité de la salle</label>
                <input type="number" name="capacité" class="form-control @error('prenom') is-invalid @enderror" placeholder="Capacité" value="{{ $salle->capacité }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <select name="type" id="type" class="form-control @error('type') is-invalid @enderror" placeholder="Type" > 
                    <option value="{{ $salle->type }}">{{ $salle->type }}</option>
                    <option value="Théorique">Théorique</option>
                    <option value="Pratique">Pratique</option>
                 @error('type')
                    <div class="invalid-feedback">{{ $message }}</div>
                 @enderror                  
                </select>
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

