<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Desa Terpadu</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="<?= base_url('assets/css/output.css'); ?>">
    <style>
    html { scroll-behavior: smooth; }
    section[id] { scroll-margin-top: 80px; }

     .reveal {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.6s ease-out, transform 0.6s ease-out;
    }
    .reveal.visible {
        opacity: 1;
        transform: translateY(0);
    }
    .icon-zoom {
        transition: transform 0.3s ease-out;
    }
    .group:hover .icon-zoom {
        transform: scale(1.1);
    }
    /* Container pagination di luar Swiper */
        .custom-pagination {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 1.5rem;
        }
        /* Bullet tidak aktif */
        .custom-pagination .swiper-pagination-bullet {
            width: 10px;
            height: 10px;
            background-color: #d1d5db;
            border-radius: 50%;
            display: inline-block;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        /* Bullet aktif - warna merah tema */
        .custom-pagination .swiper-pagination-bullet-active {
            background-color: #cc4b4d !important;
        }
    </style>
</head>

<body class="m-0 bg-white">
    <?php $this->load->view('site/layout/nav'); ?>

    <?php
    $this->load->view(
        'site/home/hero',
        [
            'hero'       => $hero,
            'challenges' => $challenges
        ]
    );
    ?>

    <?php $this->load->view('site/home/about'); ?>

    <?php $this->load->view('site/home/features'); ?>

    <?php $this->load->view('site/home/implementation'); ?>

    <?php $this->load->view('site/home/testimoni'); ?>

    <?php $this->load->view('site/home/artikelnews'); ?>

    <?php $this->load->view('site/home/contact'); ?>

    <?php $this->load->view('site/layout/footer'); ?>
</body>
</html>