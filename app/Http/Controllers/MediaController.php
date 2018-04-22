<?php

namespace App\Http\Controllers;
use Auth;
use App\Media;
use App\room;
use App\comments;
use App\User;

use Illuminate\Http\Request;

class MediaController extends Controller
{

     public function __construct()
    {
         $this->middleware('auth');
    }
  public function index()
  {
      return view('upload');
  }

  public function uploadMedia()
  {
//    $newmedia = new Media
//    (
//      array(
//        'userid' =>  Auth::User()->id,
//         'userName' => Auth::User()->name,
//         'destination' => $_POST['destination'],
//         'location' => $_POST['location'],
//         'mediaURL' => $_POST['mediaurl'],
//         'mediaType' => $_POST['type'],
//         'showName' => $_POST['showname'],
//
//       )
//
//    );
//
//    $newmedia->save();

      $newRoom = new room
      (
          array(
              'rno' =>  $_POST['rno'],
              'desc' => $_POST['description'],
              'type' => $_POST['roomType'],
              'mediaURL' => $_POST['mediaurl'],
              'bookedBy' => "",
              'status' => "available",
              'price' => $_POST['roomPrice']

          )

      );

      $newRoom->save();
    return redirect('/upload')->with('status', 'Room has been Added');

  }


public function adminPanel() {
    $users = User::all();

        $email=Auth::User()->email;
        $room = room::all();
        $comments = comments::all();




        return view('admin')->with('room',$room)->with('comments',$comments)->with('email',$email)->with('users',$users);
}

    public function deleteUser($email)
    {

        $user = User::whereEmail($email)->first() ;

        $user->delete();



        $users = User::all();
        $email=Auth::User()->email;
        $media = Media::all();
        $comments = comments::all();
        return redirect('/admin')->with('status', 'The User has been deleted!')->with('media',$media)->with('comments',$comments)->with('email',$email)->with('users',$users);


    }

       public function deleteMedia($mediaid)
    {

        $mediaa = room::whereId($mediaid)->first() ;
        $commentss = comments::whereMediaid($mediaid);
        $mediaa->delete();
        $commentss->delete();


        $users = User::all();
        $email=Auth::User()->email;
        $media = Media::all();

        $comments = comments::all();
        return redirect('/admin')->with('status', 'The Media has been deleted!')->with('media',$media)->with('comments',$comments)->with('email',$email)->with('users',$users);


    }


           public function deleteComment($commentid)
    {

        $commentss = comments::whereId($commentid)->first() ;
        $commentss->delete();


        $users = User::all();
        $email=Auth::User()->email;
        $media = Media::all();
        $comments = comments::all();
        return redirect('/admin')->with('status', 'The comment has been deleted!')->with('media',$media)->with('comments',$comments)->with('email',$email)->with('users',$users);


    }

    public function showUserProfile()
    {
      return view('userProfile');
    }

      public function updateUser(){
        //$id= Auth::user() -> id ;
        Auth::user() -> name = $_POST["name"];
        Auth::user() -> city = $_POST["city"];
        Auth::user() -> country = $_POST["country"];
        Auth::user() -> bio = $_POST["bio"];
        Auth::user() -> save();
            // $user = User::whereId($id)->first() ;
            // $user->name = $_POST["name"];
            // $user->city = $_POST["city"];
            // $user->country=$_POST["country"];
            // $user->bio=$_POST["bio"];
            // $user->save();

            return view('userProfile');
   }


   public function mymedia()
   {
     $users = User::all();
     $email=Auth::User()->email;
         $media = Media::all();
         $comments = comments::all();
         return view('mymedia')->with('media',$media)->with('comments',$comments)->with('email',$email)->with('users',$users);

   }

   public function updatePost()
   {
     $users = User::all();
     $email=Auth::User()->email;
     $media = Media::all();
     $comments = comments::all();

     $mediaid = $_POST["mediaid"];
     $mediaa = Media::whereId($mediaid)->first() ;
     $mediaa->destination = $_POST["dest"];
     $mediaa->location = $_POST["loc"];
     $mediaa->save(); 



         return redirect('mymedia')->with('media',$media)->with('comments',$comments)->with('email',$email)->with('users',$users);

   }
}
