<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'country','state','state_slug','city','city_slug','locally','locally_slug',
    ];



}
