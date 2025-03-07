<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function candidates()
    {
        $candidates = User::where('role', 'candidate')->get();

        return view('admin.candidates', compact('candidates'));
    }

    public function companies()
    {
        $companies = Company::all();

        return view('admin.companies', compact('companies'));
    }

    public function approveCompany($id)
    {
        $company = Company::findOrFail($id);
        $company->status = 'approved';
        $company->save();

        return redirect()->route('admin.companies')->with('success', 'Company approved successfully.');
    }
}
