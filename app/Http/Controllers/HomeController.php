<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\room;
use App\comments;
use Auth;
use App\Media;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $room = room::all();
        $comments = comments::all();
        return view('welcome')->with('room',$room)->with('comments',$comments);
    }

    public function storeComment()
    {
        $room = room::all();
        $comments = comments::all();
        $newcom = new comments
        (
          array(
            'mediaid' =>  $_POST['roomid'],
             'nameofuser' => $_POST['nameofuser'],
             'userid' => 0,
             'comment' => $_POST['comment'],

           )

        );

        $newcom->save();
        return redirect('/')->with('status', 'POST COMMENT')->with('room',$room)->with('comments',$comments);
    }

    public function bookRoom()
    {
        $id = $_POST['someid'];
        $room = room::whereId($id)->first();
        $room->bookedBy=  Auth::user() -> name;
        $room->status="booked";
        $room->save();
        echo("Room Booked Successfully");
    }
}
