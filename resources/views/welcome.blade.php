<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>دليل عافيتك | الدليل الطبي الشامل</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
            <li class="mb-4"><a href="{{ url('/') }}" class="text-decoration-none d-block" style="color: var(--primary-navy);"><i class="fa-solid fa-house ms-3 w-25" style="color: var(--accent-gold);"></i> الرئيسية</a></li>
            <li class="mb-4"><a href="{{ url('/doctors') }}" class="text-decoration-none d-block"><i class="fa-solid fa-user-doctor ms-3 text-muted w-25"></i> دليل الأطباء</a></li>
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
                <li class="nav-item"><a class="nav-link fw-bold" href="{{ url('/') }}" style="color: var(--primary-navy); border-bottom: 2px solid var(--accent-gold);">الرئيسية</a></li>
                <li class="nav-item"><a class="nav-link fw-bold text-dark" href="{{ url('/doctors') }}">الأطباء</a></li>
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

    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0 fade-up">
                    <span class="badge px-3 py-2 rounded-pill mb-3 fw-bold fs-6" style="background-color: var(--primary-navy); color: white;">بوابتك للرعاية الصحية في كربلاء</span>
                    <h1 class="hero-title mb-4">اكتشف أفضل الأطباء<br><span style="color: var(--accent-gold);">بكل ثقة وسهولة</span></h1>
                    <p class="hero-subtitle mb-5">
                        نوفر لك وصولاً سريعاً لأمهر الأطباء والعيادات. ابحث، قارن، واعثر على الرعاية الطبية التي تستحقها أنت وعائلتك.
                    </p>
                    <div class="d-flex gap-3">
                        <a href="{{ url('/doctors') }}" class="btn search-btn px-4 py-3"><i class="fa-solid fa-magnifying-glass me-2"></i> تصفح الدليل</a>
                    </div>
                </div>
                <div class="col-lg-6 text-center fade-up" style="transition-delay: 0.2s;">
                    <img src="{{ asset('images/doctor.png') }}" alt="طبيب" class="img-fluid floating-element" style="max-width: 65%;">
                </div>
            </div>
        </div>
    </section>

<div class="container my-5">
    <div class="glass-search fade-up p-3 shadow-sm rounded-pill" style="transition-delay: 0.3s; background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(15px); border: 1px solid rgba(255, 255, 255, 0.3);">
        
        <form action="{{ url('/doctors') }}" method="GET" class="row g-3 align-items-center w-100 m-0">
            
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
                        <option value="">كل التخصصات</option>
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

    <!-- ================= قسم دعوة للاستشارة (CTA) ================= -->
<section class="py-5 my-5 animate-fade-up">
    <div class="container">
        <div class="row align-items-center rounded-5 overflow-hidden shadow-lg mx-1" style="background: linear-gradient(135deg, var(--primary-navy) 0%, #1a417a 100%);">
            <div class="col-lg-7 p-5 text-white">
                <h2 class="fw-black mb-3" style="font-size: 2.2rem;">هل لديك استفسار طبي عاجل؟ 🩺</h2>
                <p class="fs-5 opacity-75 mb-4">
                    لا تقلق، أطباؤنا هنا للإجابة على كافة تساؤلاتك مجاناً. اطرح سؤالك الآن في المنتدى الطبي واحصل على نصيحة موثوقة من اختصاصيين معتمدين في كربلاء.
                </p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ url('/forum') }}" class="btn btn-warning btn-lg fw-bold px-5 rounded-pill shadow" style="background-color: var(--accent-gold); border: none; color: var(--primary-navy);">
                        اسأل طبيبك الآن <i class="fa-solid fa-comments ms-2"></i>
                    </a>
                    <a href="{{ url('/news') }}" class="btn btn-outline-light btn-lg fw-bold px-4 rounded-pill">
                        تصفح النصائح الطبية
                    </a>
                </div>
            </div>
            <div class="col-lg-5 d-none d-lg-flex justify-content-center align-items-center p-0" style="background: rgba(255,255,255,0.05);">
                <div class="text-center py-5">
                    <i class="fa-solid fa-hand-holding-medical" style="font-size: 10rem; color: rgba(255,215,0,0.2);"></i>
                </div>
            </div>
        </div>
    </div>
</section>

    <section class="specialties-section py-5 mb-5 border-top border-light mt-4">
        <div class="container">
            <div class="text-center mb-5 fade-up">
                <h2 class="fw-bold" style="color: var(--primary-navy);">التخصصات الطبية الأكثر بحثاً</h2>
            </div>
            
            <div class="row g-4 justify-content-center">
                @foreach($specialties as $specialty)
                <div class="col-lg-4 col-md-6 fade-up" style="transition-delay: {{ $loop->index * 0.1 }}s;">
                    <a href="{{ url('/doctors?specialty_id=' . $specialty->id) }}" class="text-decoration-none">
                        <div class="spec-grid-card shadow-sm">
                            <div class="spec-icon-wrap">
                                <i class="fa-solid {{ $specialty->icon }}"></i>
                            </div>
                            <h3 class="spec-title" style="color: var(--primary-navy);">{{ $specialty->name }}</h3>
                            <div class="mb-3">
                                <span class="spec-count">{{ $specialty->doctors_count ?? $specialty->doctors->count() }} طبيب متوفر</span>
                            </div>
                            <p class="text-muted small mb-0">عرض الأطباء <i class="fa-solid fa-chevron-left ms-1"></i></p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
  {{-- __________________________عافيه_____________________________________   --}}
