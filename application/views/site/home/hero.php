<!-- Bagian Merah + Wave -->
<section id="hero" class="relative bg-[#cc4b4d] min-h-[160vh] flex flex-col items-center justify-start pt-24 pb-0 overflow-hidden">
    <!-- Gambar utama -->
    <div class="relative z-10 w-full max-w-2xl mx-auto px-6 text-center">
        <!-- Lazy loading optimal untuk gambar besar -->
        <img src="<?= base_url('assets/gambar_pc.png'); ?>" 
             alt="Desa Terpadu" 
             loading="lazy" 
             decoding="async" 
             fetchpriority="low"
             class="w-full h-auto object-contain drop-shadow-2xl">
    </div>

    <!-- Teks & CTA -->
    <div class="relative z-10 w-full max-w-7xl mx-auto px-6 text-center mt-8">
        <p class="text-white tracking-wide text-xl md:text-2xl mb-4">#PelayananDalamGenggaman</p>
        <h1 class="text-white font-bold leading-tight text-3xl sm:text-4xl md:text-5xl mb-6">Layanan Desa Modern, Mudah dan Terintegrasi</h1>
        <p class="text-white/90 text-xl md:text-2xl max-w-3xl mx-auto mb-10 leading-relaxed">Solusi lengkap yang menghubungkan perangkat desa, warga, dan layanan publik dalam satu ekosistem digital.</p>
        <button id="btn-jelajahi" class="bg-[#e0c391] hover:bg-[#d4af6a] text-[#3a1f1f] font-bold text-xl px-10 py-4 rounded-lg shadow-lg transition-all duration-300 hover:scale-105 hover:shadow-2xl active:scale-95">
            Jelajahi Lebih Lanjut
        </button>
    </div>

    <!-- Wave -->
    <svg class="absolute bottom-0 left-0 w-full h-20 md:h-auto pointer-events-none block" style="margin-bottom: -2px;" viewBox="0 0 1440 320" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
        <path fill="#ffffff" d="M0,180 C180,340 360,60 540,140 C720,220 900,20 1080,120 C1200,180 1320,200 1440,180 L1440,320 L0,320 Z"/>
    </svg>
</section>

