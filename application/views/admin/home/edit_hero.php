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
                Edit Hero
            </h1>

            <p class="text-sm text-gray-400 mt-1">
                Ubah konten Hero halaman utama
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

        <div class="max-w-3xl">

            <div class="mb-6">

                <a
                    href="<?= site_url('admin/home'); ?>"
                    class="text-sm text-red-500
                           hover:text-red-600"
                >
                    ← Kembali ke Home
                </a>

                <h2
                    class="text-2xl
                           font-bold
                           text-gray-800
                           mt-3"
                >
                    Edit Hero
                </h2>

            </div>


            <form
                action="<?= site_url('admin/home/update-hero'); ?>"
                method="POST"
                class="bg-white
                       border border-gray-200
                       rounded-2xl
                       shadow-sm
                       p-6"
            >

                <input
                    type="hidden"
                    name="id"
                    value="<?= $hero->id; ?>"
                >


                <!-- TAGLINE -->

                <div class="mb-5">

                    <label
                        class="block
                               text-sm
                               font-semibold
                               text-gray-700
                               mb-2"
                    >
                        Tagline
                    </label>

                    <input
                        type="text"
                        name="tagline"
                        value="<?= html_escape($hero->tagline); ?>"
                        class="w-full
                               border border-gray-300
                               rounded-lg
                               px-4 py-3
                               text-sm
                               focus:outline-none
                               focus:ring-2
                               focus:ring-red-200
                               focus:border-red-400"
                        required
                    >

                </div>


                <!-- TITLE -->

                <div class="mb-5">

                    <label
                        class="block
                               text-sm
                               font-semibold
                               text-gray-700
                               mb-2"
                    >
                        Judul Hero
                    </label>

                    <input
                        type="text"
                        name="title"
                        value="<?= html_escape($hero->title); ?>"
                        class="w-full
                               border border-gray-300
                               rounded-lg
                               px-4 py-3
                               text-sm
                               focus:outline-none
                               focus:ring-2
                               focus:ring-red-200
                               focus:border-red-400"
                        required
                    >

                </div>


                <!-- DESCRIPTION -->

                <div class="mb-5">

                    <label
                        class="block
                               text-sm
                               font-semibold
                               text-gray-700
                               mb-2"
                    >
                        Deskripsi
                    </label>

                    <textarea
                        name="description"
                        rows="5"
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
                        required
                    ><?= html_escape($hero->description); ?></textarea>

                </div>


               <!-- IMAGE -->

<div class="mb-6">

    <label
        class="block
               text-sm
               font-semibold
               text-gray-700
               mb-2"
    >
        Gambar Hero
    </label>


    <select
        name="image"
        class="w-full
               border border-gray-300
               rounded-lg
               px-4 py-3
               text-sm
               focus:outline-none
               focus:ring-2
               focus:ring-red-200
               focus:border-red-400"
    >

        <option
            value="gambar_pc.png"
            <?= ($hero->image === 'gambar_pc.png') ? 'selected' : ''; ?>
        >
            gambar_pc.png
        </option>

        <option
            value="hero-2.png"
            <?= ($hero->image === 'hero-2.png') ? 'selected' : ''; ?>
        >
            hero-2.png
        </option>

        <option
            value="hero-3.png"
            <?= ($hero->image === 'hero-3.png') ? 'selected' : ''; ?>
        >
            hero-3.png
        </option>

    </select>


    <p class="text-xs text-gray-400 mt-2">
        Pilih gambar yang sudah disimpan secara manual
        di folder assets/uploads/home/.
    </p>


    <!-- PREVIEW -->

    <div class="mt-4">

        <p class="text-xs text-gray-400 mb-2">
            Preview
        </p>

        <div
            class="bg-gray-50
                   border border-gray-200
                   rounded-xl
                   p-4"
        >

            <img
    id="hero-image-preview"
    src="<?= base_url('assets/uploads/home/' . $hero->image); ?>?v=<?= time(); ?>"
    alt="Preview Hero"
    class="max-w-md
           w-full
           h-auto
           rounded-lg
           object-contain"
>

        </div>

    </div>

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
                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>

    </main>

</div>


<script>
document.addEventListener('DOMContentLoaded', function () {

    const imageSelect = document.querySelector('select[name="image"]');
    const imagePreview = document.getElementById('hero-image-preview');

    if (!imageSelect || !imagePreview) {
        return;
    }

    imageSelect.addEventListener('change', function () {

        const imageName = this.value;

        const imageUrl =
            '<?= base_url('assets/uploads/home/'); ?>' +
            imageName +
            '?v=' + new Date().getTime();

        console.log('Preview image:', imageUrl);

        imagePreview.src = imageUrl;

    });

});
</script>
</body>
</html>