<!-- right content -->
    
@include ('AdminDash.includesAdmin.header')
@section('body')
    <h1 class="mb-0">Ajouter une salle</h1>
    <hr />
    <form action="{{ route('salle.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="nomSalle" class="form-control @error('nomSalle') is-invalid @enderror" placeholder="Nom de la salle" value="{{old('nomSalle')}}"> 
                @error('nomSalle')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>            
        </div>      
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="capacité" class="form-control @error('capacité') is-invalid @enderror" placeholder="Capacité de la salle" value="{{old('capacité')}}"> 
                @error('capacité')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>            
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label" >Choisir le type de la salle :</label> 
                <label>
                    <input type="radio" name="type" value="Théorique"> Théorique
                </label>
                    &nbsp &nbsp &nbsp
                <label>
                    <input type="radio" name="type" value="Pratique"> Pratique
                </label>
                 @error('type')
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