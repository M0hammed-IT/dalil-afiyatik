<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Specialty;
use App\Models\Doctor;

class DoctorSeeder extends Seeder
{
    public function run(): void
    {
        // 1. إدخال التخصصات الطبية
        $orthopedics = Specialty::create(['name' => 'جراحة العظام والكسور', 'description' => 'علاج أمراض المفاصل والعمود الفقري والكسور']);
        $pediatrics = Specialty::create(['name' => 'طب الأطفال', 'description' => 'علاج ومتابعة حالات الأطفال وحديثي الولادة']);
        $gynecology = Specialty::create(['name' => 'النسائية والتوليد', 'description' => 'متابعة الحمل والأمراض النسائية']);
        $urology = Specialty::create(['name' => 'جراحة الكلى والمسالك البولية', 'description' => 'علاج أمراض الكلى والمجاري البولية وعقم الرجال']);
        $internal = Specialty::create(['name' => 'الأمراض الباطنية', 'description' => 'علاج الغدد الصماء والسكري والأمراض الداخلية']);
        $general_surgery = Specialty::create(['name' => 'الجراحة العامة', 'description' => 'عمليات الجراحة العامة والجهاز الهضمي']);

        // 2. إدخال بيانات أطباء كربلاء الحقيقيين وربطهم بالتخصصات
        
        // أطباء العظام والكسور
        Doctor::create([
            'specialty_id' => $orthopedics->id,
            'full_name' => 'د. محمد باقر',
            'qualifications' => 'أخصائي جراحة العظام والكسور والمفاصل',
            'clinic_address' => 'كربلاء - مجمع الأطباء',
            'examination_fee' => 25000,
            'phone_number' => '07703128304'
        ]);

        // أطباء الأطفال
        Doctor::create([
            'specialty_id' => $pediatrics->id,
            'full_name' => 'د. علي مجيد اللامي',
            'qualifications' => 'أخصائي طب الأطفال وحديثي الولادة',
            'clinic_address' => 'كربلاء - شارع الإسكان',
            'examination_fee' => 20000,
            'phone_number' => '07718783280'
        ]);

        // طبيبات النسائية
        Doctor::create([
            'specialty_id' => $gynecology->id,
            'full_name' => 'الدكتورة طلا طالب',
            'qualifications' => 'أخصائية الأمراض النسائية والتوليد',
            'clinic_address' => 'كربلاء - حي الحسين',
            'examination_fee' => 25000,
            'phone_number' => '07800756672'
        ]);

        // أطباء المسالك البولية
        Doctor::create([
            'specialty_id' => $urology->id,
            'full_name' => 'د. صفاء كاطع مزبان',
            'qualifications' => 'اختصاص جراحة الكلى والمسالك البولية وزراعة الكلى',
            'clinic_address' => 'كربلاء - الإسكان',
            'examination_fee' => 30000,
            'phone_number' => '07724130012'
        ]);

        // أطباء الباطنية
        Doctor::create([
            'specialty_id' => $internal->id,
            'full_name' => 'د. إبراهيم عبود',
            'qualifications' => 'اختصاص باطنية، غدد صماء وسكري',
            'clinic_address' => 'كربلاء - السناتر',
            'examination_fee' => 25000,
            'phone_number' => '07705505561'
        ]);

        // الجراحة العامة
        Doctor::create([
            'specialty_id' => $general_surgery->id,
            'full_name' => 'د. شايع عبود السكيني',
            'qualifications' => 'اختصاص جراحة عامة',
            'clinic_address' => 'كربلاء - حي الموظفين',
            'examination_fee' => 25000,
            'phone_number' => '07733111002'
        ]);
    }
}