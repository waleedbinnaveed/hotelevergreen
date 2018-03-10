@extends('layouts.app')

@section('content')


 <!-- Header -->
 <header class="masthead">
      <div class="container">
        <div class="intro-text">
          <div class="intro-lead-in">Inspired from travelling Enthusisats</div>
          <img class="" src="site-content/img/logo2.png" width="400" height="400" alt="">
          <div class="intro-heading">My Content</div>
          <!-- <a class="btn btn-xl js-scroll-trigger" href="#services">Tell Me More</a> -->
        </div>
      </div>
    </header>



 <!-- Portfolio Grid -->
    <section class="bg-light" id="portfolio">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Media</h2>
          </div>
        </div>
        <div class="row">

@foreach($media as $x)

          @if ($x->mediaType == '4' and $x->userid ==  Auth::user()->id )

          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#{!! $x->id !!}">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-plus fa-3x"></i>
                </div>
              </div>
<!--              <video class="img-fluid" src="{!! $x->mediaURL !!}" alt=""/>-->
                <video class="img-fluid d-block mx-auto" width="320" height="240" >
                    <source src="{!! $x->mediaURL !!}" >
                   </video>
            </a>
            <div class="portfolio-caption">
              <h3 style="color:gold;">Video</h3>
                @if ($x->showName == 'true')
              <h4>{!! $x->userName !!}</h4>
                @endif
              <p class="text-muted">{!! $x->destination !!}</p>
            </div>
          </div>
            @endif

            @if ($x->mediaType == 'g' and $x->userid== Auth::user()->id )

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
               <h3 style="color:gold;">Image</h3>

                @if($x->showName == 'true')
              <h4>{!! $x->userName !!}</h4>
                @endif
              <p class="text-muted">{!! $x->destination !!}</p>
                </div>
              </div>
            @endif

@endforeach


        </div>
      </div>
</section>



    <!-- Portfolio Modals -->

@foreach($media as $y)

          @if ($y->mediaType == '4'and $y->userid== Auth::user()->id )

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
                  <h2>{!! $y->destination !!}</h2>

                   <video class="img-fluid d-block mx-auto" controls>
                    <source src="{!! $y->mediaURL !!}" >
                   </video>

                  <ul class="list-inline">
                    <li>Date: {!! $y->created_at !!}</li>
                    <li>Destination: {!! $y->destination !!}</li>
                                          <li>Location: {!! $y->location !!}</li>

                      @if ($y->showName == 'true')
                    <li>uploaded by : {!! $y->userName !!}</li>
                      @endif
                  </ul>

                  <form class="form-horizontal" method="post" id="formid">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                    @foreach ($errors->all() as $error)
                        <p class="alert alert-danger">{{ $error }}</p>
                    @endforeach

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <fieldset>
                        <legend>Edit Post</legend>



                        <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Destination</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="dest" name="dest" value="{!! $y->destination !!}"  >
                            </div>
                        </div>

                        <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Location</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="loc" name="loc" value="{!! $y->location!!}"  >
                            </div>
                        </div>



                        <input type="text" value="{{ $y->id }}" id="mediaid" name="mediaid" hidden  >



                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <button type="submit" id="update" class="btn btn-xl" >Update</button>
                            </div>
                        </div>

                    </fieldset>


                  </form>



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
                                        </div>
                                      </div>

                                  @endif
                              @endforeach


                       </div>



                            </div>
                        </div>
                    </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

@endif
          @if ($y->mediaType == 'g' and $y->userid== Auth::user()->id )


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
                  <h2>{!! $y->destination !!}</h2>
                  <img class="img-fluid d-block mx-auto" src="{!! $y->mediaURL !!}" alt="">
                  <ul class="list-inline">
                    <li>Date: {!! $y->created_at !!}</li>
                    <li>Destination: {!! $y->destination !!}</li>
                    <li>Location: {!! $y->location !!}</li>

                     @if ($y->showName == 'true')

                    <li>uploaded by : {!! $y->userName !!}</li>
                      @endif
                  </ul>


                  <form class="form-horizontal" method="post" id="formid">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                    @foreach ($errors->all() as $error)
                        <p class="alert alert-danger">{{ $error }}</p>
                    @endforeach

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <fieldset>
                        <legend>Edit Post</legend>



                        <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Destination</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="dest" name="dest" value="{!! $y->destination !!}"  >
                            </div>
                        </div>

                        <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">Location</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="loc" name="loc" value="{!! $y->location!!}"  >
                            </div>
                        </div>



                        <input type="text" value="{{ $y->id }}" id="mediaid" name="mediaid" hidden  >



                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <button type="submit" id="update" class="btn btn-xl" >Update</button>
                            </div>
                        </div>

                    </fieldset>


                  </form>

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
        @endif
@endforeach



@endsection
