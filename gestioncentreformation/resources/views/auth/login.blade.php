<!DOCTYPE html>
<!-- Coding by CodingNepal | www.codingnepalweb.com-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Login </title>
    <link rel="stylesheet" href="/css/loginCSS.css" />
    <link rel="icon" href="/images/loginBG.jpg" type="image/jpg" />
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="/images/login.png">
        <div class="text">
          <span class="text-1">Heureux de vous revoir !</span>
          <span class="text-2">Veuillez vous connecter pour continuer.</span>
        </div>
      </div>
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
      <div>
          @if($type == 'etudiant')
              <h3 class="title">Login Etudiant</h3>
          @elseif($type == 'professeur')
              <h3 class="title">Login Professeur</h3>
          @elseif($type == 'admin')
              <h3 class="title">Login Admin</h3>
          @endif
          <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="input-boxes">
              <input type="hidden" value="{{$type}}" name="type">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="email" placeholder="Entrer votre email" name="email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Entrer votre mot de passe" name="password" required>
              </div>
              <div class="button input-box">
                <input type="submit" value="Login">
              </div>
            </div>
        </form>
            @if(Session::has('error'))
                <div class="alert alert-danger">
                  {{ Session::get('error') }}            
                </div>
            @endif
       </div>
      </div>
    </div>
    </div>
  </div>
</body>
</html>