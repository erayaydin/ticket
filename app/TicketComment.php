<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketComment extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function files() {
        return $this->belongsToMany('App\File');
    }
}
