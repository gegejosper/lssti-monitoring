<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role_user extends Model
{
    use HasFactory;
    protected $table = "role_user";
    
    public function role(){
        return $this->belongsTo('App\Role', 'role_id', 'id');
    }
    public function user_details(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
