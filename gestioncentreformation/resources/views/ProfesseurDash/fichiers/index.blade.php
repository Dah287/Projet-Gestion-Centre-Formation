
@include ('ProfesseurDash.includesProfesseur.header') 
<!-- right content -->
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
@section('body')
    <!-- <div class="d-flex align-items-center justify-content-between">  -->
        <h1 class="mb-0">Liste des fichier</h1>
        <a href="{{ route('fichiers.create') }}" class="btn btn-primary">Ajouter un fichier</a>
    <br><br>
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
        @endif
        <input id="myInput" type="text" class="form-control input-text" placeholder="Chercher un fichier...." aria-label="Recipient's username" aria-describedby="basic-addon2">
        <br><br>    
        <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>Id</th>
                <th>Type</th>
                <th>Titre</th>
                <th>Matiere</th>
                <th>Fichier</th>
                <th>Video</th>
            </tr>
        </thead>
        <tbody id="myTable">
            @if($fichiers->count() > 0)
                @foreach($fichiers as $f)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $f->type}}</td>
                        <td class="align-middle">{{ $f->titre}}</td>
                        <td class="align-middle">{{ $f->matiere->nomMatiere}}</td>
                        <td class="align-middle"><a href="{{ url($f->fichier) }}" name="fichier" style="color:blue;" target="_blank"> {{$f->fichier}} </a></td>
                        <td class="align-middle"><a href="{{ url($f->video) }}" name="fichier" style="color:blue;" target="_blank"> {{$f->video}} </a></td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('fichiers.show', $f->id) }}" type="button" class="btn btn-secondary">Détaille</a>
                                <a href="{{ route('fichiers.edit', $f->id)}}" type="button" class="btn btn-warning">Modifier</a>
                                <form action="{{ route('fichiers.destroy', $f->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Supprimer</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                {{ $fichier->links() }}
            @else
                <tr>
                    <td class="text-center" colspan="5">Fichier introuvable</td>
                </tr>
            @endif
        </tbody>
    </table>
    <!-- Search bar -->
    <script>
        $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        });
    </script>
    <!-- End search bar --> 
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

@include ('ProfesseurDash.includesProfesseur.footer')

