<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogExchange extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['exchange_id', 'state_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
