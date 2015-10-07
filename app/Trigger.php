<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trigger extends Model
{
    protected $table = 'triggers';
    
    protected $fillable = ['user_id', 'name', 'details', 'user_name', 'first_name', 'last_name', 'bio', 'date_of_birth', 'gender', 'email'];
    
    protected $hidden = [];
}
