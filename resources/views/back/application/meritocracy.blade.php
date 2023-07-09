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
                                    <input type="text" class="form-control" name="applicant_reason" id="applicant_reason" placeholder="আবেদনের খাত" value="কল্যাণ ও চিত্তবিনোদন">
                                    <span class="text-danger">
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
                        <div class="col-lg-6 col-md-6 col-sm-12" id="help_type_container">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="font-weight-bold">সাহায্যের ধরণ :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input type="text" class="form-control" name="help_type" id="help_type" placeholder="সাহায্যের ধরণ" value="মেধাবৃত্তি">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <hr> -->

                    <div class="row m-3">

                        <!-- meritocracy -->
                        <div id="meritocracy">
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


@endsection