<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title; ?> - Desa Terpadu</title>
</head>

<body>

    <a href="<?= site_url('article'); ?>">
        ← Kembali ke Artikel
    </a>

    <hr>

    <h1>
        <?= html_escape($article->title); ?>
    </h1>

    <p>
        Kategori:
        <?= html_escape($article->category); ?>
    </p>

    <p>
        <?= date('d M Y', strtotime($article->published_at)); ?>
    </p>

    <?php if (!empty($article->image)): ?>

        <img
            src="<?= base_url('assets/uploads/' . $article->image); ?>"
            alt="<?= html_escape($article->title); ?>"
            width="600"
        >

    <?php endif; ?>

    <hr>

    <div>
        <?= nl2br(html_escape($article->content)); ?>
    </div>

</body>

</html>