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
        method="POST"
    >

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

</body>
</html>