    
@include ('ProfesseurDash.includesProfesseur.header')  
@section('body')
<head>
    @livewireStyles
</head>

<!-- Calendrier-->

    <livewire:calendar />
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
@include ('ProfesseurDash.includesProfesseur.footer')