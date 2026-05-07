<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Specialty;

class ChatbotController extends Controller
{
    public function respond(Request $request)
    {
        $message = $request->input('message');
        $reply = "";

        // 1. فحص الترحيب أولاً
        if (str_contains($message, 'سلام') || str_contains($message, 'مرحبا') || str_contains($message, 'هلو') || str_contains($message, 'شلونج')) {
            return response()->json(['reply' => "أهلاً بيك في دليل عافيتك! 💙 أني المساعد الذكي 'عافية'. تفضل، شلون أكدر أساعدك اليوم؟ (تكدر تسألني عن أعراضك، أو تبحث عن طبيب بالمنطقة اللي تريدها)."]);
        }

        // متغير حتى نعرف إذا عافية لكت فد شي لو لا
        $filtersApplied = false;
        $query = Doctor::query();

        // 2. قاموس الأعراض والتخصصات (كلمات مبسطة حتى يصيدها بسرعة)
        $matchedSpec = null;
        $symptoms = [
            'مفاصل' => 'مفاصل', 'عظام' => 'مفاصل', 'ظهري' => 'مفاصل', 'ركبتي' => 'مفاصل',
            'اسنان' => 'سنان', 'أسنان' => 'سنان', 'سني' => 'سنان', 'ضرسي' => 'سنان', 'لثتي' => 'سنان',
            'قلب' => 'قلب', 'خفقان' => 'قلب',
            'باطنية' => 'باطن', 'معدتي' => 'باطن', 'قولون' => 'باطن'
        ];

        foreach($symptoms as $word => $spec) {
            if(str_contains($message, $word)) { 
                $matchedSpec = $spec; 
                $filtersApplied = true;
                break; 
            }
        }

        if ($matchedSpec) {
            $specialty = Specialty::where('name', 'LIKE', "%{$matchedSpec}%")->first();
            if($specialty) {
                $query->where('specialty_id', $specialty->id);
            }
        }

        // 3. قاموس المناطق
       // 3. قاموس المناطق (ضفنا بيها الاسكان وباقي مناطق كربلاء)
        $locations = [
            'حي العامل', 'حي الحسين', 'حي الموظفين', 'السناتر', 
            'الاسكان', 'الإسكان', 'سيف سعد', 'حي النقيب', 'البلدية', 'حي رمضان'
        ];
        
        foreach($locations as $loc) {
            // سويتلك حركة ذكية: إذا لكة "الاسكان" (بدون همزة) يبحث بالداتابيس عن "الإسكان" (بهمزة) حتى ما يغلط
            if(str_contains($message, $loc)) { 
                $searchLoc = ($loc == 'الاسكان') ? 'الإسكان' : $loc;
                $query->where('location', 'LIKE', "%{$searchLoc}%");
                $filtersApplied = true;
                break; 
            }
        }

        // 4. السعر والتقييم
        if (str_contains($message, 'رخيص') || str_contains($message, 'مناسب') || str_contains($message, 'بلاش')) {
            $query->orderBy('consultation_fee', 'asc');
            $filtersApplied = true;
        }
        
        if (str_contains($message, 'احسن') || str_contains($message, 'افضل') || str_contains($message, 'زين') || str_contains($message, 'شاطر')) {
            $query->orderBy('rating', 'desc');
            $filtersApplied = true;
        }

        // 🛑 الحماية: إذا المريض ما كتب أي كلمة مفتاحية، لا تنطي دكتور عشوائي!
        if (!$filtersApplied) {
            return response()->json(['reply' => "عذراً، ما كدرت أحدد التخصص أو المنطقة من رسالتك. تكدر توضحلي أكثر؟ (مثلاً: اريد دكتور أسنان بحي الحسين)."]);
        }

        // 5. تنفيذ البحث
        $doctor = $query->first();

        // 6. تجهيز الرد
        if ($doctor) {
            $reply = "تدلل! لكيتلك هذا الطبيب حسب طلبك بالضبط:<br><br>";
            $reply .= "👨‍⚕️ <b>" . $doctor->name . "</b><br>";
            $reply .= "📍 <b>العنوان:</b> " . $doctor->location . "<br>";
            $reply .= "💵 <b>الكشفية:</b> " . $doctor->consultation_fee . " دينار<br>";
            if($doctor->rating) {
                $reply .= "⭐ <b>التقييم:</b> " . $doctor->rating . "/5<br>";
            }
            $reply .= "<br><a href='/doctors/" . $doctor->id . "' class='btn btn-sm text-white mt-2' style='background-color: var(--primary-navy);'>عرض بروفايل الطبيب</a>";
        } else {
            $reply = "دورت بالدليل وما لكيت طبيب يطابق هاي المواصفات. جرب تبحث بتخصص ثاني أو تغير اسم المنطقة.";
        }

        return response()->json(['reply' => $reply]);
    }
}