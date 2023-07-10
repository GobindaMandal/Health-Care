<!-- Bootstrap core JavaScript-->
<script src="{{ asset('back') }}/vendor/jquery/jquery.min.js"></script>
<script src="{{ asset('back') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('back') }}/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('back') }}/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="{{ asset('back') }}/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('back') }}/js/demo/chart-area-demo.js"></script>
<script src="{{ asset('back') }}/js/demo/chart-pie-demo.js"></script>
<script src="{{ asset('back') }}/js/myjs.js"></script>


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
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="{{ asset('back') }}/assets/js/core/jquery.min.js"></script>

<style>
    .underline{
        text-decoration: none;
    }
    .underline:hover{
        text-decoration: none;
    }
</style>


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
                "<td><input class='form-control voucher_no' type='text' id='voucher_no[]_" + rowCount + "' name='voucher_no[]_" + rowCount + "' for='" + rowCount + "' placeholder='ভাউচার নং_" + rowCount + "'   /></td>" +
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
                var amount = parseInt($(this).val());
                if (!isNaN(amount)) {
                    total += amount;
                }
            });
            // var integerTotal = parseInt(total);
            $('#totalAmount').text(total);
        }
    });
</script>

<script>
    // 1st
    var reasonDropdown = document.getElementById("applicant_reason");

    var patient_name_container = document.getElementById("patient_name_container");
    var patient_nid_container = document.getElementById("patient_nid_container");
    var patient_pic_container = document.getElementById("patient_pic_container");
    var treatment_type_container = document.getElementById("treatment_type_container");
    var help_type_container = document.getElementById("help_type_container");
    var treatment_table = document.getElementById("treatment_table");
    var daughters_marriage = document.getElementById("daughters_marriage");
    var deadbody_cost = document.getElementById("deadbody_cost");
    var meritocracy = document.getElementById("meritocracy");
    var hospital_info = document.getElementById("hospital_info");

    reasonDropdown.addEventListener("change", function() {
        var selectedReason = reasonDropdown.options[reasonDropdown.selectedIndex].value;

        if (selectedReason === "চিকিৎসা") {
            patient_name_container.style.display = "block";
            patient_nid_container.style.display = "block";
            patient_pic_container.style.display = "block";
            treatment_type_container.style.display = "block";
            treatment_table.style.display = "block";
            daughters_marriage.style.display = "none";
            meritocracy.style.display = "none";
            deadbody_cost.style.display = "none";
        } else {
            patient_name_container.style.display = "none";
            patient_nid_container.style.display = "none";
            patient_pic_container.style.display = "none";
            treatment_type_container.style.display = "none";
            treatment_table.style.display = "none";
        }

        if (selectedReason === "কল্যাণ ও চিত্তবিনোদন") {
            help_type_container.style.display = "block";
            hospital_info.style.display = "none";
            child_birth_container.style.display = "none";
            maternity_leave_container.style.display = "none";
            accident_field.style.display = "none";
            child_birth_no_container.style.display = "none";
        } else {
            help_type_container.style.display = "none";
        }
    });
    
    // 2nd
    var treatmentDropdown = document.getElementById("treatment_type");
    
    var hospital_info = document.getElementById("hospital_info");
    var child_birth_container = document.getElementById("child_birth_container");
    var maternity_leave_container = document.getElementById("maternity_leave_container");
    var accident_field = document.getElementById("accident_field");

    treatmentDropdown.addEventListener("change", function() {
        var selectedTreatment = treatmentDropdown.options[treatmentDropdown.selectedIndex].value;

        if (selectedTreatment === "শল্য চিকিৎসা" || selectedTreatment === "জটিল, দূরারোগ্য ও ব্যয়বহুল রোগের চিকিৎসা") {
            hospital_info.style.display = "block";
            child_birth_no_container.style.display = "none";
        } else {
            hospital_info.style.display = "none";
        }

        if (selectedTreatment === "সন্তান প্রসব") {
            child_birth_container.style.display = "block";
            maternity_leave_container.style.display = "block";
        } else {
            child_birth_container.style.display = "none";
            maternity_leave_container.style.display = "none";
        }

        if (selectedTreatment === "দূর্ঘটনা") {
            accident_field.style.display = "block";
            child_birth_no_container.style.display = "none";
        } else {
            accident_field.style.display = "none";
        }
    });

    // 3rd
    var treatmentDropdown1 = document.getElementById("child_birth");
    var child_birth_no_container = document.getElementById("child_birth_no_container");

    treatmentDropdown1.addEventListener("change", function() {
        var selectedTreatment = treatmentDropdown1.options[treatmentDropdown1.selectedIndex].value;

        if (selectedTreatment === "২য় সন্তান") {
            child_birth_no_container.style.display = "block";
        } else {
            child_birth_no_container.style.display = "none";
        }
    });

    // 4th
    var helpDropdown = document.getElementById("help_type");

    helpDropdown.addEventListener("change", function() {
        var selectedHelp = helpDropdown.options[helpDropdown.selectedIndex].value;

        if (selectedHelp === "মেয়ের বিবাহ") {
            daughters_marriage.style.display = "block";
            
            hospital_info.style.display = "none";
            accident_field.style.display = "none";
            child_birth_container.style.display = "none";
            maternity_leave_container.style.display = "none";
            child_birth_no_container.style.display = "none";
        } else {
            daughters_marriage.style.display = "none";
        }

        if (selectedHelp === "মেধাবৃত্তি") {
            meritocracy.style.display = "block";

            hospital_info.style.display = "none";
            accident_field.style.display = "none";
            child_birth_container.style.display = "none";
            maternity_leave_container.style.display = "none";
            child_birth_no_container.style.display = "none";
        } else {
            meritocracy.style.display = "none";
        }

        if (selectedHelp === "লাশ পরিবহন ও দাফন-কাফন") {
            deadbody_cost.style.display = "block";

            hospital_info.style.display = "none";
            accident_field.style.display = "none";
            child_birth_container.style.display = "none";
            maternity_leave_container.style.display = "none";
            child_birth_no_container.style.display = "none";
        } else {
            deadbody_cost.style.display = "none";
        }
    });
</script>

<script>
    var totalAmount = 0;

    for (var i = 0; i < rowCount; i++) {
        var inputId = 'amount[]_' + i;
        var input = document.getElementById(inputId);

        if (input) {
            var inputValue = parseInt(input.value);

            if (!isNaN(inputValue)) {
            totalAmount += inputValue;
            }
        }
    }
</script>

<script>
    function updateTotalAmount() {
        var total = 0;
        $('input.amount').each(function() {
            var amount = parseInt($(this).val());
            if (!isNaN(amount)) {
                total += amount;
            }
        });
        $('#totalAmount').text(total);
        $('#totalAmountInput').val(total);
    }

    $(document).ready(function() {
        updateTotalAmount();
        $('input.amount').on('input', function() {
            updateTotalAmount();
        });

        $('form').on('submit', function() {
            updateTotalAmount();
        });
    });
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




