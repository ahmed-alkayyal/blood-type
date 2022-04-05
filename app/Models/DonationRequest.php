<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model 
{

    protected $table = 'donation_request';
    public $timestamps = true;
    protected $fillable = array('patient_name', 'patient_phone', 'hospital_name', 'hospital_address', 'patient_age', 'bags_num', 'city_id', 'blood_type_id', 'client_id', 'details', 'latitude', 'longitude');

    public function notification_donation()
    {
        return $this->hasOne('App\Models\Notification');
    }

}