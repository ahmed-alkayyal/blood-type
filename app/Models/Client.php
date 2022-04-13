<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('name', 'email', 'd_o_b', 'blood_type_id', 'last_donation_date', 'phone', 'password', 'city_id');

    protected $hidden = [
        'password', 'api_token'
    ];

    public function bloodType()
    {
        return $this->belongsToMany('App\Models\BloodType');
    }

    public function governorate()
    {
        return $this->belongsToMany('App\Models\Governorate');
    }

    public function post()
    {
        return $this->belongsToMany('App\Models\Post');
    }

    public function notification()
    {
        return $this->belongsToMany('App\Models\Notification');
    }
}
