<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

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
    
    protected $guarded = [];

    public function scopeLikeName($query, $user_id, $name)
    {
        $name = '%'.$name.'%';
        return $query->where('user_id', $user_id)->where('name', 'like', $name);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function journals()
    {
        return $this->belongsToMany('App\Journal');
    }

    public function occurrences()
    {
        return DB::table('journal_medicine')->where('medicine_id', '=', $this->id)->count();
    }
}
