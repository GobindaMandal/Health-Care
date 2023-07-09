<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Frontuser;
use Illuminate\Support\Facades\Auth;
use App\Models\Back\Office_Info;

class FrontuserController extends Controller
{
    public function front_profile(){
        $user = Auth::guard('front')->user();
        $offices = Office_Info::orderBy('office_code', 'asc')->get();
        return view("back.application.user_profile", compact('user','offices'));
    }

    public function store(Request $request){
        $profile = Auth::guard('front')->user();
        $profile->name = $request->name;
        $profile->office_name = $request->office_name;
        $profile->ERP_number = $request->ERP_number;
        $profile->designation = $request->designation;
        $profile->joining_date = $request->joining_date;
        $profile->grade = $request->grade;
        $profile->number = (string)$request->number;
        $profile->email = $request->email;
        $profile->update();

        return view("back.dashboard");
    }
}
