
@extends('layouts.app')

@section('content')


    <!-- Header -->
    <header class="masthead">
        <div class="container">
            <div class="intro-text">

                <h1> Evergreen Luxury Hotel</h1>
                <!-- <a class="btn btn-xl js-scroll-trigger" href="#services">Tell Me More</a> -->
            </div>
        </div>
    </header>



    <!-- Portfolio Grid -->
    <section class="bg-light" id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Rooms</h2>
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
                            @if ($x->status == 'available')
                                @guest
                                    <p>Please Login/Signup to book</p>
                                    @else

                                        <input type="button" class="btn btn-xl" value="Book">
                                    @endguest
                                @else
                                <p>Booked</p>

                            @endif

                        </div>
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
                                        <li>Description: {!! $y->desc !!}</li>
                                        <li>Room Number: {!! $y->rno !!}</li>


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
                                            <legend>Upload</legend>
                                            <div class="form-group">
                                                <label for="title" class="col-lg-2 control-label">Comment</label>
                                                <div class="col-lg-10">
                              <textarea type="text" class="form-control" rows="5" id="comment" name="comment">
                              </textarea>



                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <label for="title" class="col-lg-2 control-label">Name</label>
                                                <div class="col-lg-10">
                                                    <input type="text" class="form-control" id="nameofuser" name="nameofuser"  >
                                                </div>
                                            </div>

                                            <input type="text" value="{{ $y->id }}" id="roomid" name="roomid" hidden  >




                                            <div class="form-group">
                                                <div class="col-lg-10 col-lg-offset-2">
                                                    <button type="submit" id="update" class="btn btn-xl" >Comment</button>
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

    @endforeach



@endsection
