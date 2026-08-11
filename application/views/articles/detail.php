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
        }

        .back {
            display: inline-block;
            margin: 35px 0 25px;
            color: #2563eb;
            text-decoration: none;
            font-weight: 600;
        }

        .article {
            background: #fff;
            border-radius: 14px;
            padding: 40px;
            margin-bottom: 60px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.07);
        }

        .category {
            color: #2563eb;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 12px;
        }

        h1 {
            margin: 0 0 15px;
            font-size: 38px;
            line-height: 1.2;
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

        .content {
            font-size: 17px;
            line-height: 1.8;
        }

        .content p {
            margin-bottom: 20px;
        }

        @media (max-width: 600px) {
            .article {
                padding: 25px;
            }

            h1 {
                font-size: 28px;
            }

            .content {
                font-size: 16px;
            }
        }
    </style>
</head>

<body>

    <div class="container">

        <a class="back" href="<?= site_url('article'); ?>">
            ← Kembali ke Artikel
        </a>

        <article class="article">

            <div class="category">
                <?= html_escape($article->category); ?>
            </div>

            <h1>
                <?= html_escape($article->title); ?>
            </h1>

            <div class="meta">
                <?= date('d M Y', strtotime($article->published_at)); ?>

                <?php if (!empty($article->author_name)): ?>
                    · <?= html_escape($article->author_name); ?>
                <?php endif; ?>
            </div>

            <?php if (!empty($article->image)): ?>

                <img
                    class="article-image"
                    src="<?= base_url('assets/uploads/' . $article->image); ?>"
                    alt="<?= html_escape($article->title); ?>"
                >

            <?php endif; ?>

            <div class="content">
                <?= nl2br(html_escape($article->content)); ?>
            </div>

        </article>

    </div>

</body>

</html>