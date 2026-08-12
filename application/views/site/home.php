<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Desa Terpadu</title>

    <link rel="stylesheet" href="<?= base_url('assets/css/output.css'); ?>">
</head>

<body class="m-0 bg-white">

    <!-- Navbar -->
    <?php $this->load->view('site/layout/nav'); ?>


    <!-- Hero -->
    <?php $this->load->view('site/home/hero'); ?>

     <!--about-->
    <?php $this->load->view('site/home/about'); ?>

      <!--features-->
    <?php $this->load->view('site/home/features'); ?>

      <!--implementation-->
    <?php $this->load->view('site/home/implementation'); ?>

    <!--testimoni-->
    <?php $this->load->view('site/home/testimoni'); ?>

        <!--artikeldan news-->
    <?php $this->load->view('site/home/artikelnews'); ?>

            <!--kontak-->
    <?php $this->load->view('site/home/contact'); ?>

             <!--footer-->
    <?php $this->load->view('site/layout/footer'); ?>
</body>
</html>