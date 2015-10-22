<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    public function tickets() {
        return $this->hasMany('App\Ticket');
    }
}
