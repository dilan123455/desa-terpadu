<!-- =========================================================
     TESTIMONI SECTION
     - Menampilkan 3 kartu sekaligus
     - Geser 1 kartu setiap kali
     - Auto slide
     - Manual drag / swipe
     - Infinite loop
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


    <!-- =====================================================
         CONTAINER
    ====================================================== -->

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


        <!-- =================================================
             SLIDER
        ================================================== -->

        <div
            id="testimonial-slider"
            class="relative w-full overflow-hidden"
        >

            <div
                id="testimonial-track"
                class="flex cursor-grab select-none gap-4 active:cursor-grabbing sm:gap-6"
            >

                <?php if (!empty($testimonials)): ?>

                    <?php foreach ($testimonials as $item): ?>

                        <!-- =================================================
                             1 TESTIMONI = 1 SLIDE
                        ================================================== -->

                        <div class="testimonial-slide flex-shrink-0">

                            <div
                                class="testimonial-card mx-auto flex h-full w-full max-w-sm flex-col items-center rounded-2xl bg-white p-6 text-center shadow-[0_4px_20px_-4px_rgba(0,0,0,0.05)] md:p-8"
                            >

                                <!-- Foto -->
                                <div
                                    class="relative mb-6 h-16 w-16 overflow-hidden rounded-full border-2 border-white bg-gray-100 shadow-sm md:h-20 md:w-20"
                                >

                                    <?php if (!empty($item->photo)): ?>

                                        <img
                                            src="<?= base_url('uploads/testimoni/' . $item->photo) ?>"
                                            alt="<?= html_escape($item->name) ?>"
                                            class="h-full w-full object-cover"
                                            loading="lazy"
                                        >

                                    <?php else: ?>

                                        <!-- Placeholder -->
                                        <img
                                            src="<?= base_url('assets/img/testimoni-placeholder.png') ?>"
                                            alt="Foto"
                                            class="h-full w-full object-cover"
                                        >

                                    <?php endif; ?>

                                </div>


                                <!-- Isi Testimoni -->
                                <p class="mb-6 text-sm leading-relaxed text-gray-500 md:text-base">

                                    <?= html_escape(
                                        html_entity_decode(
                                            $item->content,
                                            ENT_QUOTES,
                                            'UTF-8'
                                        )
                                    ) ?>

                                </p>


                                <!-- Nama & Jabatan -->
                                <div class="mt-auto">

                                    <p class="text-sm font-bold italic text-gray-900">
                                        <?= html_escape($item->name) ?>
                                    </p>

                                    <?php if (!empty($item->position)): ?>

                                        <p class="text-xs font-medium text-gray-400">
                                            <?= html_escape($item->position) ?>
                                        </p>

                                    <?php endif; ?>

                                </div>

                            </div>

                        </div>

                    <?php endforeach; ?>

                <?php else: ?>

                    <!-- Tidak ada data -->
                    <div class="w-full py-20 text-center text-gray-500">

                        <p>
                            Belum ada testimoni.
                        </p>

                    </div>

                <?php endif; ?>

            </div>

        </div>


        <!-- =================================================
             PAGINATION DOTS
        ================================================== -->

        <?php if (!empty($testimonials) && count($testimonials) > 1): ?>

            <div
                id="testimonial-pagination"
                class="mt-8 flex items-center justify-center gap-2"
            ></div>

        <?php endif; ?>

    </div>

</section>


<!-- =========================================================
     CTA SECTION
========================================================= -->

<section
    class="relative flex items-center justify-center overflow-hidden bg-[#cc5050] py-20 md:py-24"
