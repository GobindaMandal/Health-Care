@extends('back.mastering.master')
    @section('content')
    @if(session('success'))
    <div class="ml-4 alert alert-success" style="max-width: 200px;">
        {{ session('success') }}
    </div>
    @endif

    <div class="container">
        <div class="row"></div>
        <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12">
            <div class="card">
                <header>
                    <h3 style="text-align: center;margin-top: 20px;">বাংলাদেশ বিদ্যুৎ উন্নয়ন বোর্ড</h3>
                    <h4 style="text-align: center;margin-top: 20px;">চিকিৎসা প্রতিপূরণ "বিল ফরম-৭"</h4>
                    <h5 style="text-align: center;margin-top: 20px;">(প্রত্যেক রোগীর জন্য পৃথক বিল পেশ করতে হবে)</h5>
                </header>
          

            <div class="form-body">
                <form id="myForm" action="{{ route('store.application', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row m-3">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="font-weight-bold">আবেদনের তারিখ :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input type="date" class="form-control" name="applicant_date" id="applicant_date" value="{{ date('Y-m-d') }}">
                                    <span class="text-danger">
                                        @error('applicant_date')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="font-weight-bold">অর্থ-বছর :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <select name="fiscal_year" id="fiscal_year" class="form-control">
                                        <!-- <option value="">---Select Years---</option> -->
                                        @php
                                            $currentYear = date('Y');
                                            $startYear = $currentYear - 1;
                                            $endYear = $currentYear;
                                        @endphp
                                        @for($i = 0; $i < 2; $i++)
                                            @php
                                                $fiscalYear = $startYear . '-' . $endYear;
                                                $startYear--;
                                                $endYear--;
                                            @endphp
                                            <option value="{{ $fiscalYear }}">{{ $fiscalYear }}</option>
                                        @endfor
                                    </select>
                                    <span class="text-danger">
                                        @error('fiscal_year')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row m-3">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="font-weight-bold">অফিসের নাম :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input type="text" class="form-control" name="office_name" id="office_name" placeholder="অফিসের নাম" value="{{ $user->office_name }}">
                                    <span class="text-danger">
                                        @error('office_name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="font-weight-bold">কর্মকর্তা/ কর্মচারীর নাম :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input type="text" class="form-control" name="employee_name" id="employee_name" placeholder="কর্মকর্তা/ কর্মচারীর নাম" value="{{ $user->name }}">
                                    <span class="text-danger">
                                        @error('employee_name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div> 

                    <div class="row m-3">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="font-weight-bold">ই আর পি নম্বর :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input type="text" class="form-control" name="ERP_number" id="ERP_number" placeholder="ই আর পি নম্বর" value="{{ $user->ERP_number }}">
                                    <span class="text-danger">
                                        @error('ERP_number')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="font-weight-bold">পদবী :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input type="text" class="form-control" name="designation" id="designation" placeholder="পদবী" value="{{ $user->designation }}">
                                    <span class="text-danger">
                                        @error('designation')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div> 

                    <div class="row m-3">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="font-weight-bold">যোগদানের তারিখ :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input type="date" class="form-control" name="joining_date" id="joining_date" value="{{ $user->joining_date }}">
                                    <span class="text-danger">
                                        @error('joining_date')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="font-weight-bold">গ্রেড :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input type="text" class="form-control" name="grade" id="grade" placeholder="গ্রেড" value="{{ $user->grade }}">
                                    <span class="text-danger">
                                        @error('grade')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div> 

                    <div class="row m-3">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="font-weight-bold">মোবাইল নং :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input type="number" class="form-control" name="number" id="number" placeholder="মোবাইল নং" value="{{ $user->number }}">
                                    <span class="text-danger">
                                        @error('number')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="font-weight-bold">ইমেইল :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="ইমেইল" value="{{ $user->email }}">
                                    <span class="text-danger">
                                        @error('email')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>  

                    <div class="row m-3">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="font-weight-bold">জাতীয় পরিচয়পত্র :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input type="file" class="form-control" name="nid" id="nid" placeholder="জাতীয় পরিচয়পত্র" value="">
                                    <span class="text-danger">
                                        @error('nid')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="font-weight-bold">বিউবো এর পরিচয়পত্রের কপি :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input type="file" class="form-control" name="bubo" id="bubo" value="">
                                    <span class="text-danger">
                                        @error('bubo')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row m-3">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="font-weight-bold">আবেদনের খাত :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <select class="form-select" name="applicant_reason" id="applicant_reason">
                                       <option value="">---আবেদনের খাত নির্বাচন করুন---</option>
                                       @foreach($applicant_reasons as $applicant_reason)
                                       <option value="{{$applicant_reason->applicant_reason}}">{{$applicant_reason->applicant_reason}}</option>
                                       @endforeach
                                    </select>
                                    <span class="text-danger">
                                        @error('applicant_reason')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="font-weight-bold">সম্পর্ক :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <select class="form-select" name="relation_name" id="relation_name">
                                       <option value="">---সম্পর্ক নির্বাচন করুন---</option>
                                       @foreach($relations as $relation)
                                       <option value="{{$relation->relation_name}}">{{$relation->relation_name}}</option>
                                       @endforeach
                                    </select>
                                    <span class="text-danger">
                                        @error('relation_name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div> 

                    <div class="row m-3">
                        <div class="col-lg-6 col-md-6 col-sm-12" id="help_type_container" style="display: none;">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="font-weight-bold">সাহায্যের ধরণ :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <select class="form-select" name="help_type" id="help_type">
                                       <option value="">---সাহায্যের ধরণ নির্বাচন করুন---</option>
                                       @foreach($helps as $help)
                                       <option value="{{$help->help_name}}">{{$help->help_name}}</option>
                                       @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row m-3">
                        <div class="col-lg-6 col-md-6 col-sm-12" id="treatment_type_container" style="display: none;">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="font-weight-bold">চিকিৎসার ধরণ :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <select class="form-select" name="treatment_type" id="treatment_type">
                                       <option value="">---চিকিৎসার ধরণ নির্বাচন করুন---</option>
                                       @foreach($treatments as $treatment)
                                       <option value="{{$treatment->treatment_name}}">{{$treatment->treatment_name}}</option>
                                       @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12" id="patient_name_container" style="display: none;">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="font-weight-bold">রোগীর নাম :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input type="text" class="form-control" name="patient_name" id="patient_name" placeholder="রোগীর নাম" value="">
                                    <span class="text-danger">
                                        @error('patient_name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div> 

                    <div class="row m-3">
                        <div class="col-lg-6 col-md-6 col-sm-12" id="patient_nid_container" style="display: none;">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="font-weight-bold">রোগীর জাতীয় পরিচয়পত্র/জন্মনিবন্ধন :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input type="file" class="form-control" name="patient_nid" id="patient_nid" placeholder="রোগীর নাম" value="">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12" id="patient_pic_container" style="display: none;">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="font-weight-bold">কর্মকর্তা/রোগীর ১ কপি ছবি :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input type="file" class="form-control" name="patient_pic" id="patient_pic" placeholder="কর্মকর্তা/রোগীর ১ কপি ছবি" value="">
                                </div>
                            </div>
                        </div>
                    </div> 

                    <div class="row m-3">
                        <div class="col-lg-6 col-md-6 col-sm-12" id="child_birth_container" style="display: none;">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="font-weight-bold">সন্তানের ক্রমিক নং :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <select class="form-select" name="child_birth" id="child_birth">
                                       <option value="">---সন্তানের ক্রমিক নং নির্বাচন করুন---</option>
                                       @foreach($child_births as $child_birth)
                                       <option value="{{$child_birth->child_birth_sequence}}">{{$child_birth->child_birth_sequence}}</option>
                                       @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12" id="maternity_leave_container" style="display: none;">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="font-weight-bold">মাতৃকালীন ছুটির দপ্তর আদেশ :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input type="file" class="form-control" name="maternity_leave" id="maternity_leave" placeholder="মাতৃকালীন ছুটির দপ্তর আদেশ" value="">
                                </div>
                            </div>
                        </div>
                    </div> 

                    <!-- <hr> -->

                    <div class="row m-3">

                        <!-- daughters marriage -->
                        <div id="daughters_marriage" style="display: none;">
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="font-weight-bold">বিবাহের তারিখ :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input class="form-control" type="date" id="marriage_date" name="marriage_date">
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="font-weight-bold">নিয়ন্ত্রণকারী কর্মকর্তার সুপারিশসহ কাবিননামা :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input class="form-control" type="file" id="kabinnama" name="kabinnama" placeholder="নিয়ন্ত্রণকারী কর্মকর্তার সুপারিশসহ কাবিননামা">
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
                                                            <input readonly style="border: 1px solid #787474;" class="form-control" type='number' id='' name='' value="1">
                                                        </td>
                                                        <td>
                                                            <textarea readonly style="border: 1px solid #787474;" class="form-control" type='text' id='daughter_employee_details' name='daughter_employee_details'
                                                            cols="40" rows="1">{{ $user->name }}, {{ $user->designation }}, {{ $user->office_name }}</textarea>
                                                        </td>
                                                        <td>
                                                            <input readonly style="border: 1px solid #787474;" class="form-control" type='text' id='daughter_help_type' name='daughter_help_type' value="মেয়ের বিবাহ">
                                                        </td>
                                                        <td>
                                                            <input readonly style="border: 1px solid #787474;" class="form-control" type='number' id='daughter_amount' name='daughter_amount' value="25000">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- meritocracy -->
                        <div id="meritocracy" style="display: none;">
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="font-weight-bold">শ্রেণী :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <select class="form-control" name="class" id="class">
                                        <option value="">---শ্রেণী নির্বাচন করুন---</option>
                                        @foreach($classes as $class)
                                        <option value="{{ $class->class_name }}">{{ $class->class_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="font-weight-bold">পরীক্ষা :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input class="form-control" type="text" id="exam" name="exam" placeholder="পরীক্ষা">
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="font-weight-bold">ফলাফল :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <select class="form-control" name="result" id="result">
                                        <option value="">---ফলাফল নির্বাচন করুন---</option>
                                        @foreach($results as $result)
                                        <option value="{{ $result->results }}">{{ $result->results }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="font-weight-bold">প্রত্যায়নপত্র/সার্টিফিকেট :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input class="form-control" type="file" id="certificate" name="certificate">
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="font-weight-bold">দপ্তর প্রধানের সুপারিশসহ প্রতিষ্ঠান প্রধানের প্রত্যায়নপত্র :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input class="form-control" type="file" id="organization_certificate" name="organization_certificate">
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="font-weight-bold">দপ্তর প্রধানের সুপারিশসহ মার্কশীটের সত্যায়িত কপি :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input class="form-control" type="file" id="marksheet" name="marksheet">
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="font-weight-bold">দপ্তর প্রধানের সুপারিশসহ ছবি ১ কপি (পাসপোর্ট সাইজ) :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input class="form-control" type="file" id="picture" name="picture" placeholder="কালার ছবি">
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
                                                            <input readonly style="border: 1px solid #787474;" class="form-control" type='number' id='' name='' value="1">
                                                        </td>
                                                        <td>
                                                            <textarea readonly style="border: 1px solid #787474;" class="form-control" type='text' id='meritocracy_employee_details' name='meritocracy_employee_details'
                                                            cols="40" rows="1">{{ $user->name }}, {{ $user->designation }}, {{ $user->office_name }}</textarea>
                                                        </td>
                                                        <td>
                                                            <input readonly style="border: 1px solid #787474;" class="form-control" type='text' id='meritocracy_help_type' name='meritocracy_help_type' value="মেধাবৃত্তি">
                                                        </td>
                                                        <td>
                                                            <input readonly style="border: 1px solid #787474;" class="form-control" type='number' id='meritocracy_amount' name='meritocracy_amount' value="">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- deadbody -->
                        <div id="deadbody_cost" style="display: none;">
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="font-weight-bold">ডেথ সার্টিফিকেট ইস্যুর তারিখ :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input class="form-control" type="date" id="death_date" name="death_date">
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="font-weight-bold">সার্টিফিকেট ইস্যুকারী প্রতিষ্ঠান :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input class="form-control" type="text" id="death_institute" name="death_institute" placeholder="সার্টিফিকেট ইস্যুকারী প্রতিষ্ঠান">
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="font-weight-bold">ডেথ সার্টিফিকেট :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input class="form-control" type="file" id="death_certificate" name="death_certificate" placeholder="ডেথ সার্টিফিকেট">
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
                                                            <input readonly style="border: 1px solid #787474;" class="form-control" type='number' id='' name='' value="1">
                                                        </td>
                                                        <td>
                                                            <textarea readonly style="border: 1px solid #787474;" class="form-control" type='text' id='deadbody_employee_details' name='deadbody_employee_details'
                                                            cols="40" rows="1">{{ $user->name }}, {{ $user->designation }}, {{ $user->office_name }}</textarea>
                                                        </td>
                                                        <td>
                                                            <input readonly style="border: 1px solid #787474;" class="form-control" type='text' id='deadbody_help_type' name='deadbody_help_type' value="লাশ পরিবহন ও দাফন-কাফন">
                                                        </td>
                                                        <td>
                                                            <input readonly style="border: 1px solid #787474;" class="form-control" type='number' id='deadbody_amount' name='deadbody_amount' value="40000">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- start treatment -->
                        <!-- hospital info -->
                        <div id="hospital_info" style="display: none;">
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="font-weight-bold">রোগের বিবরণ :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <textarea class="form-control" name="disease_name" id="disease_name" cols="40" rows="2" placeholder="রোগের বিবরণ"></textarea>
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="font-weight-bold">হাসপাতালের নাম :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input class="form-control" type="text" id="hospital_name" name="hospital_name" placeholder="হাসপাতালের নাম">
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="font-weight-bold">হাসপাতাল হতে ছাড়পত্রের তারিখ :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input class="form-control" type="date" id="clearance_date" name="clearance_date">
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="font-weight-bold">ছাড়পত্র ইস্যুকারী হাসপাতালের নাম :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input class="form-control" type="text" id="clearance_hospital_name" name="clearance_hospital_name" placeholder="ছাড়পত্র ইস্যুকারী হাসপাতালের নাম">
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="font-weight-bold">ছাড়পত্র :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input class="form-control" type="file" id="clearance" name="clearance">
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="font-weight-bold">বিভাগীয় চিকিৎসকের সুপারিশপত্র (বাহিরের চিকিৎসকের পরামর্শ গ্রহণের ক্ষেত্রে) :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input class="form-control" type="file" id="doctor_recommendation" name="doctor_recommendation">
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="font-weight-bold">পি আর এল দপ্তরাদেশ :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input class="form-control" type="file" id="PRL" name="PRL">
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="font-weight-bold">বহি: বাংলাদেশ দপ্তরের আদেশ (বিদেশে চিকিৎসার ক্ষেত্রে) :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input class="form-control" type="file" id="bd_office_order" name="bd_office_order">
                                </div>
                            </div>
                        </div>

                        <!-- accident -->
                        <div id="accident_field" style="display: none;">
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="font-weight-bold">দূর্ঘটনার বিবরণ :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <textarea class="form-control" name="accident_name" id="accident_name" cols="40" rows="2" placeholder="দূর্ঘটনার বিবরণ"></textarea>
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="font-weight-bold">দূর্ঘটনার তারিখ :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input class="form-control" type="date" id="accident_date" name="accident_date" placeholder="দূর্ঘটনার তারিখ">
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="font-weight-bold">দূর্ঘটনার স্থান :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input class="form-control" type="text" id="accident_place" name="accident_place" placeholder="দূর্ঘটনার স্থান">
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="font-weight-bold">তদন্তকারী বোর্ডের সুপারিশ :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input class="form-control" type="file" id="inquiry" name="inquiry" placeholder="তদন্তকারী বোর্ডের সুপারিশ">
                                </div>
                            </div>
                        </div>

                        <!-- child birth -->
                        <div id="child_birth_no_container" style="display: none;">
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="font-weight-bold">১ম সন্তানের জন্মতারিখ :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input class="form-control" type="date" id="child_birthdate" name="child_birthdate">
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="font-weight-bold">দপ্তর প্রধানের প্রত্যায়নপত্র :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input class="form-control" type="file" id="headofc_affidavit" name="headofc_affidavit" placeholder="দপ্তর প্রধানের প্রত্যায়নপত্র">
                                </div>
                            </div>
                        </div>
                        <!-- end treatment -->
                        

                    </div> 


                    <div class="row" id="treatment_table" style="display: none;">

                        <div class="col-md-12">
                            <div class="" style="width:fit-content; margin: 0 auto;">
                                <div class="card-body">
                                    
                                        <table id="orders" class="table table-bordered" style="width:100%">
                                            <thead class="">
                                                <tr>
                                                    <th style="color: black;">ক্রমিক নং</th>
                                                    <th style="color: black;">ভাউচার নং</th>
                                                    <th style="color: black;">তারিখ</th>
                                                    <th style="color: black;">টাকার পরিমাণ</th>
                                                    <th style="color: black;">ফাইল সংযুক্তকরণ</th>
                                                    <th style="color: black;"></th>
                                                 
                                            </thead>
                                            <tbody style="background-color: f4f4f4;">
                                                <tr id="row">
            
                                                    <td>
                                                        <input style="border: 1px solid #787474;" class="form-control sl_no" type='number' data-type="sl_no" id='sl_no[]' name='sl_no[]' placeholder='ক্রমিক নং' />
                                                    </td>
            
                                                    <td>
                                                        <input style="border: 1px solid #787474;" class="form-control voucher_no" type='text' data-type="voucher_no" id='voucher_no[]' name='voucher_no[]' placeholder='ভাউচার নং' />
                                                    </td>
            
                                                    <td>
                                                        <input style="border: 1px solid #787474;" class="form-control date" type='date' data-type="date" id='date[]' name='date[]' placeholder='তারিখ' />
                                                    </td>
            
                                                    <td>
                                                        <input style="border: 1px solid #787474;" class="form-control amount" type='number' data-type="amount" id='amount[]' name='amount[]' placeholder='টাকার পরিমাণ' />
                                                    </td>
            
                                                    <td>
                                                        <input style="border: 1px solid #787474;" class="form-control file" type='file' data-type="file" id='file' name='file' for="1" />
                                                    </td>
            
                                                </tr>

                                                <tr id="totalRow">
                                                    <td colspan="3" class="text-right">মোট টাকার পরিমাণ :</td>
                                                    <td id="totalAmount" class="text-right"></td>
                                                    <input type="hidden" name="claim_amount" id="totalAmountInput">
                                                </tr>
                                                
                                            </tbody>
                                            
                                        </table>

                                    <div>
                                        <button type="button" name="add" id="add" class="btn btn-success circle">Add</button>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="m-3">এতদ্বারা প্রত্যয়ন করা যাচ্ছে যে, আমার নিজ/ স্বামী/ স্ত্রী/ মেয়ে/ পিতা/ মাতা আমার সাথে বসবাস করে এবং সম্পূর্ণরুপে আমার উপর নির্ভরশীল । </h6>
                        </div>

                        <div class="row m-3">

                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <label for="text" class="font-weight-bold">কর্মকর্তা/ কর্মচারীর সাক্ষর :</label>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-12">
                                        <input type="text" class="form-control" name="employee_sign" id="employee_sign" placeholder="কর্মকর্তা/ কর্মচারীর সাক্ষর" value="{{ $user->name }}">
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="row m-3">
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <label for="text" class="font-weight-bold">তারিখ :</label>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-12">
                                        <input type="date" class="form-control" name="employee_date" id="employee_date" placeholder="তারিখ" value="{{ date('Y-m-d') }}">
                                    </div>
                                </div>
                            </div>
    
                        </div> 


                    </div>


                    <div class="col text-center">
                        <button class="btn btn-success m-3" onclick="validateForm()">Submit</button>
                    </div>


                    </div>
                </form>
            </div>
           
        </div>
    </div>

    

    <div class="container pt-5">
        <div class="row"></div>
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
                                            <th class="align-middle text-center text-sm">ক্রমিক নং</th>
                                            <th class="align-middle text-center text-sm">নাম, পদবী ও দপ্তর</th>
                                            <th class="align-middle text-center text-sm">অনুদান প্রার্থনার কারণ </th>
                                            <th class="align-middle text-center text-sm">ইতোপূর্বে অনুদান পাইয়া থাকলে তাহার বিবরণ (দপ্তরাদেশ নং ও তারিখ)</th>
                                            <th class="align-middle text-center text-sm">নিয়ন্ত্রণকারী কর্মকর্তার সুপারিশ</th>
                                            <th class="align-middle text-center text-sm">অবস্থা</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $sl=1; ?>
                                        @foreach ($applications as $applicationlist)
                                        <tr>
                                            <td class="align-middle text-center text-sm">{{ $sl }}</td>
                                            <td class="align-middle text-center text-sm">{{ $applicationlist->employee_name }} <br> {{ $applicationlist->designation }} <br> {{ $applicationlist->office_name }}</td>
                                            <td class="align-middle text-center text-sm">{{ $applicationlist->applicant_reason }}</td>
                                            <td class="align-middle text-center text-sm">{{ $applicationlist->applicant_date }}</td>
                                            <td class="align-middle text-center text-sm">{{ $applicationlist->controller_officer_name }} <br> {{ $applicationlist->controller_officer_designation }}</td>
                                            <td class="align-middle text-center text-sm">{{ $applicationlist->status }}</td>
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


<script>
    document.getElementById('relation_name').addEventListener('change', function() {
        var selectedRelation = this.value;
        var patientNameField = document.getElementById('patient_name');
        
        if (selectedRelation === 'নিজ') {
            var userName = '{{ $user->name }}';
            patientNameField.value = userName;
        } else {
            patientNameField.value = '';
        }
    });
</script>


<!-- <script>
    function validateForm() {
    var form = document.getElementById("myForm");
    var inputs = form.querySelectorAll("input[type='text']");

    for (var i = 0; i < inputs.length; i++) {
        if (inputs[i].value.trim() === "") {
        // Display error message
        alert("Please fill in all fields.");
        return false; // Prevent form submission
        }
    }

    // All fields are filled, submit the form
    form.submit();
    }
</script> -->


@endsection