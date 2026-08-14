<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= html_escape($title); ?> - Desa Terpadu</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f7fa;
            color: #1f2937;
        }

        .container {
            width: 92%;
            max-width: 850px;
            margin: 40px auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            gap: 20px;
        }

        .header h1 {
            margin: 0 0 6px;
            font-size: 30px;
        }

        .header p {
            margin: 0;
            color: #6b7280;
            font-size: 14px;
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            border-radius: 8px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
        }

        .btn-primary {
            background: #2563eb;
            color: #fff;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-secondary {
            background: #e5e7eb;
            color: #374151;
        }

        .btn-secondary:hover {
            background: #d1d5db;
        }

        .card {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.07);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            font-size: 14px;
        }

        input[type="text"],
        textarea,
        select {
            width: 100%;
            padding: 11px 13px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-family: inherit;
            font-size: 14px;
            outline: none;
        }

        input[type="text"]:focus,
        textarea:focus,
        select:focus {
            border-color: #2563eb;
        }

        textarea {
            resize: vertical;
            min-height: 220px;
            line-height: 1.6;
        }

        input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            background: #fff;
        }

        .help-text {
            margin-top: 7px;
            font-size: 12px;
            color: #6b7280;
        }

        .image-preview-wrapper {
            margin-bottom: 15px;
        }

        .image-preview {
            width: 240px;
            height: 150px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #e5e7eb;
        }

        .no-image {
            width: 240px;
            height: 150px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #e5e7eb;
            color: #6b7280;
            border-radius: 8px;
            font-size: 13px;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 25px;
        }

        @media (max-width: 600px) {

            .container {
                width: 94%;
                margin: 25px auto;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
            }

            .card {
                padding: 20px;
            }

            .image-preview,
            .no-image {
                width: 100%;
                height: 200px;
            }

            .form-actions {
                flex-direction: column;
            }

            .form-actions .btn {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">

        <div>
            <h1>Edit Artikel</h1>
            <p>Perbarui informasi artikel</p>
        </div>

        <a
            href="<?= site_url('admin/articles'); ?>"
            class="btn btn-secondary"
        >
            ← Kembali
        </a>

    </div>


    <div class="card">

        <form
            action="<?= site_url('admin/articles/update/' . $article->id); ?>"
            method="post"
            enctype="multipart/form-data"
        >

            <div class="form-group">

                <label for="title">
                    Judul Artikel
                </label>

                <input
                    type="text"
                    id="title"
                    name="title"
                    value="<?= html_escape($article->title); ?>"
                    required
                >

            </div>


            <div class="form-group">

                <label for="category">
                    Kategori
                </label>

                <input
                    type="text"
                    id="category"
                    name="category"
                    value="<?= html_escape($article->category); ?>"
                    required
                >

            </div>


           <!-- FOTO ARTIKEL -->
<div class="form-group">

    <label for="articleImage">
        Foto Artikel
    </label>

    <!-- Pesan error gambar -->
    <div
        id="imageError"
        class="image-error"
        style="display:none;"
    ></div>


    <!-- SATU AREA GAMBAR SAJA -->
    <div
        id="imageContainer"
        style="
            margin-bottom: 15px;
        "
    >

        <?php if (!empty($article->image)): ?>

            <img
                id="articleImagePreview"
                src="<?= base_url('assets/uploads/' . $article->image); ?>"
                alt="<?= html_escape($article->title); ?>"
                style="
                    width: 220px;
                    height: 140px;
                    object-fit: cover;
                    border-radius: 8px;
                    border: 1px solid #ddd;
                    display: block;
                "
            >

        <?php else: ?>

            <div
                id="noImagePlaceholder"
                style="
                    width: 220px;
                    height: 140px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    background: #f1f1f1;
                    border: 1px solid #ddd;
                    border-radius: 8px;
                    color: #888;
                    font-size: 14px;
                "
            >
                Tidak ada gambar
            </div>

            <img
                id="articleImagePreview"
                src=""
                alt="Preview gambar"
                style="
                    width: 220px;
                    height: 140px;
                    object-fit: cover;
                    border-radius: 8px;
                    border: 1px solid #ddd;
                    display: none;
                "
            >

        <?php endif; ?>

    </div>


    <!-- INPUT GAMBAR -->
    <input
        type="file"
        name="image"
        id="articleImage"
        class="file-input"
        accept="image/jpeg,image/png,image/webp"
    >


    <small class="form-help">
        Format: JPG, JPEG, PNG, WEBP.
        Ukuran maksimal <strong>6 MB</strong>.
    </small>


    <!-- CHECKBOX HAPUS -->
    <?php if (!empty($article->image)): ?>

        <div
            id="removeImageBox"
            style="
                margin-top: 12px;
                padding: 12px 15px;
                background: #fff5f5;
                border: 1px solid #f5c2c7;
                border-radius: 6px;
            "
        >

            <label
                style="
                    display: flex;
                    align-items: center;
                    gap: 8px;
                    cursor: pointer;
                    color: #dc3545;
                    font-weight: 600;
                    font-size: 14px;
                "
            >

                <input
                    type="checkbox"
                    name="remove_image"
                    id="removeImage"
                    value="1"
                    style="
                        width: 16px;
                        height: 16px;
                    "
                >

                Hapus gambar

            </label>

            <small
                style="
                    display: block;
                    margin-top: 5px;
                    margin-left: 24px;
                    color: #888;
                    font-size: 12px;
                "
            >
                Centang jika artikel tidak ingin menggunakan gambar.
            </small>

        </div>

    <?php endif; ?>


    <!-- PESAN GAMBAR VALID -->
    <div
        id="imageSuccess"
        style="
            display: none;
            margin-top: 10px;
            padding: 10px 13px;
            background: #d1e7dd;
            color: #0f5132;
            border: 1px solid #badbcc;
            border-radius: 6px;
            font-size: 13px;
        "
    ></div>

</div>

            

            <div class="form-group">

                <label for="content">
                    Isi Artikel
                </label>

                <textarea
                    id="content"
                    name="content"
                    required
                ><?= html_escape($article->content); ?></textarea>

            </div>


            <div class="form-group">

                <label for="status">
                    Status
                </label>

                <select
                    id="status"
                    name="status"
                    required
                >

                    <option
                        value="draft"
                        <?= $article->status === 'draft' ? 'selected' : ''; ?>
                    >
                        Draft
                    </option>

                    <option
                        value="published"
                        <?= $article->status === 'published' ? 'selected' : ''; ?>
                    >
                        Published
                    </option>

                </select>

            </div>


            <div class="form-actions">

                <a
                    href="<?= site_url('admin/articles'); ?>"
                    class="btn btn-secondary"
                >
                    Batal
                </a>

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>

<script>

document.addEventListener('DOMContentLoaded', function () {

    const imageInput = document.getElementById('articleImage');
    const imagePreview = document.getElementById('articleImagePreview');
    const imageError = document.getElementById('imageError');
    const imageSuccess = document.getElementById('imageSuccess');
    const removeImage = document.getElementById('removeImage');
    const noImagePlaceholder = document.getElementById('noImagePlaceholder');
    const form = document.getElementById('articleForm');


    /*
    |--------------------------------------------------------------------------
    | FUNGSI FORMAT UKURAN FILE
    |--------------------------------------------------------------------------
    */

    function formatFileSize(bytes) {

        if (bytes < 1024) {
            return bytes + ' B';
        }

        if (bytes < 1024 * 1024) {
            return (bytes / 1024).toFixed(1) + ' KB';
        }

        return (bytes / (1024 * 1024)).toFixed(2) + ' MB';
    }


    /*
    |--------------------------------------------------------------------------
    | FUNGSI ERROR
    |--------------------------------------------------------------------------
    */

    function showError(message) {

        imageError.innerHTML =
            '<strong>Gambar tidak dapat digunakan.</strong><br>' +
            message;

        imageError.style.display = 'block';

        imageSuccess.style.display = 'none';
    }


    /*
    |--------------------------------------------------------------------------
    | FUNGSI RESET ERROR
    |--------------------------------------------------------------------------
    */

    function clearMessage() {

        imageError.style.display = 'none';
        imageError.innerHTML = '';

        imageSuccess.style.display = 'none';
        imageSuccess.innerHTML = '';
    }


    /*
    |--------------------------------------------------------------------------
    | PILIH GAMBAR BARU
    |--------------------------------------------------------------------------
    */

    if (imageInput) {

        imageInput.addEventListener('change', function () {

            clearMessage();

            const file = this.files[0];

            if (!file) {
                return;
            }


            /*
            |--------------------------------------------------------------------------
            | FORMAT
            |--------------------------------------------------------------------------
            */

            const allowedTypes = [
                'image/jpeg',
                'image/png',
                'image/webp'
            ];

            if (!allowedTypes.includes(file.type)) {

                showError(
                    'Format gambar tidak diperbolehkan. ' +
                    'Gunakan JPG, JPEG, PNG, atau WEBP.'
                );

                imageInput.value = '';

                return;
            }


            /*
            |--------------------------------------------------------------------------
            | UKURAN MAKSIMAL 6 MB
            |--------------------------------------------------------------------------
            */

            const maxSize = 6 * 1024 * 1024;

            if (file.size > maxSize) {

                showError(
                    'Ukuran gambar adalah <strong>' +
                    formatFileSize(file.size) +
                    '</strong>.<br>' +
                    'Maksimal ukuran gambar adalah <strong>6 MB</strong>.'
                );

                imageInput.value = '';

                return;
            }


            /*
            |--------------------------------------------------------------------------
            | JIKA PILIH GAMBAR BARU
            | CHECKBOX HAPUS OTOMATIS DIBATALKAN
            |--------------------------------------------------------------------------
            */

            if (removeImage) {
                removeImage.checked = false;
            }


            /*
            |--------------------------------------------------------------------------
            | TAMPILKAN GAMBAR BARU
            | GAMBAR LAMA LANGSUNG DIGANTI
            |--------------------------------------------------------------------------
            */

            const reader = new FileReader();

            reader.onload = function (e) {

                if (imagePreview) {

                    imagePreview.src = e.target.result;

                    imagePreview.style.display = 'block';
                }


                if (noImagePlaceholder) {

                    noImagePlaceholder.style.display = 'none';
                }

            };

            reader.readAsDataURL(file);


            /*
            |--------------------------------------------------------------------------
            | PESAN VALID
            |--------------------------------------------------------------------------
            */

            imageSuccess.innerHTML =
                '✓ Gambar baru dipilih. Ukuran: <strong>' +
                formatFileSize(file.size) +
                '</strong>.';

            imageSuccess.style.display = 'block';

        });

    }


    /*
    |--------------------------------------------------------------------------
    | CHECKBOX HAPUS GAMBAR
    |--------------------------------------------------------------------------
    */

    if (removeImage) {

        removeImage.addEventListener('change', function () {

            clearMessage();


            if (this.checked) {

                /*
                | Hapus gambar dari tampilan
                */

                if (imagePreview) {
                    imagePreview.style.display = 'none';
                }

                if (noImagePlaceholder) {
                    noImagePlaceholder.style.display = 'flex';
                    noImagePlaceholder.innerHTML = 'Gambar akan dihapus';
                }


                /*
                | Kosongkan input file
                */

                if (imageInput) {
                    imageInput.value = '';
                }

            } else {

                /*
                | Jika batal hapus dan tidak ada gambar baru,
                | tampilkan kembali gambar lama.
                */

                <?php if (!empty($article->image)): ?>

                    if (imagePreview) {

                        imagePreview.src =
                            "<?= base_url('assets/uploads/' . $article->image); ?>";

                        imagePreview.style.display = 'block';
                    }

                    if (noImagePlaceholder) {
                        noImagePlaceholder.style.display = 'none';
                    }

                <?php endif; ?>

            }

        });

    }


    /*
    |--------------------------------------------------------------------------
    | CEK LAGI SAAT SUBMIT
    |--------------------------------------------------------------------------
    */

    if (form) {

        form.addEventListener('submit', function (event) {

            const file = imageInput
                ? imageInput.files[0]
                : null;


            /*
            | Kalau ada file baru
            */

            if (file) {

                const maxSize = 6 * 1024 * 1024;

                const allowedTypes = [
                    'image/jpeg',
                    'image/png',
                    'image/webp'
                ];


                if (!allowedTypes.includes(file.type)) {

                    event.preventDefault();

                    showError(
                        'Format gambar tidak diperbolehkan. ' +
                        'Gunakan JPG, JPEG, PNG, atau WEBP.'
                    );

                    return;
                }


                if (file.size > maxSize) {

                    event.preventDefault();

                    showError(
                        'Ukuran gambar melebihi 6 MB. ' +
                        'Silakan pilih gambar dengan ukuran maksimal 6 MB.'
                    );

                    return;
                }

            }

        });

    }

});

</script>

</body>
</html>