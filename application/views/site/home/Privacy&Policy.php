<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kebijakan Privasi - Desa Terpadu</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/output.css'); ?>">
</head>
<body class="bg-white font-sans">
    <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:bg-white focus:text-black focus:p-4 focus:rounded focus:shadow-lg focus:z-50">
        Skip to content
    </a>

    <?php $this->load->view('site/layout/nav'); ?>

    <main id="main-content" class="w-full px-6 md:px-24 pt-20 md:pt-24 pb-12 md:pb-20 flex justify-center bg-white">
        <div class="w-full max-w-7xl text-justify text-base md:text-lg leading-relaxed text-gray-900">
            <h1 class="text-3xl md:text-4xl font-bold text-center mb-10" style="color: #A53133;">
                Kebijakan Privasi Desa Terpadu
            </h1>

            <p class="mb-8 text-justify">
                Kebijakan Privasi ini disusun untuk membantu Anda (Pengguna) memahami bagaimana Desa Terpadu mengumpulkan, menggunakan, membagikan, dan mengelola Data Pribadi yang Anda berikan kepada kami. Dokumen ini adalah bentuk nyata dari komitmen Desa Terpadu dalam melindungi serta menjaga privasi, kerahasiaan, dan keamanan Anda. Kami menegaskan bahwa Desa Terpadu tidak akan pernah menyerahkan informasi data pribadi Anda kepada pihak mana pun yang tidak berkepentingan, karena privasi Anda adalah prioritas utama kami.
            </p>

            <?php if (!empty($privacy_policies)): ?>
                <?php foreach ($privacy_policies as $policy): ?>
                    <?php
                    $isi = trim((string) $policy->isi);
                    if ($isi === '') {
                        continue;
                    }

                    $lines = preg_split('/\r\n|\r|\n/', $isi);
                    $lines = array_values(array_filter(array_map('trim', $lines), 'strlen'));
                    ?>
                    <h2 class="font-bold text-xl md:text-2xl text-center mt-12 mb-6 text-gray-900">
                        <?= html_escape($policy->judul); ?>
                    </h2>

                    <div class="mb-8">
                        <?php if (empty($lines)): ?>
                            <p class="text-justify"><?= nl2br(html_escape($isi)); ?></p>
                        <?php else: ?>
                            <?php
                            $isNumbered = count(array_filter($lines, static function ($line) {
                                return preg_match('/^\d+[.)]\s*/', $line);
                            })) === count($lines);
                            ?>
                            <?php if ($isNumbered): ?>
                                <ol class="list-decimal pl-6 md:pl-8 space-y-3">
                                    <?php foreach ($lines as $line): ?>
                                        <li class="pl-2 text-justify"><?= html_escape(preg_replace('/^\d+[.)]\s*/', '', $line)); ?></li>
                                    <?php endforeach; ?>
                                </ol>
                            <?php else: ?>
                                <ul class="list-disc pl-6 md:pl-8 space-y-3">
                                    <?php foreach ($lines as $line): ?>
                                        <li class="pl-2 text-justify"><?= html_escape($line); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="py-10 text-center text-gray-500">
                    <p class="text-base md:text-lg">Kebijakan privasi belum tersedia.</p>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <?php $this->load->view('site/layout/footer'); ?>
</body>
</html>