@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> -->

 <!-- Header -->
 <header class="masthead">
      <div class="container">
        <div class="intro-text">
          <!-- <div class="intro-lead-in">Inspired from travelling Enthusisats</div>
          <img class="" src="site-content/img/logo2.png" width="400" height="400" alt=""> -->
          <div class="intro-heading">WELCOME</div> 
          <div class="intro-lead-in">{{ Auth::user()->name }}</div>
          <!-- <a class="btn btn-xl js-scroll-trigger" href="#services">Tell Me More</a> -->
        </div>
      </div>
    </header
@endsection
