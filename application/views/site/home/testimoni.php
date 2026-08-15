<!-- =========================================================
     TESTIMONI SECTION
     - Menampilkan 3 kartu sekaligus
     - Geser 1 kartu setiap kali
     - Auto slide
     - Manual drag / swipe (native scroll-snap)
     - Infinite loop (dengan clone)
     - Pagination dots
========================================================= -->

<section
    id="testimoni-section"
    class="relative flex min-h-screen flex-col items-center justify-center overflow-hidden bg-[#f2ece7] py-20"
>

    <!-- Background Wave -->
    <div
        class="pointer-events-none absolute left-0 top-0 z-0 w-full opacity-90"
        aria-hidden="true"
    >
        <svg
            viewBox="0 0 1440 320"
            class="h-auto w-full"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
        >
            <path
                d="M0,96 C300,240 500,30 800,80 C1100,130 1300,240 1440,180 L1440,0 L0,0 Z"
                fill="#FFFFFF"
                opacity="0.8"
            />
            <path
                d="M0,110 C300,260 500,50 800,100 C1100,150 1300,260 1440,200 L1440,0 L0,0 Z"
                fill="#FFFFFF"
                opacity="0.5"
            />
        </svg>
    </div>

    <!-- CONTAINER -->
    <div
        class="relative z-10 mx-auto w-full max-w-7xl px-4 pt-12 text-center sm:px-6 md:pt-16 lg:px-8"
    >
        <!-- Header -->
        <p class="mb-2 text-sm font-semibold uppercase tracking-wider text-[#bf5f5c]">
            Testimoni
        </p>
        <h2 class="mb-6 text-4xl font-bold text-gray-900 md:text-5xl">
            Dari Desa untuk Desa
        </h2>
        <p class="mx-auto mb-12 max-w-3xl px-4 text-base leading-relaxed text-gray-600">
            Bukan sekadar janji. Desa-desa mitra kami telah merasakan perubahan besar
            dalam efisiensi, transparansi, dan kemudahan layanan.
        </p>

        <!-- SLIDER (native scroll-snap + clone untuk infinite loop) -->
        <div
            id="testimonial-slider"
            class="relative w-full overflow-x-auto overflow-y-hidden pb-2"
            style="-webkit-overflow-scrolling: touch; scroll-snap-type: x mandatory;"
        >
            <div id="testimonial-track" class="flex gap-4 sm:gap-6" style="width: max-content;">
                <?php if (!empty($testimonials)): ?>
                    <?php foreach ($testimonials as $item): ?>
                        <div class="testimonial-slide flex-shrink-0" style="scroll-snap-align: start;">
                            <div class="testimonial-card mx-auto flex h-full w-full max-w-sm flex-col items-center rounded-2xl bg-white p-6 text-center shadow-[0_4px_20px_-4px_rgba(0,0,0,0.05)] md:p-8">
                                <!-- Foto -->
                                <div class="relative mb-6 h-16 w-16 overflow-hidden rounded-full border-2 border-white bg-gray-100 shadow-sm md:h-20 md:w-20">
                                    <?php if (!empty($item->photo)): ?>
                                        <img src="<?= base_url('uploads/testimoni/' . $item->photo) ?>" alt="<?= html_escape($item->name) ?>" class="h-full w-full object-cover" loading="lazy" decoding="async">
                                    <?php else: ?>
                                        <img src="<?= base_url('assets/img/testimoni-placeholder.png') ?>" alt="Foto" class="h-full w-full object-cover" loading="lazy" decoding="async">
                                    <?php endif; ?>
                                </div>
                                <!-- Isi Testimoni -->
                                <p class="mb-6 text-sm leading-relaxed text-gray-500 md:text-base">
                                    <?= html_escape(html_entity_decode($item->content, ENT_QUOTES, 'UTF-8')) ?>
                                </p>
                                <!-- Nama & Jabatan -->
                                <div class="mt-auto">
                                    <p class="text-sm font-bold italic text-gray-900"><?= html_escape($item->name) ?></p>
                                    <?php if (!empty($item->position)): ?>
                                        <p class="text-xs font-medium text-gray-400"><?= html_escape($item->position) ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="w-full py-20 text-center text-gray-500"><p>Belum ada testimoni.</p></div>
                <?php endif; ?>
            </div>
        </div>

        <!-- PAGINATION DOTS -->
        <?php if (!empty($testimonials) && count($testimonials) > 1): ?>
            <div id="testimonial-pagination" class="mt-8 flex items-center justify-center gap-2"></div>
        <?php endif; ?>
    </div>
