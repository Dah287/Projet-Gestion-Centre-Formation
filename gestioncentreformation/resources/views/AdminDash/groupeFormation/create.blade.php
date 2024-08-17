<!-- right content -->
    
@include ('AdminDash.includesAdmin.header')  
@section('body')
    <h1 class="mb-0">Ajouter un groupe de formation</h1>
    <hr />
    <form action="{{ route('groupeFormation.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="nomGroupe" class="form-control" @error('nomGroupe') is-invalid @enderror placeholder="Nom groupe" value="{{old('nomGroupe')}}"> 
                @error('nomGroupe')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div> 
        <div class="row mb-3">
            <div class="form-group">
                <div class="form-group">
                    <label for="formation_id">Formation :</label>
                    <select name="formation_id" id="formation_id" class="form-control @error('formation_id') is-invalid @enderror">
                        <option value="">Sélectionnez une formation</option>
                        @foreach ($formations as $formation)
                                <option value="{{ $formation->id }}" name="formation_id">{{ $formation->specialite }} &nbsp; &nbsp; {{ $formation->periode }} &nbsp; &nbsp;{{ $formation->prix }}</option>
                        @endforeach
                    </select>
                    @error('formation_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>
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