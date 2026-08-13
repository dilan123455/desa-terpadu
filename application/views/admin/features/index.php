<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        <?= html_escape($title); ?> - Desa Terpadu
    </title>


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


        /* =====================================================
           SIDEBAR
        ===================================================== */

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


        /* =====================================================
           MENU
        ===================================================== */

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

            background: #fbe8e8;

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


        /* =====================================================
           LOGOUT
        ===================================================== */

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


        /* =====================================================
           MAIN
        ===================================================== */

        .main {

            margin-left: 230px;

            min-height: 100vh;

        }


        /* =====================================================
           TOPBAR
        ===================================================== */

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


        /* =====================================================
           CONTENT
        ===================================================== */

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


        /* =====================================================
           PLATFORM CARD
        ===================================================== */

        .platform-card {

            background: white;

            border: 1px solid #e5e7eb;

            border-radius: 15px;

            box-shadow: 0 3px 12px rgba(0, 0, 0, .04);

            overflow: hidden;

            margin-bottom: 25px;

        }


        .platform-header {

            padding: 22px 24px;

            border-bottom: 1px solid #edf0f2;

            display: flex;

            justify-content: space-between;

            align-items: flex-start;

            gap: 20px;

        }


        .platform-info {

            display: flex;

            gap: 14px;

        }


        .platform-icon {

            width: 46px;

            height: 46px;

            min-width: 46px;

            background: #fbe8e8;

            color: #CC4B4B;

            border-radius: 11px;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 20px;

        }


        .platform-name {

            margin: 0;

            font-size: 18px;

            color: #1e293b;

        }


        .platform-description {

            margin: 6px 0 0;

            color: #64748b;

            font-size: 12px;

            line-height: 1.7;

            max-width: 650px;

        }


        /* =====================================================
           EDIT PLATFORM
        ===================================================== */

        .btn-platform {

            display: inline-flex;

            align-items: center;

            gap: 7px;

            padding: 9px 13px;

            background: #fff8df;

            color: #a16207;

            border-radius: 8px;

            text-decoration: none;

            font-size: 11px;

            font-weight: 600;

            white-space: nowrap;

            transition: .2s;

        }


        .btn-platform:hover {

            background: #fef3c7;

        }


        /* =====================================================
           FEATURES SECTION
        ===================================================== */

        .features-section {

            padding: 22px 24px 25px;

        }


        .features-header {

            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 17px;

        }


        .features-title {

            display: flex;

            align-items: center;

            gap: 8px;

        }


        .features-title h3 {

            margin: 0;

            font-size: 14px;

            color: #334155;

        }


        .features-count {

            background: #fbe8e8;

            color: #CC4B4B;

            padding: 4px 8px;

            border-radius: 20px;

            font-size: 10px;

            font-weight: 700;

        }


        /* =====================================================
           FEATURE GRID
        ===================================================== */

        .feature-grid {

            display: grid;

            grid-template-columns:
                repeat(3, minmax(0, 1fr));

            gap: 13px;

        }


        .feature-card {

            border: 1px solid #e5e7eb;

            border-radius: 11px;

            padding: 16px;

            background: #ffffff;

            transition: .2s;

        }


        .feature-card:hover {

            border-color: #efb0b0;

            box-shadow:
                0 4px 12px rgba(0, 0, 0, .05);

            transform: translateY(-2px);

        }


        .feature-top {

            display: flex;

            justify-content: space-between;

            align-items: flex-start;

            gap: 10px;

        }


        .feature-number {

            width: 28px;

            height: 28px;

            background: #fbe8e8;

            color: #CC4B4B;

            border-radius: 8px;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 11px;

            font-weight: 700;

        }


        .feature-edit {

            color: #64748b;

            text-decoration: none;

            font-size: 11px;

            font-weight: 600;

        }


        .feature-edit:hover {

            color: #CC4B4B;

        }


        .feature-card h4 {

            margin: 12px 0 6px;

            color: #1e293b;

            font-size: 13px;

            line-height: 1.5;

        }


        .feature-card p {

            margin: 0;

            color: #64748b;

            font-size: 11px;

            line-height: 1.7;

        }


        /* =====================================================
           EMPTY
        ===================================================== */

        .empty {

            padding: 35px 20px;

            text-align: center;

            border: 1px dashed #dbe1e8;

            border-radius: 10px;

            color: #94a3b8;

        }


        .empty-icon {

            width: 45px;

            height: 45px;

            margin: 0 auto 10px;

            background: #f8fafc;

            color: #94a3b8;

            border-radius: 50%;

            display: flex;

            align-items: center;

            justify-content: center;

        }


        .empty p {

            margin: 0;

            font-size: 12px;

        }


        /* =====================================================
           FOOTER
        ===================================================== */

        .footer {

            margin-top: 30px;

            padding: 18px 0;

            border-top: 1px solid #e5e7eb;

            color: #94a3b8;

            font-size: 11px;

            display: flex;

            justify-content: space-between;

        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 1000px) {

            .feature-grid {

                grid-template-columns:
                    repeat(2, minmax(0, 1fr));

            }

        }


        @media (max-width: 900px) {

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


            .content {

                padding: 20px;

            }

        }


        @media (max-width: 650px) {

            .platform-header {

                flex-direction: column;

            }


            .btn-platform {

                width: 100%;

                justify-content: center;

            }


            .feature-grid {

                grid-template-columns: 1fr;

            }


            .admin-info {

                display: none;

            }


            .topbar {

                padding: 0 18px;

            }


            .topbar-title h1 {

                font-size: 18px;

            }


            .content {

                padding: 15px;

            }

        }

    </style>

