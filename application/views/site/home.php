<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Desa Terpadu</title>


    <style>

        * {
            box-sizing: border-box;
        }


        body {
            margin: 0;
            font-family: Arial, sans-serif;
            color: #1e293b;
        }


        /* =========================
           ARTIKEL
        ========================= */

        .article-section {
            padding: 80px 20px;
            background: #ffffff;
        }

        .article-container {
            max-width: 1100px;
            margin: 0 auto;
        }

        .article-header {
            text-align: center;
            margin-bottom: 45px;
        }

        .article-label {
            display: inline-block;
            margin-bottom: 10px;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 1.5px;
            color: #2563eb;
        }

        .article-header h2 {
            margin: 0 0 12px;
            font-size: 32px;
            color: #1e293b;
        }

        .article-header p {
            max-width: 600px;
            margin: 0 auto;
            color: #64748b;
            line-height: 1.7;
        }

        .article-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        .article-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(15, 23, 42, 0.06);
            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease;
        }

        .article-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.10);
        }

        .article-image {
            width: 100%;
            height: 210px;
            object-fit: cover;
            display: block;
        }

        .article-image-placeholder {
            width: 100%;
            height: 210px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #e2e8f0;
            color: #64748b;
        }

        .article-content {
            padding: 22px;
        }

        .article-category {
            display: inline-block;
            margin-bottom: 10px;

            font-size: 12px;
            font-weight: 700;
            color: #2563eb;

            text-transform: uppercase;
        }

        .article-title {
            margin: 0 0 10px;

            font-size: 20px;
            line-height: 1.4;

            color: #1e293b;
        }

        .article-date {
            margin-bottom: 18px;

            font-size: 13px;
            color: #64748b;
        }

        .article-read-more {
            display: inline-block;

            color: #2563eb;
            text-decoration: none;

            font-size: 14px;
            font-weight: 700;
        }

        .article-read-more:hover {
            text-decoration: underline;
        }


        /* =========================
           TESTIMONI
        ========================= */

        .testimoni-section {
            padding: 80px 20px;
            background: #f8fafc;
        }

        .testimoni-container {
            max-width: 1100px;
            margin: 0 auto;
        }

        .testimoni-header {
            text-align: center;
            margin-bottom: 45px;
        }

        .testimoni-label {
            display: inline-block;
            margin-bottom: 10px;

            font-size: 13px;
            font-weight: 700;
            letter-spacing: 1.5px;

            color: #2563eb;
        }

        .testimoni-header h2 {
            margin: 0 0 12px;

            font-size: 32px;
            color: #1e293b;
        }

        .testimoni-header p {
            max-width: 600px;
            margin: 0 auto;

            color: #64748b;
            line-height: 1.7;
        }

        .testimoni-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        .testimoni-card {
            position: relative;

            padding: 30px;

            background: #ffffff;

            border-radius: 16px;
            border: 1px solid #e2e8f0;

            box-shadow: 0 8px 25px rgba(15, 23, 42, 0.06);
        }

        .testimoni-quote {
            font-size: 45px;
            line-height: 1;

            color: #2563eb;

            font-weight: bold;

            margin-bottom: 5px;
        }

        .testimoni-content {
            min-height: 90px;

            margin: 0 0 25px;

            color: #475569;

            line-height: 1.7;

            font-style: italic;
        }

        .testimoni-profile {
            display: flex;
            align-items: center;

            gap: 12px;

            padding-top: 18px;

            border-top: 1px solid #e2e8f0;
        }

        .testimoni-photo {
            width: 50px;
            height: 50px;

            border-radius: 50%;

            object-fit: cover;
        }

        .testimoni-photo-placeholder {
            display: flex;
            align-items: center;
            justify-content: center;

            background: #dbeafe;
            color: #2563eb;

            font-weight: bold;
            font-size: 20px;
        }

        .testimoni-info {
            display: flex;
            flex-direction: column;

            gap: 4px;
        }

        .testimoni-info strong {
            color: #1e293b;
        }

        .testimoni-info span {
            font-size: 13px;
            color: #64748b;
        }


        /* =========================
           FAQ
        ========================= */

        .faq-section {
            padding: 80px 20px;

            background: #ffffff;
        }

        .faq-container {
            max-width: 900px;

            margin: 0 auto;
        }

        .faq-header {
            text-align: center;

            margin-bottom: 40px;
        }

        .faq-label {
            display: inline-block;

            margin-bottom: 10px;

            font-size: 13px;
            font-weight: 700;

            letter-spacing: 1.5px;

            color: #2563eb;
        }

        .faq-header h2 {
            margin: 0 0 12px;

            font-size: 32px;

            color: #1e293b;
        }

        .faq-header p {
            max-width: 600px;

            margin: 0 auto;

            color: #64748b;

            line-height: 1.7;
        }

        .faq-list {
            display: flex;

            flex-direction: column;

            gap: 15px;
        }

        .faq-item {
            background: #ffffff;

            border: 1px solid #e2e8f0;

            border-radius: 14px;

            overflow: hidden;

            box-shadow:
                0 6px 20px rgba(15, 23, 42, 0.05);
        }

        .faq-question {
            width: 100%;

            padding: 20px 22px;

            border: none;

            background: #ffffff;

            color: #1e293b;

            font-size: 16px;
            font-weight: 700;

            text-align: left;

            cursor: pointer;

            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 20px;
        }

        .faq-question:hover {
            background: #f8fafc;
        }

        .faq-icon {
            flex-shrink: 0;

            color: #2563eb;

            font-size: 22px;

            font-weight: 400;

            transition: transform 0.2s ease;
        }

        .faq-answer {
            display: none;

            padding: 0 22px 20px;

            color: #64748b;

            line-height: 1.7;
        }

        .faq-item.active .faq-answer {
            display: block;
        }

        .faq-item.active .faq-icon {
            transform: rotate(45deg);
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 900px) {

            .article-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .testimoni-grid {
                grid-template-columns: repeat(2, 1fr);
            }

        }


        @media (max-width: 600px) {

            .article-section {
                padding: 60px 15px;
            }

            .article-header h2 {
                font-size: 26px;
            }

            .article-grid {
                grid-template-columns: 1fr;
            }


            .testimoni-section {
                padding: 60px 15px;
            }

            .testimoni-header h2 {
                font-size: 26px;
            }

            .testimoni-grid {
                grid-template-columns: 1fr;
            }


            .faq-section {
                padding: 60px 15px;
            }

            .faq-header h2 {
                font-size: 26px;
            }

            .faq-question {
                font-size: 15px;

                padding: 18px;
            }

            .faq-answer {
                padding-left: 18px;
                padding-right: 18px;
            }

        }

    </style>

