<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trigger extends Model
{
    protected $table = 'triggers';
    
    protected $fillable = ['name', 'description'];
    
    protected $hidden = [];

    public function journals()
    {
        return $this->belongsToMany('App\Journal');
    }
}
