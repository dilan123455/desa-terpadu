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
                       px-4 sm:px-8 z-40">

                <div>
                    <h1 class="text-xl font-bold text-gray-800">
                        <?= html_escape($title); ?>
                    </h1>

                    <p class="text-sm text-gray-400 mt-1">
                        Tambahkan fitur baru Desa Terpadu
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
                               text-white text-sm font-bold">

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

                <div class="max-w-3xl mx-auto">

                    <!-- BACK -->
                    <a
                        href="<?= site_url('admin/features'); ?>"
                        class="inline-flex items-center gap-2
                               text-sm font-semibold text-gray-600
                               hover:text-red-500 transition mb-6">

                        <svg
                            class="w-4 h-4"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18"
                            />

                        </svg>

                        Kembali ke Features
                    </a>


                    <!-- CARD -->
                    <div
                        class="bg-white border border-gray-200
                               rounded-2xl shadow-sm overflow-hidden">

                        <!-- HEADER -->
                        <div
                            class="px-6 py-5 border-b border-gray-200">

                            <h2 class="text-lg font-bold text-gray-800">
                                Tambah Fitur
                            </h2>

                            <p class="text-sm text-gray-500 mt-1">
                                Tambahkan fitur baru ke platform
                                <?= html_escape($platform->name); ?>.
                            </p>

                        </div>


                        <!-- FORM -->
                        <form
                            action="<?= site_url('admin/features/store-item'); ?>"
                            method="post">

                            <div class="p-6 space-y-5">

                                <!-- PLATFORM -->
                                <div>

                                    <label
                                        for="platform_id"
                                        class="block text-sm font-semibold
                                               text-gray-700 mb-2">

                                        Platform
                                    </label>

                                    <select
                                        id="platform_id"
                                        name="platform_id"
                                        required
                                        class="w-full px-4 py-2.5
                                               border border-gray-300
                                               rounded-lg bg-white
                                               text-sm text-gray-700
                                               focus:outline-none
                                               focus:border-red-500
                                               focus:ring-2 focus:ring-red-100">

                                        <?php foreach ($platforms as $item): ?>

                                            <option
                                                value="<?= $item->id; ?>"
                                                <?= $item->id == $platform->id ? 'selected' : ''; ?>>

                                                <?= html_escape($item->name); ?>

                                            </option>

                                        <?php endforeach; ?>

                                    </select>

                                </div>


                                <!-- TITLE -->
                                <div>

                                    <label
                                        for="title"
                                        class="block text-sm font-semibold
                                               text-gray-700 mb-2">

                                        Nama Fitur
                                    </label>

                                    <input
                                        type="text"
                                        id="title"
                                        name="title"
                                        required
                                        placeholder="Contoh: Data Warga"
                                        class="w-full px-4 py-2.5
                                               border border-gray-300
                                               rounded-lg
                                               text-sm text-gray-700
                                               focus:outline-none
                                               focus:border-red-500
                                               focus:ring-2 focus:ring-red-100">

                                </div>


                                <!-- DESCRIPTION -->
                                <div>

                                    <label
                                        for="description"
                                        class="block text-sm font-semibold
                                               text-gray-700 mb-2">

                                        Deskripsi
                                    </label>

                                    <textarea
                                        id="description"
                                        name="description"
                                        rows="4"
                                        placeholder="Contoh: Kelola data warga dengan cepat dan terpusat."
                                        class="w-full px-4 py-2.5
                                               border border-gray-300
                                               rounded-lg
                                               text-sm text-gray-700
                                               resize-y
                                               focus:outline-none
                                               focus:border-red-500
                                               focus:ring-2 focus:ring-red-100"></textarea>

                                </div>


                                <!-- ICON -->
                                <div>

                                    <label
                                        for="icon"
                                        class="block text-sm font-semibold
                                               text-gray-700 mb-2">

                                        Icon
                                    </label>

                                    <input
                                        type="text"
                                        id="icon"
                                        name="icon"
                                        placeholder="Contoh: users"
                                        class="w-full px-4 py-2.5
                                               border border-gray-300
                                               rounded-lg
                                               text-sm text-gray-700
                                               focus:outline-none
                                               focus:border-red-500
                                               focus:ring-2 focus:ring-red-100">

                                    <p class="text-xs text-gray-400 mt-2">
                                        Isi sesuai format icon yang digunakan
                                        oleh website.
                                    </p>

                                </div>


                                <!-- SORT ORDER -->
                                <div>

                                    <label
                                        for="sort_order"
                                        class="block text-sm font-semibold
                                               text-gray-700 mb-2">

                                        Urutan
                                    </label>

                                    <input
                                        type="number"
                                        id="sort_order"
                                        name="sort_order"
                                        value="0"
                                        min="0"
                                        class="w-full px-4 py-2.5
                                               border border-gray-300
                                               rounded-lg
                                               text-sm text-gray-700
                                               focus:outline-none
                                               focus:border-red-500
                                               focus:ring-2 focus:ring-red-100">

                                    <p class="text-xs text-gray-400 mt-2">
                                        Angka lebih kecil akan ditampilkan
                                        lebih dahulu.
                                    </p>

                                </div>

                            </div>


                            <!-- ACTIONS -->
                            <div
                                class="px-6 py-5 bg-gray-50
                                       border-t border-gray-200
                                       flex flex-col sm:flex-row
                                       justify-end gap-3">

                                <a
                                    href="<?= site_url('admin/features'); ?>"
                                    class="inline-flex items-center
                                           justify-center
                                           px-5 py-2.5
                                           bg-gray-200 text-gray-700
                                           rounded-lg text-sm font-semibold
                                           hover:bg-gray-300 transition">

                                    Batal

                                </a>

                                <button
                                    type="submit"
                                    class="inline-flex items-center
                                           justify-center gap-2
                                           px-5 py-2.5
                                           bg-red-500 text-white
                                           rounded-lg text-sm font-semibold
                                           shadow-md
                                           hover:bg-red-600 transition">

                                    <svg
                                        class="w-4 h-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 13l4 4L19 7"
                                        />

                                    </svg>

                                    Simpan Fitur

                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </main>

        </div>

    </div>

</body>

</html>