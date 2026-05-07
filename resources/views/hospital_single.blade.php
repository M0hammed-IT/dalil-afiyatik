<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>دليل عافيتك | {{ $hospital['name'] }}</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <!-- ضفت ستايلات الكارد هنا في حال ما كانت كلها موجودة بملف الـ style.css مالتك -->
    <style>
        body { background-color: #f8fafc; overflow-x: hidden; }
        .academic-profile-card {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(15, 43, 91, 0.05);
            position: relative;
            margin-top: 30px;
            border: 1px solid #eef2f7;
        }
        .name-badge {
            position: absolute;
            top: -20px;
            right: 40px;
            background-color: var(--primary-navy);
            color: white;
            padding: 10px 25px;
            border-radius: 50px;
            font-weight: 900;
            font-size: 1.2rem;
            box-shadow: 0 5px 15px rgba(15, 43, 91, 0.2);
        }
        .info-label {
            color: var(--accent-gold);
            font-size: 0.9rem;
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        .info-value {
            color: var(--primary-navy);
            font-weight: bold;
            font-size: 1.1rem;
            margin-bottom: 20px;
        }
        .hospital-avatar {
            width: 100%;
            max-width: 200px;
            height: 200px;
            object-fit: contain;
            border-radius: 20px;
            border: 4px solid var(--accent-gold);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            background-color: #fff;
            padding: 20px;
        }
        .contact-icons { display: flex; justify-content: center; gap: 15px; }
        .contact-btn {
            width: 45px; height: 45px; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            color: white; font-size: 1.2rem; transition: 0.3s;
        }
        .contact-btn.phone { background-color: var(--primary-navy); }
        .contact-btn.location { background-color: var(--accent-gold); color: var(--primary-navy); }
        .contact-btn:hover { transform: translateY(-5px); color: white;}
        .fade-up { animation: fadeUp 0.8s cubic-bezier(0.165, 0.84, 0.44, 1) forwards; }
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

    <!-- ================= القائمة الجانبية (نفس تصميم الطبيب) ================= -->
    <<!-- ================= القائمة الجانبية (سلايد الموبايل) ================= -->
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

    <!-- ================= النافبار (نفس تصميم الطبيب) ================= -->
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
                    <li class="nav-item"><a class="nav-link fw-bold" href="{{ url('/hospitals') }}" style="color: var(--primary-navy); border-bottom: 2px solid var(--accent-gold);">المستشفيات والمراكز</a></li>
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

    <!-- ================= محتوى الصفحة ================= -->
    <div class="container my-5">
        
        <!-- مسار الصفحة (Breadcrumb) -->
        <nav aria-label="breadcrumb" class="fade-up mb-4">
            <ol class="breadcrumb fw-bold">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-decoration-none text-muted">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/hospitals') }}" class="text-decoration-none text-muted">قائمة المستشفيات</a></li>
                <li class="breadcrumb-item active" style="color: var(--primary-navy);" aria-current="page">{{ $hospital['name'] }}</li>
            </ol>
        </nav>

        <!-- كارد المعلومات الأساسية (مطابق لكارد الطبيب) -->
        <div class="academic-profile-card fade-up">
            
            <div class="name-badge">
                <i class="fa-solid fa-hospital me-2"></i> {{ $hospital['name'] }}
            </div>

            <div class="row align-items-center mt-3">
                <div class="col-lg-8 info-grid border-end border-light border-opacity-10">
                    
                    <div class="row text-center text-md-start">
                        <div class="col-md-6">
                            <span class="info-label"><i class="fa-solid fa-building me-1"></i> نوع المؤسسة</span>
                            <div class="info-value">{{ $hospital['type'] }}</div>
                        </div>
                        <div class="col-md-6">
                            <span class="info-label"><i class="fa-solid fa-location-dot me-1"></i> الموقع الجغرافي</span>
                            <div class="info-value">{{ $hospital['location'] }}</div>
                        </div>
                        <div class="col-md-6">
                            <span class="info-label"><i class="fa-solid fa-clock me-1"></i> أوقات الدوام</span>
                            <div class="info-value">{{ $hospital['hours'] }}</div>
                        </div>
                        <div class="col-md-6">
                            <span class="info-label"><i class="fa-solid fa-phone me-1"></i> هاتف الاستعلامات</span>
                            <div class="info-value" dir="ltr">{{ $hospital['phone'] }}</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 text-center mt-4 mt-lg-0">
                    <!-- أيقونة تعويضية عن صورة الطبيب -->
                    <div class="d-inline-flex align-items-center justify-content-center hospital-avatar">
                        <i class="fa-solid fa-truck-medical" style="font-size: 5rem; color: var(--primary-navy);"></i>
                    </div>
                    <div class="contact-icons mt-3">
                        <a href="tel:{{ $hospital['phone'] }}" class="contact-btn phone" title="اتصال مباشر بالاستعلامات">
                            <i class="fa-solid fa-phone"></i>
                        </a>
                        <a href="#" class="contact-btn location" title="عرض الموقع على الخريطة">
                            <i class="fa-solid fa-location-dot"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- ================= الأكورديون (الأقسام والتفاصيل) ================= -->
        <div class="row justify-content-center mt-5 fade-up" style="transition-delay: 0.2s;">
            <div class="col-lg-10">
                <div class="accordion shadow-sm" id="hospitalDetailsAccordion" style="border-radius: 15px; overflow: hidden;">
                    
                    <!-- النبذة -->
                    <div class="accordion-item border-0 border-bottom">
                        <h2 class="accordion-header">
                            <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" style="color: var(--primary-navy); background-color: #f8fafc;">
                                <i class="fa-solid fa-circle-info me-2" style="color: var(--accent-gold);"></i> النبذة التعريفية
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#hospitalDetailsAccordion">
                            <div class="accordion-body text-muted" style="line-height: 1.8;">
                                {{ $hospital['about'] }}
                            </div>
                        </div>
                    </div>

                    <!-- الأقسام المتوفرة -->
                    <div class="accordion-item border-0 border-bottom">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" style="color: var(--primary-navy);">
                                <i class="fa-solid fa-layer-group me-2" style="color: var(--accent-gold);"></i> الأقسام والتخصصات المتاحة
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#hospitalDetailsAccordion">
                            <div class="accordion-body">
                                <div class="d-flex flex-wrap gap-2">
                                    @foreach($hospital['departments'] as $dept)
                                        <span class="badge" style="background-color: rgba(15, 43, 91, 0.05); color: var(--primary-navy); padding: 10px 15px; font-size: 0.95rem; border: 1px solid rgba(15, 43, 91, 0.1);">
                                            <i class="fa-solid fa-check text-success me-1"></i> {{ $dept }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- الأطباء -->
                    <div class="accordion-item border-0">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" style="color: var(--primary-navy);">
                                <i class="fa-solid fa-user-doctor me-2" style="color: var(--accent-gold);"></i> أبرز الكوادر الطبية والاستشاريين
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#hospitalDetailsAccordion">
                            <div class="accordion-body">
                                <ul class="list-group list-group-flush">
                                    @foreach($hospital['doctors'] as $doc)
                                        <li class="list-group-item bg-transparent text-muted border-0 ps-0 mb-2">
                                            <i class="fa-solid fa-stethoscope me-2" style="color: var(--primary-navy);"></i> <span class="fw-bold">{{ $doc }}</span>
                                        </li>
                                    @endforeach
                                </ul>
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