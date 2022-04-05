<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sitting extends Model 
{

    protected $table = 'settings';
    public $timestamps = true;
    protected $fillable = array('notification_settings_text', 'about_app', 'phone', 'email', 'fb_link', 'inst_link', 'youtube_link', 'twitter_link');

}