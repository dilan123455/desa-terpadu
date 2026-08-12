<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="<?= base_url('assets/css/output.css'); ?>">
<title><?= $title; ?> - Desa Terpadu</title>
</head>
<body>
<title><?= $title; ?> - Desa Terpadu</title>

<h1 class="text-3xl font-bold text-blue-600">
    Dashboard Admin
</h1>

<p class="mt-4">
    Selamat datang,
    <strong class="font-semibold">
        <?= htmlspecialchars($name); ?>
    </strong>
</p>

<a 
    href="<?= site_url('admin/articles'); ?>"
    class="inline-block mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700"
>
    Ke Article  
</a>

<!-- testimoni soon  -->
<a 
    href="<?= site_url('admin/testimoni '); ?>"
    class="inline-block mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700"
>
    Ke Testimoni
</a>

<!-- FAQ  -->
<a 
    href="<?= site_url('admin/faq '); ?>"
    class="inline-block mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700"
>
    Ke Faq
</a>


<!-- Contact_message  -->
<a 
    href="<?= site_url('admin/contact_messages '); ?>"
    class="inline-block mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700"
>
    Ke Contact Message
</a>

<hr class="my-6">

<h3 class="text-xl font-semibold">
    Desa Terpadu
</h3>

<p class="mt-2 text-gray-600">
    Dashboard admin berhasil dibuat.
</p>

<a 
    href="<?= site_url('auth/logout'); ?>"
    class="inline-block mt-4 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700"
>
    Logout
</a>

</body>
</html>