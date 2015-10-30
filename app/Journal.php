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
        return $this->belongsTo('App\User', 'user_id');
    }

    public function medicines()
    {
        return $this->belongsToMany('App\Medicine');
    }

    public function triggers()
    {
        return $this->belongsToMany('App\Trigger');
    }
}
