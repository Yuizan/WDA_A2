<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';
    protected $fillable = [
        'TicketID', 'Title', 'Description','Status','UserEmail','Tech','Priority','Escalation'
    ];

    public function comment(){
        return $this->hasOne('App\ticketComment','TicketCID','TicketID');
    }

    public function belongsToUser(){
        return $this->belongsTo('App\User','UserEmail','email');
    }
}
