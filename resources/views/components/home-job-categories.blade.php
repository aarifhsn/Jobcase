<!-- start category -->
<section class="py-20 dark:bg-neutral-800">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 gap-5">
            <div class="text-center">
                <h3 class="mb-3 text-3xl text-gray-900 dark:text-gray-50">Browser Jobs Categories</h3>
                <p class="mb-5 text-gray-500 whitespace-pre-line dark:text-gray-300">Post a job to tell us about your project. We'll quickly match you with the
                        right freelancers.</p>
            </div>
        </div>
        <div class="grid grid-cols-12 gap-5">
            
            @foreach ($categories as $category)
                <div class="col-span-12 md:col-span-6 lg:col-span-3">
                    <div class="mt-4">
                        <div class="px-6 py-5 transition-all duration-500 ease-in-out cursor-pointer lg:py-10 hover:-translate-y-2">
                            <div class="job-categorie h-16 w-16 group-data-[theme-color=violet]:bg-violet-500/20 group-data-[theme-color=sky]:bg-sky-500/20 group-data-[theme-color=red]:bg-red-500/20 group-data-[theme-color=green]:bg-green-500/20 group-data-[theme-color=pink]:bg-pink-500/20 group-data-[theme-color=blue]:bg-blue-500/20 rounded-lg text-center leading-[4.4] mx-auto dark:bg-violet-900">
                                <a href="{{ route('categories.index', ['slug' => $category->slug]) }}"> <i class="uim uim-layers-alt"></i>
                                </a>
                            </div>
                            <div class="mt-4 text-center">
                                <a href="{{ route('categories.index', ['slug' => $category->slug]) }}" class="text-gray-900">
                                    <h5 class="text-lg dark:text-gray-50 font-semibold ">{{ $category->name }}</h5>
                                </a>
                                <p class="mt-1 font-medium text-gray-500 dark:text-gray-300">{{ $category->jobs->count() }} Jobs</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="grid grid-cols-1">
            <div class="mt-5 text-center">
                <a href="{{route('job-categories')}}" class="text-white border-transparent group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500 btn hover:-translate-y-2">Browse All Categories <i class="uil uil-arrow-right ms-1"></i></a>
            </div>
        </div>
    </div>
</section>
<!-- end category -->