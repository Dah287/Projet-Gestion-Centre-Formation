@include ('AdminDash.includesAdmin.header') 
@section('body')
         <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
               <div class="heading1 margin_0">
                  <h2>Votre profile</h2>
               </div>
            </div>
            <div class="full price_table padding_infor_info">
               <div class="row">
                  <!-- user profile section --> 
                  <!-- profile image -->
                  <div class="col-lg-12">
                     <div class="full dis_flex center_text">
                        <div class="profile_img"><img width="180" class="rounded-circle" src="images/selection/admin.png" alt="#" /></div>
                        <div class="profile_contant">
                           <div class="contact_inner">
                              <h3>{{$admin->prenom}} {{$admin->nom}}</h3>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
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