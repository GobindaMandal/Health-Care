<?php

namespace App\Models\Back;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deadbody extends Model
{
    use HasFactory;

    protected $fillable = [
        "death_date",
        "death_institute",
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
