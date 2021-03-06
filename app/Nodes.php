<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nodes extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable=[
        'name',
        'longitude',
        'latitude',
        'type' //public or private
     ];
}
