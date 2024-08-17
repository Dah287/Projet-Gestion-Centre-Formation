@include ('ProfesseurDash.includesProfesseur.header')
 
@section('body')
    <h1 class="mb-0">Modifier un fichier</h1>
    <hr />
    <form action="{{ route('fichiers.update',$fichier->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col">
                <select name="type" id="type" class="form-control @error('type') is-invalid @enderror" value="{{ $fichier->type }}">
                    <option value="Cours">Cours</option>
                    <option value="Exam">Exam</option>
                    <option value="TP">TP</option>
                  </select>
                 @error('type')
                    <div class="invalid-feedback">{{ $message }}</div>
                 @enderror
            </div>
        </div>   
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Fichier</label>
                <input type="file" name="fichier"  placeholder="Fichier" class="form-control @error('fichier') is-invalid @enderror" value="{{ $fichier->fichier }}">
                @error('fichier')
                    <div class="invalid-feedback">{{ $message }} ! Ne depasse pas 5Mo !</div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Video</label>
                <input type="file" name="video" placeholder="Video" class="form-control @error('video') is-invalid @enderror" value="{{ $fichier->video }}">
                @error('video')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="titre" placeholder="Titre du fichier"class="form-control @error('titre') is-invalid @enderror" value="{{ $fichier->titre }}">
                @error('titre')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <select name="matiere_id" id="matiere_id" class="form-control @error('matiere_id') is-invalid @enderror" placeholder="Matiére" > 
                    <option value="{{ $fichier->matiere_id }}">{{ $fichier->matiere->nomMatiere }}</option>
                    @foreach ($matiere as $m)
                            <option value="{{ $m->id }}" name="matiere_id">{{ $m->nomMatiere }}</option>
                    @endforeach
                 @error('matiere_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                 @enderror                  
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

@include ('ProfesseurDash.includesProfesseur.footer')
