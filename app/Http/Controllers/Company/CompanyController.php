<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRegistrationRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
    public function showRegistrationForm()
    {
        return view('company.auth.register-company');
    }

    public function register(CompanyRegistrationRequest $request)
    {
        // Create the user record with 'company' role
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'company', // Set the role to 'company'
        ]);

        // Generate a unique slug for the company
        $slug = Str::slug($request->name . '-' . uniqid(), '-');

        // Create the company record with minimal information (for registration)
        Company::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'slug' => $slug,
            'email' => $request->email,
            'contact_number' => $request->contact_number,
            'website' => $request->website,
            'status' => 'pending', // Set the status to 'pending'
        ]);

        // Redirect to login with a success message
        return redirect()->route('home')->with('success', __('messages.company_registration_success'));
    }

    public function profile($slug)
    {
        $company = Company::where('slug', $slug)->firstOrFail();

        // Get the latest jobs posted by the company
        $company_jobs = $company->jobs()->with('tag')->latest()->get();

        return view('company.profile', compact('company', 'company_jobs'));
    }

    public function editProfile()
    {
        $company = auth()->user()->recruiter->company;  // Get the company related to the logged-in user

        return view('company.edit-profile', compact('company'));
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $company = auth()->user()->company;
        $company->update($request->validated());

        return redirect()->route('company.profile')->with('success', 'Profile updated successfully.');
    }
}
