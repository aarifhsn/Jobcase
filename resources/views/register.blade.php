<!DOCTYPE html>
<html lang="en" dir="ltr" data-mode="light" class="scroll-smooths group" data-theme-color="violet">

<!-- Mirrored from themesdesign.in/{{config('app.name')}}-tailwind/layout/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 Jan 2025 03:57:44 GMT -->

<head>
    <meta charset="utf-8" />
    <title>{{config('app.name')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta content="Jobboard - Complete Job and Recruitment System" name="description" />
    <meta content="" name="Themesbrand" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{(asset('images/favicon.ico'))}}" />

    <link rel="stylesheet" href="{{(asset('libs/choices.js/assets/styles/choices.min.css'))}}">

    <!-- Swiper Css -->
    <link rel="stylesheet" href="{{asset('libs/swiper/swiper-bundle.min.css')}}">

    <link rel="stylesheet" href=" {{asset('css/icons.css')}}" />
    <link rel="stylesheet" href="{{asset('css/tailwind.css')}}" />
</head>

<body class="bg-white dark:bg-neutral-800">

    <div class="main-content">
        <div class="page-content">

            <section
                class="flex items-center justify-center min-h-screen py-20 group-data-[theme-color=violet]:bg-violet-500/10 group-data-[theme-color=sky]:bg-sky-500/10 group-data-[theme-color=red]:bg-red-500/10 group-data-[theme-color=green]:bg-green-500/10 group-data-[theme-color=pink]:bg-pink-500/10 group-data-[theme-color=blue]:bg-blue-500/10 dark:bg-neutral-700">
                <div class="container mx-auto">
                    <div class="grid grid-cols-12">
                        <div class="col-span-12 lg:col-span-10 lg:col-start-2">
                            <div class="flex flex-col bg-white rounded-lg dark:bg-neutral-800">
                                <div class="grid flex-col grid-cols-12">
                                    <div class="col-span-6 ltr:rounded-l-lg rtl:rounded-r-lg">
                                        <div class="p-10">
                                            <a href="{{route('home')}}">
                                                <img src="{{asset('images/logo-light.png')}}" alt=""
                                                    class="hidden mx-auto dark:block">
                                                <img src="{{asset('images/logo-dark.png')}}" alt=""
                                                    class="block mx-auto dark:hidden">
                                            </a>
                                            <div class="mt-5">
                                                <img src="{{asset('images/auth/sign-up.png')}}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="col-span-12 rounded-b-md lg:col-span-6 group-data-[theme-color=violet]:bg-violet-700 group-data-[theme-color=sky]:bg-sky-700 group-data-[theme-color=red]:bg-red-700 group-data-[theme-color=green]:bg-green-700 group-data-[theme-color=pink]:bg-pink-700 group-data-[theme-color=blue]:bg-blue-700 lg:rounded-b-none lg:ltr:rounded-r-lg rtl:rounded-l-lg">
                                        <div class="flex flex-col justify-center h-full p-12">
                                            <div class="text-center">
                                                <h5 class="text-[18.5px] text-white">Let's Get Started</h5>
                                                <p class="mt-3 text-gray-50">Sign Up and get access to all the features
                                                    of {{config('app.name')}}</p>
                                            </div>
                                            <form action="{{route('register')}}" method="POST" class="mt-8">
                                                @csrf
                                                <div class="mb-5">
                                                    <label for="name" class="text-white">Full Name</label>
                                                    <input type="text" name="name"
                                                        class="w-full mt-1 group-data-[theme-color=violet]:bg-violet-400/40 group-data-[theme-color=sky]:bg-sky-400/40 group-data-[theme-color=red]:bg-red-400/40 group-data-[theme-color=green]:bg-green-400/40 group-data-[theme-color=pink]:bg-pink-400/40 group-data-[theme-color=blue]:bg-blue-400/40 py-2.5 rounded border-transparent placeholder:text-sm placeholder:text-gray-50 text-white"
                                                        required="" id="name" placeholder="Enter your name"
                                                        value="{{old('name')}}">
                                                    @error('name') <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="mb-5">
                                                    <label for="emailInput" class="text-white">Email</label>
                                                    <input type="email" name="email"
                                                        class="w-full mt-1 group-data-[theme-color=violet]:bg-violet-400/40 group-data-[theme-color=sky]:bg-sky-400/40 group-data-[theme-color=red]:bg-red-400/40 group-data-[theme-color=green]:bg-green-400/40 group-data-[theme-color=pink]:bg-pink-400/40 group-data-[theme-color=blue]:bg-blue-400/40 py-2.5 rounded border-transparent placeholder:text-sm placeholder:text-gray-50 text-white"
                                                        required="" id="emailInput" placeholder="Enter your email"
                                                        value="{{old('email')}}">
                                                    @error('email') <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                </div>
                                                <div class="mb-5">
                                                    <label for="passwordInput" class="text-white">Password</label>
                                                    <input type="password" name="password"
                                                        class="w-full mt-1 group-data-[theme-color=violet]:bg-violet-400/40 group-data-[theme-color=sky]:bg-sky-400/40 group-data-[theme-color=red]:bg-red-400/40 group-data-[theme-color=green]:bg-green-400/40 group-data-[theme-color=pink]:bg-pink-400/40 group-data-[theme-color=blue]:bg-blue-400/40 py-2.5 rounded border-transparent placeholder:text-sm placeholder:text-gray-50 text-white"
                                                        id="passwordInput" placeholder="Enter your password">
                                                    @error('password') <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="mb-4">
                                                    <div><input
                                                            class="align-middle border-transparent rounded focus:ring-0 focus:ring-offset-0 group-data-[theme-color=violet]:checked:bg-violet-500 group-data-[theme-color=sky]:checked:bg-sky-500 group-data-[theme-color=red]:checked:bg-red-500 group-data-[theme-color=green]:checked:bg-green-500 group-data-[theme-color=pink]:checked:bg-pink-500 group-data-[theme-color=blue]:checked:bg-blue-500"
                                                            type="checkbox" id="flexCheckDefault">
                                                        <label class="text-white align-middle" for="flexCheckDefault">I
                                                            agree to the <a href="javascript:void(0)"
                                                                class="pb-1 text-white underline align-middle">Terms and
                                                                conditions</a></label>

                                                    </div>
                                                </div>
                                                <div class="my-5 text-center">
                                                    <button type="submit"
                                                        class="btn w-full bg-white text-gray-900 font-medium border-transparent hover:-translate-y-1.5 duration-500 ease">Sign
                                                        Up
                                                    </button>
                                                </div>
                                            </form>
                                            <div class="text-center">
                                                <p class="text-white">Already a member ? <a href="{{route('login')}}"
                                                        class="text-white underline fw-medium"> Sign In </a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script src="{{asset('unicons.iconscout.com/release/v4.0.0/script/monochrome/bundle.js')}}"></script>
    <script src="{{asset('libs/@popperjs/core/umd/popper.min.js')}}"></script>
    <script src="{{asset('libs/simplebar/simplebar.min.js')}}"></script>


    <script src="{{asset('js/pages/switcher.js')}}"></script>

    <script src="{{asset('libs/choices.js/assets/scripts/choices.min.js')}}"></script>

    <script src="{{asset('js/pages/job-list.init.js')}}"></script>

    <script src="{{asset('js/pages/dropdown&modal.init.js')}}"></script>

    <!-- Swiper Js -->
    <script src="{{asset('libs/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('js/pages/swiper.init.js')}}"></script>

    <script src="{{asset('js/pages/nav&tabs.js')}}"></script>

    <script src="{{asset('js/app.js')}}"></script>

</body>

<!-- Mirrored from themesdesign.in/{{config('app.name')}}-tailwind/layout/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 Jan 2025 03:59:06 GMT -->

</html>