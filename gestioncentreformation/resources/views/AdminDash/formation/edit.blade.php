@include ('AdminDash.includesAdmin.header') 

@section('body')
    <h1 class="mb-0">Modifier formation</h1>
    <hr />
    <form action="{{ route('formation.update', $formation->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Spécialité de formation</label>
                <input type="text" name="specialite" class="form-control @error('specialité') is-invalid @enderror" placeholder="Spécialité" value="{{ $formation->specialite }}" >
                @error('specialité')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Période de formation</label>
                <input type="text" name="periode" class="form-control @error('periode') is-invalid @enderror" placeholder="Période de formation" value="{{ $formation->periode }}" >
                @error('periode')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Prix de formation</label>
                <input type="text" name="prix" class="form-control @error('prix') is-invalid @enderror" placeholder="Numero de téléphone" value="{{ $formation->prix }}" >
                @error('prix')
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