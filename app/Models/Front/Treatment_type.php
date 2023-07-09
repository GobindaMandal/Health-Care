<?php

namespace App\Models\Front;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment_type extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'treatment_name'
    ];
}
