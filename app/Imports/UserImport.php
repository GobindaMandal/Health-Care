<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Back\User_Profile;
use App\Models\Frontuser;
use Carbon\Carbon;

class UserImport implements ToModel
{
    public function model(array $row){
    
        return new Frontuser([
            'name' => $row[0],
            'ERP_number' => $row[1],
            'office_name' => $row[2],
            'designation' => $row[3],
            'joining_date' => Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject((int)$row[4])),
            // 'office_order_date' => Carbon::createFromFormat('d/m/Y', $row[4])->format('Y-m-d'),
            'number' => $row[5],
            'email' => $row[6],
            'nid' => $row[7],
            'employee_bpdp_id' => $row[8],
            'password' => 123456789,
        ]);
    }
}
