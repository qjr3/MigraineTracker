<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $table = 'medicines';
    
    protected $fillable = 
    [
        'name', 
        'dose', 
        'description'
    ];

    protected $hidden = [];
    
    protected $guarded = [ 'id' ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function journals()
    {
        return $this->belongsToMany('App\Journal');
    }
}
