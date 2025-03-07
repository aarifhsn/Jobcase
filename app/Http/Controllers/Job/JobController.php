<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use App\Models\JobClick;
use App\Models\JobView;
use App\Models\Tag;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function viewJobs()
    {
        return $this->getJobsViewData('job-lists');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $country = $request->input('country');
        $countryCode = request('country');
        $countryName = config('countries.' . $countryCode);

        $jobs = Job::query()
            ->where(function ($query) use ($search) {
                $query->where('title', 'like', "%$search%")
                    ->orWhereHas('company', fn($q) => $q->where('name', 'like', "%$search%"))
                    ->orWhereHas('tag', fn($q) => $q->where('name', 'like', "%$search%"))
                    ->orWhereHas('category', fn($q) => $q->where('name', 'like', "%$search%"))
                    ->orWhereHas(
                        'location',
                        fn($q) =>
                        $q->where('address', 'like', "%$search%")
                            ->orWhere('country', 'like', "%$search%")
                            ->orWhere('name', 'like', "%$search%")
                    );
            })
            ->when($countryName, function ($query) use ($countryName) {
                $query->whereHas('location', function ($q) use ($countryName) {
                    $q->where('country', $countryName);
                });
            })
            ->paginate(10);

        return $this->getJobsViewData('jobs.search-results', compact('jobs'));
    }

    public function show($id)
    {
        $job = Job::with(['company', 'location'])->findOrFail($id);

        $relatedJobs = Job::where('category_id', $job->category_id)
            ->where('id', '!=', $job->id)
            ->with(['company', 'location'])
            ->get();

        $jobView = JobView::where('job_id', $job->id)
            ->where(function ($query) {
                if (auth()->check()) {
                    $query->where('user_id', auth()->id());
                } else {
                    $query->where('ip', request()->ip());
                }
            })
            ->first();

        if ($jobView) {
            $jobView->increment('view_count');
        } else {
            JobView::create([
                'job_id' => $job->id,
                'user_id' => auth()->id() ?? null,
                'ip' => request()->ip(),
                'user_agent' => request()->userAgent(),
                'viewed_at' => now(),
                'details' => json_encode([
                    'device' => request()->header('User-Agent'),
                ]),
                'view_count' => 1,
            ]);
        }

        return view('job-details', compact('job', 'relatedJobs'));
    }


    public function filter(Request $request)
    {
        $jobs = Job::query();

        // Apply filters
        $this->applyFilters($jobs, $request);

        return $this->getJobsViewData('jobs.search-results', ['jobs' => $jobs->paginate(10)]);
    }

    private function applyFilters($query, Request $request)
    {
        $filters = [
            'salary_range' => fn($q) => $q->where('salary_range', '>=', $request->input('salary_range')),
            'job_type' => fn($q) => $q->where('type', $request->input('job_type')),
            'experience' => fn($q) => $q->whereIn('experience', $request->input('experience')),
            'date_posted' => fn($q) => $this->filterByDatePosted($q, $request->input('date_posted')),
        ];

        foreach ($filters as $key => $filter) {
            if ($request->filled($key)) {
                $filter($query);
            }
        }
    }

    private function filterByDatePosted($query, Request $request)
    {
        if ($request->filled('date_posted')) {
            $datePosted = $request->input('date_posted');
            $conditions = [
                'last_hour' => now()->subHour(),
                'last_24_hours' => now()->subDay(),
                'last_7_days' => now()->subDays(7),
                'last_14_days' => now()->subDays(14),
                'last_30_days' => now()->subDays(30),
            ];

            foreach ($conditions as $key => $value) {
                if (in_array($key, $datePosted)) {
                    $query->where('created_at', '>=', $value);
                }
            }
        }
    }

    public function filterByTag($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();

        $jobs = $tag->jobs()->with('company')->paginate(10);

        return view('job-lists', compact('jobs', 'tag'));
    }

    private function getJobsViewData($view, array $data = [])
    {
        $defaultData = [
            'jobs' => Job::paginate(10),
            'company' => Company::all(),
            'popular_categories' => Category::withCount('jobs')->orderBy('jobs_count', 'desc')->take(5)->get(),
            'tags' => Tag::all(),
            'popular_tags' => Tag::withCount('jobs')->orderBy('jobs_count', 'desc')->take(5)->get(),
            'job_experiences' => Job::select('experience')->distinct()->get()->sortBy('experience'),
            'job_types' => Job::select('type')->distinct()->get(),
            'minSalary' => Job::min('salary_range'),
            'maxSalary' => Job::max('salary_range'),
        ];

        return view($view, array_merge($defaultData, $data));
    }

    public function apply(Job $job, Request $request)
    {
        // Capture user info
        JobClick::create([
            'job_id' => $job->id,
            'user_id' => auth()->id(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'details' => json_encode([
                'device' => $request->header('User-Agent'),
            ]),
            'referer' => $request->headers->get('referer'),
            'clicked_at' => now(),
            'click_count' => 1,
        ]);

        return redirect()->to($job->application_link);
    }
}
