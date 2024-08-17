<!-- right content -->
    
@include ('AdminDash.includesAdmin.header')  
@section('body')
    <h1 class="mb-0">Ajouter une matiére</h1>
    <hr />
    <form action="{{ route('matiere.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="nomMatiere" class="form-control @error('nomMatiere') is-invalid @enderror" placeholder="Nom matiere" value="{{old('nomMatiere')}}"> 
                @error('nomMatiere')
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