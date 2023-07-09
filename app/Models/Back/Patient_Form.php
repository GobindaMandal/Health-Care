<?php

namespace App\Models\Back;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient_Form extends Model
{
    use HasFactory;

    protected $fillable = [
        "patient_name",
        "patient_nid",
        "patient_pic",
        "treatment_type",
        "child_birth",
        "disease_name",
        "hospital_name",
        "clearance_date",
        "clearance_hospital_name",
        "clearance",
        "doctor_recommendation",
        "PRL",
        "bd_office_order",
        "child_birthdate",
        "headofc_affidavit",
        "accident_name",
        "accident_date",
        "accident_place",
        "application_id",
    ];

    public function applicationForm()
    {
        return $this->belongsTo(Application_Form::class,'id');
    }
}
