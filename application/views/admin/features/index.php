<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?= base_url('assets/css/output.css'); ?>">

    <title><?= html_escape($title); ?> - Desa Terpadu</title>

</head>


<body class="bg-gray-100 text-gray-800 min-h-screen">

    <div class="admin-wrapper">

        <!-- SIDEBAR -->
        <?php $this->load->view('admin/sidebar'); ?>


        <!-- MAIN AREA -->
        <div class="ml-0 lg:ml-64">


            <!-- =====================================================
                 TOPBAR
            ====================================================== -->

            <header
                class="fixed top-0 right-0 left-0 lg:left-64 h-20
                       bg-white/95 border-b border-gray-200
                       flex items-center justify-between
                       px-4 sm:px-8 z-40"
            >

                <div>

                    <h1 class="text-xl font-bold text-gray-800">
                        <?= html_escape($title); ?>
                    </h1>

                    <p class="text-sm text-gray-400 mt-1">
                        Kelola fitur unggulan Desa Terpadu
                    </p>

                </div>


                <div class="flex items-center gap-3">

                    <div class="text-right hidden sm:block">

                        <p class="text-sm font-semibold text-gray-800">
                            <?= html_escape($name); ?>
                        </p>

                        <p class="text-xs text-gray-400 mt-1">
                            Administrator
                        </p>

                    </div>


                    <div
                        class="w-10 h-10 rounded-full bg-red-500
                               flex items-center justify-center
                               text-white text-sm font-bold"
                    >

                        <?= strtoupper(
                            substr(
                                html_escape($name),
                                0,
                                1
                            )
                        ); ?>

                    </div>

                </div>

            </header>



            <!-- =====================================================
                 CONTENT
            ====================================================== -->

            <main class="p-4 sm:p-8 pt-24 sm:pt-28 min-h-screen">


                <!-- PAGE HEADER -->

                <div class="mb-6">

                    <h2 class="text-2xl font-bold text-gray-800">
                        Fitur Unggulan
                    </h2>

                    <p class="text-sm text-gray-500 mt-1">
                        Kelola informasi platform dan fitur Desa Terpadu.
                    </p>

                </div>



                <!-- =================================================
                     FLASH SUCCESS
                ================================================== -->

                <?php if ($this->session->flashdata('success')): ?>

                    <div
                        class="flex items-center gap-2 px-4 py-3 mb-5
                               rounded-lg bg-green-50 text-green-700
                               border border-green-200 text-sm"
                    >

                        <svg
                            class="w-5 h-5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M5 13l4 4L19 7"
                            />

                        </svg>

                        <?= html_escape(
                            $this->session->flashdata('success')
                        ); ?>

                    </div>

                <?php endif; ?>



                <!-- =================================================
                     FLASH ERROR
                ================================================== -->

                <?php if ($this->session->flashdata('error')): ?>

                    <div
                        class="flex items-center gap-2 px-4 py-3 mb-5
                               rounded-lg bg-red-50 text-red-700
                               border border-red-200 text-sm"
                    >

                        <svg
                            class="w-5 h-5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 9v4m0 4h.01
                                   M21 12a9 9 0 11-18 0
                                   9 9 0 0118 0z"
                            />

                        </svg>

                        <?= html_escape(
                            $this->session->flashdata('error')
                        ); ?>

                    </div>

                <?php endif; ?>



                <!-- =================================================
                     PLATFORM
                ================================================== -->

                <?php if (!empty($platforms)): ?>


                    <?php foreach ($platforms as $platform): ?>


                        <!-- PLATFORM CARD -->

                        <div
                            class="bg-white border border-gray-200
                                   rounded-2xl shadow-sm overflow-hidden mb-6"
                        >


                            <!-- =====================================
                                 PLATFORM HEADER
                            ====================================== -->

                            <div
                                class="flex flex-col sm:flex-row
                                       sm:items-start sm:justify-between
                                       gap-4 px-6 py-5
                                       border-b border-gray-200"
                            >


                                <div class="flex gap-4">


                                    <!-- ICON -->

                                    <div
                                        class="w-12 h-12 min-w-[48px]
                                               bg-red-50 text-red-500
                                               rounded-xl
                                               flex items-center justify-center"
                                    >

                                        <!-- Ikon Star -->

                                        <svg
                                            class="w-6 h-6"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >

                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M11.049 2.927c.3-.921
                                                   1.603-.921 1.902 0
                                                   l1.519 4.674a1 1 0
                                                   00.95.69h4.915c.969
                                                   0 1.371 1.24.588
                                                   1.81l-3.976 2.888a1
                                                   1 0 00-.363 1.118
                                                   l1.518 4.674c.3.922
                                                   -.755 1.688-1.538
                                                   1.118l-3.976-2.888a1
                                                   1 0 00-1.176 0l-3.976
                                                   2.888c-.783.57-1.838
                                                   -.196-1.538-1.118l1.518
                                                   -4.674a1 1 0 00-.363
                                                   -1.118L3.04 9.?
                                                "
                                            />

                                        </svg>

                                    </div>



                                    <!-- PLATFORM INFO -->

                                    <div>

                                        <h2
                                            class="text-lg font-bold text-gray-800"
                                        >
                                            <?= html_escape(
                                                $platform->name
                                            ); ?>
                                        </h2>


                                        <p
                                            class="mt-1 text-sm text-gray-600
                                                   leading-relaxed max-w-2xl"
                                        >
                                            <?= html_escape(
                                                $platform->description
                                            ); ?>
                                        </p>

                                    </div>

                                </div>



                                <!-- EDIT PLATFORM -->

                                <a
                                    href="<?= site_url(
                                        'admin/features/edit-platform/'
                                        . $platform->id
                                    ); ?>"
                                    class="inline-flex items-center gap-2
                                           px-4 py-2 bg-amber-50
                                           text-amber-700 rounded-lg
                                           text-sm font-semibold
                                           hover:bg-amber-100 transition
                                           whitespace-nowrap self-start"
                                >

                                    <!-- Ikon Pencil -->

                                    <svg
                                        class="w-4 h-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11
                                               a2 2 0 002 2h11a2 2 0
                                               002-2v-5m-1.414-9.414a2
                                               2 0 112.828 2.828L11.828
                                               15H9v-2.828l8.586-8.586z"
                                        />

                                    </svg>


                                    Edit Platform

                                </a>

                            </div>



                            <!-- =====================================
                                 FEATURES SECTION
                            ====================================== -->

                            <div class="p-6">


                                <!-- HEADER DAFTAR FITUR + CREATE -->

                                <div
                                    class="flex items-center
                                           justify-between mb-4 gap-3"
                                >

                                    <h3
                                        class="text-sm font-semibold
                                               text-gray-700"
                                    >
                                        Daftar Fitur
                                    </h3>



                                    <!-- =================================
                                         TAMBAH FITUR
                                    ================================== -->

                                    <a
                                        href="<?= site_url(
                                            'admin/features/create-item/'
                                            . $platform->id
                                        ); ?>"
                                        class="inline-flex items-center
                                               gap-1.5 px-3 py-2
                                               bg-red-50 text-red-600
                                               hover:bg-red-100
                                               rounded-lg text-xs
                                               font-semibold transition"
                                    >

                                        <!-- Plus Icon -->

                                        <svg
                                            class="w-4 h-4"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >

                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M12 4v16M4 12h16"
                                            />

                                        </svg>


                                        Tambah Fitur

                                    </a>

                                </div>



                                <?php

                                $feature_count = 0;

                                $platform_items = array_filter(
                                    $items,
                                    function ($item) use ($platform) {

                                        return
                                            $item->platform_id
                                            == $platform->id;

                                    }
                                );

                                ?>



                                <!-- =====================================
                                     JIKA ADA FITUR
                                ====================================== -->

                                <?php if (!empty($platform_items)): ?>


                                    <div
                                        class="grid grid-cols-1
                                               md:grid-cols-2
                                               xl:grid-cols-3 gap-4"
                                    >


                                        <?php foreach (
                                            $platform_items
                                            as $item
                                        ): ?>


                                            <?php
                                            $feature_count++;
                                            ?>


                                            <!-- FEATURE CARD -->

                                            <div
                                                class="border border-gray-200
                                                       rounded-xl p-4 bg-white
                                                       hover:border-red-200
                                                       hover:shadow-md
                                                       transition"
                                            >


                                                <div
                                                    class="flex items-start
                                                           justify-between gap-3"
                                                >


                                                    <!-- NUMBER -->

                                                    <div
                                                        class="w-8 h-8
                                                               bg-red-50
                                                               text-red-500
                                                               rounded-lg
                                                               flex items-center
                                                               justify-center
                                                               text-xs font-bold"
                                                    >
                                                        <?= $feature_count; ?>
                                                    </div>



                                                    <!-- EDIT -->

                                                    <a
                                                        href="<?= site_url(
                                                            'admin/features/edit-item/'
                                                            . $item->id
                                                        ); ?>"
                                                        class="text-xs font-semibold
                                                               text-gray-500
                                                               hover:text-red-500
                                                               transition"
                                                    >
                                                        Edit
                                                    </a>

                                                </div>



                                                <!-- TITLE -->

                                                <h4
                                                    class="mt-3 text-sm
                                                           font-semibold
                                                           text-gray-800
                                                           leading-snug"
                                                >
                                                    <?= html_escape(
                                                        $item->title
                                                    ); ?>
                                                </h4>



                                                <!-- DESCRIPTION -->

                                                <p
                                                    class="mt-1 text-xs
                                                           text-gray-600
                                                           leading-relaxed"
                                                >
                                                    <?= html_escape(
                                                        $item->description
                                                    ); ?>
                                                </p>

                                            </div>


                                        <?php endforeach; ?>


                                    </div>


                                <?php else: ?>


                                    <!-- =================================
                                         EMPTY FEATURE
                                    ================================== -->

                                    <div
                                        class="py-10 text-center
                                               border border-dashed
                                               border-gray-300
                                               rounded-xl text-gray-400"
                                    >

                                        <div
                                            class="w-12 h-12 mx-auto mb-3
                                                   bg-gray-100 text-gray-400
                                                   rounded-full
                                                   flex items-center
                                                   justify-center"
                                        >

                                            <!-- Ikon Star -->

                                            <svg
                                                class="w-6 h-6"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >

                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M11.049 2.927c.3-.921
                                                       1.603-.921 1.902 0
                                                       l1.519 4.674a1 1
                                                       0 00.95.69h4.915
                                                       c.969 0 1.371 1.24
                                                       .588 1.81l-3.976
                                                       2.888a1 1 0 00-.363
                                                       1.118l1.518 4.674
                                                       c.3.922-.755 1.688
                                                       -1.538 1.118l-3.976
                                                       -2.888a1 1 0 00-1.176
                                                       0l-3.976 2.888c-.783
                                                       .57-1.838-.196-1.538
                                                       -1.118l1.518-4.674a1
                                                       1 0 00-.363-1.118
                                                       L3.04 9.401c-.783
                                                       -.57-.38-1.81.588-1.81
                                                       h4.914a1 1 0 00.951
                                                       -.69l1.519-4.674z"
                                                />

                                            </svg>

                                        </div>


                                        <p class="text-sm">
                                            Belum ada fitur untuk platform ini.
                                        </p>

                                    </div>


                                <?php endif; ?>


                            </div>


                        </div>


                    <?php endforeach; ?>


                <?php else: ?>


                    <!-- =================================================
                         EMPTY PLATFORM
                    ================================================== -->

                    <div
                        class="bg-white border border-gray-200
                               rounded-2xl shadow-sm overflow-hidden"
                    >

                        <div class="py-16 text-center">


                            <div
                                class="w-16 h-16 mx-auto mb-4
                                       bg-red-50 text-red-500
                                       rounded-full
                                       flex items-center
                                       justify-center"
                            >

                                <!-- Ikon Star -->

                                <svg
                                    class="w-8 h-8"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M11.049 2.927c.3-.921
                                           1.603-.921 1.902 0l1.519
                                           4.674a1 1 0 00.95.69h4.915
                                           c.969 0 1.371 1.24.588
                                           1.81l-3.976 2.888a1 1
                                           0 00-.363 1.118l1.518
                                           4.674c.3.922-.755 1.688
                                           -1.538 1.118l-3.976-2.888
                                           a1 1 0 00-1.176 0l-3.976
                                           2.888c-.783.57-1.838-.196
                                           -1.538-1.118l1.518-4.674
                                           a1 1 0 00-.363-1.118L3.04
                                           9.401c-.783-.57-.38-1.81
                                           .588-1.81h4.914a1 1 0 00.951
                                           -.69l1.519-4.674z"
                                    />

                                </svg>

                            </div>


                            <strong
                                class="block text-sm font-semibold
                                       text-gray-700"
                            >
                                Belum Ada Platform
                            </strong>


                            <p class="mt-2 text-sm text-gray-500">
                                Belum ada platform yang tersedia.
                            </p>

                        </div>

                    </div>


                <?php endif; ?>



                <!-- =====================================================
                     FOOTER
                ====================================================== -->

                <footer
                    class="mt-8 pt-5 border-t border-gray-200
                           flex flex-col sm:flex-row
                           justify-between gap-4
                           text-xs text-gray-400"
                >

                    <p>
                        © <?= date('Y'); ?> Desa Terpadu
                    </p>

                    <p>
                        Admin Panel
                    </p>

                </footer>


            </main>


        </div>

    </div>

</body>

</html>