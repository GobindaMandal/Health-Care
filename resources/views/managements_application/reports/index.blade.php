<x-app-layout>
  <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
      <div class="container mx-auto px-6 py-2">

        <div class="p-3 bg-white shadow-md rounded my-6">
          <form action="{{ route('filter.managementsApplication') }}" method="GET">
            <div class="row mb-3">
              <div class="col-md-3">
                <label class="pb-1 text-sm font-bold" for="">আবেদন-সমূহ :</label>
                <select class="form-control form-control-sm text-sm" name="application_type" id="application_type">
                  <option value="">---আবেদনের খাত---</option>
                  @foreach($applicant_reason as $application_type)
                  <option value="{{ $application_type->applicant_reason }}">{{ $application_type->applicant_reason }}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-md-3" id="help_type_container" style="display: none;">
                <label class="pb-1 text-sm font-bold" for="">আবেদনের ধরণ :</label>
                <select class="form-control form-control-sm text-sm" name="help_type" id="help_type">
                  <option value="">---সাহায্যের ধরণ---</option>
                  @foreach($help_type as $help_type)
                  <option value="{{ $help_type->help_name }}">{{ $help_type->help_name }}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-md-4" id="treatment_type_container" style="display: none;">
                <label class="pb-1 text-sm font-bold" for="">আবেদনের ধরণ :</label>
                <select class="form-control form-control-sm text-sm" name="treatment_type" id="treatment_type">
                  <option value="">---চিকিৎসার ধরণ---</option>
                  @foreach($treatment_type as $treatment_type)
                  <option value="{{ $treatment_type->treatment_name }}">{{ $treatment_type->treatment_name }}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-md-3">
                <label class="pb-1 text-sm font-bold" for="">সভার তারিখ :</label>
                <select class="form-control form-control-sm text-sm" name="search_date" id="search_date">
                  <option value="">---সভার তারিখ---</option>
                  @foreach($reports as $report)
                    @if (!isset($meeting_dates[$report->meeting_date]) && !empty($report->meeting_date))
                      <option value="{{$report->meeting_date}}">{{$report->meeting_date}}</option>
                      <?php $meeting_dates[$report->meeting_date] = true; ?>
                    @endif
                  @endforeach
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
                <th class="align-middle text-center text-sm">অনুমোদিত অনুদানের পরিমান</th>
                <th class="align-middle text-center text-sm">অ্যাকশন</th>
              </tr>
            </thead>
            <tbody>
              @can('Managements application access')
                <?php $sl=1; ?>
                @foreach($reports as $report)
                <tr>
                  <td class="align-middle text-center text-sm"><input type="checkbox" class="mr-3 select-checkbox">{{ $sl }}</td>
                  <td class="align-middle text-center text-sm">{{ $report->employee_name }} <br> {{  $report->designation}} <br> {{ $report->office_name }}</td>
                  <td class="align-middle text-center text-sm">{{ $report->applicant_date }}</td>
                  <td class="align-middle text-center text-sm">{{ $report->ERP_number }}</td>
                  <td class="align-middle text-center text-sm">{{ $report->relation_name }}</td>
                  <td class="align-middle text-center text-sm">{{ $report->applicant_reason }}</td>
                  @foreach($report->patientForm as $patientForm)
                  <td class="align-middle text-center text-sm">{{ $patientForm->treatment_type }}</td>
                  @endforeach
                  @foreach($report->daughterMarriage as $daughterMarriage)
                  <td class="align-middle text-center text-sm">{{ $daughterMarriage->help_type }}</td>
                  <td class="align-middle text-center text-sm">{{ $daughterMarriage->amount }}</td>
                  @endforeach
                  @foreach($report->meritocracy as $meritocracy)
                  <td class="align-middle text-center text-sm">{{ $meritocracy->help_type }}</td>
                  <td class="align-middle text-center text-sm">{{ $meritocracy->amount }}</td>
                  @endforeach
                  @foreach($report->deadbody as $deadbody)
                  <td class="align-middle text-center text-sm">{{ $deadbody->help_type }}</td>
                  <td class="align-middle text-center text-sm">{{ $deadbody->amount }}</td>
                  @endforeach
                  @if(!$report->healthIssue->isEmpty())
                  <td class="align-middle text-center text-sm">{{ $report->healthIssue->sum('amount') }}</td>
                  @endif
                  <td class="align-middle text-center text-sm">{{ $report->approved_amount }}</td>
                  <td class="align-middle text-center text-sm">
                    @can('Managements application edit')
                    <a href="{{route('viewReport.managementsApplication',$report->id)}}" class="ml-2"><i class="fa-sharp fa-regular fa-eye"></i></a>
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
    $('#application_type').change(function() {
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