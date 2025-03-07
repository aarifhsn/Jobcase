<?php

namespace App\Observers;

use App\Models\Job;
use App\Models\Company;
use App\Models\Category;
use App\Constant\JobConstant;
use Illuminate\Support\Facades\DB;
use App\Notifications\JobCreatedNotification;

class JobObserver
{

    public function creating(Job $job): void
    {
        $job->created_by = auth()->id() ?? null;
    }

    /**
     * Handle the Job "created" event.
     */
    public function created(Job $job): void
    {
        $get_subscription = $job->company->subscription;
        $subscription_active = $get_subscription->where('status', 'active')->first();
        $is_paid = $subscription_active->payments->where('status', 'paid')->first();

        $total_job_count = Job::active()->where('company_id', $job->company->id)->count();

        if (!$is_paid && $total_job_count > 3) {
            $job->status = JobConstant::STATUS_INACTIVE;
            $job->save();
        }

        if ($subscription_active->job_limit < $total_job_count) {
            $job->status = JobConstant::STATUS_INACTIVE;
            $job->save();
        }

        if ($job->expired_at < now()) {
            $job->status = JobConstant::STATUS_EXPIRED;
            $job->save();
        }

        // Get all users subscribed to this job category
        $subscribers = Category::find($job->category_id)->subscribers;

        // Notify each subscriber
        foreach ($subscribers as $subscriber) {
            // $subscriber->notify(new JobCreatedNotification($job));
        }
    }

    /**
     * Handle the Job "updated" event.
     */
    public function updated(Job $job): void
    {
        if ($job->expired_at < now()) {
            $job->status = JobConstant::STATUS_EXPIRED;
            $job->save();
        }
    }
}
