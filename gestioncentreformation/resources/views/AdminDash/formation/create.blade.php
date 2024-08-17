@include ('AdminDash.includesAdmin.header') 
 
@section('body')
    <h1 class="mb-0">Ajouter une formation</h1>
    <hr />
    <form action="{{ route('formation.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="specialite" class="form-control @error('specialite') is-invalid @enderror" placeholder="Specialité" value="{{old('specialite')}}"> 
                @error('specialite')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>            
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="periode" class="form-control @error('periode') is-invalid @enderror" placeholder="periode" value="{{old('periode')}}"> 
                @error('periode')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>  
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="prix" class="form-control @error('prix') is-invalid @enderror" placeholder="Prix" value="{{old('prix')}}"> 
                @error('prix')
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