document.addEventListener("DOMContentLoaded", function() {
    
    // ==========================================
    // 1. تأثير الظهور التدريجي عند النزول بالصفحة (Fade Up)
    // ==========================================
    const fadeElements = document.querySelectorAll('.fade-up');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, { threshold: 0.1 });

    fadeElements.forEach(el => observer.observe(el));

    // ==========================================
    // 2. تأثير العداد الذكي للإحصائيات
    // ==========================================
    const counters = document.querySelectorAll('.stat-number');
    const speed = 200; // سرعة العداد

    counters.forEach(counter => {
        const updateCount = () => {
            const target = +counter.getAttribute('data-target');
            const count = +counter.innerText;
            const inc = target / speed;

            if (count < target) {
                counter.innerText = Math.ceil(count + inc);
                setTimeout(updateCount, 10);
            } else {
                counter.innerText = target + '+';
            }
        };

        // تشغيل العداد فقط عندما يظهر على الشاشة
        const counterObserver = new IntersectionObserver((entries) => {
            if(entries[0].isIntersecting) {
                updateCount();
                counterObserver.disconnect();
            }
        });
        counterObserver.observe(counter);
    });

    // ==========================================
    // 3. نظام البحث الفوري الذكي (Live Search)
    // ==========================================
    const searchInput = document.getElementById('live-search-input');
    const resultsBox = document.getElementById('search-results-box');
    const resultsList = document.getElementById('results-list');

    if (searchInput) {
        searchInput.addEventListener('input', function () {
            let query = this.value.trim();

            if (query.length > 1) { // نبدأ البحث إذا كتب حرفين أو أكثر
                fetch(`/search-doctors?q=${query}`)
                    .then(response => response.json())
                    .then(data => {
                        resultsList.innerHTML = ''; // تنظيف النتائج القديمة
                        
                        if (data.length > 0) {
                            data.forEach(doctor => {
                                
                                // === الكود الجديد لمعالجة الصور وتأمينها ===
                                let doctorImage = '';
                                if (doctor.image) {
                                    if (doctor.image.startsWith('http')) {
                                        doctorImage = doctor.image; // رابط خارجي
                                    } else {
                                        doctorImage = `/storage/${doctor.image}`; // مسار داخلي
                                    }
                                } else {
                                    doctorImage = '/images/default-doctor.png'; // صورة افتراضية
                                }
                                
                                // تصميم كل نتيجة تطلع بالقائمة (مع onerror للحماية)
                                let item = `
                                    <a href="/doctors/${doctor.id}" class="list-group-item list-group-item-action d-flex align-items-center p-3 border-bottom">
                                        <img src="${doctorImage}" onerror="this.src='/images/default-doctor.png'" class="rounded-circle me-3 shadow-sm" style="width: 50px; height: 50px; object-fit: cover;">
                                        <div>
                                            <h6 class="mb-0 fw-bold" style="color: var(--primary-navy, #0f172a);">${doctor.name}</h6>
                                            <small class="text-muted">اضغط لعرض التفاصيل</small>
                                        </div>
                                    </a>
                                `;
                                resultsList.innerHTML += item;
                            });
                            resultsBox.classList.remove('d-none');
                        } else {
                            // رسالة في حال عدم وجود نتائج
                            resultsList.innerHTML = '<div class="p-3 text-center text-muted"><i class="fa-solid fa-user-doctor mb-2 fs-4"></i><br>لا يوجد طبيب أو عيادة بهذا الاسم</div>';
                            resultsBox.classList.remove('d-none');
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching search results:', error);
                    });
            } else {
                resultsBox.classList.add('d-none'); // إخفاء القائمة إذا مسح الكتابة
            }
        });

        // إخفاء القائمة إذا ضغط المستخدم بأي مكان برا مربع البحث
        document.addEventListener('click', function (e) {
            if (!searchInput.contains(e.target) && !resultsBox.contains(e.target)) {
                resultsBox.classList.add('d-none');
            }
        });
    }
});