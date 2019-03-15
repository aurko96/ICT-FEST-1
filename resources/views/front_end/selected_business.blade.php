@extends('front_end.master_front_end')

@section('body')
<div class="hero-wrap js-fullheight">
      <div class="overlay"></div>
      <div id="particles-js"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-6 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">IT BUSINESS CASE COMPETITION</h1>

          </div>


        </div>
      </div>
    </div>
    
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
          <div class="col-md-6 text-center heading-section ftco-animate">
            <span class="subheading">IT BUSINESS CASE COMPETITION</span>
            <h2 class="mb-4">Rules &amp; Regulations</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
          </div>
        </div>
      </div>
    </section>


    <section>
      <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Idea Submission Form</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        
        <form method="POST" action="{{ route('business_upload') }}" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      

                      <div class="form-group">
                        <label>Team ID</label>
                          <select name="id" class="form-control" required="required">
                              <option value="">-- Please select your team ID --</option>
                              @foreach ($businesses as $business) 
                          
                              echo '<option value="{{$business->id}}">{{$business->id}}</option>';
                           
                        @endforeach
                          </select>
                      </div>

                      <div class="form-group">
                        <label>Please select a PDF file not exceeding 5 MB</label>
                          <input type="file" name="pdf" class="form-control" placeholder="" required="required">
                      </div>
                      
                    <div class="form-group">
                <button type="reset" class="btn btn-primary py-3 px-5">Reset</button>
                <button type="submit" class="btn btn-primary py-3 px-5">Submit</button>
              </div>
            </form>

      </div>
        
      </div>
    </div>
  </div>
</div>



<div class="text-center">
  <a href=""data-toggle="modal" data-target="#modalLoginForm">Submit Your Idea Here! <br><br></a>
</div>
    </section>

    <div class="x_content">         
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Team Name</th>
                          <th>Institution</th>
                          <th>Team Leader</th>
                          <th>Member - 1</th>
                          <th>Member - 2</th>
                          <th>Fees</th>
                          <th>Idea Submission</th>
                          <th>Registered At</th>
                          <th>Payment<br>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($businesses as $business) 
                          <tr>
                            <td>{{$business->id}}</td>
                            <td>{{$business->team_name}}</td>
                            <td>{{$business->institution}}</td>
                            <td>{{$business->member_1_name}}</td>
                            <td>{{$business->member_2_name}}</td>
                            <td>{{$business->member_3_name}}</td>
                            <td>{{$business->total}}</td>

                            <?php
                            
                            $sub = $business->submission;
                            if($sub=='True')
                            {
                                echo '<th><font style="color:green">'.'Successful'.'</font></th>';
                            }
                            else
                            {
                              echo '<th><font style="color:red">'.'Pending'.'</font></th>';
                            }
                            ?>


                            <td>{{$business->created_at}}</td>
                            <?php
                            
                            $paid = $business->total - ($business->paid);
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