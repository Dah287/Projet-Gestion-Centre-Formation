<!-- right content -->
    
@include ('AdminDash.includesAdmin.header') 
@section('body')
    <h1 class="mb-0">Modifier un emploi</h1>
    <hr />
    <form action="{{ route('emploi.update') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="date" name="datePaiement" class="form-control @error('datePiement') is-invalid @enderror" placeholder="Date paiement" value="{{ $emploi->date }}" > 
                @error('dataPaiement')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div> 
        <div class="row mb-3">
            <div class="form-group">
                <label for="professeur">Professeur</label>
                  <select id="select-professeur" placeholder="Selectionner un professeur..." name="professeur_id" >
                    <option value="{{ $emploi->specialite }} ">Sélectionnez un professeur</option>
                    @foreach ($professeurs as $professeur)
                        <option value="{{ $professeur->id }}" name="professeur_id">{{ $professeur->prenom }} {{ $professeur->nom }}</option>
                    @endforeach
                <!--              SEARCH SCRIPT              -->
                    <script>  new TomSelect("#select-professeur",{
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
                <label for="salle_id">Salle</label>
                  <select id="select-salle" placeholder="Selectionner une salle..." name="salle_id" >
                    <option value="">Sélectionnez une salle</option>
                    @foreach ($salles as $salle)
                        <option value="{{ $salle->id }}" name="salle_id">{{ $salle->nomSalle }} {{ $salle->type }} </option>
                    @endforeach
                <!--              SEARCH SCRIPT              -->
                    <script>  new TomSelect("#select-salle",{
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
                <label for="groupe_formation_id">GroupeFormation</label>
                  <select id="select-groupe-formation" placeholder="Selectionner un grouge de formation..." name="groupe_formation_id" >
                    <option value="">Sélectionnez un grouge de formation</option>
                    @foreach ($groupeFormations as $groupeFormation)
                        <option value="{{ $salle->id }}" name="groupe_formation_id">{{ $groupeFormation->nomGroupe }} </option>
                    @endforeach
                <!--              SEARCH SCRIPT              -->
                    <script>  new TomSelect("#select-groupe-formation",{
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