</head>


<body>


    <!-- =====================================================
         SIDEBAR
    ===================================================== -->

    <aside class="sidebar">


        <!-- Logo -->

        <div class="logo-area">

            <div class="logo">
                D
            </div>


            <div class="logo-text">

                <h2>
                    Desa Terpadu
                </h2>

                <p>
                    Admin Panel
                </p>

            </div>

        </div>



        <!-- Menu -->

        <nav class="menu">


            <p class="menu-title">
                Menu Utama
            </p>


            <!-- Dashboard -->

            <a href="<?= site_url('admin/dashboard'); ?>">

                <span class="menu-icon">
                    ⌂
                </span>

                <span>
                    Dashboard
                </span>

            </a>



            <!-- Artikel -->

            <a href="<?= site_url('admin/articles'); ?>">

                <span class="menu-icon">
                    📰
                </span>

                <span>
                    Artikel
                </span>

            </a>



            <!-- Testimoni -->

            <a href="<?= site_url('admin/testimoni'); ?>">

                <span class="menu-icon">
                    💬
                </span>

                <span>
                    Testimoni
                </span>

            </a>



            <!-- FAQ -->

            <a href="<?= site_url('admin/faq'); ?>">

                <span class="menu-icon">
                    ❓
                </span>

                <span>
                    FAQ
                </span>

            </a>



            <!-- Contact -->

            <a href="<?= site_url('admin/contact_messages'); ?>">

                <span class="menu-icon">
                    ✉️
                </span>

                <span>
                    Pesan Masuk
                </span>

            </a>



            <p
                class="menu-title"
                style="margin-top: 25px;"
            >
                Konten Website
            </p>



            <!-- About -->

            <a href="<?= site_url('admin/about'); ?>">

                <span class="menu-icon">
                    ℹ️
                </span>

                <span>
                    About
                </span>

            </a>



            <!-- Features -->

            <a
                href="<?= site_url('admin/features'); ?>"
                class="active"
            >

                <span class="menu-icon">
                    ⭐
                </span>

                <span>
                    Features
                </span>

            </a>



            <!-- Implementation -->

            <a href="<?= site_url('admin/implementation'); ?>">

                <span class="menu-icon">
                    ⚙️
                </span>

                <span>
                    Implementation
                </span>

            </a>


        </nav>



        <!-- Logout -->

        <div class="logout">

            <a href="<?= site_url('auth/logout'); ?>">

                <span class="menu-icon">
                    ↪
                </span>

                <span>
                    Logout
                </span>

            </a>

        </div>


    </aside>



    <!-- =====================================================
         MAIN
    ===================================================== -->

    <main class="main">



        <!-- =================================================
             TOPBAR
        ================================================= -->

        <header class="topbar">


            <div class="topbar-title">

                <h1>
                    Features
                </h1>

                <p>
                    Kelola fitur unggulan Desa Terpadu
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



        <!-- =================================================
             CONTENT
        ================================================= -->

        <section class="content">



            <!-- Page Header -->

            <div class="page-header">

                <h2>
                    Fitur Unggulan
                </h2>

                <p>
                    Kelola informasi platform dan fitur
                    Desa Terpadu.
                </p>

            </div>



            <!-- =================================================
                 PLATFORM
            ================================================= -->

            <?php if (!empty($platforms)): ?>


                <?php foreach ($platforms as $platform): ?>


                    <div class="platform-card">


                        <!-- Platform Header -->

                        <div class="platform-header">


                            <div class="platform-info">


                                <div class="platform-icon">
                                    ⭐
                                </div>


                                <div>

                                    <h2 class="platform-name">

                                        <?= html_escape(
                                            $platform->name
                                        ); ?>

                                    </h2>


                                    <p class="platform-description">

                                        <?= html_escape(
                                            $platform->description
                                        ); ?>

                                    </p>

                                </div>


                            </div>



                            <!-- Edit Platform -->

                            <a
                                href="<?= site_url(
                                    'admin/features/edit-platform/' .
                                    $platform->id
                                ); ?>"
                                class="btn-platform"
                            >

                                ✏

                                Edit Platform

                            </a>


                        </div>



                        <!-- =================================================
                             FEATURES
                        ================================================= -->

                        <div class="features-section">


                            <div class="features-header">


                                <div class="features-title">

                                    <h3>
                                        Daftar Fitur
                                    </h3>

                                </div>


                            </div>



                            <div class="feature-grid">


                                <?php

                                $feature_count = 0;

                                ?>


                                <?php foreach ($items as $item): ?>


                                    <?php if (
                                        $item->platform_id ==
                                        $platform->id
                                    ): ?>


                                        <?php

                                        $feature_count++;

                                        ?>


                                        <div class="feature-card">


                                            <div class="feature-top">


                                                <div class="feature-number">

                                                    <?= $feature_count; ?>

                                                </div>


                                                <a
                                                    href="<?= site_url(
                                                        'admin/features/edit-item/' .
                                                        $item->id
                                                    ); ?>"
                                                    class="feature-edit"
                                                >

                                                    Edit

                                                </a>


                                            </div>



                                            <h4>

                                                <?= html_escape(
                                                    $item->title
                                                ); ?>

                                            </h4>



                                            <p>

                                                <?= html_escape(
                                                    $item->description
                                                ); ?>

                                            </p>


                                        </div>


                                    <?php endif; ?>


                                <?php endforeach; ?>


                            </div>



                            <?php if ($feature_count === 0): ?>


                                <div class="empty">


                                    <div class="empty-icon">
                                        ⭐
                                    </div>


                                    <p>
                                        Belum ada fitur untuk platform ini.
                                    </p>


                                </div>


                            <?php endif; ?>


                        </div>


                    </div>


                <?php endforeach; ?>


            <?php else: ?>


                <!-- Empty Platform -->

                <div class="platform-card">


                    <div class="empty">


                        <div class="empty-icon">
                            ⭐
                        </div>


                        <p>
                            Belum ada platform yang tersedia.
                        </p>


                    </div>


                </div>


            <?php endif; ?>



            <!-- =================================================
                 FOOTER
            ================================================= -->

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