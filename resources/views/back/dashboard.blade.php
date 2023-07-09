@extends('back.mastering.master')
    @section('content')
        <!-- Page Heading -->
        <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 p-2" style="background-color:#6495ED; color: white; text-align:justify; font-weight: bold; font-family:serif;">ড্যাশবোর্ড</h1>
        </div> -->

        <!-- <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('application') }}">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="font-weight-bold text-primary text-uppercase mb-1">
                                    নতুন আবেদন
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-folder-closed fa-beat fa-2xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('applicationList') }}">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="font-weight-bold text-success text-uppercase mb-1">
                                    আবেদনের তালিকা
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-list fa-beat fa-2xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div> -->

        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <h1 class="h6 mb-0 p-2" style="background-color:#6495ED; color: white; text-align:justify; font-weight: bold; font-family:serif;">নতুন আবেদন :</h1>
        </div>

        <div class="col-sm-6 col-xl-3">
            <a href="{{ route('treatment.application') }}" class="underline">
                <div class="card bg-primary rounded overflow-hidden h-100">
                    <div class="card-body d-flex align-items-center" style="height: 100px;">
                        <i class="fas fa-hospital fa-2x text-white mb-10"></i>
                        <div class="ms-4">
                            <p class="text-sm text-white mb-2">চিকিৎসা</p>
                        </div>
                    </div>
                    <div id="ch1" class="card-footer height-50"></div>
                </div>
            </a>
        </div>

        <div class="col-sm-6 col-xl-3">
            <a href="{{ route('daughterMarriage.application') }}" class="underline">
                <div class="card bg-success rounded overflow-hidden h-100">
                    <div class="card-body d-flex align-items-center" style="height: 100px;">
                        <i class="fas fa-circle-notch fa-2x text-white mb-10"></i>
                        <div class="ms-4">
                            <p class="text-sm text-white mb-2">মেয়ের বিবাহ</p>
                        </div>
                    </div>
                    <div id="ch3" class="card-footer height-50"></div>
                </div>
            </a>
        </div>

        <div class="col-sm-6 col-xl-3">
            <a href="{{ route('meritocracy.application') }}" class="underline">
                <div class="card bg-info rounded overflow-hidden h-100">
                    <div class="card-body d-flex align-items-center" style="height: 100px;">
                        <i class="fas fa-school fa-2x text-white mb-10"></i>
                        <div class="ms-4">
                            <p class="text-sm text-white mb-2">মেধাবৃত্তি</p>
                        </div>
                    </div>
                    <div id="ch2" class="card-footer height-50"></div>
                </div>
            </a>
        </div>

        <div class="col-sm-6 col-xl-3">
            <a href="{{ route('deadbody.application') }}" class="underline">
                <div class="card bg-warning rounded overflow-hidden h-100">
                    <div class="card-body d-flex align-items-center" style="height: 100px;">
                        <i class="fas fa-book-skull fa-2x text-white mb-10"></i>
                        <div class="ms-4">
                            <p class="text-sm text-white mb-2">লাশ পরিবহন</p>
                        </div>
                    </div>
                    <div id="ch4" class="card-footer height-50"></div>
                </div>
            </a>
        </div>


        <div class="d-sm-flex align-items-center justify-content-between mb-2 mt-4">
            <h1 class="h6 mb-0 p-2" style="background-color:#6495ED; color: white; text-align:justify; font-weight: bold; font-family:serif;">আবেদন ট্র্যাকার :</h1>
        </div>



        <!-- <div class="container mx-auto px-6 py-1 pb-16">
            <div class="bg-white shadow-md rounded my-6 p-5">
            <form method="POST" action="{{ route('store.user') }}" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col space-y-2">
                <label for="users" class="text-gray-700 select-none font-medium">Users Data</label>
                <input id="users" type="file" accept=".xlsx, .xls, .csv" name="users" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                />
                </div>

                <div class="text-center mt-16 mb-16">
                <button type="submit" class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors">Submit</button>
                </div>
            </form>
            </div>
            
        </div> -->
    @endsection
