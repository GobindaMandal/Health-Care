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

class ManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('role_or_permission:Managements application access|Managements application create|Managements application edit|Managements application delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:Managements application create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:Managements application edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:Managements application delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $managements_application = Application_Form::where('status', '=', 'committee_approved')
        ->orderByDesc('id')
        ->get();
        $applicant_reason = Applicant_Reason::all();
        return view('managements_application.index', compact('managements_application','applicant_reason'));
    }

    public function managementFilter(Request $request){
        
        $managements_application1 = Application_Form::query()
        ->where('status', '=', 'committee_approved')
        ->orderByDesc('id');
        
        $applicant_reasons = Applicant_Reason::all();

        $applicant_reason = $request->applicant_reason;

        if($request->has('applicant_reason')){
            $managements_application1->where('applicant_reason', $request->input('applicant_reason'));
        }
        $managements_application = $managements_application1->get();

        if($applicant_reason === 'চিকিৎসা'){
            return view('managements_application.treatment', compact('managements_application','applicant_reasons'));
        }elseif($applicant_reason === 'কল্যাণ ও চিত্তবিনোদন'){
            return view('managements_application.welfare', compact('managements_application','applicant_reasons'));
        }else{
            return redirect()->route("managementsApplication");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('managements_application.new');
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
    public function managementsApplicationEdit($id)
    {   
        $managements_application = Application_Form::find($id);
        $ERP_number = $managements_application->ERP_number;
        $managements_application1 = Patient_Form::where('application_id', $id)->get();
        $managements_application2 = Health_Issue::where('application_id', $id)->get();
        $managements_application3 = Health_Issue::where('application_id', $id)->first();
        $managements_application4 = Daughter_Marriage::where('application_id', $id)->get();
        $managements_application5 = Meritocracy::where('application_id', $id)->get();
        $managements_application6 = Deadbody::where('application_id', $id)->get();
        $managements_application9 = Auth::user();
        $managements_application10 = Application_Form::where('status', 'approved')->where('ERP_number', $ERP_number)->get();

        return view('managements_application.edit', compact('managements_application','managements_application1','managements_application2','managements_application3','managements_application4','managements_application5','managements_application6','managements_application9','managements_application10'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function managementAmount(Request $request)
    {
        $ids = $request->input('id');
        $allowedAmounts = $request->input('allowed_amount');
        $approvedAmounts = $request->input('approved_amount');

        foreach ($ids as $index => $id) {
            $managements_application = Application_Form::find($id);
            if (isset($allowedAmounts[$index])) {
                $managements_application->allowed_amount = $allowedAmounts[$index];
                $managements_application->status = "management_approved";
            }
            if (isset($approvedAmounts[$index])) {
                $managements_application->approved_amount = $approvedAmounts[$index];
                $managements_application->meeting_date = date('Y-m-d');
                $managements_application->status = "approved";
            }
            
            $managements_application->save();
        }
        return back();
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
        ->where('status', '!=', 'doctor_approved')
        ->where('status', '!=', 'doctor_rejected')
        ->where('status', '!=', 'controller_approved')
        ->where('status', '!=', 'controller_rejected')
        ->where('status', '!=', 'committee_rejected')
        ->where('status', '!=', 'committee_approved')
        ->get();
        $applicant_reason = Applicant_Reason::all();
        $help_type = Help_type::all();
        $treatment_type = Treatment_type::all();
        return view('managements_application.reports.index', compact('reports','applicant_reason','help_type','treatment_type'));
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
        ->where('status', '!=', 'doctor_approved')
        ->where('status', '!=', 'doctor_rejected')
        ->where('status', '!=', 'controller_approved')
        ->where('status', '!=', 'controller_rejected')
        ->where('status', '!=', 'committee_rejected')
        ->where('status', '!=', 'committee_approved')
        ->get();

        return view("managements_application.reports.filtered_data", compact('reports', 'applicant_reason', 'help_type', 'treatment_type'));
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

        return view('managements_application.reports.view', compact('reports','reports1','reports2','reports3','reports4','reports5','reports6','reports9','reports10'));
    }
}

