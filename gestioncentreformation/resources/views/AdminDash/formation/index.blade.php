
<!-- right content -->

@include ('AdminDash.includesAdmin.header')
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

    @section('body')
        <!-- <div class="d-flex align-items-center justify-content-between">  -->
            <h1 class="mb-0">Liste des formations</h1>
            <a href="{{ route('formation.create') }}" class="btn btn-primary">Ajouter une formation</a>
        <br><br>
        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif
        <table class="table table-hover">
            <thead class="table-primary">
                <tr>
                    <th>Id</th>
                    <th>Spécialité</th>
                    <th>Période</th>
                    <th>Prix</th>
                </tr>
            </thead>
            <tbody id="myTable">
                @if($formations->count() > 0)
                    @foreach($formations as $pf)
                        <tr>
                            <td class="align-middle">{{ $loop->iteration }}</td>
                            <td class="align-middle">{{ $pf->specialite }}</td>
                            <td class="align-middle">{{ $pf->periode }}</td>
                            <td class="align-middle">{{ $pf->prix }} DH</td>
                            <td class="align-middle">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('formation.show', $pf->id) }}" type="button" class="btn btn-secondary">Détaille</a>
                                    <a href="{{ route('formation.edit', $pf->id)}}" type="button" class="btn btn-warning">Modifier</a>
                                    <a href="formationMatiereCreate/{{$pf->id}}" type="button" class="btn btn-info">Ajouter une matiére</a>
                                    <form action="{{ route('formation.destroy', $pf->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger m-0">Supprimer</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    {{ $formations->links() }}
                @else
                    <tr>
                        <td class="text-center" colspan="5">Formation introuvable</td>
                    </tr>
                @endif
                <input id="myInput" type="text" class="form-control input-text" placeholder="Chercher une formation...." aria-label="Recipient's username" aria-describedby="basic-addon2">
                <br><br>
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
