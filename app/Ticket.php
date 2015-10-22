<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function department() {
        return $this->belongsTo('App\Department');
    }

    public function agent() {
        return $this->belongsTo('App\User', 'agent_id');
    }

    public function status() {
        return $this->belongsTo('App\Status');
    }

    public function priority() {
        return $this->belongsTo('App\Priority');
    }
}
