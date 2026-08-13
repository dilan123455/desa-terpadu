<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- =====================================================
     PROCESS / LANGKAH IMPLEMENTASI
     Data diambil dari database implementation_steps
====================================================== -->

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
                         STEP <?= $number; ?>
                    ================================================== -->

                    <div class="relative z-10 mb-16 flex flex-row items-start gap-4 lg:mb-24 lg:grid lg:grid-cols-12 lg:items-center lg:gap-8">


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
                                    loading="lazy"
                                    class="w-full max-w-sm rounded-xl object-contain"
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

                            <!-- ==========================================
                                 DESKTOP - TEXT KIRI
                            =========================================== -->

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
                                        loading="lazy"
                                        class="block w-full max-w-sm rounded-xl object-contain"
                                    >

                                <?php endif; ?>

                            </div>


                        <?php else: ?>

                            <!-- ==========================================
                                 DESKTOP - IMAGE KIRI
                            =========================================== -->

                            <div class="hidden lg:flex lg:justify-center lg:col-span-5 lg:col-start-1">

                                <?php if ($image): ?>

                                    <img
                                        src="<?= $image; ?>"
                                        alt="<?= html_escape($step->title); ?>"
                                        loading="lazy"
                                        class="block w-full max-w-sm rounded-xl object-contain"
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

                <!-- Jika database kosong -->

                <div class="py-10 text-center text-gray-500">

                    Belum ada data proses implementasi.

                </div>

            <?php endif; ?>

        </div>

    </div>

</section>