<!-- start home -->
<div style="color: green; position: absolute; top: 20%; left: 50%; transform: translate(-50%, -50%); display: flex; justify-content: center; align-items: center; text-align: center;">
    @if (session('success'))
    <p class="font-semibold border border-solid border-green-500 p-4">{{ session('success') }}</p>
    @endif
</div>
<section class="relative bg-opacity-10 py-28 dark:bg-violet-900 group-data-[theme-color=violet]:bg-violet-500/20 group-data-[theme-color=sky]:bg-sky-500/20 group-data-[theme-color=red]:bg-red-500/20 group-data-[theme-color=green]:bg-green-500/20 group-data-[theme-color=pink]:bg-pink-500/20 group-data-[theme-color=blue]:bg-blue-500/20">
    <div class="container mx-auto">
        <div class="grid items-center grid-cols-12 rtl:gap-10">
            <div class="col-span-12 lg:col-span-7">
                <div class="mb-3 ltr:mr-14 rtl:ml-14">
                    <h6 class="font-bold mb-3 text-sm text-gray-900 uppercase dark:text-gray-50">We have {{$total_latest_jobs}}+ live jobs</h6>
                    <h1 class="mb-3 text-5xl font-semibold leading-tight text-gray-900 dark:text-gray-50">Find your dream jobs <br> with <span class="font-bold group-data-[theme-color=violet]:text-violet-500 group-data-[theme-color=sky]:text-sky-500 group-data-[theme-color=red]:text-red-500 group-data-[theme-color=green]:text-green-500 group-data-[theme-color=pink]:text-pink-500 group-data-[theme-color=blue]:text-blue-500">{{config('app.name')}}</span></h1>
                    <p class="text-lg font-light text-gray-500 whitespace-pre-line dark:text-gray-300">Find jobs, create trackable resumes and enrich your
                            applications.Carefully crafted after analyzing the needs of different 
                            industries.</p>
                </div>
                <form action="{{ route('jobs.search') }}" method="GET">
                    <div class="registration-form">
                        <div class="grid grid-cols-12">
                            <div class="col-span-12 xl:col-span-4">
                                <div class="mt-3 rounded-l filter-search-form filter-border mt-md-0">
                                    <i class="uil uil-briefcase-alt"></i>
                                    <input type="search" name="search" id="job-title" class="w-full filter-input-box placeholder:text-gray-100 placeholder:text-13 dark:text-gray-100" placeholder="Job, Company name..." value="{{ request('search') }}">
                                </div>
                            </div><!--end col-->
                            <div class="col-span-12 xl:col-span-4">
                                <div class="mt-3 filter-search-form mt-md-0">
                                    <i class="uil uil-map-marker"></i>
                                    <select class="form-select" data-trigger name="country" id="choices-single-location" aria-label="Default select example">
                                        <option value="0" selected>Location</option>
                                        
                                    @foreach (config('countries') as $code => $name)
                                    <option value="{{ $code }}" {{ request('country') == $code ? 'selected' : '' }}>{{ $name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div><!--end col-->
                            
                            <div class="col-span-12 xl:col-span-4">
                                <div class="h-full mt-3">
                                    <button class="btn group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500 border rounded-lg border-transparent ltr:xl:rounded-l-none rtl:xl:rounded-r-none w-full py-[18px] text-white" type="submit"><i class="uil uil-search me-1"></i> Find Job</button>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div>
                </form>
            </div>
            <div class="col-span-5">
                <div class="mt-5">
                    <img src="{{asset('images/process-02.png')}}" alt="" class="mb-5 home-img max-w-none"> 
                </div>
            </div>
        </div>
    </div>
    <img src="{{asset('images/bg-shape.png')}}" alt="" class="absolute block -bottom-5 dark:hidden">
    <img src="{{asset('images/bg-shape-dark.png')}}" alt="" class="absolute hidden -bottom-5 dark:block">
</section>
<!-- end home -->