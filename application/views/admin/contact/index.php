<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contact - Desa Terpadu</title>

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
        }

        .btn {
            display: inline-block;
            padding: 10px 18px;
            border-radius: 7px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .card {
            background: white;
            border-radius: 14px;
            box-shadow: 0 4px 18px rgba(0, 0, 0, .07);
            padding: 30px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .info-item {
            padding: 20px;
            background: #f8fafc;
            border-radius: 10px;
        }

        .info-item.full {
            grid-column: 1 / -1;
        }

        .label {
            display: block;
            margin-bottom: 8px;
            font-size: 12px;
            font-weight: 700;
            color: #64748b;
            text-transform: uppercase;
        }

        .value {
            font-size: 16px;
            color: #1e293b;
            word-break: break-word;
            line-height: 1.6;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
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

            .info-item.full {
                grid-column: auto;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="page-header">

        <div>
            <h1>Contact</h1>

            <p>
                Kelola informasi kontak yang tampil pada website.
            </p>
        </div>

        <a
            href="<?= site_url('admin/contact/edit/' . $contact->id); ?>"
            class="btn btn-primary"
        >
            ✏️ Edit Contact
        </a>

    </div>

    <?php if ($this->session->flashdata('success')): ?>

        <div class="success">
            <?= html_escape($this->session->flashdata('success')); ?>
        </div>

    <?php endif; ?>


    <?php if ($this->session->flashdata('error')): ?>

        <div class="error">
            <?= html_escape($this->session->flashdata('error')); ?>
        </div>

    <?php endif; ?>


    <div class="card">

        <div class="info-grid">

            <!-- TELEPON -->
            <div class="info-item">

                <span class="label">
                    No. Telepon & WhatsApp
                </span>

                <div class="value">
                    <?= html_escape($contact->phone); ?>
                </div>

            </div>


            <!-- EMAIL -->
            <div class="info-item">

                <span class="label">
                    Email
                </span>

                <div class="value">
                    <?= html_escape($contact->email); ?>
                </div>

            </div>


            <!-- ALAMAT -->
            <div class="info-item full">

                <span class="label">
                    Alamat
                </span>

                <div class="value">
                    <?= nl2br(html_escape($contact->address)); ?>
                </div>

            </div>

        </div>

    </div>

</div>

</body>

</html>