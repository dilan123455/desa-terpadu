<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?= base_url('assets/css/output.css'); ?>">

    <title><?= html_escape($title); ?> - Desa Terpadu</title>

    <style>
        /* =========================================================
           RESET
        ========================================================= */

        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            min-height: 100%;
        }

        body {
            background: #f5f6f8;
            color: #1f2937;
        }


        /* =========================================================
           SIDEBAR
        ========================================================= */

        .admin-sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;

            width: 256px;

            background: #ffffff;
            border-right: 1px solid #e5e7eb;

            display: flex;
            flex-direction: column;

            z-index: 1000;
        }


        /* =========================================================
           SIDEBAR LOGO
        ========================================================= */

        .sidebar-logo {
            height: 88px;

            padding: 0 24px;

            display: flex;
            align-items: center;

            border-bottom: 1px solid #e5e7eb;
        }

        .logo-box {
            width: 42px;
            height: 42px;

            border-radius: 12px;

            background: #CC4B4B;

            display: flex;
            align-items: center;
            justify-content: center;

            color: white;

            font-size: 20px;
            font-weight: 700;

            flex-shrink: 0;
        }

        .logo-title {
            margin-left: 12px;
        }

        .logo-title h1 {
            margin: 0;

            font-size: 17px;
            line-height: 1.2;

            font-weight: 700;

            color: #1f2937;
        }

        .logo-title p {
            margin: 4px 0 0;

            font-size: 11px;

            color: #9ca3af;
        }


        /* =========================================================
           SIDEBAR NAVIGATION
        ========================================================= */

        .sidebar-nav {
            flex: 1;

            padding: 24px 16px;

            overflow-y: auto;
        }

        .menu-title {
            margin: 0 12px 10px;

            font-size: 10px;

            font-weight: 700;

            color: #9ca3af;

            text-transform: uppercase;

            letter-spacing: 0.08em;
        }

        .menu-section {
            margin-top: 26px;
        }

        .sidebar-link {
            display: flex;

            align-items: center;

            gap: 12px;

            width: 100%;

            padding: 11px 14px;

            margin-bottom: 5px;

            border-radius: 10px;

            text-decoration: none;

            color: #6b7280;

            font-size: 14px;

            font-weight: 500;

            transition:
                background-color 0.2s ease,
                color 0.2s ease,
                transform 0.2s ease;
        }

        .sidebar-link:hover {
            background: #fef2f2;

            color: #CC4B4B;
        }

        .sidebar-link.active {
            background: #fceaea;

            color: #CC4B4B;

            font-weight: 600;
        }

        .sidebar-icon {
            width: 22px;

            display: flex;

            align-items: center;
            justify-content: center;

            font-size: 17px;

            flex-shrink: 0;
        }


        /* =========================================================
           SIDEBAR LOGOUT
        ========================================================= */

        .sidebar-bottom {
            padding: 16px;

            border-top: 1px solid #e5e7eb;
        }

        .logout-link {
            display: flex;

            align-items: center;

            gap: 12px;

            padding: 11px 14px;

            border-radius: 10px;

            text-decoration: none;

            color: #dc2626;

            font-size: 14px;

            font-weight: 500;

            transition: background-color 0.2s ease;
        }

        .logout-link:hover {
            background: #fef2f2;
        }


        /* =========================================================
           MAIN AREA
        ========================================================= */

        .admin-main {
            margin-left: 256px;

            min-height: 100vh;

            width: calc(100% - 256px);
        }


        /* =========================================================
           TOPBAR
        ========================================================= */

        .admin-topbar {
            position: fixed;

            top: 0;
            right: 0;

            left: 256px;

            height: 88px;

            background: rgba(255, 255, 255, 0.97);

            border-bottom: 1px solid #e5e7eb;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 0 32px;

            z-index: 900;
        }

        .topbar-title h2 {
            margin: 0;

            font-size: 21px;

            font-weight: 700;

            color: #1f2937;
        }

        .topbar-title p {
            margin: 5px 0 0;

            font-size: 13px;

            color: #9ca3af;
        }

        .admin-profile {
            display: flex;

            align-items: center;

            gap: 12px;
        }

        .admin-profile-info {
            text-align: right;
        }

        .admin-profile-name {
            margin: 0;

            font-size: 13px;

            font-weight: 600;

            color: #1f2937;
        }

        .admin-profile-role {
            margin: 3px 0 0;

            font-size: 11px;

            color: #9ca3af;
        }

        .profile-avatar {
            width: 40px;
            height: 40px;

            border-radius: 50%;

            background: #CC4B4B;

            display: flex;

            align-items: center;
            justify-content: center;

            color: white;

            font-size: 15px;

            font-weight: 700;
        }


        /* =========================================================
           CONTENT
        ========================================================= */

        .admin-content {
            padding: 32px;

            padding-top: 120px;

            min-height: 100vh;

            width: 100%;
        }


        /* =========================================================
           WELCOME CARD
        ========================================================= */

        .welcome-card {
            background: #CC4B4B;

            border-radius: 18px;

            padding: 28px 30px;

            color: white;

            margin-bottom: 28px;

            box-shadow: 0 8px 25px rgba(204, 75, 75, 0.15);
        }

        .welcome-content {
            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 25px;
        }

        .welcome-small {
            margin: 0 0 7px;

            font-size: 13px;

            color: #fdeaea;
        }

        .welcome-title {
            margin: 0;

            font-size: 28px;

            line-height: 1.2;

            font-weight: 700;
        }

        .welcome-description {
            max-width: 650px;

            margin: 10px 0 0;

            font-size: 13px;

            line-height: 1.7;

            color: #fdeaea;
        }

        .welcome-icon {
            font-size: 62px;

            opacity: 0.2;
        }


        /* =========================================================
           STATISTICS
        ========================================================= */

        .statistics-grid {
            display: grid;

            grid-template-columns: repeat(4, minmax(0, 1fr));

            gap: 18px;

            margin-bottom: 32px;
        }

        .stat-card {
            background: #ffffff;

            border: 1px solid #e5e7eb;

            border-radius: 16px;

            padding: 20px;

            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.03);

            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease;
        }

        .stat-card:hover {
            transform: translateY(-2px);

            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
        }

        .stat-content {
            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 15px;
        }

        .stat-label {
            margin: 0;

            font-size: 13px;

            color: #6b7280;
        }

        .stat-number {
            margin: 7px 0 0;

            font-size: 28px;

            line-height: 1;

            font-weight: 700;

            color: #1f2937;
        }

        .stat-description {
            margin: 7px 0 0;

            font-size: 11px;

            color: #9ca3af;
        }

        .stat-icon {
            width: 46px;
            height: 46px;

            border-radius: 12px;

            display: flex;

            align-items: center;
            justify-content: center;

            font-size: 19px;

            flex-shrink: 0;
        }

        .icon-red {
            background: #fceaea;
            color: #CC4B4B;
        }

        .icon-green {
            background: #ecfdf3;
            color: #16a34a;
        }

        .icon-purple {
            background: #f5f3ff;
            color: #7c3aed;
        }

        .icon-orange {
            background: #fff7ed;
            color: #ea580c;
        }


        /* =========================================================
           QUICK ACCESS HEADER
        ========================================================= */

        .quick-header {
            margin-bottom: 17px;
        }

        .quick-title {
            margin: 0;

            font-size: 19px;

            font-weight: 700;

            color: #1f2937;
        }

        .quick-description {
            margin: 5px 0 0;

            font-size: 13px;

            color: #9ca3af;
        }


        /* =========================================================
           QUICK ACCESS CARDS
        ========================================================= */

        .quick-grid {
            display: grid;

            grid-template-columns: repeat(3, minmax(0, 1fr));

            gap: 18px;
        }

        .quick-card {
            display: block;

            background: #ffffff;

            border: 1px solid #e5e7eb;

            border-radius: 16px;

            padding: 21px;

            text-decoration: none;

            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease,
                border-color 0.2s ease;
        }

        .quick-card:hover {
            transform: translateY(-3px);

            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.07);

            border-color: #f1b5b5;
        }

        .quick-card-top {
            display: flex;

            align-items: center;

            justify-content: space-between;
        }

        .quick-icon {
            width: 46px;
            height: 46px;

            border-radius: 12px;

            display: flex;

            align-items: center;
            justify-content: center;

            font-size: 19px;
        }

        .quick-arrow {
            font-size: 20px;

            color: #d1d5db;

            transition: color 0.2s ease;
        }

        .quick-card:hover .quick-arrow {
            color: #CC4B4B;
        }

        .quick-card h4 {
            margin: 18px 0 0;

            font-size: 16px;

            font-weight: 700;

            color: #1f2937;
        }

        .quick-card p {
            margin: 7px 0 0;

            font-size: 12px;

            line-height: 1.6;

            color: #6b7280;
        }


        /* =========================================================
           FOOTER
        ========================================================= */

        .admin-footer {
            margin-top: 35px;

            padding-top: 20px;

            border-top: 1px solid #e5e7eb;

            display: flex;

            justify-content: space-between;

            gap: 15px;

            color: #9ca3af;

            font-size: 12px;
        }


        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media (max-width: 1100px) {

            .statistics-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .quick-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }


        @media (max-width: 768px) {

            .admin-sidebar {
                width: 220px;
            }

            .admin-main {
                margin-left: 220px;

                width: calc(100% - 220px);
            }

            .admin-topbar {
                left: 220px;

                padding: 0 20px;
            }

            .admin-content {
                padding-left: 20px;
                padding-right: 20px;
            }

            .welcome-content {
                align-items: flex-start;
            }

            .welcome-icon {
                display: none;
            }
        }


        @media (max-width: 640px) {

            .admin-sidebar {
                position: relative;

                width: 100%;

                height: auto;
            }

            .admin-main {
                margin-left: 0;

                width: 100%;
            }

            .admin-topbar {
                position: relative;

                left: 0;

                height: auto;

                min-height: 75px;

                padding: 15px 20px;
            }

            .admin-content {
                padding-top: 25px;
            }

            .statistics-grid,
            .quick-grid {
                grid-template-columns: 1fr;
            }

            .admin-profile-info {
                display: none;
            }

            .welcome-title {
                font-size: 23px;
            }

            .admin-footer {
                flex-direction: column;
            }
        }
    </style>
