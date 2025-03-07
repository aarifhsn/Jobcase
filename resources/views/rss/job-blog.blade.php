@extends('layouts.app')

@section('content')
<div class="container">
    <section style="width: 80%; margin: 20px auto" class="py-20 px-20 mx-auto my-20 w-4/5 lg:w-2/3">
        <div>
            <h1>Job Feed</h1>
        <p>This is a human-readable version of our job feed. For RSS, visit <a class="underline" href="{{ route('jobs.rss') }}">this link</a>.</p>
        </div>

        <div class="job-list">
            @foreach($jobs as $job)
                <div class="my-8">
                    <h2 class="font-bold ">{{ $job->title }}</h2>
                    <p>{{ \Illuminate\Support\Str::limit($job->description, 150) }}</p>
                    <p><strong>Posted at:</strong> {{ $job->created_at->format('M d, Y') }}</p>
                    <a href="{{ route('job-details', $job->id) }}" class="btn btn-primary mt-4">Read More</a>
                </div>
                <hr>
            @endforeach
        </div>
    </section>
</div>
@endsection
