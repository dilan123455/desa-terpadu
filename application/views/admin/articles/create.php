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

        .preview-wrapper {
            margin-top: 15px;
            display: none;
        }

        .preview-image {
            width: 220px;
            height: 140px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #e5e7eb;
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
            <h1>Tambah Artikel</h1>
            <p>Tambahkan artikel atau berita baru</p>
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
            action="<?= site_url('admin/articles/store'); ?>"
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
                    placeholder="Masukkan judul artikel"
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
                    placeholder="Contoh: Digitalisasi Desa"
                    required
                >

            </div>


            <div class="form-group">

                <label for="image">
                    Gambar Artikel
                </label>

                <input
                    type="file"
                    id="image"
                    name="image"
                    accept="image/jpeg,image/png,image/webp"
                >

                <div class="help-text">
                    Format JPG, JPEG, PNG, atau WEBP. Maksimal 5 MB.
                </div>

                <div
                    class="preview-wrapper"
                    id="previewWrapper"
                >
                    <img
                        id="imagePreview"
                        class="preview-image"
                        src=""
                        alt="Preview gambar"
                    >
                </div>

            </div>


            <div class="form-group">

                <label for="content">
                    Isi Artikel
                </label>

                <textarea
                    id="content"
                    name="content"
                    placeholder="Tulis isi artikel..."
                    required
                ></textarea>

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

                    <option value="draft">
                        Draft
                    </option>

                    <option value="published">
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
                    Simpan Artikel
                </button>

            </div>

        </form>

    </div>

</div>


<script>
document.getElementById('image').addEventListener('change', function(event) {

    const file = event.target.files[0];
    const preview = document.getElementById('imagePreview');
    const wrapper = document.getElementById('previewWrapper');

    if (!file) {
        wrapper.style.display = 'none';
        preview.src = '';
        return;
    }

    preview.src = URL.createObjectURL(file);
    wrapper.style.display = 'block';

});
</script>

</body>
</html>