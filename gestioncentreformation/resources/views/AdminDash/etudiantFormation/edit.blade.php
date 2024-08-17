<!-- right content -->
    
@include ('AdminDash.includesAdmin.header') 
@section('body')
    <h1 class="mb-0">Modifier formation d'étudiant</h1>
    <hr />
    <form action="/etudiantFormationUpdate/{{$id}}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$id}}"> 
        <div class="row mb-3">
            <div class="form-group">
                <label for="formation_id">Formation :</label>
                <select name="formation_id" class="form-control">
                    <option value="{{ $etudiantFormation->formation->id }}">{{ $etudiantFormation->formation->specialite }} --- {{ $etudiantFormation->formation->periode }} --- {{ $etudiantFormation->formation->prix }}</option>
                    @foreach ($formations as $formation)
                        <option value="{{ $formation->id }}" name="formation_id">{{ $formation->specialite }} --- {{ $formation->periode }} --- {{ $formation->prix }}</option>
                    @endforeach
                </select>
            </div>
        </div> 
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Nouveau prix de formation</label>
                <input type="text" name="nvPrix" class="form-control" placeholder="Nouveau prix" value="{{ $etudiantFormation->nvPrix }}" >
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