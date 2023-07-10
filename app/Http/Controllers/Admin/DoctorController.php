<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('role_or_permission:Doctors application access|Doctors application create|Doctors application edit|Doctors application delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:Doctors application create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:Doctors application edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:Doctors application delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors_application = Application_Form::where('status', '=', 'admin_approved')
        ->orderByDesc('id')
        ->get();
        return view('doctors_application.index', compact('doctors_application'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctors_application.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function Store(Request $request)
    {
        $data= $request->all();
        $data['user_id'] = Auth::user()->id;
        $Post = Post::create($data);
        return redirect()->back()->withSuccess('Post created !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function doctorsApplicationEdit($id)
    {   
        $doctors_application = Application_Form::find($id);
        $ERP_number = $doctors_application->ERP_number;
        $doctors_application1 = Patient_Form::where('application_id', $id)->get();
        $doctors_application2 = Health_Issue::where('application_id', $id)->get();
        $doctors_application3 = Health_Issue::where('application_id', $id)->first();
        $doctors_application4 = Daughter_Marriage::where('application_id', $id)->get();
        $doctors_application5 = Meritocracy::where('application_id', $id)->get();
        $doctors_application6 = Deadbody::where('application_id', $id)->get();
        $doctors_application9 = Auth::user();
        $doctors_application10 = Application_Form::where('status', 'approved')->where('ERP_number', $ERP_number)->get();
        return view('doctors_application.edit', compact('doctors_application','doctors_application1','doctors_application2','doctors_application3','doctors_application4','doctors_application5','doctors_application6','doctors_application9','doctors_application10'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function doctorsApplicationUpdate(Request $request, $id)
    {
        $doctors_application = Application_Form::find($id);
        $doctors_application->doctor_name = $request->doctor_name;
        $doctors_application->doctor_designation = $request->doctor_designation;
        $doctors_application->doctor_date = $request->doctor_date;
        $doctors_application->status = "doctor_approved";
        $doctors_application->rejected_reason = null;
        $doctors_application->update();

        return redirect()->route("doctorsApplication");
    }

    public function r_doctorsApplicationUpdate(Request $request, $id)
    {
        $doctors_application = Application_Form::find($id);
        $doctors_application->doctor_name = $request->doctor_name;
        $doctors_application->doctor_designation = $request->doctor_designation;
        $doctors_application->doctor_date = $request->doctor_date;
        $doctors_application->status = "doctor_rejected";
        $doctors_application->rejected_reason = $request->rejected_reason;
        $doctors_application->update();

        return redirect()->route("doctorsApplication");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient_Form $application)
    {
        $application->delete();
        return redirect()->back()->withSuccess('Application deleted !!!');
    }

    public function report()
    {
        $reports = Application_Form::where('status', '!=', 'draft')
        ->where('status', '!=', 'admin_approved')
        ->get();
        $applicant_reason = Applicant_Reason::all();
        $help_type = Help_type::all();
        $treatment_type = Treatment_type::all();
        return view('doctors_application.reports.index', compact('reports','applicant_reason','help_type','treatment_type'));
    }

    public function filterData(Request $request){

        $reports1 = Application_Form::query();
        $applicant_reason = Applicant_Reason::all();
        $help_type = Help_type::all();
        $treatment_type = Treatment_type::all();

        if($request->year == null){
            $currentYear = date('Y');
            $startYear = $currentYear - 1;
            $endYear = $currentYear;
            $fiscalYear = $startYear . '-' . $endYear;
            $year = $fiscalYear;
        } else{
            $year = $request->input('year');
        }
        $yearRange = explode('-', $year);
        $startDate = $yearRange[0].'-07-01';
        $endDate = $yearRange[1].'-06-30';

        if(!empty($request->ERP_number)){
            $reports1->where('ERP_number', $request->input('ERP_number'));
        }
        if(!empty($request->applicant_reason)){
            $reports1->where('applicant_reason', $request->input('applicant_reason'));
        }
        if(!empty($request->help_type)){
            $reports1->where('application_type', $request->input('help_type'));
        }
        if(!empty($request->treatment_type)){
            $reports1->where('application_type', $request->input('treatment_type'));
        }
        if(!empty($request->year)){
            $reports1->whereBetween('created_at', [$startDate, $endDate]);
        }
        
        $reports = $reports1->where('status', '!=', 'draft')
        ->where('status', '!=', 'admin_approved')
        ->get();

        return view("doctors_application.reports.filtered_data", compact('reports', 'applicant_reason', 'help_type', 'treatment_type'));
    }

    public function reportView($id)
    {   
        $reports = Application_Form::find($id);
        $ERP_number = $reports->ERP_number;
        $reports1 = Patient_Form::where('application_id', $id)->get();
        $reports2 = Health_Issue::where('application_id', $id)->get();
        $reports3 = Health_Issue::where('application_id', $id)->first();
        $reports4 = Daughter_Marriage::where('application_id', $id)->get();
        $reports5 = Meritocracy::where('application_id', $id)->get();
        $reports6 = Deadbody::where('application_id', $id)->get();
        $reports9 = Auth::user();
        $reports10 = Application_Form::where('status', 'approved')->where('ERP_number', $ERP_number)->get();

        return view('doctors_application.reports.view', compact('reports','reports1','reports2','reports3','reports4','reports5','reports6','reports9','reports10'));
    }
}

