<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    public function definition(): array
    {
        // أسماء عراقية واقعية للمرضى الوهميين
        $names = ['علي محمد', 'حسين كاظم', 'احمد رضا', 'مصطفى سعد', 'زينب عباس', 'فاطمة حسن', 'سجاد هادي', 'حسن جاسم', 'نور علي', 'كرار فاضل'];

        return [
            'name' => $names[array_rand($names)],
            'email' => Str::random(6) . '@dalil.com', // إيميل عشوائي لكل مريض
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // الباسوورد الافتراضي: password
            'remember_token' => Str::random(10),
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}