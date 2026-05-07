<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>دليل عافيتك | المستشفيات والمراكز (كربلاء)</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body { background-color: #f8fafc; overflow-x: hidden; }
        
        .page-hero {
            background-color: var(--primary-navy);
            color: white;
            padding: 70px 20px;
            border-radius: 0 0 50px 50px;
            margin-bottom: 50px;
            text-align: center;
            box-shadow: 0 15px 30px rgba(15, 43, 91, 0.1);
        }

        .hospital-card {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 1px solid #eef2f7;
        }
        .hospital-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(15, 43, 91, 0.12) !important;
            border-color: var(--accent-gold);
        }
        
        .nav-pills .nav-link {
            color: var(--primary-navy);
            font-weight: bold;
            border-radius: 12px;
            padding: 12px 30px;
            font-size: 1.1rem;
            transition: 0.3s;
            border: 1px solid transparent;
        }
        .nav-pills .nav-link:hover:not(.active) {
            background-color: rgba(15, 43, 91, 0.05);
        }
        .nav-pills .nav-link.active {
            background-color: var(--primary-navy);
            color: white;
            box-shadow: 0 8px 20px rgba(15, 43, 91, 0.2);
        }
        
        .consultant-badge {
            background-color: #f8fafc;
            color: var(--primary-navy);
            border: 1px solid #e2e8f0;
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 0.85rem;
            margin-bottom: 8px;
            display: inline-block;
            font-weight: bold;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-up {
            opacity: 0;
            animation: fadeUp 0.8s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
        }
        .delay-1 { animation-delay: 0.1s; }
        .delay-2 { animation-delay: 0.2s; }
        .delay-3 { animation-delay: 0.3s; }
        .delay-4 { animation-delay: 0.4s; }
    </style>
</head>
<body>

   <!-- ================= القائمة الجانبية (سلايد الموبايل) ================= -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="sideMenu">
        <div class="offcanvas-header border-bottom" style="background-color: var(--primary-navy); color: white;">
            <h5 class="offcanvas-title fw-bold d-flex align-items-center gap-2">
                <i class="fa-solid fa-heart-pulse" style="color: var(--accent-gold);"></i> دليل عافيتك
            </h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body mt-4">
            <ul class="list-unstyled fw-bold pe-0">
                <li class="mb-4"><a href="{{ url('/') }}" class="text-decoration-none text-dark d-block"><i class="fa-solid fa-house ms-3 text-muted" style="width: 25px;"></i> الرئيسية</a></li>
                <li class="mb-4"><a href="{{ url('/doctors') }}" class="text-decoration-none text-dark d-block"><i class="fa-solid fa-user-doctor ms-3 text-muted" style="width: 25px;"></i> دليل الأطباء</a></li>
                {{-- <li class="mb-4"><a href="{{ url('/specialties') }}" class="text-decoration-none text-dark d-block"><i class="fa-solid fa-stethoscope ms-3 text-muted" style="width: 25px;"></i> التخصصات الطبية</a></li> --}}
                
                <!-- الرابط الجديد اللي ضفناه للمستشفيات -->
                <li class="mb-4"><a href="{{ url('/hospitals') }}" class="text-decoration-none text-dark d-block"><i class="fa-solid fa-hospital ms-3 text-muted" style="width: 25px;"></i> المستشفيات والمراكز</a></li>
                <li class="mb-4"><a href="{{ url('/forum') }}" class="text-decoration-none d-block"><i class="fa-solid fa-comments ms-3 text-muted w-25"></i> منتدى الأطباء</a></li>
                <li class="mb-4"><a href="{{ url('/news') }}" class="text-decoration-none text-dark d-block"><i class="fa-solid fa-newspaper ms-3 text-muted" style="width: 25px;"></i> الأخبار والنصائح الطبية</a></li>
                <li class="mb-4"><a href="{{ url('/about') }}" class="text-decoration-none text-dark d-block"><i class="fa-solid fa-circle-info ms-3 text-muted" style="width: 25px;"></i> من نحن</a></li>
            </ul>
            <hr class="my-4 text-muted">
            <div class="px-2">
                <a href="{{ url('/admin/dashboard') }}" class="btn w-100 fw-bold py-3 rounded-3 shadow-sm" style="background-color: var(--primary-navy); color: white;">
                    <i class="fa-solid fa-lock ms-2"></i> لوحة الإدارة
                </a>
            </div>
        </div>
    </div>

    <!-- ================= النافبار ================= -->
    <nav class="navbar navbar-expand-lg custom-navbar sticky-top py-3 bg-white shadow-sm">
        <div class="container d-flex justify-content-between align-items-center">
            
            <!-- زر الـ 3 شخطات لفتح القائمة -->
            <button class="btn border-0 p-0 me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#sideMenu" style="color: var(--primary-navy); font-size: 1.8rem;">
                <i class="fa-solid fa-bars-staggered"></i>
            </button>
            
            <!-- اللوجو -->
            <a class="navbar-brand d-flex align-items-center gap-2 mx-auto ms-lg-auto me-lg-0" href="{{ url('/') }}">
                <span class="fw-bold" style="color: var(--primary-navy); font-size: 1.6rem;">دليل عافيتك</span>
                <img src="{{ asset('images/logo.png') }}" alt="دليل عافيتك" style="height: 45px; width: auto; object-fit: contain;">
            </a>

            <!-- روابط القائمة للشاشات الكبيرة -->
            <div class="collapse navbar-collapse justify-content-end d-none d-lg-flex" id="navbarNav">
                <ul class="navbar-nav align-items-center gap-2">
                    <li class="nav-item"><a class="nav-link fw-bold text-dark" href="{{ url('/') }}">الرئيسية</a></li>
                    <li class="nav-item"><a class="nav-link fw-bold text-dark" href="{{ url('/doctors') }}">الأطباء</a></li>
                    {{-- <li class="nav-item"><a class="nav-link fw-bold text-dark" href="{{ url('/specialties') }}">التخصصات</a></li> --}}
                    
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="{{ url('/hospitals') }}" style="color: var(--primary-navy); border-bottom: 2px solid var(--accent-gold);">المستشفيات والمراكز</a>
                    </li>
                    <li class="nav-item"><a class="nav-link fw-bold text-dark" href="{{ url('/forum') }}">منتدى الأطباء</a></li>
                    <li class="nav-item"><a class="nav-link fw-bold text-dark" href="{{ url('/news') }}">الأخبار والنصائح</a></li>
                    <li class="nav-item"><a class="nav-link fw-bold text-dark" href="{{ url('/about') }}">من نحن</a></li>
                    
                    <li class="nav-item ms-3 mt-2 mt-lg-0">
                        <a href="{{ url('/admin/dashboard') }}" class="btn px-4 py-2 rounded-pill shadow-sm fw-bold" style="background-color: var(--primary-navy); color: white;">
                            <i class="fa-solid fa-chart-line me-2"></i> لوحة الإدارة
                        </a>
                    </li>
                </ul>
            </div>
            
        </div>
    </nav>

    <!-- الهيدر الأزرق الفخم -->
    <div class="page-hero animate-fade-up">
        <div class="container">
            <h1 class="fw-black mb-3" style="font-size: 2.5rem;">
                <i class="fa-solid fa-hospital-user me-2" style="color: var(--accent-gold);"></i> الدليل الصحي لمحافظة كربلاء المقدسة
            </h1>
            <p class="fs-5 opacity-75 mb-0">استعرض المستشفيات الحكومية والأهلية والمستوصفات مع أوقات الدوام والاستشاريين بضغطة زر.</p>
        </div>
    </div>

    <div class="container mb-5">
        
        <!-- تبويبات: مستشفيات / مستوصفات -->
        <ul class="nav nav-pills justify-content-center mb-5 gap-3 animate-fade-up delay-1" id="medicalTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#hospitals" type="button" role="tab">
                    <i class="fa-solid fa-truck-medical me-2"></i> المستشفيات
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#clinics" type="button" role="tab">
                    <i class="fa-solid fa-clinic-medical me-2"></i> المستوصفات والمراكز
                </button>
            </li>
        </ul>

        <div class="tab-content" id="medicalTabsContent">
            
            <!-- ====== قسم المستشفيات ====== -->
            <div class="tab-pane fade show active" id="hospitals" role="tabpanel">
                <div class="row g-4">
                    
                    <!-- مستشفى الكفيل (رقم 1) -->
                    <div class="col-lg-6 animate-fade-up delay-2">
                        <div class="card hospital-card h-100 rounded-4 bg-white p-4 d-flex flex-column">
                            <div class="d-flex align-items-start gap-3 mb-3">
                                <div class="p-3 rounded-4 shadow-sm" style="background-color: var(--primary-navy); color: white;">
                                    <i class="fa-solid fa-hospital fs-2"></i>
                                </div>
                                <div>
                                    <h4 class="fw-bold mb-1" style="color: var(--primary-navy);">مستشفى الكفيل التخصصي</h4>
                                    <span class="badge bg-success mb-2 px-3 py-2">أهلي / تخصصي</span>
                                </div>
                            </div>
                            <div class="mt-2 flex-grow-1">
                                <p class="mb-2 text-muted"><i class="fa-solid fa-location-dot me-2 text-danger"></i> <strong>الموقع:</strong> كربلاء - طريق بغداد، منطقة البوبيات.</p>
                                <p class="mb-2 text-muted"><i class="fa-regular fa-clock me-2 text-warning"></i> <strong>الدوام:</strong> 24 ساعة (الطوارئ) - العيادات (8 صباحاً - 8 مساءً).</p>
                                <hr class="text-muted opacity-25 my-3">
                                <h6 class="fw-bold mb-3" style="color: var(--primary-navy);"><i class="fa-solid fa-user-doctor me-2 text-info"></i> أبرز الاستشاريين المتواجدين:</h6>
                                <div>
                                    <span class="consultant-badge">د. علي الشمري (جراحة قلب)</span>
                                    <span class="consultant-badge">د. محمد رضا (باطنية)</span>
                                    <span class="consultant-badge">د. سارة أحمد (نسائية وتوليد)</span>
                                </div>
                            </div>
                            <div class="mt-4 text-end mt-auto">
                                <a href="{{ url('/hospital/1') }}" class="btn btn-sm fw-bold px-4 rounded-pill shadow-sm" style="background-color: var(--primary-navy); color: white;">
                                      التفاصيل والمزيد <i class="fa-solid fa-arrow-left ms-1"></i>
                                 </a>
                            </div>
                        </div>
                    </div>

                    <!-- مستشفى الإمام زين العابدين (رقم 2) -->
                    <div class="col-lg-6 animate-fade-up delay-3">
                        <div class="card hospital-card h-100 rounded-4 bg-white p-4 d-flex flex-column">
                            <div class="d-flex align-items-start gap-3 mb-3">
                                <div class="p-3 rounded-4 shadow-sm" style="background-color: var(--primary-navy); color: white;">
                                    <i class="fa-solid fa-hospital fs-2"></i>
                                </div>
                                <div>
                                    <h4 class="fw-bold mb-1" style="color: var(--primary-navy);">مستشفى الإمام زين العابدين (ع)</h4>
                                    <span class="badge bg-success mb-2 px-3 py-2">أهلي / تعليمي</span>
                                </div>
                            </div>
                            <div class="mt-2 flex-grow-1">
                                <p class="mb-2 text-muted"><i class="fa-solid fa-location-dot me-2 text-danger"></i> <strong>الموقع:</strong> كربلاء - شارع الإسكان، قرب سيد جودة.</p>
                                <p class="mb-2 text-muted"><i class="fa-regular fa-clock me-2 text-warning"></i> <strong>الدوام:</strong> الطوارئ 24 ساعة - العيادات الصباحية والمسائية.</p>
                                <hr class="text-muted opacity-25 my-3">
                                <h6 class="fw-bold mb-3" style="color: var(--primary-navy);"><i class="fa-solid fa-user-doctor me-2 text-info"></i> أبرز الاستشاريين المتواجدين:</h6>
                                <div>
                                    <span class="consultant-badge">د. حسين الخفاجي (جراحة عامة)</span>
                                    <span class="consultant-badge">د. زينب الموسوي (أطفال)</span>
                                </div>
                            </div>
                            <div class="mt-4 text-end mt-auto">
                                <a href="{{ url('/hospital/2') }}" class="btn btn-sm fw-bold px-4 rounded-pill shadow-sm" style="background-color: var(--primary-navy); color: white;">
                                      التفاصيل والمزيد <i class="fa-solid fa-arrow-left ms-1"></i>
                                 </a>
                            </div>
                        </div>
                    </div>

                    <!-- مدينة الإمام الحسين الطبية (رقم 3) -->
                    <div class="col-lg-6 animate-fade-up delay-2">
                        <div class="card hospital-card h-100 rounded-4 bg-white p-4 d-flex flex-column">
                            <div class="d-flex align-items-start gap-3 mb-3">
                                <div class="p-3 rounded-4 shadow-sm" style="background-color: var(--accent-gold); color: var(--primary-navy);">
                                    <i class="fa-solid fa-building-user fs-2"></i>
                                </div>
                                <div>
                                    <h4 class="fw-bold mb-1" style="color: var(--primary-navy);">مدينة الإمام الحسين (ع) الطبية</h4>
                                    <span class="badge bg-primary mb-2 px-3 py-2">حكومي / تعليمي</span>
                                </div>
                            </div>
                            <div class="mt-2 flex-grow-1">
                                <p class="mb-2 text-muted"><i class="fa-solid fa-location-dot me-2 text-danger"></i> <strong>الموقع:</strong> كربلاء - حي الموظفين، الشارع العام.</p>
                                <p class="mb-2 text-muted"><i class="fa-regular fa-clock me-2 text-warning"></i> <strong>الدوام:</strong> 24 ساعة (طوارئ وجميع الأقسام).</p>
                                <hr class="text-muted opacity-25 my-3">
                                <h6 class="fw-bold mb-3" style="color: var(--primary-navy);"><i class="fa-solid fa-user-doctor me-2 text-info"></i> أبرز الاستشاريين المتواجدين:</h6>
                                <div>
                                    <span class="consultant-badge">جميع استشاريي دائرة صحة كربلاء</span>
                                    <span class="consultant-badge">قسم الباطنية العام</span>
                                </div>
                            </div>
                            <div class="mt-4 text-end mt-auto">
                                <a href="{{ url('/hospital/3') }}" class="btn btn-sm fw-bold px-4 rounded-pill shadow-sm" style="background-color: var(--primary-navy); color: white;">
                                      التفاصيل والمزيد <i class="fa-solid fa-arrow-left ms-1"></i>
                                 </a>
                            </div>
                        </div>
                    </div>

                    <!-- مستشفى الإمام الحجة الخيري (رقم 4) -->
                    <div class="col-lg-6 animate-fade-up delay-3">
                        <div class="card hospital-card h-100 rounded-4 bg-white p-4 d-flex flex-column">
                            <div class="d-flex align-items-start gap-3 mb-3">
                                <div class="p-3 rounded-4 shadow-sm" style="background-color: var(--primary-navy); color: white;">
                                    <i class="fa-solid fa-hospital fs-2"></i>
                                </div>
                                <div>
                                    <h4 class="fw-bold mb-1" style="color: var(--primary-navy);">مستشفى الإمام الحجة (ع) الخيري</h4>
                                    <span class="badge bg-warning text-dark mb-2 px-3 py-2">خيري / أهلي</span>
                                </div>
                            </div>
                            <div class="mt-2 flex-grow-1">
                                <p class="mb-2 text-muted"><i class="fa-solid fa-location-dot me-2 text-danger"></i> <strong>الموقع:</strong> كربلاء - حي المدراء، قرب فلكة التربية.</p>
                                <p class="mb-2 text-muted"><i class="fa-regular fa-clock me-2 text-warning"></i> <strong>الدوام:</strong> الطوارئ 24 ساعة - العيادات الاستشارية يومياً.</p>
                                <hr class="text-muted opacity-25 my-3">
                                <h6 class="fw-bold mb-3" style="color: var(--primary-navy);"><i class="fa-solid fa-user-doctor me-2 text-info"></i> أبرز الاستشاريين المتواجدين:</h6>
                                <div>
                                    <span class="consultant-badge">د. حسن العواد (أمراض الكلى)</span>
                                    <span class="consultant-badge">د. باسم جابر (باطنية وقلبية)</span>
                                </div>
                            </div>
                            <div class="mt-4 text-end mt-auto">
                                <a href="{{ url('/hospital/4') }}" class="btn btn-sm fw-bold px-4 rounded-pill shadow-sm" style="background-color: var(--primary-navy); color: white;">
                                      التفاصيل والمزيد <i class="fa-solid fa-arrow-left ms-1"></i>
                                 </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- ====== قسم المستوصفات والمراكز ====== -->
            <div class="tab-pane fade" id="clinics" role="tabpanel">
                <div class="row g-4">
                    
                    <!-- مركز العباس الصحي (رقم 5) -->
                    <div class="col-lg-6 animate-fade-up delay-2">
                        <div class="card hospital-card h-100 rounded-4 bg-white p-4 border-start border-4 border-primary d-flex flex-column">
                            <div class="d-flex align-items-start gap-3 mb-3">
                                <div class="p-3 rounded-circle shadow-sm bg-light text-primary">
                                    <i class="fa-solid fa-house-medical fs-3"></i>
                                </div>
                                <div>
                                    <h4 class="fw-bold mb-1" style="color: var(--primary-navy);">المركز الصحي في حي العباس</h4>
                                    <span class="badge bg-secondary mb-2 px-3 py-2">حكومي / رعاية أولية</span>
                                </div>
                            </div>
                            <div class="mt-2 flex-grow-1">
                                <p class="mb-2 text-muted"><i class="fa-solid fa-location-dot me-2 text-danger"></i> <strong>الموقع:</strong> كربلاء - حي العباس.</p>
                                <p class="mb-2 text-muted"><i class="fa-regular fa-clock me-2 text-warning"></i> <strong>الدوام:</strong> 8:00 صباحاً - 2:00 ظهراً (عطلة الجمعة والسبت).</p>
                                <p class="mb-0 text-muted"><i class="fa-solid fa-syringe me-2 text-info"></i> <strong>الخدمات:</strong> تلقيحات، رعاية حوامل، طب أسنان أولي، صيدلية.</p>
                            </div>
                            <div class="mt-4 text-end mt-auto">
                                <a href="{{ url('/hospital/5') }}" class="btn btn-sm fw-bold px-4 rounded-pill shadow-sm" style="background-color: var(--primary-navy); color: white;">
                                      التفاصيل والمزيد <i class="fa-solid fa-arrow-left ms-1"></i>
                                 </a>
                            </div>
                        </div>
                    </div>

                    <!-- مستوصف حي الموظفين (رقم 6) -->
                    <div class="col-lg-6 animate-fade-up delay-3">
                        <div class="card hospital-card h-100 rounded-4 bg-white p-4 border-start border-4 border-primary d-flex flex-column">
                            <div class="d-flex align-items-start gap-3 mb-3">
                                <div class="p-3 rounded-circle shadow-sm bg-light text-primary">
                                    <i class="fa-solid fa-house-medical fs-3"></i>
                                </div>
                                <div>
                                    <h4 class="fw-bold mb-1" style="color: var(--primary-navy);">مركز الرعاية الصحية - حي الموظفين</h4>
                                    <span class="badge bg-secondary mb-2 px-3 py-2">حكومي / رعاية أولية</span>
                                </div>
                            </div>
                            <div class="mt-2 flex-grow-1">
                                <p class="mb-2 text-muted"><i class="fa-solid fa-location-dot me-2 text-danger"></i> <strong>الموقع:</strong> كربلاء - حي الموظفين، مجاور مدرسة الفارس.</p>
                                <p class="mb-2 text-muted"><i class="fa-regular fa-clock me-2 text-warning"></i> <strong>الدوام:</strong> 8:00 صباحاً - 2:00 ظهراً.</p>
                                <p class="mb-0 text-muted"><i class="fa-solid fa-syringe me-2 text-info"></i> <strong>الخدمات:</strong> فحص طبيب عام، تحاليل مختبرية بسيطة، لقاحات أطفال.</p>
                            </div>
                            <div class="mt-4 text-end mt-auto">
                                <a href="{{ url('/hospital/6') }}" class="btn btn-sm fw-bold px-4 rounded-pill shadow-sm" style="background-color: var(--primary-navy); color: white;">
                                      التفاصيل والمزيد <i class="fa-solid fa-arrow-left ms-1"></i>
                                 </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>