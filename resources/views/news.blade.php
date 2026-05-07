<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>دليل عافيتك | الأخبار والنصائح الطبية</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <style>
        body { background-color: #f8fafc; overflow-x: hidden; }
        
        /* الهيدر الأزرق الموحد */
        .page-hero {
            background-color: var(--primary-navy);
            color: white;
            padding: 70px 20px;
            border-radius: 0 0 50px 50px;
            margin-bottom: 50px;
            text-align: center;
            box-shadow: 0 15px 30px rgba(15, 43, 91, 0.1);
        }

        /* كارد الأخبار */
        .news-card {
            background: white;
            border-radius: 20px;
            border: 1px solid #eef2f7;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        .news-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(15, 43, 91, 0.12);
            border-color: var(--accent-gold);
        }
        .news-img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            border-bottom: 3px solid var(--accent-gold);
        }
        .news-content {
            padding: 25px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }
        .news-date {
            font-size: 0.85rem;
            color: var(--accent-gold);
            font-weight: bold;
            margin-bottom: 10px;
            display: inline-block;
        }
        .news-title {
            font-size: 1.3rem;
            font-weight: 900;
            color: var(--primary-navy);
            margin-bottom: 15px;
            line-height: 1.5;
        }
        .read-more-btn {
            border: 2px solid var(--primary-navy);
            color: var(--primary-navy);
            font-weight: bold;
            transition: 0.3s;
        }
        .read-more-btn:hover {
            background-color: var(--primary-navy);
            color: white;
        }

        /* حركات الدخول */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-up {
            opacity: 0;
            animation: fadeUp 0.8s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
        }
    </style>
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
            <li class="mb-4"><a href="{{ url('/doctors') }}" class="text-decoration-none d-block"><i class="fa-solid fa-user-doctor ms-3 text-muted w-25"></i> دليل الأطباء</a></li>
            {{-- <li class="mb-4"><a href="{{ url('/specialties') }}" class="text-decoration-none d-block"><i class="fa-solid fa-stethoscope ms-3 text-muted w-25"></i> التخصصات الطبية</a></li> --}}
            <li class="mb-4"><a href="{{ url('/hospitals') }}" class="text-decoration-none d-block"><i class="fa-solid fa-hospital ms-3 text-muted w-25"></i> المستشفيات والمراكز</a></li>
            <li class="mb-4"><a href="{{ url('/forum') }}" class="text-decoration-none d-block"><i class="fa-solid fa-comments ms-3 text-muted w-25"></i> منتدى الأطباء</a></li>
            <li class="mb-4"><a href="{{ url('/news') }}" class="text-decoration-none d-block" style="color: var(--primary-navy);"><i class="fa-solid fa-newspaper ms-3 w-25" style="color: var(--accent-gold);"></i> الأخبار والنصائح</a></li>
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
                <li class="nav-item"><a class="nav-link fw-bold text-dark" href="{{ url('/doctors') }}">الأطباء</a></li>
                {{-- <li class="nav-item"><a class="nav-link fw-bold text-dark" href="{{ url('/specialties') }}">التخصصات</a></li> --}}
                <li class="nav-item"><a class="nav-link fw-bold text-dark" href="{{ url('/hospitals') }}">المستشفيات والمراكز</a></li>
                <li class="nav-item"><a class="nav-link fw-bold text-dark" href="{{ url('/forum') }}">منتدى الأطباء</a></li>
                <li class="nav-item"><a class="nav-link fw-bold" href="{{ url('/news') }}" style="color: var(--primary-navy); border-bottom: 2px solid var(--accent-gold);">الأخبار والنصائح</a></li>
                <li class="nav-item"><a class="nav-link fw-bold text-dark" href="{{ url('/about') }}">من نحن</a></li>
                <li class="nav-item ms-3">
                    <a href="{{ url('/admin/dashboard') }}" class="btn search-btn px-4 py-2 rounded-pill shadow-sm" style="background-color: var(--primary-navy); color: white;"><i class="fa-solid fa-chart-line me-2"></i> لوحة الإدارة</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- ================= الهيدر الأزرق الموحد ================= -->
<div class="page-hero animate-fade-up">
    <div class="container text-center">
        <h1 class="fw-black mb-3" style="font-size: 2.5rem;">
            <i class="fa-solid fa-newspaper me-2" style="color: var(--accent-gold);"></i> آخر الأخبار والنصائح الطبية
        </h1>
        <p class="fs-5 opacity-75 mb-0">تابع أحدث التطورات الصحية، واقرأ أهم النصائح للحفاظ على صحتك وصحة عائلتك.</p>
    </div>
</div>

<!-- ================= محتوى الأخبار ================= -->
<section class="mb-5">
    <div class="container">
        <div class="row g-4">
            @forelse($news as $item)
            <div class="col-lg-4 col-md-6 animate-fade-up" style="animation-delay: {{ $loop->index * 0.1 }}s;">
                <div class="news-card shadow-sm">
                    <!-- إذا كان هناك صورة للخبر يتم عرضها، وإذا لا توجد يتم عرض صورة افتراضية -->
                    <<img src="{{ $item->image ?? 'https://via.placeholder.com/400x200?text=دليل+عافيتك' }}" class="news-img" alt="{{ $item->title }}">
                    <div class="news-content">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="news-date"><i class="fa-solid fa-calendar-day me-1"></i> {{ $item->created_at->format('Y-m-d') }}</span>
                            <!-- شارة التصنيف (خبر أو نصيحة) -->
                            <span class="badge" style="background-color: rgba(15, 43, 91, 0.1); color: var(--primary-navy);">{{ $item->category ?? 'أخبار طبية' }}</span>
                        </div>
                        
                        <h3 class="news-title">{{ $item->title }}</h3>
                        <p class="text-muted small mb-4" style="line-height: 1.6;">{{ Str::limit($item->content, 120) }}</p>
                        
                        <!-- زر القراءة (يتم دفعه للأسفل تلقائياً) -->
                        <div class="mt-auto text-end">
                            <a href="{{ url('/news/' . $item->id) }}" class="btn read-more-btn rounded-pill px-4 py-2">
                                اقرأ المزيد <i class="fa-solid fa-arrow-left ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5 animate-fade-up">
                <div class="p-5 bg-white rounded-4 shadow-sm" style="border: 1px dashed #cbd5e1;">
                    <i class="fa-regular fa-newspaper fs-1 text-muted mb-3"></i>
                    <h4 class="text-muted fw-bold">لا توجد أخبار أو نصائح منشورة حالياً.</h4>
                    <p class="text-muted">ترقبوا أحدث المنشورات قريباً.</p>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>