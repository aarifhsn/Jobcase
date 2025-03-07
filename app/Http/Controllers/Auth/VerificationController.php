<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Filament\Pages\Dashboard;
use Illuminate\Support\Facades\Cache;

class VerificationController extends Controller
{
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required',
        ]);

        // Decrypt the OTP from the request
        $decrypted_otp = decrypt($request->otp);

        $otp = Cache::get('otp_' . $request->email);

        if (!$otp || $otp != $decrypted_otp) {
            return back()->withErrors(['otp' => 'Invalid or expired OTP.']);
        }

        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user->update([
                'email_verified_at' => now(),
            ]);

            Cache::forget('otp_' . $request->email);

            return redirect()->route('login')->with('status', 'Your email has been verified!');
        }

        return back()->withErrors(['email' => 'User not found.']);
    }
}
