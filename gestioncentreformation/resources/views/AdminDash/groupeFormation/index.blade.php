<!-- right content -->
    
@include ('AdminDash.includesAdmin.header')
@section('body')
           <!-- <div class="d-flex align-items-center justify-content-between">  -->
                <h1 class="mb-0">Liste des groupes de formation</h1>
                <a href="{{ route('groupeFormation.create') }}" class="btn btn-primary">Ajouter un groupe de formation</a>
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
                        <th>Groupe de formation</th>
                        <th>Formation</th>
                </thead>
                <tbody>
                    @if($groupeFormations->count() > 0)
                        @foreach($groupeFormations as $gf)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $gf->nomGroupe}}</td>
                                <td class="align-middle">{{ $gf->formation->specialite }}&nbsp &nbsp &nbsp{{ $gf->formation->periode }}&nbsp &nbsp &nbsp{{ $gf->formation->prix }} DH</td>
                                <td class="align-middle">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('groupeFormation.show', $gf->id) }}" type="button" class="btn btn-secondary">Détaille</a>
                                        <a href="{{ route('groupeFormation.edit', $gf->id)}}" type="button" class="btn btn-warning">Modifier</a>
                                        <form action="{{ route('groupeFormation.destroy', $gf->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger m-0">Supprimer</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        {{ $groupeFormations->links() }}
                    @else
                        <tr>
                            <td class="text-center" colspan="5">Groupe de formation introuvable</td>
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

