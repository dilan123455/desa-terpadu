<style>
    .testimoni-page {
        max-width: 900px;
        margin: 0 auto;
        padding: 30px;
    }

    .testimoni-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .testimoni-header h2 {
        margin: 0 0 6px;
        font-size: 28px;
        font-weight: 700;
        color: #222;
    }

    .testimoni-header p {
        margin: 0;
        color: #777;
        font-size: 14px;
    }

    .btn-kembali {
        display: inline-block;
        padding: 9px 16px;
        background: #f1f1f1;
        color: #333;
        text-decoration: none;
        border-radius: 6px;
        font-size: 14px;
    }

    .btn-kembali:hover {
        background: #ddd;
    }

    .testimoni-card {
        background: #fff;
        border: 1px solid #e5e5e5;
        border-radius: 10px;
        padding: 30px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
    }

    .testimoni-card-title {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 1px solid #eee;
    }

    .form-group {
        margin-bottom: 22px;
    }

    .form-group label {
        display: block;
        font-weight: 600;
        margin-bottom: 8px;
        color: #333;
        font-size: 14px;
    }

    .required {
        color: #dc3545;
    }

    .form-control {
        width: 100%;
        box-sizing: border-box;
        padding: 11px 13px;
        border: 1px solid #d5d5d5;
        border-radius: 6px;
        font-size: 14px;
        outline: none;
        transition: border-color 0.2s;
    }

    .form-control:focus {
        border-color: #4c8bf5;
    }

    textarea.form-control {
        min-height: 130px;
        resize: vertical;
    }

    .form-help {
        display: block;
        margin-top: 6px;
        font-size: 12px;
        color: #888;
    }

    .file-input {
        width: 100%;
        padding: 10px;
        border: 1px solid #d5d5d5;
        border-radius: 6px;
        box-sizing: border-box;
        background: #fafafa;
    }

    /* =========================
       PHOTO
    ========================= */

    .photo-preview {
        margin-top: 15px;
    }

    .photo-preview-label {
        display: block;
        margin-bottom: 8px;
        font-size: 12px;
        color: #888;
    }

    .photo-preview img {
        width: 120px;
        height: 120px;
        object-fit: cover;
        border-radius: 8px;
        border: 1px solid #ddd;
        display: block;
    }

    .remove-photo-box {
        margin-top: 12px;
        padding: 10px 12px;
        background: #fff5f5;
        border: 1px solid #f5c2c7;
        border-radius: 6px;
    }

    .remove-photo-label {
        display: flex !important;
        align-items: center;
        gap: 8px;
        margin: 0 !important;
        color: #dc3545 !important;
        font-weight: 600 !important;
        cursor: pointer;
    }

    .remove-photo-label input {
        width: 16px;
        height: 16px;
        margin: 0;
        cursor: pointer;
    }

    .remove-photo-help {
        margin: 5px 0 0 24px;
        font-size: 12px;
        color: #888;
    }

    /* =========================
       STATUS
    ========================= */

    .status-box {
        padding: 15px;
        background: #f8f9fa;
        border-radius: 7px;
        border: 1px solid #eee;
    }

    .status-label {
        display: flex;
        align-items: center;
        gap: 8px;
        font-weight: 600;
        cursor: pointer;
    }

    .status-label input {
        width: 16px;
        height: 16px;
    }

    /* =========================
       BUTTON
    ========================= */

    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        padding-top: 20px;
        border-top: 1px solid #eee;
    }

    .btn {
        display: inline-block;
        padding: 10px 18px;
        border-radius: 6px;
        text-decoration: none;
        border: none;
        cursor: pointer;
        font-size: 14px;
    }

    .btn-secondary {
        background: #e9ecef;
        color: #333;
    }

    .btn-primary {
        background: #0d6efd;
        color: white;
    }

    .btn-primary:hover {
        background: #0b5ed7;
    }

    /* =========================
       ERROR
    ========================= */

    .alert-error {
        background: #f8d7da;
        color: #842029;
        border: 1px solid #f5c2c7;
        padding: 12px 15px;
        border-radius: 6px;
        margin-bottom: 20px;
    }

    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 700px) {

        .testimoni-page {
            padding: 15px;
        }

        .testimoni-header {
            display: block;
        }

        .btn-kembali {
            margin-top: 15px;
        }

        .testimoni-card {
            padding: 20px;
        }

        .form-actions {
            justify-content: stretch;
        }

        .form-actions .btn {
            flex: 1;
            text-align: center;
        }
    }
