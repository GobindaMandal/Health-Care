<x-app-layout>
  <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
      <div class="container mx-auto px-6 py-2">

        <div class="p-3 bg-white shadow-md rounded my-6">
          <form action="{{ route('filter.committeesApplication') }}" method="GET">
            <div class="row mb-3">
              <div class="col-md-2">
                <label class="pb-1 text-sm font-bold" for="">ই আর পি নম্বর :</label>
                <input type="number" class="form-control form-control-sm text-sm" name="ERP_number" id="ERP_number" placeholder="ই আর পি নম্বর">
              </div>

              <div class="col-md-2">
                <label class="pb-1 text-sm font-bold" for="">আবেদনের খাত :</label>
                <select class="form-control form-control-sm text-sm" name="applicant_reason" id="applicant_reason">
                  <option value="">---আবেদনের খাত---</option>
                  @foreach($applicant_reason as $applicant_reason)
                  <option value="{{ $applicant_reason->applicant_reason }}">{{ $applicant_reason->applicant_reason }}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-md-2" id="help_type_container" style="display: none;">
                <label class="pb-1 text-sm font-bold" for="">আবেদনের ধরণ :</label>
                <select class="form-control form-control-sm text-sm" name="help_type" id="help_type">
                  <option value="">---সাহায্যের ধরণ---</option>
                  @foreach($help_type as $help_type)
                  <option value="{{ $help_type->help_name }}">{{ $help_type->help_name }}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-md-2" id="treatment_type_container" style="display: none;">
                <label class="pb-1 text-sm font-bold" for="">আবেদনের ধরণ :</label>
                <select class="form-control form-control-sm text-sm" name="treatment_type" id="treatment_type">
                  <option value="">---চিকিৎসার ধরণ---</option>
                  @foreach($treatment_type as $treatment_type)
                  <option value="{{ $treatment_type->treatment_name }}">{{ $treatment_type->treatment_name }}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-md-2">
              <label class="pb-1 text-sm font-bold" for="">অর্থ-বছর :</label>
                <select id="filter-year" name="year" class="form-control form-control-sm text-sm">
                  <option value="">---Select Year---</option>
                  @php
                      $currentYear = date('Y');
                      $startYear = $currentYear - 1;
                      $endYear = $currentYear;
                  @endphp
                  @for($i = 0; $i < 8; $i++)
                      @php
                          $fiscalYear = $startYear . '-' . $endYear;
                          $startYear--;
                          $endYear--;
                      @endphp
                      <option value="{{ $fiscalYear }}" @if(request()->input('year', $currentYear) == $fiscalYear) selected @endif>{{ $fiscalYear }}</option>
                  @endfor
                </select>
              </div>

              <div class="col-md-1">
                <label class="pb-1 text-sm" for=""></label>
                <button id="filterBtn" class="btn btn-primary btn-sm form-control form-control-sm text-sm">Filter</button>
              </div>
            </div>
          </form>

          <table id="dataTable" class="table table-bordered text-left w-full border-collapse">
            <thead>
              <tr>
                <th class="align-middle text-center text-sm">ক্রমিক নং <br> <input class="ml-4 d-block" type="checkbox" id="select-all"></th>
                <th class="align-middle text-center text-sm">আবেদনকারীর নাম, পদবী ও দপ্তর</th>
                <th class="align-middle text-center text-sm">অত্র দপ্তরের রিসিভ নং ও তারিখ</th>
                <th class="align-middle text-center text-sm">ই আর পি নম্বর</th>
                <th class="align-middle text-center text-sm">সম্পর্ক</th>
                <th class="align-middle text-center text-sm">আবেদনের খাত</th>
                <th class="align-middle text-center text-sm">আবেদনের ধরণ</th>
                <th class="align-middle text-center text-sm">দাবিকৃত অনুদানের পরিমান</th>
                <th class="align-middle text-center text-sm">স্ট্যাটাস</th>
                <th class="align-middle text-center text-sm">অ্যাকশন</th>
              </tr>
            </thead>
            <tbody>
              @can('Committees application access')
                <?php $sl=1; ?>
                @foreach($reports as $report)
                <tr>
                  <td class="align-middle text-center text-sm"><input type="checkbox" class="mr-3 select-checkbox">{{ $sl }}</td>
                  <td class="align-middle text-center text-sm">{{ $report->employee_name }} <br> {{  $report->designation}} <br> {{ $report->office_name }}</td>
                  <td class="align-middle text-center text-sm">{{ $report->applicant_date }}</td>
                  <td class="align-middle text-center text-sm">{{ $report->ERP_number }}</td>
                  <td class="align-middle text-center text-sm">{{ $report->relation_name }}</td>
                  <td class="align-middle text-center text-sm">{{ $report->applicant_reason }}</td>
                  <td class="align-middle text-center text-sm">{{ $report->application_type }}</td>
                  @if(isset($report->claim_amount))
                  <td class="align-middle text-center text-sm">{{ $report->claim_amount }}</td>
                  @endif
                  @foreach($report->daughterMarriage as $daughterMarriage)
                  <td class="align-middle text-center text-sm">{{ $daughterMarriage->amount }}</td>
                  @endforeach
                  @foreach($report->meritocracy as $meritocracy)
                  <td class="align-middle text-center text-sm">{{ $meritocracy->amount }}</td>
                  @endforeach
                  @foreach($report->deadbody as $deadbody)
                  <td class="align-middle text-center text-sm">{{ $deadbody->amount }}</td>
                  @endforeach
                  <td class="align-middle text-center text-sm">
                      @if($report->status=='controller_approved')
                      <span class="text-white inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-white bg-gray-500 rounded-full">Draft</span>
                      @elseif($report->status=='committee_rejected')
                      <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-white bg-red-500 rounded-full">Rejected</span>
                      @else
                      <span class="text-white inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-white bg-green-500 rounded-full">Approved</span>
                      @endif
                  </td>
                  <td class="align-middle text-center text-sm">
                    @can('Committees application edit')
                    <a href="{{route('viewReport.committeesApplication',$report->id)}}" class="ml-2"><i class="fa-sharp fa-regular fa-eye"></i></a>
                    @endcan
                  </td>
                </tr>
                <?php $sl++; ?>
                @endforeach
              @endcan
            </tbody>
          </table>
      </div>
  </main>
</div>
</x-app-layout>


<!-- filter -->
<script>
  $(document).ready(function() {
    $('#applicant_reason').change(function() {
      var selectedValue = $(this).val();
      
      if (selectedValue === 'কল্যাণ ও চিত্তবিনোদন') {
        $('#help_type_container').show();
      } else {
        $('#help_type_container').hide();
      }

      if (selectedValue === 'চিকিৎসা') {
        $('#treatment_type_container').show();
      } else {
        $('#treatment_type_container').hide();
      }

    });
  });
</script>

<!-- checkbox -->
<script>
  const selectAllCheckbox = document.getElementById('select-all');
  const checkboxes = document.getElementsByClassName('select-checkbox');

  selectAllCheckbox.addEventListener('change', function() {
    for (let i = 0; i < checkboxes.length; i++) {
      checkboxes[i].checked = this.checked;
    }
  });
</script>