<!-- Bagian Putih: Tantangan Desa -->
<section id="tantangan" class="relative bg-white pt-1 pb-24 -mt-1 scroll-mt-20">
    <div class="max-w-6xl mx-auto px-4 md:px-6 text-center">
        <p class="text-[#cc4b4d] font-semibold tracking-wide text-lg md:text-2xl mb-3">Tantangan Desa Saat Ini</p>
        <h2 class="text-[#2b2b2b] font-bold leading-tight text-4xl sm:text-5xl mb-6">Kenapa Harus Ekosistem Digital?</h2>
        <p class="text-black text-base md:text-lg max-w-4xl mx-auto mb-16 leading-relaxed">Tahukah Anda? Rata-rata perangkat desa menghabiskan berjam-jam tiap hari hanya untuk administrasi manual yang bisa selesai dalam hitungan menit dengan sistem digital.</p>

        <!-- Grid Tantangan -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-x-6 gap-y-14">
            <!-- Item 1 -->
            <div class="flex flex-col items-center px-1 reveal group">
                <svg class="w-12 h-12 text-[#7a2e2e] mb-4 icon-zoom" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 3.75h8.25L19.5 9v10.5A1.5 1.5 0 0118 21H6a1.5 1.5 0 01-1.5-1.5v-15A1.5 1.5 0 016 3.75z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.25 3.75V9h5.25"/>
                    <circle cx="15" cy="16" r="3.25"/>
                    <path stroke-linecap="round" d="M15 14.5V16l1 .75"/>
                </svg>
                <p class="text-gray-700 text-lg md:text-xl font-medium leading-snug">Administrasi manual<br>yang lambat dan rumit</p>
            </div>
            <!-- Item 2 -->
            <div class="flex flex-col items-center px-1 reveal group">
                <svg class="w-12 h-12 text-[#7a2e2e] mb-4 icon-zoom" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 8.25h15M6 8.25V6a1.5 1.5 0 011.5-1.5h9A1.5 1.5 0 0118 6v2.25M5.25 8.25v9A1.5 1.5 0 006.75 18.75h10.5a1.5 1.5 0 001.5-1.5v-9"/>
                    <rect x="7.5" y="11.25" width="9" height="4.25" rx="0.5"/>
                    <path stroke-linecap="round" d="M8.5 13.3h7"/>
                </svg>
                <p class="text-gray-700 text-lg md:text-xl font-medium leading-snug">Kesulitan Akses Layanan<br>bagi Masyarakat</p>
            </div>
            <!-- Item 3 -->
            <div class="flex flex-col items-center px-1 reveal group">
                <svg class="w-12 h-12 text-[#7a2e2e] mb-4 icon-zoom" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 20.25V13.5M9 20.25V9M13.5 20.25v-7.5M18 20.25V6"/>
                    <circle cx="18.75" cy="5.25" r="3"/>
                    <path stroke-linecap="round" d="M20.9 7.4l1.85 1.85"/>
                </svg>
                <p class="text-gray-700 text-lg md:text-xl font-medium leading-snug">Data tidak akurat dalam<br>mengambil keputusan</p>
            </div>
            <!-- Item 4 -->
            <div class="flex flex-col items-center px-1 reveal group">
                <svg class="w-12 h-12 text-[#7a2e2e] mb-4 icon-zoom" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 3v18M4.5 3.75L13.5 6l-3 4.5 3 4.5-9 2.25"/>
                    <circle cx="18.5" cy="17.5" r="3"/>
                    <path stroke-linecap="round" d="M20.6 19.6L22 21"/>
                </svg>
                <p class="text-gray-700 text-lg md:text-xl font-medium leading-snug">Banyak proses untuk<br>tracing data</p>
            </div>
            <!-- Item 5 -->
            <div class="flex flex-col items-center px-1 reveal group">
                <svg class="w-12 h-12 text-[#7a2e2e] mb-4 icon-zoom" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 7.5h6l1.5 2.25h9v9a1.5 1.5 0 01-1.5 1.5h-15a1.5 1.5 0 01-1.5-1.5V9a1.5 1.5 0 011.5-1.5z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 12.75h4.5"/>
                </svg>
                <p class="text-gray-700 text-lg md:text-xl font-medium leading-snug">Data penduduk tidak<br>tersimpan dengan baik</p>
            </div>
            <!-- Item 6 -->
            <div class="flex flex-col items-center px-1 reveal group">
                <svg class="w-12 h-12 text-[#7a2e2e] mb-4 icon-zoom" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M12 12.75l-2.5-2.5M12 12.75l2.5-2.5"/>
                    <path stroke-linecap="round" d="M8.5 8.5a5 5 0 017 0M6 6a8.5 8.5 0 0112 0"/>
                    <circle cx="12" cy="4.5" r="1"/>
                </svg>
                <p class="text-gray-700 text-lg md:text-xl font-medium leading-snug">Akses internet yang<br>merata antar desa</p>
            </div>
            <!-- Item 7 -->
            <div class="flex flex-col items-center px-1 reveal group">
                <svg class="w-12 h-12 text-[#7a2e2e] mb-4 icon-zoom" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <rect x="8" y="2.5" width="8" height="19" rx="1.5"/>
                    <path stroke-linecap="round" d="M10.5 6h3M9.5 18.5h5"/>
                </svg>
                <p class="text-gray-700 text-lg md:text-xl font-medium leading-snug">Keterbatasan SDM &amp;<br>infrastruktur pendukung</p>
            </div>
            <!-- Item 8 -->
            <div class="flex flex-col items-center px-1 reveal group">
                <svg class="w-12 h-12 text-[#7a2e2e] mb-4 icon-zoom" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 9.5c1.5-3 4.5-4 8-4s6.5 1 8 4"/>
                    <circle cx="8" cy="12.5" r="2.25"/>
                    <circle cx="16" cy="12.5" r="2.25"/>
                    <path stroke-linecap="round" d="M10.25 12.5h3.5"/>
                </svg>
                <p class="text-gray-700 text-lg md:text-xl font-medium leading-snug">Keamanan data &amp; privasi<br>yang belum terjamin</p>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // === Lazy loading untuk gambar dengan data-src ===
        const lazyImages = document.querySelectorAll('img[data-src]');
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.removeAttribute('data-src');
                        observer.unobserve(img);
                    }
                });
            }, { rootMargin: '200px' }); // mulai memuat 200px sebelum masuk viewport
            lazyImages.forEach(img => imageObserver.observe(img));
        } else {
            // Fallback untuk browser lama
            lazyImages.forEach(img => {
                img.src = img.dataset.src;
                img.removeAttribute('data-src');
            });
        }

        // === Animasi Reveal (dengan cleanup) ===
        const revealElements = document.querySelectorAll('.reveal');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const delay = Array.from(revealElements).indexOf(entry.target) * 100;
                    setTimeout(() => {
                        entry.target.classList.add('visible');
                        // Hapus class 'reveal' setelah transisi selesai untuk performa
                        entry.target.addEventListener('transitionend', () => {
                            entry.target.classList.remove('reveal');
                        }, { once: true });
                    }, delay);
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        revealElements.forEach(el => observer.observe(el));

        // === Scroll ke bagian Tantangan saat tombol diklik ===
        const btnJelajahi = document.getElementById('btn-jelajahi');
        if (btnJelajahi) {
            btnJelajahi.addEventListener('click', function () {
                const target = document.getElementById('tantangan');
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        }
    });
</script>