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

class CommitteeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('role_or_permission:Committees application access|Committees application create|Committees application edit|Committees application delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:Committees application create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:Committees application edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:Committees application delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $committees_application = Application_Form::where('status', '=', 'controller_approved')
        ->orderByDesc('id')
        ->get();
        return view('committees_application.index', compact('committees_application'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('committees_application.new');
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
    public function committeesApplicationEdit($id)
    {   
        $committees_application = Application_Form::find($id);
        $ERP_number = $committees_application->ERP_number;
        $committees_application1 = Patient_Form::where('application_id', $id)->get();
        $committees_application2 = Health_Issue::where('application_id', $id)->get();
        $committees_application3 = Health_Issue::where('application_id', $id)->first();
        $committees_application4 = Daughter_Marriage::where('application_id', $id)->get();
        $committees_application5 = Meritocracy::where('application_id', $id)->get();
        $committees_application6 = Deadbody::where('application_id', $id)->get();
        $committees_application9 = Auth::user();
        $committees_application10 = Application_Form::where('status', 'approved')->where('ERP_number', $ERP_number)->get();

        return view('committees_application.edit', compact('committees_application','committees_application1','committees_application2','committees_application3','committees_application4','committees_application5','committees_application6','committees_application9','committees_application10'));
    }

    public function status($id){
        $committees_application = Health_Issue::find($id);
        if($committees_application->status==1){
            $committees_application->status="2";
        }
        else{
            $committees_application->status="1";
        }
        $committees_application->update();
        return redirect()->back()->with('message','Status Updated Successfully!')->withFragment('orders');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function committeesApplicationUpdate(Request $request, $id)
    {
        // $request->validate([
        //     'tested_amount'=>'required',
        // ]);
        $committees_application = Application_Form::find($id);
        $committees_application->claim_amount = $request->claim_amount;
        $committees_application->total_amount = $request->total_amount;
        $committees_application->status = "committee_approved";
        $committees_application->rejected_reason = null;
        $committees_application->update();

        return redirect()->route("committeesApplication");
    }

    public function r_committeesApplicationUpdate(Request $request, $id)
    {
        $committees_application = Application_Form::find($id);
        $committees_application->status = "committee_rejected";
        $committees_application->rejected_reason = $request->rejected_reason;
        $committees_application->update();

        return redirect()->route("committeesApplication");
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
        ->get();
        $applicant_reason = Applicant_Reason::all();
        $help_type = Help_type::all();
        $treatment_type = Treatment_type::all();
        return view('committees_application.reports.index', compact('reports','applicant_reason','help_type','treatment_type'));
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
        $reports = $reports1->where('status', '!=', 'draft')
        ->where('status', '!=', 'admin_approved')
        ->where('status', '!=', 'doctor_approved')
        ->where('status', '!=', 'doctor_rejected')
        ->where('status', '!=', 'controller_approved')
        ->where('status', '!=', 'controller_rejected')
        ->get();

        return view("committees_application.reports.filtered_data", compact('reports', 'applicant_reason', 'help_type', 'treatment_type'));
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

        return view('committees_application.reports.view', compact('reports','reports1','reports2','reports3','reports4','reports5','reports6','reports9','reports10'));
    }
}

