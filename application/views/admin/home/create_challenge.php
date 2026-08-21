<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <link
        rel="stylesheet"
        href="<?= base_url('assets/css/output.css'); ?>"
    >

    <title>
        <?= html_escape($title); ?> - Desa Terpadu
    </title>

</head>


<body class="bg-gray-100 text-gray-800 min-h-screen">


<?php $this->load->view('admin/sidebar'); ?>


<div class="ml-0 lg:ml-64">


    <!-- TOPBAR -->

    <header
        class="fixed top-0 right-0 left-0 lg:left-64
               h-20 bg-white border-b border-gray-200
               flex items-center justify-between
               px-4 sm:px-8 z-40"
    >

        <div>

            <h1 class="text-xl font-bold">
                Tambah Tantangan Desa
            </h1>

            <p class="text-sm text-gray-400 mt-1">
                Tambahkan informasi tantangan desa
            </p>

        </div>


        <div class="flex items-center gap-3">

            <div class="text-right hidden sm:block">

                <p class="text-sm font-semibold">
                    <?= html_escape($name); ?>
                </p>

                <p class="text-xs text-gray-400">
                    Administrator
                </p>

            </div>


            <div
                class="w-10 h-10 rounded-full
                       bg-red-500
                       flex items-center justify-center
                       text-white font-bold"
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

    <main class="p-4 sm:p-8 pt-24 sm:pt-28">

        <div class="max-w-2xl">

            <a
                href="<?= site_url('admin/home'); ?>"
                class="text-sm
                       text-red-500
                       hover:text-red-600"
            >
                ← Kembali ke Home
            </a>


            <h2
                class="text-2xl
                       font-bold
                       text-gray-800
                       mt-3 mb-6"
            >
                Tambah Tantangan Desa
            </h2>


            <?php if ($this->session->flashdata('error')): ?>

                <div
                    class="mb-5
                           px-4 py-3
                           bg-red-50
                           border border-red-200
                           text-red-600
                           rounded-lg
                           text-sm"
                >

                    <?= html_escape(
                        $this->session->flashdata('error')
                    ); ?>

                </div>

            <?php endif; ?>


            <form
                action="<?= site_url(
                    'admin/home/store-challenge'
                ); ?>"
                method="POST"
                class="bg-white
                       border border-gray-200
                       rounded-2xl
                       shadow-sm
                       p-6"
            >


                <!-- TITLE -->

                <div class="mb-6">

                    <label
                        class="block
                               text-sm
                               font-semibold
                               text-gray-700
                               mb-2"
                    >
                        Tantangan
                    </label>

                    <textarea
                        name="title"
                        rows="4"
                        class="w-full
                               border border-gray-300
                               rounded-lg
                               px-4 py-3
                               text-sm
                               resize-none
                               focus:outline-none
                               focus:ring-2
                               focus:ring-red-200
                               focus:border-red-400"
                        placeholder="Contoh: Administrasi manual yang lambat dan rumit"
                        required
                    ></textarea>

                </div>


                <!-- BUTTON -->

                <div
                    class="flex
                           flex-col sm:flex-row
                           gap-3"
                >

                    <a
                        href="<?= site_url('admin/home'); ?>"
                        class="px-5 py-3
                               border border-gray-300
                               rounded-lg
                               text-sm
                               font-semibold
                               text-gray-600
                               text-center
                               hover:bg-gray-50"
                    >
                        Batal
                    </a>


                    <button
                        type="submit"
                        class="px-5 py-3
                               bg-red-500
                               hover:bg-red-600
                               text-white
                               rounded-lg
                               text-sm
                               font-semibold"
                    >
                        Tambahkan
                    </button>

                </div>


            </form>

        </div>

    </main>

</div>


</body>
</html>