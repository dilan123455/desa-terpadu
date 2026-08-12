<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <title>
        Edit <?= html_escape($platform->name); ?>
    </title>

    <link rel="stylesheet"
          href="<?= base_url('assets/css/output.css'); ?>">
</head>

<body class="bg-gray-100">

<div class="max-w-3xl mx-auto px-6 py-10">

    <div class="bg-white rounded-2xl shadow-sm p-8">

        <h1 class="text-2xl font-bold mb-6">
            Edit Platform
        </h1>


        <form
            action="<?= site_url('admin/features/update-platform/' . $platform->id); ?>"
            method="post"
        >

            <div class="mb-5">

                <label class="block font-semibold mb-2">
                    Nama Platform
                </label>

                <input
                    type="text"
                    name="name"
                    value="<?= html_escape($platform->name); ?>"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3"
                    required
                >

            </div>


            <div class="mb-5">

                <label class="block font-semibold mb-2">
                    Deskripsi
                </label>

                <textarea
                    name="description"
                    rows="6"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3"
                    required
                ><?= html_escape($platform->description); ?></textarea>

            </div>


            <div class="mb-5">

                <label class="block font-semibold mb-2">
                    Gambar / URL Gambar
                </label>

                <input
                    type="text"
                    name="image"
                    value="<?= html_escape($platform->image); ?>"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3"
                >

            </div>


            <div class="mb-6">

                <label class="block font-semibold mb-2">
                    Urutan
                </label>

                <input
                    type="number"
                    name="sort_order"
                    value="<?= html_escape($platform->sort_order); ?>"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3"
                >

            </div>


            <div class="flex gap-3">

                <a
                    href="<?= site_url('admin/features'); ?>"
                    class="px-5 py-3 bg-gray-200 rounded-lg"
                >
                    Kembali
                </a>

                <button
                    type="submit"
                    class="px-5 py-3 bg-blue-600 text-white rounded-lg"
                >
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>