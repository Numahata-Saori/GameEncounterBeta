<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    //
    protected $fillable = [
        'name',
        'console_id',
        'genre_id',
        'explanation'
    ];

    public function joins() {
        return $this->hasMany('App\Join');
    }
}
