@include ('EtudiantDash.includesEtudiant.header')
<!-- right content -->
@section('body')
  

  <!-- <div class="d-flex align-items-center justify-content-between">  -->
    <h1 class="mb-0">Liste des formations de l'étudiant {{$etudiant->prenom}} {{$etudiant->nom}}</h1>
    <br><br>
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
        <table class="table table-hover">
            <thead class="table-primary">
                <tr>
                    <th>N°</th>                        
                    <th>Formation</th>
                    <th>Matiére</th>
                </tr>
            </thead>
            <tbody>
                @if($etudiantFormation->count() > 0)
                    @foreach($etudiantFormation as $ef)
                        <tr>
                            <td class="align-middle">{{ $loop->iteration }}</td>
                            <td class="align-middle">{{ $ef->formation->specialite}} --- {{ $ef->formation->periode}} --- {{ $ef->formation->prix}} DH</td>
                            <td class="align-middle">
                                @foreach($matieres as $m)
                                         {{ $m->matiere->nomMatiere }}
                                        @break
                                 @endforeach
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="text-center" colspan="5">Formation introuvable</td>
                    </tr>
                @endif
            </tbody>
        </table>
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
    
@include ('EtudiantDash.includesEtudiant.footer')