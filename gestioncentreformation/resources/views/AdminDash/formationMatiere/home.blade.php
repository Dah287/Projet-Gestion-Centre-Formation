<!-- right content -->
    
@include ('AdminDash.includesAdmin.header')
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
@section('body')
    <!-- <div class="d-flex align-items-center justify-content-between">  -->
        <h1 class="mb-0">Liste des matiéres des formations</h1><br><br>
        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif
        <input id="myInput" type="text" class="form-control input-text" placeholder="Chercher une matiére d'une formation...." aria-label="Recipient's username" aria-describedby="basic-addon2"><br><br>
            <table class="table table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>Id</th>                        
                        <th>Formation</th>
                        <th>Matiére</th>
                        <th>Masse horraire</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    @if($formationMatieres->count() > 0)
                        @foreach($formationMatieres as $fm)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $fm->formation->specialite}} --- {{ $fm->formation->periode}} --- {{ $fm->formation->prix}} DH</td>
                                <td class="align-middle">{{ $fm->matiere->nomMatiere }}</td>
                                <td class="align-middle">{{ $fm->masseHorraire }} H</td>
                                <td class="align-middle">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="/formationMatiereShow/{{$fm->id}}" type="button" class="btn btn-secondary">Détaille</a>
                                        <form action="/formationMatiereDestroy/{{$fm->id}}/0" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                            @csrf
                                            <button class="btn btn-danger m-0">Supprimer</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        {{ $formationMatieres->links() }}
                    @else
                        <tr>
                            <td class="text-center" colspan="5">Matiére formation introuvable</td>
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