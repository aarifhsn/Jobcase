<div class="mt-10 space-y-8">
    <h5 class="text-gray-900 dark:text-gray-50">Related Jobs</h5>

    @foreach ($relatedJobs as $job )
        
        @include('jobs.partials.job-card')

    @endforeach


    <div class="mt-4 text-center">
        <a href="{{route('job-lists')}}" class="font-medium text-gray-900 dark:text-gray-50">View More <i class="mdi mdi-arrow-right"></i></a>
    </div>
</div>