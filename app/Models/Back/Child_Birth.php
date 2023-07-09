<?php

namespace App\Models\Back;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child_Birth extends Model
{
    use HasFactory;

    protected $fillable = [
        'child_birth_sequence'
    ];
}
