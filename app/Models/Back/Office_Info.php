<?php

namespace App\Models\Back;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office_Info extends Model
{
    use HasFactory;

    protected $fillable = [
        'office_code',
        'office_name'
    ];
}
