<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>دليل عافيتك | {{ $article->title }}</title>
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
    <header class="single-news-header text-center fade-up">
        <div class="container">
            <div class="d-inline-block mb-3">
                <span class="badge rounded-pill fs-6 px-4 py-2" style="background-color: var(--accent-gold); color: var(--primary-navy);">{{ $article->category }}</span>
            </div>
            <h1 class="fw-black display-6" style="color: var(--primary-navy); line-height: 1.5;">{{ $article->title }}</h1>
            <p class="text-muted mt-3 fs-5"><i class="fa-regular fa-calendar me-2"></i> نُشر في: {{ $article->created_at->format('Y-m-d') }}</p>
        </div>
    </header>

    <main class="container mb-5 fade-up" style="transition-delay: 0.2s;">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <img src="{{ $article->image ?? 'https://via.placeholder.com/1200x600' }}" alt="صورة الخبر" class="single-news-img">
                
                <div class="news-content-body mt-5 px-lg-4">
                    <p>{{ $article->content }}</p>
                </div>

                <div class="mt-5 text-center">
                    <a href="{{ url('/news') }}" class="btn btn-outline-secondary rounded-pill px-4 py-2 fw-bold">
                        العودة للأخبار <i class="fa-solid fa-arrow-left ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>