<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desa Terpadu</title>
</head>
<body>
    <?php $this->load->view('site/layout/nav'); ?>

    <?php $this->load->view('site/home/hero'); ?>

    <?php if (!empty($testimonials)): ?>
    <section style="padding: 60px 20px; background: #f9fafb;">
        <div style="max-width: 1100px; margin: 0 auto;">
            <h2 style="text-align: center; margin-bottom: 30px; font-size: 28px;">Testimoni</h2>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px;">
                <?php foreach ($testimonials as $item): ?>
                <div style="background: #fff; padding: 20px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.08);">
                    <p style="font-style: italic; margin-bottom: 15px;">“<?= htmlspecialchars($item->content, ENT_QUOTES, 'UTF-8') ?>”</p>
                    <strong><?= htmlspecialchars($item->name, ENT_QUOTES, 'UTF-8') ?></strong>
                    <?php if (!empty($item->position)): ?>
                        <div style="color: #666; margin-top: 4px;"><?= htmlspecialchars($item->position, ENT_QUOTES, 'UTF-8') ?></div>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>
</body>
</html>