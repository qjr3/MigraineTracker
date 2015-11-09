<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    protected $table = 'journals';
   
    protected $fillable = 
    [
        'location',
        'severity',
        'sound_level',
        'light_level',
        'name',
        'description',
        'still_suffering',
        'start_time',
        'end_time',
        'weather_pressure',
        'weather_temperature',
        'has_aura',
        'aura_description',
        'has_nausea',
        'has_vomitted',
        'has_light_sensativity',
        'has_sound_sensativity',
        'has_disrupted',
        'missed_workschool',
        'missed_routines',
        'missed_social',
        'missed_personal_activity',
    ];

    protected $guarded = [];
    
    protected $hidden = [];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function medicines()
    {
        return $this->belongsToMany('App\Medicine');
    }

    public function triggers()
    {
        return $this->belongsToMany('App\Trigger');
    }
    
    public function common_triggers()
    {
        return $this->belongsToMany('App\CommonTriggers');
    }
    
    public function notes()
    {
        return $this->belongsToMany('App\Notes');
    }

    public function pain_locations()
    {
        return $this->belongsToMany('App\PainLocations');
    }
}