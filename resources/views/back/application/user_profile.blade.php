@extends('back.mastering.master')
    @section('content')
    <div class="container">
        <div class="row"></div>
        <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12">
            <div class="card">
                <header>
                    <h5 style="text-align: center;margin-top: 20px;">(Update Your Profile)</h5>
    
                </header>
          

            <div class="form-body">
                <form action="{{ route('store.front_profile') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row m-3">

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="text-center font-weight-bold">নাম :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="নাম" value="{{ $user->name }}">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="text-center font-weight-bold">অফিসের নাম :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <select class="form-control select2" name="office_name" id="office_name">
                                        <option value=""></option>
                                        @foreach($offices as $office)
                                        <option value="{{ $office->office_name }}" {{$office->office_name == $user->office_name  ? 'selected' : ''}}>{{ $office->office_name }}~{{ $office->office_code }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row m-3">

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="text-center font-weight-bold">ই আর পি নম্বর :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input type="number" class="form-control" name="ERP_number" id="ERP_number" placeholder="ই আর পি নম্বর" value="{{ $user->ERP_number }}">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="text-center font-weight-bold">পদবী :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input type="text" class="form-control" name="designation" id="designation" placeholder="পদবী" value="{{ $user->designation }}">
                                </div>
                            </div>
                        </div>

                    </div> 

                    <div class="row m-3">
            
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="text-center font-weight-bold">যোগদানের তারিখ :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input type="date" class="form-control" name="joining_date" id="joining_date" value="{{ $user->joining_date }}">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="text-center font-weight-bold">গ্রেড :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input type="text" class="form-control" name="grade" id="grade" placeholder="গ্রেড" value="{{ $user->grade }}">
                                </div>
                            </div>
                        </div>

                    </div> 

                    <div class="row m-3">

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="text-center font-weight-bold">মোবাইল নং :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input type="number" class="form-control" name="number" id="number" placeholder="মোবাইল নং" value="{{ $user->number }}">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row ">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <label for="text" class="text-center font-weight-bold">ইমেইল :</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="ইমেইল" value="{{ $user->email }}">
                                </div>
                            </div>
                        </div>

                    </div>  


                    <div class="col text-center">
                        <button class="btn btn-success m-3">Submit</button>
                    </div>


                    </div>
                </form>
            </div>
           
        </div>
    </div>
    @endsection
