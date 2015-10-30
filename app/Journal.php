<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class journal extends Model
{
    protected $table = 'journal';
    
    protected $fillable = [
        'user_id',
        'location',
        'severity',
        'weather',
        'noise_level',
        'light_level',
        'triggers_id',
        'medicines_id',
        'name',
        'description',
        'still_suffering',
        'start_time',
        'end_time',
        'has_aura',
        'aura_description',
        'has_nausea',
        'has_vomitted',
        'has_light_sensativity',
        'has_sound_sensativity',
        'has_disrupted',
        'missed_workschool',
        'missed_routines',
        'social_plans',
        'activities',
        ];

    protected $hidden = [];
}
