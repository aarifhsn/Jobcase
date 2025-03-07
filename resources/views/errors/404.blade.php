@extends('layouts.app')

@section('content')
    <section class="flex items-center justify-center min-h-screen py-10 group-data-[theme-color=violet]:bg-violet-500/10 group-data-[theme-color=sky]:bg-sky-500/10 group-data-[theme-color=red]:bg-red-500/10 group-data-[theme-color=green]:bg-green-500/10 group-data-[theme-color=pink]:bg-pink-500/10 group-data-[theme-color=blue]:bg-blue-500/10 dark:bg-neutral-700">
        <div class="container mx-auto">
            <div class="grid items-center justify-center grid-cols-12">
                <div class="col-span-12 lg:col-span-6 lg:col-start-4">
                    <div class="text-center">
                        <img src="assets/images/404.png" alt="" class="img-fluid">
                        <div class="mt-10">
                            <h4 class="mt-3 mb-1 uppercase text-22 dark:text-gray-50">Sorry, page not found</h4>
                            <p class="text-gray-500 dark:text-gray-300">The page you are looking for was not found.</p>
                            <div class="mt-8">
                                <a class="text-white border-transparent btn group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500" href="{{ route('home') }}"><i class="mdi mdi-home"></i> Back to Home</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection