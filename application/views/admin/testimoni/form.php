<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?= base_url('assets/css/output.css'); ?>">

    <title><?= html_escape($title); ?> - Desa Terpadu</title>
</head>

<body class="bg-gray-100 text-gray-800 min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-2xl">

        <!-- Header -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">
                <?= html_escape($title); ?>
            </h1>
            <p class="text-sm text-gray-500 mt-1">
                <?= $action === 'edit'
                    ? 'Perbarui informasi testimoni.'
                    : 'Tambahkan testimoni baru.'; ?>
            </p>
        </div>

        <!-- Flash Error -->
        <?php if ($this->session->flashdata('error')): ?>
            <div class="flex items-center gap-2 px-4 py-3 mb-5 rounded-lg bg-red-50 text-red-700 border border-red-200 text-sm">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <?= html_escape($this->session->flashdata('error')); ?>
            </div>
        <?php endif; ?>

        <!-- Validation Errors -->
        <?php if (validation_errors()): ?>
            <div class="flex items-start gap-2 px-4 py-3 mb-5 rounded-lg bg-red-50 text-red-700 border border-red-200 text-sm">
                <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <div>
                    <strong class="block mb-1">Periksa kembali data:</strong>
                    <?= validation_errors(); ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- Card Form -->
        <div class="bg-white border border-gray-200 rounded-2xl shadow-sm p-6 sm:p-8">

            <h3 class="text-lg font-semibold text-gray-800 mb-6 pb-4 border-b border-gray-100">
                Informasi Testimoni
            </h3>

            <form action="<?= $action === 'edit'
                ? site_url('admin/testimoni/update/' . $item->id)
                : site_url('admin/testimoni/store'); ?>"
                method="post" enctype="multipart/form-data">

                <!-- Nama -->
                <div class="mb-5">
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                        Nama <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="name" name="name"
                        value="<?= set_value('name', isset($item->name) ? $item->name : ''); ?>"
                        placeholder="Contoh: I Made Arya"
                        required
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:border-red-500 focus:ring-2 focus:ring-red-100 text-sm">
                    <p class="mt-2 text-xs text-gray-400">Masukkan nama orang yang memberikan testimoni.</p>
                </div>

                <!-- Jabatan -->
                <div class="mb-5">
                    <label for="position" class="block text-sm font-semibold text-gray-700 mb-2">Jabatan</label>
                    <input type="text" id="position" name="position"
                        value="<?= set_value('position', isset($item->position) ? $item->position : ''); ?>"
                        placeholder="Contoh: Kepala Desa"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:border-red-500 focus:ring-2 focus:ring-red-100 text-sm">
                </div>

                <!-- Isi Testimoni -->
                <div class="mb-5">
                    <label for="content" class="block text-sm font-semibold text-gray-700 mb-2">
                        Isi Testimoni <span class="text-red-500">*</span>
                    </label>
                    <textarea id="content" name="content"
                        rows="5"
                        placeholder="Tuliskan isi testimoni..."
                        required
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:border-red-500 focus:ring-2 focus:ring-red-100 text-sm resize-y"><?= set_value('content', isset($item->content) ? $item->content : ''); ?></textarea>
                    <p class="mt-2 text-xs text-gray-400">Tuliskan pengalaman atau pendapat dari pemberi testimoni.</p>
                </div>

                <!-- Foto -->
                <div class="mb-5">
                    <label for="photo" class="block text-sm font-semibold text-gray-700 mb-2">Foto</label>

                    <input type="file" id="photo" name="photo"
                        accept=".jpg,.jpeg,.png"
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-red-600 hover:file:bg-red-100 cursor-pointer">
                    <p class="mt-2 text-xs text-gray-400">
                        <?= $action === 'edit' ? 'Pilih foto baru jika ingin mengganti foto.' : 'Pilih foto untuk testimoni.'; ?>
                        Format JPG, JPEG, atau PNG. Maksimal 5 MB.
                    </p>

                    <!-- Preview Foto -->
                    <div class="mt-3" id="photoPreviewContainer">
                        <?php if ($action === 'edit' && !empty($item->photo)): ?>
                            <span class="block text-xs font-semibold text-gray-500 mb-2">Foto saat ini:</span>
                            <img id="imagePreview"
                                src="<?= base_url('uploads/testimoni/' . $item->photo); ?>"
                                alt="<?= html_escape($item->name); ?>"
                                class="w-32 h-32 object-cover rounded-lg border border-gray-200">
                        <?php else: ?>
                            <img id="imagePreview"
                                src=""
                                alt="Preview"
                                class="w-32 h-32 object-cover rounded-lg border border-gray-200 hidden">
                        <?php endif; ?>
                    </div>

                    <!-- Hapus Foto (hanya edit & ada foto) -->
                    <?php if ($action === 'edit' && !empty($item->photo)): ?>
                        <div class="mt-4 px-4 py-3 bg-red-50 border border-red-200 rounded-lg">
                            <label for="remove_photo" class="flex items-center gap-2 text-sm font-semibold text-red-600 cursor-pointer">
                                <input type="checkbox" name="remove_photo" id="remove_photo" value="1"
                                    class="rounded border-gray-300 text-red-500 focus:ring-red-400">
                                Hapus foto
                            </label>
                            <p class="mt-1 ml-6 text-xs text-gray-500">Centang jika ingin menghapus foto saat ini.</p>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Status -->
                <div class="mb-6">
                    <span class="block text-sm font-semibold text-gray-700 mb-2">Status Testimoni</span>
                    <div class="px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg">
                        <label for="is_active" class="flex items-center gap-2 text-sm font-semibold text-gray-700 cursor-pointer">
                            <input type="checkbox" id="is_active" name="is_active" value="1"
                                <?= (!isset($item) || !$item || $item->status === 'active') ? 'checked' : ''; ?>
                                class="rounded border-gray-300 text-red-500 focus:ring-red-400">
                            Aktif
                        </label>
                        <p class="mt-1 ml-6 text-xs text-gray-500">Testimoni aktif akan ditampilkan pada website.</p>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex flex-col sm:flex-row justify-end gap-3 pt-5 border-t border-gray-100">
                    <a href="<?= site_url('admin/testimoni'); ?>"
                        class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-gray-200 text-gray-700 rounded-lg text-sm font-semibold hover:bg-gray-300 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Batal
                    </a>
                    <button type="submit"
                        class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-red-500 text-white rounded-lg text-sm font-semibold shadow-md hover:bg-red-600 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Simpan
                    </button>
                </div>

            </form>

        </div>

    </div>

    <!-- Script Preview & Hapus Foto -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const photoInput = document.getElementById('photo');
            const imagePreview = document.getElementById('imagePreview');
            const removePhoto = document.getElementById('remove_photo');
            const previewLabel = document.querySelector('.photo-preview-label'); // opsional

            // Preview foto baru
            if (photoInput && imagePreview) {
                photoInput.addEventListener('change', function (event) {
                    const file = event.target.files[0];
                    if (!file) return;

                    // Batal centang hapus foto jika memilih foto baru
                    if (removePhoto) removePhoto.checked = false;

                    imagePreview.src = URL.createObjectURL(file);
                    imagePreview.classList.remove('hidden');
                });
            }

            // Toggle hapus foto
            if (removePhoto && imagePreview) {
                removePhoto.addEventListener('change', function () {
                    if (this.checked) {
                        imagePreview.classList.add('hidden');
                    } else {
                        // Jika tidak ada file baru dipilih, tampilkan kembali foto lama
                        if (photoInput && !photoInput.files.length) {
                            <?php if ($action === 'edit' && !empty($item->photo)): ?>
                                imagePreview.src = "<?= base_url('uploads/testimoni/' . $item->photo); ?>";
                                imagePreview.classList.remove('hidden');
                            <?php endif; ?>
                        }
                    }
                });
            }
        });
    </script>

</body>

</html>