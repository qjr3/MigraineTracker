<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $table = 'medicines';
    
    protected $fillable = ['user_id', 'name', 'dose', 'prescribed_by', 'prescribed_on'];
    
    protected $hidden = [];
}
