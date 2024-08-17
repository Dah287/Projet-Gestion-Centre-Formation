@include ('AdminDash.includesAdmin.header')
 
@section('body')
    <h1 class="mb-0">Detail de la salle</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Nom de la salle</label>
            <input type="text" name="nomSalle" class="form-control" placeholder="Nom de la salle" value="{{ $salle->nomSalle }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Capacité de la salle</label>
            <input type="text" name="capacité" class="form-control" placeholder="Capacité de la salle" value="{{ $salle->capacité }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Type de la salle</label>
            <input type="text" name="type" class="form-control" placeholder="Type de la salle" value="{{ $salle->type }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Modifier le : </label>
            <input type="text" name="updated_at" class="form-control" placeholder="Modifier Le" value="{{ $salle->updated_at }}" readonly>
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


