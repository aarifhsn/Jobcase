<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SendEmailOtpNotification;

class UserObserver
{
    /**
     * Handle the user "created" event.
     */
    public function created(User $user): void
    {
        try {
            $otp = random_int(100000, 999999);

            if (Cache::has('otp_' . $user->email)) {
                Cache::forget('otp_' . $user->email);
            }

            Cache::put('otp_' . $user->email, $otp, now()->addMinutes(10));

            // $user->notify(new SendEmailOtpNotification($otp));
            Notification::make()
                ->title('Check your email for verification')
                ->success()
                ->send();
        } catch (\Throwable $th) {
            Log::alert("Error sending OTP to user: {$user->email}, Error: {$th->getMessage()}");
        }
    }

    /**
     * Handle the user "updated" event.
     */
    public function updated(user $user): void
    {
        //
    }

    /**
     * Handle the user "deleted" event.
     */
    public function deleted(user $user): void
    {
        //
    }

    /**
     * Handle the user "restored" event.
     */
    public function restored(user $user): void
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     */
    public function forceDeleted(user $user): void
    {
        //
    }
}
