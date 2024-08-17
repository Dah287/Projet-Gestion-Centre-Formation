@include ('EtudiantDash.includesEtudiant.header')
@section('body')
<head>
   @livewireStyles
</head>


<!-- dashboard inner -->
<div class="midde_cont">
   <div class="container-fluid">
      <div class="row column_title">
         <div class="col-md-12">
            <div class="page_title">
               <h2>Dashboard</h2>
            </div>
         </div>
      </div>
       <div class="row column1">
          <div class="col-md-6 col-lg-3">
             <div class="full counter_section margin_bottom_30" style="background-color: #009688">
                <div class="couter_icon">
                   <div> 
                      <i class="fa fa-graduation-cap white_color"></i>
                   </div>
                </div>
                <div class="counter_no">
                   <div>
                      <p class="total_no">{{ $nombreFormations }}</p>
                      <p class="head_couter">Formations</p>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-md-6 col-lg-3">
             <div class="full counter_section margin_bottom_30" style="background-color: #2196f3 ">
                <div class="couter_icon">
                   <div> 
                      <i class="fa fa-user white_color"></i>
                   </div>
                </div>
                <div class="counter_no">
                   <div>
                      <p class="total_no">{{ $nombreEtudiants }}</p>
                      <p class="head_couter">Etudiants</p>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-md-6 col-lg-3">
             <div class="full counter_section margin_bottom_30" style="background-color: #e91e63 ">
                <div class="couter_icon">
                   <div> 
                      <i class="fa fa-user white_color"></i>
                   </div>
                </div>
                <div class="counter_no">
                   <div>
                      <p class="total_no">{{ $nombreProfesseurs }}</p>
                      <p class="head_couter">Professeurs</p>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-md-6 col-lg-3">
             <div class="full counter_section margin_bottom_30" style="background-color: #ff9800 ">
                <div class="couter_icon">
                   <div> 
                      <i class="fa fa-users white_color"></i>
                   </div>
                </div>
                <div class="counter_no">
                   <div>
                      <p class="total_no">{{ $nombreGroupes }}</p>
                      <p class="head_couter">Groupes</p>
                   </div>
                </div>
             </div>
          </div>
        </div>
   </div>
</div>
<!--  end dashboard inner -->
<br><br>
<!-- dashboard 4 dernières formations -->
   <div class="container-fluid">
      <div class="row column_title">
         <div class="col-md-12">
            <div class="page_title">
               <h2>Table dernières formations</h2>
            </div>
         </div>
      </div>
      <!-- row -->
      <div class="row column1">
         <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
               <div class="full price_table padding_infor_info">
                  <div class="row">
                     <!-- column formation --> 
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                           <div class="inner_table_price">
                              <div class="price_table_head blue1_bg">
                                 <h2>{{$formation4->specialite}}</h2>
                              </div>
                              <div class="price_table_inner">
                                 <div class="cont_table_price_blog">
                                    <p class="blue1_color">DH <span class="price_no">{{$formation4->prix}}</span></p>
                                 </div>
                                 <div class="price_table_head blue1_bg">
                                    <h2>{{$formation4->periode}}</h2>
                                 </div>
                              </div>
                           </div>
                        </div>
                     <!-- end column formation -->
                     <!-- column formation --> 
                     <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="inner_table_price">
                           <div class="price_table_head green_bg">
                              <h2>{{$formation3->specialite}}</h2>
                           </div>
                           <div class="price_table_inner">
                              <div class="cont_table_price_blog">
                                 <p class="green_color">DH <span class="price_no">{{$formation3->prix}}</span></p>
                              </div>
                              <div class="price_table_head green_bg">
                                 <h2>{{$formation3->periode}}</h2>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- end column formation -->
                     <!-- column formation --> 
                     <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="inner_table_price">
                           <div class="price_table_head red_bg">
                              <h2>{{$formation2->specialite}}</h2>
                           </div>
                           <div class="price_table_inner">
                              <div class="cont_table_price_blog">
                                 <p class="red_color">DH <span class="price_no">{{$formation2->prix}}</span></p>
                              </div>
                              <div class="price_table_head red_bg">
                                 <h2>{{$formation2->periode}}</h2>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- end column formation -->
                     <!-- column formation --> 
                     <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="inner_table_price">
                           <div class="price_table_head yellow_bg">
                              <h2>{{$formation1->specialite}}</h2>
                           </div>
                           <div class="price_table_inner">
                              <div class="cont_table_price_blog">
                                 <p class="yellow_color">DH <span class="price_no">{{$formation1->prix}}</span></p>
                              </div>
                              <div class="price_table_head yellow_bg">
                                 <h2>{{$formation1->periode}}</h2>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- end column formation -->
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>   
<br><br>   
<!-- end row -->

<!-- emploi de temps -->
      <div class="row column_title">
         <div class="col-md-12">
            <div class="page_title">
               <h2>Emploi de temps</h2>
            </div>
         </div>
      </div>
         <livewire:calendar />
         @livewireScripts
         @stack('scripts')

<!-- end emploi de temps -->

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
@include ('EtudiantDash.includesEtudiant.footer')