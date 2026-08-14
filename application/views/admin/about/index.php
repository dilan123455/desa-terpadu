<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= html_escape($title); ?> - Desa Terpadu</title>

    <link rel="stylesheet" href="<?= base_url('assets/css/output.css'); ?>">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            color: #1f2937;
        }

        .sidebar {
            width: 230px;
            background: #ffffff;
            border-right: 1px solid #e5e7eb;
            min-height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            display: flex;
            flex-direction: column;
        }

        .logo-area {
            height: 72px;
            padding: 15px 18px;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo {
            width: 40px;
            height: 40px;
            background: #CC4B4B;
            color: white;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            font-weight: bold;
        }

        .logo-text h2 {
            margin: 0;
            font-size: 14px;
            color: #172554;
        }

        .logo-text p {
            margin: 3px 0 0;
            font-size: 10px;
            color: #64748b;
        }

        .menu {
            padding: 22px 12px;
            flex: 1;
        }

        .menu-title {
            font-size: 10px;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: .5px;
            margin: 0 10px 10px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 11px 13px;
            margin-bottom: 4px;
            border-radius: 9px;
            text-decoration: none;
            color: #475569;
            font-size: 13px;
            transition: .2s;
        }

        .menu a:hover {
            background: #fef2f2;
            color: #CC4B4B;
        }

        .menu a.active {
            background: #fbe8e8;
            color: #CC4B4B;
            font-weight: 600;
        }

        .menu-icon {
            width: 20px;
            text-align: center;
            font-size: 15px;
        }

        .logout {
            padding: 15px 12px;
            border-top: 1px solid #e5e7eb;
        }

        .logout a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 11px 13px;
            border-radius: 9px;
            color: #dc2626;
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
        }

        .logout a:hover {
            background: #fef2f2;
        }

        .main {
            margin-left: 230px;
            min-height: 100vh;
        }

        .topbar {
            height: 72px;
            background: white;
            border-bottom: 1px solid #e5e7eb;
            padding: 0 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .topbar-title h1 {
            margin: 0;
            font-size: 22px;
            color: #172033;
        }

        .topbar-title p {
            margin: 4px 0 0;
            color: #64748b;
            font-size: 12px;
        }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .admin-info {
            text-align: right;
        }

        .admin-info strong {
            display: block;
            font-size: 12px;
            color: #1e293b;
        }

        .admin-info span {
            font-size: 10px;
            color: #64748b;
        }

        .avatar {
            width: 34px;
            height: 34px;
            background: #CC4B4B;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: bold;
        }

        .content {
            padding: 30px;
        }

        .page-header {
            margin-bottom: 25px;
        }

        .page-header h2 {
            margin: 0;
            font-size: 25px;
            color: #172033;
        }

        .page-header p {
            margin: 7px 0 0;
            color: #64748b;
            font-size: 13px;
        }

        .about-card {
            background: white;
            border-radius: 16px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 3px 12px rgba(0, 0, 0, .04);
            overflow: hidden;
        }

        .card-header {
            padding: 22px 25px;
            border-bottom: 1px solid #edf0f2;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-title {
            display: flex;
            align-items: center;
            gap: 13px;
        }

        .card-icon {
            width: 42px;
            height: 42px;
            border-radius: 11px;
            background: #fbe8e8;
            color: #CC4B4B;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 19px;
        }

        .card-title h3 {
            margin: 0;
            font-size: 17px;
            color: #1e293b;
        }

        .card-title p {
            margin: 4px 0 0;
            font-size: 11px;
            color: #94a3b8;
        }

        .btn-edit {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 9px 15px;
            border-radius: 8px;
            background: #CC4B4B;
            color: white;
            text-decoration: none;
            font-size: 12px;
            font-weight: 600;
            transition: .2s;
        }

        .btn-edit:hover {
            background: #b83f3f;
        }

        .card-body {
            padding: 25px;
        }

        .info {
            margin-bottom: 23px;
        }

        .info:last-child {
            margin-bottom: 0;
        }

        .label {
            display: flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 9px;
            font-size: 11px;
            font-weight: 700;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: .4px;
        }

        .value {
            padding: 16px 18px;
            background: #f8fafc;
            border: 1px solid #eef2f7;
            border-radius: 10px;
            line-height: 1.7;
            color: #334155;
            font-size: 13px;
        }

        .title-value {
            font-size: 16px;
            font-weight: 600;
            color: #1e293b;
        }

        .empty {
            padding: 25px;
            text-align: center;
            background: #fff7f7;
            border: 1px solid #f5d0d0;
            color: #991b1b;
            border-radius: 10px;
            font-size: 13px;
        }

        .empty-icon {
            font-size: 30px;
            margin-bottom: 10px;
        }

        .footer {
            margin-top: 30px;
            padding: 18px 0;
            border-top: 1px solid #e5e7eb;
            color: #94a3b8;
            font-size: 11px;
            display: flex;
            justify-content: space-between;
        }

        @media (max-width: 768px) {

            .sidebar {
                width: 70px;
            }

            .logo-text,
            .menu-title,
            .menu a span:not(.menu-icon),
            .logout a span:not(.menu-icon) {
                display: none;
            }

            .logo-area {
                justify-content: center;
                padding: 15px 5px;
            }

            .menu a {
                justify-content: center;
                padding: 12px;
            }

            .logout a {
                justify-content: center;
            }

            .main {
                margin-left: 70px;
            }

            .topbar {
                padding: 0 18px;
            }

            .content {
                padding: 20px;
            }

            .admin-info {
                display: none;
            }

            .card-header {
                align-items: flex-start;
                gap: 15px;
            }
        }
    </style>

</head>

<body>

    <!-- ================= SIDEBAR ================= -->

    <aside class="sidebar">

        <!-- Logo -->
        <div class="logo-area">

            <div class="logo">
                D
            </div>

            <div class="logo-text">
                <h2>Desa Terpadu</h2>
                <p>Admin Panel</p>
            </div>

        </div>


        <!-- Menu -->
        <nav class="menu">

            <p class="menu-title">
                Menu Utama
            </p>


            <!-- Dashboard -->
            <a href="<?= site_url('admin/dashboard'); ?>">

                <span class="menu-icon">⌂</span>

                <span>
                    Dashboard
                </span>

            </a>


            <!-- Artikel -->
            <a href="<?= site_url('admin/articles'); ?>">

                <span class="menu-icon">📰</span>

                <span>
                    Artikel
                </span>

            </a>


            <!-- Testimoni -->
            <a href="<?= site_url('admin/testimoni'); ?>">

                <span class="menu-icon">💬</span>

                <span>
                    Testimoni
                </span>

            </a>


            <!-- FAQ -->
            <a href="<?= site_url('admin/faq'); ?>">

                <span class="menu-icon">❓</span>

                <span>
                    FAQ
                </span>

            </a>


            <!-- Contact -->
            <a href="<?= site_url('admin/contact'); ?>">

                <span class="menu-icon">✉️</span>

                <span>
                    Contact
                </span>

            </a>


            <p class="menu-title" style="margin-top: 25px;">
                Konten Website
            </p>


            <!-- About -->
            <a
                href="<?= site_url('admin/about'); ?>"
                class="active"
            >

                <span class="menu-icon">ℹ️</span>

                <span>
                    About
                </span>

            </a>


            <!-- Features -->
            <a href="<?= site_url('admin/features'); ?>">

                <span class="menu-icon">⭐</span>

                <span>
                    Features
                </span>

            </a>


            <!-- Implementation -->
            <a href="<?= site_url('admin/implementation'); ?>">

                <span class="menu-icon">⚙️</span>

                <span>
                    Implementation
                </span>

            </a>

        </nav>


        <!-- Logout -->
        <div class="logout">

            <a href="<?= site_url('auth/logout'); ?>">

                <span class="menu-icon">↪</span>

                <span>
                    Logout
                </span>

            </a>

        </div>

    </aside>



    <!-- ================= MAIN ================= -->

    <main class="main">


        <!-- Topbar -->
        <header class="topbar">

            <div class="topbar-title">

                <h1>
                    About
                </h1>

                <p>
                    Kelola informasi tentang Desa Terpadu
                </p>

            </div>


            <div class="admin-profile">

                <div class="admin-info">

                    <strong>
                        Administrator
                    </strong>

                    <span>
                        Admin Panel
                    </span>

                </div>

                <div class="avatar">
                    A
                </div>

            </div>

        </header>



        <!-- Content -->
        <section class="content">


            <!-- Page Header -->
            <div class="page-header">

                <h2>
                    Tentang Desa Terpadu
                </h2>

                <p>
                    Informasi ini akan digunakan pada bagian About di website Desa Terpadu.
                </p>

            </div>



            <?php if (!empty($about)): ?>


                <!-- About Card -->
                <div class="about-card">


                    <!-- Card Header -->
                    <div class="card-header">

                        <div class="card-title">

                            <div class="card-icon">
                                ℹ️
                            </div>

                            <div>

                                <h3>
                                    Informasi Utama
                                </h3>

                                <p>
                                    Data yang ditampilkan pada halaman About
                                </p>

                            </div>

                        </div>


                        <div style="display: flex; gap: 10px; flex-wrap: wrap;">

    <a
        href="<?= site_url('admin/about/edit'); ?>"
        class="btn-edit"
    >
        ✏️ Edit Informasi
    </a>

    <a
        href="<?= site_url('admin/about'); ?>#slides"
        class="btn-edit"
    >
        🖼️ Kelola Slide
    </a>

    <a
        href="<?= site_url('admin/about/benefits'); ?>"
        class="btn-edit"
    >
        ⭐ Kelola Manfaat
    </a>

</div>

                    </div>



                    <!-- Card Body -->
                    <div class="card-body">


                        <!-- Judul -->
                        <div class="info">

                            <span class="label">
                                📌 Judul
                            </span>

                            <div class="value title-value">

                                <?= html_escape($about->title); ?>

                            </div>

                        </div>


                        

                        <!-- Deskripsi -->
                        <div class="info">

                            <span class="label">
                                📝 Deskripsi
                            </span>

                            <div class="value">

                                <?= nl2br(html_escape($about->description)); ?>

                            </div>

                        </div>


                        <!-- ================= SLIDE ABOUT ================= -->

<div class="about-card" id="slides" style="margin-top: 25px;">

    <div class="card-header">

        <div class="card-title">

            <div class="card-icon">
                🖼️
            </div>

            <div>
                <h3>
                    Slide About
                </h3>

                <p>
                    Gambar yang ditampilkan pada carousel About website
                </p>
            </div>

        </div>

        <a
            href="<?= site_url('admin/about/slide_create'); ?>"
            class="btn-edit"
        >
            ➕ Tambah Slide
        </a>

        

    </div>


    <div class="card-body">

        <?php if (!empty($slides)): ?>

            <?php foreach ($slides as $slide): ?>

                <div style="
                    display:flex;
                    align-items:center;
                    gap:20px;
                    padding:15px 0;
                    border-bottom:1px solid #e5e7eb;
                ">

                    <img
                        src="<?= base_url('assets/uploads/about/' . $slide->image); ?>"
                        alt="<?= html_escape($slide->title); ?>"
                        style="
                            width:160px;
                            height:90px;
                            object-fit:cover;
                            border-radius:10px;
                            border:1px solid #e5e7eb;
                        "
                    >

                    <div style="flex:1;">

                        <strong style="
                            display:block;
                            margin-bottom:5px;
                        ">
                            <?= html_escape($slide->title); ?>
                        </strong>

                        <span style="
                            font-size:12px;
                            color:#64748b;
                        ">
                            Urutan: <?= html_escape($slide->sort_order); ?>
                        </span>

                    </div>

                    <div style="
                        display:flex;
                        gap:8px;
                    ">

                        <a
                            href="<?= site_url('admin/about/edit_slide/' . $slide->id); ?>"
                            class="btn-edit"
                        >
                            ✏️ Edit
                        </a>

                        <a
                            href="<?= site_url('admin/about/slide_delete/' . $slide->id); ?>"
                            class="btn-edit"
                            onclick="return confirm('Yakin ingin menghapus slide ini?');"
                        >
                            🗑️ Hapus
                        </a>

                    </div>

                </div>

            <?php endforeach; ?>

        <?php else: ?>

            <div class="empty">
                Belum ada slide About.
            </div>

        <?php endif; ?>

    </div>

</div>

                    </div>

                </div>


                <?php if (!empty($slides)): ?>

    <div class="about-card" style="margin-top: 25px;">

        <div class="card-header">

            <div class="card-title">

                <div class="card-icon">
                    🖼️
                </div>

                <div>

                    <h3>
                        Gambar Carousel
                    </h3>

                    <p>
                        Gambar yang ditampilkan pada bagian About website.
                    </p>

                </div>

            </div>

        </div>


        <div class="card-body">

            <?php foreach ($slides as $slide): ?>

                <div
                    style="
                        display:flex;
                        align-items:center;
                        gap:20px;
                        padding:18px 0;
                        border-bottom:1px solid #edf0f2;
                    "
                >

                    <!-- Gambar -->
                    <div style="width:180px; flex-shrink:0;">

                        <img
                            src="<?= base_url('assets/uploads/about/' . $slide->image); ?>"
                            alt="<?= html_escape($slide->title); ?>"
                            style="
                                width:100%;
                                height:100px;
                                object-fit:cover;
                                border-radius:10px;
                                border:1px solid #e5e7eb;
                            "
                        >

                    </div>


                    <!-- Informasi -->
                    <div style="flex:1;">

                        <div
                            style="
                                font-size:15px;
                                font-weight:600;
                                color:#1e293b;
                                margin-bottom:6px;
                            "
                        >
                            <?= html_escape($slide->title); ?>
                        </div>

                        <div
                            style="
                                font-size:12px;
                                color:#64748b;
                                margin-bottom:5px;
                            "
                        >
                            File:
                            <?= html_escape($slide->image); ?>
                        </div>

                        <div
                            style="
                                font-size:12px;
                                color:#64748b;
                            "
                        >
                            Urutan:
                            <?= html_escape($slide->sort_order); ?>
                        </div>

                    </div>


                    <!-- Edit -->
                    <div>

                        <a
                            href="<?= site_url('admin/about/edit_slide/' . $slide->id); ?>"
                            class="btn-edit"
                        >
                            ✏️ Edit
                        </a>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

    </div>

<?php endif; ?>
            <?php else: ?>


                <!-- Empty State -->
                <div class="about-card">

                    <div class="card-body">

                        <div class="empty">

                            <div class="empty-icon">
                                ℹ️
                            </div>

                            <strong>
                                Data Tentang Desa Terpadu Belum Tersedia
                            </strong>

                            <p>
                                Silakan tambahkan informasi About terlebih dahulu.
                            </p>

                        </div>

                    </div>

                </div>


            <?php endif; ?>



            <!-- Footer -->
            <div class="footer">

                <span>
                    © <?= date('Y'); ?> Desa Terpadu
                </span>

                <span>
                    Admin Panel
                </span>

            </div>


        </section>

    </main>

</body>

</html>