</section>

<!-- CTA SECTION (tetap sama) -->
<section class="relative flex items-center justify-center overflow-hidden bg-[#cc5050] py-20 md:py-24">
    <div class="relative z-10 mx-auto max-w-4xl px-4 text-center sm:px-6 lg:px-8">
        <h2 class="mb-4 text-3xl font-bold leading-tight text-white md:mb-6 md:text-4xl lg:text-5xl">
            Mulai Transformasi Desa Anda Hari Ini
        </h2>
        <p class="mx-auto mb-8 max-w-2xl text-base leading-relaxed text-white/90 md:mb-10 md:text-lg">
            Ubah cara desa Anda bekerja. Mulai sekarang, pelayanan publik jadi lebih cepat, efisien, dan ramah warga.
        </p>
        <a href="https://api.whatsapp.com/send/?phone=6285172238883&text=Halo+Desa+Terpadu%2C+saya+ingin+mendapatkan+info+penawaran+Aplikasi+Desa+Terpadu.&type=phone_number&app_absent=0%20"
           target="_blank" rel="noopener noreferrer"
           class="cta-fade-in-up group relative inline-block overflow-hidden rounded-lg bg-[#f2d88d] px-8 py-3.5 font-semibold text-gray-900 shadow-md transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-[0_10px_40px_-10px_rgba(0,0,0,0.3)] active:scale-95 md:px-10 md:py-4">
            <span class="relative z-10">Hubungi Kami Sekarang</span>
            <span class="absolute inset-0 bg-gradient-to-r from-[#e6d082] to-[#f2d88d] opacity-0 transition-opacity duration-300 group-hover:opacity-100"></span>
        </a>
    </div>
</section>

