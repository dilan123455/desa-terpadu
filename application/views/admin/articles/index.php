<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title; ?> - Desa Terpadu</title>
</head>

<body>

    <h1>Artikel</h1>

    <a href="<?= site_url('admin/dashboard'); ?>">
        ← Kembali ke Dashboard
    </a>

    <br><br>

    <a href="<?= site_url('admin/articles/create'); ?>">
    + Tambah Artikel
</a>

    <br><br>

    <?php if (empty($articles)): ?>

        <p>Belum ada artikel.</p>

    <?php else: ?>

        <table border="1" cellpadding="10" cellspacing="0">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Penulis</th>
                    <th>Gambar</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                <?php $no = 1; ?>

                <?php foreach ($articles as $article): ?>

                    <tr>

                        <td><?= $no++; ?></td>

                        <td>
                            <?= htmlspecialchars($article->title); ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($article->category); ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($article->author_name ?? '-'); ?>
                        </td>

                        <td>
    <?php if (!empty($article->image)): ?>
        <img 
            src="<?= base_url('assets/uploads/' . $article->image); ?>"
            alt="<?= html_escape($article->title); ?>"
            width="100"
            height="70"
            style="object-fit: cover;"
        >
    <?php else: ?>
        Tidak ada gambar
    <?php endif; ?>
</td>

                        <td>
                            <?= htmlspecialchars($article->status); ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($article->created_at); ?>
                        </td>

                        <td>


    <a href="<?= site_url('admin/articles/edit/' . $article->id); ?>">
        Edit
    </a>

    |

    <a
        href="<?= site_url('admin/articles/delete/' . $article->id); ?>"
        onclick="return confirm('Yakin ingin menghapus artikel ini?');"
    >
        Delete
    </a>

</td>

                    </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

    <?php endif; ?>

</body>
</html>