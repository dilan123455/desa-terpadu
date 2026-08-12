<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= html_escape($title); ?> - Admin</title>

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
            max-width: 1000px;
            margin: 40px auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .header h1 {
            margin: 0 0 8px;
            font-size: 30px;
        }

        .header p {
            margin: 0;
            color: #64748b;
        }

        .card {
            background: white;
            border-radius: 14px;
            padding: 30px;
            margin-bottom: 25px;
            box-shadow: 0 4px 18px rgba(0, 0, 0, .07);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .card-header h2 {
            margin: 0;
            color: #1e293b;
        }

        .info {
            margin-bottom: 20px;
        }

        .label {
            display: block;
            margin-bottom: 8px;
            font-size: 13px;
            font-weight: bold;
            color: #64748b;
            text-transform: uppercase;
        }

        .value {
            padding: 15px;
            background: #f8fafc;
            border-radius: 8px;
            line-height: 1.7;
        }

        .btn {
            display: inline-block;
            padding: 10px 18px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-success {
            background: #16a34a;
            color: white;
        }

        .btn-success:hover {
            background: #15803d;
        }

        .empty {
            padding: 20px;
            background: #fef2f2;
            color: #991b1b;
            border-radius: 8px;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">

        <div>
            <h1>Tentang Desa Terpadu</h1>

            <p>
                Kelola informasi halaman Tentang Desa Terpadu.
            </p>
        </div>

    </div>


    <?php if (!empty($about)): ?>

        <div class="card">

            <div class="card-header">

                <h2>Informasi Utama</h2>

                <a
                    href="<?= site_url('admin/about/edit'); ?>"
                    class="btn btn-primary"
                >
                    ✏ Edit
                </a>

            </div>


            <div class="info">

                <span class="label">
                    Judul
                </span>

                <div class="value">
                    <?= html_escape($about->title); ?>
                </div>

            </div>


            <div class="info">

                <span class="label">
                    Deskripsi
                </span>

                <div class="value">
                    <?= nl2br(html_escape($about->description)); ?>
                </div>

            </div>

        </div>

    <?php else: ?>

        <div class="card">

            <div class="card-header">

                <h2>Informasi Utama</h2>

            

            </div>

            <div class="empty">
                Data Tentang Desa Terpadu belum tersedia.
            </div>

        </div>

    <?php endif; ?>


</div>

</body>

</html>