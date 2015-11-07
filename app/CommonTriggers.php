<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommonTriggers extends Model
{
    protected $table = 'common_triggers';

    protected $fillable = [];
    
    protected $guarded = [];
    
    protected $hidden = [];
    
    public function journals()
    {
        return $this->belongsToMany('App\Journal');
    }
}
