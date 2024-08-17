<!-- right content -->
    
@include ('AdminDash.includesAdmin.header') 
@section('body')
    <h1 class="mb-0">Ajouter matiére d'un professeur</h1>
    <hr />
    <form action="/matiereProfesseurCreate" method="POST">
        @csrf
        <input type="hidden" name="professeur_id" value="{{$id}}"> 
        <div class="row mb-3">
            <div class="form-group">
                <label for="matiere_id" class="form-label @error('matiere_id') is-invalid @enderror">Matiére :</label>
                <select name="matiere_id" class="form-control">
                    <option value="">Sélectionnez une matiére</option>
                    @foreach ($matieres as $matiere)
                        <option value="{{ $matiere->id }}" name="matiere_id">{{ $matiere->nomMatiere }}</option>
                    @endforeach
                    @error('matiere_id')
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