>

    <div
        class="relative z-10 mx-auto max-w-4xl px-4 text-center sm:px-6 lg:px-8"
    >

        <h2
            class="mb-4 text-3xl font-bold leading-tight text-white md:mb-6 md:text-4xl lg:text-5xl"
        >
            Mulai Transformasi Desa Anda Hari Ini
        </h2>

        <p
            class="mx-auto mb-8 max-w-2xl text-base leading-relaxed text-white/90 md:mb-10 md:text-lg"
        >
            Ubah cara desa Anda bekerja. Mulai sekarang, pelayanan publik jadi lebih
            cepat, efisien, dan ramah warga.
        </p>

        <a
            href="#"
            class="cta-fade-in-up group relative inline-block overflow-hidden rounded-lg bg-[#f2d88d] px-8 py-3.5 font-semibold text-gray-900 shadow-md transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-[0_10px_40px_-10px_rgba(0,0,0,0.3)] active:scale-95 md:px-10 md:py-4"
        >

            <span class="relative z-10">
                Hubungi Kami Sekarang
            </span>

            <span
                class="absolute inset-0 bg-gradient-to-r from-[#e6d082] to-[#f2d88d] opacity-0 transition-opacity duration-300 group-hover:opacity-100"
            ></span>

        </a>

    </div>

</section>


<!-- =========================================================
     JAVASCRIPT TESTIMONI SLIDER
========================================================= -->

<script>

