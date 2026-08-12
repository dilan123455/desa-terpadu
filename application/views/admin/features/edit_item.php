<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <title>Edit Fitur</title>

    <link rel="stylesheet"
          href="<?= base_url('assets/css/output.css'); ?>">
</head>

<body class="bg-gray-100">

<div class="max-w-3xl mx-auto px-6 py-10">

    <div class="bg-white rounded-2xl shadow-sm p-8">

        <h1 class="text-2xl font-bold mb-6">
            Edit Fitur
        </h1>


        <form
            action="<?= site_url('admin/features/update-item/' . $item->id); ?>"
            method="post"
        >

            <div class="mb-5">

                <label class="block font-semibold mb-2">
                    Platform
                </label>

                <select
                    name="platform_id"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3"
                >

                    <?php foreach ($platforms as $platform): ?>

                        <option
                            value="<?= $platform->id; ?>"
                            <?= $platform->id == $item->platform_id ? 'selected' : ''; ?>
                        >
                            <?= html_escape($platform->name); ?>
                        </option>

                    <?php endforeach; ?>

                </select>

            </div>


            <div class="mb-5">

                <label class="block font-semibold mb-2">
                    Nama Fitur
                </label>

                <input
                    type="text"
                    name="title"
                    value="<?= html_escape($item->title); ?>"
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
                    rows="4"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3"
                    required
                ><?= html_escape($item->description); ?></textarea>

            </div>


            <div class="mb-5">

                <label class="block font-semibold mb-2">
                    Icon
                </label>

                <input
                    type="text"
                    name="icon"
                    value="<?= html_escape($item->icon); ?>"
                    placeholder="URL / path icon"
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
                    value="<?= html_escape($item->sort_order); ?>"
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