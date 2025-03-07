@extends('layouts.app')

@section('content')
<!-- Start team -->
<section class="pt-44 pb-24">
    <div class="container mx-auto">
        <div class="grid grid-cols-12 gap-y-10 lg:gap-10">
            <div class="col-span-12 xl:col-span-9 pb-12">

                @include('jobs.partials.search-form')

                <div class="mt-8">
                    <h6 class="font-semibold mb-4 text-gray-900 dark:text-gray-50">Popular Categories</h6>
                    <ul class="flex flex-wrap gap-3">
                        @foreach ($popular_categories as $popular_category)


                            <li class="border p-[6px] border-gray-100/50 rounded group/joblist dark:border-gray-100/20">
                                <div class="flex items-center">
                                    <div
                                        class="h-8 w-8 text-center group-data-[theme-color=violet]:bg-violet-500/20  text-sm font-medium">
                                        {{ $popular_category->jobs->count() }}
                                    </div>
                                    <a href="{{ route('categories.index', ['slug' => $popular_category->slug]) }}"
                                        class="text-gray-900 ltr:ml-2 rtl:mr-2 dark:text-gray-50">
                                        <h6
                                            class="mb-0 transition-all duration-300 fs-14 group-data-[theme-color=violet]:group-hover/joblist:text-violet-500 ">
                                            {{ $popular_category->name }}
                                        </h6>
                                    </a>
                                </div>
                            </li>

                        @endforeach
                    </ul>
                </div>
                <div class="mt-14">
                    @foreach ($jobs as $job)

                        @include('jobs.partials.job-card')

                    @endforeach

                </div>

                @if ($jobs->hasPages())
                    <div class="grid grid-cols-12">
                        <div class="col-span-12">
                            <span class="flex justify-center gap-2 mt-8">

                                {{ $jobs->links() }}

                            </span>
                        </div>
                        <!--end col-->
                    </div>
                @endif
            </div>
            <div class="col-span-12 space-y-5 lg:col-span-3 filter_form">

                @include('jobs.partials.filter-form')

                <div data-tw-accordion="collapse">
                    <div class="text-gray-700 accordion-item dark:text-gray-300">
                        <h6>
                            <button type="button"
                                class="flex items-center justify-between w-full px-4 py-2 font-medium text-left accordion-header group-data-[theme-color=violet]:bg-violet-500/20  group active">
                                <span class="text-gray-900 text-15 dark:text-gray-50">Tags Cloud</span>
                                <i
                                    class="mdi mdi-chevron-down text-xl group-[.active]:rotate-180 text-gray-900 dark:text-gray-50"></i>
                            </button>
                        </h6>
                        <div class="block accordion-body">
                            <div class="flex flex-wrap gap-2 p-5">
                                @foreach ($tags as $tag)
                                    <a href="{{ route('tags.index', ['name' => $tag->name]) }}"
                                        class="bg-gray-50 text-13 rounded px-2 py-0.5 font-medium text-gray-500 transition-all duration-300 ease-in-out dark:text-gray-50 dark:bg-neutral-600/40">{{ $tag->name }}</a>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End team -->

@endsection