</style>


<div class="testimoni-page">

    <!-- =====================================================
         HEADER
    ====================================================== -->

    <div class="testimoni-header">

        <div>
            <h2><?= html_escape($title) ?></h2>

            <p>
                <?= $action === 'edit'
                    ? 'Perbarui informasi testimoni.'
                    : 'Tambahkan testimoni baru.'
                ?>
            </p>
        </div>

        <a
            href="<?= base_url('admin/testimoni') ?>"
            class="btn-kembali"
        >
            ← Kembali
        </a>

    </div>


    <!-- =====================================================
         ERROR VALIDATION
    ====================================================== -->

    <?php if (validation_errors()): ?>

        <div class="alert-error">
            <strong>Periksa kembali data:</strong>
            <?= validation_errors() ?>
        </div>

    <?php endif; ?>


    <!-- =====================================================
         FORM
    ====================================================== -->

    <div class="testimoni-card">

        <div class="testimoni-card-title">
            Informasi Testimoni
        </div>


        <form
            action="<?= $action === 'edit'
                ? site_url('admin/testimoni/update/' . $item->id)
                : site_url('admin/testimoni/store'); ?>"
            method="post"
            enctype="multipart/form-data"
        >

            <!-- =================================================
                 NAMA
            ================================================== -->

            <div class="form-group">

                <label for="name">
                    Nama <span class="required">*</span>
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    class="form-control"
                    value="<?= set_value('name', isset($item->name) ? $item->name : '') ?>"
                    placeholder="Contoh: I Made Arya"
                    required
                >

                <small class="form-help">
                    Masukkan nama orang yang memberikan testimoni.
                </small>

            </div>


            <!-- =================================================
                 JABATAN
            ================================================== -->

            <div class="form-group">

                <label for="position">
                    Jabatan
                </label>

                <input
                    type="text"
                    id="position"
                    name="position"
                    class="form-control"
                    value="<?= set_value('position', isset($item->position) ? $item->position : '') ?>"
                    placeholder="Contoh: Kepala Desa"
                >

            </div>


            <!-- =================================================
                 ISI TESTIMONI
            ================================================== -->

            <div class="form-group">

                <label for="content">
                    Isi Testimoni <span class="required">*</span>
                </label>

                <textarea
                    id="content"
                    name="content"
                    class="form-control"
                    placeholder="Tuliskan isi testimoni..."
                    required
                ><?= set_value('content', isset($item->content) ? $item->content : '') ?></textarea>

                <small class="form-help">
                    Tuliskan pengalaman atau pendapat dari pemberi testimoni.
                </small>

            </div>


            <!-- =================================================
                 FOTO
            ================================================== -->

            <div class="form-group">

                <label for="photo">
                    Foto
                </label>


                <?php if ($action === 'edit'): ?>

                    <small class="form-help">
                        Pilih foto baru jika ingin mengganti foto.
                    </small>

                <?php else: ?>

                    <small class="form-help">
                        Pilih foto untuk testimoni.
                    </small>

                <?php endif; ?>


                <!-- INPUT FOTO -->

                <input
                    type="file"
                    id="photo"
                    name="photo"
                    class="file-input"
                    accept="image/jpeg,image/png,image/jpg"
                >


                <!-- PREVIEW FOTO -->

                <div
                    class="photo-preview"
                    id="photoPreviewContainer"
                >

                    <?php if (
                        $action === 'edit' &&
                        !empty($item->photo)
                    ): ?>

                        <span class="photo-preview-label">
                            Foto saat ini:
                        </span>

                        <img
                            id="imagePreview"
                            src="<?= base_url('uploads/testimoni/' . $item->photo) ?>"
                            alt="<?= html_escape($item->name) ?>"
                        >

                    <?php else: ?>

                        <img
                            id="imagePreview"
                            src=""
                            alt="Preview"
                            style="display: none;"
                        >

                    <?php endif; ?>

                </div>


                <!-- HAPUS FOTO -->

                <?php if (
                    $action === 'edit' &&
                    !empty($item->photo)
                ): ?>

                    <div class="remove-photo-box">

                        <label
                            for="remove_photo"
                            class="remove-photo-label"
                        >

                            <input
                                type="checkbox"
                                name="remove_photo"
                                id="remove_photo"
                                value="1"
                            >

                            Hapus foto

                        </label>

                        <div class="remove-photo-help">
                            Centang jika ingin menghapus foto saat ini.
                        </div>

                    </div>

                <?php endif; ?>


                <small class="form-help">
                    Format JPG, JPEG, atau PNG. Maksimal 5 MB.
                </small>

            </div>


            <!-- =================================================
                 STATUS
            ================================================== -->

            <div class="form-group">

                <label>
                    Status Testimoni
                </label>

                <div class="status-box">

                    <label class="status-label">

                        <input
                            type="checkbox"
                            id="is_active"
                            name="is_active"
                            value="1"
                            <?= (
                                !isset($item) ||
                                !$item ||
                                $item->status === 'active'
                            ) ? 'checked' : '' ?>
                        >

                        Aktif

                    </label>

                    <small class="form-help">
                        Testimoni aktif akan ditampilkan pada website.
                    </small>

                </div>

            </div>


            <!-- =================================================
                 BUTTON
            ================================================== -->

            <div class="form-actions">

                <a
                    href="<?= base_url('admin/testimoni') ?>"
                    class="btn btn-secondary"
                >
                    Batal
                </a>

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Simpan
                </button>

            </div>

        </form>

    </div>

