<x-app-layout>
  <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
      <div class="container mx-auto px-6 py-2">

        <div class="p-3 bg-white shadow-md rounded my-6">
          <form action="{{ route('managementFilter') }}" method="GET">
            <div class="row mb-3">
              <div class="col-md-3">
                <label class="pb-1 text-sm font-bold" for="">আবেদন-সমূহ :</label>
                <select class="form-control form-control-sm text-sm" name="application_type" id="application_type">
                  <option value="">-----আবেদন নির্বাচন করুন-----</option>
                  @foreach($applicant_reason as $application_type)
                  <option value="{{ $application_type->applicant_reason }}">{{ $application_type->applicant_reason }}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-md-1">
                <label class="pb-1 text-sm" for=""></label>
                <button class="btn btn-primary btn-sm form-control form-control-sm text-sm">Filter</button>
              </div>
            </div>
          </form>

          <form action="{{ route('update.managementAmount') }}" method="POST">
            @csrf
            <table id="dataTable" class="table table-bordered text-left w-full border-collapse">
              <thead>
                <tr>
                  <th class="align-middle text-center text-sm">ক্রমিক নং</th>
                  <th class="align-middle text-center text-sm">আবেদনকারীর নাম, পদবী ও দপ্তর</th>
                  <th class="align-middle text-center text-sm">অত্র দপ্তরের রিসিভ নং ও তারিখ</th>
                  <th class="align-middle text-center text-sm">রোগীর সঙ্গে সম্পর্ক</th>
                  <th class="align-middle text-center text-sm">রোগের বিবরণ ও হাসপাতালের নাম</th>
                  <th class="align-middle text-center text-sm">দাখিলকৃত ও পরীক্ষান্তে বিলের পরিমাণ</th>
                  <th class="align-middle text-center text-sm">অনুমোদিত অনুদানের পরিমান</th>
                  <th class="align-middle text-center text-sm">সুপারিশকৃত অনুদানের পরিমান</th>
                  <th class="align-middle text-center text-sm w-2/12">অ্যাকশন</th>
                </tr>
              </thead>
              <tbody>
                @can('Managements application access')
                  <?php $sl=1; ?>
                  @foreach($managements_application as $application)
                  <tr>
                    <td class="align-middle text-center text-sm">{{ $sl }}</td>
                    <td class="align-middle text-center text-sm">{{ $application->employee_name }} <br> {{ $application->designation }} <br> {{ $application->office_name }}</td>
                    <td class="align-middle text-center text-sm">{{ $application->applicant_date }}</td>
                    <td class="align-middle text-center text-sm">{{ $application->relation_name }}</td>
                    @foreach($application->patientForm as $patientForm)
                    <td class="align-middle text-center text-sm">{{ $patientForm->disease_name }} <br> {{ $patientForm->hospital_name }}</td>
                    @endforeach
                    <td class="align-middle text-center text-sm">দা: {{ $application->claim_amount }} <br> প: {{ $application->total_amount }}</td>

                    <input type="hidden" name="id[]" value="{{ $application->id }}">
                    
                    <td class="align-middle text-center text-sm">
                        <input class="text-sm form-control" type="number" id="approved_amount" name="approved_amount[{{ $loop->index }}]" placeholder="amount" value="{{ $application->approved_amount }}" oninput="toggleAllowedAmount(this)" @if($application->approved_amount) readonly @endif>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <input class="text-sm form-control" type="number" id="allowed_amount" name="allowed_amount[{{ $loop->index }}]" placeholder="amount" value="{{ $application->allowed_amount }}" oninput="toggleApprovedAmount(this)" @if($application->allowed_amount) readonly @endif>
                    </td>

                    <td class="align-middle text-center text-sm">
                      <button type="submit" class="btn btn-primary btn-sm mr-2">Save</button>
                      @can('Managements application edit')
                      <a href="{{route('edit.managementsApplication',$application->id)}}" class="ml-2"><i class="fa-sharp fa-regular fa-eye"></i></a>
                      @endcan
                    </td>
                  </tr>
                  <?php $sl++; ?>
                  @endforeach
                @endcan
              </tbody>
            </table>
          </form>
      </div>
  </main>
</div>
</x-app-layout>


<!-- toggle readonly -->
<script>
  function toggleApprovedAmount(element) {
    var approvedAmountInput = element.closest('tr').querySelector('input[name^="approved_amount"]');
    approvedAmountInput.readOnly = element.value.trim() !== '';

    if (element.value.trim() === '') {
      approvedAmountInput.readOnly = false; // Remove readonly attribute if no value
    }
  }

  function toggleAllowedAmount(element) {
    var allowedAmountInput = element.closest('tr').querySelector('input[name^="allowed_amount"]');
    allowedAmountInput.readOnly = element.value.trim() !== '';

    if (element.value.trim() === '') {
      allowedAmountInput.readOnly = false; // Remove readonly attribute if no value
    }
  }

  // Call the toggle functions initially to set the readonly attribute based on existing values
  var allowedAmountInputs = document.querySelectorAll('input[name^="allowed_amount"]');
  var approvedAmountInputs = document.querySelectorAll('input[name^="approved_amount"]');

  allowedAmountInputs.forEach(function (input) {
    toggleApprovedAmount(input);
  });

  approvedAmountInputs.forEach(function (input) {
    toggleAllowedAmount(input);
  });
</script>