<!-- JAVASCRIPT (Native Scroll Snap + Infinite Loop dengan Clone) -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const section = document.getElementById('testimoni-section');

    function initTestimonialSlider() {
        const slider = document.getElementById('testimonial-slider');
        const track = document.getElementById('testimonial-track');
        const pagination = document.getElementById('testimonial-pagination');

        if (!slider || !track) return;

        const originalSlides = Array.from(track.querySelectorAll('.testimonial-slide'));
        const totalSlides = originalSlides.length;

        if (totalSlides <= 1) {
            if (pagination) pagination.innerHTML = '';
            return;
        }

        let currentIndex = 0;
        let timer = null;
        let isScrolling = false;
        let scrollTimeout = null;
        let clonesBefore = 0;
        let clonesAfter = 0;

        // Variabel untuk mouse drag
        let isMouseDragging = false;
        let mouseStartX = 0;
        let mouseStartScrollLeft = 0;

        const defaultSnapType = 'x mandatory';

        function getVisibleSlides() {
            if (window.innerWidth <= 600) return 1;
            if (window.innerWidth <= 900) return 2;
            return 3;
        }

        function getGap() {
            return window.innerWidth <= 600 ? 16 : 24;
        }

        function calculateSlideWidth() {
            const visible = getVisibleSlides();
            const gap = getGap();
            const containerWidth = slider.clientWidth;
            return (containerWidth - (gap * (visible - 1))) / visible;
        }

        function setSlideWidths() {
            const slideWidth = calculateSlideWidth();
            track.querySelectorAll('.testimonial-slide').forEach(slide => {
                slide.style.width = slideWidth + 'px';
            });
        }

        function createClones() {
            track.querySelectorAll('.testimonial-clone').forEach(clone => clone.remove());
            const visible = getVisibleSlides();
            clonesBefore = visible;
            clonesAfter = visible;

            for (let i = 0; i < clonesAfter; i++) {
                const clone = originalSlides[i % totalSlides].cloneNode(true);
                clone.classList.add('testimonial-clone');
                track.appendChild(clone);
            }
            for (let i = clonesBefore - 1; i >= 0; i--) {
                const clone = originalSlides[(totalSlides - 1 - i + totalSlides) % totalSlides].cloneNode(true);
                clone.classList.add('testimonial-clone');
                track.insertBefore(clone, track.firstChild);
            }
        }

        function getScrollPositionForIndex(index) {
            const slideWidth = calculateSlideWidth();
            const gap = getGap();
            return (index + clonesBefore) * (slideWidth + gap);
        }

        function getIndexFromScrollPosition(scrollLeft) {
            const slideWidth = calculateSlideWidth();
            const gap = getGap();
            const totalSlideWidth = slideWidth + gap;
            const rawIndex = Math.round(scrollLeft / totalSlideWidth) - clonesBefore;
            return ((rawIndex % totalSlides) + totalSlides) % totalSlides;
        }

        function updatePagination(index) {
            if (!pagination) return;
            const dots = pagination.querySelectorAll('.testimonial-dot');
            dots.forEach((dot, i) => {
                dot.classList.toggle('active', i === index);
            });
        }

        function createPagination() {
            if (!pagination) return;
            pagination.innerHTML = '';
            for (let i = 0; i < totalSlides; i++) {
                const dot = document.createElement('button');
                dot.type = 'button';
                dot.className = 'testimonial-dot';
                if (i === currentIndex) dot.classList.add('active');
                dot.addEventListener('click', () => goTo(i));
                pagination.appendChild(dot);
            }
        }

        function goTo(index, smooth = true) {
            currentIndex = ((index % totalSlides) + totalSlides) % totalSlides;
            const targetScroll = getScrollPositionForIndex(currentIndex);
            slider.scrollTo({
                left: targetScroll,
                behavior: smooth ? 'smooth' : 'auto'
            });
            updatePagination(currentIndex);
        }

        function nextSlide() {
            const nextIndex = (currentIndex + 1) % totalSlides;
            goTo(nextIndex, true);
        }

        function startAuto() {
            stopAuto();
            timer = setInterval(nextSlide, 4000);
        }

        function stopAuto() {
            if (timer) {
                clearInterval(timer);
                timer = null;
            }
        }

        // ---------- MOUSE DRAG (hanya untuk pointerType === 'mouse') ----------
        function onMousePointerDown(e) {
            if (e.pointerType !== 'mouse' || e.button !== 0) return; // hanya mouse kiri
            isMouseDragging = true;
            mouseStartX = e.clientX;
            mouseStartScrollLeft = slider.scrollLeft;
            slider.style.scrollSnapType = 'none'; // matikan snap sementara
            slider.classList.add('cursor-grabbing');
            stopAuto();
        }

        function onMousePointerMove(e) {
            if (!isMouseDragging) return;
            const dx = e.clientX - mouseStartX;
            slider.scrollLeft = mouseStartScrollLeft - dx;
            // Cegah seleksi teks / drag gambar bawaan
            e.preventDefault();
        }

        function onMousePointerUp(e) {
            if (!isMouseDragging) return;
            isMouseDragging = false;
            slider.style.scrollSnapType = defaultSnapType; // kembalikan snap
            slider.classList.remove('cursor-grabbing');

            // Biarkan browser snap ke slide terdekat, lalu update index
            // (kita juga bisa langsung hitung index dan panggil goTo, tapi biarkan smooth)
            const slideWidth = calculateSlideWidth();
            const gap = getGap();
            const totalSlideWidth = slideWidth + gap;
            const nearestRawIndex = Math.round(slider.scrollLeft / totalSlideWidth) - clonesBefore;
            const nearestIndex = ((nearestRawIndex % totalSlides) + totalSlides) % totalSlides;
            currentIndex = nearestIndex;
            updatePagination(currentIndex);
            startAuto();
        }

        // Event untuk mouse drag
        slider.addEventListener('pointerdown', onMousePointerDown);
        window.addEventListener('pointermove', onMousePointerMove);
        window.addEventListener('pointerup', onMousePointerUp);

        // Cegah drag gambar bawaan browser
        track.addEventListener('dragstart', (e) => e.preventDefault());

        // ---------- SCROLL EVENT (untuk pagination & infinite loop) ----------
        slider.addEventListener('scroll', () => {
            if (isScrolling) return;
            isScrolling = true;

            const scrollLeft = slider.scrollLeft;
            const slideWidth = calculateSlideWidth();
            const gap = getGap();
            const totalSlideWidth = slideWidth + gap;
            const maxScroll = (totalSlides + clonesBefore + clonesAfter - 1) * totalSlideWidth - slider.clientWidth;

            // Infinite loop: lompat jika melewati batas clone
            if (scrollLeft < clonesBefore * totalSlideWidth - totalSlideWidth / 2) {
                const targetIndex = totalSlides - 1;
                slider.scrollTo({ left: getScrollPositionForIndex(targetIndex), behavior: 'auto' });
                currentIndex = targetIndex;
                updatePagination(currentIndex);
            } else if (scrollLeft > maxScroll + totalSlideWidth / 2) {
                const targetIndex = 0;
                slider.scrollTo({ left: getScrollPositionForIndex(targetIndex), behavior: 'auto' });
                currentIndex = targetIndex;
                updatePagination(currentIndex);
            } else {
                const newIndex = getIndexFromScrollPosition(scrollLeft);
                if (newIndex !== currentIndex) {
                    currentIndex = newIndex;
                    updatePagination(currentIndex);
                }
            }

            // Hentikan auto-slide sementara saat user scroll manual
            stopAuto();
            clearTimeout(scrollTimeout);
            scrollTimeout = setTimeout(() => {
                startAuto();
            }, 2000);

            isScrolling = false;
        });

        // Resize handler
        let resizeTimeout;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(() => {
                createClones();
                setSlideWidths();
                goTo(currentIndex, false);
            }, 150);
        });

        // Inisialisasi
        createClones();
        setSlideWidths();
        createPagination();
        goTo(0, false);
        startAuto();
    }

    if ('IntersectionObserver' in window && section) {
        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    initTestimonialSlider();
                    obs.unobserve(entry.target);
                }
            });
        }, { rootMargin: '200px' });
        observer.observe(section);
    } else {
        initTestimonialSlider();
    }
});
</script>

