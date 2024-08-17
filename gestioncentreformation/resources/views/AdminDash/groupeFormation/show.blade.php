<!-- right content -->
    
@include ('AdminDash.includesAdmin.header') 
@section('body')
    <h1 class="mb-0">Détail du groupe de formation</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Groupe de formation :</label>
            <input type="text" name="nomGroupe" class="form-control" placeholder="Groupe de formation" value="{{ $groupeFormation->nomGroupe }} DH" readonly>
        </div>
        <div class="col mb-3">

        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Formation :</label>
            <input type="text" name="formation" class="form-control" placeholder="Formation" value="{{ $groupeFormation->formation->specialite }} &nbsp &nbsp &nbsp {{ $groupeFormation->formation->periode }}&nbsp &nbsp &nbsp {{ $groupeFormation->formation->prix }}" readonly>
        </div>
        <div class="col mb-3">

        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Modifier le : </label>
            <input type="text" name="updated_at" class="form-control" placeholder="Modifier Le" value="{{ $groupeFormation->updated_at }}" readonly>
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
