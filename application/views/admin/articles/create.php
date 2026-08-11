<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title; ?> - Desa Terpadu</title>
</head>

<body>

    <h1>Tambah Artikel</h1>

    <a href="<?= site_url('admin/articles'); ?>">
        ← Kembali ke Artikel
    </a>

    <br><br>

   <form action="<?= site_url('admin/articles/store'); ?>" method="post" enctype="multipart/form-data">

        <div>
            <label>Judul Artikel</label>
            <br>

            <input
                type="text"
                name="title"
                placeholder="Masukkan judul artikel"
                required
            >
        </div>

        <br>

        <div>
            <label>Kategori</label>
            <br>

            <input
                type="text"
                name="category"
                placeholder="Contoh: Digitalisasi Desa"
                required
            >
        </div>


        <br>

        <label>Gambar Artikel</label>
<input type="file" name="image" accept="image/jpeg,image/png,image/webp">
<br><br>

        <div>
            <label>Isi Artikel</label>
            <br>

            <textarea
                name="content"
                rows="10"
                cols="60"
                placeholder="Tulis isi artikel..."
                required
            ></textarea>
        </div>

        <br>

        <div>
            <label>Status</label>
            <br>

            <select name="status" required>

                <option value="draft">
                    Draft
                </option>

                <option value="published">
                    Published
                </option>

            </select>
        </div>

        <br>

        <button type="submit">
            Simpan Artikel
        </button>

    </form>

</body>
</html>