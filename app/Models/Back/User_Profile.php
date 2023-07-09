<?php

namespace App\Models\Back;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'office_name',
        'ERP_number',
        'designation',
        'joining_date',
        'grade',
        'number',
        'email',
        'nid',
        'employee_bpdp_id'
    ];
}
