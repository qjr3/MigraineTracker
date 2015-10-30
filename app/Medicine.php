<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $table = 'medicines';
    
    protected $fillable = ['name', 'dose', 'description'];
    
    protected $hidden = [];

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function journals()
    {
        return $this->belongsToMany('App\Journal');
    }
}
