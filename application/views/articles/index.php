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
            width: 90%;
            max-width: 1200px;
            margin: auto;
        }

        .header {
            padding: 60px 0 40px;
            text-align: center;
        }

        .header h1 {
            margin-bottom: 10px;
            font-size: 36px;
        }

        .header p {
            margin: 0;
            color: #6b7280;
        }

        .back {
            display: inline-block;
            margin-bottom: 30px;
            text-decoration: none;
            color: #2563eb;
        }

        .articles {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
            padding-bottom: 60px;
        }

        .card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.08);
        }

        .card-image {
            width: 100%;
            height: 210px;
            object-fit: cover;
            display: block;
        }

        .no-image {
            height: 210px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #e5e7eb;
            color: #6b7280;
        }

        .card-content {
            padding: 20px;
        }

        .category {
            font-size: 13px;
            color: #2563eb;
            margin-bottom: 8px;
        }

        .card h2 {
            margin: 0 0 10px;
            font-size: 20px;
        }

        .date {
            font-size: 13px;
            color: #6b7280;
            margin-bottom: 15px;
        }

        .read-more {
            text-decoration: none;
            color: #2563eb;
            font-weight: bold;
        }

        .empty {
            text-align: center;
            background: white;
            padding: 40px;
            border-radius: 12px;
        }

        @media (max-width: 900px) {
            .articles {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            .articles {
                grid-template-columns: 1fr;
            }

            .header h1 {
                font-size: 28px;
            }
        }
    </style>
</head>

<body>

    <div class="container">

        <header class="header">
            <h1>Artikel & Berita</h1>

            <p>
                Informasi terbaru dari Desa Terpadu
            </p>
        </header>

        <a class="back" href="<?= base_url(); ?>">
            ← Kembali ke Beranda
        </a>

        <?php if (!empty($articles)): ?>

            <div class="articles">

                <?php foreach ($articles as $article): ?>

                    <article class="card">

                        <?php if (!empty($article->image)): ?>

                            <img
                                class="card-image"
                                src="<?= base_url('assets/uploads/' . $article->image); ?>"
                                alt="<?= html_escape($article->title); ?>"
                            >

                        <?php else: ?>

                            <div class="no-image">
                                Tidak ada gambar
                            </div>

                        <?php endif; ?>

                        <div class="card-content">

                            <div class="category">
                                <?= html_escape($article->category); ?>
                            </div>

                            <h2>
                                <?= html_escape($article->title); ?>
                            </h2>

                            <div class="date">
                                <?= date('d M Y', strtotime($article->published_at)); ?>
                            </div>

                            <a
                                class="read-more"
                                href="<?= site_url('article/detail/' . $article->slug); ?>"
                            >
                                Baca Selengkapnya →
                            </a>

                        </div>

                    </article>

                <?php endforeach; ?>

            </div>

        <?php else: ?>

            <div class="empty">
                <p>Belum ada artikel yang dipublikasikan.</p>
            </div>

        <?php endif; ?>

    </div>

</body>

</html>