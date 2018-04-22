<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketComment extends Model
{
    protected $table = 'ticket_comments';
    protected $fillable = [
        'ticketCID', 'Comment', 'Replay'
    ];
}
