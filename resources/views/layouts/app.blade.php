<!DOCTYPE html>
<html lang="en" dir="ltr" data-mode="light" class="scroll-smooths group" data-theme-color="violet">

<!-- Mirrored from themesdesign.in/jobcy-tailwind/layout/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 Jan 2025 03:57:44 GMT -->

<head>
  <meta charset="utf-8" />
  <title>{{config('app.name')}}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta content="Tailwind Multipurpose Admin & Dashboard Template" name="description" />
  <meta content="" name="Themesbrand" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <!-- App favicon -->
  <link rel="shortcut icon" href="{{(asset('images/favicon.ico'))}}" />

  <link rel="stylesheet" href="{{(asset('libs/choices.js/assets/styles/choices.min.css'))}}">

  <!-- Swiper Css -->
  <link rel="stylesheet" href="{{asset('libs/swiper/swiper-bundle.min.css')}}">

  <link rel="alternate" type="application/rss+xml" title="Job Posts RSS Feed" href="{{ route('jobs.rss') }}">

  <link rel="stylesheet" href=" {{asset('css/icons.css')}}" />
  <link rel="stylesheet" href="{{asset('css/tailwind.css')}}" />

  @vite(['resources/css/app.css', 'resources/js/app.js']))
</head>

<body class="bg-white dark:bg-neutral-800">

  @include('components.header')


  <div class="main-content">
    <div class="page-content">

      @yield('content')

    </div>
  </div>

  @include('components.subscribe')

  @include('components.footer')


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

  <script src="{{asset('js/jobboard.js')}}"></script>

</body>

<!-- Mirrored from themesdesign.in/jobcy-tailwind/layout/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 Jan 2025 03:59:06 GMT -->

</html>