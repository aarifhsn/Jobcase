@extends('layouts.app')

@section('content')

<!-- Start grid -->
    <section class="pt-44 pb-28">
        <div class="container mx-auto">
            <div class="grid items-center grid-cols-12 mb-4">
                <div class="col-span-12 lg:col-span-8">
                    <div class="mb-3 mb-lg-0">
                        <h6 class="text-gray-900 text-16 dark:text-gray-50"> Showing 1 – 8 of 11 results </h6>
                    </div>
                </div><!--end col-->


                <div class="col-span-12 lg:col-span-4">
                    <div class="candidate-list-widgets">
                        <div class="grid items-center grid-cols-12 gap-3">
                            <div class="col-span-12 lg:col-span-6">
                                <div class="selection-widget">
                                    <select class="form-select" data-trigger name="choices-single-filter-orderby" id="choices-single-filter-orderby" aria-label="Default select example">
                                        <option value="df">Default</option>
                                        <option value="ne">Newest</option>
                                        <option value="od">Oldest</option>
                                        <option value="rd">Random</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-span-12 lg:col-span-6">
                                <div class="selection-widget">
                                    <select class="form-select" data-trigger name="choices-candidate-page" id="choices-candidate-page" aria-label="Default select example">
                                        <option value="df">All</option>
                                        <option value="ne">8 per Page</option>
                                        <option value="ne">12 per Page</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div><!--end candidate-list-widgets-->
                </div><!--end col-->
            </div>
            <div class="mt-8">
                <div class="grid grid-cols-1 gap-y-5">
                    <div class="p-5 border border-gray-100/50 rounded-md relative hover:-translate-y-1.5 transition-all duration-500 ease-in-out group-data-[theme-color=violet]:hover:border-violet-500 group-data-[theme-color=sky]:hover:border-sky-500 group-data-[theme-color=red]:hover:border-red-500 group-data-[theme-color=green]:hover:border-green-500 group-data-[theme-color=pink]:hover:border-pink-500 group-data-[theme-color=blue]:hover:border-blue-500 hover:shadow-md hover:shadow-gray-100/30 dark:border-neutral-600 dark:hover:shadow-neutral-900">
                        <div class="grid grid-cols-12">
                            <div class="col-span-12 lg:col-span-1">
                                <a href="company-details.html"><img src="{{asset('images/featured-job/img-01.png')}}" alt="" class="img-fluid rounded-3"></a>
                            </div><!--end col-->
                            <div class="col-span-12 lg:col-span-9">
                                <div class="mt-4 lg:mt-0">
                                    <h5 class="mb-1 text-17"><a href="" class="text-gray-900 dark:text-gray-50">Business Associate</a></h5>
                                    <ul class="flex gap-3 mb-0">
                                        <li class="">
                                            <p class="mb-0 text-sm text-gray-500 dark:text-gray-300">Jobcy Technology Pvt.Ltd</p>
                                        </li>
                                        <li class="">
                                            <p class="mb-0 text-sm text-gray-500 dark:text-gray-300"><i class="mdi mdi-map-marker"></i> California</p>
                                        </li>
                                        <li class="">
                                            <p class="mb-0 text-sm text-gray-500 dark:text-gray-300"><i class="uil uil-wallet"></i> $250 - $800 / month</p>
                                        </li>
                                    </ul>
                                    <div class="flex flex-wrap gap-2 mt-3">
                                        <span class="px-2 py-0.5 mt-1 font-medium text-red-500 rounded bg-red-500/20 text-13">Part Time</span>
                                        <span class="px-2 py-0.5 mt-1 font-medium text-yellow-500 rounded bg-yellow-500/20 text-13">Urgent</span>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="items-center col-span-12 lg:col-span-2 ">
                                <ul class="flex flex-wrap gap-3 mt-4 lg:mt-0">
                                    <li class="w-10 h-10 text-lg leading-10 text-center text-green-500 rounded-full bg-green-500/20" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit" data-bs-original-title="Edit">
                                        <a href="{{route('manage-jobs-post')}}" class="text-center avatar-sm success-bg-subtle d-inline-block rounded-circle fs-18">
                                            <i class="uil uil-edit"></i>
                                        </a>
                                    </li>
                                    <li class="w-10 h-10 text-lg leading-10 text-center text-red-500 rounded-full bg-red-500/20" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete">
                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#deleteModal" class="text-center avatar-sm danger-bg-subtle d-inline-block rounded-circle fs-18">
                                            <i class="uil uil-trash-alt"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div>

                    <div class="p-5 border border-gray-100/50 rounded-md relative hover:-translate-y-1.5 transition-all duration-500 ease-in-out group-data-[theme-color=violet]:hover:border-violet-500 group-data-[theme-color=sky]:hover:border-sky-500 group-data-[theme-color=red]:hover:border-red-500 group-data-[theme-color=green]:hover:border-green-500 group-data-[theme-color=pink]:hover:border-pink-500 group-data-[theme-color=blue]:hover:border-blue-500 hover:shadow-md hover:shadow-gray-100/30 dark:border-neutral-600 dark:hover:shadow-neutral-900">
                        <div class="grid grid-cols-12">
                            <div class="col-span-12 lg:col-span-1">
                                <a href="company-details.html"><img src="{{asset('images/featured-job/img-02.png')}}" alt="" class="img-fluid rounded-3"></a>
                            </div><!--end col-->
                            <div class="col-span-12 lg:col-span-9">
                                <div class="mt-4 lg:mt-0">
                                    <h5 class="mb-1 text-17"><a href="job-details.html" class="text-gray-900 dark:text-gray-50">Marketing Director</a> <small class="font-normal text-gray-500">(2-4 Yrs Exp.)</small></h5>
                                    <ul class="flex gap-3 mb-0">
                                        <li class="">
                                            <p class="mb-0 text-sm text-gray-500 dark:text-gray-300">Creative Agency</p>
                                        </li>
                                        <li class="">
                                            <p class="mb-0 text-sm text-gray-500 dark:text-gray-300"><i class="mdi mdi-map-marker"></i> New York</p>
                                        </li>
                                        <li class="">
                                            <p class="mb-0 text-sm text-gray-500 dark:text-gray-300"><i class="uil uil-wallet"></i> $250 - $800 / month</p>
                                        </li>
                                    </ul>
                                    <div class="flex flex-wrap gap-2 mt-3">
                                        <span class="px-2 py-0.5 mt-1 font-medium text-red-500 rounded bg-red-500/20 text-13">Part Time</span>
                                        <span class="px-2 py-0.5 mt-1 font-medium text-sky-500 rounded bg-sky-500/20 text-13">Private</span>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="items-center col-span-12 lg:col-span-2">
                                <ul class="flex flex-wrap gap-3 mt-4 lg:mt-0">
                                    <li class="w-10 h-10 text-lg leading-10 text-center text-green-500 rounded-full bg-green-500/20" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit" data-bs-original-title="Edit">
                                        <a href="{{route('manage-jobs-post')}}" class="text-center avatar-sm success-bg-subtle d-inline-block rounded-circle fs-18">
                                            <i class="uil uil-edit"></i>
                                        </a>
                                    </li>
                                    <li class="w-10 h-10 text-lg leading-10 text-center text-red-500 rounded-full bg-red-500/20" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete">
                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#deleteModal" class="text-center avatar-sm danger-bg-subtle d-inline-block rounded-circle fs-18">
                                            <i class="uil uil-trash-alt"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div>

                    <div class="p-5 border border-gray-100/50 rounded-md relative hover:-translate-y-1.5 transition-all duration-500 ease-in-out group-data-[theme-color=violet]:hover:border-violet-500 group-data-[theme-color=sky]:hover:border-sky-500 group-data-[theme-color=red]:hover:border-red-500 group-data-[theme-color=green]:hover:border-green-500 group-data-[theme-color=pink]:hover:border-pink-500 group-data-[theme-color=blue]:hover:border-blue-500 hover:shadow-md hover:shadow-gray-100/30 dark:border-neutral-600 dark:hover:shadow-neutral-900">
                        <div class="grid grid-cols-12">
                            <div class="col-span-12 lg:col-span-1">
                                <a href="company-details.html"><img src="{{asset('images/featured-job/img-03.png')}}" alt="" class="img-fluid rounded-3"></a>
                            </div><!--end col-->
                            <div class="col-span-12 lg:col-span-9">
                                <div class="mt-4 lg:mt-0">
                                    <h5 class="mb-1 text-17"><a href="job-details.html" class="text-gray-900 dark:text-gray-50">HTML Developer</a> <small class="font-normal text-gray-500">(2-4 Yrs Exp.)</small></h5>
                                    <ul class="flex gap-3 mb-0">
                                        <li class="">
                                            <p class="mb-0 text-sm text-gray-500 dark:text-gray-300">Jobcy Technology Pvt.Ltd</p>
                                        </li>
                                        <li class="">
                                            <p class="mb-0 text-sm text-gray-500 dark:text-gray-300"><i class="mdi mdi-map-marker"></i> California</p>
                                        </li>
                                        <li class="">
                                            <p class="mb-0 text-sm text-gray-500 dark:text-gray-300"><i class="uil uil-wallet"></i> $250 - $800 / month</p>
                                        </li>
                                    </ul>
                                    <div class="flex flex-wrap gap-2 mt-3">
                                        <span class="px-2 py-0.5 mt-1 font-medium text-violet-500 rounded bg-violet-500/20 text-13">Freelance</span>
                                        <span class="px-2 py-0.5 mt-1 font-medium text-violet-500 rounded bg-violet-500/20 text-13">Freelance</span>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="items-center col-span-12 lg:col-span-2">
                                <ul class="flex flex-wrap gap-3 mt-4 lg:mt-0">
                                    <li class="w-10 h-10 text-lg leading-10 text-center text-green-500 rounded-full bg-green-500/20" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit" data-bs-original-title="Edit">
                                        <a href="{{route('manage-jobs-post')}}" class="text-center avatar-sm success-bg-subtle d-inline-block rounded-circle fs-18">
                                            <i class="uil uil-edit"></i>
                                        </a>
                                    </li>
                                    <li class="w-10 h-10 text-lg leading-10 text-center text-red-500 rounded-full bg-red-500/20" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete">
                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#deleteModal" class="text-center avatar-sm danger-bg-subtle d-inline-block rounded-circle fs-18">
                                            <i class="uil uil-trash-alt"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div>

                    <div class="p-5 border border-gray-100/50 rounded-md relative hover:-translate-y-1.5 transition-all duration-500 ease-in-out group-data-[theme-color=violet]:hover:border-violet-500 group-data-[theme-color=sky]:hover:border-sky-500 group-data-[theme-color=red]:hover:border-red-500 group-data-[theme-color=green]:hover:border-green-500 group-data-[theme-color=pink]:hover:border-pink-500 group-data-[theme-color=blue]:hover:border-blue-500 hover:shadow-md hover:shadow-gray-100/30 dark:border-neutral-600 dark:hover:shadow-neutral-900">
                        <div class="grid grid-cols-12">
                            <div class="col-span-12 lg:col-span-1">
                                <a href="company-details.html"><img src="{{asset('images/featured-job/img-04.png')}}" alt="" class="img-fluid rounded-3"></a>
                            </div><!--end col-->
                            <div class="col-span-12 lg:col-span-9">
                                <div class="mt-4 lg:mt-0">
                                    <h5 class="mb-1 text-17"><a href="job-details.html" class="text-gray-900 dark:text-gray-50">HTML Developer</a> <small class="font-normal text-gray-500">(5+ Yrs Exp.)</small></h5>
                                    <ul class="flex gap-3 mb-0">
                                        <li class="">
                                            <p class="mb-0 text-sm text-gray-500 dark:text-gray-300">Jobcy Technology Pvt.Ltd</p>
                                        </li>
                                        <li class="">
                                            <p class="mb-0 text-sm text-gray-500 dark:text-gray-300"><i class="mdi mdi-map-marker"></i> California</p>
                                        </li>
                                        <li class="">
                                            <p class="mb-0 text-sm text-gray-500 dark:text-gray-300"><i class="uil uil-wallet"></i> $250 - $800 / month</p>
                                        </li>
                                    </ul>
                                    <div class="flex flex-wrap gap-2 mt-3">
                                        <span class="px-2 py-0.5 mt-1 font-medium text-green-500 rounded bg-green-500/20 text-13">Full Time</span>
                                        <span class="px-2 py-0.5 mt-1 font-medium text-sky-500 rounded bg-sky-500/20 text-13">Private</span>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="items-center col-span-12 lg:col-span-2">
                                <ul class="flex flex-wrap gap-3 mt-4 lg:mt-0">
                                    <li class="w-10 h-10 text-lg leading-10 text-center text-green-500 rounded-full bg-green-500/20" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit" data-bs-original-title="Edit">
                                        <a href="{{route('manage-jobs-post')}}" class="text-center avatar-sm success-bg-subtle d-inline-block rounded-circle fs-18">
                                            <i class="uil uil-edit"></i>
                                        </a>
                                    </li>
                                    <li class="w-10 h-10 text-lg leading-10 text-center text-red-500 rounded-full bg-red-500/20" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete">
                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#deleteModal" class="text-center avatar-sm danger-bg-subtle d-inline-block rounded-circle fs-18">
                                            <i class="uil uil-trash-alt"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div>

                    <div class="p-5 border border-gray-100/50 rounded-md relative hover:-translate-y-1.5 transition-all duration-500 ease-in-out group-data-[theme-color=violet]:hover:border-violet-500 group-data-[theme-color=sky]:hover:border-sky-500 group-data-[theme-color=red]:hover:border-red-500 group-data-[theme-color=green]:hover:border-green-500 group-data-[theme-color=pink]:hover:border-pink-500 group-data-[theme-color=blue]:hover:border-blue-500 hover:shadow-md hover:shadow-gray-100/30 dark:border-neutral-600 dark:hover:shadow-neutral-900">
                        <div class="grid grid-cols-12">
                            <div class="col-span-12 lg:col-span-1">
                                <a href="company-details.html"><img src="{{asset('images/featured-job/img-05.png')}}" alt="" class="img-fluid rounded-3"></a>
                            </div><!--end col-->
                            <div class="col-span-12 lg:col-span-9">
                                <div class="mt-4 lg:mt-0">
                                    <h5 class="mb-1 text-17"><a href="job-details.html" class="text-gray-900 dark:text-gray-50">Product Designer </a> <small class="font-normal text-gray-500">(0-5 Yrs Exp.)</small></h5>
                                    <ul class="flex gap-3 mb-0">
                                        <li class="">
                                            <p class="mb-0 text-sm text-gray-500 dark:text-gray-300">Creative Agency </p>
                                        </li>
                                        <li class="">
                                            <p class="mb-0 text-sm text-gray-500 dark:text-gray-300"><i class="mdi mdi-map-marker"></i> California</p>
                                        </li>
                                        <li class="">
                                            <p class="mb-0 text-sm text-gray-500 dark:text-gray-300"><i class="uil uil-wallet"></i> $250 - $800 / month</p>
                                        </li>
                                    </ul>
                                    <div class="flex flex-wrap gap-2 mt-3">
                                        <span class="px-2 py-0.5 mt-1 font-medium text-blue-500 rounded bg-blue-500/20 text-13">Internship</span>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="items-center col-span-12 lg:col-span-2">
                                <ul class="flex flex-wrap gap-3 mt-4 lg:mt-0">
                                    <li class="w-10 h-10 text-lg leading-10 text-center text-green-500 rounded-full bg-green-500/20" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit" data-bs-original-title="Edit">
                                        <a href="{{route('manage-jobs-post')}}" class="text-center avatar-sm success-bg-subtle d-inline-block rounded-circle fs-18">
                                            <i class="uil uil-edit"></i>
                                        </a>
                                    </li>
                                    <li class="w-10 h-10 text-lg leading-10 text-center text-red-500 rounded-full bg-red-500/20" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete">
                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#deleteModal" class="text-center avatar-sm danger-bg-subtle d-inline-block rounded-circle fs-18">
                                            <i class="uil uil-trash-alt"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div>

                    <div class="p-5 border border-gray-100/50 rounded-md relative hover:-translate-y-1.5 transition-all duration-500 ease-in-out group-data-[theme-color=violet]:hover:border-violet-500 group-data-[theme-color=sky]:hover:border-sky-500 group-data-[theme-color=red]:hover:border-red-500 group-data-[theme-color=green]:hover:border-green-500 group-data-[theme-color=pink]:hover:border-pink-500 group-data-[theme-color=blue]:hover:border-blue-500 hover:shadow-md hover:shadow-gray-100/30 dark:border-neutral-600 dark:hover:shadow-neutral-900">
                        <div class="grid grid-cols-12">
                            <div class="col-span-12 lg:col-span-1">
                                <a href="company-details.html"><img src="{{asset('images/featured-job/img-06.png')}}" alt="" class="img-fluid rounded-3"></a>
                            </div><!--end col-->
                            <div class="col-span-12 lg:col-span-9">
                                <div class="mt-4 lg:mt-0">
                                    <h5 class="mb-1 text-17"><a href="job-details.html" class="text-gray-900 dark:text-gray-50">Project Manager </a> <small class="font-normal text-gray-500">(0-2 Yrs Exp.)</small></h5>
                                    <ul class="flex gap-3 mb-0">
                                        <li class="">
                                            <p class="mb-0 text-sm text-gray-500 dark:text-gray-300">Jobcy Technology Pvt.Ltd </p>
                                        </li>
                                        <li class="">
                                            <p class="mb-0 text-sm text-gray-500 dark:text-gray-300"><i class="mdi mdi-map-marker"></i> California</p>
                                        </li>
                                        <li class="">
                                            <p class="mb-0 text-sm text-gray-500 dark:text-gray-300"><i class="uil uil-wallet"></i> $250 - $800 / month</p>
                                        </li>
                                    </ul>
                                    <div class="flex flex-wrap gap-2 mt-3">
                                        <span class="px-2 py-0.5 mt-1 font-medium text-blue-500 rounded bg-blue-500/20 text-13">Internship</span>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="items-center col-span-12 lg:col-span-2">
                                <ul class="flex flex-wrap gap-3 mt-4 lg:mt-0">
                                    <li class="w-10 h-10 text-lg leading-10 text-center text-green-500 rounded-full bg-green-500/20" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit" data-bs-original-title="Edit">
                                        <a href="{{route('manage-jobs-post')}}" class="text-center avatar-sm success-bg-subtle d-inline-block rounded-circle fs-18">
                                            <i class="uil uil-edit"></i>
                                        </a>
                                    </li>
                                    <li class="w-10 h-10 text-lg leading-10 text-center text-red-500 rounded-full bg-red-500/20" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete">
                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#deleteModal" class="text-center avatar-sm danger-bg-subtle d-inline-block rounded-circle fs-18">
                                            <i class="uil uil-trash-alt"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-12">
                <div class="col-span-12">
                    <ul class="flex justify-center gap-2 mt-8">
                        <li class="w-12 h-12 text-center border rounded-full cursor-default border-gray-100/50 dark:border-gray-100/20">
                            <a class="cursor-auto" href="javascript:void(0)" tabindex="-1">
                                <i class="mdi mdi-chevron-double-left text-16 leading-[2.8] dark:text-white"></i>
                            </a>
                        </li>
                        <li class="w-12 h-12 text-center text-white border border-transparent rounded-full cursor-pointer group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500">
                            <a class="text-16 leading-[2.8]" href="javascript:void(0)">1</a>
                        </li>
                        <li class="w-12 h-12 text-center text-gray-900 transition-all duration-300 border rounded-full cursor-pointer border-gray-100/50 hover:bg-gray-100/30 focus:bg-gray-100/30 dark:border-gray-100/20 dark:text-gray-50 dark:hover:bg-gray-500/20">
                            <a class="text-16 leading-[2.8]" href="javascript:void(0)">2</a>
                        </li>
                        <li class="w-12 h-12 text-center text-gray-900 transition-all duration-300 border rounded-full cursor-pointer border-gray-100/50 hover:bg-gray-100/30 focus:bg-gray-100/30 dark:border-gray-100/20 dark:text-gray-50 dark:hover:bg-gray-500/20">
                            <a class="text-16 leading-[2.8]" href="javascript:void(0)">3</a>
                        </li>
                        <li class="w-12 h-12 text-center text-gray-900 transition-all duration-300 border rounded-full cursor-pointer border-gray-100/50 hover:bg-gray-100/30 focus:bg-gray-100/30 dark:border-gray-100/20 dark:text-gray-50 dark:hover:bg-gray-500/20">
                            <a class="text-16 leading-[2.8]" href="javascript:void(0)">4</a>
                        </li>
                        <li class="w-12 h-12 text-center text-gray-900 transition-all duration-300 border rounded-full cursor-pointer border-gray-100/50 hover:bg-gray-100/30 focus:bg-gray-100/30 dark:border-gray-100/20 dark:text-gray-50 dark:hover:bg-gray-500/20">
                            <a href="javascript:void(0)" tabindex="-1">
                                <i class="mdi mdi-chevron-double-right text-16 leading-[2.8]"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!--end col-->
            </div>
        </div>
    </section>
<!-- End grid -->

@endsection