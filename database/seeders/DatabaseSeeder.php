<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Specialty;
use App\Models\Doctor;
use App\Models\News; // استدعاء مودل الأخبار
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. تصفير الجداول لضمان نظافة البيانات
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Doctor::truncate();
        Specialty::truncate();
        News::truncate(); // تصفير الأخبار
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // 2. إدخال التخصصات
        $specialtiesData = [
            ['name' => 'الباطنية والقلبية', 'icon' => 'fa-solid fa-heart-pulse'],
            ['name' => 'طب وجراحة العيون', 'icon' => 'fa-solid fa-eye'],
            ['name' => 'الأنف والأذن والحنجرة', 'icon' => 'fa-solid fa-ear-listen'],
            ['name' => 'طب وجراحة الأسنان', 'icon' => 'fa-solid fa-tooth'],
            ['name' => 'النسائية والتوليد', 'icon' => 'fa-solid fa-person-pregnant'],
            ['name' => 'الجراحة العامة', 'icon' => 'fa-solid fa-scalpel'],
            ['name' => 'طب الأطفال', 'icon' => 'fa-solid fa-baby'],
            ['name' => 'علاج الألم المزمن', 'icon' => 'fa-solid fa-capsules'],
        ];

        $specialties = [];
        foreach ($specialtiesData as $spec) {
            $specialties[$spec['name']] = Specialty::create($spec)->id;
        }

        // 3. بيانات الأطباء 
        $doctorsData = [
            ['name' => 'د. حيدر صبحي الحداد', 'spec' => 'الباطنية والقلبية', 'loc' => 'الإسكان / مقابل القنصلية', 'phone' => '07805343768', 'gender' => 'male'],
            ['name' => 'د. محمد عبد الزهرة الاوسي', 'spec' => 'الجراحة العامة', 'loc' => 'الإسكان / مجمع الحرير الطبي', 'phone' => '07803331300', 'gender' => 'male'],
            ['name' => 'د. ياسر الخزرجي', 'spec' => 'علاج الألم المزمن', 'loc' => 'الإسكان / مجمع الحرير الطبي', 'phone' => '07711511120', 'gender' => 'male'],
            ['name' => 'أ.د. زاهدة السعدي', 'spec' => 'النسائية والتوليد', 'loc' => 'حي الموظفين', 'phone' => '07711511120', 'gender' => 'female'],
            ['name' => 'د. علاء الغانمي', 'spec' => 'طب وجراحة العيون', 'loc' => 'حي الحسين', 'phone' => '07810002221', 'gender' => 'male'],
            ['name' => 'د. زياد الشريفي', 'spec' => 'طب الأطفال', 'loc' => 'حي الغدير', 'phone' => '07705556667', 'gender' => 'male'],
            ['name' => 'د. حسين علي حكيم', 'spec' => 'طب وجراحة الأسنان', 'loc' => 'حي الموظفين', 'phone' => '07731444875', 'gender' => 'male'],
            ['name' => 'د. حسن علي ابو طحين', 'spec' => 'الجراحة العامة', 'loc' => 'حي المعلمين', 'phone' => '07722265677', 'gender' => 'male'],
            ['name' => 'د. احمد حمندي', 'spec' => 'الأنف والأذن والحنجرة', 'loc' => 'حي العباس', 'phone' => '07806332215', 'gender' => 'male'],
            ['name' => 'د. اسامة نعمة الحميري', 'spec' => 'النسائية والتوليد', 'loc' => 'حي رمضان', 'phone' => '07732906075', 'gender' => 'female'],
            ['name' => 'د. غسان انور العلي', 'spec' => 'طب الأطفال', 'loc' => 'الإسكان', 'phone' => '07751753283', 'gender' => 'male'],
            ['name' => 'د. ايمان مهدي محمد', 'spec' => 'النسائية والتوليد', 'loc' => 'حي الحسين', 'phone' => '07801112223', 'gender' => 'female'],
        ];

        // مصفوفة صور أطباء (لابكوت، وقفة مستقيمة، خلفية بيضاء)
        $maleImages = [
            'https://t4.ftcdn.net/jpg/02/60/04/09/360_F_260040900_oO6YW1sHTnKxby4GcjCvtypUCWjqQR5Q.jpg',
            'https://t3.ftcdn.net/jpg/01/30/45/54/360_F_130455409_fTuinPO1LX2cLQeMOU2OQUZ29zQoNBYy.jpg',
            'https://t4.ftcdn.net/jpg/02/95/51/80/360_F_295518052_aO5dRVvd2EPI1l3Qf9j59YpI553GWe9g.jpg',
            'https://t3.ftcdn.net/jpg/02/82/72/01/360_F_282720195_kH1cE5p0fG6Q7K8lO2QeB7eT8Q7D1B.jpg'
        ];

        // مصفوفة صور طبيبات (لابكوت، وقفة مستقيمة، خلفية بيضاء)
        $femaleImages = [
            'https://t4.ftcdn.net/jpg/03/20/52/31/360_F_320523164_tx7Rdd7I2XDTvD50ZKelYlAyE1OUjNYn.jpg',
            'https://t4.ftcdn.net/jpg/02/81/42/77/360_F_281427785_cvrj9nE1KikB1F20eLgI3Hn0mR5I1X0p.jpg',
            'https://t3.ftcdn.net/jpg/02/60/79/68/360_F_260796882_Qolb0AIfM32kXZBvQ6T20Kk9QOqPnd4G.jpg',
            'https://t4.ftcdn.net/jpg/01/45/11/49/360_F_145114995_vX3pZ7Y0Tz6zY3X6Q2J8X3Q5Q.jpg'
        ];

        // 4. تنفيذ الزرع 
        foreach ($doctorsData as $index => $data) {
            
            // سحب صورة مناسبة حسب الجنس
            if ($data['gender'] == 'female') {
                $imageUrl = $femaleImages[$index % count($femaleImages)];
            } else {
                $imageUrl = $maleImages[$index % count($maleImages)];
            }

            Doctor::create([
                'name' => $data['name'],
                'specialty_id' => $specialties[$data['spec']],
                'degree' => 'أخصائي بورد معتمد',
                'experience_years' => rand(8, 25),
                'bio' => 'طبيب اختصاصي يتمتع بخبرة واسعة في تقديم الرعاية الصحية المتميزة ومتابعة أحدث التقنيات العلاجية.',
                'location' => $data['loc'],
                'consultation_fee' => rand(15, 35) * 1000,
                'is_accepting_bookings' => true,
                'phone' => $data['phone'],
                'whatsapp' => $data['phone'],
                'rating' => 4.5 + (rand(0, 5) / 10),
                'image' => $imageUrl,
            ]);
        }

        // ==========================================
        // 5. زرع الأخبار والنصائح الطبية (مع حقل التصنيف category)
        // ==========================================
        $newsData = [
            [
                'title' => 'نصائح هامة لتجنب الجفاف في صيف كربلاء',
                'category' => 'نصائح طبية', // تمت إضافة التصنيف
                'content' => 'مع ارتفاع درجات الحرارة، ينصح أطباء الباطنية في دليل عافيتك بشرب كميات كافية من الماء (لا تقل عن 8 أكواب يومياً)، وتجنب التعرض المباشر لأشعة الشمس وقت الظهيرة.',
                'image' => 'default.png'
            ],
            [
                'title' => 'افتتاح عيادات مسائية جديدة في مجمع الحرير الطبي',
                'category' => 'أخبار المركز', // تمت إضافة التصنيف
                'content' => 'استجابة لطلبات المواطنين، تم افتتاح عيادات مسائية في مجمع الحرير الطبي بمنطقة الإسكان لتشمل تخصصات العيون والأسنان، لتسهيل مراجعة المرضى بعد أوقات الدوام الرسمي.',
                'image' => 'default.png'
            ],
            [
                'title' => 'حملة مجانية لفحص النظر لطلبة المدارس',
                'category' => 'حملات صحية', // تمت إضافة التصنيف
                'content' => 'بالتعاون مع نخبة من أطباء العيون في دليل عافيتك، تنطلق الأسبوع القادم حملة مجانية لفحص النظر لطلبة المدارس الابتدائية في حي الموظفين وحي الحسين.',
                'image' => 'default.png'
            ],
            [
                'title' => 'أهمية الفحص المبكر لمرضى السكري',
                'category' => 'نصائح طبية', // تمت إضافة التصنيف
                'content' => 'يؤكد د. حيدر صبحي الحداد على ضرورة الفحص الدوري لمستويات السكر في الدم، خاصة لمن لديهم تاريخ عائلي بالمرض، حيث أن الاكتشاف المبكر يمنع المضاعفات بنسبة 80%.',
                'image' => 'default.png'
            ],
            [
                'title' => 'كيف تتعامل مع آلام الظهر المزمنة؟',
                'category' => 'مقالات صحية', // تمت إضافة التصنيف
                'content' => 'الجلوس لفترات طويلة يسبب آلاماً مزمنة في أسفل الظهر. ينصح د. ياسر الخزرجي بأخذ استراحة قصيرة كل ساعة والمشي قليلاً، بالإضافة إلى ممارسة تمارين التمدد الصباحية.',
                'image' => 'default.png'
            ],
        ];

        foreach ($newsData as $newsItem) {
            News::create($newsItem);
        }
    }
}