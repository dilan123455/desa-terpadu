<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon dinamis dari logo admin -->
    <link rel="icon" href="<?= $favicon; ?>">

    <title>FAQ - Desa Terpadu</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/output.css'); ?>">
</head>
<body>
    <!-- Navbar -->
    <?php $this->load->view('site/layout/nav'); ?>

    <div class="bg-white text-gray-800">
        <!-- Padding atas disesuaikan: pt-24 (96px), silakan ganti jika perlu -->
        <div class="w-full bg-white relative z-10 pt-24">
            
            <!-- SECTION: FAQ HEADER -->
            <section class="max-w-5xl mx-auto px-6 pb-16 text-center">
                <!-- Header with large Question Marks -->
                <div class="flex justify-between items-center mb-4 text-[#404040]">
                    <div class="text-7xl font-bold select-none">?</div>
                    <div class="text-center flex-1">
                        <h1 class="text-4xl md:text-5xl font-bold text-black tracking-tight">
                            Frequently Asked
                        </h1>
                        <h1 class="text-4xl md:text-5xl font-bold text-[#c45050] tracking-tight mt-1">
                            Questions
                        </h1>
                    </div>
                    <div class="text-7xl font-bold select-none">?</div>
                </div>

                <!-- Subtitle -->
                <p class="text-[#404040] text-lg md:text-xl mt-6">
                    Apakah anda memiliki pertanyaan tentang desa terpadu?
                </p>
            </section>

            <!-- SECTION: FAQ ACCORDION LIST -->
            <section class="max-w-4xl mx-auto px-6 pb-20">
                <div class="space-y-3">
                    <?php if (!empty($faqs)): ?>
                        <?php foreach ($faqs as $faq): ?>
                        <div class="faq-item bg-white border border-gray-200 rounded-sm cursor-pointer transition hover:border-gray-400">
                            <div class="flex items-center px-5 py-4">
                                <span class="faq-icon text-sm font-bold text-gray-700 mr-3 transition-transform duration-200">&rsaquo;</span>
                                <span class="text-[#404040] font-medium"><?= htmlspecialchars($faq->question) ?></span>
                            </div>
                            <div class="faq-answer hidden px-5 pb-4 text-gray-600 text-sm border-t border-gray-100 mt-1 pt-3">
                                <?= $faq->answer ?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="text-center text-gray-500 py-10">
                            Belum ada FAQ yang ditambahkan oleh Admin.
                        </div>
                    <?php endif; ?>
                </div>
            </section>

            <!-- SECTION: WAVE SEPARATOR & CTA -->
            <div class="relative bg-[#f3ebe5] pt-16 pb-20 mt-10">
                <!-- Top Curved Wave SVG -->
                <div class="absolute top-0 left-0 w-full overflow-hidden leading-0">
                    <svg class="relative block w-[calc(110%+1.3px)] h-12.5 md:h-17.5" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                        <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="fill-white"></path>
                    </svg>
                </div>

                <div class="relative z-10 max-w-4xl mx-auto px-6 text-center">
                    <h2 class="text-3xl md:text-4xl font-bold text-[#333] mb-2 leading-tight">
                        Masih memiliki pertanyaan<br>
                        yang belum terjawab?
                    </h2>
                    <p class="text-[#555] text-base md:text-lg mb-8">
                        Langsung ajukan pertanyaan anda melalui whatsapp kami
                    </p>
                    <a href="https://api.whatsapp.com/send/?phone=6285172238883&text&type=phone_number&app_absent=0" 
                       target="_blank" 
                       class="inline-block bg-[#9a3a41] hover:bg-[#822e34] text-white font-medium py-3 px-8 rounded transition-colors duration-200 shadow-sm">
                        Kirim Pesan Whatsapp
                    </a>
                </div>
            </div>

        </div>
    </div>

    <!-- Footer -->
    <?php $this->load->view('site/layout/footer', ['contact' => $contact]); ?>

    <!-- JAVASCRIPT -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const faqItems = document.querySelectorAll('.faq-item');
            
            faqItems.forEach(item => {
                item.addEventListener('click', function() {
                    const currentAnswer = this.querySelector('.faq-answer');
                    const currentIcon = this.querySelector('.faq-icon');
                    const isOpen = !currentAnswer.classList.contains('hidden');

                    // Tutup semua jawaban lain (Accordion Exclusive)
                    faqItems.forEach(otherItem => {
                        const otherAnswer = otherItem.querySelector('.faq-answer');
                        const otherIcon = otherItem.querySelector('.faq-icon');
                        if(!otherAnswer.classList.contains('hidden')) {
                            otherAnswer.classList.add('hidden');
                            otherIcon.classList.remove('rotate-90');
                        }
                    });

                    if (!isOpen) {
                        currentAnswer.classList.remove('hidden');
                        currentIcon.classList.add('rotate-90');
                    }
                });
            });
        });
    </script>
</body>
</html>