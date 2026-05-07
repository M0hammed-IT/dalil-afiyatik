<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>دليل عافيتك | {{ $doctor->name }}</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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

    <nav class="navbar navbar-expand-lg custom-navbar sticky-top py-3">
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
                    <li class="nav-item"> <a class="nav-link fw-bold text-dark" href="{{ url('/hospitals') }}">المستشفيات والمراكز</a></li>
                    <li class="nav-item"><a class="nav-link fw-bold text-dark" href="{{ url('/forum') }}">منتدى الأطباء</a></li>
                    <li class="nav-item"><a class="nav-link fw-bold text-dark" href="{{ url('/news') }}">الأخبار والنصائح</a></li>
                    <li class="nav-item"><a class="nav-link fw-bold" href="{{ url('/about') }}" style="color: var(--primary-navy); border-bottom: 2px solid var(--accent-gold);">من نحن</a></li>
                    <li class="nav-item ms-3">
                        <a href="{{ url('/admin/dashboard') }}" class="btn search-btn px-4 py-2 rounded-pill shadow-sm"><i class="fa-solid fa-chart-line me-2"></i> لوحة الإدارة</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        
        <nav aria-label="breadcrumb" class="fade-up mb-4">
            <ol class="breadcrumb fw-bold">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-decoration-none text-muted">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/doctors') }}" class="text-decoration-none text-muted">قائمة الأطباء</a></li>
                <li class="breadcrumb-item active" style="color: var(--primary-navy);" aria-current="page">{{ $doctor->name }}</li>
            </ol>
        </nav>

        <div class="academic-profile-card fade-up">
            
            <!-- شارة الاسم رجعت لمكانها الطبيعي بدون تداخل -->
            <div class="name-badge">
                {{ $doctor->name }}
            </div>

            <div class="row align-items-center">
                <div class="col-lg-8 info-grid border-end border-light border-opacity-10">
                    
                    <!-- ====== مؤشر الزخم الذكي (نقلناه هنا داخل الشبكة حتى ياخذ مساحته ويرتب نفسه) ====== -->
                    <div class="mb-4 text-center text-md-start">
                        @if(!$doctor->is_accepting_bookings)
                            <span class="badge bg-danger px-3 py-2 fs-6 rounded-pill shadow-sm"><i class="fa-solid fa-ban me-1"></i> عذراً، العيادة مغلقة أو مكتفية اليوم</span>
                        @elseif(isset($trafficStatus) && $trafficStatus == 'low')
                            <span class="badge bg-success px-3 py-2 fs-6 rounded-pill shadow-sm"><i class="fa-solid fa-circle-check me-1"></i> حالة العيادة الآن: هادئ (متاح فوراً)</span>
                        @elseif(isset($trafficStatus) && $trafficStatus == 'medium')
                            <span class="badge bg-warning text-dark px-3 py-2 fs-6 rounded-pill shadow-sm"><i class="fa-solid fa-users me-1"></i> حالة العيادة الآن: زخم متوسط</span>
                        @elseif(isset($trafficStatus) && $trafficStatus == 'high')
                            <span class="badge bg-danger px-3 py-2 fs-6 rounded-pill shadow-sm"><i class="fa-solid fa-users-slash me-1"></i> حالة العيادة الآن: مزدحم جداً (انتظار طويل)</span>
                        @endif
                    </div>
                    <!-- ============================== -->

                    <div class="row text-center text-md-start">
                        <div class="col-md-6">
                            <span class="info-label"><i class="fa-solid fa-graduation-cap me-1"></i> الشهادة العلمية</span>
                            <div class="info-value">{{ $doctor->degree }}</div>
                        </div>
                        <div class="col-md-6">
                            <span class="info-label"><i class="fa-solid fa-stethoscope me-1"></i> الاختصاص العام والدقيق</span>
                            <div class="info-value">{{ $doctor->specialty->name }}</div>
                        </div>
                        <div class="col-md-6">
                            <span class="info-label"><i class="fa-solid fa-briefcase-medical me-1"></i> سنوات الخدمة والخبرة</span>
                            <div class="info-value">{{ $doctor->experience_years }} سنة في المجال الطبي</div>
                        </div>
                        <div class="col-md-6">
                            <span class="info-label"><i class="fa-solid fa-money-bill-wave me-1"></i> أجور المعاينة (الكشفية)</span>
                            <div class="info-value">{{ number_format($doctor->consultation_fee) }} دينار عراقي</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 doctor-avatar-wrapper">
                    <img src="{{ $doctor->image }}" alt="صورة الطبيب" class="doctor-avatar">
                    <div class="contact-icons mt-3">
                        <a href="https://wa.me/{{ $doctor->whatsapp }}?text=مرحباً، أريد حجز موعد مع {{ $doctor->name }}" target="_blank" class="contact-btn whatsapp" title="حجز عبر واتساب">
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>
                        <a href="tel:{{ $doctor->phone }}" class="contact-btn phone" title="اتصال مباشر">
                            <i class="fa-solid fa-phone"></i>
                        </a>
                        <a href="#" class="contact-btn location" title="موقع العيادة">
                            <i class="fa-solid fa-location-dot"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-5 fade-up" style="transition-delay: 0.2s;">
            <div class="col-lg-10">
                <div class="accordion" id="doctorDetailsAccordion">
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true">
                                <i class="fa-solid fa-file-signature me-2" style="color: var(--accent-gold);"></i> السيرة الذاتية والنبذة التعريفية
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#doctorDetailsAccordion">
                            <div class="accordion-body">
                                {{ $doctor->bio }}
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false">
                                <i class="fa-solid fa-hospital me-2" style="color: var(--accent-gold);"></i> معلومات وعنوان العيادة
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#doctorDetailsAccordion">
                            <div class="accordion-body">
                                <p class="mb-2"><strong style="color: var(--primary-navy);">العنوان التفصيلي:</strong> {{ $doctor->location }}</p>
                                <p class="mb-2"><strong style="color: var(--primary-navy);">أوقات الدوام:</strong> متاح من السبت إلى الخميس (يرجى الحجز المسبق لضمان الموعد).</p>
                                <p class="mb-0"><strong style="color: var(--primary-navy);">التقييم العام للمرضى:</strong> <span class="text-warning"><i class="fa-solid fa-star"></i> {{ $doctor->averageRating() > 0 ? $doctor->averageRating() : 'جديد' }} / 5.0</span> <span class="text-muted ms-1" style="font-size: 0.85rem;">({{ $doctor->reviews->count() }} مراجع)</span></p>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false">
                                <i class="fa-solid fa-calendar-check me-2" style="color: var(--accent-gold);"></i> تعليمات وسياسة الحجز
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#doctorDetailsAccordion">
                            <div class="accordion-body">
                                يرجى التواصل عبر تطبيق واتساب أو الاتصال الهاتفي المباشر باستخدام الأزرار الموجودة أعلى الصفحة لتأكيد الحجز. بعد إتمام الحجز، يمكنك استخدام رقم هاتفك ورقم دورك لتتبع الطابور مباشرة.
                            </div>
                        </div>
                    </div>

                    <!-- ====== أكورديون التتبع المباشر ====== -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button {{ session('track_result') || session('error_track') ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="{{ session('track_result') || session('error_track') ? 'true' : 'false' }}">
                                <i class="fa-solid fa-satellite-dish me-2" style="color: var(--accent-gold);"></i> تتبع دورك المباشر بالعيادة
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse {{ session('track_result') || session('error_track') ? 'show' : '' }}" data-bs-parent="#doctorDetailsAccordion">
                            <div class="accordion-body">
                                
                                @if(session('error_track'))
                                    <div class="alert alert-danger rounded-3 fw-bold mb-4">
                                        <i class="fa-solid fa-triangle-exclamation me-2"></i> {{ session('error_track') }}
                                    </div>
                                @endif

                                <p class="text-muted mb-4" style="line-height: 1.8;">
                                    للحفاظ على الخصوصية، يرجى إدخال <strong>رقم الهاتف</strong> الذي حجزت به مع السكرتير، بالإضافة إلى <strong>رقم الطابور</strong> الخاص بك لمعرفة المتبقين أمامك.
                                </p>

                                <form action="{{ route('queue.track') }}" method="POST" class="row g-3">
                                    @csrf
                                    <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                                    
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <span class="input-group-text border-0 text-muted" style="background-color: #f8fafc;"><i class="fa-solid fa-phone"></i></span>
                                            <input type="text" name="patient_phone" class="form-control border-0 shadow-sm" placeholder="رقم الهاتف (مثال: 078...)" required style="background-color: #f8fafc;">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-text border-0 text-muted" style="background-color: #f8fafc;"><i class="fa-solid fa-ticket"></i></span>
                                            <input type="number" name="queue_number" class="form-control border-0 shadow-sm" placeholder="رقم الطابور (مثال: 15)" required style="background-color: #f8fafc;">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <button type="submit" class="btn w-100 fw-bold shadow-sm rounded-3 h-100" style="background-color: var(--accent-gold); color: var(--primary-navy);">
                                            تتبع <i class="fa-solid fa-magnifying-glass ms-1"></i>
                                        </button>
                                    </div>
                                </form>

                                @if(session('track_result'))
                                    <hr class="my-4 text-muted opacity-25">
                                    
                                    @if(session('track_result')['status'] == 'turn_now')
                                        <div class="alert alert-success border-0 shadow-sm rounded-4 text-center py-3">
                                            <i class="fa-solid fa-bell-concierge fs-2 mb-2 text-success"></i>
                                            <h5 class="fw-bold text-success mb-0">{{ session('track_result')['message'] }}</h5>
                                        </div>
                                    @else
                                        <div class="row text-center g-3 mt-2">
                                            <div class="col-md-4">
                                                <div class="p-3 rounded-4" style="background-color: #f8fafc; border: 1px solid #eef2f7;">
                                                    <div class="text-muted fw-bold mb-2">رقمك بالطابور</div>
                                                    <div class="fs-3 fw-black" style="color: var(--primary-navy);">{{ session('track_result')['my_number'] }}</div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="p-3 rounded-4" style="background-color: #fffbeb; border: 1px solid #fef3c7;">
                                                    <div class="text-warning fw-bold mb-2">الرقم الحالي</div>
                                                    <div class="fs-3 fw-black text-warning">{{ session('track_result')['current_number'] }}</div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="p-3 rounded-4 shadow-sm" style="background-color: var(--primary-navy); color: white;">
                                                    <div class="fw-bold mb-2 opacity-75">المتبقين قبلك</div>
                                                    <div class="fs-3 fw-black text-white">{{ session('track_result')['people_ahead'] }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ====== قسم تعليقات المرضى ====== -->
        <div class="row justify-content-center mt-5 fade-up" style="transition-delay: 0.3s;">
            <div class="col-lg-10">
                <h3 class="fw-black mb-4" style="color: var(--primary-navy);">
                    <i class="fa-solid fa-comments me-2" style="color: var(--accent-gold);"></i> آراء وتجارب المراجعين
                </h3>
                
                <div class="card shadow-sm border-0 rounded-4 p-4 mb-5" style="background-color: #f8fafc; border: 1px solid #eef2f7 !important;">
                    <h5 class="fw-bold mb-3" style="color: var(--primary-navy);">
                        <i class="fa-solid fa-pen-to-square me-2" style="color: var(--accent-gold);"></i> أضف تقييمك للطبيب
                    </h5>
                    
                    @if(session('success'))
                        <div class="alert alert-success rounded-3 fw-bold">
                            <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('review.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                        
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label fw-bold text-muted">التقييم العام</label>
                                <select name="rating" class="form-select border-0 shadow-sm" style="height: 50px;" required>
                                    <option value="" disabled selected>اختر التقييم...</option>
                                    <option value="5">⭐⭐⭐⭐⭐ - ممتاز جداً</option>
                                    <option value="4">⭐⭐⭐⭐ - جيد جداً</option>
                                    <option value="3">⭐⭐⭐ - جيد</option>
                                    <option value="2">⭐⭐ - مقبول</option>
                                    <option value="1">⭐ - سيء</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label fw-bold text-muted">اسمك (اختياري)</label>
                                    <input type="text" name="guest_name" class="form-control border-0 shadow-sm" style="background-color: #f8fafc;" placeholder="كيف تحب أن نناديك؟">
                            </div>
                            <div class="col-md-8">
                                <label class="form-label fw-bold text-muted">تجربتك (اختياري)</label>
                                <textarea name="comment" class="form-control border-0 shadow-sm" rows="1" style="min-height: 50px;" placeholder="اكتب رأيك بالطبيب والعيادة هنا..."></textarea>
                            </div>
                            <div class="col-12 text-end mt-3">
                                <button type="submit" class="btn px-4 py-2 fw-bold shadow-sm rounded-pill" style="background-color: var(--primary-navy); color: white;">
                                    نشر التقييم <i class="fa-solid fa-paper-plane ms-1"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                
                @if($doctor->reviews->count() > 0)
                    <div class="row g-4">
                        @foreach($doctor->reviews as $review)
                            <div class="col-md-6">
                                <div class="p-4 bg-white rounded-4 shadow-sm" style="border: 1px solid #eef2f7;">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div class="fw-bold" style="color: var(--primary-navy);">
                                            <i class="fa-solid fa-user-circle fs-4 me-2 text-muted align-middle"></i> 
                                            {{ $review->guest_name ?? ($review->user->name ?? 'زائر') }}
                                        </div>
                                        <div class="text-warning">
                                            @for($i = 1; $i <= 5; $i++)
                                                @if($i <= $review->rating)
                                                    <i class="fa-solid fa-star"></i>
                                                @else
                                                    <i class="fa-regular fa-star"></i>
                                                @endif
                                            @endfor
                                        </div>
                                    </div>
                                    <p class="text-muted mb-0" style="line-height: 1.8;">
                                        {{ $review->comment ?? 'قام المراجع بتقييم الطبيب بدون كتابة تعليق.' }}
                                    </p>
                                    <div class="text-end mt-2">
                                        <small class="text-muted" style="font-size: 0.8rem;">
                                            {{ $review->created_at->diffForHumans() }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-light text-center py-5 rounded-4 shadow-sm" style="border: 1px dashed #cbd5e1;">
                        <i class="fa-regular fa-comment-dots fs-1 text-muted mb-3"></i>
                        <h5 class="text-muted">لا توجد تقييمات لهذا الطبيب حتى الآن.</h5>
                    </div>
                @endif
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>