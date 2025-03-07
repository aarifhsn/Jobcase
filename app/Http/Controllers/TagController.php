<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::withCount('jobs')
            ->orderBy('jobs_count', 'desc')
            ->limit(5)
            ->get();

        $popular_tags = Tag::withCount('jobs')
            ->orderBy('jobs_count', 'desc')
            ->limit(5)
            ->get();

        $tag = Tag::where('name', request('name'))->first();

        // Fetch jobs that belong to the selected tag
        $jobs = $tag ? $tag->jobs()->paginate(10) : collect();

        $job_experiences = Job::select('experience')->distinct()->get()->sortBy('experience');

        $job_types = Job::select('type')->distinct()->get();
        $minSalary = Job::min('salary_range');
        $maxSalary = Job::max('salary_range');

        return view('tags.browse-by-tag', [
            'tags' => $tags,
            'popular_tags' => $popular_tags,
            'jobs' => $jobs,
            'tag' => $tag->name ?? 'Tag not found',
            'job_experiences' => $job_experiences,
            'job_types' => $job_types,
            'minSalary' => $minSalary,
            'maxSalary' => $maxSalary,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:tags,name',
        ]);

        $slug = Str::slug($request->name);
        Tag::create(['name' => $request->name, 'slug' => $slug]);

        return back()->with('success', 'Tag created successfully.');
    }
}