</div>


<!-- =========================================================
     JAVASCRIPT
========================================================= -->

<script>
document.addEventListener('DOMContentLoaded', function () {

    const photoInput = document.getElementById('photo');
    const imagePreview = document.getElementById('imagePreview');
    const removePhoto = document.getElementById('remove_photo');

    /*
    |--------------------------------------------------------------------------
    | PILIH FOTO BARU
    |--------------------------------------------------------------------------
    */

    if (photoInput) {

        photoInput.addEventListener('change', function (event) {

            const file = event.target.files[0];

            if (!file) {
                return;
            }

            /*
             * Kalau user memilih foto baru,
             * otomatis batalkan checkbox hapus.
             */
            if (removePhoto) {
                removePhoto.checked = false;
            }

            /*
             * Tampilkan preview foto baru.
             */
            if (imagePreview) {

                imagePreview.src = URL.createObjectURL(file);
                imagePreview.style.display = 'block';

                const label = document.querySelector(
                    '.photo-preview-label'
                );

                if (label) {
                    label.textContent = 'Preview foto baru:';
                }
            }

        });

    }


    /*
    |--------------------------------------------------------------------------
    | CHECKBOX HAPUS FOTO
    |--------------------------------------------------------------------------
    */

    if (removePhoto) {

        removePhoto.addEventListener('change', function () {

            if (this.checked) {

                /*
                 * Sembunyikan preview saat checkbox hapus dicentang.
                 */
                if (imagePreview) {
                    imagePreview.style.display = 'none';
                }

            } else {

                /*
                 * Jika dibatalkan, tampilkan kembali
                 * foto lama jika memang ada.
                 */
                if (imagePreview) {

                    <?php if (
                        $action === 'edit' &&
                        !empty($item->photo)
                    ): ?>

                        /*
                         * Jika tidak ada foto baru yang dipilih,
                         * kembalikan foto lama.
                         */
                        if (!photoInput.files.length) {
                            imagePreview.src =
                                "<?= base_url('uploads/testimoni/' . $item->photo) ?>";

                            imagePreview.style.display = 'block';
                        }

                    <?php endif; ?>

                }

            }

        });

    }

});
</script>