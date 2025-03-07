@extends('layouts.app')

@section('content')

<section class="py-20 bg-gray-50 dark:bg-neutral-700">
    <div class="container mx-auto">

        <div class="px-10 w-2/3 mx-auto">

            <div class="">
                <div
                    class="p-2 mt-3 transition-all duration-500 bg-white rounded shadow-lg shadow-gray-100/50 card dark:bg-neutral-800 dark:shadow-neutral-600/20 group/blog">
                    <div class="relative overflow-hidden">
                        <img src="{{asset('storage/' . $post->image)}}" class="rounded w-full h-96 object-cover"
                            alt="{{ $post->title}}" />
                        <div
                            class="absolute inset-0 hidden transition-all duration-500 rounded-md bg-black/30 group-hover/blog:block">
                        </div>
                        <div
                            class="hidden text-white transition-all duration-500 top-2 left-2 group-hover/blog:block author group-hover/blog:absolute">
                            <p class="mb-2 "><i class="mdi mdi-account text-light"></i> <span
                                    class="text-light user">{{ $post->user->name }}</span></p>
                            <p class="mb-0 text-light date"><i class="mdi mdi-calendar-check"></i>
                                {{ $post->created_at }}</p>
                        </div>

                    </div>
                    <div class="p-5">
                        <h5 class="mb-4 text-gray-900 text-2xl leading-10 font-semibold dark:text-gray-50">
                            {{ $post->title }}
                        </h5>
                        <p class="my-6 text-gray-600 dark:text-gray-300">
                            {{ strip_tags($post->content) }}
                        </p>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>
<!-- end blog -->

@endsection