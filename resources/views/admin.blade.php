@extends('layouts.app')

@section('content')


 <!-- Header -->
 <header class="masthead">
      <div class="container">
        <div class="intro-text">

          <div class="intro-heading">Admin Panel</div>
          <!-- <a class="btn btn-xl js-scroll-trigger" href="#services">Tell Me More</a> -->
        </div>
      </div>
    </header>


@if ($email == 'shamamasafdar@gmail.com')
 <!-- Portfolio Grid -->


                <div class="container">

                    <br>
            <div class="col-lg-12 text-center">
            <h2 class="section-heading">Manage Users</h2>
                                @if (session('status'))
                <div class="alert alert-success" style="text-align: center; font-weight: bolder; ">
                 {{ session('status') }}
                                    </div>
                    @endif
          </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Delete</th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach($users as $user)

                                <tr>
                                    <td>{!! $user->email !!}</td>
                                    <td>{!! $user->id !!} </td>
                                    <td>{!! $user->name !!}</td>
                                        @if ($user->email == 'shamamasafdar@gmail.com')
                                    <td> admin </td>
                                        @else
                                    <td>
<!--
                                            <form method="post">
                                                <input type="text" id="email" name="email" value="{{$user->email }}" hidden/ >
-->

<!--                                                <a type="submit" class="btn btn-danger">Delete</button>-->
                                                <a class="btn btn-danger" href="{{action('MediaController@deleteUser' , $user->email)}}">Delete</a>

<!--                                            </form>-->
                                    </td>

                                        @endif


                                </tr>

                            @endforeach

                        </tbody>

                    </table>
                    </div>



    <section class="bg-light" id="portfolio">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Manage Rooms</h2>
          </div>
        </div>
        <div class="row">

@foreach($room as $x)





                <div class="col-md-4 col-sm-6 portfolio-item">
                <a class="portfolio-link" data-toggle="modal" href="#{!! $x->id !!}">
                  <div class="portfolio-hover">
                    <div class="portfolio-hover-content">
                      <i class="fa fa-plus fa-3x"></i>
                    </div>
                  </div>
                  <img class="img-fluid" src="{!! $x->mediaURL !!}" alt="">
                </a>
                <div class="portfolio-caption">



                    <p class="">{!! $x->type !!} Room</p>
                    <p> <b>Price: </b>{!! $x->price !!}</p>
                    <p> <b>Status: </b>{!! $x->status !!}</p>
                </div>

                     <br>
        <a class="btn btn-danger" href="{{action('MediaController@deleteMedia' , $x->id)}}">Delete</a>
        {{--<a class="btn btn-primary" href="{{action('MediaController@editMedia' , $x->id)}}">Edit</a>--}}

              </div>


@endforeach


        </div>
      </div>
</section>



    <!-- Portfolio Modals -->

@foreach($room as $y)





    <div class="portfolio-modal modal fade" id="{!! $y->id !!}" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2>{!! $y->rno !!}</h2>
                  <img class="img-fluid d-block mx-auto" src="{!! $y->mediaURL !!}" alt="">

                    <ul class="list-inline">
                        <li>Date: {!! $y->created_at !!}</li>
                        <li>Destination: {!! $y->Description !!}</li>

                    </ul>
                    <form action="/updateRoom" method="post">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <input type="hidden" name="someid" id="someid"  value="{!! $y->id !!}">

                        <div class="form-group">

                            <div class="col-lg-10 col-lg-offset-1">
                                <h4>Description</h4>  <input type="text" value="{!! $y->desc !!}" class="form-control" id="description" name="description">
                                <br>
                            </div>
                        </div>

                        <div class="form-group">


                            <div class="col-lg-10 col-lg-offset-1">
                                <h4>Room Number</h4>  <input type="text" value="{!! $y->rno !!}" class="form-control" id="rno" name="rno" >
                                <br>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">


                            <div class="col-lg-10 col-lg-offset-1">
                                <h4>Room Price</h4> <input type="text" value="{!! $y->price !!}" class="form-control" id="roomPrice" name="roomPrice">
                                <br>
                            </div>
                        </div>


                        <div class="form-group">

                            <div class="col-lg-10 col-lg-offset-1">
                                <h4>Room Status: {!! $y->status !!}</h4>

                                <label class="radio-inline"><input type="radio" value="booked" id="roomStatus" name="roomStatus" checked>Booked</label>
                                <label class="radio-inline"><input type="radio" value="available" id="roomStatus" name="roomStatus">Available</label>
                                <br> <br>
                            </div>
                        </div>


                        <div class="form-group">

                            <div class="col-lg-10 col-lg-offset-1">
                                <h4>Room Type: {!! $y->type !!}</h4>
                                <label class="radio-inline"><input type="radio" value="Basic" id="roomType" name="roomType" checked>Basic</label>
                                <label class="radio-inline"><input type="radio" value="Luxury" id="roomType" name="roomType">Luxury</label>
                                                <br> <br>
                            </div>
                        </div>



                        <input type="text" class="form-control" id="mediaurl" name="mediaurl" value="{!! $y->mediaURL !!}">

