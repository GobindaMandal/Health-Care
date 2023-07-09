<?php

namespace App\Models\Back;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meritocracy extends Model
{
    use HasFactory;

    protected $fillable = [
        "class",
        "exam",
        "result",
        "certificate",
        "organization_certificate",
        "marksheet",
        "picture",
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
