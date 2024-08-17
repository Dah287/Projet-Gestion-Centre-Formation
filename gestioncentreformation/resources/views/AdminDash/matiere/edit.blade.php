@include ('AdminDash.includesAdmin.header') 
 
@section('body')
    <h1 class="mb-0">Modifier une matiere</h1>
    <hr />
    <form action="{{ route('matiere.update', $matiere->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col">
                <label class="form-label">Matiére</label>
                <input type="text" name="nomMatiere" class="form-control @error('nomMatiere') is-invalid @enderror" placeholder="Nom matiere"  value="{{ $matiere->nomMatiere }}"> 
                @error('nomMatiere')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col mb-3">

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