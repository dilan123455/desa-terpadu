<!-- SECTION KONTAK -->
<style>
    /* Animasi reveal untuk kartu kontak */
    .reveal-card {
        opacity: 0;
        transform: translateY(20px);
        transition:
            opacity 0.6s ease-out,
            transform 0.4s ease-out,
            box-shadow 0.3s ease,
            border-color 0.3s ease;
    }

    .reveal-card.visible {
        opacity: 1;
        transform: none; /* kunci: hilangkan transformasi dasar agar hover scale berjalan mulus */
    }
</style>

<section id="contact" class="w-full bg-white py-16 sm:py-24">
    <div class="container mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">

        <!-- Header Section -->
        <div class="text-center max-w-3xl mx-auto mb-12 lg:mb-16">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold tracking-tight text-gray-900 leading-tight">
                Masih Ragu Memulai Digitalisasi Desa Anda?
            </h2>

            <p class="mt-4 text-lg sm:text-xl text-gray-600 font-light leading-relaxed">
                Ayo konsultasikan kebutuhan desa anda dan bergabung bersama DesaTerpadu
            </p>
        </div>

        <!-- Contact Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-stretch">

            <!-- Card 1: Telephone -->
            <div class="reveal-card bg-white border-2 border-gray-200 rounded-2xl p-8 flex flex-col items-center text-center transition-all duration-300 ease-in-out hover:border-gray-300 hover:scale-[1.02] hover:shadow-xl">

                <div class="bg-[#D32F2F] rounded-full w-14 h-14 flex items-center justify-center text-white mb-4 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-7 h-7">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                    </svg>
                </div>

                <h3 class="font-normal text-lg text-gray-800 mb-1">
                    Telpon & Whatsapp
                </h3>

                <span
                    onclick="copyContactText('<?= html_escape($contact->phone); ?>')"
                    class="font-bold text-lg text-gray-900 cursor-pointer hover:text-[#D32F2F] transition-colors mt-1">
                    <?= html_escape($contact->phone); ?>
                </span>
            </div>

            <!-- Card 2: Location -->
            <div class="reveal-card bg-white border-2 border-gray-200 rounded-2xl p-8 flex flex-col items-center text-center transition-all duration-300 ease-in-out hover:border-gray-300 hover:scale-[1.02] hover:shadow-xl">

                <div class="bg-[#D32F2F] rounded-full w-14 h-14 flex items-center justify-center text-white mb-4 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-7 h-7">
                        <path d="M12 2a8 8 0 0 0-8 8c0 5.25 7 13 7 13s7-7.75 7-13a8 8 0 0 0-8-8zm0 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                    </svg>
                </div>

                <h3 class="font-normal text-lg text-gray-800 mb-1">
                    Lokasi Kami
                </h3>

                <div class="font-bold text-lg text-gray-900 mt-1 leading-snug">
                    <?= nl2br(html_escape($contact->address)); ?>
                </div>
            </div>

            <!-- Card 3: Email -->
            <div class="reveal-card bg-white border-2 border-gray-200 rounded-2xl p-8 flex flex-col items-center text-center transition-all duration-300 ease-in-out hover:border-gray-300 hover:scale-[1.02] hover:shadow-xl">

                <div class="bg-[#D32F2F] rounded-full w-14 h-14 flex items-center justify-center text-white mb-4 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-7 h-7">
                        <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                    </svg>
                </div>

                <h3 class="font-normal text-lg text-gray-800 mb-1">
                    Email
                </h3>

                <span
                    onclick="copyContactText('<?= html_escape($contact->email); ?>')"
                    class="font-bold text-lg text-gray-900 cursor-pointer hover:text-[#D32F2F] transition-colors mt-1">
                    <?= html_escape($contact->email); ?>
                </span>
            </div>
        </div>

        <!-- Map Section -->
        <div class="mt-16 border-2 border-gray-200 rounded-2xl overflow-hidden transition-all duration-300 hover:border-gray-300">
            <!-- Iframe peta dimuat secara lazy -->
            <iframe
                src="about:blank"
                data-src="https://www.google.com/maps?q=Gg.%20VI%20No.15,%20Sidakarya,%20Denpasar,%20Bali&output=embed"
                width="100%"
                height="400"
                style="border:0;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                class="w-full h-[300px] sm:h-[400px]">
            </iframe>
        </div>

    </div>
</section>

<!-- Toast Notification -->
<div
    id="ctc-toast"
    class="hidden fixed bottom-6 left-1/2 transform -translate-x-1/2 bg-gray-900 text-white px-6 py-3 rounded-full shadow-xl z-50 flex items-center gap-3">

    <span class="text-green-400 text-lg">✔</span>

    <span id="ctc-toast-message" class="font-medium text-sm">
        Berhasil disalin!
    </span>
</div>

<script>
    // ================== FUNGSI COPY ==================
    function copyContactText(text) {
        if (navigator.clipboard) {
            navigator.clipboard.writeText(text)
                .then(() => showContactToast(`Berhasil menyalin: "${text}"`))
                .catch(() => fallbackCopy(text));
        } else {
            fallbackCopy(text);
        }
    }

    function fallbackCopy(text) {
        const textarea = document.createElement('textarea');
        textarea.value = text;
        document.body.appendChild(textarea);
        textarea.select();
        document.execCommand('copy');
        document.body.removeChild(textarea);
        showContactToast(`Berhasil menyalin: "${text}"`);
    }

    function showContactToast(message) {
        const toast = document.getElementById('ctc-toast');
        const toastMessage = document.getElementById('ctc-toast-message');
        toastMessage.innerText = message;
        toast.classList.remove('hidden');
        setTimeout(() => toast.classList.add('hidden'), 2500);
    }

    // ================== LAZY LOADING & REVEAL ==================
    document.addEventListener('DOMContentLoaded', function () {
        // Reveal animation untuk kartu kontak
        const revealCards = document.querySelectorAll('.reveal-card');
        if ('IntersectionObserver' in window) {
            const cardObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });
            revealCards.forEach(card => cardObserver.observe(card));
        } else {
            revealCards.forEach(card => card.classList.add('visible'));
        }

        // Lazy load iframe peta
        const mapIframe = document.querySelector('iframe[data-src]');
        if (mapIframe) {
            if ('IntersectionObserver' in window) {
                const mapObserver = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            mapIframe.src = mapIframe.dataset.src;
                            mapIframe.removeAttribute('data-src');
                            observer.unobserve(entry.target);
                        }
                    });
                }, {
                    rootMargin: '200px'
                });
                mapObserver.observe(mapIframe);
            } else {
                mapIframe.src = mapIframe.dataset.src;
                mapIframe.removeAttribute('data-src');
            }
        }
    });
</script>