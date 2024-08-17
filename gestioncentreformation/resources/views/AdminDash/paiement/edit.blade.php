@include ('AdminDash.includesAdmin.header') 
<head>
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.0.0-rc.4/dist/css/tom-select.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.0.0-rc.4/dist/js/tom-select.complete.min.js"></script>
</head>
@section('body')
    <h1 class="mb-0">Modifier un paiement</h1><br><br>
    <hr />
    <form action="{{ route('paiement.update', $paiement->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="form-group">
                <label for="etudiant_id">Etudiant</label>
                  <select id="select-etudiant" placeholder="Selectionner un étudiant..." name="etudiant_id" >
                    <option value="{{$paiement->etudiant->id}}">{{$paiement->etudiant->prenom}} {{$paiement->etudiant->nom}} {{$paiement->etudiant->CIN}}</option>
                    @foreach ($etudiants as $etudiant)
                        <option value="{{ $etudiant->id }}" name="etudiant_id">{{ $etudiant->prenom }} {{ $etudiant->nom }} &nbsp; &nbsp; {{ $etudiant->CIN }}</option>
                    @endforeach
                <!--              SEARCH SCRIPT              -->
                    <script>  new TomSelect("#select-etudiant",{
                        create: false,
                        sortField: {
                            field: "text",
                            direction: "asc"
                        }
                    });
                    </script>
                <!--              END SEARCH SCRIPT              -->
                </select>
            </div>
        </div>   
        <div class="row mb-3">
            <div class="form-group">
                <label for="formation_id">Formation</label>
                <select id="select-formation" placeholder="Selectionner une formation..." name="formation_id" >
                    <option value="{{$paiement->formation->id}}">{{ $paiement->formation->specialite }}&nbsp; &nbsp; {{ $paiement->formation->periode }}&nbsp; &nbsp;{{ $paiement->formation->prix }}</option>
                    @foreach ($formations as $formation)
                        <option value="{{ $formation->id }}" name="formation_id">{{ $formation->specialite }}&nbsp; &nbsp; {{ $formation->periode }}&nbsp; &nbsp;{{ $formation->prix }}</option>
                    @endforeach
                <!--              SEARCH SCRIPT              -->
                    <script>  new TomSelect("#select-formation",{
                        create: false,
                        sortField: {
                            field: "text",
                            direction: "asc"
                        }
                    });
                    </script>
            <!--              END SEARCH SCRIPT              -->
                </select>
            </div>
        </div>  
        <div class="row mb-3">
            <div class="col">
                <input type="date" name="datePaiement" class="form-control @error('datePiement') is-invalid @enderror" placeholder="Date paiement" value="{{$paiement->datePaiement}}"> 
                @error('dataPaiement')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div> 
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="montant" class="form-control @error('montant') is-invalid @enderror" placeholder="Montant" value="{{$paiement->montant}}" required> 
                @error('montant')
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