</head>


<body>

<div class="admin-wrapper">


    <!-- =========================================================
         SIDEBAR
    ========================================================== -->

    <aside class="admin-sidebar">


        <!-- Logo -->

        <div class="sidebar-logo">

            <div class="logo-box">
                D
            </div>

            <div class="logo-title">

                <h1>
                    Desa Terpadu
                </h1>

                <p>
                    Admin Panel
                </p>

            </div>

        </div>


        <!-- Navigation -->

        <nav class="sidebar-nav">


            <p class="menu-title">
                Menu Utama
            </p>


            <!-- Dashboard -->

            <a
                href="<?= site_url('admin/dashboard'); ?>"
                class="sidebar-link active"
            >

                <span class="sidebar-icon">
                    ⌂
                </span>

                <span>
                    Dashboard
                </span>

            </a>


            <!-- Artikel -->

            <a
                href="<?= site_url('admin/articles'); ?>"
                class="sidebar-link"
            >

                <span class="sidebar-icon">
                    📰
                </span>

                <span>
                    Artikel
                </span>

            </a>


            <!-- Testimoni -->

            <a
                href="<?= site_url('admin/testimoni'); ?>"
                class="sidebar-link"
            >

                <span class="sidebar-icon">
                    💬
                </span>

                <span>
                    Testimoni
                </span>

            </a>


            <!-- FAQ -->

            <a
                href="<?= site_url('admin/faq'); ?>"
                class="sidebar-link"
            >

                <span class="sidebar-icon">
                    ❓
                </span>

                <span>
                    FAQ
                </span>

            </a>


            <!-- Contact -->

            <a
                href="<?= site_url('admin/contact'); ?>"
                class="sidebar-link"
            >

                <span class="sidebar-icon">
                    ✉️
                </span>

                <span>
                    Contact
                </span>

            </a>


            <!-- Konten Website -->

            <div class="menu-section">

                <p class="menu-title">
                    Konten Website
                </p>


                <!-- About -->

                <a
                    href="<?= site_url('admin/about'); ?>"
                    class="sidebar-link"
                >

                    <span class="sidebar-icon">
                        ℹ️
                    </span>

                    <span>
                        About
                    </span>

                </a>


                <!-- Features -->

                <a
                    href="<?= site_url('admin/features'); ?>"
                    class="sidebar-link"
                >

                    <span class="sidebar-icon">
                        ⭐
                    </span>

                    <span>
                        Features
                    </span>

                </a>


                <!-- Implementation -->

                <a
                    href="<?= site_url('admin/implementation'); ?>"
                    class="sidebar-link"
                >

                    <span class="sidebar-icon">
                        ⚙️
                    </span>

                    <span>
                        Implementation
                    </span>

                </a>

            </div>

        </nav>


        <!-- Logout -->

        <div class="sidebar-bottom">

            <a
                href="<?= site_url('auth/logout'); ?>"
                class="logout-link"
            >

                <span class="sidebar-icon">
                    ↪
                </span>

                <span>
                    Logout
                </span>

            </a>

        </div>

    </aside>



    <!-- =========================================================
         MAIN
    ========================================================== -->

    <div class="admin-main">


        <!-- =====================================================
             TOPBAR
        ====================================================== -->

        <header class="admin-topbar">


            <div class="topbar-title">

                <h2>
                    Dashboard
                </h2>

                <p>
                    Kelola konten website Desa Terpadu
                </p>

            </div>


            <!-- Admin Profile -->

            <div class="admin-profile">

                <div class="admin-profile-info">

                    <p class="admin-profile-name">
                        <?= html_escape($name); ?>
                    </p>

                    <p class="admin-profile-role">
                        Administrator
                    </p>

                </div>


                <div class="profile-avatar">

                    <?= strtoupper(
                        substr(
                            html_escape($name),
                            0,
                            1
                        )
                    ); ?>

                </div>

            </div>

        </header>



        <!-- =====================================================
             CONTENT
        ====================================================== -->

        <main class="admin-content">


            <!-- =================================================
                 WELCOME
            ================================================== -->

            <section class="welcome-card">

                <div class="welcome-content">


                    <div>

                        <p class="welcome-small">
                            Selamat datang kembali 👋
                        </p>

                        <h3 class="welcome-title">
                            <?= html_escape($name); ?>
                        </h3>

                        <<p class="welcome-description">
    Kelola informasi, artikel, testimoni,
    FAQ, About, Features, dan Implementation
    website Desa Terpadu melalui panel admin.
