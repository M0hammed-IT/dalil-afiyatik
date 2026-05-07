<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    // دالة لعرض الأخبار بصفحة الزوار
  // دالة لعرض الأخبار بصفحة الزوار
    public function index()
    {
        // ضفنا اسم العمود 'created_at' بس حتى نرضي الـ VS Code ويختفي الخط الأحمر
        $news = News::latest('created_at')->get(); 
        $recent_news = News::latest('created_at')->take(5)->get(); 
        
        return view('news', compact('news', 'recent_news'));
    }

    // دالة لعرض صفحة إضافة خبر باللوحة
    public function create()
    {
        return view('admin.news_create');
    }

    // دالة لاستلام البيانات وحفظها بقاعدة البيانات
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/news'), $imageName);
        }

        News::create([
            'title' => $request->input('title'),
            'category' => $request->input('category'),
            'content' => $request->input('content'), // هنا حلينا المشكلة
            'image' => $imageName,
        ]);

        return back()->with('success', 'تم رفع الخبر بنجاح!');
    }
}