<div
    class="relative mt-4 overflow-hidden transition-all duration-500 ease-in-out bg-white border rounded-md border-gray-100/50 group/jobs group-data-[theme-color=violet]:hover:border-violet-500  hover:-translate-y-2 dark:bg-neutral-900 dark:border-neutral-600 ">
    <div
        class="w-48 absolute -top-[5px] -left-20 -rotate-45 group-data-[theme-color=violet]:bg-violet-500/20  group-data-[theme-color=violet]:group-hover/jobs:bg-violet-500  transition-all duration-500 ease-in-out p-[6px] text-center dark:bg-violet-500/20">
        <a href="javascript:void(0)" class="text-2xl text-white align-middle"><i class="mdi mdi-star"></i></a>
    </div>
    <div class="p-4">
        <div class="grid items-center grid-cols-12">
            <div class="col-span-12 lg:col-span-2">
                <div class="mb-4 text-center mb-md-0">
                    <a href="company-details.html"><img
                            src="{{ asset('images/featured-job/img-' . sprintf('%02d', rand(1, 10)) . '.png') }}" alt=""
                            class="mx-auto img-fluid rounded-3"></a>
                </div>
            </div>
            <!--end col-->
            <div class="col-span-12 lg:col-span-3">
                <div class="mb-2 mb-md-0">
                    <h5 class="font-bold mb-1 fs-18">
                        <a href="{{ route('job-details', $job->id) }}"
                            class="text-gray-900 dark:text-gray-50">{{ $job->title }}
                        </a>
                    </h5>
                    <a href="#" class="text-gray-500 dark:text-gray-300">{{ $job->company->name }}</a>

                </div>
            </div>
            <!--end col-->
            <div class="col-span-12 lg:col-span-3">
                <div class="mb-2 lg:flex">
                    <div class="flex-shrink-0">
                        <i
                            class="mr-1 group-data-[theme-color=violet]:text-violet-500 group-data-[theme-color=sky]:text-sky-500 group-data-[theme-color=red]:text-red-500 group-data-[theme-color=green]:text-green-500 group-data-[theme-color=pink]:text-pink-500 group-data-[theme-color=blue]:text-blue-500 mdi mdi-map-marker"></i>
                    </div>
                    <p class="mb-0 text-gray-500 dark:text-gray-300">{{ $job->company->city }},
                        {{ $job->company->country }}
                    </p>
                </div>
            </div>
            <!--end col-->
            <div class="col-span-12 lg:col-span-2">
                <div>
                    <p class="mb-2 text-gray-500 dark:text-gray-300"><span
                            class="group-data-[theme-color=violet]:text-violet-500 group-data-[theme-color=sky]:text-sky-500 group-data-[theme-color=red]:text-red-500 group-data-[theme-color=green]:text-green-500 group-data-[theme-color=pink]:text-pink-500 group-data-[theme-color=blue]:text-blue-500">$</span>{{ $job->salary_range }}/m
                    </p>
                </div>
            </div>
            <!--end col-->
            <div class="col-span-12 lg:col-span-2">
                <div class="flex flex-wrap gap-1.5">
                    <span
                        class="badge bg-green-500/20 text-green-500 text-13 px-2 py-0.5 font-medium rounded">{{ $job->type }}</span>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <div class="p-3 bg-gray-50 dark:bg-neutral-700">
        <div class="grid grid-cols-12">
            <div class="col-span-12 lg:col-span-4">
                <div>
                    <p class="mb-0 text-gray-500 dark:text-gray-300"><span
                            class="text-gray-900 dark:text-gray-50">Experience : </span>{{ $job->experience }} years</p>
                </div>
            </div>
            <!--end col-->
            <div class="text-slate-500 col-span-12 lg:col-span-6">

                Keyword:

                <a href="{{ route('categories.index', $job->category->slug) }}"
                    class="text-slate-600 hover:text-slate-800">{{ $job->category->name }},
                </a>

                @foreach ($job->tag as $s_tag)
                    <a href="{{ route('tags.index', ['name' => $s_tag->name]) }}"
                        class="text-slate-600 hover:text-slate-800">
                        {{ $s_tag->name }}@if (!$loop->last)
                            ,
                        @endif
                    </a>
                @endforeach

            </div>
            <!--end col-->
            <div class="col-span-3 lg:col-span-2">
                <div class="text-start text-md-end dark:text-gray-50">
                    <a href="{{ $job->application_link }}" data-bs-toggle="modal">Apply Now <i
                            class="mdi mdi-chevron-double-right"></i></a>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
</div>