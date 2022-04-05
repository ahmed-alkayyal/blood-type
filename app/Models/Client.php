<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('name', 'email', 'd_o_b', 'blood_type_id', 'last_donation_date', 'phone', 'password', 'api_token', 'city_id');

    protected $hidden = [
        'password', 'api_token'
    ];

    public function bloodType()
    {
        return $this->belongsTo('App\Models\BloodType');
    }

    public function City()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }

    public function notification()
    {
        return $this->belongsTo('App\Models\Notification');
    }
}
