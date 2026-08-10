<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title; ?> - Desa Terpadu</title>
</head>

<body>

    <h1>Dashboard Admin</h1>

    <p>
        Selamat datang,
        <strong><?= htmlspecialchars($name); ?></strong>
    </p>

    <a href="<?=site_url('admin/articles')?>">ke article </a>

    <hr>

    <h3>Desa Terpadu</h3>

    <p>Dashboard admin berhasil dibuat.</p>

    <a href="<?= site_url('auth/logout'); ?>">
        Logout
    </a>

</body>
</html>