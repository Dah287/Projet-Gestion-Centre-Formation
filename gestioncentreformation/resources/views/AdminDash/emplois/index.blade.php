    
@include ('AdminDash.includesAdmin.header') 
@section('body')
<head>
    @livewireStyles
</head>
 
<div class="btn-group" role="group" aria-label="Basic example">
    <a href="{{ route('emploi.create') }}" class="btn btn-primary">Ajouter une session</a>
</div>
 
<br><br>
<!-- Calendrier-->
<div>
    <livewire:calendar />
</div>
    @livewireScripts
    @stack('scripts')

<!-- End Calendrier-->

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
