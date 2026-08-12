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
            margin: 40px auto;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .page-header h1 {
            margin: 0 0 8px;
            font-size: 30px;
        }

        .page-header p {
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
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
        }

        .btn-secondary {
            background: #e5e7eb;
            color: #1f2937;
        }

        .btn:hover {
            opacity: .9;
        }

        .card {
            background: #fff;
            border-radius: 14px;
            box-shadow: 0 4px 18px rgba(0, 0, 0, .07);
            padding: 30px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 25px;
        }

        .info-item {
            padding: 16px;
            background: #f8fafc;
            border-radius: 10px;
        }

        .info-label {
            display: block;
            margin-bottom: 7px;
            font-size: 12px;
            font-weight: 700;
            color: #64748b;
            text-transform: uppercase;
        }

        .info-value {
            color: #1e293b;
            word-break: break-word;
        }

        .message-box {
            padding: 20px;
            background: #f8fafc;
            border-radius: 10px;
            line-height: 1.8;
            white-space: pre-line;
        }

        .status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .status-unread {
            background: #fee2e2;
            color: #991b1b;
        }

        .status-read {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .status-replied {
            background: #dcfce7;
            color: #166534;
        }

        .section-title {
            margin: 0 0 12px;
            font-size: 18px;
        }

        @media (max-width: 650px) {
            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .card {
                padding: 20px;
            }

            .header-actions {
    display: flex;
    gap: 10px;
    align-items: center;
}

.btn-success {
    background: #16a34a;
    color: white;
}

.btn-danger {
    background: #dc2626;
    color: white;
}
        }
    </style>
</head>

<body>

<div class="container">

    <div class="page-header">

    <div>
        <h1>Detail Pesan</h1>

        <p>
            Informasi lengkap pesan yang dikirim oleh pengunjung.
        </p>
    </div>

    <div class="header-actions">

        <a
            href="<?= site_url('admin/contact_messages'); ?>"
            class="btn btn-secondary"
        >
            ← Kembali
        </a>

        <?php if ($message->status !== 'replied'): ?>

            <a
                href="<?= site_url('admin/contact_messages/mark_replied/' . $message->id); ?>"
                class="btn btn-success"
                onclick="return confirm('Tandai pesan ini sebagai sudah dibalas?');"
            >
                ✓ Tandai Dibalas
            </a>

        <?php endif; ?>

        <a
            href="<?= site_url('admin/contact_messages/delete/' . $message->id); ?>"
            class="btn btn-danger"
            onclick="return confirm('Yakin ingin menghapus pesan ini?');"
        >
            Hapus
        </a>

    </div>

</div>

    <div class="card">

        <div class="info-grid">

            <div class="info-item">
                <span class="info-label">Nama</span>
                <div class="info-value">
                    <?= html_escape($message->name); ?>
                </div>
            </div>


            <div class="info-item">
                <span class="info-label">Email</span>
                <div class="info-value">
                    <?= html_escape($message->email); ?>
                </div>
            </div>


            <div class="info-item">
                <span class="info-label">No. Telepon</span>
                <div class="info-value">
                    <?= !empty($message->phone)
                        ? html_escape($message->phone)
                        : '-'; ?>
                </div>
            </div>


            <div class="info-item">
                <span class="info-label">Tanggal</span>
                <div class="info-value">
                    <?= date('d M Y H:i', strtotime($message->created_at)); ?>
                </div>
            </div>


            <div class="info-item">

                <span class="info-label">Status</span>

                <div class="info-value">

                    <?php if ($message->status === 'unread'): ?>

                        <span class="status status-unread">
                            Belum Dibaca
                        </span>

                    <?php elseif ($message->status === 'read'): ?>

                        <span class="status status-read">
                            Sudah Dibaca
                        </span>

                    <?php else: ?>

                        <span class="status status-replied">
                            Sudah Dibalas
                        </span>

                    <?php endif; ?>

                </div>

            </div>

        </div>


        <div class="info-item" style="margin-bottom: 20px;">

            <span class="info-label">Subjek</span>

            <div class="info-value">
                <?= !empty($message->subject)
                    ? html_escape($message->subject)
                    : '-'; ?>
            </div>

        </div>


        <h2 class="section-title">
            Isi Pesan
        </h2>

        <div class="message-box">
            <?= html_escape($message->message); ?>
        </div>

    </div>

</div>

</body>
</html>