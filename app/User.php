<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';
    protected $fillable = [
        'email', 'password','FirstName', 'LastName','Phone','MobilePhone','OS','Admin','type','level'
    ];

    public function hasTickets()
    {
        return $this->hasMany('App\Ticket','UserEmail','Email');
    }
}
