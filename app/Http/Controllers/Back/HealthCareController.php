<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Back\Applicant_Reason;
use App\Models\Back\Relation;
use App\Models\Back\Application_Form;
use App\Models\Back\Patient_Form;
use App\Models\Front\Treatment_type;
use App\Models\Front\Help_type;
use App\Models\Back\Child_Birth;
use App\Models\Back\Daughter_Marriage;
use App\Models\Back\Meritocracy;
use App\Models\Back\Deadbody;
use App\Models\Front\Meritocracy_Class;
use App\Models\Front\Meritocracy_Result;
use App\Imports\UserImport;
use Maatwebsite\Excel\Facades\Excel;
use Image;
use File;
use App\Models\Frontuser;

class HealthCareController extends Controller
{
    public function application(){
        $relations = Relation::all();
        $applicant_reasons = Applicant_Reason::all();
        $treatments = Treatment_type::all();
        $helps = Help_type::all();
        $child_births = Child_Birth::all();
        $classes = Meritocracy_Class::all();
        $results = Meritocracy_Result::all();
        $user = Auth::guard('front')->user();
        $user_id = $user->id;
        $applications = Application_Form::where('status', 'approved')->where('user_id', $user_id)->get();

        return view("back.application.new_application", compact('relations','applicant_reasons','treatments','helps','child_births','classes','results','user','applications'));
    }

    public function treatment(){
        $relations = Relation::all();
        $applicant_reasons = Applicant_Reason::all();
        $treatments = Treatment_type::all();
        $helps = Help_type::all();
        $child_births = Child_Birth::all();
        $classes = Meritocracy_Class::all();
        $results = Meritocracy_Result::all();
        $user = Auth::guard('front')->user();
        $user_id = $user->id;
        $applications = Application_Form::where('status', 'approved')->where('user_id', $user_id)->get();

        return view("back.application.treatment", compact('relations','applicant_reasons','treatments','helps','child_births','classes','results','user','applications'));
    }

    public function daughterMarriage(){
        $relations = Relation::all();
        $applicant_reasons = Applicant_Reason::all();
        $treatments = Treatment_type::all();
        $helps = Help_type::all();
        $child_births = Child_Birth::all();
        $classes = Meritocracy_Class::all();
        $results = Meritocracy_Result::all();
        $user = Auth::guard('front')->user();
        $user_id = $user->id;
        $applications = Application_Form::where('status', 'approved')->where('user_id', $user_id)->get();

        return view("back.application.daughtermarriage", compact('relations','applicant_reasons','treatments','helps','child_births','classes','results','user','applications'));
    }

    public function meritocracy(){
        $relations = Relation::all();
        $applicant_reasons = Applicant_Reason::all();
        $treatments = Treatment_type::all();
        $helps = Help_type::all();
        $child_births = Child_Birth::all();
        $classes = Meritocracy_Class::all();
        $results = Meritocracy_Result::all();
        $user = Auth::guard('front')->user();
        $user_id = $user->id;
        $applications = Application_Form::where('status', 'approved')->where('user_id', $user_id)->get();

        return view("back.application.meritocracy", compact('relations','applicant_reasons','treatments','helps','child_births','classes','results','user','applications'));
    }

    public function deadbody(){
        $relations = Relation::all();
        $applicant_reasons = Applicant_Reason::all();
        $treatments = Treatment_type::all();
        $helps = Help_type::all();
        $child_births = Child_Birth::all();
        $classes = Meritocracy_Class::all();
        $results = Meritocracy_Result::all();
        $user = Auth::guard('front')->user();
        $user_id = $user->id;
        $applications = Application_Form::where('status', 'approved')->where('user_id', $user_id)->get();

        return view("back.application.deadbody", compact('relations','applicant_reasons','treatments','helps','child_births','classes','results','user','applications'));
    }

