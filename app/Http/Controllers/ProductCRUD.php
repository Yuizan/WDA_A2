<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;


use App\User;
use App\Ticket;
use App\TicketComment;


class ProductCRUD extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tickets = Ticket::with('belongsToUser')->with('comment')->get();
        return $tickets;
    }

    /**
     * Display a listing of the unassigned Tickets.
     *
     */
    public function unassignTicket(Request $request){
        $tickets = Ticket::with('belongsToUser')->with('comment')->where('Status','<>',"resolved")->get();
        return $tickets;
    }

    /**
     * Display a listing of the unassigned Tickets.
     *
     */
    public function assignTicket(Request $request){

        $name = $request->name;
        $tickets = Ticket::with('belongsToUser')->with('comment')->
        where("Tech",'=',$name)->where('Status','<>',"resolved")->orderBy('created_at')->get();
        return $tickets;
    }

    /**
     * Display a listing of the User.
     *
     */
    public function allUser(Request $request){
        $user = User::all();
        return $user;
    }

    /**
     * Display listing of the Techs
     *
     */
    public function allTech(Request $request){
        $user = User::wheretype("Tech")->get();
        return $user;
    }

    /**
     * Save Techs
     *
     */
    public function storeTech(Request $req)
    {
        try {
            $users = new User;

            $users->email       = $userEmail = $req -> email;
            $users->password    = "";
            $users->FirstName   = $req -> name;
            $users->LastName    = "";
            $users->Phone       = "";
            $users->MobilePhone = "";
            $users->OS          = "";
            $users->Admin       = 0;
            $users->type        = "Tech";
            $users->level       = "1";


            $user_email = User::whereEmail($userEmail);
            $userSize = sizeof($user_email->get());
            if ($userSize == 0){
                $users->save();
                return array("status" => "SUCCESS");
            }else{
                $dataUpdate=array(
                    'type'    => "Tech",
                );
                $user_email->update($dataUpdate);
                return array("status" => "SUCCESS");
            }
        } catch(Exception $e) {
            return array("status" => "exception");
        }

        return array("status" => "Failed");
    }

    /**
     * Assign Ticket
     *
     */
    public function assignPendingTicket(Request $req)
    {
        $ticket = Ticket::whereTid($req->ticketID);

        $dataUpdate=array(
            'Tech'       => $req->tech,
            'Priority'   => $req->pri,
            'Escalation' => $req->esca,
        );

        $save = $ticket->update($dataUpdate);

        if ($save){
            return array("status" => "SUCCESS");
        }
        return array("status" => "FAILED");
    }

    /**
     * Tech Assign Ticket
     *
     */
    public function techAssignTicket(Request $req)
    {
        $tid = $req->ticketID;
        $ticket = Ticket::where("TicketID",$tid);
        $comment = TicketComment::where("TicketCID",$tid);

        $ticketData    =  array(
            'Status'   => $req->status,
        );
        $commentData   =  array(
            'Comment'  => $req->con,
        );

        $ticketSave = $ticket->update($ticketData);
        $commentSave = $comment->update($commentData);

        if ($ticketSave and $commentSave){
            return array("status" => "SUCCESS");
        }
        return array("status" => "FAILED");
    }

}