<!-- ================= فقاعة المساعد الذكي "عافية" المعدلة ================= -->
<style>
    /* تنسيقات مخصصة حتى ما يطوب شي بشي */
    .chatbot-widget {
        position: fixed;
        bottom: 20px;
        left: 20px; /* خليناها ع اليسار حتى ما تغطي ع المحتوى */
        z-index: 9999;
    }
    .chatbot-window {
        position: fixed;
        bottom: 90px;
        left: 20px;
        width: 350px;
        height: 500px;
        z-index: 9999;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        display: flex;
        flex-direction: column;
        background: white;
        overflow: hidden;
        border: 1px solid var(--primary-navy);
    }
    .chat-body-scroll {
        flex: 1;
        overflow-y: auto;
        padding: 15px;
        background-color: #f8fafc;
    }
    .msg-bubble {
        max-width: 85%;
        padding: 12px 16px;
        border-radius: 15px;
        font-size: 0.9rem;
        word-wrap: break-word; /* حتى الكلام الطويل ما يطلع برا */
        margin-bottom: 15px;
    }
    .msg-user {
        background-color: var(--primary-navy);
        color: white;
        border-bottom-right-radius: 2px;
        margin-right: auto; /* محاذاة لليمين */
    }
    .msg-bot {
        background-color: white;
        color: var(--primary-navy);
        border: 1px solid #e2e8f0;
        border-bottom-left-radius: 2px;
        margin-left: auto; /* محاذاة لليسار */
    }
</style>

<!-- زر الدخول -->
<button id="chat-toggle-btn" class="btn chatbot-widget rounded-circle d-flex justify-content-center align-items-center" style="width: 60px; height: 60px; background-color: var(--primary-navy); color: white; border: 2px solid var(--accent-gold);">
    <i class="fa-solid fa-robot fs-3"></i>
</button>

<!-- نافذة المحادثة -->
<div id="chat-window" class="chatbot-window d-none">
    <div class="p-3 text-white d-flex justify-content-between align-items-center" style="background-color: var(--primary-navy);">
        <span class="fw-bold"><i class="fa-solid fa-robot text-warning me-2"></i> عافية - المساعد الذكي</span>
        <button id="chat-close-btn" class="btn-close btn-close-white"></button>
    </div>
    
    <div id="chat-body" class="chat-body-scroll">
        <div class="d-flex w-100">
            <div class="msg-bubble msg-bot shadow-sm">
                أهلاً بيك في <b>دليل عافيتك</b>! 💙<br>أني المساعد الذكي 'عافية'. تفضل، شلون أكدر أساعدك اليوم؟
            </div>
        </div>
    </div>
    
    <div class="p-3 bg-white border-top">
        <div class="input-group">
            <input type="text" id="chat-input" class="form-control shadow-none border-secondary" placeholder="اكتب سؤالك..." autocomplete="off">
            <button id="chat-send-btn" class="btn text-white px-3" style="background-color: var(--accent-gold);"><i class="fa-solid fa-paper-plane text-dark"></i></button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const chatToggleBtn = document.getElementById('chat-toggle-btn');
        const chatCloseBtn = document.getElementById('chat-close-btn');
        const chatWindow = document.getElementById('chat-window');
        const chatInput = document.getElementById('chat-input');
        const chatSendBtn = document.getElementById('chat-send-btn');
        const chatBody = document.getElementById('chat-body');

        chatToggleBtn.addEventListener('click', () => {
            chatWindow.classList.toggle('d-none');
            if(!chatWindow.classList.contains('d-none')) chatInput.focus();
        });
        chatCloseBtn.addEventListener('click', () => chatWindow.classList.add('d-none'));

        function appendMessage(msg, sender) {
            const div = document.createElement('div');
            div.className = 'd-flex w-100';
            const bubble = document.createElement('div');
            bubble.className = `msg-bubble shadow-sm ${sender === 'user' ? 'msg-user' : 'msg-bot'}`;
            bubble.innerHTML = msg;
            div.appendChild(bubble);
            chatBody.appendChild(div);
            chatBody.scrollTop = chatBody.scrollHeight;
        }

        async function sendMessage() {
            const text = chatInput.value.trim();
            if (!text) return;

            appendMessage(text, 'user');
            chatInput.value = '';

            const typingId = 'typing-' + Date.now();
            const typingDiv = document.createElement('div');
            typingDiv.className = 'd-flex w-100';
            typingDiv.id = typingId;
            typingDiv.innerHTML = `<div class="msg-bubble msg-bot text-muted" style="font-size:0.8rem;">عافية تفكر... 🤖</div>`;
            chatBody.appendChild(typingDiv);
            chatBody.scrollTop = chatBody.scrollHeight;

            try {
                // جلب الـ CSRF Token من الهيدر
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                
                const response = await fetch('/chatbot/respond', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({ message: text })
                });

                document.getElementById(typingId).remove();

                if(response.ok) {
                    const data = await response.json();
                    appendMessage(data.reply, 'bot');
                } else {
                    appendMessage('صار خطأ بالسيرفر (تأكد من الكنترولر).', 'bot');
                }
            } catch (error) {
                document.getElementById(typingId).remove();
                appendMessage('فشل الاتصال، تأكد من وجود ملفات المشروع بشكل صحيح.', 'bot');
                console.error(error);
            }
        }

        chatSendBtn.addEventListener('click', sendMessage);
        chatInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') sendMessage();
        });
    });
</script>
     {{-- --------------------------- --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>