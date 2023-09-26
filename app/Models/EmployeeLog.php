<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeLog extends Model
{
    use HasFactory;
    public function employee_details(){
        return $this->belongsTo('App\Models\Employee', 'employee_id', 'id');
    }
}
