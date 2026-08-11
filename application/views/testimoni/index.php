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
            text-align: center;
            padding: 60px 0 40px;
        }

        .header h1 {
            margin: 0 0 12px;
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
            font-weight: 600;
        }

        .testimonials {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
            padding-bottom: 60px;
        }

        .card {
            background: white;
            border-radius: 14px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 4px 18px rgba(0, 0, 0, 0.07);
        }

        .photo {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 18px;
        }

        .no-photo {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            background: #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 18px;
            color: #6b7280;
            font-size: 13px;
        }

        .quote {
            font-size: 16px;
            line-height: 1.7;
            color: #4b5563;
            margin-bottom: 20px;
        }

        .quote::before {
            content: "“";
            font-size: 35px;
            color: #2563eb;
            display: block;
            height: 25px;
        }

        .name {
            font-weight: bold;
            font-size: 17px;
            margin-bottom: 5px;
        }

        .position {
            color: #6b7280;
            font-size: 14px;
        }

        .empty {
            background: white;
            padding: 40px;
            border-radius: 12px;
            text-align: center;
            color: #6b7280;
        }

        @media (max-width: 900px) {
            .testimonials {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            .testimonials {
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
        <h1>Testimoni Masyarakat</h1>

        <p>
            Apa kata masyarakat tentang pelayanan Desa Terpadu
        </p>
    </header>

    <a class="back" href="<?= base_url(); ?>">
        ← Kembali ke Beranda
    </a>

    <?php if (!empty($testimonies)): ?>

        <div class="testimonials">

            <?php foreach ($testimonies as $row): ?>

                <div class="card">

                    <?php if (!empty($row->photo)): ?>

                        <img
                            class="photo"
                            src="<?= base_url('uploads/testimoni/' . $row->photo); ?>"
                            alt="<?= html_escape($row->name); ?>"
                        >

                    <?php else: ?>

                        <div class="no-photo">
                            No Photo
                        </div>

                    <?php endif; ?>

                    <div class="quote">
                        <?= html_escape($row->content); ?>
                    </div>

                    <div class="name">
                        <?= html_escape($row->name); ?>
                    </div>

                    <?php if (!empty($row->position)): ?>

                        <div class="position">
                            <?= html_escape($row->position); ?>
                        </div>

                    <?php endif; ?>

                </div>

            <?php endforeach; ?>

        </div>

    <?php else: ?>

        <div class="empty">
            Belum ada testimoni yang ditampilkan.
        </div>

    <?php endif; ?>

</div>

</body>
</html>