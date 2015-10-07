<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class journal extends Model
{
    protected $table = 'journal';
    
    protected $fillable = ['user_id', 'location', 'severity', 'weatehr', 'noise_level', 'light_level'];
    
    protected $hidden = [];
}
