<x-app-layout>
  <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
      <div class="container mx-auto px-6 py-2">

        <div class="p-3 bg-white shadow-md rounded my-6">
          <form action="{{ route('update.boardAmount') }}" method="POST">
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
                <th class="align-middle text-center text-sm">সুপারিশকৃত অনুদানের পরিমান</th>
                <th class="align-middle text-center text-sm">অনুমোদিত অনুদানের পরিমান</th>
                <th class="align-middle text-center text-sm">স্ট্যাটাস</th>
                <th class="align-middle text-center text-sm w-2/12">অ্যাকশন</th>
              </tr>
            </thead>
            <tbody>
              @can('Boards application access')
                <?php $sl=1; ?>
                @foreach($boards_application as $application)
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
                  <td class="align-middle text-center text-sm">৳ {{ $application->allowed_amount }}</td>
                  <td class="align-middle text-center text-sm">
                      <input class="text-sm form-control" type="text" id="approved_amount" name="approved_amount[{{ $loop->index }}]" placeholder="amount" value="{{ $application->approved_amount }}" @if ($application->approved_amount) readonly @endif>
                  </td>

                  <td class="align-middle text-center text-sm">
                    @if($application->status=='management_approved')
                    <span class="text-white inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-white bg-gray-500 rounded-full">Draft</span>
                    @else
                    <span class="text-white inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-white bg-green-500 rounded-full">Approved</span>
                    @endif
                  </td>
                  <td class="align-middle text-center text-sm text-center">
                    <button type="submit" class="btn btn-primary btn-sm mr-2">Save</button>
                    @can('Boards application edit')
                    <a href="{{route('edit.boardsApplication',$application->id)}}" class="ml-2"><i class="fa-sharp fa-regular fa-eye"></i></a>
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


