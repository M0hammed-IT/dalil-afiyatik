<?php
namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Specialty;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    // عرض صفحة الأطباء والبحث (تم تصحيح الحقول هنا)
    public function index(Request $request)
    {
        $query = Doctor::with('specialty'); 

        if ($request->filled('q')) {
            // تصحيح: البحث باستخدام name بدل full_name
            $query->where('name', 'LIKE', '%' . $request->q . '%');
        }

        if ($request->filled('specialty_id')) {
            $query->where('specialty_id', $request->specialty_id);
        }

        if ($request->filled('location')) {
            $query->where('location', 'LIKE', '%' . $request->location . '%');
        }

        $doctors = $query->get();
        return view('doctors', compact('doctors'));
    }

    // عرض تفاصيل الطبيب وتتبع الطابور
    public function show($id)
    {
        $doctor = Doctor::with(['specialty', 'reviews'])->findOrFail($id);
        
        $today = date('Y-m-d');
        $pendingCount = \App\Models\Appointment::where('doctor_id', $id)
            ->where('appointment_date', $today)
            ->where('status', 'pending')
            ->count();

        $trafficStatus = ($pendingCount >= 15) ? 'high' : (($pendingCount >= 5) ? 'medium' : 'low');

        return view('doctor_profile', compact('doctor', 'trafficStatus'));
    }

    // البحث الفوري (AJAX)
    public function liveSearch(Request $request)
    {
        $query = $request->input('q');
        if (!$query) return response()->json([]);

        $doctors = Doctor::where('name', 'LIKE', "%{$query}%")
                         ->select('id', 'name', 'specialty_id', 'image') 
                         ->take(5)->get();

        return response()->json($doctors);
    }
}