document.addEventListener('DOMContentLoaded', function () {

    const slider = document.getElementById('testimonial-slider');
    const track = document.getElementById('testimonial-track');
    const pagination = document.getElementById('testimonial-pagination');

    if (!slider || !track) {
        return;
    }


    /* =====================================================
       DATA SLIDE
    ====================================================== */

    let originalSlides = Array.from(
        track.querySelectorAll('.testimonial-slide')
    );

    const totalSlides = originalSlides.length;


    if (totalSlides <= 1) {
        if (pagination) {
            pagination.innerHTML = '';
        }

        return;
    }


    /* =====================================================
       KONFIGURASI
    ====================================================== */

    let currentIndex = 0;
    let timer = null;

    let isDragging = false;
    let startX = 0;
    let currentTranslate = 0;

    let slideWidth = 0;
    let gap = 0;


    /* =====================================================
       JUMLAH SLIDE YANG TERLIHAT
    ====================================================== */

    function getVisibleSlides() {

        if (window.innerWidth <= 600) {
            return 1;
        }

        if (window.innerWidth <= 900) {
            return 2;
        }

        return 3;
    }


    /* =====================================================
       BUAT CLONE
       
       Clone diperlukan supaya slider bisa infinite.
    ====================================================== */

    function createClones() {

        track.querySelectorAll('.testimonial-clone').forEach(function (clone) {
            clone.remove();
        });


        const visible = getVisibleSlides();


        /*
         * Clone beberapa slide pertama
         */
        for (let i = 0; i < visible; i++) {

            const clone = originalSlides[i % totalSlides].cloneNode(true);

            clone.classList.add('testimonial-clone');

            track.appendChild(clone);
        }


        /*
         * Clone beberapa slide terakhir
         */
        for (let i = visible - 1; i >= 0; i--) {

            const clone = originalSlides[
                (totalSlides - 1 - i + totalSlides) % totalSlides
            ].cloneNode(true);

            clone.classList.add('testimonial-clone');

            track.insertBefore(clone, track.firstChild);
        }

    }


    /* =====================================================
       HITUNG UKURAN KARTU
    ====================================================== */

    function calculateSize() {

        const visible = getVisibleSlides();

        gap = window.innerWidth <= 600 ? 16 : 24;

        const containerWidth = slider.offsetWidth;

        slideWidth =
            (containerWidth - (gap * (visible - 1))) / visible;


        const allSlides = track.querySelectorAll('.testimonial-slide');

        allSlides.forEach(function (slide) {

            slide.style.width = slideWidth + 'px';

        });


        /*
         * Posisi awal karena ada clone di depan
         */
        const cloneBefore = visible;

        currentTranslate =
            -((currentIndex + cloneBefore) * (slideWidth + gap));

        track.style.transition = 'none';

        track.style.transform =
            `translateX(${currentTranslate}px)`;

    }


    /* =====================================================
       PAGINATION DOTS
    ====================================================== */

    function createPagination() {

        if (!pagination) {
            return;
        }


        pagination.innerHTML = '';


        for (let i = 0; i < totalSlides; i++) {

            const dot = document.createElement('button');

            dot.type = 'button';

            dot.className =
                'testimonial-dot';


            if (i === currentIndex) {
                dot.classList.add('active');
            }


            dot.addEventListener('click', function () {

                goTo(i);

            });


            pagination.appendChild(dot);

        }

    }


    /* =====================================================
       UPDATE DOT
    ====================================================== */

    function updatePagination() {

        if (!pagination) {
            return;
        }


        const dots =
            pagination.querySelectorAll('.testimonial-dot');


        dots.forEach(function (dot, index) {

            if (index === currentIndex) {

                dot.classList.add('active');

            } else {

                dot.classList.remove('active');

            }

        });

    }


    /* =====================================================
       PINDAH 1 KARTU
    ====================================================== */

    function goTo(index, animate = true) {

        const visible = getVisibleSlides();

        const cloneBefore = visible;


        currentIndex = index;


        const targetIndex =
            currentIndex + cloneBefore;


        currentTranslate =
            -(targetIndex * (slideWidth + gap));


        track.style.transition =
            animate
                ? 'transform 0.5s ease-in-out'
                : 'none';


        track.style.transform =
            `translateX(${currentTranslate}px)`;


        updatePagination();

    }


    /* =====================================================
       NEXT
       
       INI YANG MEMBUATNYA BERGESER 1-1
    ====================================================== */

    function nextSlide() {

        currentIndex++;

        const visible = getVisibleSlides();

        const cloneBefore = visible;


        currentTranslate =
            -(
                (currentIndex + cloneBefore)
                *
                (slideWidth + gap)
            );


        track.style.transition =
            'transform 0.5s ease-in-out';


        track.style.transform =
            `translateX(${currentTranslate}px)`;


        /*
         * Update dot
         */
        updatePagination();


        /*
         * Kalau sudah melewati slide asli,
         * kembalikan ke awal tanpa terlihat.
         */

        if (currentIndex >= totalSlides) {

            setTimeout(function () {

                currentIndex = 0;

                currentTranslate =
                    -(
                        cloneBefore
                        *
                        (slideWidth + gap)
                    );


                track.style.transition = 'none';

                track.style.transform =
                    `translateX(${currentTranslate}px)`;


                updatePagination();

            }, 500);

        }

    }


    /* =====================================================
       PREVIOUS
    ====================================================== */

    function previousSlide() {

        if (currentIndex <= 0) {

            const visible = getVisibleSlides();

            /*
             * Pindah ke clone terakhir terlebih dahulu
             */
            currentIndex = totalSlides;

            const cloneBefore = visible;

            currentTranslate =
                -(
                    (currentIndex + cloneBefore)
                    *
                    (slideWidth + gap)
                );


            track.style.transition = 'none';

            track.style.transform =
                `translateX(${currentTranslate}px)`;


            /*
             * Kemudian geser ke posisi sebelumnya
             */
            setTimeout(function () {

                currentIndex = totalSlides - 1;

                currentTranslate =
                    -(
                        (currentIndex + cloneBefore)
                        *
                        (slideWidth + gap)
                    );


                track.style.transition =
                    'transform 0.5s ease-in-out';


                track.style.transform =
                    `translateX(${currentTranslate}px)`;


                updatePagination();

            }, 30);

            return;

        }


        currentIndex--;


        const cloneBefore = getVisibleSlides();


        currentTranslate =
            -(
                (currentIndex + cloneBefore)
                *
                (slideWidth + gap)
            );


        track.style.transition =
            'transform 0.5s ease-in-out';


        track.style.transform =
            `translateX(${currentTranslate}px)`;


        updatePagination();

    }


    /* =====================================================
       AUTOPLAY
    ====================================================== */

    function startAuto() {

        stopAuto();


        timer = setInterval(function () {

            nextSlide();

        }, 4000);

    }


    function stopAuto() {

        if (timer) {

            clearInterval(timer);

            timer = null;

        }

    }


    /* =====================================================
       DRAG / MOUSE
    ====================================================== */

    function getPointerX(event) {

        if (event.touches && event.touches.length) {

            return event.touches[0].clientX;

        }

        return event.clientX;

    }


    function onDragStart(event) {

        stopAuto();

        isDragging = true;

        startX = getPointerX(event);

        track.style.transition = 'none';

    }


    function onDragMove(event) {

        if (!isDragging) {
            return;
        }


        const currentX =
            getPointerX(event);


        const diff =
            currentX - startX;


        track.style.transform =
            `translateX(${currentTranslate + diff}px)`;

    }


    function onDragEnd(event) {

        if (!isDragging) {
            return;
        }


        isDragging = false;


        const endX =
            getPointerX(event);


        const diff =
            endX - startX;


        const threshold = 60;


        if (diff < -threshold) {

            nextSlide();

        } else if (diff > threshold) {

            previousSlide();

        } else {

            track.style.transition =
                'transform 0.3s ease';


            track.style.transform =
                `translateX(${currentTranslate}px)`;

        }


        startAuto();

    }


    /* =====================================================
       EVENT LISTENER
    ====================================================== */

    track.addEventListener(
        'mousedown',
        onDragStart
    );

    window.addEventListener(
        'mousemove',
        onDragMove
    );

    window.addEventListener(
        'mouseup',
        onDragEnd
    );


    track.addEventListener(
        'touchstart',
        onDragStart,
        { passive: true }
    );

    window.addEventListener(
        'touchmove',
        onDragMove,
        { passive: true }
    );

    window.addEventListener(
        'touchend',
        onDragEnd
    );


    /* =====================================================
       RESPONSIVE
    ====================================================== */

    window.addEventListener(
        'resize',
        function () {

            createClones();

            calculateSize();

        }
    );


    /* =====================================================
       INIT
    ====================================================== */

    createClones();

    calculateSize();

    createPagination();

    startAuto();

});

