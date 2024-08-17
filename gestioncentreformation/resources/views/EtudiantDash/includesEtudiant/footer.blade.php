 <!-- topbar -->
 <style>
   .black-color{
      color: black;
   }
   #logout{
      color: black;
   }
</style>
 <div class="topbar">
   <nav class="navbar navbar-expand-lg navbar-light">
      <div class="full">
         <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
         <div class="logo_section">
            <a href="/indexEtudiant"><img class="img-responsive" src="/images/logo/logoDash.png" alt="#" /></a>
         </div>
         <div class="right_topbar">
            <div class="icon_info">
               <ul class="user_profile_dd">
                  <li>
                     <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src="/images/student white.png" alt="#" /><span class="name_user">Etudiant</span></a>
                     <div class="dropdown-menu">
                        <a class="dropdown-item" href="../Etudiantprofile"><i class="fa fa-user"></i> &nbsp;<span>Mon profile</span> </i></a>

                        <form method="POST" action="{{ route('login.logout') }}">
                           @csrf
                           <button class="dropdown-item" type="submit"><i class="fa fa-sign-out black-color"></i> &nbsp;<span id="logout">Logout</span></button>
                        </form> 
                        
                        

                     </div>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </nav>
</div>
 <!-- end topbar -->
    <!-- footer -->
    <div class="container-fluid">
      <div class="footer">

      </div>
   </div>
   <!-- end dashboard inner -->
</div>
</div>
     <!-- jQuery -->
     <script src="/js/jquery.min.js"></script>
     <script src="/js/popper.min.js"></script>
     <script src="/js/bootstrap.min.js"></script>
     <!-- wow animation -->
     <script src="/js/animate.js"></script>
     <!-- select country -->
     <script src="/js/bootstrap-select.js"></script>
     <!-- owl carousel -->
     <script src="/js/owl.carousel.js"></script> 
     <!-- chart js -->
     <script src="/js/Chart.min.js"></script>
     <script src="/js/Chart.bundle.min.js"></script>
     <script src="/js/utils.js"></script>
     <script src="/js/analyser.js"></script>
     <!-- nice scrollbar -->
     <script src="/js/perfect-scrollbar.min.js"></script>
     <script>
     var ps = new PerfectScrollbar('#sidebar');
     </script>
     <!-- custom js -->
     <script src="/js/custom.js"></script>
     <script src="/js/chart_custom_style1.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>