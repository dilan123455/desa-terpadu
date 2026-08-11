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
        box-shadow: 0 2px 8px rgba(0,0,0,0.06);
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

    .photo-preview {
        margin-top: 15px;
    }

    .photo-preview img {
        width: 120px;
        height: 120px;
        object-fit: cover;
        border-radius: 8px;
        border: 1px solid #ddd;
    }

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

    .alert-error {
        background: #f8d7da;
        color: #842029;
        border: 1px solid #f5c2c7;
        padding: 12px 15px;
        border-radius: 6px;
        margin-bottom: 20px;
    }

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
    }
</style>


<div class="testimoni-page">

    <!-- Header -->
    <div class="testimoni-header">

        <div>
            <h2><?= $title ?></h2>

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


    <!-- Error -->
    <?php if (validation_errors()): ?>

        <div class="alert-error">
            <strong>Periksa kembali data:</strong>
            <?= validation_errors() ?>
        </div>

    <?php endif; ?>


    <?php
    $form_url = ($action === 'edit')
        ? base_url('admin/testimoni/update/' . $item->id)
        : base_url('admin/testimoni/store');
    ?>


    <!-- Card -->
    <div class="testimoni-card">

        <div class="testimoni-card-title">
            Informasi Testimoni
        </div>


        <form
            action="<?= $form_url ?>"
            method="post"
            enctype="multipart/form-data"
        >

            <!-- Nama -->
            <div class="form-group">

                <label for="name">
                    Nama <span class="required">*</span>
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    class="form-control"
                    value="<?= set_value('name', $item->name ?? '') ?>"
                    placeholder="Contoh: I Made Arya"
                    required
                >

                <small class="form-help">
                    Masukkan nama orang yang memberikan testimoni.
                </small>

            </div>


            <!-- Jabatan -->
            <div class="form-group">

                <label for="position">
                    Jabatan
                </label>

                <input
                    type="text"
                    id="position"
                    name="position"
                    class="form-control"
                    value="<?= set_value('position', $item->position ?? '') ?>"
                    placeholder="Contoh: Kepala Desa"
                >

            </div>


            <!-- Isi -->
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
                ><?= set_value('content', $item->content ?? '') ?></textarea>

                <small class="form-help">
                    Tuliskan pengalaman atau pendapat dari pemberi testimoni.
                </small>

            </div>


            <!-- Foto -->
            <div class="form-group">

                <label for="photo">
                    Foto
                </label>

                <?php if ($action === 'edit'): ?>

                    <small class="form-help">
                        Kosongkan jika tidak ingin mengganti foto.
                    </small>

                <?php endif; ?>


                <input
                    type="file"
                    id="photo"
                    name="photo"
                    class="file-input"
                    accept="image/jpeg,image/png"
                >


                <div class="photo-preview">

                    <?php if ($action === 'edit' && !empty($item->photo)): ?>

                        <p class="form-help">
                            Foto saat ini:
                        </p>

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
                            style="display:none;"
                        >

                    <?php endif; ?>

                </div>

            </div>


            <!-- Status -->
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
                                !isset($item)
                                || !$item
                                || $item->status === 'active'
                            ) ? 'checked' : '' ?>
                        >

                        Aktif

                    </label>

                    <small class="form-help">
                        Testimoni aktif akan ditampilkan pada website.
                    </small>

                </div>

            </div>


            <!-- Tombol -->
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


<script>

document.getElementById('photo').addEventListener('change', function(event) {

    const file = event.target.files[0];

    if (!file) {
        return;
    }

    const preview = document.getElementById('imagePreview');

    preview.src = URL.createObjectURL(file);
    preview.style.display = 'block';

});

</script>