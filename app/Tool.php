<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'name', 'model', 'serial_number', 'description', 'available_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
