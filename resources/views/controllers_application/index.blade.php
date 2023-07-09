<x-app-layout>
  <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
      <div class="container mx-auto px-6 py-2">
          <div class="text-right">
            @can('Controllers application create')
              <a href="{{route('admin.controllersApplication.create')}}" class="underline bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">New controllers application</a>
            @endcan
          </div>

        <div class="p-3 bg-white shadow-md rounded my-6">
          <table id="dataTable" class="table table-bordered text-left w-full border-collapse">
            <thead>
              <tr>
                <th class="align-middle text-center text-sm">ক্রমিক নং</th>
                <th class="align-middle text-center text-sm">আবেদনের তারিখ</th>
                <th class="align-middle text-center text-sm">আবেদনকারীর নাম</th>
                <th class="align-middle text-center text-sm">ই আর পি নম্বর</th>
                <th class="align-middle text-center text-sm">আবেদনের খাত</th>
                <th class="align-middle text-center text-sm">আবেদনের ধরণ</th>
                <th class="align-middle text-center text-sm">দাবিকৃত অনুদানের পরিমান</th>
                <th class="align-middle text-center text-sm">স্ট্যাটাস</th>
                <th class="align-middle text-center text-sm">অ্যাকশন</th>
              </tr>
            </thead>
            <tbody>
              @can('Controllers application access')
                <?php $sl=1; ?>
                @foreach($controllers_application as $application)
                <tr>
                  <td class="align-middle text-center text-sm">{{ $sl }}</td>
                  <td class="align-middle text-center text-sm">{{ $application->applicant_date }}</td>
                  <td class="align-middle text-center text-sm">{{ $application->employee_name }}</td>
                  <td class="align-middle text-center text-sm">{{ $application->ERP_number }}</td>
                  <td class="align-middle text-center text-sm">{{ $application->applicant_reason }}</td>
                  @foreach($application->patientForm as $patientForm)
                  <td class="align-middle text-center text-sm">{{ $patientForm->treatment_type }}</td>
                  @endforeach
                  @foreach($application->daughterMarriage as $daughterMarriage)
                  <td class="align-middle text-center text-sm">{{ $daughterMarriage->help_type }}</td>
                  <td class="align-middle text-center text-sm">{{ $daughterMarriage->amount }}</td>
                  @endforeach
                  @foreach($application->meritocracy as $meritocracy)
                  <td class="align-middle text-center text-sm">{{ $meritocracy->help_type }}</td>
                  <td class="align-middle text-center text-sm">{{ $meritocracy->amount }}</td>
                  @endforeach
                  @foreach($application->deadbody as $deadbody)
                  <td class="align-middle text-center text-sm">{{ $deadbody->help_type }}</td>
                  <td class="align-middle text-center text-sm">{{ $deadbody->amount }}</td>
                  @endforeach
                  @if(!$application->healthIssue->isEmpty())
                  <td class="align-middle text-center text-sm">{{ $application->healthIssue->sum('amount') }}</td>
                  @endif
                  <td class="align-middle text-center text-sm">
                      @if($application->status=='doctor_approved')
                      <span class="text-white inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-white bg-gray-500 rounded-full">Draft</span>
                      @elseif($application->status=='controller_rejected')
                      <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-white bg-red-500 rounded-full">Rejected</span>
                      @else
                      <span class="text-white inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-white bg-green-500 rounded-full">Approved</span>
                      @endif
                  </td>
                  <td class="align-middle text-center text-sm">
                    @can('Controllers application edit')
                    <a href="{{route('edit.controllersApplication',$application->id)}}" class="underline text-white font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark text-blue-400" style="background-color: #56A5EC;">View</a>
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
