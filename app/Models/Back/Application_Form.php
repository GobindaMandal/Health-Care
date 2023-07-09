<?php

namespace App\Models\Back;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application_Form extends Model
{
    use HasFactory;

    protected $fillable = [
        "applicant_date",
        "fiscal_year",
        "office_name",
        "employee_name",
        "ERP_number",
        "nid",
        "designation",
        "joining_date",
        "grade",
        "number",
        "email",
        "pubo",
        "applicant_reason",
        "relation_name",
        "employee_sign",
        "employee_date",
        "controller_officer_name",
        "controller_officer_designation",
        "controller_officer_date",
        "doctor_name",
        "doctor_designation",
        "doctor_date",
        "status",
        "rejected_reason",
        "claim_amount",
        "total_amount",
        "allowed_amount",
        "approved_amount",
        "meeting_date",
        "user_id",
    ];

    public function patientForm()
    {
        return $this->hasMany(Patient_Form::class,'application_id');
    }

    public function daughterMarriage()
    {
        return $this->hasMany(Daughter_Marriage::class, 'application_id');
    }

    public function meritocracy()
    {
        return $this->hasMany(Meritocracy::class,'application_id');
    }

    public function deadbody()
    {
        return $this->hasMany(Deadbody::class,'application_id');
    }

    public function healthIssue()
    {
        return $this->hasMany(Health_Issue::class,'application_id');
    }
}