</script>


<!-- =========================================================
     CUSTOM CSS
========================================================= -->

<style>

/* =========================================================
   TESTIMONI SLIDE
========================================================= */

#testimoni-section {
    position: relative;
}


/*
 * Setiap testimonial adalah satu slide.
 */
#testimoni-section .testimonial-slide {
    flex: 0 0 auto;
}


/*
 * Kartu testimonial
 */
#testimoni-section .testimonial-card {
    min-height: 245px;
}


/* =========================================================
   PAGINATION DOTS
========================================================= */

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

    transition:
        width 0.3s ease,
        background 0.3s ease,
        transform 0.3s ease;

}


.testimonial-dot:hover {

    transform: scale(1.15);

}


.testimonial-dot.active {

    width: 24px;

    border-radius: 10px;

    background: #bf5f5c;

}


/* =========================================================
   DRAG
========================================================= */

#testimoni-section #testimonial-track {

    user-select: none;

    -webkit-user-select: none;

    touch-action: pan-y;

}


/* =========================================================
   ANIMATION TESTIMONI
========================================================= */

#testimoni-section .testimonial-card {

    animation:
        testimonialFadeIn
        0.5s
        ease-in-out;

}


@keyframes testimonialFadeIn {

    from {

        opacity: 0;

        transform:
            translateY(10px);

    }

    to {

        opacity: 1;

        transform:
            translateY(0);

    }

}


/* =========================================================
   CTA
========================================================= */

.cta-fade-in-up {

    animation:
        ctaFadeInUp
        0.8s
        ease-out
        forwards;

}


@keyframes ctaFadeInUp {

    from {

        opacity: 0;

        transform:
            translateY(20px);

    }

    to {

        opacity: 1;

        transform:
            translateY(0);

    }

}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 900px) {

    #testimoni-section .testimonial-card {

        min-height: 240px;

    }

}


@media (max-width: 600px) {

    #testimoni-section .testimonial-card {

        min-height: 250px;

        padding: 24px;

    }

}

</style>