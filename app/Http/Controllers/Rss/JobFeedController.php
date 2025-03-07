<?php

namespace App\Http\Controllers\Rss;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Response;

class JobFeedController extends Controller
{
    public function index()
    {
        // Cache the RSS feed for 30 minutes
        $rss = Cache::remember('rss_jobs_feed', now()->addMinutes(30), function () {
            $jobs = Job::latest()->take(20)->get();

            return view('rss.job-feed', compact('jobs'))->render();
        });

        return Response::make($rss, 200)
            ->header('Content-Type', 'application/rss+xml; charset=UTF-8');
    }

    public function blogInfo()
    {
        // Fetch job posts (example: latest 20 jobs)
        $jobs = Job::latest()->take(20)->get();

        // Return an HTML view with styled content
        return view('rss.job-blog', compact('jobs'));
    }
}
