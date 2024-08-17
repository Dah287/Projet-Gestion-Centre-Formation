@include ('AdminDash.includesAdmin.header') 

@section('body')
    <h1 class="mb-0">Détail de paiement de {{$etudiant->prenom}} {{$etudiant->nom}}</h1>
    <hr />
    <table class="table table-hover" id="table1">
      <thead class="table-primary">
          <tr>
              <th>Formation</th>
              <th>Date de paiement</th>
              <th>Montant</th>
              <th>Reste</th>
          </tr>
      </thead>
      <tbody id="myTable">
          @if($paiements->count() > 0)
              @foreach($paiements as $p)
                  <tr>
                      <td class="align-middle">{{ $p->formation->specialite}} &nbsp;{{ $p->formation->periode}} &nbsp;{{ $p->formation->prix}} DH</td>
                      <td class="align-middle">{{ $p->datePaiement }}</td>
                      <td class="align-middle">{{ $p->montant }} DH</td>
                      <td class="align-middle">{{ $p->reste }} DH</td>
                  </tr>
              @endforeach
          @else
              <tr>
                  <td class="text-center" colspan="5">Paiement d'étudiant introuvable</td>
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