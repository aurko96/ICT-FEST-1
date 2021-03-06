@extends('front_end.master_front_end')

@section('body')
<div class="hero-wrap js-fullheight">
      <div class="overlay"></div>
      <div id="particles-js"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-6 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">RAINBOW SIX SIEGE</h1>
          </div>
        </div>
      </div>
    </div>
    
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
          <div class="col-md-6 text-center heading-section ftco-animate">
            <span class="subheading">RAINBOW SIX SIEGE</span>
            <h2 class="mb-4">Selected Participants of Rainbow Six Siege</h2>
            <p> </p>
          </div>
        </div>
      </div>
    </section>

    <div class="x_content">         
                    <table id="datatable-responsive" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Team Name</th>
                          <th>Team Leader</th>
                          <th>Member - 1</th>
                          <th>Member - 2</th>
                          <th>Member - 3</th>
                          <th>Member - 4</th>
                          <th>Member - 5</th>
                          <th>Fees</th>
                          <th>Registered At</th>
                          <th>Payment<br>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($sieges as $siege) 
                          <tr>
                            <td>{{$siege->id}}</td>
                            <td>{{$siege->team_name}}</td>
                            <td>{{$siege->member_1_name}}</td>
                            <td>{{$siege->member_2_name}}</td>
                            <td>{{$siege->member_3_name}}</td>
                            <td>{{$siege->member_4_name}}</td>
                            <td>{{$siege->member_5_name}}</td>
                            <td>{{$siege->member_6_name}}</td>
                            <td>{{$siege->total}}</td>
                            <td>{{$siege->created_at}}</td>
                            <?php
                            
                            $paid = $siege->total - ($siege->paid);
                            if($paid==0)
                            {
                                echo '<th><font style="color:green">'.'Successful'.'</font></th>';
                            }
                            else
                            {
                              echo '<th><font style="color:red">'.'Pending'.'</font></th>';
                            }
                            ?>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
          
          
  </div>

@endsection