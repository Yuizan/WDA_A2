<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Ticket;
use App\ticketComment;
use Validator;
use Redirect;

use Illuminate\Support\Facades\Input;

class UploadFormController extends Controller
{
    public function index(){
        return view("form");
    }
    public function store(Request $req){

        $rule=array(
            'Email'                 => 'required||Email',
            'FirstName'             => 'required',
            'LastName'              => 'required',
            'Phone'                 => 'required',
            'MobilePhone'           => 'required',
            'OS'                    => 'required',
            'Title'                 => 'required',
            'Description'           => 'max:255',
        );
        $message=array(
            'Email.required'        => 'Email is required',
            'FirstName.required'    => 'FirstName is required',
            'LastName.required'     => 'LastName is required',
            'Phone.required'        => 'Phone is required',
            'MobilePhone.required'  => 'MobilePhone is required',
            'OS.required'           => 'OS is required',
            'Title.required'        => 'Title is required',
            'Description.max'       => 'Description should less than 255 letters'
        );

        $validator = Validator::make($req->all(), $rule, $message);
        if ( $validator -> fails() ){
            return Redirect::to('/form')->withErrors($validator)->withInput();
        }else{
            $user    = new User();
            $ticket  = new Ticket();
            $comment = new TicketComment();

            $user->email         = $userEmail       = $req -> input('Email');
            $user->FirstName     = $userFirstName   = $req -> input('FirstName');
            $user->LastName      = $userLastName    = $req -> input('LastName');
            $user->Phone         = $userPhone       = $req -> input('Phone');
            $user->MobilePhone   = $userMobilePhone = $req -> input('MobilePhone');
            $user->OS            = $userOS          = $req -> input('OS');
            $user->password      = "Client";
            $user->admin         = 0;
            $user->type          = "";
            $user->level         = "1";

            $ticket->Title       = $title           = $req -> input('Title');
            $ticket->TicketID    = $ticketID        = $req -> input('Email').date('Y-m-d H:i:s').$title.rand(100000, 999999);
            $ticket->userEmail   = $userEmail;
            $ticket->Status      = "Pending";
            $ticket->Tech      = "";
            $ticket->Priority      = "";
            $ticket->Escalation      = "";

            $comment->TicketCID   = $ticketID;
            $comment->Comment    = $req -> input('Description');
            $comment->Replay     = "";

            $user_email = User::whereEmail($userEmail);
            $userSize = sizeof($user_email->get());
            if ($userSize == 0){// if record is not exist
                $user->save();//User::create($req->all());
                echo "saved";
            }else{
                $dataUpdate=array(
                    'FirstName'    => $userFirstName,
                    'LastName'     => $userLastName,
                    'Phone'        => $userPhone,
                    'MobilePhone'  => $userMobilePhone,
                    'OS'           => $userOS
                );
                $user_email->update($dataUpdate);
                echo "updated";
            };

            $comment ->save();
            $ticket  ->save();

            return Redirect::to('/form')->with('ticketSuccess','Ticket Submitted');
        }
    }
}
