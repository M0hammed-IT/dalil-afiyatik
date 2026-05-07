<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>دليل عافيتك | منتدى الأطباء</title>
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

        .forum-card {
            background: white;
            border-radius: 20px;
            border: 1px solid #eef2f7;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 5px 15px rgba(15, 43, 91, 0.05);
            transition: 0.3s;
        }
        .forum-card:hover { border-color: var(--accent-gold); }
        
        .doctor-reply {
            background-color: #f8fafc;
            border-right: 4px solid var(--accent-gold);
            border-radius: 12px;
            padding: 20px;
            margin-top: 15px;
        }

        .ask-section {
            background-color: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 15px 30px rgba(15, 43, 91, 0.08);
            border: 1px solid #eef2f7;
        }

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

<!-- ================= القائمة الجانبية ================= -->
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
            <li class="mb-4"><a href="{{ url('/forum') }}" class="text-decoration-none d-block" style="color: var(--primary-navy);"><i class="fa-solid fa-comments ms-3 w-25" style="color: var(--accent-gold);"></i> منتدى الأطباء</a></li>
            <li class="mb-4"><a href="{{ url('/news') }}" class="text-decoration-none d-block"><i class="fa-solid fa-newspaper ms-3 text-muted w-25"></i> الأخبار والنصائح</a></li>
            
            <li class="mb-4"><a href="{{ url('/about') }}" class="text-decoration-none d-block"><i class="fa-solid fa-circle-info ms-3 text-muted w-25"></i> من نحن</a></li>
        </ul>
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
                <li class="nav-item"><a class="nav-link fw-bold" href="{{ url('/forum') }}" style="color: var(--primary-navy); border-bottom: 2px solid var(--accent-gold);">منتدى الأطباء</a></li>
                <li class="nav-item"><a class="nav-link fw-bold text-dark" href="{{ url('/news') }}">الأخبار والنصائح</a></li>
                <li class="nav-item"><a class="nav-link fw-bold text-dark" href="{{ url('/about') }}">من نحن</a></li>
                <li class="nav-item ms-3"><a href="{{ url('/admin/dashboard') }}" class="btn search-btn px-4 py-2 rounded-pill shadow-sm" style="background-color: var(--primary-navy); color: white;"><i class="fa-solid fa-chart-line me-2"></i> لوحة الإدارة</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- ================= الهيدر الأزرق الموحد ================= -->
<div class="page-hero animate-fade-up">
    <div class="container text-center">
        <h1 class="fw-black mb-3" style="font-size: 2.5rem;">
            <i class="fa-solid fa-user-doctor me-2" style="color: var(--accent-gold);"></i> منتدى الأطباء (استشارات مجانية)
        </h1>
        <p class="fs-5 opacity-75 mb-0" style="max-width: 800px; margin: auto;">
            مرحباً بك في المنتدى الطبي الأول في كربلاء. يمكنك هنا طرح استفسارك الطبي بحرية وبدون الحاجة لتسجيل حساب. سيقوم أحد أطبائنا المعتمدين بالرد عليك ونشر الإجابة لتعم الفائدة للجميع.
        </p>
    </div>
</div>

