<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول - دليل عافيتك</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f6f9; font-family: 'Segoe UI', Tahoma, sans-serif; }
        .login-card { border-radius: 15px; border: none; box-shadow: 0 10px 30px rgba(0,0,0,0.08); }
        .btn-primary { background-color: #2a5d9f; border: none; }
        .text-primary-custom { color: #2a5d9f; }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center vh-100">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="text-center mb-4">
                    <img src="https://cdn-icons-png.flaticon.com/512/387/387561.png" alt="شعار" width="80" class="mb-3">
                    <h3 class="fw-bold text-primary-custom">دليل عافيتك الطبي</h3>
                    <p class="text-muted">تسجيل الدخول للوحة الإدارة</p>
                </div>

                <div class="card login-card p-4">
                    <div class="card-body">
                        
                        @if($errors->any())
                            <div class="alert alert-danger text-center fw-bold">
                                {{ $errors->first() }}
                            </div>
                        @endif

                        <form action="{{ url('/login') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label fw-bold text-muted">البريد الإلكتروني (الإيميل)</label>
                                <input type="email" name="email" class="form-control form-control-lg" required value="{{ old('email') }}" dir="ltr">
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold text-muted">كلمة المرور</label>
                                <input type="password" name="password" class="form-control form-control-lg" required dir="ltr">
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg w-100 fw-bold">
                                🔐 دخول للوحة التحكم
                            </button>
                        </form>
                        
                        <div class="text-center mt-3">
                            <a href="{{ url('/') }}" class="text-decoration-none text-muted small">🔙 العودة للصفحة الرئيسية</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>