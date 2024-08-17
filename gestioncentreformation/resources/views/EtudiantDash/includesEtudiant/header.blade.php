<!DOCTYPE html>
<html lang="en">
<head>
<!-- basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- mobile metas -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<!-- site metas -->
<title>Gestion centre de formation</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">
<!-- site icon -->
<link rel="icon" href="images/fevicon.png" type="image/png" />
<!-- bootstrap css -->
<link rel="stylesheet" href="/css/bootstrap.min.css" />
<!-- site css -->
<link rel="stylesheet" href="/style.css" />
<!-- responsive css -->
<link rel="stylesheet" href="/css/responsive.css" />
<!-- color css -->
<link rel="stylesheet" href="/css/colors.css" />
<!-- select bootstrap -->
<link rel="stylesheet" href="/css/bootstrap-select.css" />
<!-- scrollbar css -->
<link rel="stylesheet" href="/css/perfect-scrollbar.css" />
<!-- custom css -->
<link rel="stylesheet" href="/css/custom.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
@yield('head-scripts')
</head>
<body class="dashboard dashboard_1">
<div class="full_container">
<div class="inner_container">
<!-- Sidebar  -->
<nav id="sidebar">
   <div class="sidebar_blog_1">
      <div class="sidebar-header">
         <!-- <div class="logo_section">
            <a href="#"><img class="logo_icon img-responsive" src="images/logo/logo.png" alt="#" /></a>
         </div> -->
      </div>
   <div class="sidebar_user_info">
      <div class="icon_setting"></div>
      <div class="user_profle_side">
         <div class="user_img"><img class="img-responsive" src="/images/student white.png" alt="#" /></div>
         <div class="user_info">
            <h6>{{$etudiant->prenom}} {{$etudiant->nom}}</h6>
            <p><span class="online_animation"></span>En ligne</p>
         </div>
      </div>
   </div>
</div>
<div class="sidebar_blog_2">
   <h4>Bienvenue !</h4>
   <ul class="list-unstyled components">
      <li><a href="/indexEtudiant"><i class="fa fa-home orange_color"></i> <span>Dashboard</span></a></li>
      <li>
         <a href="../Etudiantformation"><i class="fa fa-graduation-cap yellow_color"></i> <span>Formation</span></a>
      </li>
      <li class="active">
         <a href="../Etudiantemploi" ><i class="fa fa-calendar red_color"></i> <span>Emploi de temps</span></a>
      </li>
      <li>
         <a href="../Etudiantfichier" ><i class="fa fa-book purple_color"></i> <span>Cours et Exams</span></a>
      </li>
      <li>
         <a href="../Etudiantpaiement" ><i class="fa fa-money	green_color"></i> <span>Paiement</span></a>
      </li>
      <li><a href="/skillup"><i class="fa fa-globe blue2_color"></i><span>Site web</span></a></li>
   </ul>
</div>
</nav>
<!-- end sidebar -->
