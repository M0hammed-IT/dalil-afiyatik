<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>دليل عافيتك | دليل الأطباء</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <!-- ================= القائمة الجانبية (Offcanvas) ================= -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="sideMenu">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title fw-bold d-flex align-items-center gap-2">
            <i class="fa-solid fa-notes-medical" style="color: var(--accent-gold);"></i> دليل عافيتك
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body mt-3">
        <ul class="list-unstyled fw-bold">
            <li class="mb-4"><a href="{{ url('/') }}" class="text-decoration-none d-block"><i class="fa-solid fa-house ms-3 text-muted w-25"></i> الرئيسية</a></li>
            <li class="mb-4"><a href="{{ url('/doctors') }}" class="text-decoration-none d-block" style="color: var(--primary-navy);"><i class="fa-solid fa-user-doctor ms-3 w-25" style="color: var(--accent-gold);"></i> دليل الأطباء</a></li>
            {{-- <li class="mb-4"><a href="{{ url('/specialties') }}" class="text-decoration-none d-block"><i class="fa-solid fa-stethoscope ms-3 text-muted w-25"></i> التخصصات الطبية</a></li> --}}
            <li class="mb-4"><a href="{{ url('/hospitals') }}" class="text-decoration-none d-block"><i class="fa-solid fa-hospital ms-3 text-muted w-25"></i> المستشفيات والمراكز</a></li>
            <li class="mb-4"><a href="{{ url('/forum') }}" class="text-decoration-none d-block"><i class="fa-solid fa-comments ms-3 text-muted w-25"></i> منتدى الأطباء</a></li>
            <li class="mb-4"><a href="{{ url('/news') }}" class="text-decoration-none d-block"><i class="fa-solid fa-newspaper ms-3 text-muted w-25"></i> الأخبار والنصائح</a></li>
            <li class="mb-4"><a href="{{ url('/about') }}" class="text-decoration-none d-block"><i class="fa-solid fa-circle-info ms-3 text-muted w-25"></i> من نحن</a></li>
        </ul>
        <hr class="my-4 text-muted">
        <div class="px-2">
            <a href="{{ url('/admin/dashboard') }}" class="btn w-100 fw-bold py-3 rounded-4 shadow-sm" style="background-color: var(--primary-navy); color: white;">
                <i class="fa-solid fa-lock ms-2"></i> لوحة الإدارة
            </a>
        </div>
    </div>
</div>

