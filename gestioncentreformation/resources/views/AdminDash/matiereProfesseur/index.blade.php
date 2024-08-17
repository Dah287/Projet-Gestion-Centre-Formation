<!-- right content -->
    
@include ('AdminDash.includesAdmin.header')
@section('body')
    <!-- <div class="d-flex align-items-center justify-content-between">  -->
        <h1 class="mb-0">Liste des matiéres des professeurs</h1>
        <a href="/matiereProfesseurCreate/{{$id}}" class="btn btn-primary">Ajouter matiére professeur</a>
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
                        <th>Professeur</th>
                        <th>Matiére</th>
                    </tr>
                </thead>
                <tbody>
                    @if($matiereProfesseur->count() > 0)
                        @foreach($matiereProfesseur as $mf)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $mf->professeur->prenom }} {{ $mf->professeur->nom }}</td>
                                <td class="align-middle">{{ $mf->matiere->nomMatiere }}</td>
                                <td class="align-middle">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="/matiereProfesseurShow/{{$mf->id}}" type="button" class="btn btn-secondary">Détaille</a>
                                        <a href="/matiereProfesseurUpdate/{{$mf->id}}" type="button" class="btn btn-warning">Modifier</a>
                                        <form action="/matiereProfesseurDestroy/{{$mf->id}}/1" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                            @csrf
                                            <button class="btn btn-danger m-0">Supprimer</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="text-center" colspan="5">Matiére professeur introuvable</td>
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
    
@include ('AdminDash.includesAdmin.footer')