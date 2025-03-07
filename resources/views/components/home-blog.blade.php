<section class="py-20 bg-gray-50 dark:bg-neutral-700">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 gap-5">
            <div class="mb-5 text-center">
                <h3 class="mb-3 text-3xl text-gray-900 dark:text-gray-50">Quick Career Tips</h3>
                <p class="mb-5 text-gray-500 whitespace-pre-line dark:text-gray-300">Post a job to tell us about your
                    project. We will quickly match you with the right <br> freelancers.</p>
            </div>
        </div>
        <div class="grid grid-cols-12 gap-5 px-10">

            @foreach ($posts as $post)

                <div class="col-span-12 md:col-span-6 lg:col-span-4">
                    <div
                        class="p-2 mt-3 transition-all duration-500 bg-white rounded shadow-lg shadow-gray-100/50 card dark:bg-neutral-800 dark:shadow-neutral-600/20 group/blog">
                        <div class="relative overflow-hidden">
                            <img src="{{asset('storage/' . $post->image)}}" class="rounded w-full h-64"
                                alt="{{ $post->title}}" />
                            <div
                                class="absolute inset-0 hidden transition-all duration-500 rounded-md bg-black/30 group-hover/blog:block">
                            </div>
                            <div
                                class="hidden text-white transition-all duration-500 top-2 left-2 group-hover/blog:block author group-hover/blog:absolute">
                                <p class="mb-0 "><i class="mdi mdi-account text-light"></i> <span
                                        class="text-light user">{{ $post->user->name }}</span></p>
                                <p class="mb-0 text-light date"><i class="mdi mdi-calendar-check"></i>
                                    {{ $post->created_at }}</p>
                            </div>

                        </div>
                        <div class="p-5">
                            <a href="{{ route('post.show', $post->slug) }}" class="primary-link">
                                <h5 class="mb-1 text-gray-900 text-xl font-semibold dark:text-gray-50">{{ $post->title }}
                                </h5>
                            </a>
                            <p class="my-4 text-gray-500 dark:text-gray-300">
                                {{ Str::limit(strip_tags($post->content), 200) }}
                            </p>
                            <a href="{{ route('post.show', $post->slug) }}"
                                class="font-medium group-data-[theme-color=violet]:text-violet-500 group-data-[theme-color=sky]:text-sky-500 group-data-[theme-color=red]:text-red-500 group-data-[theme-color=green]:text-green-500 group-data-[theme-color=pink]:text-pink-500 group-data-[theme-color=blue]:text-blue-500">Read
                                more <i class="align-middle mdi mdi-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
</section>
<!-- end blog -->