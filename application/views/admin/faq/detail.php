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
            max-width: 850px;
            margin: 40px auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .header h1 {
            margin: 0 0 8px;
            font-size: 30px;
        }

        .header p {
            margin: 0;
            color: #6b7280;
            font-size: 14px;
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            border-radius: 7px;
            text-decoration: none;
            border: none;
            font-size: 14px;
            font-weight: 600;
        }

        .btn-secondary {
            background: #e5e7eb;
            color: #1f2937;
        }

        .btn-warning {
            background: #f59e0b;
            color: white;
        }

        .card {
            background: white;
            border-radius: 14px;
            padding: 30px;
            box-shadow: 0 4px 18px rgba(0, 0, 0, 0.07);
        }

        .label {
            margin-bottom: 8px;
            font-size: 13px;
            font-weight: 700;
            color: #64748b;
        }

        .question {
            margin-bottom: 30px;
            font-size: 24px;
            line-height: 1.4;
            font-weight: 700;
            color: #1e293b;
        }

        .answer {
            padding: 20px;
            background: #f8fafc;
            border-radius: 10px;
            color: #475569;
            line-height: 1.8;
            white-space: pre-line;
            margin-bottom: 25px;
        }

        .info {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
        }

        .info-item {
            padding: 15px;
            background: #f8fafc;
            border-radius: 8px;
        }

        .info-value {
            font-weight: 600;
        }

        .badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-active {
            background: #dcfce7;
            color: #166534;
        }

        .badge-inactive {
            background: #e5e7eb;
            color: #475569;
        }

        .actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
        }

        @media (max-width: 600px) {
            .header {
                align-items: flex-start;
                gap: 15px;
            }

            .info {
                grid-template-columns: 1fr;
            }

            .question {
                font-size: 20px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">

        <div>

            <h1>Detail FAQ</h1>

            <p>
                Informasi lengkap FAQ Desa Terpadu.
            </p>

        </div>

        <a
            href="<?= site_url('admin/faq'); ?>"
            class="btn btn-secondary"
        >
            ← Kembali
        </a>

    </div>


    <div class="card">

        <div class="label">
            PERTANYAAN
        </div>

        <div class="question">
            <?= html_escape($faq->question); ?>
        </div>


        <div class="label">
            JAWABAN
        </div>

        <div class="answer">
            <?= html_escape($faq->answer); ?>
        </div>


        <div class="info">

            <div class="info-item">

                <div class="label">
                    Status
                </div>

                <?php if ($faq->status === 'active'): ?>

                    <span class="badge badge-active">
                        Aktif
                    </span>

                <?php else: ?>

                    <span class="badge badge-inactive">
                        Nonaktif
                    </span>

                <?php endif; ?>

            </div>


            <div class="info-item">

                <div class="label">
                    Urutan
                </div>

                <div class="info-value">
                    <?= (int) $faq->sort_order; ?>
                </div>

            </div>


            <div class="info-item">

                <div class="label">
                    Dibuat
                </div>

                <div class="info-value">
                    <?= !empty($faq->created_at)
                        ? date('d M Y H:i', strtotime($faq->created_at))
                        : '-';
                    ?>
                </div>

            </div>

        </div>


        <div class="actions">

            <a
                href="<?= site_url('admin/faq/edit/' . $faq->id); ?>"
                class="btn btn-warning"
            >
                Edit FAQ
            </a>

        </div>

    </div>

</div>

</body>
</html>