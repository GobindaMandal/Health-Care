<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Back\Budget;
use App\Models\Back\Application_Form;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct()
    // {
    //     $this->middleware('role_or_permission:Dashboard access|Dashboard create|Dashboard edit|Dashboard delete', ['only' => ['index','show']]);
    //     $this->middleware('role_or_permission:Dashboard create', ['only' => ['create','store']]);
    //     $this->middleware('role_or_permission:Dashboard edit', ['only' => ['edit','update']]);
    //     $this->middleware('role_or_permission:Dashboard delete', ['only' => ['destroy']]);
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        if($request->year == null){
            $currentYear = date('Y');
            $startYear = $currentYear - 1;
            $endYear = $currentYear;
            $fiscalYear = $startYear . '-' . $endYear;
            $year = $fiscalYear;
        } else{
            $year = $request->input('year');
        }
        
        $totalBudget = Budget::where('fiscal_year', $year)->sum('budget');
        $totalExpense = Application_Form::where('fiscal_year', $year)->sum('approved_amount');
        $remainingBudget = $totalBudget - $totalExpense;

        $budget = Budget::where('fiscal_year', $year)->sum('budget');
        $budget1 = Application_Form::where('fiscal_year', $year)->where('applicant_reason', 'চিকিৎসা')->sum('approved_amount');
        $budget2 = Application_Form::where('fiscal_year', $year)->where('applicant_reason', '!=', 'চিকিৎসা')->sum('approved_amount');
        $budget3 = Budget::where('fiscal_year', $year)->sum('treatment');
        $budget4 = Budget::where('fiscal_year', $year)->sum('welfare');

        if ($budget !== null && $budget !== 0) {
            $treatmentPercentage = ($budget1 / $budget) * 100;
        } else {
            $treatmentPercentage = 0;
        }
        if ($budget !== null && $budget !== 0) {
            $welfarePercentage = ($budget2 / $budget) * 100;
        } else {
            $welfarePercentage = 0;
        }


        $yearRange = explode('-', $year);
        $startDate = $yearRange[0].'-01-01';
        $endDate = $yearRange[1].'-12-31';
        $data = DB::table('application__forms')
            ->whereBetween('updated_at', [$startDate, $endDate])
            ->select(DB::raw('YEAR(updated_at) as year'), DB::raw('MONTH(updated_at) as month'), DB::raw('SUM(approved_amount) as total_amount'))
            ->groupBy(DB::raw('YEAR(updated_at)'), DB::raw('MONTH(updated_at)'))
            ->orderBy(DB::raw('YEAR(updated_at)'), 'asc')
            ->orderBy(DB::raw('MONTH(updated_at)'), 'asc')
            ->get();
        $monthlyAmounts = [];
        $months = [
            'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
        ];
        foreach ($data as $row) {
            $monthlyAmounts[$row->month - 1] = $row->total_amount;
        }

        return view('dashboard.index', compact('user','totalBudget','totalExpense','remainingBudget','budget','budget1','budget2','budget3','budget4','treatmentPercentage','welfarePercentage','monthlyAmounts','months','year'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
    public function edit(Post $post)
    {
        return view('post.edit',['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->update($request->all());
        return redirect()->back()->withSuccess('Post updated !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back()->withSuccess('Post deleted !!!');
    }
}

