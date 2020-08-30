<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Box extends Model
{

    protected $fillable = [
        'numero', 'latitude', 'longitude',
    ];

}
