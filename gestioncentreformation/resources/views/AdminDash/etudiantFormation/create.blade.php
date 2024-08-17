<!-- right content -->
    
@include ('AdminDash.includesAdmin.header') 
@section('body')
    <h1 class="mb-0">Ajouter formation d'un étudiant</h1>
    <hr />
    <form action="/etudiantFormationCreate" method="POST">
        @csrf
        <input type="hidden" name="etudiant_id" value="{{$id}}"> 
        <div class="row mb-3">
            <div class="form-group">
                <label for="formation_id">Formation :</label>
                <select name="formation_id" class="form-control">
                    <option value="">Sélectionnez une formation</option>
                    @foreach ($formations as $formation)
                        <option value="{{ $formation->id }}" name="formation_id">{{ $formation->specialite }} --- {{ $formation->periode }} --- {{ $formation->prix }}DH</option>
                    @endforeach
                </select>
            </div>
        </div> 
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="nvPrix" class="form-control @error('nvPrix') is-invalid @enderror" placeholder="Prix" value="{{old('nvPrix')}}"> 
                @error('nvPrix')
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