</p>

                    </div>


                    <div class="welcome-icon">
                        🏡
                    </div>


                </div>

            </section>



            <!-- =================================================
                 STATISTICS
            ================================================== -->

            <section class="statistics-grid">


                <!-- Artikel -->

                <div class="stat-card">

                    <div class="stat-content">

                        <div>

                            <p class="stat-label">
                                Artikel
                            </p>

                            <h3 class="stat-number">
                                 <?= $total_articles; ?>
                            </h3>

                            <p class="stat-description">
                                Total artikel
                            </p>

                        </div>


                        <div class="stat-icon icon-red">
                            📰
                        </div>

                    </div>

                </div>



                <!-- Testimoni -->

                <div class="stat-card">

                    <div class="stat-content">

                        <div>

                            <p class="stat-label">
                                Testimoni
                            </p>

                            <h3 class="stat-number">
                                 <?= $total_testimonials; ?>
                            </h3>

                            <p class="stat-description">
                                Total testimoni
                            </p>

                        </div>


                        <div class="stat-icon icon-green">
                            💬
                        </div>

                    </div>

                </div>



                <!-- FAQ -->

                <div class="stat-card">

                    <div class="stat-content">

                        <div>

                            <p class="stat-label">
                                FAQ
                            </p>

                            <h3 class="stat-number">
                                 <?= $total_faqs; ?>
                            </h3>

                            <p class="stat-description">
                                Total pertanyaan
                            </p>

                        </div>


                        <div class="stat-icon icon-purple">
                            ❓
                        </div>

                    </div>

                </div>

                <!-- Implementation -->