</head>


<body>


    <?php $this->load->view('site/layout/nav'); ?>


    <?php $this->load->view('site/home/hero'); ?>


    <!-- =========================
         TESTIMONI
    ========================= -->

    <?php if (!empty($testimonials)): ?>

        <section class="testimoni-section">

            <div class="testimoni-container">

                <div class="testimoni-header">

                    <span class="testimoni-label">
                        TESTIMONI
                    </span>

                    <h2>
                        Apa Kata Masyarakat?
                    </h2>

                    <p>
                        Pengalaman masyarakat dalam menggunakan pelayanan
                        dan layanan Desa Terpadu.
                    </p>

                </div>


                <div class="testimoni-grid">

                    <?php foreach ($testimonials as $item): ?>

                        <div class="testimoni-card">

                            <div class="testimoni-quote">
                                “
                            </div>


                            <p class="testimoni-content">
                                <?= html_escape($item->content); ?>
                            </p>


                            <div class="testimoni-profile">

                                <?php if (!empty($item->photo)): ?>

                                    <img
                                        src="<?= base_url('uploads/testimoni/' . $item->photo); ?>"
                                        alt="<?= html_escape($item->name); ?>"
                                        class="testimoni-photo"
                                    >

                                <?php else: ?>

                                    <div class="testimoni-photo testimoni-photo-placeholder">

                                        <?= strtoupper(
                                            substr($item->name, 0, 1)
                                        ); ?>

                                    </div>

                                <?php endif; ?>


                                <div class="testimoni-info">

                                    <strong>
                                        <?= html_escape($item->name); ?>
                                    </strong>


                                    <?php if (!empty($item->position)): ?>

                                        <span>
                                            <?= html_escape($item->position); ?>
                                        </span>

                                    <?php endif; ?>

                                </div>

                            </div>

                        </div>

                    <?php endforeach; ?>

                </div>

            </div>

        </section>

    <?php endif; ?>


    <!-- =========================
         ARTIKEL
    ========================= -->

    <?php if (!empty($articles)): ?>

        <section class="article-section">

            <div class="article-container">

                <div class="article-header">

                    <span class="article-label">
                        ARTIKEL & BERITA
                    </span>

                    <h2>
                        Informasi Terbaru Desa
                    </h2>

                    <p>
                        Dapatkan informasi terbaru mengenai kegiatan,
                        berita, dan perkembangan Desa Terpadu.
                    </p>

                </div>


                <div class="article-grid">

                    <?php foreach ($articles as $article): ?>

                        <article class="article-card">


                            <?php if (!empty($article->image)): ?>

                                <img
                                    src="<?= base_url(
                                        'assets/uploads/' . $article->image
                                    ); ?>"
                                    alt="<?= html_escape($article->title); ?>"
                                    class="article-image"
                                >

                            <?php else: ?>

                                <div class="article-image-placeholder">
                                    Tidak ada gambar
                                </div>

                            <?php endif; ?>


                            <div class="article-content">

                                <div class="article-category">

                                    <?= html_escape(
                                        $article->category
                                    ); ?>

                                </div>


                                <h3 class="article-title">

                                    <?= html_escape(
                                        $article->title
                                    ); ?>

                                </h3>


                                <div class="article-date">

                                    <?= !empty($article->published_at)

                                        ? date(
                                            'd M Y',
                                            strtotime(
                                                $article->published_at
                                            )
                                        )

                                        : date(
                                            'd M Y',
                                            strtotime(
                                                $article->created_at
                                            )
                                        );
                                    ?>

                                </div>


                                <a
                                    href="<?= site_url(
                                        'article/detail/' . $article->slug
                                    ); ?>"
                                    class="article-read-more"
                                >

                                    Baca Selengkapnya →

                                </a>

                            </div>

                        </article>

                    <?php endforeach; ?>

                </div>

            </div>

        </section>

    <?php endif; ?>


    <!-- =========================
         FAQ
    ========================= -->

    <?php if (!empty($faqs)): ?>

        <section class="faq-section">

            <div class="faq-container">


                <div class="faq-header">

                    <span class="faq-label">
                        FAQ
                    </span>


                    <h2>
                        Pertanyaan yang Sering Ditanyakan
                    </h2>


                    <p>
                        Temukan jawaban atas pertanyaan yang sering
                        ditanyakan mengenai layanan Desa Terpadu.
                    </p>

                </div>


                <div class="faq-list">


                    <?php foreach ($faqs as $faq): ?>

                        <div class="faq-item">


                            <button
                                type="button"
                                class="faq-question"
                                onclick="toggleFaq(this)"
                            >

                                <span>
                                    <?= html_escape(
                                        $faq->question
                                    ); ?>
                                </span>


                                <span class="faq-icon">
                                    → 
                                </span>

                            </button>


                            <div class="faq-answer">

                                <?= nl2br(
                                    html_escape(
                                        $faq->answer
                                    )
                                ); ?>

                            </div>


                        </div>

                    <?php endforeach; ?>


                </div>

            </div>

        </section>

    <?php endif; ?>


    <script>

        function toggleFaq(button) {

            const item = button.closest('.faq-item');

            item.classList.toggle('active');

        }

    </script>


</body>

</html>