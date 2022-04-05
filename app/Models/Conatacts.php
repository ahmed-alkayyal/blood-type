<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conatacts extends Model 
{

    protected $table = 'conatacts';
    public $timestamps = true;
    protected $fillable = array('name', 'email', 'phone', 'subject', 'message');

}