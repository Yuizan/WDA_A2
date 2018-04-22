<?php

namespace App\Http\Controllers;
use App\User;
use App\Ticket;
use App\ticketComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Validator;
use Redirect;


class ManageController extends Controller
{

    public function index(){

        $tickets = Ticket::with('belongsToUser')->with('comment')->get();
        foreach ($tickets as $ticket) {
            //echo $ticket."</br>";
        }
       return view('manage')->with('tickets',$tickets);
    }

    public function view(){
        $username = Session::get('email');
        //echo $username;
        $tickets = Ticket::with('belongsToUser')->with('comment')->where('UserEmail','=',$username)->get();

        foreach ($tickets as $ticket)
        {
            //echo $ticket."</br>";
        }
        return view('view')->with('tickets',$tickets);
    }

    public function edit(Request $req){

        $rule    = array('Replay'     => 'max:255');
        $message = array('Replay.max' => 'Replay should less than 255 letters');
        $validator = Validator::make($req->all(), $rule, $message);
        if ( $validator -> fails() ){
            return Redirect::to('/manage')->withErrors($validator)->withInput();
        }else{
            $formID      = $req -> input('formID');
            $commentID   = $req -> input('commentID');
            $statusRadio = 'formStatus'.$formID;

            $ticketComment = ticketComment::whereTicketcid($commentID);
            $ticket        = ticket::whereTid($formID);

            $status        = $req -> input($statusRadio);
            $replay        = $req -> input('Replay');

            $ticketDataUpdate  = array('Status' => $status);
            $commentDataUpdate = array('Replay' => $replay);

            $ticket        -> update($ticketDataUpdate);
            $ticketComment -> update($commentDataUpdate);
            return Redirect::to('/manage')->with('replaySuccess','Replay Successfully');
        }
    }
}
