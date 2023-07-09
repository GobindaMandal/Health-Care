<x-app-layout>
    @if ($user->name != 'বোর্ড সভা')
    <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-6">
                <h3 class="text-gray-700 text-3xl font-medium">Welcome: {{ auth()->user()->name }}</h3>
                <p>Role: <b>
                    @foreach(auth()->user()->roles as $role)
                        {{ $role->name }}
                    @endforeach 
                </b></p>
            </div>
        </main>
    </div>
    @endif

    @if ($user->name === 'বোর্ড সভা')
    <div class="card bd-0 shadow-base pd-25 pd-xs-40 m-2">
        <div class="card-header bg-transparent pd-0 bd-b-0 m-4">
            <div class="ml-4">
                <h4 class="text-secondary">আবেদন :</h4>
            </div>

            <div class="row pb-4">
                <div class="col-sm-6 col-xl-3">
                    <div class="card bg-primary rounded overflow-hidden h-100">
                        <div class="card-body d-flex align-items-center">
                            <i class="fas fa-hospital fa-2x text-white mb-10"></i>
                            <div class="ms-4">
                                <p class="text-sm text-white mb-2">চিকিৎসা</p>
                                <h2 class="text-center text-white lato-bold mb-0 fw-bold">{{ \App\Models\Back\Application_Form::where('applicant_reason', 'চিকিৎসা')->count('approved_amount') }}</h2>
                            </div>
                        </div>
                        <div id="ch1" class="card-footer height-50"></div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <div class="card bg-success rounded overflow-hidden h-100">
                        <div class="card-body d-flex align-items-center">
                            <i class="fas fa-circle-notch fa-2x text-white mb-10"></i>
                            <div class="ms-4">
                                <p class="text-sm text-white mb-2">মেয়ের বিবাহ</p>
                                <h2 class="text-center text-white lato-bold mb-0 fw-bold">{{ \App\Models\Back\Application_Form::where('applicant_reason', 'মেয়ের বিবাহ')->count('approved_amount') }}</h2>
                            </div>
                        </div>
                        <div id="ch3" class="card-footer height-50"></div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <div class="card bg-info rounded overflow-hidden h-100">
                        <div class="card-body d-flex align-items-center">
                            <i class="fas fa-school fa-2x text-white mb-10"></i>
                            <div class="ms-4">
                                <p class="text-sm text-white mb-2">মেধাবৃত্তি</p>
                                <h2 class="text-center text-white lato-bold mb-0 fw-bold">{{ \App\Models\Back\Application_Form::where('applicant_reason', 'মেধাবৃত্তি')->count('approved_amount') }}</h2>
                            </div>
                        </div>
                        <div id="ch2" class="card-footer height-50"></div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <div class="card bg-warning rounded overflow-hidden h-100">
                        <div class="card-body d-flex align-items-center">
                            <i class="fas fa-book-skull fa-2x text-white mb-10"></i>
                            <div class="ms-4">
                                <p class="text-sm text-white mb-2">লাশ পরিবহন</p>
                                <h2 class="text-center text-white lato-bold mb-0 fw-bold">{{ \App\Models\Back\Application_Form::where('applicant_reason', 'লাশ পরিবহন ও দাফন ব্যয়')->count('approved_amount') }}</h2>
                            </div>
                        </div>
                        <div id="ch4" class="card-footer height-50"></div>
                    </div>
                </div>
            </div>


            <div class="ml-4 mt-10 flex items-center">
                <h4 class="text-secondary" style="margin-right: 10px;">বাজেট :</h4>
                <div class="flex items-center">
                    <form id="year-form" action="{{ route('admin.dashboard') }}" method="GET">
                        <select id="filter-year" name="year" class="">
                            @php
                                $currentYear = date('Y');
                                $startYear = $currentYear - 1;
                                $endYear = $currentYear;
                            @endphp
                            @for($i = 0; $i < 20; $i++)
                                @php
                                    $fiscalYear = $startYear . '-' . $endYear;
                                    $startYear--;
                                    $endYear--;
                                @endphp
                                <option value="{{ $fiscalYear }}" @if(request()->input('year', $currentYear) == $fiscalYear) selected @endif>{{ $fiscalYear }}</option>
                            @endfor
                        </select>
                        <button class="btn btn-info btn-sm" type="submit">Go</button>
                    </form>
                </div>
            </div>


            <div class="row mt-4 pb-4">
                <div class="col-sm-6 col-xl-6">
                    <div id="budget-container" class="card bg-primary rounded overflow-hidden">
                        <div class="card-body d-flex align-items-center">
                            <i class="fa-sharp fa-solid fa-bag-shopping fa-4x ml-2 mb-20" style="color: #FAF9F6;"></i>
                            <div class="ms-4">
                                <p class="text-md text-white mt-3">মোট বাজেট</p>
                                <p id="budget-value" class="text-white lato-bold display-5 mb-0 lh-1 fw-bold mt-4">৳ {{ $budget }}</p>
                                <p class="text-white mt-4">টাকা</p>
                            </div>
                        </div>
                        <div id="ch3" class="card-footer height-20"></div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-6">
                    <div class="bg-light rounded overflow-hidden">
                        <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                            <div class="mg-l-20 w-100 m-4">
                                <div class="row">
                                    <div class="col-md-4">
                                    <p class="text-secondary tx-16 tx-spacing-1 tx-mont tx-semibold tx-uppercase mg-b-10">চিকিৎসা</p>
                                    </div>
                                    <div class="col-md-8">
                                    <p class="text-secondary tx-14 tx-spacing-1 tx-mont tx-uppercase mg-b-10 text-end">(৳{{ $budget1 }} - ৳{{ $budget3 }})</p>
                                    </div>
                                </div>
                                <div class="progress mg-b-0">
                                    <div class="progress-bar" role="progressbar" style="width: {{ $treatmentPercentage }}%" aria-valuenow="{{ $budget1 }}" aria-valuemin="0" aria-valuemax="{{ $budget3 }}"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-light rounded overflow-hidden mt-3">
                        <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                            <i class="fa-sharp fa-solid fa-box-dollar"></i>
                            <div class="mg-l-20 w-100 m-4">
                                <div class="row">
                                    <div class="col-md-8">
                                    <p class="text-secondary tx-16 tx-spacing-1 tx-mont tx-semibold tx-uppercase mg-b-10">কল্যাণ ও চিত্তবিনোদন</p>
                                    </div>
                                    <div class="col-md-4">
                                    <p class="text-secondary tx-14 tx-spacing-1 tx-mont tx-uppercase mg-b-10 text-end">(৳{{ $budget2 }} - ৳{{ $budget4 }})</p>
                                    </div>
                                </div>
                                <div class="progress mg-b-0">
                                    <div class="progress-bar" role="progressbar" style="width: {{ $welfarePercentage }}%" aria-valuenow="{{ $budget2 }}" aria-valuemin="0" aria-valuemax="{{ $budget4 }}"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row mt-4">
                <div class="col-sm-6 col-xl-6">
                    <canvas id="budgetChart" style="width: 100%; height: 300px;"></canvas>
                </div>

                <div class="col-sm-6 col-xl-6">
                    <div id="budgets_bar_chart" style="width: 100%; height: 300px;"></div>
                </div>
            </div>

        </div>
    </div>
    @endif

