<html>
  <head>
      <title> Login </title>
      <link rel="stylesheet" href="/css/selection.css" />
  </head>
<body> 
    <div class="logo">
    <a class="navbar-brand" href="/skillup"> <img src="images/selection/logo.png" alt="logo" width="200px"> </a>
    </div>
  <div class="centre">  
   <div class="form-inline">     
        <a class="btn btn-default col-lg-3" title="Professeur" href="{{route('login.show','professeur')}}"> 
            <img alt="user-img" width="230px;" src="{{URL::asset('images/selection/orange teacher.jpg')}}">
        </a>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   
           
        <a class="btn btn-default col-lg-3" title="Admin" href="{{route('login.show','admin')}}">
            <img alt="user-img" width="240px;" src="{{URL::asset('images/selection/orange admin.jpg')}}">
        </a>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;          
        <a class="btn btn-default col-lg-3" title="Etudiant" href="{{route('login.show','etudiant')}}"> 
          <img alt="user-img" width="240px;" height="240px" src="{{URL::asset('images/selection/orange student.jpg')}}">
        </a>       
    </div> 
  </div>
    <!-- <div class="container">
   <h1> Bienvenue dans la page login</h1>
   <br><br>
    <a href="#"  routerLink="loginchef">
      <span>Login Chef</span>
    </a>
    <a href="#"  routerLink="loginetudiant">
      <span>Login Etudiant</span>
    </a>
  </div>-->
  </body>
</html>