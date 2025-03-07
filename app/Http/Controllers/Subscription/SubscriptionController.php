<?php

namespace App\Http\Controllers\Subscription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id'
        ]);

        Subscription::firstOrCreate([
            'user_id' => auth()->id(),
            'category_id' => $request->category_id
        ]);

        return back()->with('success', 'Subscribed successfully!');
    }

    public function unsubscribe($categoryId)
    {
        Subscription::where('user_id', auth()->id())
            ->where('category_id', $categoryId)
            ->delete();

        return back()->with('success', 'Unsubscribed successfully!');
    }
}
