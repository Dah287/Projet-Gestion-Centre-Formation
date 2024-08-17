<!-- right content -->
    
@include ('AdminDash.includesAdmin.header') 
@section('body')
    <h1 class="mb-0">Detail du matiére</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Matiére</label>
            <input type="text" name="nomMatiere" class="form-control" placeholder="Matiére" value="{{ $matiere->nomMatiere }}" readonly>
        </div>
        <div class="col mb-3">

        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Modifier le : </label>
            <input type="text" name="created_at" class="form-control" placeholder="Créer Le" value="{{ $matiere->created_at }}" readonly>
        </div>
    </div>
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
