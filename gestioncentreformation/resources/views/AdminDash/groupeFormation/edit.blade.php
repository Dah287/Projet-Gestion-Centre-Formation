@include ('AdminDash.includesAdmin.header') 
 
@section('body')
    <h1 class="mb-0">Modifier un groupe de formation</h1>
    <hr />
    <form action="{{ route('groupeFormation.update', $groupeFormation->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col">
                <label class="form-label">Groupe de formation</label>
                <input type="text" name="nomGroupe" class="form-control @error('nomGroupe') is-invalid @enderror" placeholder="Nom groupe"  value="{{ $groupeFormation->nomGroupe }}"> 
                @error('nomGroupe')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <br><br>
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