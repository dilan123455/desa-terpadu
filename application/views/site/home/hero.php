<!-- Bagian Merah + Wave -->
<section
    id="hero"
    class="relative bg-[#cc4b4d] min-h-screen flex flex-col items-center justify-start pt-24 pb-0 overflow-hidden"
>
    <!-- Gambar utama -->
    <div class="relative z-10 w-full max-w-2xl mx-auto px-6 text-center">
        <img
            src="<?= base_url('assets/uploads/home/' . $hero->image); ?>?v=<?= strtotime($hero->updated_at); ?>"
            alt="<?= html_escape($hero->title); ?>"
            loading="lazy"
            decoding="async"
            class="w-full h-auto max-h-[500px] object-contain drop-shadow-2xl"
        />
    </div>

    <!-- Teks & CTA -->
    <div class="relative z-10 w-full max-w-7xl mx-auto px-6 text-center mt-8">
        <p class="text-white tracking-wide text-xl md:text-2xl mb-4">
            <?= html_escape($hero->tagline ?? ''); ?>
        </p>
        <h1 class="text-white font-bold leading-tight text-3xl sm:text-4xl md:text-5xl mb-6">
            <?= html_escape($hero->title ?? ''); ?>
        </h1>
        <p class="text-white/90 text-xl md:text-2xl max-w-3xl mx-auto mb-10 leading-relaxed">
            <?= html_escape($hero->description ?? ''); ?>
        </p>

        <button
            id="btn-jelajahi"
            class="bg-[#e0c391] hover:bg-[#d4af6a] text-[#3a1f1f] font-bold text-xl px-10 py-4 rounded-lg shadow-lg transition-all duration-300 hover:scale-105 hover:shadow-2xl active:scale-95"
        >
            Jelajahi Lebih Lanjut
        </button>
    </div>

    <!-- WAVE – fleksibel, tidak absolute -->
    <svg
        class="w-full h-20 md:h-auto pointer-events-none block mt-auto"
        style="margin-bottom: -2px;"
        viewBox="0 0 1440 320"
        preserveAspectRatio="none"
        xmlns="http://www.w3.org/2000/svg"
    >
        <path
            fill="#ffffff"
            d="M0,180 C180,340 360,60 540,140 C720,220 900,20 1080,120 C1200,180 1320,200 1440,180 L1440,320 L0,320 Z"
        />
    </svg>
</section>

<!-- =========================================================
     BAGIAN PUTIH: TANTANGAN DESA
========================================================= -->
<section
    id="tantangan"
    class="relative bg-white pt-1 pb-24 -mt-1 scroll-mt-20"
>
    <div class="max-w-6xl mx-auto px-4 md:px-6 text-center">
        <p class="text-[#cc4b4d] font-semibold tracking-wide text-lg md:text-2xl mb-3">
            Tantangan Desa Saat Ini
        </p>
        <h2 class="text-[#2b2b2b] font-bold leading-tight text-4xl sm:text-5xl mb-6">
            Kenapa Harus Ekosistem Digital?
        </h2>
        <p class="text-black text-base md:text-lg max-w-4xl mx-auto mb-16 leading-relaxed">
            Tahukah Anda? Rata-rata perangkat desa menghabiskan
            berjam-jam tiap hari hanya untuk administrasi manual
            yang bisa selesai dalam hitungan menit dengan sistem digital.
        </p>

        <!-- GRID TANTANGAN -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-x-6 gap-y-14">
            <?php if (!empty($challenges)): ?>
                <?php foreach ($challenges as $challenge): ?>
                    <div class="flex flex-col items-center px-1 reveal group">
                        <?php if (!empty($challenge->icon)): ?>
                            <?php if (preg_match('#^(https?://|data:|/)|\/#i', $challenge->icon)): ?>
                                <!-- Jika icon berupa URL gambar -->
                                <img
                                    src="<?= html_escape($challenge->icon); ?>"
                                    alt="<?= html_escape($challenge->title); ?>"
                                    class="w-12 h-12 object-contain mb-4"
                                    loading="lazy"
                                />
                            <?php else: ?>
                                <!-- Jika icon berupa kelas (misal: fa-solid fa-check) -->
                                <i class="<?= html_escape($challenge->icon); ?> text-[#7a2e2e] text-3xl mb-4 icon-zoom"></i>
                            <?php endif; ?>
                        <?php else: ?>
                            <!-- Icon default: bintang emoji -->
                            <span class="text-4xl mb-4 icon-zoom">⭐</span>
                        <?php endif; ?>

                        <p class="text-gray-700 text-lg md:text-xl font-medium leading-snug">
                            <?= nl2br(html_escape($challenge->title)); ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-span-2 md:col-span-4">
                    <p class="text-gray-500 text-sm">Data Tantangan Desa belum tersedia.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Script (tetap sama) -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    // Lazy loading
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
        }, { rootMargin: '200px' });
        lazyImages.forEach(img => imageObserver.observe(img));
    } else {
        lazyImages.forEach(img => {
            img.src = img.dataset.src;
            img.removeAttribute('data-src');
        });
    }

    // Reveal animation
    const revealElements = document.querySelectorAll('.reveal');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const delay = Array.from(revealElements).indexOf(entry.target) * 100;
                setTimeout(() => {
                    entry.target.classList.add('visible');
                    entry.target.addEventListener('transitionend', () => {
                        entry.target.classList.remove('reveal');
                    }, { once: true });
                }, delay);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });
    revealElements.forEach(el => observer.observe(el));

    // Scroll ke tantangan
    const btnJelajahi = document.getElementById('btn-jelajahi');
    if (btnJelajahi) {
        btnJelajahi.addEventListener('click', function () {
            const target = document.getElementById('tantangan');
            if (target) {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    }
});
</script>