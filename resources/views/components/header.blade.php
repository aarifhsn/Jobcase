<nav class="navbar fixed right-0 left-0 top-0 transition-all duration-500 ease shadow-lg shadow-gray-200/20 bg-white border-gray-200 dark:bg-neutral-800 z-40 dark:shadow-neutral-900"
    id="navbar">
    <div class="mx-auto container">
        <div class="flex flex-wrap items-center justify-between mx-auto">
            <a href="{{ route('home') }}" class="flex items-center">
                <img src="{{ asset('images/logo-dark.png') }}" alt="" class="logo-dark h-[22px] block dark:hidden">
                <img src="{{ asset('images/logo-light.png') }}" alt=""
                    class="logo-dark h-[22px] hidden dark:block">
            </a>
            <button data-collapse-toggle="navbar-collapse" type="button"
                class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg navbar-toggler group lg:hidden hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <div class="flex items-center lg:order-2">

                <div>
                    <div class="relative dropdown ltr:mr-4 rtl:ml-4">
                        <button type="button" class="flex items-center px-4 py-5 dropdown-toggle"
                            id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="true">

                            <span class="mr-4 rounded-full">
                                <i class="text-2xl text-gray-800 uil uil-user-check"></i>
                            </span>

                            <span class="hidden fw-medium xl:block dark:text-gray-50 capitalize">
                                {{ Auth::check() ? Auth::user()->first_name : 'Guest' }}</span>
                        </button>
                        <ul class="absolute top-auto z-50 hidden w-48 p-3 list-none bg-white border rounded shadow-lg dropdown-menu border-gray-500/20 xl:ltr:-left-3 ltr:-left-32 rtl:-right-3 dark:bg-neutral-800"
                            id="profile/log" aria-labelledby="navNotifications">

                            @if (auth()->check())

                                @if (auth()->user()->is_admin)
                                    <li class="p-2 dropdown-item group/dropdown dark:text-gray-300">
                                        <a href="{{ route('manage-jobs') }}"
                                            class="text-15 font-medium text-gray-800 transition-all duration-300 ease-in dark:text-gray-50">Manage
                                            Jobs</a>
                                    </li>
                                @endif


                                <li class="p-2 dropdown-item group/dropdown dark:text-gray-300">
                                    <a href="{{ route('profiles.show', auth()->user()) }}"
                                        class="text-15 font-medium text-gray-800 transition-all duration-300 ease-in dark:text-gray-50">Profile</a>
                                </li>
                                <li class="p-2 dropdown-item group/dropdown dark:text-gray-300">
                                    <a href=""
                                        class="w-full text-left px-2 py-1 text-15 font-medium text-gray-800 transition-all duration-300 ease-in dark:text-gray-50 hover:bg-gray-100 dark:hover:bg-gray-700 rounded flex items-center gap-2">
                                        Job Alerts
                                    </a>
                                </li>
                                <li class="p-2 dropdown-item group/dropdown dark:text-gray-300">
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="w-full text-left font-medium text-gray-800 transition-all duration-300 ease-in dark:text-gray-50">Logout</button>
                                    </form>
                                </li>
                            @else
                                <li class="p-2 dropdown-item group/dropdown dark:text-gray-300">
                                    <a href="{{ route('login') }}"
                                        class="text-15 font-medium text-gray-800 transition-all duration-300 ease-in dark:text-gray-50">Login</a>
                                </li>
                                <li class="p-2 dropdown-item group/dropdown dark:text-gray-300">
                                    <a href="{{ route('register') }}"
                                        class="text-15 font-medium text-gray-800 transition-all duration-300 ease-in dark:text-gray-50">Register</a>
                                </li>
                                {{-- <li class="p-2 dropdown-item group/dropdown dark:text-gray-300">
                                    <a href="{{route('company.register')}}"
                                        class="text-15 font-medium text-gray-800 transition-all duration-300 ease-in dark:text-gray-50">Company
                                        Register</a>
                                </li> --}}
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            <div id="navbar-collapse"
                class="navbar-res items-center justify-between w-full text-sm lg:flex lg:w-auto lg:order-1 group-focus:[.navbar-toggler]:block hidden">
                <ul class="flex flex-col items-start mt-5 mb-10 font-medium lg:mt-0 lg:mb-0 lg:items-center lg:flex-row"
                    id="navigation-menu">
                    <li class="relative dropdown">
                        <a href="{{ route('home') }}"
                            class="py-5 text-gray-800 lg:px-4 dropdown-toggle dark:text-gray-50 lg:h-[70px]"
                            id="home" data-bs-toggle="dropdown">Home</a>
                    </li>
                    <li class="relative dropdown lg:mt-0">
                        <a href="{{ route('job-lists') }}"
                            class="py-5 text-gray-800 lg:px-4 dropdown-toggle dark:text-gray-50 lg:h-[70px]"
                            id="company" data-bs-toggle="dropdown">Browse Jobs</a>

                    </li>
                    <li class="relative dropdown lg:mt-0">
                        <a href="{{ route('job-categories') }}"
                            class="py-5 text-gray-800 lg:px-4 dropdown-toggle dark:text-gray-50 lg:h-[70px]"
                            id="job" data-bs-toggle="dropdown">Categories</a>
                    </li>
                    <li class="relative dropdown lg:mt-0">
                        <a href="{{ route('contact') }}"
                            class="py-5 text-gray-800 lg:px-4 dropdown-toggle dark:text-gray-50 lg:h-[70px]"
                            id="blog" data-bs-toggle="dropdown">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
