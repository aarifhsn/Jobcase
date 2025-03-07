<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use App\Models\BlogPost;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch distinct job types from the jobs table
        $jobTypes = Job::select('type')->distinct()->pluck('type');

        // Fetch jobs for each job type
        $jobsByType = [];
        foreach ($jobTypes as $type) {
            $jobsByType[$type] = Job::where('type', $type)
                ->with('tag', 'category', 'company')
                ->orderBy('created_at', 'desc')
                ->take(10)
                ->get();
        }

        // Fetch recent jobs
        $recent_jobs = Job::with('company', 'tag', 'category')->latest()->take(10)->get();

        // take latest jobs number or count as the last 30 days jobs and not expired
        $total_latest_jobs = Job::where('created_at', '>=', now()->subDays(30))
            ->where('expiration_date', '>=', now())
            ->count();

        $posts = BlogPost::where('status', 'published')->latest()->take(3)->get();

        return view('home', compact('recent_jobs', 'jobsByType', 'jobTypes', 'total_latest_jobs', 'posts'));
    }

    public function jobCategories()
    {
        $all_categories = Category::withCount('jobs')->get();

        return view('job-categories', compact('all_categories'));
    }

    public function homeSearch()
    {
        $countries = config('countries');

        return view('home', compact('countries'));
    }
}
