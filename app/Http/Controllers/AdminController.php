<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Specialty;
use App\Models\News;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with('specialty')->orderBy('id', 'desc')->get();
        $specialties = Specialty::all();
        $news = News::orderBy('id', 'desc')->get();
        return view('admin.dashboard', compact('doctors', 'specialties', 'news'));
    }

    public function storeDoctor(Request $request)
    {
        $request->validate(['name' => 'required', 'specialty_id' => 'required', 'image' => 'nullable|image|max:2048']);

        $doctor = new Doctor();
        $doctor->name = $request->name; // تأكد أن الحقل بالداتابيس اسمه name
        $doctor->degree = $request->degree;
        $doctor->specialty_id = $request->specialty_id;
        $doctor->experience_years = $request->experience_years;
        $doctor->consultation_fee = $request->consultation_fee;
        $doctor->location = $request->location;
        $doctor->phone = $request->phone;
        $doctor->whatsapp = $request->whatsapp;
        $doctor->bio = $request->bio;

        if ($request->hasFile('image')) {
            $imageName = time() . '_doctor.' . $request->image->extension();  
            $request->image->move(public_path('uploads/doctors'), $imageName);
            $doctor->image = $imageName;
        }

        $doctor->save();
        return back()->with('success', 'تم إضافة الطبيب بنجاح.');
    }

    public function destroyDoctor($id)
    {
        Doctor::findOrFail($id)->delete();
        return back()->with('success', 'تم حذف الطبيب.');
    }
    public function storeNews(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $news = new \App\Models\News();
        $news->title = $request->title;
        $news->category = $request->category;
        $news->content = $request->content;

        if ($request->hasFile('image')) {
            $imageName = time() . '_news.' . $request->image->extension();  
            $request->image->move(public_path('uploads/news'), $imageName);
            $news->image = $imageName;
        }

        $news->save();

        return back()->with('success', 'عاشت إيدك! تم نشر الخبر الطبي بنجاح.');
    }
};




































// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Doctor;
// use App\Models\News;
// use App\Models\Specialty;

// class AdminController extends Controller
// {
//     // عرض لوحة التحكم الرئيسية (فيها الأطباء والأخبار)
//     public function index()
//     {
//         $doctors = Doctor::with('specialty')->latest()->get(); // نجيب الأطباء مع تخصصاتهم
//         $news = News::latest('created_at')->get(); 
//         $specialties = Specialty::all(); // نحتاجها بقائمة الإضافة

//         // رجعنا المسار لملف الـ Dashboard اللي تعبان عليه
//         return view('admin.dashboard', compact('doctors', 'news', 'specialties')); 
//     }

//     // حذف طبيب
//     public function destroyDoctor($id)
//     {
//         Doctor::findOrFail($id)->delete();
//         return back()->with('success', 'تم حذف الطبيب بنجاح!');
//     }

//     // حذف خبر (بما إنك مخططله شغل، تبقى الدالة موجودة)
//     public function destroyNews($id)
//     {
//         News::findOrFail($id)->delete();
//         return back()->with('success', 'تم حذف الخبر بنجاح!');
//     }
// }