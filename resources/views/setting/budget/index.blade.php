<x-app-layout>
  <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
      <div class="container mx-auto px-6 py-2">
        <div class="text-right">
          @can('Budget create')
            <a href="{{route('admin.budgets.create')}}" class="underline bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">New Budget</a>
          @endcan
        </div>

        <div class="p-3 bg-white shadow-md rounded my-6">

          <table class="table table-bordered text-left w-full border-collapse">
            <thead>
              <tr>
                <th class="align-middle text-center text-sm">ক্রমিক নং</th>
                <th class="align-middle text-center text-sm">অর্থ-বছর</th>
                <th class="align-middle text-center text-sm">বাজেট</th>
                <th class="align-middle text-center text-sm">চিকিৎসা খাত</th>
                <th class="align-middle text-center text-sm">কল্যাণ ও বিনোদন খাত</th>
                <th class="align-middle text-center text-sm">অ্যাকশন</th>
              </tr>
            </thead>
            <tbody>
              @can('Budget access')
                <?php $sl=1; ?>
                @foreach($budgets as $budget)
                <tr>
                  <td class="align-middle text-center text-sm">{{ $budget->id }}</td>
                  <td class="align-middle text-center text-sm">{{ $budget->fiscal_year }}</td>
                  <td class="align-middle text-center text-sm">{{ $budget->budget }}</td>
                  <td class="align-middle text-center text-sm">{{ $budget->treatment }}</td>
                  <td class="align-middle text-center text-sm">{{ $budget->welfare }}</td>
                  <td class="align-middle text-center text-sm">

                  @can('Budget edit')
                  <a href="{{route('admin.budgets.edit',$budget->id)}}" class="underline text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark text-blue-400">Edit</a>
                  @endcan

                  @can('Budget delete')
                  <form action="{{ route('admin.budgets.destroy', $budget->id) }}" method="budget" class="inline">
                      @csrf
                      @method('delete')
                      <button class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-blue hover:bg-blue-dark text-red-400">Delete</button>
                  </form>
                  @endcan
                  </td>
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