<!-- CUSTOM CSS -->
<style>
#testimonial-slider {
    /* Sembunyikan scrollbar tapi tetap bisa discroll */
    scrollbar-width: none; /* Firefox */
    -ms-overflow-style: none; /* IE/Edge */
}
#testimonial-slider::-webkit-scrollbar {
    display: none; /* Chrome/Safari */
}

#testimoni-section .testimonial-slide {
    flex: 0 0 auto;
    scroll-snap-align: start;
}

#testimoni-section .testimonial-card {
    min-height: 245px;
}

#testimonial-pagination {
    min-height: 12px;
}

.testimonial-dot {
    width: 7px;
    height: 7px;
    padding: 0;
    border: none;
    border-radius: 50%;
    background: #d8c2bd;
    cursor: pointer;
    transition: width 0.3s ease, background 0.3s ease, transform 0.3s ease;
}
.testimonial-dot:hover {
    transform: scale(1.15);
}
.testimonial-dot.active {
    width: 24px;
    border-radius: 10px;
    background: #bf5f5c;
}

/* Animasi fade-in untuk kartu */
#testimoni-section .testimonial-card {
    animation: testimonialFadeIn 0.5s ease-in-out;
}
@keyframes testimonialFadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

.cta-fade-in-up {
    animation: ctaFadeInUp 0.8s ease-out forwards;
}
@keyframes ctaFadeInUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

@media (max-width: 900px) {
    #testimoni-section .testimonial-card { min-height: 240px; }
}
@media (max-width: 600px) {
    #testimoni-section .testimonial-card { min-height: 250px; padding: 24px; }
}
</style>