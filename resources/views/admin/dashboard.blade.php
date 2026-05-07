<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>لوحة التحكم الشاملة | دليل عافيتك</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <style>
        body { background-color: #f8fafc; }
        .admin-tabs .nav-link {
            color: var(--primary-navy);
            font-weight: bold;
            border-radius: 10px;
            padding: 12px 20px;
            transition: 0.3s;
            border: 1px solid transparent;
        }
        .admin-tabs .nav-link.active {
            background-color: var(--primary-navy) !important;
            color: white !important;
            box-shadow: 0 5px 15px rgba(15, 43, 91, 0.2);
        }
        .admin-tabs .nav-link:hover:not(.active) {
            background-color: rgba(15, 43, 91, 0.05);
            border-color: rgba(15, 43, 91, 0.1);
        }
    </style>
</head>
<body>

    <!-- النافبار -->
    <nav class="navbar shadow-sm py-3 mb-4" style="background-color: var(--primary-navy);">
        <div class="container-fluid px-4">
            <a class="navbar-brand fw-bold text-white d-flex align-items-center gap-2" href="#">
                <i class="fa-solid fa-heart-pulse fs-4" style="color: var(--accent-gold);"></i> 
                إدارة الموقع | دليل عافيتك
            </a>
            <a href="{{ url('/') }}" class="btn fw-bold rounded-pill px-4 shadow-sm" style="background-color: var(--accent-gold); color: var(--primary-navy);">
                <i class="fa-solid fa-globe me-1"></i> العودة للموقع
            </a>
        </div>
    </nav>

    <div class="container-fluid px-4">
        
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show fw-bold rounded-4 shadow-sm border-0 d-flex align-items-center" role="alert">
                <i class="fa-solid fa-circle-check fs-5 me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- ====== التبويبات (Tabs) تم إزالة قيود تسجيل الدخول ====== -->
        <ul class="nav nav-pills mb-4 admin-tabs gap-2" id="adminTabs" role="tablist">
            
            <li class="nav-item" role="presentation">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#doctorsTab" type="button" role="tab">
                    <i class="fa-solid fa-user-doctor me-1"></i> إدارة الأطباء
                </button>
            </li>
            
            <li class="nav-item" role="presentation">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#newsTab" type="button" role="tab">
                    <i class="fa-solid fa-newspaper me-1"></i> إدارة الأخبار
                </button>
            </li>

            <!-- السكرتير خليناه بالاخير ومخفي عن الواجهة الرئيسية -->
            <li class="nav-item" role="presentation">
                <button class="nav-link text-muted" data-bs-toggle="tab" data-bs-target="#queueTab" type="button" role="tab">
                    <i class="fa-solid fa-users-viewfinder me-1"></i> السكرتير (مؤجل)
                </button>
            </li>
        </ul>

        <!-- ====== محتوى التبويبات ====== -->
        <div class="tab-content" id="adminTabsContent">
            
            <!-- 1. قسم الأطباء -->
            <div class="tab-pane fade show active" id="doctorsTab" role="tabpanel">
                <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center py-4 border-bottom-0">
                        <h5 class="mb-0 fw-bold" style="color: var(--primary-navy);">
                            <i class="fa-solid fa-list-check me-2" style="color: var(--accent-gold);"></i> قائمة الأطباء ({{ isset($doctors) ? $doctors->count() : 0 }})
                        </h5>
                        <button type="button" class="btn fw-bold px-4 rounded-3 shadow-sm" style="background-color: var(--primary-navy); color: white;" data-bs-toggle="modal" data-bs-target="#addDoctorModal">
                            <i class="fa-solid fa-plus ms-1"></i> إضافة طبيب جديد
                        </button>
                    </div>
                    <div class="card-body p-0 table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead style="background-color: #f8fafc; color: var(--primary-navy);">
                                <tr>
                                    <th class="ps-4">الصورة</th>
                                    <th>اسم الطبيب</th>
                                    <th>التخصص</th>
                                    <th>العنوان</th>
                                    <th class="text-center">إجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($doctors) && $doctors->count() > 0)
                                    @foreach($doctors as $doctor)
                                    <tr>
                                        <td class="ps-4">
                                            <img src="{{ !empty($doctor->image) ? (str_starts_with($doctor->image, 'http') ? $doctor->image : asset('uploads/doctors/' . $doctor->image)) : 'https://cdn-icons-png.flaticon.com/512/3774/3774299.png' }}" class="rounded-circle shadow-sm" width="45" height="45" style="object-fit: cover; border: 2px solid var(--accent-gold);">
                                        </td>
                                        <td class="fw-bold" style="color: var(--primary-navy);">{{ $doctor->name }}</td>
                                        <td><span class="badge" style="background-color: rgba(15, 43, 91, 0.1); color: var(--primary-navy);">{{ $doctor->specialty->name ?? 'غير محدد' }}</span></td>
                                        <td class="text-muted">{{ $doctor->location }}</td>
                                        <td class="text-center">
                                            <form action="{{ url('/admin/doctors/' . $doctor->id) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد من حذف هذا الطبيب؟');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm fw-bold rounded-3"><i class="fa-solid fa-trash"></i> حذف</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr><td colspan="5" class="text-center py-4 text-muted">لا يوجد أطباء مضافين حالياً.</td></tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- 2. قسم الأخبار -->
            <div class="tab-pane fade" id="newsTab" role="tabpanel">
                <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center py-4 border-bottom-0">
                        <h5 class="mb-0 fw-bold" style="color: var(--primary-navy);">
                            <i class="fa-solid fa-newspaper me-2" style="color: var(--accent-gold);"></i> قائمة الأخبار ({{ isset($news) ? $news->count() : 0 }})
                        </h5>
                        <button type="button" class="btn fw-bold px-4 rounded-3 shadow-sm" style="background-color: var(--primary-navy); color: white;" data-bs-toggle="modal" data-bs-target="#addNewsModal">
                            <i class="fa-solid fa-plus ms-1"></i> نشر خبر أو نصيحة
                        </button>
                    </div>
                    <div class="card-body p-0 table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead style="background-color: #f8fafc; color: var(--primary-navy);">
                                <tr>
                                    <th class="ps-4">صورة الخبر</th>
                                    <th>العنوان</th>
                                    <th>التصنيف</th>
                                    <th>التاريخ</th>
                                    <th class="text-center">إجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($news) && $news->count() > 0)
                                    @foreach($news as $article)
                                    <tr>
                                        <td class="ps-4">
                                            <img src="{{ asset('images/logo.png') }}" alt="دليل عافيتك" style="height: 45px; width: auto; object-fit: contain;">
                                        </td>
                                        <td class="fw-bold" style="color: var(--primary-navy);">{{ $article->title }}</td>
                                        <td><span class="badge" style="background-color: var(--accent-gold); color: var(--primary-navy);">{{ $article->category }}</span></td>
                                        <td class="text-muted">{{ $article->created_at->format('Y-m-d') }}</td>
                                        <td class="text-center">
                                            <!-- يمكنك إضافة زر حذف الخبر هنا مستقبلاً -->
                                            <span class="text-muted small">فعال</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr><td colspan="5" class="text-center py-4 text-muted">لا توجد أخبار مضافة حالياً.</td></tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- 3. قسم السكرتير -->
            <div class="tab-pane fade" id="queueTab" role="tabpanel">
                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-body p-5 text-center">
                        <i class="fa-solid fa-pause mb-3" style="font-size: 3rem; color: #cbd5e1;"></i>
                        <h4 class="fw-bold text-muted">قسم السكرتير مؤجل حالياً</h4>
                        <p class="text-muted">نركز الآن على إدارة الموقع الأساسية (الأطباء والأخبار).</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- ============================================== -->
    <!-- ====== نافذة إضافة طبيب جديد (تم إصلاح التخصص) ====== -->
    <!-- ============================================== -->
    <div class="modal fade" id="addDoctorModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 rounded-4 shadow">
                <div class="modal-header border-0" style="background-color: var(--primary-navy);">
                    <h5 class="modal-title fw-bold text-white">
                        <i class="fa-solid fa-user-doctor me-2" style="color: var(--accent-gold);"></i> إضافة طبيب جديد
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                
                <form action="{{ url('/admin/doctors') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body p-4">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">اسم الطبيب</label>
                                <input type="text" name="name" class="form-control border-0 shadow-sm" style="background-color: #f8fafc;" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">الشهادة العلمية</label>
                                <input type="text" name="degree" class="form-control border-0 shadow-sm" style="background-color: #f8fafc;" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <!-- هنا تم التعديل إلى قائمة منسدلة لحل مشكلة الخطأ -->
                                <label class="form-label fw-bold">التخصص الطبي</label>
                                <select name="specialty_id" class="form-control border-0 shadow-sm" style="background-color: #f8fafc;" required>
                                    <option value="" disabled selected>اختر التخصص...</option>
                                    @foreach($specialties as $specialty)
                                        <option value="{{ $specialty->id }}">{{ $specialty->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">سنوات الخبرة</label>
                                <input type="number" name="experience_years" class="form-control border-0 shadow-sm" style="background-color: #f8fafc;" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">الكشفية (دينار)</label>
                                <input type="number" name="consultation_fee" class="form-control border-0 shadow-sm" style="background-color: #f8fafc;" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">العنوان التفصيلي</label>
                                <input type="text" name="location" class="form-control border-0 shadow-sm" style="background-color: #f8fafc;" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">رقم الهاتف</label>
                                <input type="text" name="phone" class="form-control border-0 shadow-sm" style="background-color: #f8fafc;">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">رقم الواتساب</label>
                                <input type="text" name="whatsapp" class="form-control border-0 shadow-sm" style="background-color: #f8fafc;">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">السيرة الذاتية للطبيب</label>
                            <textarea name="bio" class="form-control border-0 shadow-sm" rows="3" style="background-color: #f8fafc;" required></textarea>
                        </div>

                        <div class="mb-2">
                            <label class="form-label fw-bold">صورة الطبيب</label>
                            <input type="file" name="image" class="form-control border-0 shadow-sm" style="background-color: #f8fafc;" accept="image/*">
                        </div>
                    </div>
                    <div class="modal-footer border-0 p-4 pt-0">
                        <button type="button" class="btn btn-light fw-bold px-4 rounded-3 shadow-sm" data-bs-dismiss="modal">إلغاء</button>
                        <button type="submit" class="btn fw-bold px-5 rounded-3 shadow-sm" style="background-color: var(--accent-gold); color: var(--primary-navy);">حفظ الطبيب</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ============================================== -->
    <!-- ====== نافذة إضافة خبر ====== -->
    <!-- ============================================== -->
    <div class="modal fade" id="addNewsModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 rounded-4 shadow">
                <div class="modal-header border-0" style="background-color: var(--primary-navy);">
                    <h5 class="modal-title fw-bold text-white">
                        <i class="fa-solid fa-pen-to-square me-2" style="color: var(--accent-gold);"></i> إضافة خبر أو نصيحة طبية
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                
                <form action="{{ url('/admin/news/store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body p-4">
                        <div class="mb-4">
                            <label class="form-label fw-bold" style="color: var(--primary-navy);">عنوان الخبر</label>
                            <input type="text" name="title" class="form-control form-control-lg border-0 shadow-sm" style="background-color: #f8fafc;" required>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label fw-bold" style="color: var(--primary-navy);">التصنيف</label>
                                <input type="text" name="category" class="form-control border-0 shadow-sm" style="background-color: #f8fafc; height: 48px;" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold" style="color: var(--primary-navy);">صورة الخبر</label>
                                <input type="file" name="image" class="form-control border-0 shadow-sm" style="background-color: #f8fafc; height: 48px;" accept="image/*">
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="form-label fw-bold" style="color: var(--primary-navy);">تفاصيل الخبر</label>
                            <textarea name="content" class="form-control border-0 shadow-sm" rows="5" style="background-color: #f8fafc;" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer border-0 p-4 pt-0">
                        <button type="button" class="btn btn-light fw-bold px-4 rounded-3 shadow-sm" data-bs-dismiss="modal">إلغاء</button>
                        <button type="submit" class="btn fw-bold px-5 rounded-3 shadow-sm" style="background-color: var(--accent-gold); color: var(--primary-navy);">نشر الخبر</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>