<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    protected $table = 'journals';
    
    protected $fillable = ['location', 'severity', 'weather', 'noise_level', 'light_level'];
    
    protected $hidden = [];

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function medicines()
    {
        return $this->hasMany('App\Medicine');
    }

    public function triggers()
    {
        return $this->hasMany('App\Trigger');
    }
}
