<?php

namespace App\Models\Back;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant_Reason extends Model
{
    use HasFactory;

    protected $fillable = [
        'applicant_code',
        'applicant_reason'
    ];
}
