<x-app-layout>
  <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
      <div class="container mx-auto px-6 py-2">

        <div class="p-3 bg-white shadow-md rounded my-6">
          <form action="{{ route('managementFilter') }}" method="GET">
            <div class="row mb-3">
              <div class="col-md-3">
                <label class="pb-1 text-sm font-bold" for="">আবেদন-সমূহ :</label>
                <select class="form-control form-control-sm text-sm" name="applicant_reason" id="applicant_reason">
                  <option value="">-----আবেদন নির্বাচন করুন-----</option>
                  @foreach($applicant_reasons as $applicant_reason)
                  <option value="{{ $applicant_reason->applicant_reason }}" {{ request('applicant_reason') == $applicant_reason->applicant_reason ? 'selected' : '' }}>{{ $applicant_reason->applicant_reason }}</option>
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
                  <th class="align-middle text-center text-sm">সম্পর্ক</th>
                  <th class="align-middle text-center text-sm">সাহায্যের ধরণ</th>
                  <th class="align-middle text-center text-sm">দাবিকৃত অনুদানের পরিমাণ</th>
                  <th class="align-middle text-center text-sm">অনুমোদিত অনুদানের পরিমান</th>
                  <th class="align-middle text-center text-sm">স্ট্যাটাস</th>
                  <th class="align-middle text-center text-sm w-2/12">অ্যাকশন</th>
                </tr>
              </thead>
              <tbody>
                @can('Managements application access')
                  <?php $sl=1; ?>
                  @foreach($managements_application as $application)
                  <tr>
                    <td class="align-middle text-center text-sm">{{ $sl }}</td>
                    <td class="align-middle text-center text-sm">{{ $application->employee_name }}, {{ $application->designation }}, {{ $application->office_name }}</td>
                    <td class="align-middle text-center text-sm">{{ $application->applicant_date }}</td>
                    <td class="align-middle text-center text-sm">{{ $application->relation_name }}</td>

                    @if(App\Models\Back\Daughter_Marriage::where('application_id', $application->id)->first())
                    <td class="align-middle text-center text-sm">{{App\Models\Back\Daughter_Marriage::where('application_id', $application->id)->first()->help_type}}</td>
                    <td class="align-middle text-center text-sm">{{App\Models\Back\Daughter_Marriage::where('application_id', $application->id)->first()->amount}}</td>

                    @elseif(App\Models\Back\Meritocracy::where('application_id', $application->id)->first())
                    <td class="align-middle text-center text-sm">{{App\Models\Back\Meritocracy::where('application_id', $application->id)->first()->help_type}}</td>
                    <td class="align-middle text-center text-sm">{{App\Models\Back\Meritocracy::where('application_id', $application->id)->first()->amount}}</td>

                    @elseif(App\Models\Back\Deadbody::where('application_id', $application->id)->first())
                    <td class="align-middle text-center text-sm">{{App\Models\Back\Deadbody::where('application_id', $application->id)->first()->help_type}}</td>
                    <td class="align-middle text-center text-sm">{{App\Models\Back\Deadbody::where('application_id', $application->id)->first()->amount}}</td>
                    @endif

                    <input type="hidden" name="id[]" value="{{ $application->id }}">
                    
                    <td class="align-middle text-center text-sm">
                        <input class="text-sm form-control" type="text" id="approved_amount" name="approved_amount[{{ $loop->index }}]" placeholder="amount" value="{{ $application->approved_amount }}" oninput="toggleAllowedAmount(this)" @if ($application->approved_amount) readonly @endif>
                    </td>
                    
                    <td class="align-middle text-center text-sm">
                      @if($application->status=='committee_approved')
                      <span class="text-white inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-white bg-gray-500 rounded-full">Draft</span>
                      @else
                      <span class="text-white inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-white bg-green-500 rounded-full">Approved</span>
                      @endif
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