@extends('layouts.app')

@section('content')



 <!-- Header -->
 <header class="masthead">
      <div class="container">
        <div class="intro-text">
          <!-- <div class="intro-lead-in">Inspired from travelling Enthusisats</div>
          <img class="" src="site-content/img/logo2.png" width="400" height="400" alt=""> -->
          <!-- <a class="btn btn-xl js-scroll-trigger" href="#services">Tell Me More</a> -->

            <div class="col-md-8 col-md-offset-2">

        <div class="well well bs-component">




                    <fieldset>
                      <div class="intro-heading">User Profile</div>

                      <div class="col-lg-10 col-lg-offset-1">

                            <img src="https://harvardgazette.files.wordpress.com/2017/03/mark-zuckerberg-headshot-11.jpg"  alt="" class="img-rounded img-responsive" />
                        </div>
                          <div class="col-lg-10 col-lg-offset-1">
                            <br>
                          <p> <b> Name:</b>  {{Auth::user()->name}} </p>
                          </div>

                          <div class="col-lg-10 col-lg-offset-1">
                            <p> <b> Email:</b>  {{Auth::user()->email}} </p>

                          </div>

                          <div class="col-lg-10 col-lg-offset-1">
                            <p> <b> City:</b>  {{Auth::user()->city}} </p>

                          </div>

                          <div class="col-lg-10 col-lg-offset-1">
                            <p> <b> Country:</b>  {{Auth::user()->country}} </p>

                          </div>


                          <div class="col-lg-10 col-lg-offset-1">
                          <h5>   About me: </h5>
                          <p>  {{Auth::user()->bio}} </p>
                          <button class="btn btn-xl" data-toggle="modal" href="#portfolioModal6">
                            Update User Profile
                          </button>

                          </div>












                            <!-- <div class="col-lg-10 col-lg-offset-1">
                                <a  id="update" href="#edituser" class="">Save</button>
                            </div> -->


                    </fieldset>
                <hr>

                <div class="main">


                    <br>

                </div>



        </div>




            </div>


    </div>
  </div>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>


</header>



<!-- Modal 6 -->
<div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="close-modal" data-dismiss="modal">
        <div class="lr">
          <div class="rl"></div>
        </div>
      </div>


      <form class="form-horizontal" method="post" id="formid">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">



                <fieldset>
                  <h1>Update User</h1>
                  <hr>
                    <div class="form-group">
                      <div class="col-lg-4 col-lg-offset-4">
                        <h4>Name</h4>
                          <input type="text" class="form-control" id="name" value="{{Auth::user()->name}}" name="name" placeholder="">
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-lg-4 col-lg-offset-4">
                        <h4>City</h4>
                          <input type="text" class="form-control" id="city" name="city" value="{{Auth::user()->city}}" placeholder="">
                      </div>
                    </div>

                    <div class="form-group">

                      <div class="col-lg-4 col-lg-offset-4">
                        <h4>Country</h4>

                          <input type="text" class="form-control" id="country" name="country" value="{{Auth::user()->country}}">
                      </div>
                    </div>


                    <div class="form-group">
                      <div class="col-lg-4 col-lg-offset-4">
                        <h4>Bio</h4>

                          <textarea type="text" class="form-control" rows="10" id="bio" name="bio" >
                            {{Auth::user()->bio}}
                          </textarea>


                      </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-1">
                            <br>
                            <br>
                            <button type="submit" id="update" class="btn btn-xl">Update</button>
                        </div>
                    </div>
                </fieldset>
      </form>

    </div>
  </div>
</div>








@endsection
