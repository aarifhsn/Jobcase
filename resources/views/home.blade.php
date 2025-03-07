@extends('layouts.app')

@section('content')

    @include('components.home-job-search')

    @if (isset($categories) && count($categories) > 0)
        @include('components.home-job-categories', ['categories' => $categories])
    @endif

    @if (isset($recent_jobs) && count($recent_jobs) > 0)
        @include('components.home-job-random')
    @endif

    @include('components.home-job-policies')

    @include('components.home-job-browse')

    @include('components.home-job-testimonials')

    @include('components.home-blog')

    @include('components.home-clients')

@endsection