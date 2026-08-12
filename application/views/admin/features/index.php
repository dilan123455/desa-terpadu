<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?= html_escape($title); ?></title>

    <link rel="stylesheet"
          href="<?= base_url('assets/css/output.css'); ?>">
</head>

<body class="bg-gray-100">

<div class="max-w-7xl mx-auto px-6 py-10">

    <div class="mb-8">

        <h1 class="text-3xl font-bold text-gray-900">
            Fitur Unggulan
        </h1>

        <p class="text-gray-600 mt-2">
            Kelola informasi platform dan fitur Desa Terpadu.
        </p>

    </div>


    <?php foreach ($platforms as $platform): ?>

        <div class="bg-white rounded-2xl shadow-sm mb-8 overflow-hidden">

            <div class="p-6 border-b border-gray-200">

                <div class="flex justify-between items-start gap-4">

                    <div>

                        <h2 class="text-2xl font-bold text-gray-900">
                            <?= html_escape($platform->name); ?>
                        </h2>

                        <p class="text-gray-600 mt-2 leading-relaxed">
                            <?= html_escape($platform->description); ?>
                        </p>

                    </div>

                    <a
                        href="<?= site_url('admin/features/edit-platform/' . $platform->id); ?>"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm"
                    >
                        Edit Platform
                    </a>

                </div>

            </div>


            <div class="p-6">

                <h3 class="font-bold text-lg mb-4">
                    Daftar Fitur
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

                    <?php foreach ($items as $item): ?>

                        <?php if ($item->platform_id == $platform->id): ?>

                            <div class="border border-gray-200 rounded-xl p-4">

                                <div class="flex justify-between gap-3">

                                    <div>

                                        <h4 class="font-bold text-gray-900">
                                            <?= html_escape($item->title); ?>
                                        </h4>

                                        <p class="text-sm text-gray-600 mt-1">
                                            <?= html_escape($item->description); ?>
                                        </p>

                                    </div>

                                    <a
                                        href="<?= site_url('admin/features/edit-item/' . $item->id); ?>"
                                        class="text-blue-600 text-sm font-semibold"
                                    >
                                        Edit
                                    </a>

                                </div>

                            </div>

                        <?php endif; ?>

                    <?php endforeach; ?>

                </div>

            </div>

        </div>

    <?php endforeach; ?>

</div>

</body>
</html>