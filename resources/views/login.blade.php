<!DOCTYPE html>
<html lang="en" dir="ltr" data-mode="light" class="scroll-smooths group" data-theme-color="violet">
    
<!-- Mirrored from themesdesign.in/{{config('app.name')}}-tailwind/layout/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 Jan 2025 03:57:44 GMT -->
<head>
        <meta charset="utf-8" />
        <title>{{config('app.name')}}</title>
        <meta
          name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <meta
          content="Tailwind Multipurpose Admin & Dashboard Template"
          name="description"
        />
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
            <div class="page-content relative">
                <div style="position: absolute; top: 5%; left: 50%; transform: translate(-50%, -50%); display: flex; justify-content: center; align-items: center;">
                    @if (session('success'))
                    <p class="text-green-800 font-semibold border border-solid border-green-500 p-4">{{ session('success') }}</p>
                    @endif
                </div>
                
                <section class="flex items-center justify-center min-h-screen py-20 group-data-[theme-color=violet]:bg-violet-500/10  dark:bg-neutral-700">
                    <div class="container mx-auto">
                        <div class="grid grid-cols-12">
                            <div class="col-span-12 lg:col-span-10 lg:col-start-2">
                                <div class="flex flex-col bg-white rounded-lg dark:bg-neutral-800">
                                    <div class="grid flex-col grid-cols-12 ">
                                        <div class="col-span-12 lg:col-span-6 ltr:rounded-l-lg rtl:rounded-r-lg">
                                            <div class="p-10">
                                                <a href="{{route('home')}}">
                                                    <img src="{{asset('images/logo-light.png')}}" alt="" class="hidden mx-auto dark:block">
                                                    <img src="{{asset('images/logo-dark.png')}}" alt="" class="block mx-auto dark:hidden">
                                                </a>
                                                <div class="mt-5">
                                                    <img src="{{asset('images/auth/sign-in.png')}}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-span-12 rounded-b-md lg:col-span-6 group-data-[theme-color=violet]:bg-violet-700  lg:ltr:rounded-r-lg rtl:rounded-l-lg">
                                            <div class="flex flex-col justify-center h-full p-12 ">
                                                
                                                <div class="text-center">
                                                    <h5 class="text-[18.5px] text-white">Welcome Back !</h5>
                                                    <p class="mt-3 text-white/80">Sign in to continue to {{config('app.name')}}.</p>
                                                </div>
                                                <form action="{{route('login')}}" method="POST" class="mt-8">
                                                    @csrf
                                                    <div class="mb-5">
                                                        <label for="emailInput" class="text-white">Email</label>
                                                        <input type="text" name="email"  class="w-full mt-1 group-data-[theme-color=violet]:bg-violet-400/40  py-2.5 rounded border-transparent placeholder:text-sm placeholder:text-gray-50 text-white" required="" id="emailInput" placeholder="Enter your email">
                                                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                                            
                                                    </div>
                                                    <div class="mb-5">
                                                        <label for="passwordInput" class="text-white">Password</label>
                                                        <input type="password" name="password"  class="w-full mt-1 group-data-[theme-color=violet]:bg-violet-400/40  py-2.5 rounded border-transparent placeholder:text-sm placeholder:text-gray-50 text-white" id="passwordInput" placeholder="Enter your password">
                                                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                    <div ><input class="align-middle border-transparent rounded focus:ring-0 focus:ring-offset-0 group-data-[theme-color=violet]:checked:bg-violet-500 " type="checkbox" id="flexCheckDefault" name="remember">
                                                        <a href="reset-password.html" class="text-white ltr:float-right rtl:float-left">Forgot Password?</a>
                                                        <label class="text-white align-middle" for="flexCheckDefault">Remember me</label>
                                                    </div>
                                                    <div class="my-8 text-center">
                                                        <button type="submit" class="btn w-full bg-white text-gray-900 font-medium border-transparent hover:-translate-y-1.5 duration-500 ease">Login
                                                    </button></div>
                                                </form>
                                                <div class="text-center">
                                                    <p class="text-white">Not a member ? <a href="{{route('register')}}" class="text-white underline fw-medium"> Register </a></p>
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
