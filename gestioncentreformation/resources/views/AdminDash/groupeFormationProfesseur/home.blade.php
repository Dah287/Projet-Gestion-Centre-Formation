<!-- right content -->
    
@include ('AdminDash.includesAdmin.header')
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
@section('body')
    <!-- <div class="d-flex align-items-center justify-content-between">  -->
        <h1 class="mb-0">Liste des groupes des professeurs</h1> <br><br>
        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif
        <input id="myInput" type="text" class="form-control input-text" placeholder="Chercher un étudiant...." aria-label="Recipient's username" aria-describedby="basic-addon2"> <br><br>
            <table class="table table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>Id</th>                        
                        <th>Professeur</th>
                        <th>Groupe de formation</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    @if($groupeFormationProfesseurs->count() > 0)
                        @foreach($groupeFormationProfesseurs as $gfp)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $gfp->professeur->prenom }} {{ $gfp->professeur->nom }}</td>
                                <td class="align-middle">{{ $gfp->groupeFormation->nomGroupe }}</td>
                                <td class="align-middle">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="/groupeFormationProfesseurShow/{{$gfp->id}}" type="button" class="btn btn-secondary">Détaille</a>
                                        <form action="/groupeFormationProfesseurDestroy/{{$gfp->id}}/0" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                            @csrf
                                            <button class="btn btn-danger m-0">Supprimer</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        {{ $groupeFormationProfesseurs->links() }}
                    @else
                        <tr>
                            <td class="text-center" colspan="5">Groupe professeur introuvable</td>
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
    
@include ('AdminDash.includesAdmin.footer')