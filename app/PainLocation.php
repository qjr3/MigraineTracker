<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PainLocations extends Model
{
    protected $table = 'pain_locations';

    protected $fillable = [];
    
    protected $guarded = [];
    
    protected $hidden = [];
    
    public function journals()
    {
        return $this->belongsToMany('App\Journal');
    }
}