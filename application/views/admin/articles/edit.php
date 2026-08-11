<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title; ?> - Desa Terpadu</title>
</head>

<body>

    <h1>Edit Artikel</h1>

    <a href="<?= site_url('admin/articles'); ?>">
        ← Kembali ke Artikel
    </a>

    <br><br>

    <form
        action="<?= site_url('admin/articles/update/' . $article->id); ?>"
        method="post"
        enctype="multipart/form-data"
    >

        <!-- Judul -->
        <div>
            <label>Judul Artikel</label>
            <br>

            <input
                type="text"
                name="title"
                value="<?= htmlspecialchars($article->title); ?>"
                required
            >
        </div>

        <br>

        <!-- Kategori -->
        <div>
            <label>Kategori</label>
            <br>

            <input
                type="text"
                name="category"
                value="<?= htmlspecialchars($article->category); ?>"
                required
            >
        </div>

        <br>

        <!-- Isi -->
        <div>
            <label>Isi Artikel</label>
            <br>

            <textarea
                name="content"
                rows="10"
                cols="60"
                required
            ><?= htmlspecialchars($article->content); ?></textarea>
        </div>

        <br>

        <!-- Gambar -->
        <div>

            <label>Gambar Artikel</label>

            <br><br>

            <!-- Preview gambar -->
            <?php if (!empty($article->image)): ?>

                <img
                    id="imagePreview"
                    src="<?= base_url('assets/uploads/' . $article->image); ?>"
                    alt="<?= html_escape($article->title); ?>"
                    width="200"
                    style="object-fit: cover;"
                >

            <?php else: ?>

                <img
                    id="imagePreview"
                    src=""
                    alt="Preview gambar"
                    width="200"
                    style="display: none; object-fit: cover;"
                >

                <p id="noImageText">Belum ada gambar.</p>

            <?php endif; ?>

            <br><br>

            <!-- Input file -->
            <input
                type="file"
                name="image"
                id="imageInput"
                accept="image/jpeg,image/png,image/webp"
            >

            <p>
                Biarkan kosong jika tidak ingin mengganti gambar.
            </p>

        </div>

        <br>

        <!-- Status -->
        <div>

            <label>Status</label>

            <br>

            <select name="status" required>

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

        <br>

        <button type="submit">
            Simpan Perubahan
        </button>

    </form>


    <!-- Preview gambar sebelum disimpan -->
    <script>
        document.getElementById('imageInput').addEventListener('change', function(event) {

            const file = event.target.files[0];

            if (!file) {
                return;
            }

            const imagePreview = document.getElementById('imagePreview');
            const noImageText = document.getElementById('noImageText');

            // Membuat preview gambar yang baru dipilih
            imagePreview.src = URL.createObjectURL(file);

            // Tampilkan preview
            imagePreview.style.display = 'block';

            // Hilangkan tulisan "Belum ada gambar"
            if (noImageText) {
                noImageText.style.display = 'none';
            }
        });
    </script>

</body>

</html>