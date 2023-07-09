<x-app-layout>
  <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
      <div class="container mx-auto px-6 py-2">

        <div class="p-3 bg-white shadow-md rounded my-6">
          <form action="{{ route('archiveFilter') }}" method="GET">
            <div class="row mb-3">
              <div class="col-md-2">
                <label class="pb-1 text-sm font-bold" for="">ই আর পি নম্বর :</label>
                <input type="number" class="form-control form-control-sm text-sm" name="ERP_number" id="ERP_number" placeholder="ই আর পি নম্বর" value="{{ request('ERP_number') }}">
              </div>

              <div class="col-md-2">
                <label class="pb-1 text-sm font-bold" for="">আবেদনের খাত :</label>
                <select class="form-control form-control-sm text-sm" name="application_type" id="application_type">
                  <option value="">---আবেদনের খাত---</option>
                  @foreach($applicant_reason as $application_type)
                  <option value="{{ $application_type->applicant_reason }}" @if(request()->input('application_type') == $application_type->applicant_reason) selected @endif>{{ $application_type->applicant_reason }}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-md-2" id="help_type_container" style="display: none;">
                <label class="pb-1 text-sm font-bold" for="">আবেদনের ধরণ :</label>
                <select class="form-control form-control-sm text-sm" name="help_type" id="help_type">
                  <option value="">---সাহায্যের ধরণ---</option>
                  @foreach($help_type as $help_type)
                  <option value="{{ $help_type->help_name }}" @if(request()->input('help_type') == $help_type->help_name) selected @endif>{{ $help_type->help_name }}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-md-2" id="treatment_type_container" style="display: none;">
                <label class="pb-1 text-sm font-bold" for="">আবেদনের ধরণ :</label>
                <select class="form-control form-control-sm text-sm" name="treatment_type" id="treatment_type">
                  <option value="">---চিকিৎসার ধরণ---</option>
                  @foreach($treatment_type as $treatment_type)
                  <option value="{{ $treatment_type->treatment_name }}" @if(request()->input('treatment_type') == $treatment_type->treatment_name) selected @endif>{{ $treatment_type->treatment_name }}</option>
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

          <table id="" class="table table-bordered text-left w-full border-collapse">
            <thead>
              <tr>
                <th class="align-middle text-center text-sm">ক্রমিক নং</th>
                <th class="align-middle text-center text-sm">আবেদনকারীর নাম ও পদবী</th>
                <th class="align-middle text-center text-sm">আবেদনের খাত</th>
                <th class="align-middle text-center text-sm">আবেদনের ধরণ</th>
                <th class="align-middle text-center text-sm">ই আর পি নম্বর</th>
                <th class="align-middle text-center text-sm">অনুমোদিত অনুদানের পরিমান</th>
                <th class="align-middle text-center text-sm">অফিস আদেশের তারিখ</th>
                <th class="align-middle text-center text-sm">স্মারক নং</th>
              </tr>
            </thead>
            <tbody>
              @can('Archive access')
                <?php $sl=1; ?>
                @foreach($archives as $archive)
                <tr>
                  <td class="align-middle text-center text-sm">{{ $sl }}</td>
                  <td class="align-middle text-center text-sm">{{ $archive->name_designation }}</td>
                  <td class="align-middle text-center text-sm">{{ $archive->applicant_reason }}</td>
                  <td class="align-middle text-center text-sm">{{ $archive->applicant_type }}</td>
                  <td class="align-middle text-center text-sm">{{ $archive->ERP_number }}</td>
                  <td class="align-middle text-center text-sm">{{ $archive->approved_amount }}</td>
                  <td class="align-middle text-center text-sm">{{ $archive->office_order_date }}</td>
                  <td class="align-middle text-center text-sm">{{ $archive->memorial_no }}</td>
                </tr>
                <?php $sl++; ?>
                @endforeach

                <tr>
                  <td colspan="5" class="align-middle text-right text-sm font-weight-bold">মোট অনুমোদিত অনুদানের পরিমান :</td>
                  <td class="align-middle text-center text-sm font-weight-bold">
                    {{ $archives->sum('approved_amount') }}
                  </td>
                  <td colspan="2"></td>
                </tr>

              @endcan
            </tbody>
          </table>
        </div>
      </div>
  </main>
</div>
</x-app-layout>


<!-- filter -->
<script>
  $(document).ready(function() {
    // Get the initial selected values
    var selectedApplicationType = $('#application_type').val();
    var selectedHelpType = $('#help_type').val();
    var selectedTreatmentType = $('#treatment_type').val();

    // Show/hide the div containers based on the initial selected values
    handleDivVisibility(selectedApplicationType, selectedHelpType, selectedTreatmentType);

    // Event listener for the application_type dropdown
    $('#application_type').change(function() {
      var selectedApplicationType = $(this).val();
      handleDivVisibility(selectedApplicationType, selectedHelpType, selectedTreatmentType);
    });

    // Event listener for the help_type dropdown
    $('#help_type').change(function() {
      selectedHelpType = $(this).val();
      handleDivVisibility(selectedApplicationType, selectedHelpType, selectedTreatmentType);
    });

    // Event listener for the treatment_type dropdown
    $('#treatment_type').change(function() {
      selectedTreatmentType = $(this).val();
      handleDivVisibility(selectedApplicationType, selectedHelpType, selectedTreatmentType);
    });

    function handleDivVisibility(applicationType, helpType, treatmentType) {
      if (applicationType === 'কল্যাণ ও চিত্তবিনোদন') {
        $('#help_type_container').show();
        $('#treatment_type_container').hide();
      } else if (applicationType === 'চিকিৎসা') {
        $('#help_type_container').hide();
        $('#treatment_type_container').show();
      } else {
        $('#help_type_container').hide();
        $('#treatment_type_container').hide();
      }
    }
  });
</script>


<!-- for showing field -->
<script>
  // Get the selected values on page load
  var selectedHelpType = document.getElementById('help_type').value;
  var selectedTreatmentType = document.getElementById('treatment_type').value;

  // Show/hide the div containers based on the selected values
  if (selectedHelpType !== '') {
    document.getElementById('help_type_container').style.display = 'block';
  } else if (selectedTreatmentType !== '') {
    document.getElementById('treatment_type_container').style.display = 'block';
  }

  // Event listener for the help_type dropdown
  document.getElementById('help_type').addEventListener('change', function() {
    var selectedValue = this.value;
    if (selectedValue !== '') {
      document.getElementById('help_type_container').style.display = 'block';
      document.getElementById('treatment_type_container').style.display = 'none';
    } else {
      document.getElementById('help_type_container').style.display = 'none';
      document.getElementById('treatment_type_container').style.display = 'block';
    }
  });

  // Event listener for the treatment_type dropdown
  document.getElementById('treatment_type').addEventListener('change', function() {
    var selectedValue = this.value;
    if (selectedValue !== '') {
      document.getElementById('treatment_type_container').style.display = 'block';
      document.getElementById('help_type_container').style.display = 'none';
    } else {
      document.getElementById('treatment_type_container').style.display = 'none';
      document.getElementById('help_type_container').style.display = 'block';
    }
  });
</script>