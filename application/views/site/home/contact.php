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
            background: #f8fafc;
            color: #1e293b;
        }

        .contact-section {
            padding: 80px 20px;
        }

        .contact-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .contact-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .contact-header h1 {
            margin-bottom: 10px;
            font-size: 32px;
        }

        .contact-header p {
            color: #64748b;
        }

        .contact-card {
            background: white;
            padding: 35px;
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(15, 23, 42, 0.06);
            border: 1px solid #e2e8f0;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 14px;
            font-family: inherit;
        }

        .form-group textarea {
            min-height: 150px;
            resize: vertical;
        }

        .btn-submit {
            width: 100%;
            padding: 13px;
            border: none;
            border-radius: 8px;
            background: #2563eb;
            color: white;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-submit:hover {
            opacity: 0.9;
        }

        .alert {
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
        }
    </style>
</head>

<body>

    <?php $this->load->view('site/layout/nav'); ?>

    <section class="contact-section">

        <div class="contact-container">

            <div class="contact-header">

                <h1>Hubungi Kami</h1>

                <p>
                    Silakan kirim pesan kepada kami melalui form di bawah.
                </p>

            </div>


            <?php if ($this->session->flashdata('success')): ?>

                <div class="alert alert-success">
                    <?= html_escape($this->session->flashdata('success')); ?>
                </div>

            <?php endif; ?>


            <?php if ($this->session->flashdata('error')): ?>

                <div class="alert alert-error">
                    <?= html_escape($this->session->flashdata('error')); ?>
                </div>

            <?php endif; ?>


            <div class="contact-card">

                <form
                    action="<?= site_url('contact/send'); ?>"
                    method="post"
                >

                    <div class="form-group">

                        <label for="name">
                            Nama
                        </label>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            placeholder="Masukkan nama Anda"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label for="email">
                            Email
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="Masukkan email Anda"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label for="phone">
                            No. HP
                        </label>

                        <input
                            type="text"
                            id="phone"
                            name="phone"
                            placeholder="Masukkan nomor HP"
                        >

                    </div>


                    <div class="form-group">

                        <label for="subject">
                            Subjek
                        </label>

                        <input
                            type="text"
                            id="subject"
                            name="subject"
                            placeholder="Masukkan subjek pesan"
                        >

                    </div>


                    <div class="form-group">

                        <label for="message">
                            Pesan
                        </label>

                        <textarea
                            id="message"
                            name="message"
                            placeholder="Tulis pesan Anda..."
                            required
                        ></textarea>

                    </div>


                    <button
                        type="submit"
                        class="btn-submit"
                    >
                        Kirim Pesan
                    </button>

                </form>

            </div>

        </div>

    </section>

</body>

</html>