</x-app-layout>


<!-- বাজেট -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4"></script>

<script>
    var totalBudget = {{ $totalBudget }};
    var totalExpense = {{ $totalExpense }};
    var remainingBudget = {{ $remainingBudget }};

    var data = [totalBudget, totalExpense, remainingBudget];

    // Create the chart
    var ctx = document.getElementById('budgetChart').getContext('2d');
    var budgetChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['মোট বাজেট', 'মোট ব্যয়', 'অবশিষ্ট'],
            datasets: [{
                data: data,
                backgroundColor: ['#36A2EB', '#FF6384', '#FFCE56'],
                hoverBackgroundColor: ['#36A2EB', '#FF6384', '#FFCE56']
            }]
        },
        options: {
            responsive: true,
            cutoutPercentage: 60,
            legend: {
                display: true,
                position: 'bottom'
            },
            tooltips: {
                enabled: true,
                callbacks: {
                    label: function (tooltipItem, data) {
                        var label = data.labels[tooltipItem.index] || '';
                        if (label) {
                            label += ': ';
                        }
                        var value = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                        label += value + ' টাকা';
                        return label;
                    }
                }
            }
        }
    });
</script>



<!-- monthly bar chart -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    function drawBudgetsBarChart(selectedYear, monthlyAmounts) {
        if (monthlyAmounts) {
            var months = [
                'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
            ];
            var data = google.visualization.arrayToDataTable([
                ['Month', ''],
                @for($i = 0; $i < count($months); $i++)
                    @if(isset($monthlyAmounts[$i]))
                        ['{{ $months[$i] }}', {{ $monthlyAmounts[$i] }}],
                    @else
                        ['{{ $months[$i] }}', 0],
                    @endif
                @endfor
            ]);
            var options = {
                chart: {
                    title: 'বাজেটের ইতিহাস',
                },
            };
            var chart = new google.charts.Bar(document.getElementById('budgets_bar_chart'));
            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    }
    function initializePage() {
        var selectedYear = '{{ $year }}';
        var monthlyAmounts = {!! json_encode($monthlyAmounts) !!};
        drawBudgetsBarChart(selectedYear, monthlyAmounts);
    }

    google.charts.setOnLoadCallback(initializePage);
</script>