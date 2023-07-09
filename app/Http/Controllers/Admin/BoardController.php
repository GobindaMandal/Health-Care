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

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('role_or_permission:Boards application access|Boards application create|Boards application edit|Boards application delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:Boards application create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:Boards application edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:Boards application delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boards_application = Application_Form::where('allowed_amount', '!=', null)
        ->orderByDesc('id')
        ->get();
        return view('boards_application.index', compact('boards_application'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('boards_application.new');
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
    public function boardsApplicationEdit($id)
    {   
        $boards_application = Application_Form::find($id);
        $ERP_number = $boards_application->ERP_number;
        $boards_application1 = Patient_Form::where('application_id', $id)->get();
        $boards_application2 = Health_Issue::where('application_id', $id)->get();
        $boards_application3 = Health_Issue::where('application_id', $id)->first();
        $boards_application4 = Daughter_Marriage::where('application_id', $id)->get();
        $boards_application5 = Meritocracy::where('application_id', $id)->get();
        $boards_application6 = Deadbody::where('application_id', $id)->get();
        $boards_application9 = Auth::user();
        $boards_application10 = Application_Form::where('status', 'approved')->where('ERP_number', $ERP_number)->get();

        return view('boards_application.edit', compact('boards_application','boards_application1','boards_application2','boards_application3','boards_application4','boards_application5','boards_application6','boards_application9','boards_application10'));
    }

    public function status($id){
        $boards_application = Health_Issue::find($id);
        if($boards_application->status==1){
            $boards_application->status="2";
        }
        else{
            $boards_application->status="1";
        }
        $boards_application->update();
        return redirect()->back()->with('message','Status Updated Successfully!')->withFragment('orders');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function boardAmount(Request $request)
    {
        $ids = $request->input('id');
        $allowedAmounts = $request->input('allowed_amount');
        $approvedAmounts = $request->input('approved_amount');

        foreach ($ids as $index => $id) {
            $boards_application = Application_Form::find($id);
            if (isset($allowedAmounts[$index])) {
                $boards_application->allowed_amount = $allowedAmounts[$index];
            }
            if (isset($approvedAmounts[$index])) {
                $boards_application->approved_amount = $approvedAmounts[$index];
                $boards_application->meeting_date = date('Y-m-d');
            }
            $boards_application->status = "approved";
            
            $boards_application->save();
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
        $reports = Application_Form::whereNotNull('approved_amount')
        ->whereNotNull('allowed_amount')
        ->get();
        $applicant_reason = Applicant_Reason::all();
        $help_type = Help_type::all();
        $treatment_type = Treatment_type::all();
        return view('boards_application.reports.index', compact('reports','applicant_reason','help_type','treatment_type'));
    }

    public function filterData(Request $request){

        $reports1 = Application_Form::query();
        $reports2 = Daughter_Marriage::query();
        $reports3 = Meritocracy::query();
        $reports4 = Deadbody::query();
        $reports5 = Patient_Form::query();
        $application_form = Application_Form::all();
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
        
        $reports = $reports1->whereNotNull('approved_amount')
        ->whereNotNull('allowed_amount')
        ->get();

        if($application_type == "চিকিৎসা" && $request->treatment_type == "শল্য চিকিৎসা"){
            $reports1->where('applicant_reason', $request->input('application_type'));
            return view('boards_application.reports.surgery', compact('reports','reports2','application_type','application_form','applicant_reason','help_type','treatment_type'));
        }
        elseif($application_type == "চিকিৎসা" && $request->treatment_type == "জটিল, দূরারোগ্য ও ব্যয়বহুল রোগের চিকিৎসা"){
            $reports1->where('applicant_reason', $request->input('application_type'));
            return view('boards_application.reports.complex_disease', compact('reports','reports2','application_type','application_form','applicant_reason','help_type','treatment_type'));
        }
        elseif($application_type == "চিকিৎসা" && $request->treatment_type == "সন্তান প্রসব"){
            return view('boards_application.reports.child_birth', compact('reports','reports2','application_type','application_form','applicant_reason','help_type','treatment_type'));
        }
        elseif($application_type == "চিকিৎসা" && $request->treatment_type == "দূর্ঘটনা"){
            return view('boards_application.reports.accident', compact('reports','reports2','application_type','application_form','applicant_reason','help_type','treatment_type'));
        }
        elseif($application_type == "চিকিৎসা"){
            $reports1->where('applicant_reason', $request->input('application_type'));
            return view('boards_application.reports.treatment', compact('reports','reports2','application_type','application_form','applicant_reason','help_type','treatment_type'));
        }
        elseif($application_type === 'কল্যাণ ও চিত্তবিনোদন'){
            return view('boards_application.reports.welfare', compact('reports','reports2','application_type','application_form','applicant_reason','help_type','treatment_type'));
        }
        else{
            $reports = Application_Form::whereNotNull('approved_amount')->get();
            return view('boards_application.reports.index', compact('reports','application_type','application_form','applicant_reason','help_type','treatment_type'));
        }
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

        return view('boards_application.reports.view', compact('reports','reports1','reports2','reports3','reports4','reports5','reports6','reports9','reports10'));
    }
}
