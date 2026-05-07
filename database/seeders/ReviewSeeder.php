<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        // إذا ماكو 10 مرضى، النظام راح يسويهم
        if (User::query()->count() < 10) {
            User::factory(10)->create();
        }

        $doctors = Doctor::all();
        $users = User::query()->pluck('id')->toArray();

        // تعليقات واقعية تخص أهالي كربلاء
        $comments = [
            'عاشت ايده دكتور ممتاز جداً وخلوق، رحم الله والديه.',
            'تشخيص دقيق وعلاج فعال، أنصح بي بشدة.',
            'العيادة نظيفة والتعامل راقي، بس الانتظار شوية طويل.',
            'أفضل طبيب راجعته بكربلاء، الله يوفقه.',
            'طبيب شاطر جداً، من أول مراجعة ارتاحيت للعلاج.',
            'ممتاز، استمع لحالتي بالتفصيل وما استعجل عليه.',
            'أخلاق عالية وتعامله إنساني جداً.',
            '', 
            'دكتور جيد، بس الحجز صعب ومزدحم دائماً.'
        ];

        foreach ($doctors as $doctor) {
            $numberOfReviews = rand(3, 7);

            for ($i = 0; $i < $numberOfReviews; $i++) {
                Review::create([
                    'user_id' => $users[array_rand($users)],
                    'doctor_id' => $doctor->id,
                    'rating' => rand(3, 5),
                    'comment' => $comments[array_rand($comments)],
                ]);
            }
        }
    }
}