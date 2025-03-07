@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div
            class="alert alert-success absolute left-1/2 top-[20%] transform -translate-x-1/2 -translate-y-1/2 text-green font-bold ">
            {{ session('success') }}
        </div>
    @endif
    <!-- Start grid -->
    <section class="pt-44 pb-16">
        <div class="container mx-auto">
            <div class="grid grid-cols-12 gap-y-10 lg:gap-10">
                <div class="col-span-12 lg:col-span-8">
                    <div class="border rounded-md border-gray-100/30 dark:border-neutral-600/80">
                        <div class="relative">
                            <img src="assets/images/job-detail.jpg" alt="" class="rounded-md img-fluid mb-7">
                            <div class="absolute z-20 -bottom-7 left-7">
                                <img src="assets/images/featured-job/img-10.png" alt=""
                                    class="rounded-md img-fluid">
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="grid grid-cols-12">
                                <div class="col-span-12 lg:col-span-8">
                                    <div class="relative">
                                        <h5 class="font-bold mb-1 text-gray-900 dark:text-gray-50">{{ $job->title }}</h5>
                                        <ul class="flex gap-4 text-gray-500 dark:text-gray-300">
                                            <li>
                                                <i class="mdi mdi-account"></i> <span
                                                    class="font-bold">{{ $job->vacancy }}</span> Vacancy
                                            </li>
                                            <li class="bg-sky-500">
                                                <span
                                                    class="px-2 py-1 text-white rounded text-13">{{ $job->status }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-span-12 lg:col-span-4">
                                    <div class="flex gap-3 md:justify-end">
                                        <div
                                            class="w-8 h-8 text-center text-gray-100 transition-all duration-300 bg-transparent border rounded cursor-pointer border-gray-100/50 hover:bg-red-600 hover:text-white hover:border-transparent dark:border-zinc-700">

                                            <form action="{{ route('subscribe') }}" method="POST" class="inline">
                                                @csrf
                                                <input type="hidden" name="category_id" value="{{ $job->category->id }}">
                                                @if (Auth::check())
                                                    <button type="submit"
                                                        title="{{ Auth::user()->isSubscribed($job->category->id) ? 'Already Subscribed' : 'Subscribe for ' . $job->category->name . ' Jobs' }}"
                                                        class="w-8 h-8 text-center text-gray-50 transition-all duration-300 border rounded cursor-pointer 
                                                        dark:border-zinc-700
                                                        {{ Auth::user()->isSubscribed($job->category->id) ? 'bg-gray-300 text-gray-500 cursor-not-allowed' : 'bg-violet-500 hover:bg-red-800 hover:text-white hover:border-transparent' }}"
                                                        {{ Auth::user()->isSubscribed($job->category->id) ? 'disabled' : '' }}>
                                                @endif

                                                <i class="uil uil-envelope-open text-lg leading-[1.8]"></i>
                                                </button>
                                            </form>
                                        </div>


                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 mt-8 gap-y-3 lg:gap-3">
                                <div class="col-span-12 lg:col-span-3">
                                    <div class="p-4 border rounded border-gray-100/50 dark:border-neutral-600/80">
                                        <p class="font-bold mb-1 text-gray-500 dark:text-gray-300 text-13">Company</p>
                                        <p class="font-medium text-gray-900 dark:text-gray-50">{{ $job->company->name }}</p>
                                    </div>
                                </div>
                                <div class="col-span-12 lg:col-span-3">
                                    <div class="p-4 border rounded border-gray-100/50 dark:border-neutral-600/80">
                                        <p class="font-bold mb-1 text-gray-500 dark:text-gray-300 text-13">Employee type</p>
                                        <p class="font-medium text-gray-900 dark:text-gray-50">{{ ucfirst($job->type) }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-span-12 lg:col-span-3">
                                    <div class="p-4 border rounded border-gray-100/50 dark:border-neutral-600/80">
                                        <p class="font-bold mb-1 text-gray-500 dark:text-gray-300 text-13">Experience</p>
                                        <p class="font-medium text-gray-900 dark:text-gray-50">Minimum
                                            {{ $job->experience }}
                                            Year</p>
                                    </div>
                                </div>
                                <div class="col-span-12 lg:col-span-3">
                                    <div class="p-4 border rounded border-gray-100/50 dark:border-neutral-600/80">
                                        <p class="font-bold mb-1 text-gray-500 dark:text-gray-300 text-13">Offer Salary</p>
                                        <p class="font-medium text-gray-900 dark:text-gray-50">
                                            {{ Number::currency($job->salary_range) }}/ Month
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5">
                                <h5 class="font-bold mb-3 text-gray-900 dark:text-gray-50">Job Description</h5>
                                <div>
                                    <p class="mb-0 text-gray-500 dark:text-gray-300">{{ $job->description }}</p>
                                </div>
                            </div>

                            <div class="mt-5">
                                <h5 class="font-bold mb-3 text-gray-900 dark:text-gray-50">Responsibilities</h5>
                                <div>
                                    <p class="mb-3 text-gray-500 dark:text-gray-300">As a Product Designer, you will work
                                        within a Product Delivery Team fused with UX, engineering, product and data talent.
                                    </p>

                                    <ul class="mb-0 text-gray-500 dark:text-gray-300">
                                        <li class="mb-2 text-gray-500 dark:text-gray-300"><i
                                                class="mr-2 uil uil-circle"></i> Have sound knowledge of commercial
                                            activities.</li>
                                        <li class="mb-2 text-gray-500 dark:text-gray-300"><i
                                                class="mr-2 uil uil-circle"></i> Build next-generation web applications with
                                            a focus on the client side</li>
                                        <li class="mb-2 text-gray-500 dark:text-gray-300"><i
                                                class="mr-2 uil uil-circle"></i> Work on multiple projects at once, and
                                            consistently meet draft deadlines</li>
                                        <li class="mb-2 text-gray-500 dark:text-gray-300"><i
                                                class="mr-2 uil uil-circle"></i> have already graduated or are currently in
                                            any year of study</li>
                                        <li class="text-gray-500 dark:text-gray-300"><i class="mr-2 uil uil-circle"></i>
                                            Revise the work of previous designers to create a unified aesthetic for our
                                            brand materials</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="mt-5">
                                <h5 class="font-bold mb-3 text-gray-900 dark:text-gray-50">Qualification</h5>
                                <div>
                                    <ul class="mb-0 text-gray-500 dark:text-gray-300">
                                        <li class="mb-2 text-gray-500 dark:text-gray-300"><i
                                                class="mr-2 uil uil-circle"></i> B.C.A / M.C.A under National University
                                            course complete.</li>
                                        <li class="mb-2 text-gray-500 dark:text-gray-300"><i
                                                class="mr-2 uil uil-circle"></i> 3 or more years of professional design
                                            experience</li>
                                        <li class="mb-2 text-gray-500 dark:text-gray-300"><i
                                                class="mr-2 uil uil-circle"></i> have already graduated or are currently in
                                            any year of study </li>
                                        <li class="mb-2 text-gray-500 dark:text-gray-300"><i
                                                class="mr-2 uil uil-circle"></i> Advanced degree or equivalent experience in
                                            graphic and web design</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="mt-5">
                                <h5 class="font-bold mb-3 text-gray-900 dark:text-gray-50">Skill & Experience</h5>
                                <div>
                                    <ul class="mb-0 text-gray-500 dark:text-gray-300">
                                        <li class="mb-2 text-gray-500 dark:text-gray-300"><i
                                                class="mr-2 uil uil-circle"></i> Understanding of key Design Principal</li>
                                        <li class="mb-2 text-gray-500 dark:text-gray-300"><i
                                                class="mr-2 uil uil-circle"></i> Proficiency With HTML, CSS, Tailwind</li>
                                        <li class="mb-2 text-gray-500 dark:text-gray-300"><i
                                                class="mr-2 uil uil-circle"></i> Wordpress: 1 year (Required) </li>
                                        <li class="mb-2 text-gray-500 dark:text-gray-300"><i
                                                class="mr-2 uil uil-circle"></i> Experience designing and developing
                                            responsive design websites </li>
                                        <li class="mb-2 text-gray-500 dark:text-gray-300"><i
                                                class="mr-2 uil uil-circle"></i> web designing: 1 year (Preferred) </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="mt-4">
                                <span
                                    class="px-2 py-1 text-white rounded text-11 group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500">PHP</span>
                                <span
                                    class="px-2 py-1 text-white rounded text-11 group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500">JS</span>
                                <span
                                    class="px-2 py-1 text-white rounded text-11 group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500">Marketing</span>
                                <span
                                    class="px-2 py-1 text-white rounded text-11 group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500">REACT</span>
                                <span
                                    class="px-2 py-1 text-white rounded text-11 group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500">PHOTOSHOP</span>
                            </div>

                            <div class="pt-3 mt-4">
                                <ul class="flex flex-wrap items-center gap-3 mb-0">
                                    <li class="mt-1 dark:text-gray-50">
                                        Share this job:
                                    </li>
                                    <li class="mt-1">
                                        <a href="javascript:void(0)"
                                            class="btn group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500 border-transparent text-white hover:-translate-y-1.5"><i
                                                class="uil uil-facebook-f"></i> Facebook</a>
                                    </li>
                                    <li class="mt-1">
                                        <a href="javascript:void(0)"
                                            class="btn bg-red-600 border-transparent text-white hover:-translate-y-1.5"><i
                                                class="uil uil-google"></i> Google+</a>
                                    </li>
                                    <li class="mt-1">
                                        <a href="javascript:void(0)"
                                            class="btn bg-green-500 border-transparent text-white hover:-translate-y-1.5"><i
                                                class="uil uil-linkedin-alt"></i> linkedin</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>

                    @include('jobs.partials.related-jobs')


                </div>
                <div class="col-span-12 space-y-6 lg:col-span-4">
                    <div class="border rounded border-gray-100/30 dark:border-neutral-600/80">
                        <div class="p-6">
                            <h6 class="font-bold text-gray-900 text-17 dark:text-gray-50">Job Overview</h6>

                            <ul>
                                <li>
                                    <div class="flex mt-6">
                                        <i
                                            class="uil uil-user icon group-data-[theme-color=violet]:bg-violet-500/20  h-12 w-12 text-center leading-[2.4] text-xl group-data-[theme-color=violet]:text-violet-500  group-data-[theme-color=blue]:text-blue-500 rounded-full"></i>
                                        <div class="ltr:ml-4 rtl:mr-4">
                                            <h6 class="font-bold mb-2 text-sm text-gray-900 dark:text-gray-50">Job Title
                                            </h6>
                                            <p class="font-semibold text-gray-500 dark:text-gray-300">{{ $job->title }}
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex mt-6">
                                        <i
                                            class="uil uil-star-half-alt icon group-data-[theme-color=violet]:bg-violet-500/20  h-12 w-12 text-center leading-[2.4] text-xl group-data-[theme-color=violet]:text-violet-500  group-data-[theme-color=blue]:text-blue-500 rounded-full"></i>
                                        <div class="ltr:ml-4 rtl:mr-4">
                                            <h6 class="font-bold mb-2 text-sm text-gray-900 dark:text-gray-50">Experience
                                            </h6>
                                            <p class="text-gray-500 dark:text-gray-300"> {{ $job->experience }} Years</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex mt-6">
                                        <i
                                            class="uil uil-location-point icon group-data-[theme-color=violet]:bg-violet-500/20  h-12 w-12 text-center leading-[2.4] text-xl group-data-[theme-color=violet]:text-violet-500  group-data-[theme-color=blue]:text-blue-500 rounded-full"></i>
                                        <div class="ltr:ml-4 rtl:mr-4">
                                            <h6 class="font-bold mb-2 text-sm text-gray-900 dark:text-gray-50">Location
                                            </h6>
                                            <p class="text-gray-500 dark:text-gray-300">{{ $job->location->name }} </p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex mt-6">
                                        <i
                                            class="uil uil-usd-circle icon group-data-[theme-color=violet]:bg-violet-500/20  h-12 w-12 text-center leading-[2.4] text-xl group-data-[theme-color=violet]:text-violet-500  group-data-[theme-color=blue]:text-blue-500 rounded-full"></i>
                                        <div class="ltr:ml-4 rtl:mr-4">
                                            <h6 class="font-bold mb-2 text-sm text-gray-900 dark:text-gray-50">Offered
                                                Salary</h6>
                                            <p class="text-gray-500 dark:text-gray-300">
                                                {{ Number::currency($job->salary_range) }}
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex mt-6">
                                        <i
                                            class="uil uil-graduation-cap icon group-data-[theme-color=violet]:bg-violet-500/20  h-12 w-12 text-center leading-[2.4] text-xl group-data-[theme-color=violet]:text-violet-500  group-data-[theme-color=blue]:text-blue-500 rounded-full"></i>
                                        <div class="ltr:ml-4 rtl:mr-4">
                                            <h6 class="font-bold mb-2 text-sm text-gray-900 dark:text-gray-50">
                                                Qualification
                                            </h6>
                                            <p class="text-gray-500 dark:text-gray-300">{{ $job->qualification }}</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex mt-6">
                                        <i
                                            class="uil uil-building icon group-data-[theme-color=violet]:bg-violet-500/20  h-12 w-12 text-center leading-[2.4] text-xl group-data-[theme-color=violet]:text-violet-500  group-data-[theme-color=blue]:text-blue-500 rounded-full"></i>
                                        <div class="ltr:ml-4 rtl:mr-4">
                                            <h6 class="font-bold mb-2 text-sm text-gray-900 dark:text-gray-50">Industry
                                            </h6>
                                            <p class="text-gray-500 dark:text-gray-300">Private</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex mt-6">
                                        <i
                                            class="uil uil-history icon group-data-[theme-color=violet]:bg-violet-500/20  h-12 w-12 text-center leading-[2.4] text-xl group-data-[theme-color=violet]:text-violet-500  group-data-[theme-color=blue]:text-blue-500 rounded-full"></i>
                                        <div class="ltr:ml-4 rtl:mr-4">
                                            <h6 class="font-bold mb-2 text-sm text-gray-900 dark:text-gray-50">Date Posted
                                            </h6>
                                            <p class="text-gray-500 dark:text-gray-300">Posted
                                                {{ $job->created_at->diffForHumans() }}
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                            <div class="mt-8 space-y-2">
                                <a href="{{ $job->application_link }}" data-bs-toggle="modal"
                                    class="btn w-full group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500 border-transparent text-white hover:-translate-y-1.5">Apply
                                    Now <i class="uil uil-arrow-right"></i></a>
                                <a href="bookmark-jobs.html"
                                    class="btn w-full bg-yellow-500/20 border-transparent text-gray-500 hover:-translate-y-1.5 dark:bg-yellow-500/30"><i
                                        class="uil uil-bookmark"></i> Add Bookmark</a>
                            </div>
                        </div>
                    </div>
                    <div class="border rounded border-gray-100/30 dark:border-neutral-600/80">
                        <div class="p-6">
                            <div>
                                <img src="assets/images/featured-job/img-02.png" alt=""
                                    class="mx-auto img-fluid">

                                <div class="mt-4 text-center">
                                    <h6 class="font-bold marker:text-gray-900 text-17 dark:text-gray-50">
                                        {{ $job->company->name }}
                                    </h6>
                                    <p class="text-gray-500 dark:text-gray-300">Since July 2017</p>
                                </div>

                                <ul class="mt-4 space-y-4">
                                    <li>
                                        <div class="flex">
                                            <i
                                                class="text-xl uil uil-phone-volume group-data-[theme-color=violet]:text-violet-500  group-data-[theme-color=blue]:text-blue-500"></i>
                                            <div class="ltr:ml-3 rtl:mr-3">
                                                <h6 class="font-bold mb-1 text-sm text-gray-900 dark:text-gray-50">Phone
                                                </h6>
                                                <p class="text-sm text-gray-500 dark:text-gray-300">
                                                    {{ $job->company->contact_number }}
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mt-3">
                                        <div class="flex">
                                            <i
                                                class="text-xl uil uil-envelope group-data-[theme-color=violet]:text-violet-500  group-data-[theme-color=blue]:text-blue-500"></i>
                                            <div class="ltr:ml-3 rtl:mr-3">
                                                <h6 class="font-bold mb-1 text-sm text-gray-900 dark:text-gray-50">Email
                                                </h6>
                                                <p class="text-sm text-gray-500 dark:text-gray-300">
                                                    {{ $job->company->email }}
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mt-3">
                                        <div class="flex">
                                            <i
                                                class="text-xl uil uil-globe group-data-[theme-color=violet]:text-violet-500  group-data-[theme-color=blue]:text-blue-500"></i>
                                            <div class="ltr:ml-3 rtl:mr-3">
                                                <h6 class="font-bold mb-1 text-sm text-gray-900 dark:text-gray-50">Website
                                                </h6>
                                                <p class="mb-0 text-gray-500 dark:text-gray-300 fs-14 text-break">
                                                    {{ $job->company->website }}
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mt-3">
                                        <div class="flex">
                                            <i
                                                class="text-xl uil uil-map-marker group-data-[theme-color=violet]:text-violet-500  group-data-[theme-color=blue]:text-blue-500"></i>
                                            <div class="ltr:ml-3 rtl:mr-3">
                                                <h6 class="font-bold mb-1 text-sm text-gray-900 dark:text-gray-50">Location
                                                </h6>
                                                <p class="text-sm text-gray-500 dark:text-gray-300">
                                                    {{ $job->company->city }},
                                                    {{ $job->company->country }}
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>

                                <div class="mt-6">
                                    <a href="{{ route('company.profile', $job->company->slug) }}"
                                        class="w-full text-white border-transparent btn group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500"><i
                                            class="mdi mdi-eye"></i> View Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h6 class="font-bold mb-3 text-16 dark:text-gray-50">Job location</h6>
                        <iframe
                            src="https://www.google.com/maps?q={{ $job->location->latitude }},{{ $job->location->longitude }}&output=embed"
                            style="width:100%" height="250" allowfullscreen="" loading="lazy">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End grid -->
@endsection
