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
            <div class="user_img"><img class="img-responsive" src="/images/admin white.png" alt="#" /></div>
            <div class="user_info">
               <h6>Admin</h6>
               <p><span class="online_animation"></span>En ligne</p>
            </div>
         </div>
      </div>
   </div>
   <div class="sidebar_blog_2">
      <h4>Bienvenue !</h4>
      <ul class="list-unstyled components">
         <li><a href="/indexAdmin"><i class="fa fa-home orange_color"></i> <span>Dashboard</span></a></li>
         <li class="active">
            <a href="#etudiant" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-user yellow_color"></i> <span>Etudiant</span></a>
            <ul class="collapse list-unstyled" id="etudiant">
               <li><a href="../etudiant">> <span>Gestion des étudiants</span></a></li>
               <li><a href="../etudiantFormationHome">> <span>Gestion formations d'étudiant</span></a></li>
               <li><a href="../etudiantGroupeFormationHome">> <span>Gestion groupes d'étudiant</span></a></li>
            </ul>
         </li>
         <li>
            <a href="#professeur" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-user purple_color"></i> <span>Professeur</span></a>
            <ul class="collapse list-unstyled" id="professeur">
               <li><a href="../professeur">> <span>Gestion des professeurs</span></a></li>
               <li><a href="../matiereProfesseurHome">> <span>Gestion matiéres professeur</span></a></li>
               <li><a href="../groupeFormationProfesseurHome">> <span>Gestion groupes professeur</span></a></li>
            </ul>
         </li>
         <li class="active">
            <a href="#formation" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-graduation-cap green_color"></i> <span>formation</span></a>
            <ul class="collapse list-unstyled" id="formation">
               <li><a href="../formation">> <span>Gestion des formations</span></a></li>
               <li><a href="../matiere">> <span>Gestion des matiéres</span></a></li>
               <li><a href="../formationMatiereHome">> <span>Gestion matiéres formation</span></a></li>
            </ul>
         </li>
         <li>
            <a href="#salle" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-institution blue2_color"></i> <span>Salle</span></a>
            <ul class="collapse list-unstyled" id="salle">
               <li><a href="../salle">> <span>Gestion des salles</span></a></li>
               <li><a href="../salle/create">> <span>Ajouter une salle</span></a></li>
            </ul>
         </li>
         <li>
            <a href="#groupe" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-users yellow_color"></i> <span>Groupe Etudiants</span></a>
            <ul class="collapse list-unstyled" id="groupe">
               <li><a href="../groupeFormation">> <span>Gestion des groupes</span></a></li>
               <li><a href="../groupeFormation/create">> <span>Ajouter un groupe</span></a></li>
            </ul>
         </li>
         <li>
            <a href="#emploiTemps" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-calendar red_color"></i> <span>Emploi de temps</span></a>
            <ul class="collapse list-unstyled" id="emploiTemps">
               <li><a href="../Emploi">> <span>Gestion des emploi de temps</span></a></li>
               <li><a href="../createEmploi">> <span>Ajouter un emploi de temps</span></a></li>
            </ul>
         </li>
         <li>
            <a href="#paiement" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-money	green_color"></i> <span>Paiement</span></a>
            <ul class="collapse list-unstyled" id="paiement">
               <li><a href="../paiement">> <span>Gestion des paiements</span></a></li>
               <li><a href="../paiement/create">> <span>Ajouter un paiement</span></a></li>
            </ul>
         </li>
      <li><a href="/skillup"><i class="fa fa-globe blue2_color"></i><span>Notre site web</span></a></li>
      </ul>
   </div>
</nav>
<!-- end sidebar -->
