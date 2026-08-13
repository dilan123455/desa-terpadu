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
            max-width: 900px;
            margin: auto;
            padding-bottom: 60px;
        }

        .back {
            display: inline-block;
            margin: 35px 0 25px;
            color: #2563eb;
            text-decoration: none;
            font-weight: 600;
        }

        .back:hover {
            text-decoration: underline;
        }

        .article {
            background: #fff;
            border-radius: 14px;
            padding: 40px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.07);
        }

        .category {
            display: inline-block;
            color: #2563eb;
            background: #eff6ff;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        h1 {
            margin: 0 0 15px;
            font-size: 38px;
            line-height: 1.2;
            color: #111827;
        }

        .meta {
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 30px;
        }

        .article-image {
            width: 100%;
            max-height: 500px;
            object-fit: cover;
            border-radius: 10px;
            display: block;
            margin-bottom: 35px;
        }

        .no-image {
            width: 100%;
            height: 250px;
            background: #f3f4f6;
            border: 1px solid #e5e7eb;
            border-radius: 10px;

            display: flex;
            align-items: center;
            justify-content: center;

            color: #9ca3af;
            font-size: 15px;

            margin-bottom: 35px;
        }

        .content {
            font-size: 17px;
            line-height: 1.8;
            color: #374151;
            white-space: normal;
        }

        .content p {
            margin-bottom: 20px;
        }

        .article-info {
            margin-top: 35px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;

            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .info-box {
            background: #f9fafb;
            border-radius: 8px;
            padding: 15px;
        }

        .info-label {
            display: block;
            font-size: 12px;
            color: #6b7280;
            margin-bottom: 5px;
        }

        .info-value {
            font-size: 14px;
            font-weight: 600;
            color: #111827;
        }

        .status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .status-published {
            background: #dcfce7;
            color: #166534;
        }

        .status-draft {
            background: #fef3c7;
            color: #92400e;
        }

        .actions {
            display: flex;
            gap: 10px;
            margin-top: 30px;
        }

        .btn {
            display: inline-block;
            padding: 10px 18px;
            border-radius: 7px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
        }

        .btn-edit {
            background: #2563eb;
            color: #fff;
        }

        .btn-edit:hover {
            background: #1d4ed8;
        }

        .btn-back {
            background: #e5e7eb;
            color: #374151;
        }

        .btn-back:hover {
            background: #d1d5db;
        }

        @media (max-width: 600px) {

            .container {
                width: 95%;
            }

            .article {
                padding: 25px;
            }

            h1 {
                font-size: 28px;
            }

            .content {
                font-size: 16px;
            }

            .article-info {
                grid-template-columns: 1fr;
            }

            .actions {
                flex-direction: column;
            }

            .btn {
                text-align: center;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <!-- Kembali -->
    <a
        class="back"
        href="<?= site_url('admin/articles'); ?>"
    >
        ← Kembali ke Artikel
    </a>


    <article class="article">

        <!-- Kategori -->
        <?php if (!empty($article->category)): ?>

            <div class="category">
                <?= html_escape($article->category); ?>
            </div>

        <?php endif; ?>


        <!-- Judul -->
        <h1>
            <?= html_escape($article->title); ?>
        </h1>


        <!-- Meta -->
        <div class="meta">

            <?php if (!empty($article->published_at)): ?>

                <?= date(
                    'd M Y H:i',
                    strtotime($article->published_at)
                ); ?>

            <?php endif; ?>

            <?php if (!empty($article->author_name)): ?>

                · <?= html_escape($article->author_name); ?>

            <?php endif; ?>

        </div>


        <!-- Gambar -->
        <?php if (!empty($article->image)): ?>

            <img
                class="article-image"
                src="<?= base_url('assets/uploads/' . $article->image); ?>"
                alt="<?= html_escape($article->title); ?>"
            >

        <?php else: ?>

            <div class="no-image">
                Tidak ada gambar
            </div>

        <?php endif; ?>


        <!-- Isi artikel -->
        <div class="content">

            <?= nl2br(html_escape($article->content)); ?>

        </div>


        <!-- Informasi -->
        <div class="article-info">

            <div class="info-box">

                <span class="info-label">
                    Status
                </span>

                <?php if ($article->status === 'published'): ?>

                    <span class="status status-published">
                        Published
                    </span>

                <?php else: ?>

                    <span class="status status-draft">
                        <?= html_escape($article->status); ?>
                    </span>

                <?php endif; ?>

            </div>


            <div class="info-box">

                <span class="info-label">
                    Slug
                </span>

                <span class="info-value">
                    <?= html_escape($article->slug); ?>
                </span>

            </div>

        </div>


        <!-- Tombol -->
        <div class="actions">

            <a
                href="<?= site_url('admin/articles'); ?>"
                class="btn btn-back"
            >
                Kembali
            </a>

            <a
                href="<?= site_url('admin/articles/edit/' . $article->id); ?>"
                class="btn btn-edit"
            >
                Edit Artikel
            </a>

        </div>

    </article>

</div>

</body>
</html>