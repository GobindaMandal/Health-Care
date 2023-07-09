<?php

namespace App\Models\Back;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Health_Issue extends Model
{
    use HasFactory;

    protected $fillable = [
        "sl_no",
        "voucher_no",
        "date",
        "amount",
        "file",
        "status",
        "application_id",
    ];

    public function applicationForm()
    {
        return $this->belongsTo(Application_Form::class,'id');
    }
}
