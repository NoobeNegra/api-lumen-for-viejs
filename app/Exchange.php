<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exchange extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['giver_id', 'receiver_id', 'start', 'end', 'state_id', 'tool_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
