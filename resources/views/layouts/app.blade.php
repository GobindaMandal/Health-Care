<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Health Care</title>

        <!-- Bracket CSS -->
        <!-- <link rel="stylesheet" href="{{ asset('back') }}/css/bracket.css"> -->

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <!-- search in dropdown -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <style>
            /* Chrome, Safari, Edge, Opera */
            input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }

            /* Firefox */
            input[type=number] {
                
                -moz-appearance: textfield;
            }

            .underline {
                text-decoration: none;
            }
        </style>

        <!-- dropdown readonly -->
        <style>
            select[readonly] {
            background: #eee;
            pointer-events: none;
            touch-action: none;
            }
            .no-border {
                border: none;
            }
        </style>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

        <script src="{{ asset('back') }}/assets/js/core/jquery.min.js"></script>


        <!-- multiple row -->
        <script>
            let rowCount = 1;

            $(document).ready(function() {
                var rowCount = 1;

                $('#add').click(function() {
                    rowCount++;
                    $('#orders').append(
                        "<tr id='row" + rowCount + "'>" +
                        "<td><input class='form-control sl_no' type='number' id='sl_no[]_" + rowCount + "' name='sl_no[]_" + rowCount + "' for='" + rowCount + "'  placeholder='ক্রমিক নং_" + rowCount + "' /></td>" +
                        "<td><input class='form-control voucher_no' type='number' id='voucher_no[]_" + rowCount + "' name='voucher_no[]_" + rowCount + "' for='" + rowCount + "' placeholder='ভাউচার নং_" + rowCount + "'   /></td>" +
                        "<td><input class='form-control date' type='date' id='date[]_" + rowCount + "' name='date[]_" + rowCount + "' for='" + rowCount + "' placeholder='তারিখ_" + rowCount + "'   /></td>" +
                        "<td><input class='form-control amount' type='number' id='amount[]_" + rowCount + "' name='amount[]_" + rowCount + "' for='" + rowCount + "' placeholder='টাকার পরিমাণ_" + rowCount + "'   /></td>" +
                        "<td><input class='form-control file' type='file' id='file_" + rowCount + "' name='file_" + rowCount + "' for='" + rowCount + "'    /></td>" +
                        "<td><button type='button' name='remove' id='" + rowCount + "' class='btn btn-danger btn_remove cicle'>-</button></td>" +
                        "</tr>"
                    );

                $('#orders').append($('#totalRow'));

                    calculateTotalAmount();
                });

                // Event listener for amount inputs
                $(document).on('input', '.amount', function() {
                    calculateTotalAmount();
                });

                /* Remove row */
                $(document).on('click', '.btn_remove', function() {
                    $(this).closest('tr').remove();
                    calculateTotalAmount();
                });

                function calculateTotalAmount() {
                    var total = 0;
                    $('.amount').each(function() {
                        var amount = parseFloat($(this).val());
                        if (!isNaN(amount)) {
                            total += amount;
                        }
                    });
                    $('#totalAmount').text(total.toFixed(2));
                }
            });
        </script>

        <script>
            var reasonDropdown = document.getElementById("applicant_reason");
            var accident_field = document.getElementById("accident_field");

            reasonDropdown.addEventListener("change", function() {
                var selectedReason = reasonDropdown.options[reasonDropdown.selectedIndex].value;

                if (selectedReason === "বৈদ্যুতিক দূর্ঘটনা" || selectedReason === "সড়ক দূর্ঘটনা") {
                    accident_field.style.display = "block";
                } else {
                    accident_field.style.display = "none";
                }
            });
        </script>

        <script>
            var totalAmount = 0;

            for (var i = 0; i < rowCount; i++) {
            var inputId = 'amount[]_' + i;
            var input = document.getElementById(inputId);

            if (input) {
                var inputValue = parseFloat(input.value);

                if (!isNaN(inputValue)) {
                totalAmount += inputValue;
                }
            }
            }
            console.log('Total Amount:', totalAmount);
        </script>


        <!-- data table -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

        <script>
            $(document).ready(function () {
                $('#dataTable').DataTable({
                    ordering: false
                });
            });
        </script>

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>


        <!-- search in dropdown -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.select2').select2({
                    placeholder: '---Select Office---'
                });
            });
        </script>

        <style>
            .select2-container--default .select2-selection--single {
                height: 40px !important;
                display: flex;
                align-items: center;
                height: 100%;
            }

            .select2-container--default .select2-selection--single .select2-selection__arrow {
                height: 100%;
                display: flex;
                align-items: center;
                margin-left: 5px;
            }
        </style>


        <!-- Include Lightbox2 JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

        <!-- Include Lightbox2 CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">

        <script>
            lightbox.option({
                'resizeDuration': 200,
                'wrapAround': true,
                'fadeDuration': 300,
                'imageFadeDuration': 300,
            });
        </script>

    </head>
    <body class="font-sans antialiased">
        <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200">
            <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false" class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden"></div>
        
            @include('layouts.sidebar')

            <div class="flex-1 flex flex-col overflow-scroll">

                    @include('layouts.header')

                    @if(\Session::has('success'))
                        <div class="text-green-600 pt-5 pl-5">
                            <ul>
                                <li>{!! \Session::get('success') !!}</li>
                            </ul>
                        </div>
                    @endif
                    
                    @if(\Session::has('error'))
                        <div class="text-green-600 pt-5 pl-5">
                            <ul>
                                <li>{!! \Session::get('error') !!}</li>
                            </ul>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="text-red-600  pt-5 pl-5">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{ $slot }}
                    
            </div>
        </div>
    </body>
</html>
