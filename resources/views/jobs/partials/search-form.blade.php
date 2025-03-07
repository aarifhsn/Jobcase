<div class="job-list-header">
    <form action="{{ route('jobs.search') }}" method="GET">
        <div class="grid grid-cols-12 gap-3">
            <div class="col-span-12 xl:col-span-4">
                <div class="relative filler-job-form">
                    <i class="uil uil-briefcase-alt"></i>
                    <input type="search" name="search" class="w-full filter-job-input-box dark:text-gray-100"
                        id="exampleFormControlInput1" placeholder="Job, company... " value="{{ request('search') }}">
                </div>
            </div>

            <!--end col-->
            <div class="col-span-12 xl:col-span-4">
                <div class="relative filler-job-form">
                    <i class="uil uil-location-point"></i>
                    <select class="form-select" data-trigger name="country" id="choices-single-location"
                        aria-label="Default select example">
                        <option value="0" selected>Location</option>
                        @foreach (config('countries') as $code => $name)
                            <option value="{{ $code }}" {{ request('country') == $code ? 'selected' : '' }}>{{ $name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>


            <!--end col-->
            <div class="col-span-12 xl:col-span-4">
                <button
                    class="w-full text-white border-transparent btn group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500 focus:ring focus:ring-custom-500/30"
                    type="submit"><i class="uil uil-filter"></i> Find Job</button>
            </div>
            <!--end col-->
        </div>
        <!--end grid-->
    </form>
</div>