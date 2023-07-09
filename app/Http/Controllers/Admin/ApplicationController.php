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

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('role_or_permission:Application access|Application create|Application edit|Application delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:Application create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:Application edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:Application delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = Application_Form::where('status', '=', 'draft')
        ->orderByDesc('id')
        ->get();
        return view('front.applications.index', compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('front.applications.new');
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
    public function applicationsEdit($id)
    {   
        $applications = Application_Form::find($id);
        $ERP_number = $applications->ERP_number;
        $applications1 = Patient_Form::where('application_id', $id)->get();
        $applications2 = Health_Issue::where('application_id', $id)->get();
        $applications3 = Health_Issue::where('application_id', $id)->first();
        $applications4 = Daughter_Marriage::where('application_id', $id)->get();
        $applications5 = Meritocracy::where('application_id', $id)->get();
        $applications6 = Deadbody::where('application_id', $id)->get();
        $applications10 = Application_Form::where('status', 'approved')->where('ERP_number', $ERP_number)->get();
        
        return view('front.applications.edit', compact('applications','applications1','applications2','applications3','applications4','applications5','applications6','applications10'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function applicationsUpdate(Request $request, $id)
    {
        $applications = Application_Form::find($id);
        $applications->status = "admin_approved";
        $applications->rejected_reason = null;
        $applications->update();

        return redirect()->route("applications");
    }

    public function r_applicationsUpdate(Request $request, $id)
    {
        $applications = Application_Form::find($id);
        $applications->a_status = "admin_rejected";
        $applications->rejected_reason = $request->rejected_reason;
        $applications->update();

        return redirect()->route("applications");
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
        $reports = Application_Form::where('status', '!=', 'draft')->get();
        $applicant_reason = Applicant_Reason::all();
        $help_type = Help_type::all();
        $treatment_type = Treatment_type::all();
        return view('front.applications.reports.index', compact('reports','applicant_reason','help_type','treatment_type'));
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
        // $fiscalYearTransactions = Archive::whereBetween('office_order_date', [$startDate, $endDate])->get();

        if(!empty($request->ERP_number)){
            $reports1->where('ERP_number', $request->input('ERP_number'));
        }
        if(!empty($request->application_type)){
            $reports1->where('applicant_reason', $request->input('application_type'));
        }
        if(!empty($request->help_type)){
            $reports1->where('applicant_type', $request->input('help_type'));
        }
        if(!empty($request->year)){
            $reports1->whereBetween('created_at', [$startDate, $endDate]);
        }
        $reports = $reports1->where('status', '!=', 'draft')->get();

        return view("front.applications.reports.filtered_data", compact('reports', 'applicant_reason', 'help_type', 'treatment_type'));
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

        return view('front.applications.reports.view', compact('reports','reports1','reports2','reports3','reports4','reports5','reports6','reports9','reports10'));
    }
}
