<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Specialty;
use App\Models\News;
use App\Http\Controllers\DoctorController;

// ========================================================
// 1. الصفحات الرئيسية
// ========================================================
Route::get('/', function () {
    $specialties = Specialty::all();
    return view('welcome', compact('specialties'));
});

Route::get('/about', function () { 
    return view('about'); 
});

// ========================================================
// 2. الأطباء والتخصصات (DoctorController)
// ========================================================
Route::get('/doctors', [DoctorController::class, 'index']);
Route::get('/doctor/{id}', [DoctorController::class, 'show']);
Route::get('/doctors/{id}', [DoctorController::class, 'show']); // مسار احتياطي يحل مشكلة الـ 404
Route::get('/search-doctors', [DoctorController::class, 'liveSearch']);

Route::get('/specialties', function () { 
    $specialties = Specialty::withCount('doctors')->get();
    return view('specialties', compact('specialties')); 
});

// ========================================================
// 3. التفاعل (تقييم، حجز، تتبع) (DoctorController)
// ========================================================
Route::post('/doctor/review', [DoctorController::class, 'storeReview'])->name('review.store');
Route::post('/doctor/book', [DoctorController::class, 'bookAppointment'])->name('appointment.book');
Route::post('/doctor/track-queue', [DoctorController::class, 'trackQueue'])->name('queue.track');

/// لا تنسى تضيف هذا السطر ببداية ملف الراوتات وي باقي الاستدعاءات
use App\Http\Controllers\AdminController;


// ========================================================
// 4. لوحة الإدارة (AdminController)
// ========================================================
Route::get('/admin/dashboard', [AdminController::class, 'index']);
Route::post('/admin/doctors', [AdminController::class, 'storeDoctor']); 
Route::delete('/admin/doctors/{id}', [AdminController::class, 'destroyDoctor']);
// ========================================================
// 5. الأخبار والنصائح
// ========================================================
Route::get('/news', function () { 
    $news = News::latest()->get(); 
    return view('news', compact('news')); 
});

Route::get('/news/{id}', function ($id) {
    $article = News::findOrFail($id);
    return view('news_single', compact('article'));
});

// ========================================================
// 6. المنتدى الطبي
// ========================================================
Route::get('/forum', function () {
    return view('forum');
});

Route::post('/forum', function (Request $request) {
    return back()->with('success', 'تم استلام استفسارك بنجاح! سيقوم أطبائنا بمراجعته والإجابة عليه في أقرب وقت.');
})->name('forum.submit');

// ========================================================
// 7. المستشفيات والمراكز (بيانات ثابتة مدمجة)
// ========================================================
Route::get('/hospitals', function () {
    return view('hospitals');
});

Route::get('/hospital/{id}', function ($id) {
    $hospitals = [
        1 => ['name' => 'مستشفى الكفيل التخصصي', 'type' => 'أهلي / تخصصي', 'location' => 'كربلاء - طريق بغداد', 'hours' => '24 ساعة', 'phone' => '07800000001', 'about' => 'صرح طبي متقدم بإشراف كوادر عالمية.', 'departments' => ['جراحة القلب', 'الجملة العصبية'], 'doctors' => ['د. علي الشمري', 'د. محمد رضا']],
        2 => ['name' => 'مستشفى الإمام زين العابدين (ع)', 'type' => 'أهلي / تعليمي', 'location' => 'كربلاء - شارع الإسكان', 'hours' => '24 ساعة', 'phone' => '07800000002', 'about' => 'مستشفى متكامل مجهز بأحدث صالات العمليات.', 'departments' => ['الجراحة العامة', 'طب الأطفال'], 'doctors' => ['د. حسين الخفاجي', 'د. زينب الموسوي']],
        3 => ['name' => 'مدينة الإمام الحسين (ع) الطبية', 'type' => 'حكومي / تعليمي', 'location' => 'كربلاء - حي الموظفين', 'hours' => '24 ساعة', 'phone' => '07800000003', 'about' => 'أكبر مجمع طبي حكومي في كربلاء يقدم خدمات مجانية.', 'departments' => ['الباطنية', 'الكسور', 'الطوارئ'], 'doctors' => ['استشاريو دائرة الصحة']],
        4 => ['name' => 'مستشفى الإمام الحجة (ع) الخيري', 'type' => 'خيري / أهلي', 'location' => 'كربلاء - حي المدراء', 'hours' => '24 ساعة', 'phone' => '07800000004', 'about' => 'خدمات متميزة بأسعار مدعومة.', 'departments' => ['أمراض الكلى', 'القلبية'], 'doctors' => ['د. حسن العواد']],
        5 => ['name' => 'المركز الصحي في حي العباس', 'type' => 'حكومي / رعاية أولية', 'location' => 'كربلاء - حي العباس', 'hours' => '8ص - 2ظ', 'phone' => '07800000005', 'about' => 'مركز رعاية أولية لتقديم اللقاحات والفحوصات الروتينية.', 'departments' => ['رعاية الحوامل', 'التلقيحات'], 'doctors' => ['أطباء الأسرة']],
        6 => ['name' => 'مركز الرعاية الصحية - حي الموظفين', 'type' => 'حكومي / رعاية أولية', 'location' => 'كربلاء - حي الموظفين', 'hours' => '8ص - 2ظ', 'phone' => '07800000006', 'about' => 'تقديم الرعاية الأولية واللقاحات لكافة الأعمار.', 'departments' => ['طبيب عام', 'اللقاحات'], 'doctors' => ['طبيب ممارس عام']],
    ];

    if (!array_key_exists($id, $hospitals)) abort(404);
    $hospital = $hospitals[$id];
    return view('hospital_single', compact('hospital'));
});

// ========================================================
// 8. بيانات وهمية لتجربة مؤشر الزخم
// ========================================================
Route::get('/fake-appointments/{id}', function ($id) {
    $today = date('Y-m-d');
    for($i = 1; $i <= 5; $i++) {
        \App\Models\Appointment::create([
            'user_id' => 3,
            'doctor_id' => $id, 
            'appointment_date' => $today,
            'queue_number' => $i,
            'patient_phone' => '078000000' . str_pad($i, 2, '0', STR_PAD_LEFT),
            'status' => 'pending',
        ]);
    }
    return "تم تفويل العيادة للدكتور رقم " . $id . " ! ارجع للبروفايل وشوف الشارة الحمرة.";
});
// Route::post('/admin/news/store', [App\Http\Controllers\DoctorController::class, 'storeNews']);
Route::post('/admin/news/store', [App\Http\Controllers\AdminController::class, 'storeNews']);
use App\Http\Controllers\ChatbotController;

// راوت المساعد الذكي عافية
Route::post('/chatbot/respond', [ChatbotController::class, 'respond']);