{{--***********************************************************************88--}}
                        <input type="file" class="" id="upload_file" size="50" name="icon" onchange="loadFile(this);" >


                        <div id="myProgress">
                            <div id="myBar"></div>
                        </div>

                        <button type="submit" class="btn btn-xl" name="updateForm">Update</button>
                    </form>



                  {{--<form class="form-horizontal" method="post" id="formid">--}}
                    {{--<input type="hidden" name="_token" value="{!! csrf_token() !!}">--}}

                    {{--@foreach ($errors->all() as $error)--}}
                        {{--<p class="alert alert-danger">{{ $error }}</p>--}}
                    {{--@endforeach--}}

                    {{--@if (session('status'))--}}
                        {{--<div class="alert alert-success">--}}
                            {{--{{ session('status') }}--}}
                        {{--</div>--}}
                    {{--@endif--}}

                    {{--<fieldset>--}}
                        {{--<legend>Upload</legend>--}}
                        {{--<div class="form-group">--}}
                          {{--<label for="title" class="col-lg-2 control-label">Comment</label>--}}
                          {{--<div class="col-lg-10">--}}
                              {{--<textarea type="text" class="form-control" rows="5" id="comment" name="comment">--}}
                              {{--</textarea>--}}



                          {{--</div>--}}
                        {{--</div>--}}



                        {{--<div class="form-group">--}}
                        {{--<label for="title" class="col-lg-2 control-label">Name</label>--}}
                            {{--<div class="col-lg-10">--}}
                                {{--<input type="text" class="form-control" id="nameofuser" name="nameofuser"  >--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<input type="text" value="{{ $y->id }}" id="roomid" name="roomid" hidden  >--}}




                        {{--<div class="form-group">--}}
                            {{--<div class="col-lg-10 col-lg-offset-2">--}}
                                {{--<button type="submit" id="update" class="btn btn-xl" >Comment</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                    {{--</fieldset>--}}


                  {{--</form>--}}

                  <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                              <div class="page-header">
                                <h1><small class="pull-right"></small> Comments </h1>
                              </div>
                               <div class="comments-list">

                              @foreach($comments as $comment)

                                    @if($y->id == $comment->mediaid)
                                   <div class="media">
                                       <p class="pull-right"><small>{{$comment->created_at}}</small></p>
                                        <a class="media-left" href="#">
                                          <img src="http://lorempixel.com/40/40/people/1/">
                                        </a>
                                        <div class="media-body">

                                          <h4 class="media-heading user_name">{{$comment->nameofuser}}</h4>
                                          {{$comment->comment}}

                                          <p><small><a href="">Like</a> - <a href="">Share</a></small></p>

                                        <a class="btn btn-danger" href="{{action('MediaController@deleteComment' , $comment->id)}}">Delete</a>
                                        </div>
                                      </div>

                                  @endif
                              @endforeach


                               </div>



                            </div>
                        </div>
                    </div>


                  <!-- <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fa fa-times"></i>
                    Close Project</button> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

@endforeach


@else
<h1>You dont have admin rights</h1>
@endif



 <script src="https://www.gstatic.com/firebasejs/4.5.0/firebase.js"></script>
 <script>
     // Initialize Firebase
     var config = {
         apiKey: "AIzaSyA68oYQOZqVV3uTcFLunQaDZ5Ib7q2klTE",
         databaseURL: "https://iccproj-4aa94.firebaseio.com",
         projectId: "iccproj-4aa94",
         storageBucket: "gs://iccproj-4aa94.appspot.com",
     };
     firebase.initializeApp(config);
 </script>
 <script>
     function loadFile(input) {


         //Step 1 : Defining element to show the progress
         var elem = document.getElementById("myBar");
         var filetoUpload=input.files[0];
         var str =filetoUpload.name;
         var ext = str.charAt(str.length-1)


         //Step 2 : Initializing the reference of database with the filename
         var storageRef = firebase.storage().ref(filetoUpload.name);
         //Step 3 : Uploading file
         var task = storageRef.put(filetoUpload);

         //Step 4 : sata_changed Event
         // state_changed events occures when file is getting uploaded
         //(Note : when we want to show the progress what's the uploading status that time we will use this function.)
         task.on('state_changed',
             function progress(snapshot){
                 var percentage = snapshot.bytesTransferred / snapshot.totalBytes * 100;
                 //uploader.value = percentage;
                 elem.style.width = parseInt(percentage) + '%';
                 elem.innerHTML=parseInt(percentage)+'%';
             },
             function error(err){

             },
             function complete(){

                 var downloadURL = task.snapshot.downloadURL;
                 document.getElementById('mediaurl').value = downloadURL;
                 console.log("downloadURL: " +downloadURL);

             }
         );
     }


 </script>


@endsection
