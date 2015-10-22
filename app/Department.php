<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function users() {
        return $this->belongsToMany('App\User');
    }

    public function tickets() {
        return $this->hasMany('App\Ticket');
    }
}
