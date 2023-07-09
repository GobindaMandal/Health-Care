<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Back\Application_Form;
use App\Models\Back\Patient_Form;
use App\Models\Back\Health_Issue;
use App\Models\Back\Daughter_Marriage;
use App\Models\Back\Meritocracy;
use App\Models\Back\Deadbody;
use App\Models\Back\Applicant_Reason;
use App\Models\Front\Help_type;
use App\Models\Front\Treatment_type;
use Auth;

class ReportController extends Controller
{
    function __construct()
    {
        $this->middleware('role_or_permission:Report access|Report create|Report edit|Report delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:Report create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:Report edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:Report delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $reports = Application_Form::all();
        $applicant_reason = Applicant_Reason::all();
        $help_type = Help_type::all();
        $treatment_type = Treatment_type::all();
        return view('reports.index', compact('reports','applicant_reason','help_type','treatment_type'));
    }

    public function filterData(Request $request){

        $reports1 = Application_Form::query();
        $reports2 = Daughter_Marriage::query();
        $reports3 = Meritocracy::query();
        $reports4 = Deadbody::query();
        $reports5 = Patient_Form::query();
        $applicant_reason = Applicant_Reason::all();
        $help_type = Help_type::all();
        $treatment_type = Treatment_type::all();

        $application_type = $request->application_type;

        if($request->has('application_type')){
            $reports1->where('applicant_reason', $request->input('application_type'));
        }

        $applications = '';
        if($request->help_type == "মেয়ের বিবাহ"){
            $applications =  $reports2->paginate();
        }
        if($request->help_type == "মেধাবৃত্তি"){
            $applications = $reports3->paginate();
        }
        if($request->help_type == "লাশ পরিবহন ও দাফন-কাফন"){
            $applications = $reports4->paginate();
        }
        $ids =[];
        if (is_array($applications) || is_object($applications)){
            foreach($applications as $application){   
                $ids[] = $application->application_id;
            }
        }
        if(!empty($ids)){
            $reports1->whereIn('id', $ids);
        }
        

        if(!empty($request->search_date)){
            $reports1->where('meeting_date', $request->input('search_date'));
        }
        
        $reports = $reports1->get();

        if($application_type == "চিকিৎসা" && $request->treatment_type == "শল্য চিকিৎসা"){
            $reports1->where('applicant_reason', $request->input('application_type'));
            return view('reports.surgery', compact('reports','reports2','application_type','applicant_reason','help_type','treatment_type'));
        }
        elseif($application_type == "চিকিৎসা" && $request->treatment_type == "জটিল, দূরারোগ্য ও ব্যয়বহুল রোগের চিকিৎসা"){
            $reports1->where('applicant_reason', $request->input('application_type'));
            return view('reports.complex_disease', compact('reports','reports2','application_type','applicant_reason','help_type','treatment_type'));
        }
        elseif($application_type == "চিকিৎসা" && $request->treatment_type == "সন্তান প্রসব"){
            return view('reports.child_birth', compact('reports','reports2','application_type','applicant_reason','help_type','treatment_type'));
        }
        elseif($application_type == "চিকিৎসা" && $request->treatment_type == "দূর্ঘটনা"){
            return view('reports.accident', compact('reports','reports2','application_type','applicant_reason','help_type','treatment_type'));
        }
        elseif($application_type == "চিকিৎসা"){
            $reports1->where('applicant_reason', $request->input('application_type'));
            return view('reports.treatment', compact('reports','reports2','application_type','applicant_reason','help_type','treatment_type'));
        }
        elseif($application_type === 'কল্যাণ ও চিত্তবিনোদন'){
            return view('reports.welfare', compact('reports','reports2','application_type','applicant_reason','help_type','treatment_type'));
        }
        else{
            $reports = Application_Form::get();
            return view('reports.index', compact('reports','application_type','applicant_reason','help_type','treatment_type'));
        }
    }

    public function reportsEdit($id)
    {   
        $reports = Application_Form::find($id);
        $reports1 = Patient_Form::where('application_id', $id)->get();
        $reports2 = Health_Issue::where('application_id', $id)->get();
        $reports3 = Health_Issue::where('application_id', $id)->first();
        $reports4 = Daughter_Marriage::where('application_id', $id)->get();
        $reports5 = Meritocracy::where('application_id', $id)->get();
        $reports6 = Deadbody::where('application_id', $id)->get();
        $reports9 = Auth::user();
        $reports10 = Application_Form::where('status', 'approved')->get();

        return view('reports.edit', compact('reports','reports1','reports2','reports3','reports4','reports5','reports6','reports9','reports10'));
    }
}