    public function applicationStore(Request $request, $id){
        DB::transaction(function()use($request, $id){
            // dd($request);
            $request->validate([
                'applicant_date'=>'required',
                'fiscal_year'=>'required',
                'office_name'=>'required',
                'employee_name'=>'required',
                'ERP_number'=>'required',
                'nid'=>'required',
                'designation'=>'required',
                'joining_date'=>'required',
                'grade'=>'required',
                'number'=>'required',
                'email'=>'required',
                'bubo'=>'required',
                'applicant_reason'=>'required',
                'relation_name'=>'required'
            ]);

            $application = new Application_Form;
            $application->applicant_date = $request->applicant_date;
            $application->fiscal_year = $request->fiscal_year;
            $application->office_name = $request->office_name;
            $application->employee_name = $request->employee_name;
            $application->ERP_number = $request->ERP_number;
            if($request->nid){
                $image = $request->file("nid");
                $nid = rand().".".$image->getClientOriginalExtension();
                $location = public_path("back/applicationform/".$nid);
                Image::make($image)->save($location);
            }
            $application->nid = $nid;
            $application->designation = $request->designation;
            $application->joining_date = $request->joining_date;
            $application->grade = $request->grade;
            $application->number = (string)$request->number;
            $application->email = $request->email;
            if($request->bubo){
                $image = $request->file("bubo");
                $bubo = rand().".".$image->getClientOriginalExtension();
                $location = public_path("back/applicationform/".$bubo);
                Image::make($image)->save($location);
            }
            $application->bubo = $bubo;
            $application->applicant_reason = $request->applicant_reason;
            $application->relation_name = $request->relation_name;
            $application->employee_sign = $request->employee_sign;
            $application->employee_date = $request->employee_date;
            $application->controller_officer_name = $request->controller_officer_name;
            $application->controller_officer_designation = $request->controller_officer_designation;
            $application->controller_officer_date = $request->controller_officer_date;
            $application->doctor_name = $request->doctor_name;
            $application->doctor_designation = $request->doctor_designation;
            $application->doctor_date = $request->doctor_date;
            $application->claim_amount = $request->claim_amount;
            $userId = $id;
            $application->user_id = $userId;
            $application->save();

            $applicationId = $application->id;

            // patient
            if(!empty($request->treatment_type)){
                $patient = new Patient_Form;
                $patient->patient_name = $request->patient_name;
                if($request->patient_nid){
                    $image = $request->file("patient_nid");
                    $patient_nid = rand().".".$image->getClientOriginalExtension();
                    $location = public_path("back/hospitalinfo/".$patient_nid);
                    Image::make($image)->save($location);
                    $patient->patient_nid = $patient_nid;
                }
                if($request->patient_pic){
                    $image = $request->file("patient_pic");
                    $patient_pic = rand().".".$image->getClientOriginalExtension();
                    $location = public_path("back/hospitalinfo/".$patient_pic);
                    Image::make($image)->save($location);
                    $patient->patient_pic = $patient_pic;
                }
                $patient->treatment_type = $request->treatment_type;
                $patient->disease_name = $request->disease_name;
                $patient->hospital_name = $request->hospital_name;
                $patient->clearance_date = $request->clearance_date;
                $patient->clearance_hospital_name = $request->clearance_hospital_name;
                if($request->clearance){
                    $image = $request->file("clearance");
                    $clearance = rand().".".$image->getClientOriginalExtension();
                    $location = public_path("back/hospitalinfo/".$clearance);
                    Image::make($image)->save($location);
                    $patient->clearance = $clearance;
                }
                if($request->doctor_recommendation){
                    $image = $request->file("doctor_recommendation");
                    $doctor_recommendation = rand().".".$image->getClientOriginalExtension();
                    $location = public_path("back/hospitalinfo/".$doctor_recommendation);
                    Image::make($image)->save($location);
                    $patient->doctor_recommendation = $doctor_recommendation;
                }
                if($request->PRL){
                    $image = $request->file("PRL");
                    $PRL = rand().".".$image->getClientOriginalExtension();
                    $location = public_path("back/hospitalinfo/".$PRL);
                    Image::make($image)->save($location);
                    $patient->PRL = $PRL;
                }
                if($request->bd_office_order){
                    $image = $request->file("bd_office_order");
                    $bd_office_order = rand().".".$image->getClientOriginalExtension();
                    $location = public_path("back/hospitalinfo/".$bd_office_order);
                    Image::make($image)->save($location);
                    $patient->bd_office_order = $bd_office_order;
                }

                // accident
                $patient->accident_name = $request->accident_name;
                $patient->accident_date = $request->accident_date;
                $patient->accident_place = $request->accident_place;
                if($request->inquiry){
                    $image = $request->file("inquiry");
                    $inquiry = rand().".".$image->getClientOriginalExtension();
                    $location = public_path("back/accident/".$inquiry);
                    Image::make($image)->save($location);
                    $patient->inquiry = $inquiry;
                }

                // child birth
                $patient->child_birth = $request->child_birth;
                if($request->maternity_leave){
                    $image = $request->file("maternity_leave");
                    $maternity_leave = rand().".".$image->getClientOriginalExtension();
                    $location = public_path("back/childbirth/".$maternity_leave);
                    Image::make($image)->save($location);
                    $patient->maternity_leave = $maternity_leave;
                }
                $patient->child_birthdate = $request->child_birthdate;
                if($request->headofc_affidavit){
                    $image = $request->file("headofc_affidavit");
                    $headofc_affidavit = rand().".".$image->getClientOriginalExtension();
                    $location = public_path("back/childbirth/".$headofc_affidavit);
                    Image::make($image)->save($location);
                    $patient->headofc_affidavit = $headofc_affidavit;
                }

                $patient->application_id = $applicationId;
                $patient->save();
                
                $sl_no = $request->sl_no;
                $voucher_no = $request->voucher_no;
                $date = $request->date;
                $amount = $request->amount;
                $fileArray = $_FILES;
                $files = [];
                foreach($fileArray as $key => $file){
                    if($key !== 'nid' && $key !== 'bubo' && $key !== 'patient_nid' && $key !== 'patient_pic' && $key !== 'maternity_leave' && $key !== 'inquiry' && $key !== 'clearance' && $key !== 'doctor_recommendation' && $key !== 'PRL' && $key !== 'bd_office_order' && $key !== 'kabinnama' && $key !== 'certificate' && $key !== 'organization_certificate' && $key !== 'marksheet' && $key !== 'picture' && $key !== 'death_certificate' && $key !== 'headofc_affidavit'){
                        $files[] = $file;
                    }
                }
                for($i=0; $i<count($sl_no); $i++){
                    $file = $files[$i];
                    $customName = rand() . "." . pathinfo($file['name'], PATHINFO_EXTENSION);
                    $location = public_path("back/file/" . $customName);
                    move_uploaded_file($file['tmp_name'], $location);

                    $issue = [
                        'sl_no'             => $sl_no[$i],
                        'voucher_no'        => $voucher_no[$i],
                        'date'              => $date[$i],
                        'amount'            => $amount[$i],
                        'file'              => $customName,
                        'status'            => "1",
                        'application_id'    => $applicationId
                    ];

                    DB::table('health__issues')->insert($issue);
                }
            }

            // daughter marriage
            if(!empty($request->marriage_date)){
                $daughter_marriage = new Daughter_Marriage;
                $daughter_marriage->marriage_date = $request->marriage_date;
                if($request->kabinnama){
                    $image = $request->file("kabinnama");
                    $kabinnama = rand().".".$image->getClientOriginalExtension();
                    $location = public_path("back/daughtermarriage/".$kabinnama);
                    Image::make($image)->save($location);
                    $daughter_marriage->kabinnama = $kabinnama;
                }
                $daughter_marriage->employee_details = $request->daughter_employee_details;
                $daughter_marriage->help_type = $request->daughter_help_type;
                $daughter_marriage->amount = $request->daughter_amount;
                $daughter_marriage->application_id = $applicationId;
                $daughter_marriage->save();
            }

            // meritocracy
            if(!empty($request->class)){
                $meritocracy = new Meritocracy;
                $meritocracy->class = $request->class;
                $meritocracy->exam = $request->exam;
                $meritocracy->result = $request->result;
                if($request->certificate){
                    $image = $request->file("certificate");
                    $certificate = rand().".".$image->getClientOriginalExtension();
                    $location = public_path("back/meritocracy/".$certificate);
                    Image::make($image)->save($location);
                    $meritocracy->certificate = $certificate;
                }
                if($request->organization_certificate){
                    $image = $request->file("organization_certificate");
                    $organization_certificate = rand().".".$image->getClientOriginalExtension();
                    $location = public_path("back/meritocracy/".$organization_certificate);
                    Image::make($image)->save($location);
                    $meritocracy->organization_certificate = $organization_certificate;
                }
                if($request->marksheet){
                    $image = $request->file("marksheet");
                    $marksheet = rand().".".$image->getClientOriginalExtension();
                    $location = public_path("back/meritocracy/".$marksheet);
                    Image::make($image)->save($location);
                    $meritocracy->marksheet = $marksheet;
                }
                if($request->picture){
                    $image = $request->file("picture");
                    $picture = rand().".".$image->getClientOriginalExtension();
                    $location = public_path("back/meritocracy/".$picture);
                    Image::make($image)->save($location);
                    $meritocracy->picture = $picture;
                }
                $meritocracy->employee_details = $request->meritocracy_employee_details;
                $meritocracy->help_type = $request->meritocracy_help_type;
                $meritocracy->amount = $request->meritocracy_amount;
                $meritocracy->application_id = $applicationId;
                $meritocracy->save();
            }

            // deadbody
            if(!empty($request->death_date)){
                $deadbody = new Deadbody;
                $deadbody->death_date = $request->death_date;
                $deadbody->death_institute = $request->death_institute;
                if($request->death_certificate){
                    $image = $request->file("death_certificate");
                    $death_certificate = rand().".".$image->getClientOriginalExtension();
                    $location = public_path("back/deadbody/".$death_certificate);
                    Image::make($image)->save($location);
                    $deadbody->death_certificate = $death_certificate;
                }
                $deadbody->employee_details = $request->deadbody_employee_details;
                $deadbody->help_type = $request->deadbody_help_type;
                $deadbody->amount = $request->deadbody_amount;
                $deadbody->application_id = $applicationId;
                $deadbody->save();
            }
            
        });
        return redirect()->route("application")->with('success', 'Submitted Successfully!');
    }

    public function applicationList(){
        $user = Auth::guard('front')->user();
        $user_id = $user->id;
        $applicationlists = Application_Form::where('user_id', $user_id)->paginate(25);
        return view("back.application.application_list", compact('applicationlists','user'));
    }


    public function userStore(Request $request)
    {
        $request->validate([
            'users' => 'required|mimes:xlsx,xls,csv',
        ]);

        if($request->hasFile('users')){
            $users = new UserImport;
            Excel::import($users, $request->file('users'));
        }

        return redirect()->back()->withSuccess('Data Imported !!!');
    }
}
