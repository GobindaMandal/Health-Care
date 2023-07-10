<x-app-layout>
    <div class="container mx-auto px-6 py-2">
        <div class="row"></div>
        <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12">
            <div class="card">
                <header>
                    <h3 style="text-align: center;margin-top: 20px;">বাংলাদেশ বিদ্যুৎ উন্নয়ন বোর্ড </h3>
                    <h4 style="text-align: center;margin-top: 20px;"> চিকিৎসা প্রতিপূরণ "বিল ফরম-৭" </h4>
                </header>

            <hr>
            <div class="form-body">
                <form action="{{ route('update.committeesApplication', $committees_application->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row m-3">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">আবেদনের তারিখ :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <span>{{ $committees_application->applicant_date }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">অর্থ-বছর :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <span>{{ $committees_application->fiscal_year }}</span>
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
                                    <span>{{ $committees_application->office_name }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">কর্মকর্তা/ কর্মচারীর নাম :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <span>{{ $committees_application->employee_name }}</span>
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
                                    <span>{{ $committees_application->ERP_number }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">পদবী :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <span>{{ $committees_application->designation }}</span>
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
                                    <span>{{ $committees_application->joining_date }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">গ্রেড :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <span>{{ $committees_application->grade }}</span>
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
                                    <span>{{ $committees_application->number }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">ইমেইল :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <span>{{ $committees_application->email }}</span>
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
                                    <a href="{{ asset('back/applicationform/'.$committees_application->nid) }}" data-lightbox="image">
                                        <img src="{{ asset('back/applicationform/'.$committees_application->nid) }}" alt="" width="50" />
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
                                    <a href="{{ asset('back/applicationform/'.$committees_application->bubo) }}" data-lightbox="image">
                                        <img src="{{ asset('back/applicationform/'.$committees_application->bubo) }}" alt="" width="50" />
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
                                    <span>{{ $committees_application->applicant_reason }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">সম্পর্ক :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <span>{{ $committees_application->relation_name }}</span>
                                </div>
                            </div>
                        </div>
                    </div> 

                    @if($committees_application->applicant_reason === 'কল্যাণ ও চিত্তবিনোদন')
                    <div class="row m-3">
                        <div class="col-lg-6 col-md-6 col-sm-12" id="help_type_container" style="display: block;">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">আবেদনের ধরণ :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <span>{{ $committees_application->application_type }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @foreach($committees_application1 as $application)
                    @if($application->treatment_type)
                    <div class="row m-3">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">চিকিৎসার ধরণ :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <span>{{ $application->treatment_type }}</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">রোগীর নাম :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <span>{{ $application->patient_name }}</span>
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

                    @foreach($committees_application1 as $application)
                    @if($application->child_birth)
                    <div class="row m-3">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">সন্তানের ক্রমিক নং :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <span>{{ $application->child_birth }}</span>
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
                        @foreach($committees_application4 as $application)
                        @if($application->marriage_date)
                        <div id="daughters_marriage">
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">বিবাহের তারিখ :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <span>{{ $application->marriage_date }}</span>
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
                                    <div class="card-body">
                                        <table id="" class="table table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="align-middle text-center">ক্রমিক নং</th>
                                                    <th class="align-middle text-center">কর্মচারীর নাম, পদবী ও দপ্তর</th>
                                                    <th class="align-middle text-center">সাহায্যের ধরণ</th>
                                                    <th class="align-middle text-center">অনুদানের পরিমাণ</th>
                                            </thead>
                                            <tbody>
                                                <tr id="row">
                                                    <td class="align-middle text-center" style="width: 50px;">
                                                        <?php $sl=1; ?>
                                                        <span>{{ $sl }}</span>
                                                        <?php $sl++; ?>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>{{ $application->employee_details }}</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>{{ $application->help_type }}</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>{{ $application->amount }}</span>
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

                        <!-- meritocracy -->
                        @foreach($committees_application5 as $application)
                        @if($application->class)
                        <div id="meritocracy">
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">শ্রেণী :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <span>{{ $application->class }}</span>
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">পরীক্ষা :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <span>{{ $application->exam }}</span>
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">ফলাফল :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <span>{{ $application->result }}</span>
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
                                    <div class="card-body">
                                        <table id="" class="table table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="align-middle text-center">ক্রমিক নং</th>
                                                    <th class="align-middle text-center">কর্মচারীর নাম, পদবী ও দপ্তর</th>
                                                    <th class="align-middle text-center">সাহায্যের ধরণ</th>
                                                    <th class="align-middle text-center">অনুদানের পরিমাণ</th>
                                            </thead>
                                            <tbody>
                                                <tr id="row">
                                                    <td class="align-middle text-center" style="width: 50px;">
                                                        <?php $sl=1; ?>
                                                        <span>{{ $sl }}</span>
                                                        <?php $sl++; ?>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>{{ $application->employee_details }}</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>{{ $application->help_type }}</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>{{ $application->amount }}</span>
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

                        <!-- deadbody -->
                        @foreach($committees_application6 as $application)
                        @if($application->death_date)
                        <div id="deadbody_cost">
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">ডেথ সার্টিফিকেট ইস্যুর তারিখ :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <span>{{ $application->death_date }}</span>
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">সার্টিফিকেট ইস্যুকারী প্রতিষ্ঠান :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <span>{{ $application->death_institute }}</span>
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
                                                    <th class="align-middle text-center">ক্রমিক নং</th>
                                                    <th class="align-middle text-center">কর্মচারীর নাম, পদবী ও দপ্তর</th>
                                                    <th class="align-middle text-center">সাহায্যের ধরণ</th>
                                                    <th class="align-middle text-center">অনুদানের পরিমাণ</th>
                                            </thead>
                                            <tbody>
                                                <tr id="row">
                                                    <td class="align-middle text-center" style="width: 50px;">
                                                        <?php $sl=1; ?>
                                                        <span>{{ $sl }}</span>
                                                        <?php $sl++; ?>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>{{ $application->employee_details }}</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>{{ $application->help_type }}</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>{{ $application->amount }}</span>
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
                        @foreach($committees_application1 as $application)
                        @if($application->disease_name)
                        <div>
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">রোগের বিবরণ :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <span>{{ $application->disease_name }}</span>
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">হাসপাতালের নাম :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <span>{{ $application->hospital_name }}</span>
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">হাসপাতাল হতে ছাড়পত্রের তারিখ :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <span>{{ $application->clearance_date }}</span>
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">ছাড়পত্র ইস্যুকারী হাসপাতালের নাম :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <span>{{ $application->clearance_hospital_name }}</span>
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
                        @foreach($committees_application1 as $application)
                        @if($application->accident_name)
                        <div id="accident_field">
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">দূর্ঘটনার বিবরণ :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <span>{{ $application->accident_name }}</span>
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">দূর্ঘটনার তারিখ :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <span>{{ $application->accident_date }}</span>
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">দূর্ঘটনার স্থান :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <span>{{ $application->accident_place }}</span>
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
                        @foreach($committees_application1 as $application)
                        @if($application->child_birthdate)
                        <div id="child_birth_no_container">
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">১ম সন্তানের জন্মতারিখ :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <span>{{ $application->child_birthdate }}</span>
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="fw-bold">দপ্তর প্রধানের প্রত্যায়নপত্র :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <a href="{{ asset('back/childbirth/'.$application->headofc_affidavit) }}" data-lightbox="image">
                                        <img src="{{ asset('back/childbirth/'.$application->headofc_affidavit) }}" alt="" width="50" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        <!-- end treatment -->

                    </div> 

                    @if(isset($committees_application3))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                
                                <table id="orders" class="table table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="align-middle text-center">ক্রমিক নং</th>
                                            <th class="align-middle text-center">ভাউচার নং</th>
                                            <th class="align-middle text-center">তারিখ</th>
                                            <th class="align-middle text-center">টাকার পরিমাণ</th>
                                            <th class="align-middle text-center">সংযুক্ত ফাইল</th>
                                            <th class="align-middle text-center">পরীক্ষান্তে বিলের পরিমাণ</th>
                                    </thead>
                                    <tbody>

                                        @foreach($committees_application2 as $application)
                                        <tr id="row">
                                            
                                            <td class="align-middle text-center" style="width: 50px;">
                                                <span>{{ $application->sl_no }}</span>
                                            </td>
    
                                            <td class="align-middle text-center">
                                                <span>{{ $application->voucher_no }}</span>
                                            </td>
    
                                            <td class="align-middle text-center">
                                                <span>{{ $application->date }}</span>
                                            </td>
    
                                            <td class="align-middle text-center">
                                                <span>{{ $application->amount }}</span>
                                            </td>
    
                                            <td class="align-middle text-center">
                                                <a href="{{ asset('back/file/'.$application->file) }}" data-lightbox="image">
                                                    <img src="{{ asset('back/file/'.$application->file) }}" alt="" width="50" style="display: block; margin: auto;" />
                                                </a>
                                            </td>

                                            <td>
                                                <input class="form-control tested_amount" type='number' data-type="tested_amount" id='tested_amount' name='tested_amount' placeholder='বিলের পরিমাণ' value="" />
                                                <span class="text-danger">
                                                    @error('tested_amount')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </td>

                                        </tr>
                                        @endforeach

                                        <tr id="totalRow">
                                            <td colspan="3" class="text-right">দাবিকৃত মোট বিলের পরিমাণ :</td>
                                            <td>
                                                <input readonly class="form-control" type="text" id="claim_amount" name="claim_amount" value="{{ \App\Models\Back\Health_Issue::where('application_id', $committees_application->id)->sum('amount') }}">
                                            </td>
                                            <td></td>
                                        </tr>

                                        <tr id="totalRow">
                                            <td colspan="3" class="text-right">পরীক্ষান্তে মোট বিলের পরিমাণ :</td>
                                            <td>
                                                <input readonly class="form-control" type="text" id="total_amount" name="total_amount" value="{{ \App\Models\Back\Application_Form::where('id', $committees_application->id)->sum('total_amount') }}">
                                            </td>
                                            <td></td>
                                        </tr>

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
                                        <label for="text" class="text-center fw-bold">কর্মকর্তা/ কর্মচারীর সাক্ষর :</label>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-12">
                                        <span>{{ $committees_application->employee_sign }}</span>
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <label for="text" class="text-center fw-bold">তারিখ :</label>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-12">
                                        <span>{{ $committees_application->employee_date }}</span>
                                    </div>
                                </div>
                            </div>
    
                        </div> 

                        
                        <div class="col-md-12">
                            <h6 class="m-3">এতদ্বারা প্রত্যয়ন করা যাচ্ছে যে, উপরে বর্ণিত ভাউচারে অন্তর্ভুক্ত ঔষধ/ ভেষজ ইত্যাদি, যার মূল্য কর্মকর্তা/ কর্মচারীর নিজ/ স্বামী/ স্ত্রী/পুত্র/ কন্যা/ পিতা/ মাতার আরোগ্য এবং শারীরিক অবনতি রোধের জন্য আমার দ্বারা ব্যবস্থিত হয়েছিল এবং প্যাথলজিক্যাল ও রেডিওলজিক্যাল/ চিকিৎসকের পরিদর্শন ও ইনজেকশন প্রয়োগের জন্য প্রয়োজনীয় বিল । </h6>
                        </div>

                        <div class="row m-3">

                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <label for="text" class="text-center fw-bold">অনুমোদিত চিকিৎসকের নাম :</label> 
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-12">
                                        <span>{{ $committees_application->doctor_name }}</span>
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <label for="text" class="text-center fw-bold">পদবী :</label>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-12">
                                        <span>{{ $committees_application->doctor_designation }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <label for="text" class="text-center fw-bold">তারিখ :</label>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-12">
                                        <span>{{ $committees_application->doctor_date }}</span>
                                    </div>
                                </div>
                            </div>
                            
                        </div> 

                        
                        <div class="row m-3">

                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <label for="text" class="text-center fw-bold">নিয়ন্ত্রণকারী কর্মকর্তার নাম :</label> 
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-12">
                                        <span>{{ $committees_application->controller_officer_name }}</span>
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <label for="text" class="text-center fw-bold">পদবী :</label>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-12">
                                        <span>{{ $committees_application->controller_officer_designation }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <label for="text" class="text-center fw-bold">তারিখ :</label>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-12">
                                        <span>{{ $committees_application->controller_officer_date }}</span>
                                    </div>
                                </div>
                            </div>
    
                        </div> 

                    </div>


                    <div class="col text-center">
                        <button type="submit" class="btn btn-success m-3">Accept</button>

                        <!-- <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#rejectModal{{$committees_application->id}}">Reject</button> -->
                    </div>

                    </div>
                </form>

<!-- Reject Modal -->
<div class="modal fade" id="rejectModal{{$committees_application->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rejected Reason</h5>
      </div>
      <div class="modal-body">
        <form action="{{ Route('update.r_committeesApplication', $committees_application->id) }}" method="POST">
            @csrf
            <textarea name="rejected_reason" id="rejected_reason" cols="57" rows="5"></textarea>

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
           

        <div class="pt-3">
            <div class="row">
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
                                                    <th class="align-middle text-center">ক্রমিক নং</th>
                                                    <th class="align-middle text-center">নাম, পদবী ও দপ্তর</th>
                                                    <th class="align-middle text-center">অনুদান প্রার্থনার কারণ </th>
                                                    <!-- <th class="align-middle text-center">ইতোপূর্বে অনুদান পাইয়া থাকলে তাহার বিবরণ (দপ্তরাদেশ নং ও তারিখ)</th> -->
                                                    <th class="align-middle text-center">ইতোপূর্বে অনুদান পাইয়া থাকলে তাহার বিবরণ ও তারিখ</th>
                                                    <th class="align-middle text-center">নিয়ন্ত্রণকারী কর্মকর্তার সুপারিশ</th>
                                                    <th class="align-middle text-center">অবস্থা</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $sl=1; ?>
                                                @foreach ($committees_application10 as $applicationList)
                                                <tr>
                                                    <td class="align-middle text-center">{{ $sl }}</td>
                                                    <td class="align-middle text-center">{{ $applicationList->employee_name }}, {{ $applicationList->designation }}, {{ $applicationList->office_name }}</td>
                                                    <td class="align-middle text-center">{{ $applicationList->applicant_reason }}</td>
                                                    <td class="align-middle text-center">{{ $applicationList->approved_amount }} টাকা, {{ $applicationList->applicant_date }}</td>
                                                    <td class="align-middle text-center">{{ $applicationList->controller_officer_name }}</td>
                                                    <td class="align-middle text-center">{{ $applicationList->status }}</td>
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


<!-- input amount -->
<script>
    $(document).ready(function() {
        $('.tested_amount').on('input', function() {
            calculateTotalAmount();
        });

        function calculateTotalAmount() {
            var total = 0;
            $('.tested_amount').each(function() {
                var amount = parseInt($(this).val());
                if (!isNaN(amount)) {
                    total += amount;
                }
            });
            $('#total_amount').val(total);
        }
    });
</script>


