<x-app-layout>
  <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
      <div class="container mx-auto px-6 py-2">
        <div class="text-right">
          @can('Archive create')
            <a href="{{route('admin.archives.create')}}" class="underline bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">New Archive Data</a>
          @endcan
        </div>

        <div class="p-3 bg-white shadow-md rounded my-6">
          <form action="{{ route('archiveFilter') }}" method="GET">
            <div class="row mb-3">
              <div class="col-md-2">
                <label class="pb-1 text-sm font-bold" for="">ই আর পি নম্বর :</label>
                <input type="number" class="form-control form-control-sm text-sm" name="ERP_number" id="ERP_number" placeholder="ই আর পি নম্বর">
              </div>

              <div class="col-md-2">
                <label class="pb-1 text-sm font-bold" for="">আবেদন-সমূহ :</label>
                <select class="form-control form-control-sm text-sm" name="application_type" id="application_type">
                  <option value="" selected style="color: gray">আবেদনের ধরণ</option>
                  @foreach($applicant_reason as $application_type)
                  <option value="{{ $application_type->applicant_reason }}">{{ $application_type->applicant_reason }}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-md-2" id="help_type_container" style="display: none;">
                <label class="pb-1 text-sm font-bold" for="">আবেদনের ধরণ :</label>
                <select class="form-control form-control-sm text-sm" name="help_type" id="help_type">
                  <option value="">সাহায্যের ধরণ</option>
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