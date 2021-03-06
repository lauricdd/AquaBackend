<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensors extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable=[
        'type',
        'unit'
    ];

    protected $table = "sensors";
}
