<?php
namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate(['doctor_id' => 'required', 'rating' => 'required|integer|min:1|max:5']);

        $review = Review::updateOrCreate(
            ['doctor_id' => $request->doctor_id, 'ip_address' => $request->ip()],
            ['guest_name' => $request->guest_name ?? 'زائر', 'rating' => $request->rating, 'comment' => $request->comment]
        );

        return back()->with('success', $review->wasRecentlyCreated ? 'تم التقييم بنجاح!' : 'تم تحديث تقييمك!');
    }
}