<!-- ================= النافبار الأساسي ================= -->
<nav class="navbar navbar-expand-lg custom-navbar sticky-top py-3 bg-white shadow-sm">
    <div class="container d-flex justify-content-between align-items-center">
        <button class="btn border-0 p-0 me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#sideMenu" style="color: var(--primary-navy); font-size: 1.8rem;">
            <i class="fa-solid fa-bars-staggered"></i>
        </button>
        
        <a class="navbar-brand d-flex align-items-center gap-2 mx-auto ms-lg-auto me-lg-0" href="{{ url('/') }}">
            <span class="fw-bold" style="color: var(--primary-navy); font-size: 1.6rem;">دليل عافيتك</span>
            <img src="{{ asset('images/logo.png') }}" alt="دليل عافيتك" style="height: 45px; width: auto; object-fit: contain;">
        </a>

        <div class="collapse navbar-collapse justify-content-end d-none d-lg-flex" id="navbarNav">
            <ul class="navbar-nav align-items-center gap-2">
                <li class="nav-item"><a class="nav-link fw-bold text-dark" href="{{ url('/') }}">الرئيسية</a></li>
                <li class="nav-item"><a class="nav-link fw-bold" href="{{ url('/doctors') }}" style="color: var(--primary-navy); border-bottom: 2px solid var(--accent-gold);">الأطباء</a></li>
                {{-- <li class="nav-item"><a class="nav-link fw-bold text-dark" href="{{ url('/specialties') }}">التخصصات</a></li> --}}
                <li class="nav-item"><a class="nav-link fw-bold text-dark" href="{{ url('/hospitals') }}">المستشفيات والمراكز</a></li>
                <li class="nav-item"><a class="nav-link fw-bold text-dark" href="{{ url('/forum') }}">منتدى الأطباء</a></li>
                <li class="nav-item"><a class="nav-link fw-bold text-dark" href="{{ url('/news') }}">الأخبار والنصائح</a></li>
                <li class="nav-item"><a class="nav-link fw-bold text-dark" href="{{ url('/about') }}">من نحن</a></li>
                <li class="nav-item ms-3">
                    <a href="{{ url('/admin/dashboard') }}" class="btn search-btn px-4 py-2 rounded-pill shadow-sm" style="background-color: var(--primary-navy); color: white;"><i class="fa-solid fa-chart-line me-2"></i> لوحة الإدارة</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
    <header class="inner-page-header fade-up">
        <div class="container">
            <h1 class="fw-black display-5">دليل أطباء كربلاء</h1>
            <p class="opacity-75 fs-5">تصفح قائمة الأطباء المعتمدين في جميع تخصصات مدينتك</p>
        </div>
    </header>

    <section class="py-5">
        <div class="container">
            
    <div class="row mb-5 fade-up" style="transition-delay: 0.1s;">
        <div class="col-12">
            <div class="glass-search p-3 shadow-sm rounded-pill" style="background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(15px); border: 1px solid rgba(255, 255, 255, 0.3);">
                <form action="{{ url('/doctors') }}" method="GET" class="row g-3 align-items-center m-0 w-100">
                    
                    <div class="col-lg-4 col-md-12">
                        <div class="search-container position-relative w-100">
                            <div class="input-group input-group-lg bg-white shadow-none" style="border-radius: 50px; overflow: hidden; border: 1px solid #e2e8f0;">
                                <span class="input-group-text bg-white border-0 text-muted ps-4">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </span>
                                <input type="text" name="q" value="{{ request('q') }}" id="live-search-input" class="form-control border-0 shadow-none bg-white text-dark fw-bold fs-6" placeholder="اسم الطبيب أو العيادة..." autocomplete="off">
                            </div>

                            <div id="search-results-box" class="position-absolute w-100 bg-white shadow-lg rounded-3 mt-2 d-none" style="z-index: 1000; max-height: 350px; overflow-y: auto;">
                                <div class="list-group list-group-flush" id="results-list">
                                    </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 border-end border-start px-lg-3">
                        <div class="input-group input-group-lg bg-white shadow-none" style="border-radius: 50px; overflow: hidden; border: 1px solid #e2e8f0;">
                            <span class="input-group-text bg-white border-0 ps-4">
                                <i class="fa-solid fa-stethoscope text-muted"></i>
                            </span>
                            <select name="specialty_id" class="form-select search-input border-0 text-muted shadow-none bg-white fw-bold fs-6">
                                <option value="">اختر التخصص</option>
                                @foreach(\App\Models\Specialty::all() as $specialty)
                                    <option value="{{ $specialty->id }}" {{ request('specialty_id') == $specialty->id ? 'selected' : '' }}>
                                        {{ $specialty->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 px-lg-3">
                        <div class="input-group input-group-lg bg-white shadow-none" style="border-radius: 50px; overflow: hidden; border: 1px solid #e2e8f0;">
                            <span class="input-group-text bg-white border-0 ps-4">
                                <i class="fa-solid fa-location-dot text-muted"></i>
                            </span>
                            <select name="location" class="form-select search-input border-0 text-muted shadow-none bg-white fw-bold fs-6">
                        <option value="">كل المناطق</option>
    
                        <!-- المناطق الأكثر تواجداً للعيادات -->
                         <option value="حي الحسين" {{ request('location') == 'حي الحسين' ? 'selected' : '' }}>حي الحسين</option>
                        <option value="حي العباس" {{ request('location') == 'حي العباس' ? 'selected' : '' }}>حي العباس</option>
                        <option value="حي الموظفين" {{ request('location') == 'حي الموظفين' ? 'selected' : '' }}>حي الموظفين</option>
                        <option value="حي الغدير" {{ request('location') == 'حي الغدير' ? 'selected' : '' }}>حي الغدير</option>
                        <option value="حي المعلمين" {{ request('location') == 'حي المعلمين' ? 'selected' : '' }}>حي المعلمين</option>
    
                     <!-- باقي مناطق كربلاء -->
                        <option value="الإسكان" {{ request('location') == 'الإسكان' ? 'selected' : '' }}>الإسكان</option>
                        <option value="حي رمضان" {{ request('location') == 'حي رمضان' ? 'selected' : '' }}>حي رمضان</option>
                        <option value="حي الحر" {{ request('location') == 'حي الحر' ? 'selected' : '' }}>حي الحر</option>
                        <option value="حي الإمام علي" {{ request('location') == 'حي الإمام علي' ? 'selected' : '' }}>حي الإمام علي</option>
                        <option value="حي الضباط" {{ request('location') == 'حي الضباط' ? 'selected' : '' }}>حي الضباط</option>
                        <option value="حي العامل" {{ request('location') == 'حي العامل' ? 'selected' : '' }}>حي العامل</option>
                        <option value="حي الوفاء" {{ request('location') == 'حي الوفاء' ? 'selected' : '' }}>حي الوفاء</option>
                        <option value="حي الميلاد" {{ request('location') == 'حي الميلاد' ? 'selected' : '' }}>حي الميلاد</option>
                        <option value="حي الرسالة" {{ request('location') == 'حي الرسالة' ? 'selected' : '' }}>حي الرسالة</option>
                        <option value="شهداء سيف سعد" {{ request('location') == 'شهداء سيف سعد' ? 'selected' : '' }}>شهداء سيف سعد</option>
                        <option value="السناتر" {{ request('location') == 'السناتر' ? 'selected' : '' }}>السناتر</option>
                    </select>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-12 text-end">
                        <button type="submit" class="btn btn-lg w-100 fw-black shadow-none rounded-pill" style="background-color: var(--primary-navy, #0f172a); color: white; border: none; padding: 15px 0;">
                            <i class="fa-solid fa-magnifying-glass me-2"></i>
                            ابحث
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    
    <div class="row g-4">
        @foreach($doctors as $doctor)
            <div class="col-lg-3 col-md-6 fade-up">
                <div class="doctor-card text-center">
                    <a href="{{ url('/doctor/' . $doctor->id) }}" class="text-decoration-none">
                        <span class="doc-status-badge">متاح الآن</span>
                        <div class="doc-img-container">
                            <img src="{{ $doctor->image }}" alt="{{ $doctor->name }}">
                        </div>
                        <h5 class="doc-name">{{ $doctor->name }}</h5>
                        <span class="doc-spec">{{ $doctor->specialty->name }}</span>

                        <!-- ====== الإضافة الجديدة: التقييم ====== -->
                        <div class="mb-3 d-flex justify-content-center align-items-center gap-1" style="font-size: 0.95rem;">
                            <i class="fa-solid fa-star" style="color: var(--accent-gold);"></i>
                            <span class="fw-bold" style="color: var(--primary-navy);">
                                {{ $doctor->averageRating() > 0 ? $doctor->averageRating() : 'جديد' }}
                            </span>
                            @if($doctor->reviews->count() > 0)
                                <span class="text-muted ms-1" style="font-size: 0.75rem;">({{ $doctor->reviews->count() }} تقييم)</span>
                            @endif
                        </div>
                        <!-- ==================================== -->

                        <div class="doc-detail"><i class="fa-solid fa-location-dot"></i> {{ $doctor->location }}</div>
                        <div class="doc-detail"><i class="fa-solid fa-money-bill-wave"></i> الكشفية: {{ number_format($doctor->consultation_fee) }} د.ع</div>
                        <button class="doc-btn shadow-sm">مشاهدة الملف</button>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>