<x-app-layout>
  <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
      <div class="container mx-auto px-6 py-2">

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
              @can('Committees application access')
                <?php $sl=1; ?>
                @foreach($committees_application as $application)
                <tr>
                  <td class="align-middle text-center text-sm">{{ $sl }}</td>
                  <td class="align-middle text-center text-sm">{{ $application->applicant_date }}</td>
                  <td class="align-middle text-center text-sm">{{ $application->employee_name }}</td>
                  <td class="align-middle text-center text-sm">{{ $application->ERP_number }}</td>
                  <td class="align-middle text-center text-sm">{{ $application->applicant_reason }}</td>
                  <td class="align-middle text-center text-sm">{{ $application->application_type }}</td>
                  @if(isset($application->claim_amount))
                  <td class="align-middle text-center text-sm">{{ $application->claim_amount }}</td>
                  @endif
                  @foreach($application->daughterMarriage as $daughterMarriage)
                  <td class="align-middle text-center text-sm">{{ $daughterMarriage->amount }}</td>
                  @endforeach
                  @foreach($application->meritocracy as $meritocracy)
                  <td class="align-middle text-center text-sm">{{ $meritocracy->amount }}</td>
                  @endforeach
                  @foreach($application->deadbody as $deadbody)
                  <td class="align-middle text-center text-sm">{{ $deadbody->amount }}</td>
                  @endforeach
                  <td class="align-middle text-center text-sm">
                      @if($application->status=='controller_approved')
                      <span class="text-white inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-white bg-gray-500 rounded-full">Draft</span>
                      @elseif($application->status=='committee_rejected')
                      <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-white bg-red-500 rounded-full">Rejected</span>
                      @else
                      <span class="text-white inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-white bg-green-500 rounded-full">Approved</span>
                      @endif
                  </td>
                  <td class="align-middle text-center text-sm">
                    @can('Committees application edit')
                    <a href="{{route('edit.committeesApplication',$application->id)}}" class="underline text-white font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark text-blue-400" style="background-color: #56A5EC;">View</a>
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
