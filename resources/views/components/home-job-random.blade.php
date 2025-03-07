<!-- start job list -->
<section class="py-20 bg-gray-50 dark:bg-neutral-700">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 gap-5">
            <div class="mb-5 text-center">
                <h3 class="mb-3 text-3xl text-gray-900 dark:text-gray-50">New & Random Jobs</h3>
                <p class="mb-5 text-gray-500 whitespace-pre-line dark:text-gray-300">Post a job to tell us about your project. We'll quickly match you with the right <br> freelancers.</p>
            </div>
        </div>
        <div class="nav-tabs chart-tabpill">
            <div class="grid grid-cols-12">
                <div class="col-span-12 lg:col-span-8 lg:col-start-3">
                    <div class="p-1.5 bg-white dark:bg-neutral-900 shadow-lg shadow-gray-100/30 rounded-lg dark:shadow-neutral-700">
                        <ul class="items-center text-sm font-medium text-center text-gray-700 nav md:flex">
                            <li class="w-full">
                                <a href="javascript:void(0);" data-tw-toggle="tab" data-tw-target="recent-job" class="inline-block w-full py-[12px] px-[18px] dark:text-gray-50 active" aria-current="page">Recent</a>
                            </li>
                            @foreach ($jobTypes as $type)
                            <li class="w-full">
                                <a href="javascript:void(0);" data-tw-toggle="tab" data-tw-target="{{ Str::slug($type) }}" class="inline-block w-full py-[12px] px-[18px] dark:text-gray-50">{{ ucfirst($type) }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div class="block w-full tab-pane" id="recent-job">
                    <div class="pt-8 ">
                        <div class="space-y-8">
                        
                        @foreach ($recent_jobs as $job)
                            @include('jobs.partials.job-card')
                        @endforeach
                        
                        </div>
                    </div>
                </div>

                @foreach ($jobTypes as $type)
                <div class="hidden w-full tab-pane" id="{{ Str::slug($type) }}">
                    <div class="pt-8 ">
                        <div class="space-y-8">

                        @foreach ($jobsByType[$type] as $job)

                            @include('jobs.partials.job-card')

                        @endforeach

                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>

        <div class="mt-8">
            <div class="grid grid-cols-1">
                <div class="text-center">
                    <a href="{{route('job-lists')}}" class="text-white border-transparent group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500 btn focus:ring focus:ring-custom-500/20">View More  <i class="uil uil-arrow-right ms-1"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end job list -->