<x-app-layout>
    <div class="container mx-auto px-6 py-2">
        <div class="row"></div>
        <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12">
            <div class="card">
                <header>
                    <h3 style="text-align: center;margin-top: 20px;">বাংলাদেশ বিদ্যুৎ উন্নয়ন বোর্ড</h3>
                    <h4 style="text-align: center;margin-top: 20px;">চিকিৎসা প্রতিপূরণ "বিল ফরম-৭"</h4>
                    <h5 style="text-align: center;margin-top: 20px;">(প্রত্যেক রোগীর জন্য পৃথক বিল পেশ করতে হবে)</h5>
                </header>

            <div class="form-body">
                <form action="{{ route('update.doctorsApplication', $doctors_application->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row m-3">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">আবেদনের তারিখ :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input readonly type="date" class="form-control" name="applicant_date" id="applicant_date" value="{{ $doctors_application->applicant_date }}">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">অর্থ-বছর :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input readonly type="text" class="form-control" name="fiscal_year" id="fiscal_year" placeholder="অর্থ বছর" value="{{ $doctors_application->fiscal_year }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row m-3">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">অফিসের নাম :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input readonly type="text" class="form-control" name="office_name" id="office_name" placeholder="অফিসের নাম" value="{{ $doctors_application->office_name }}">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">কর্মকর্তা/ কর্মচারীর নাম :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input readonly type="text" class="form-control" name="employee_name" id="employee_name" placeholder="কর্মকর্তা/ কর্মচারীর নাম" value="{{ $doctors_application->employee_name }}">
                                </div>
                            </div>
                        </div>
                    </div> 

                    <div class="row m-3">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">ই আর পি নম্বর :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input readonly type="text" class="form-control" name="ERP_number" id="ERP_number" placeholder="ই আর পি নম্বর" value="{{ $doctors_application->ERP_number }}">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">পদবী :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input readonly type="text" class="form-control" name="designation" id="designation" placeholder="পদবী" value="{{ $doctors_application->designation }}">
                                </div>
                            </div>
                        </div>
                    </div> 

                    <div class="row m-3">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">যোগদানের তারিখ :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input readonly type="date" class="form-control" name="joining_date" id="joining_date" value="{{ $doctors_application->joining_date }}">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">গ্রেড :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input readonly type="text" class="form-control" name="grade" id="grade" placeholder="গ্রেড" value="{{ $doctors_application->grade }}">
                                </div>
                            </div>
                        </div>
                    </div> 

                    <div class="row m-3">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">মোবাইল নং :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input readonly type="number" class="form-control" name="number" id="number" placeholder="মোবাইল নং" value="{{ $doctors_application->number }}">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">ইমেইল :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input readonly type="email" class="form-control" name="email" id="email" placeholder="ইমেইল" value="{{ $doctors_application->email }}">
                                </div>
                            </div>
                        </div>
                    </div>  

                    <div class="row m-3">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">জাতীয় পরিচয়পত্র :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <a href="{{ asset('back/applicationform/'.$doctors_application->nid) }}" data-lightbox="image">
                                        <img src="{{ asset('back/applicationform/'.$doctors_application->nid) }}" alt="" width="50" />
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">বিউবো এর পরিচয়পত্রের কপি :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <a href="{{ asset('back/applicationform/'.$doctors_application->bubo) }}" data-lightbox="image">
                                        <img src="{{ asset('back/applicationform/'.$doctors_application->bubo) }}" alt="" width="50" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row m-3">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">আবেদনের খাত :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <select readonly class="form-select" name="applicant_reason" id="applicant_reason">
                                       <option value="">{{ $doctors_application->applicant_reason }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">সম্পর্ক :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <select readonly class="form-select" name="relation_name" id="relation_name">
                                       <option value="">{{ $doctors_application->relation_name }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div> 

                    @if($doctors_application->applicant_reason === 'কল্যাণ ও চিত্তবিনোদন')
                    <div class="row m-3">
                        <div class="col-lg-6 col-md-6 col-sm-12" id="help_type_container" style="display: block;">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">আবেদনের ধরণ :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <select readonly class="form-select" name="help_type" id="help_type">
                                       @if(App\Models\Back\Daughter_Marriage::where('application_id', $doctors_application->id)->first())
                                       <option value=" {{ App\Models\Back\Daughter_Marriage::where('application_id', $doctors_application->id)->first('help_type')}}"> {{App\Models\Back\Daughter_Marriage::where('application_id', $doctors_application->id)->first()->help_type}}</option>

                                       @elseif( App\Models\Back\Meritocracy::where('application_id', $doctors_application->id)->first())
                                       <option value=" {{ App\Models\Back\Meritocracy::where('application_id', $doctors_application->id)->first('help_type')}}"> {{App\Models\Back\Meritocracy::where('application_id', $doctors_application->id)->first()->help_type}}</option>

                                       @elseif( App\Models\Back\Deadbody::where('application_id', $doctors_application->id)->first())
                                       <option value=" {{ App\Models\Back\Deadbody::where('application_id', $doctors_application->id)->first('help_type')}}"> {{App\Models\Back\Deadbody::where('application_id', $doctors_application->id)->first()->help_type}}</option>
                                       @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @foreach($doctors_application1 as $application)
                    @if($application->treatment_type)
                    <div class="row m-3">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">চিকিৎসার ধরণ :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <select readonly class="form-select" name="treatment_type" id="treatment_type">
                                        <option value="">{{ $application->treatment_type }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">রোগীর নাম :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input readonly type="text" class="form-control" name="patient_name" id="patient_name" placeholder="রোগীর নাম" value="{{ $application->patient_name }}">
                                </div>
                            </div>
                        </div>
                    </div> 

                    <div class="row m-3">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">রোগীর জাতীয় পরিচয়পত্র/জন্মনিবন্ধন :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <a href="{{ asset('back/hospitalinfo/'.$application->patient_nid) }}" data-lightbox="image">
                                        <img src="{{ asset('back/hospitalinfo/'.$application->patient_nid) }}" alt="" width="50" />
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">কর্মকর্তা/রোগীর ১ কপি ছবি :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <a href="{{ asset('back/hospitalinfo/'.$application->patient_pic) }}" data-lightbox="image">
                                        <img src="{{ asset('back/hospitalinfo/'.$application->patient_pic) }}" alt="" width="50" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div> 
                    @endif
                    @endforeach

                    @foreach($doctors_application1 as $application)
                    @if($application->child_birth)
                    <div class="row m-3">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">সন্তানের ক্রমিক নং :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <select class="form-select" name="child_birth" id="child_birth">
                                        <option value="">{{ $application->child_birth }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">মাতৃকালীন ছুটির দপ্তর আদেশ :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <a href="{{ asset('back/childbirth/'.$application->maternity_leave) }}" data-lightbox="image">
                                        <img src="{{ asset('back/childbirth/'.$application->maternity_leave) }}" alt="" width="50" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div> 
                    @endif
                    @endforeach

                    <!-- <hr> -->

                    <div class="row m-3">

                        <!-- daughters marriage -->
                        @foreach($doctors_application4 as $application)
                        @if($application->marriage_date)
                        <div id="daughters_marriage">
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">বিবাহের তারিখ :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input readonly class="form-control" type="date" id="marriage_date" name="marriage_date" value="{{ $application->marriage_date }}">
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">নিয়ন্ত্রণকারী কর্মকর্তার সুপারিশসহ কাবিননামা :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <a href="{{ asset('back/daughtermarriage/'.$application->kabinnama) }}" data-lightbox="image">
                                        <img src="{{ asset('back/daughtermarriage/'.$application->kabinnama) }}" alt="" width="50" />
                                    </a>
                                </div>
                            </div>

                            <div class="row" >
                                <div class="col-md-12">
                                    <div class="" style="width:fit-content; margin: 0 auto;">
                                        <div class="card-body">
                                            <table id="" class="table table-bordered" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th style="color: black;">ক্রমিক নং</th>
                                                        <th style="color: black;">কর্মচারীর নাম, পদবী ও দপ্তর</th>
                                                        <th style="color: black;">সাহায্যের ধরণ</th>
                                                        <th style="color: black;">অনুদানের পরিমাণ</th>
                                                </thead>
                                                <tbody style="background-color: f4f4f4;">
                                                    <tr id="row">
                                                        <td>
                                                            <input readonly class="form-control" type='number' id='' name='' value="1">
                                                        </td>
                                                        <td>
                                                            <textarea readonly class="form-control" type='text' id='employee_details' name='employee_details'
                                                            cols="40" rows="1">{{ $application->employee_details }}</textarea>
                                                        </td>
                                                        <td>
                                                            <input readonly class="form-control" type='text' id='help_type' name='help_type' value="{{ $application->help_type }}">
                                                        </td>
                                                        <td>
                                                            <input readonly class="form-control" type='number' id='amount' name='amount' value="{{ $application->amount }}">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach

                        <!-- meritocracy -->
                        @foreach($doctors_application5 as $application)
                        @if($application->class)
                        <div id="meritocracy">
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">শ্রেণী :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input readonly class="form-control" type="text" id="class" name="class" placeholder="শ্রেণী" value="{{ $application->class }}">
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">পরীক্ষা :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input readonly class="form-control" type="text" id="exam" name="exam" placeholder="পরীক্ষা" value="{{ $application->exam }}">
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">ফলাফল :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input readonly class="form-control" type="text" id="result" name="result" placeholder="ফলাফল" value="{{ $application->result }}">
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">প্রত্যায়নপত্র/সার্টিফিকেট :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <a href="{{ asset('back/meritocracy/'.$application->certificate) }}" data-lightbox="image">
                                        <img src="{{ asset('back/meritocracy/'.$application->certificate) }}" alt="" width="50" />
                                    </a>
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">দপ্তর প্রধানের সুপারিশসহ প্রতিষ্ঠান প্রধানের প্রত্যায়নপত্র :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <a href="{{ asset('back/meritocracy/'.$application->organization_certificate) }}" data-lightbox="image">
                                        <img src="{{ asset('back/meritocracy/'.$application->organization_certificate) }}" alt="" width="50" />
                                    </a>
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">দপ্তর প্রধানের সুপারিশসহ মার্কশীটের সত্যায়িত কপি :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <a href="{{ asset('back/meritocracy/'.$application->marksheet) }}" data-lightbox="image">
                                        <img src="{{ asset('back/meritocracy/'.$application->marksheet) }}" alt="" width="50" />
                                    </a>
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">দপ্তর প্রধানের সুপারিশসহ ছবি ১ কপি (পাসপোর্ট সাইজ) :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <a href="{{ asset('back/meritocracy/'.$application->picture) }}" data-lightbox="image">
                                        <img src="{{ asset('back/meritocracy/'.$application->picture) }}" alt="" width="50" />
                                    </a>
                                </div>
                            </div>

                            <div class="row" >
                                <div class="col-md-12">
                                    <div class="" style="width:fit-content; margin: 0 auto;">
                                        <div class="card-body">
                                            <table id="" class="table table-bordered" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th style="color: black;">ক্রমিক নং</th>
                                                        <th style="color: black;">কর্মচারীর নাম, পদবী ও দপ্তর</th>
                                                        <th style="color: black;">সাহায্যের ধরণ</th>
                                                        <th style="color: black;">অনুদানের পরিমাণ</th>
                                                </thead>
                                                <tbody style="background-color: f4f4f4;">
                                                    <tr id="row">
                                                        <td>
                                                            <input readonly class="form-control" type='number' id='' name='' value="1">
                                                        </td>
                                                        <td>
                                                            <textarea readonly class="form-control" type='text' id='employee_details' name='employee_details'
                                                            cols="40" rows="1">{{ $application->employee_details }}</textarea>
                                                        </td>
                                                        <td>
                                                            <input readonly class="form-control" type='text' id='help_type' name='help_type' value="{{ $application->help_type }}">
                                                        </td>
                                                        <td>
                                                            <input readonly class="form-control" type='number' id='amount' name='amount' value="{{ $application->amount }}">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach

                        <!-- deadbody -->
                        @foreach($doctors_application6 as $application)
                        @if($application->death_date)
                        <div id="deadbody_cost">
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">ডেথ সার্টিফিকেট ইস্যুর তারিখ :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input readonly class="form-control" type="date" id="death_date" name="death_date" value="{{ $application->death_date }}">
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">সার্টিফিকেট ইস্যুকারী প্রতিষ্ঠান :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input readonly class="form-control" type="text" id="death_institute" name="death_institute" placeholder="সার্টিফিকেট ইস্যুকারী প্রতিষ্ঠান" value="{{ $application->death_institute }}">
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">ডেথ সার্টিফিকেট :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <a href="{{ asset('back/deadbody/'.$application->death_certificate) }}" data-lightbox="image">
                                        <img src="{{ asset('back/deadbody/'.$application->death_certificate) }}" alt="" width="50" />
                                    </a>
                                </div>
                            </div>

                            <div class="row" >
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <table id="" class="table table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th style="color: black;">ক্রমিক নং</th>
                                                    <th style="color: black;">কর্মচারীর নাম, পদবী ও দপ্তর</th>
                                                    <th style="color: black;">সাহায্যের ধরণ</th>
                                                    <th style="color: black;">অনুদানের পরিমাণ</th>
                                            </thead>
                                            <tbody style="background-color: f4f4f4;">
                                                <tr id="row">
                                                    <td>
                                                        <input readonly class="form-control" type='number' id='' name='' value="1">
                                                    </td>
                                                    <td>
                                                        <textarea readonly class="form-control" type='text' id='employee_details' name='employee_details'
                                                        cols="40" rows="1">{{ $application->employee_details }}</textarea>
                                                    </td>
                                                    <td>
                                                        <input readonly class="form-control" type='text' id='help_type' name='help_type' value="{{ $application->help_type }}">
                                                    </td>
                                                    <td>
                                                        <input readonly class="form-control" type='number' id='amount' name='amount' value="{{ $application->amount }}">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach

                        <!-- start treatment -->
                        <!-- hospital info -->
                        @foreach($doctors_application1 as $application)
                        @if($application->disease_name)
                        <div>
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">রোগের বিবরণ :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <textarea readonly class="form-control" name="disease_name" id="disease_name" cols="40" rows="2" placeholder="রোগের বিবরণ">{{ $application->disease_name }}</textarea>
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">হাসপাতালের নাম :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input readonly class="form-control" type="text" id="hospital_name" name="hospital_name" placeholder="হাসপাতালের নাম" value="{{ $application->hospital_name }}">
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">হাসপাতাল হতে ছাড়পত্রের তারিখ :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input readonly class="form-control" type="date" id="clearance_date" name="clearance_date" value="{{ $application->clearance_date }}">
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">ছাড়পত্র ইস্যুকারী হাসপাতালের নাম :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input readonly class="form-control" type="text" id="clearance_hospital_name" name="clearance_hospital_name" placeholder="ছাড়পত্র ইস্যুকারী হাসপাতালের নাম" value="{{ $application->clearance_hospital_name }}">
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">ছাড়পত্র :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <a href="{{ asset('back/hospitalinfo/'.$application->clearance) }}" data-lightbox="image">
                                        <img src="{{ asset('back/hospitalinfo/'.$application->clearance) }}" alt="" width="50" />
                                    </a>
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">বিভাগীয় চিকিৎসকের সুপারিশপত্র (বাহিরের চিকিৎসকের পরামর্শ গ্রহণের ক্ষেত্রে) :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <a href="{{ asset('back/hospitalinfo/'.$application->doctor_recommendation) }}" data-lightbox="image">
                                        <img src="{{ asset('back/hospitalinfo/'.$application->doctor_recommendation) }}" alt="" width="50" />
                                    </a>
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">পি আর এল দপ্তরাদেশ :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <a href="{{ asset('back/hospitalinfo/'.$application->PRL) }}" data-lightbox="image">
                                        <img src="{{ asset('back/hospitalinfo/'.$application->PRL) }}" alt="" width="50" />
                                    </a>
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">বহি: বাংলাদেশ দপ্তরের আদেশ (বিদেশে চিকিৎসার ক্ষেত্রে) :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <a href="{{ asset('back/hospitalinfo/'.$application->bd_office_order) }}" data-lightbox="image">
                                        <img src="{{ asset('back/hospitalinfo/'.$application->bd_office_order) }}" alt="" width="50" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach

                        <!-- accident -->
                        @foreach($doctors_application1 as $application)
                        @if($application->accident_name)
                        <div id="accident_field">
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">দূর্ঘটনার বিবরণ :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <textarea readonly class="form-control" name="accident_name" id="accident_name" cols="40" rows="2" placeholder="দূর্ঘটনার বিবরণ">{{ $application->accident_name }}</textarea>
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">দূর্ঘটনার তারিখ :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input readonly class="form-control" type="date" id="accident_date" name="accident_date" placeholder="দূর্ঘটনার তারিখ" value="{{ $application->accident_date }}">
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">দূর্ঘটনার স্থান :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input readonly class="form-control" type="text" id="accident_place" name="accident_place" placeholder="দূর্ঘটনার স্থান" value="{{ $application->accident_place }}">
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">তদন্তকারী বোর্ডের সুপারিশ :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <a href="{{ asset('back/accident/'.$application->inquiry) }}" data-lightbox="image">
                                        <img src="{{ asset('back/accident/'.$application->inquiry) }}" alt="" width="50" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach

                        <!-- child birth -->
                        @foreach($doctors_application1 as $application)
                        @if($application->child_birthdate)
                        <div id="child_birth_no_container">
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">১ম সন্তানের জন্মতারিখ :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input readonly class="form-control" type="date" id="child_birthdate" name="child_birthdate" value="{{ $application->child_birthdate }}">
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">দপ্তর প্রধানের প্রত্যায়নপত্র :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input readonly class="form-control" type="file" id="headofc_affidavit" name="headofc_affidavit" placeholder="দপ্তর প্রধানের প্রত্যায়নপত্র">
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        <!-- end treatment -->

                    </div> 

                    @if(isset($doctors_application3))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                
                                <table id="orders" class="table table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th style="color: black;">ক্রমিক নং</th>
                                            <th style="color: black;">ভাউচার নং</th>
                                            <th style="color: black;">তারিখ</th>
                                            <th style="color: black;">টাকার পরিমাণ</th>
                                            <th style="color: black;">সংযুক্ত ফাইল</th>
                                    </thead>
                                    <tbody style="background-color: f4f4f4;">

                                        @foreach($doctors_application2 as $application)
                                        <tr id="row">
                                            
                                            <td>
                                                <input readonly class="form-control sl_no" type='number' data-type="sl_no" id='sl_no[]' name='sl_no[]' placeholder='ক্রমিক নং' value="{{ $application->sl_no }}" />
                                            </td>
    
                                            <td>
                                                <input readonly class="form-control voucher_no" type='text' data-type="voucher_no" id='voucher_no[]' name='voucher_no[]' placeholder='ভাউচার নং' value="{{ $application->voucher_no }}" />
                                            </td>
    
                                            <td>
                                                <input readonly class="form-control date" type='date' data-type="date" id='date[]' name='date[]' placeholder='তারিখ' value="{{ $application->date }}" />
                                            </td>
    
                                            <td>
                                                <input readonly class="form-control amount" type='number' data-type="amount" id='amount[]' name='amount[]' placeholder='টাকার পরিমাণ' value="{{ $application->amount }}" />
                                            </td>
    
                                            <td>
                                                <a href="{{ asset('back/file/'.$application->file) }}" data-lightbox="image">
                                                    <img src="{{ asset('back/file/'.$application->file) }}" alt="" width="50" />
                                                </a>
                                            </td>
    
                                        </tr>
                                        @endforeach

                                        <!-- <tr id="totalRow">
                                            <td colspan="3" class="text-right"> Total:</td>
                                            <td id="totalAmount" class="text-right"></td>
                                        </tr> -->

                                    </tbody>
                                    
                                </table>

                            </div>
                        </div>
                    </div>
                    @endif



                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="m-3">এতদ্বারা প্রত্যয়ন করা যাচ্ছে যে, আমার নিজ/ স্বামী/ স্ত্রী/ মেয়ে/ পিতা/ মাতা আমার সাথে বসবাস করে এবং সম্পূর্ণরুপে আমার উপর নির্ভরশীল । </h6>
                        </div>

                        <div class="row m-3">

                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <label for="text" class="fw-bold">কর্মকর্তা/ কর্মচারীর সাক্ষর :</label>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-12">
                                        <input readonly type="text" class="form-control" name="employee_sign" id="employee_sign" placeholder="কর্মকর্তা/ কর্মচারীর সাক্ষর" value="{{ $doctors_application->employee_sign }}">
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <label for="text" class="fw-bold">তারিখ :</label>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-12">
                                        <input readonly type="date" class="form-control" name="employee_date" id="employee_date" placeholder="তারিখ" value="{{ $doctors_application->employee_date }}">
                                    </div>
                                </div>
                            </div>
    
                        </div> 


                        <div class="col-md-12">
                            <h6 class="m-3">এতদ্বারা প্রত্যয়ন করা যাচ্ছে যে, উপরে বর্ণিত ভাউচারে অন্তর্ভুক্ত ঔষধ/ ভেষজ ইত্যাদি, যার মূল্য কর্মকর্তা/ কর্মচারীর নিজ/ স্বামী/ স্ত্রী/পুত্র/ কন্যা/ পিতা/ মাতার আরোগ্য এবং শারীরিক অবনতি রোধের জন্য আমার দ্বারা ব্যবস্থিত হয়েছিল এবং প্যাথলজিক্যাল ও রেডিওলজিক্যাল/ চিকিৎসকের পরিদর্শন ও ইনজেকশন প্রয়োগের জন্য প্রয়োজনীয় বিল । </h6>
                        </div>

                        <div class="row m-3">

                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="row ">
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <label for="text" class="fw-bold"> অনুমোদিত চিকিৎসকের নাম :</label> 
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-12">
                                        <input readonly type="text" class="form-control" name="doctor_name" id="doctor_name"  value="{{ $doctors_application9->name }}" placeholder="অনুমোদিত চিকিৎসকের নাম">
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="row ">
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <label for="text" class="fw-bold"> পদবী :</label>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-12">
                                        <input readonly type="text" class="form-control" name="doctor_designation" id="doctor_designation"  value="{{ $doctors_application9->designation }}" placeholder="পদবী">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="row ">
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <label for="text" class="fw-bold"> তারিখ :</label>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-12">
                                        <input readonly type="date" class="form-control" name="doctor_date" id="doctor_date" placeholder="তারিখ" value="{{ date('Y-m-d') }}" placeholder="তারিখ">
                                    </div>
                                </div>
                            </div>
    
                        </div> 

                        
                    </div>

                    <div class="col text-center">
                        <button type="submit" class="btn btn-success m-3">Accept</button>

                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#rejectModal{{$doctors_application->id}}">Reject</button>
                    </div>

                    </div>
                </form>

<!-- Reject Modal -->
<div class="modal fade" id="rejectModal{{$doctors_application->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rejected Reason</h5>
      </div>
      <div class="modal-body">
        <form action="{{ Route('update.r_doctorsApplication', $doctors_application->id) }}" method="POST">
            @csrf
            <textarea name="rejected_reason" id="rejected_reason" cols="57" rows="4"></textarea>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary">Save</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

            </div>

           
        <div class="pt-5">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12">
                    <div class="card">
                        <header>
                            <!-- <h3 style="text-align: center;margin-top: 20px;">বাংলাদেশ বিদ্যুৎ উন্নয়ন বোর্ড </h3>
                            <h4 style="text-align: center;margin-top: 20px;"> চিকিৎসা প্রতিপূরণ "বিল ফরম-৭" </h4> -->
                            <div class="table2">
                                <h4 style="text-align: center; margin-top: 20px;">কল্যাণ তহবিল হতে অনুদান প্রাপ্তির আবেদন (নমুনা ছক 'ঘ')</h4>
                            </div>
            
                        </header>


                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-body">
                                        
                                        <table id="dataTable" class="table table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th style="color: black;">ক্রমিক নং</th>
                                                    <th style="color: black;">নাম, পদবী ও দপ্তর</th>
                                                    <th style="color: black;">অনুদান প্রার্থনার কারণ </th>
                                                    <th style="color: black;">ইতোপূর্বে অনুদান পাইয়া থাকলে তাহার বিবরণ ও তারিখ</th>
                                                    <th style="color: black;">নিয়ন্ত্রণকারী কর্মকর্তার সুপারিশ</th>
                                                    <th style="color: black;">অবস্থা</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $sl=1; ?>
                                                @foreach ($doctors_application10 as $applicationList)
                                                <tr>
                                                    <td>{{ $sl }}</td>
                                                    <td>{{ $applicationList->employee_name }}, {{ $applicationList->designation }}, {{ $applicationList->office_name }}</td>
                                                    <td>{{ $applicationList->applicant_reason }}</td>
                                                    <td>{{ $applicationList->approved_amount }} টাকা, {{ $applicationList->applicant_date }}</td>
                                                    <td>{{ $applicationList->controller_officer_name }}</td>
                                                    <td>{{ $applicationList->status }}</td>
                                                </tr>
                                                <?php $sl++; ?>
                                                @endforeach

                                            </tbody>
                                            
                                        </table>
                                            
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>