<div class="stat-card">

    <div class="stat-content">

        <div>

            <p class="stat-label">
                Implementation
            </p>

            <h3 class="stat-number">
                <?= $total_implementation; ?>
            </h3>

            <p class="stat-description">
                Total implementation
            </p>

        </div>

        <div class="stat-icon icon-orange">
            ⚙️
        </div>

    </div>

</div>




            </section>



            <!-- =================================================
                 QUICK ACCESS HEADER
            ================================================== -->

            <section class="quick-header">

                <h3 class="quick-title">
                    Akses Cepat
                </h3>

                <p class="quick-description">
                    Kelola konten website dengan cepat.
                </p>

            </section>



            <!-- =================================================
                 QUICK ACCESS
            ================================================== -->

            <section class="quick-grid">


                <!-- Artikel -->

                <a
                    href="<?= site_url('admin/articles'); ?>"
                    class="quick-card"
                >

                    <div class="quick-card-top">

                        <div class="quick-icon icon-red">
                            📰
                        </div>

                        <span class="quick-arrow">
                            →
                        </span>

                    </div>

                    <h4>
                        Kelola Artikel
                    </h4>

                    <p>
                        Tambah, edit, dan hapus artikel website.
                    </p>

                </a>



                <!-- Testimoni -->

                <a
                    href="<?= site_url('admin/testimoni'); ?>"
                    class="quick-card"
                >

                    <div class="quick-card-top">

                        <div class="quick-icon icon-green">
                            💬
                        </div>

                        <span class="quick-arrow">
                            →
                        </span>

                    </div>

                    <h4>
                        Kelola Testimoni
                    </h4>

                    <p>
                        Kelola testimoni dari pengguna Desa Terpadu.
                    </p>

                </a>



                <!-- FAQ -->

                <a
                    href="<?= site_url('admin/faq'); ?>"
                    class="quick-card"
                >

                    <div class="quick-card-top">

                        <div class="quick-icon icon-purple">
                            ❓
                        </div>

                        <span class="quick-arrow">
                            →
                        </span>

                    </div>

                    <h4>
                        Kelola FAQ
                    </h4>

                    <p>
                        Kelola pertanyaan dan jawaban yang sering
                        ditanyakan.
                    </p>

                </a>






                <!-- About -->

                <a
                    href="<?= site_url('admin/about'); ?>"
                    class="quick-card"
                >

                    <div class="quick-card-top">

                        <div
                            class="quick-icon"
                            style="
                                background: #f5f3ff;
                                color: #6366f1;
                            "
                        >
                            ℹ️
                        </div>

                        <span class="quick-arrow">
                            →
                        </span>

                    </div>

                    <h4>
                        Tentang Desa Terpadu
                    </h4>

                    <p>
                        Kelola informasi mengenai Desa Terpadu.
                    </p>

                </a>



                <!-- Features -->

                <a
                    href="<?= site_url('admin/features'); ?>"
                    class="quick-card"
                >

                    <div class="quick-card-top">

                        <div
                            class="quick-icon"
                            style="
                                background: #fffbeb;
                                color: #d97706;
                            "
                        >
                            ⭐
                        </div>

                        <span class="quick-arrow">
                            →
                        </span>

                    </div>

                    <h4>
                        Fitur Unggulan
                    </h4>

                    <p>
                        Kelola fitur unggulan Desa Terpadu.
                    </p>

                </a>



                <!-- Implementation -->

                <a
                    href="<?= site_url('admin/implementation'); ?>"
                    class="quick-card"
                >

                    <div class="quick-card-top">

                        <div
                            class="quick-icon"
                            style="
                                background: #f0fdf4;
                                color: #16a34a;
                            "
                        >
                            ⚙️
                        </div>

                        <span class="quick-arrow">
                            →
                        </span>

                    </div>

                    <h4>
                        Implementation
                    </h4>

                    <p>
                        Kelola langkah implementasi Desa Terpadu.
                    </p>

                </a>

            </section>



            <!-- =================================================
                 FOOTER
            ================================================== -->

            <footer class="admin-footer">

                <p>
                    © <?= date('Y'); ?> Desa Terpadu
                </p>

                <p>
                    Admin Dashboard
                </p>

            </footer>


        </main>

    </div>

</div>

</body>

</html>