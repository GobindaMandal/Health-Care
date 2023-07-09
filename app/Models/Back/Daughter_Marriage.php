<?php

namespace App\Models\Back;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daughter_Marriage extends Model
{
    use HasFactory;

    protected $fillable = [
        "marriage_date",
        "kabinnama",
        "employee_details",
        "help_type",
        "amount",
        "application_id",
    ];

    public function applicationForm()
    {
        return $this->belongsTo(Application_Form::class,'id');
    }
}
