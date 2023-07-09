<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Back\Application_Form;
use App\Models\Back\Applicant_Reason;
use App\Models\Front\Help_type;
use App\Models\Front\Treatment_type;
use App\Models\Back\Archive;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ArchiveImport;

class ArchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('role_or_permission:Archive access|Archive create|Archive edit|Archive delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:Archive create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:Archive edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:Archive delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = Application_Form::all();
        $applicant_reason = Applicant_Reason::all();
        $help_type = Help_type::all();
        $treatment_type = Treatment_type::all();
        $archives = Archive::all();

        return view('archives.index', compact('applications','applicant_reason','help_type','treatment_type', 'archives'));
    }

    public function archiveFilter(Request $request){
        // dd($request);
        $archives1 = Archive::query();
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
            $archives1->where('ERP_number', $request->input('ERP_number'));
        }
        if(!empty($request->application_type)){
            $archives1->where('applicant_reason', $request->input('application_type'));
        }
        if(!empty($request->help_type)){
            $archives1->where('applicant_type', $request->input('help_type'));
        }
        if(!empty($request->year)){
            $archives1->whereBetween('office_order_date', [$startDate, $endDate]);
        }
        $archives = $archives1->get();

        return view("archives.filtered_data", compact('archives', 'applicant_reason', 'help_type', 'treatment_type'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('archives.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'archive' => 'required|mimes:xlsx,xls,csv',
        ]);

        if($request->hasFile('archive')){
            $archives = new ArchiveImport;
            Excel::import($archives, $request->file('archive'));
        }

        return redirect()->back()->withSuccess('Data Imported !!!');
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
    public function archivesEdit($id)
    {   
        $archives = Application_Form::find($id);
        $archives1 = Patient_Form::where('application_id', $id)->get();
        $archives2 = Health_Issue::where('application_id', $id)->get();
        $archives3 = Health_Issue::where('application_id', $id)->first();
        $archives4 = Daughter_Marriage::where('application_id', $id)->get();
        $archives5 = Meritocracy::where('application_id', $id)->get();
        $archives6 = Deadbody::where('application_id', $id)->get();
        $archives10 = Application_Form::where('status', 'approved')->get();
        
        return view('front.archives.edit', compact('archives','archives1','archives2','archives3','archives4','archives5','archives6','archives10'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function archivesUpdate(Request $request, $id)
    {
        $archives = Application_Form::find($id);
        $archives->status = "admin_approved";
        $archives->rejected_reason = null;
        $archives->update();

        return redirect()->route("archives");
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
}
