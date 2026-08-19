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


            <!-- TOPBAR -->

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
                        Tambahkan platform baru Desa Terpadu
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


            <!-- CONTENT -->

            <main class="p-4 sm:p-8 pt-24 sm:pt-28 min-h-screen">


                <!-- PAGE HEADER -->

                <div class="mb-6">

                    <h2 class="text-2xl font-bold text-gray-800">
                        Tambah Platform
                    </h2>

                    <p class="text-sm text-gray-500 mt-1">
                        Tambahkan platform baru untuk fitur unggulan Desa Terpadu.
                    </p>

                </div>


                <!-- FORM CARD -->

                <div class="bg-white border border-gray-200
                            rounded-2xl shadow-sm">

                    <form
                        action="<?= site_url('admin/features/store-platform'); ?>"
                        method="post"
                        class="p-6 sm:p-8"
                    >


                        <!-- NAMA PLATFORM -->

                        <div class="mb-5">

                            <label
                                for="name"
                                class="block text-sm font-semibold
                                       text-gray-700 mb-2"
                            >
                                Nama Platform
                            </label>

                            <input
                                type="text"
                                id="name"
                                name="name"
                                required
                                placeholder="Contoh: Aplikasi Desa"
                                class="w-full px-4 py-3
                                       bg-gray-50
                                       border border-gray-200
                                       rounded-lg
                                       text-gray-800
                                       placeholder-gray-400
                                       focus:outline-none
                                       focus:ring-2
                                       focus:ring-red-400
                                       focus:border-transparent"
                            >

                        </div>


                        <!-- DESKRIPSI -->

                        <div class="mb-5">

                            <label
                                for="description"
                                class="block text-sm font-semibold
                                       text-gray-700 mb-2"
                            >
                                Deskripsi
                            </label>

                            <textarea
                                id="description"
                                name="description"
                                rows="5"
                                placeholder="Masukkan deskripsi platform..."
                                class="w-full px-4 py-3
                                       bg-gray-50
                                       border border-gray-200
                                       rounded-lg
                                       text-gray-800
                                       placeholder-gray-400
                                       focus:outline-none
                                       focus:ring-2
                                       focus:ring-red-400
                                       focus:border-transparent
                                       resize-none"
                            ></textarea>

                        </div>


                        <!-- IMAGE -->

                        <div class="mb-5">

                            <label
                                for="image"
                                class="block text-sm font-semibold
                                       text-gray-700 mb-2"
                            >
                                Image
                            </label>

                            <input
                                type="text"
                                id="image"
                                name="image"
                                placeholder="Contoh: assets/images/platform.png"
                                class="w-full px-4 py-3
                                       bg-gray-50
                                       border border-gray-200
                                       rounded-lg
                                       text-gray-800
                                       placeholder-gray-400
                                       focus:outline-none
                                       focus:ring-2
                                       focus:ring-red-400
                                       focus:border-transparent"
                            >

                            <p class="text-xs text-gray-400 mt-2">
                                Masukkan path gambar jika platform menggunakan gambar.
                            </p>

                        </div>


                        <!-- SORT ORDER -->

                        <div class="mb-8">

                            <label
                                for="sort_order"
                                class="block text-sm font-semibold
                                       text-gray-700 mb-2"
                            >
                                Urutan
                            </label>

                            <input
                                type="number"
                                id="sort_order"
                                name="sort_order"
                                value="0"
                                min="0"
                                class="w-full px-4 py-3
                                       bg-gray-50
                                       border border-gray-200
                                       rounded-lg
                                       text-gray-800
                                       focus:outline-none
                                       focus:ring-2
                                       focus:ring-red-400
                                       focus:border-transparent"
                            >

                            <p class="text-xs text-gray-400 mt-2">
                                Semakin kecil angka, semakin awal platform ditampilkan.
                            </p>

                        </div>


                        <!-- ACTION -->

                        <div
                            class="flex flex-col-reverse sm:flex-row
                                   justify-end gap-3"
                        >

                            <a
                                href="<?= site_url('admin/features'); ?>"
                                class="inline-flex items-center
                                       justify-center
                                       px-5 py-2.5
                                       bg-gray-100
                                       text-gray-700
                                       rounded-lg
                                       text-sm font-semibold
                                       hover:bg-gray-200
                                       transition"
                            >
                                Batal
                            </a>


                            <button
                                type="submit"
                                class="inline-flex items-center
                                       justify-center gap-2
                                       px-5 py-2.5
                                       bg-red-500
                                       text-white
                                       rounded-lg
                                       text-sm font-semibold
                                       hover:bg-red-600
                                       transition"
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

                                Simpan Platform

                            </button>

                        </div>

                    </form>

                </div>


                <!-- FOOTER -->

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