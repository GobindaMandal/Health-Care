<?php

namespace App\Models\Back;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    use HasFactory;

    protected $fillable = [
        "name_designation",
        "ERP_number",
        "relation",
        "applicant_reason",
        "applicant_type",
        "treatment_name",
        "student_name",
        "result",
        "approved_amount",
        "office_order_date",
        "memorial_no"
    ];
}
