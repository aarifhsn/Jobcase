<form action="{{ route('jobs.filter') }}" method="GET">
    <div data-tw-accordion="collapse">
        <div class="text-gray-700 accordion-item">
            <div class="flex gap-4">
                <button
                class="w-5/6 text-black border-transparent btn group-data-[theme-color=violet]:bg-violet-300 focus:ring focus:ring-custom-500/30 mb-6"
                type="submit"><i class="uil uil-filter"></i> Filter Job</button>
                {{-- clear button  --}}
            <button
                class="w-1/6 text-white font-bold border-transparent btn group-data-[theme-color=violet]:bg-violet-500 hover:bg-violet-600 focus:ring focus:ring-custom-500/30 mb-6"
                type="reset" title="Clear Filter" onclick="clearFilter()"><i class="uil uil-times"></i></button>
            </div>

            <h6>
                <button type="button"
                    class="flex items-center justify-between w-full px-4 py-2 font-medium text-left accordion-header group-data-[theme-color=violet]:bg-violet-500/20  active">
                    <span class="text-gray-900 dark:text-gray-50">Salary Range</span>
                    <i
                        class="mdi mdi-chevron-down text-xl group-[.active]:rotate-180 text-gray-900 dark:text-gray-50"></i>
                </button>
            </h6>

            <div class="block accordion-body">

                <div class="p-5">
                    <div class="area-range">
                        <label for="salary_range"
                            class="block mb-2 text-sm font-medium text-700 dark:text-white">
                            Min Salary: <span id="range_value"> {{Number::currency( $minSalary )}}</span></label>
                        
                            <input id="salary_range" type="range" name="salary_range"  class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"
                            value="{{ $minSalary }}" min="{{ $minSalary }}" max="{{ $maxSalary }}" step="100"
                            oninput="updateRangeValue(this.value)">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div data-tw-accordion="collapse">
        <div class="text-gray-700 accordion-item dark:text-gray-300">
            <h6>
                <button type="button"
                    class="flex items-center justify-between w-full px-4 py-2 font-medium text-left accordion-header group-data-[theme-color=violet]:bg-violet-500/20  group active">
                    <span class="text-gray-900 text-15 dark:text-gray-50"> Work experience</span>
                    <i
                        class="mdi mdi-chevron-down text-xl group-[.active]:rotate-180 text-gray-900 dark:text-gray-50"></i>
                </button>
            </h6>
            <div class="block accordion-body">
                <div class="p-5">

                    @foreach ($job_experiences as $job_experience)

                        <div class="mt-2">
                            <input
                                class="rounded cursor-pointer group-data-[theme-color=violet]:checked:bg-violet-500  dark:bg-neutral-600 dark:checked:bg-violet-500/20"
                                id="{{$job_experience->experience}}"
                                type="checkbox" name="experience[]" value="{{$job_experience->experience}}"
                                {{ is_array(request('experience')) && in_array($job_experience->experience, request('experience')) ? 'checked' : '' }}>
                            <label
                                class="text-gray-500 cursor-pointer ltr:ml-2 rtl:mr-2 dark:text-gray-300"
                                for="{{$job_experience->experience}}">{{$job_experience->experience}}
                                Years</label>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div data-tw-accordion="collapse">
        <div class="text-gray-700 accordion-item dark:text-gray-300">
            <h6>
                <button type="button"
                    class="flex items-center justify-between w-full px-4 py-2 font-medium text-left accordion-header group-data-[theme-color=violet]:bg-violet-500/20  group active">
                    <span class="text-gray-900 text-15 dark:text-gray-50">Type of employment</span>
                    <i
                        class="mdi mdi-chevron-down text-xl group-[.active]:rotate-180 text-gray-900 dark:text-gray-50"></i>
                </button>
            </h6>
            <div class="block accordion-body">
                <div class="p-5">

                    @foreach ($job_types as $job_type)
                        <div class="mt-2">
                            <input class="cursor-pointer " type="radio" name="job_type"
                            id="{{$job_type->type}}"
                            value="{{$job_type->type}}"
                            {{ request('job_type') === $job_type->type ? 'checked' : '' }}>
                            <label
                                class="text-gray-500 cursor-pointer ltr:ml-2 rtl:mr-2 dark:text-gray-300" 
                                for="{{$job_type->type}}">
                                {{ucwords(str_replace('-', ' ', $job_type->type))}}
                            </label>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <div data-tw-accordion="collapse">
        <div class="text-gray-700 accordion-item dark:text-gray-300">
            <h6>
                <button type="button"
                    class="flex items-center justify-between w-full px-4 py-2 font-medium text-left accordion-header group-data-[theme-color=violet]:bg-violet-500/20  active">
                    <span class="text-gray-900 text-15 dark:text-gray-50">Date Posted</span>
                    <i
                        class="mdi mdi-chevron-down text-xl group-[.active]:rotate-180 text-gray-900 dark:text-gray-50"></i>
                </button>
            </h6>
            <div class="block accordion-body">
                <div class="p-5">

                    @php
                        $dateOptions = [
                            'all_date' => 'All',
                            'last_hour' => 'Last hour',
                            'last_24_hours' => 'Last 24 hours',
                            'last_7_days' => 'Last 7 days',
                            'last_14_days' => 'Last 14 days',
                            'last_30_days' => 'Last 30 days'
                        ];
                    @endphp

                    @foreach($dateOptions as $value => $label)
                    <div class="mt-2">
                        <input
                            class="rounded cursor-pointer group-data-[theme-color=violet]:checked:bg-violet-500"
                            type="checkbox"
                            name="date_posted[]"
                            value="{{ $value }}"
                            id="date_posted_{{ $value }}"
                            {{ is_array(request('date_posted')) && in_array($value, request('date_posted')) ? 'checked' : '' }}>
                        <label 
                            class="text-gray-500 cursor-pointer ltr:ml-2 rtl:mr-2 dark:text-gray-300"
                            for="date_posted_{{ $value }}">
                            {{ $label }}
                        </label>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</form>

<script>

    const formatter = new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'USD',
        minimumFractionDigits: 0
    });
    
    function updateRangeValue(value) {
        document.getElementById('range_value').textContent = formatter.format(value);
    }

    function clearFilter() {
        const form = document.querySelector('form');
        form.reset();
        window.location.href = window.location.pathname;
    }
</script>