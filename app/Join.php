<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Join extends Model
{
    //

    public function user() {
        return $this->belongTo(User::class);
    }

    public function community() {
        return $this->belongTo(Community::class);
    }

}
