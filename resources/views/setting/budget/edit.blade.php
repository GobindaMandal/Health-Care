<x-app-layout>
   <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-1 pb-16">
              <div class="bg-white shadow-md rounded my-6 p-5">
                <form method="POST" action="{{ route('admin.budgets.update',$budget->id)}}">
                  @csrf
                  @method('put')
                  <div class="flex flex-col space-y-2">
                    <label for="fiscal_year" class="text-gray-700 select-none font-medium text-xl">অর্থ-বছর</label>
                    <input id="fiscal_year" type="text" name="fiscal_year" value="{{ $budget->fiscal_year }}"
                      placeholder="Enter fiscal Year" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                    />
                  </div>

                  <div class="flex flex-col space-y-2 mt-4">
                    <label for="budget" class="text-gray-700 select-none font-medium text-xl">বাজেট</label>
                    <input id="budget" type="number" name="budget" value="{{ $budget->budget }}"
                      placeholder="Enter Budget" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                    />
                  </div>

                  <div class="flex flex-col space-y-2 mt-4">
                    <label for="budget" class="text-gray-700 select-none font-medium text-xl">চিকিৎসা খাত</label>
                    <input id="treatment" type="number" name="treatment" value="{{ $budget->treatment }}"
                      placeholder="Enter Budget" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                    />
                  </div>

                  <div class="flex flex-col space-y-2 mt-4">
                    <label for="budget" class="text-gray-700 select-none font-medium text-xl">কল্যাণ ও বিনোদন খাত</label>
                    <input id="welfare" type="number" name="welfare" value="{{ $budget->welfare }}"
                      placeholder="Enter Budget" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                    />
                  </div>
        
                <div class="text-center mt-16 mb-16">
                  <button type="submit" class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">Submit</button>
                </div>
              </div>

             
            </div>
        </main>
    </div>
</div>
</x-app-layout>
