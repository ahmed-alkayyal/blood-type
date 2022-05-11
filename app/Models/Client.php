<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('name', 'email', 'd_o_b', 'blood_type_id', 'last_donation_date', 'phone', 'password', 'city_id','pin_code');

    protected $hidden = [
        'password', 'api_token'
    ];

    public function City(){
        $this->belongsTo('App\Models\City');
    }
    public function bloodType(){
        $this->belongsTo('App\Models\BloodType');
    }
    public function donation(){
        $this->belongsTo('DonationRequest');
    }

    public function bloodTypes()
    {
        return $this->belongsToMany('App\Models\BloodType');
    }

    public function governorates()
    {
        return $this->belongsToMany('App\Models\Governorate');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post');
    }

    public function notifications()
    {
        return $this->belongsToMany('App\Models\Notification');
    }
}
