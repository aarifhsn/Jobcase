<?php

namespace App\Http\Controllers\Candidates;

use App\Models\User;
use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CandidateController extends Controller
{
    public function index()
    {
        // Show all visible candidate profiles to companies
        // $candidate = User::where('role', 'candidate')
        //     ->paginate(10); // Paginate results

        // return view('candidates.profile', compact('candidate'));
    }

    public function show($id)
    {
        $candidate = Candidate::findOrFail($id);

        return view('candidates.profile', compact('candidate'));
    }

    public function toggleVisibility($id)
    {
        // Only companies can hide profiles
        if (auth()->user()->role !== 'company') {
            abort(403);
        }

        $candidate = User::findOrFail($id);
        $candidate->update([
            'is_visible' => !$candidate->is_visible
        ]);

        return back()->with('success', 'Profile visibility updated successfully');
    }

    public function subscribeToCategory(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id'
        ]);

        Candidate::updateOrCreate([
            'user_id' => auth()->id()
        ], [
            'category_id' => $request->category_id
        ]);

        return back()->with('success', 'Subscribed successfully!');
    }

    public function unsubscribeToCategory($categoryId)
    {
        Candidate::where('user_id', auth()->id())
            ->where('category_id', $categoryId)
            ->update([
                'category_id' => null
            ]);

        return back()->with('success', 'Unsubscribed successfully!');
    }
}
