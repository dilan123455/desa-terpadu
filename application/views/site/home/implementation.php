<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- =====================================================
     PROCESS / LANGKAH IMPLEMENTASI
     Data diambil dari database implementation_steps
====================================================== -->

<style>
    /* Animasi reveal untuk setiap langkah implementasi */
    .reveal-step {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.6s ease-out, transform 0.6s ease-out;
    }

    .reveal-step.visible {
        opacity: 1;
        transform: translateY(0);
    }
</style>

<?php
// Atribut lazy loading untuk gambar
$lazy_attrs = 'loading="lazy" decoding="async" fetchpriority="low"';
$img_class  = 'block w-full max-w-sm rounded-xl object-contain';
?>

<section id="implementation_section" class="process-section relative overflow-hidden bg-white py-4 lg:py-6">

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <!-- HEADER -->
        <div class="mb-6 text-center lg:mb-10">

            <p class="mb-2 text-sm font-semibold uppercase tracking-wide text-[#c92a2a] lg:text-base">
                Proses Implementasi Desa Terpadu
            </p>

            <h2 class="text-3xl font-bold text-gray-900 lg:text-5xl">
                Langkah Awal Menuju Desa Digital
            </h2>

        </div>

        <!-- TIMELINE CONTAINER -->
        <div class="relative mx-auto max-w-6xl">

            <!-- GARIS MOBILE -->
            <div class="absolute left-[15px] top-0 bottom-0 z-0 w-[4px] bg-[#c92a2a] lg:hidden"></div>

            <!-- GARIS DESKTOP -->
            <div class="absolute left-1/2 top-0 bottom-0 z-0 hidden w-1 -translate-x-1/2 bg-[#c92a2a] lg:block"></div>

            <?php if (!empty($implementations)): ?>

                <?php foreach ($implementations as $index => $step): ?>

                    <?php
                        $number = !empty($step->sort_order)
                            ? $step->sort_order
                            : ($index + 1);

                        $image = !empty($step->image)
                            ? base_url('assets/uploads/implementation/' . $step->image)
                            : '';
                    ?>

                    <!-- =================================================
                         STEP <?= $number; ?> (dengan reveal animation)
                    ================================================== -->

                    <div class="reveal-step relative z-10 mb-16 flex flex-row items-start gap-4 lg:mb-24 lg:grid lg:grid-cols-12 lg:items-center lg:gap-8">

                        <!-- =========================
                             NUMBER MOBILE
                        ========================== -->

                        <div class="relative z-10 flex-shrink-0 flex flex-col items-center justify-start pt-1 lg:hidden">

                            <div class="z-20 flex h-8 w-8 items-center justify-center rounded-full border-2 border-white bg-[#c92a2a] text-base font-bold text-white">
                                <?= $number; ?>
                            </div>

                        </div>

                        <!-- =========================
                             CONTENT MOBILE
                        ========================== -->

                        <div class="flex flex-1 flex-col gap-2 lg:hidden">

                            <?php if ($image): ?>

                                <img
                                    src="<?= $image; ?>"
                                    alt="<?= html_escape($step->title); ?>"
                                    <?= $lazy_attrs; ?>
                                    class="<?= $img_class; ?>"
                                >

                            <?php endif; ?>

                            <div class="flex flex-col items-start text-left">

                                <h3 class="mb-1 text-xl font-bold text-gray-900">
                                    <?= html_escape($step->title); ?>
                                </h3>

                                <p class="text-sm leading-relaxed text-gray-600">
                                    <?= html_escape($step->description); ?>
                                </p>

                            </div>

                        </div>

                        <?php if ($index % 2 == 0): ?>

                            <!-- DESKTOP - TEXT KIRI -->
                            <div class="hidden lg:flex lg:justify-center lg:col-span-5 lg:col-start-1">

                                <div class="flex w-full max-w-sm flex-col items-start text-left">

                                    <h3 class="mb-3 text-xl font-bold text-gray-900 lg:text-2xl">
                                        <?= html_escape($step->title); ?>
                                    </h3>

                                    <p class="text-sm leading-relaxed text-gray-600 lg:text-base">
                                        <?= html_escape($step->description); ?>
                                    </p>

                                </div>

                            </div>

                            <!-- NUMBER DESKTOP -->
                            <div class="hidden lg:flex lg:justify-center lg:col-span-2 lg:col-start-6">

                                <div class="z-20 flex h-10 w-10 items-center justify-center rounded-full border-4 border-white bg-[#c92a2a] text-lg font-bold text-white shadow-sm">
                                    <?= $number; ?>
                                </div>

                            </div>

                            <!-- IMAGE KANAN -->
                            <div class="hidden lg:flex lg:justify-center lg:col-span-5 lg:col-start-8">

                                <?php if ($image): ?>

                                    <img
                                        src="<?= $image; ?>"
                                        alt="<?= html_escape($step->title); ?>"
                                        <?= $lazy_attrs; ?>
                                        class="<?= $img_class; ?>"
                                    >

                                <?php endif; ?>

                            </div>

                        <?php else: ?>

                            <!-- DESKTOP - IMAGE KIRI -->
                            <div class="hidden lg:flex lg:justify-center lg:col-span-5 lg:col-start-1">

                                <?php if ($image): ?>

                                    <img
                                        src="<?= $image; ?>"
                                        alt="<?= html_escape($step->title); ?>"
                                        <?= $lazy_attrs; ?>
                                        class="<?= $img_class; ?>"
                                    >

                                <?php endif; ?>

                            </div>

                            <!-- NUMBER DESKTOP -->
                            <div class="hidden lg:flex lg:justify-center lg:col-span-2 lg:col-start-6">

                                <div class="z-20 flex h-10 w-10 items-center justify-center rounded-full border-4 border-white bg-[#c92a2a] text-lg font-bold text-white shadow-sm">
                                    <?= $number; ?>
                                </div>

                            </div>

                            <!-- TEXT KANAN -->
                            <div class="hidden lg:flex lg:justify-center lg:col-span-5 lg:col-start-8">

                                <div class="flex w-full max-w-sm flex-col items-start text-left">

                                    <h3 class="mb-3 text-xl font-bold text-gray-900 lg:text-2xl">
                                        <?= html_escape($step->title); ?>
                                    </h3>

                                    <p class="text-sm leading-relaxed text-gray-600 lg:text-base">
                                        <?= html_escape($step->description); ?>
                                    </p>

                                </div>

                            </div>

                        <?php endif; ?>

                    </div>

                <?php endforeach; ?>

            <?php else: ?>

                <div class="py-10 text-center text-gray-500">
                    Belum ada data proses implementasi.
                </div>

            <?php endif; ?>

        </div>

    </div>

</section>

<!-- Script untuk lazy reveal steps -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const revealSteps = document.querySelectorAll('.reveal-step');

        if ('IntersectionObserver' in window) {
            const stepObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.15,
                rootMargin: '0px 0px -50px 0px'
            });

            revealSteps.forEach(step => stepObserver.observe(step));
        } else {
            // Fallback untuk browser lama
            revealSteps.forEach(step => step.classList.add('visible'));
        }
    });
</script>