<div class="container mb-5">
    <div class="row justify-content-center g-5">
        
        <!-- العمود الأيمن: الأسئلة المجاب عليها -->
        <div class="col-lg-7 animate-fade-up" style="animation-delay: 0.1s;">
            <h3 class="fw-bold mb-4" style="color: var(--primary-navy);">
                <i class="fa-regular fa-comments me-2 text-muted"></i> أحدث الاستشارات المجاب عليها
            </h3>

            <div class="forum-card">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="fw-bold fs-5"><i class="fa-solid fa-circle-user text-muted me-2"></i> زائر (أبو حيدر)</div>
                    <span class="badge bg-light text-muted border">قبل يومين</span>
                </div>
                <p class="fw-bold" style="color: var(--primary-navy); font-size: 1.1rem;">
                    "أعاني من ألم مستمر أسفل الظهر عند الوقوف لفترات طويلة، هل يحتاج الأمر لزيارة طبيب كسور أم باطنية؟"
                </p>
                
                <div class="doctor-reply">
                    <div class="d-flex align-items-center mb-2">
                        <i class="fa-solid fa-user-doctor fs-4 me-2" style="color: var(--primary-navy);"></i>
                        <span class="fw-bold" style="color: var(--primary-navy);">إجابة د. حسين الخفاجي (جراحة عامة):</span>
                    </div>
                    <p class="text-muted mb-0" style="line-height: 1.6;">
                        أهلاً بك أخي الكريم. آلام أسفل الظهر عند الوقوف غالباً ما تكون متعلقة بالعمود الفقري أو الشد العضلي. يُفضل مراجعة طبيب اختصاص (عظام وكسور) أو (مفاصل) لإجراء فحص سريري وممكن أشعة للتشخيص الدقيق. نتمنى لك السلامة.
                    </p>
                </div>
            </div>

            <div class="forum-card">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="fw-bold fs-5"><i class="fa-solid fa-circle-user text-muted me-2"></i> أم فاطمة</div>
                    <span class="badge bg-light text-muted border">قبل أسبوع</span>
                </div>
                <p class="fw-bold" style="color: var(--primary-navy); font-size: 1.1rem;">
                    "بنتي عمرها سنتين وحرارتها ترتفع بالليل فقط، شنو أفضل خافض حرارة آمن؟"
                </p>
                
                <div class="doctor-reply">
                    <div class="d-flex align-items-center mb-2">
                        <i class="fa-solid fa-user-doctor fs-4 me-2" style="color: var(--primary-navy);"></i>
                        <span class="fw-bold" style="color: var(--primary-navy);">إجابة د. زينب الموسوي (طب أطفال):</span>
                    </div>
                    <p class="text-muted mb-0" style="line-height: 1.6;">
                        مرحباً أم فاطمة. أفضل خافض حرارة آمن لهذا العمر هو (الباراسيتامول) بالجرعة المناسبة لوزنها. يمنع إعطاء الإيبوبروفين إذا كانت تعاني من جفاف. إذا استمرت الحرارة لأكثر من 3 أيام يجب مراجعة العيادة لفحصها.
                    </p>
                </div>
            </div>
        </div>

        <!-- العمود الأيسر: فورم طرح السؤال -->
        <div class="col-lg-5 animate-fade-up" style="animation-delay: 0.2s;">
            <div class="ask-section sticky-top" style="top: 100px;">
                <h4 class="fw-black mb-2" style="color: var(--primary-navy);">
                    <i class="fa-solid fa-pen-to-square me-2" style="color: var(--accent-gold);"></i> اطرح استفسارك مجاناً
                </h4>
                <p class="text-muted small mb-4">لا تحتاج لتسجيل حساب! اكتب اسمك وسؤالك وسنراجع الاستفسار قريباً.</p>

                <!-- رسالة النجاح تظهر هنا بعد إرسال الفورم -->
                @if(session('success'))
                    <div class="alert alert-success fw-bold rounded-3">
                        <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('forum.submit') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold text-muted">الاسم أو لقبك (اختياري)</label>
                        <input type="text" name="guest_name" class="form-control border-0 shadow-sm" style="background-color: #f8fafc; padding: 12px;" placeholder="مثال: زائر، أم علي، محمد...">
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold text-muted">اكتب استفسارك الطبي بوضوح</label>
                        <textarea name="question" required class="form-control border-0 shadow-sm" rows="5" style="background-color: #f8fafc; padding: 12px; resize: none;" placeholder="اكتب الأعراض أو السؤال هنا..."></textarea>
                    </div>
                    <button type="submit" class="btn w-100 fw-bold py-3 rounded-pill shadow-sm" style="background-color: var(--primary-navy); color: white; font-size: 1.1rem;">
                        إرسال الاستفسار <i class="fa-solid fa-paper-plane ms-2"></i>
                    </button>
                    <div class="text-center mt-3">
                        <small class="text-muted"><i class="fa-solid fa-shield-halved me-1"></i> يتم مراجعة الأسئلة قبل نشرها للحفاظ على جودة المنتدى.</small>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>