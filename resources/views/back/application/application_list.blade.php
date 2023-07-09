@extends('back.mastering.master')
    @section('content')
    <div class="container">
        <div class="row"></div>
        <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12">
            <div class="card">
                <header>
                    <h3 style="text-align: center;margin-top: 20px;">বাংলাদেশ বিদ্যুৎ উন্নয়ন বোর্ড </h3>
                    <!-- <h4 style="text-align: center;margin-top: 20px;"> চিকিৎসা প্রতিপূরণ "বিল ফরম-৭" </h4>
                    <div class="table2">
                        <h4 style="text-align: center; ">কল্যাণ তহবিল হতে অনুদান প্রাপ্তির আবেদন (নমুনা ছখ 'ঘ')</h4>
                    </div> -->
    
                </header>


                <div class="form-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                
                                <table id="orders" class="table table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="align-middle text-center text-sm">ক্রমিক নং</th>
                                            <th class="align-middle text-center text-sm">নাম, পদবী ও দপ্তর</th>
                                            <th class="align-middle text-center text-sm">আবেদনের তারিখ</th>
                                            <th class="align-middle text-center text-sm">অনুদান প্রার্থনার কারণ </th>
                                            <th class="align-middle text-center text-sm">অবস্থা</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $sl=1; ?>
                                        @foreach ($applicationlists as $applicationlist)
                                        <tr>
                                            <td class="align-middle text-center text-sm">{{ $sl }}</td>
                                            <td class="align-middle text-center text-sm">{{ $applicationlist->employee_name }} <br> {{ $applicationlist->designation }} <br> {{ $applicationlist->office_name }}</td>
                                            <td class="align-middle text-center text-sm">{{ $applicationlist->applicant_date }}</td>
                                            <td class="align-middle text-center text-sm">{{ $applicationlist->applicant_reason }}</td>
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
@endsection