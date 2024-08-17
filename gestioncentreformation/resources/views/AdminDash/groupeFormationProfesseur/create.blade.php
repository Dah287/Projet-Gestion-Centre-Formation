<!-- right content -->
    
@include ('AdminDash.includesAdmin.header') 
@section('body')
    <h1 class="mb-0">Ajouter groupe pour un professeur</h1>
    <hr />
    <form action="/groupeFormationProfesseurCreate" method="POST">
        @csrf
        <input type="hidden" name="professeur_id" value="{{$id}}"> 
        <div class="row mb-3">
            <div class="form-group">
                <label for="groupe_formation_id" class="form-label @error('groupe_formation_id') is-invalid @enderror">Groupe de formation :</label>
                <select name="groupe_formation_id" class="form-control">
                    <option value="">Sélectionnez un groupe de formation</option>
                    @foreach ($groupeFormations as $groupeFormation)
                        <option value="{{ $groupeFormation->id }}" name="groupe_formation_id">{{ $groupeFormation->nomGroupe }}</option>
                    @endforeach
                    @error('groupe_formation_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </select>
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