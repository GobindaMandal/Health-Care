<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Back\Archive;
use Carbon\Carbon;

class ArchiveImport implements ToModel
{
    public function model(array $row){
    
        return new Archive([
            'name_designation' => $row[0],
            'relation' => $row[1],
            'applicant_reason' => "চিকিৎসা",
            'treatment_name' => $row[2],
            'approved_amount' => $row[3],
            'office_order_date' => Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject((int)$row[4])),
            // 'office_order_date' => Carbon::createFromFormat('d/m/Y', $row[4])->format('Y-m-d'),
            'memorial_no' => $row[5],


            // 'name_designation' => $row[0],
            // 'applicant_reason' => "কল্যাণ ও চিত্তবিনোদন",
            // 'applicant_type' => "মেধাবৃত্তি",
            // 'student_name' => $row[1],
            // 'result' => $row[2],
            // 'approved_amount' => $row[3],
            // 'office_order_date' => Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject((int)$row[4])),
            // // 'office_order_date' => Carbon::createFromFormat('d/m/Y', $row[4])->format('Y-m-d'),
            // 'memorial_no' => $row[5],


            // 'name_designation' => $row[0],
            // 'applicant_reason' => "কল্যাণ ও চিত্তবিনোদন",
            // 'applicant_type' => $row[1],
            // 'approved_amount' => $row[2],
            // 'office_order_date' => Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject((int)$row[3])),
            // // 'office_order_date' => Carbon::createFromFormat('d/m/Y', $row[4])->format('Y-m-d'),
            // 'memorial_no' => $row[4],
        ]);
    }
    
}