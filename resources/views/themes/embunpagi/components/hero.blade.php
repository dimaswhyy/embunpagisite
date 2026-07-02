

<style>
.hero-section {
    height: 100svh;
    overflow: hidden;
    background-image: url('img/hero-image.jpg');
    background-size: cover;
    background-position: center;
    filter: blur(6px);
    transform: scale(1.03);
    opacity: 0.95;
    transition: filter 0.8s ease, opacity 0.8s ease, transform 0.8s ease;
    display: flex;
    align-items: stretch;
}

.hero-section.is-ready {
    filter: blur(0);
    transform: scale(1);
    opacity: 1;
}

#heroSlider {
    width: 100%;
    height: 100%;
    flex: 1;
}

#heroSlider .splide__track {
    height: 100%;
}

#heroSlider .splide__list {
    height: 100%;
}

#heroSlider .splide__slide {
    position: relative;
    height: 100%;
    width: 100%;
    background-size: cover;
    background-position: center;
    display: flex;
    align-items: center;
    flex-shrink: 0;
}

.hero-slide-video video {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    z-index: 0;
}

.hero-overlay {
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, .35);
    z-index: 1;
}

.hero-content {
    position: relative;
    z-index: 2;
    max-width: 900px;
    margin-left: 8%;
    margin-top: clamp(80px, 12vh, 120px);
    padding-bottom: 2rem;
    color: white;
}

.hero-badge,
.hero-content h1,
.hero-content p,
.hero-buttons {
    opacity: 0;
    transform: translateY(40px);
}

.hero-content .hero-badge,
.hero-content h1,
.hero-content p,
.hero-buttons {
    transition: opacity .5s ease, transform .5s ease;
}

.hero-content.is-animated .hero-badge,
.hero-content.is-animated h1,
.hero-content.is-animated p,
.hero-content.is-animated .hero-buttons {
    opacity: 1;
    transform: translateY(0);
}

.hero-content h1 {
    font-size: clamp(2rem, 3vw, 4rem);
    line-height: 1.05;
    margin: 0 0 20px 0;
}

.hero-content p {
    font-size: clamp(1rem, 1.2vw, 1.15rem);
    line-height: 1.8;
    max-width: 720px;
    margin-bottom: 30px;
}

.hero-buttons {
    display: flex;
    gap: 18px;
    margin-top: 0;
}

.btn-primary-hero {
    background: linear-gradient(to right, #118bcc 0%, #b3d334 100%);
    color: #fff;
    padding: 16px 40px;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 700;
    font-size: 1rem;
    transition: all .3s ease;
    border: none;
    cursor: pointer;
}

.btn-secondary-hero {
    background: transparent;
    color: #fff;
    border: 2px solid rgba(255,255,255,.85);
    padding: 16px 40px;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 700;
    font-size: 1rem;
    transition: all .3s ease;
    cursor: pointer;
}

.btn-secondary-hero:hover {
    background: rgba(255,255,255,.12);
    border-color: rgba(255,255,255,.95);
}

.btn-primary-hero {
    background: linear-gradient(to right, #118bcc 0%, #b3d334 100%);
    color: #fff;
    padding: 15px 35px;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 600;
    transition: all .3s ease;
    border: none;
    cursor: pointer;
}

.btn-primary-hero:hover {
    background: linear-gradient(to right, #0f7db6 0%, #9fbc2b 100%);
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(17, 139, 204, .25);
}

.btn-secondary-hero {
    background: rgba(255,255,255,.08);
    backdrop-filter: blur(10px);
    color: #fff;
    border: 2px solid rgba(255,255,255,.4);
    padding: 15px 35px;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 600;
    transition: all .3s ease;
    cursor: pointer;
}

.btn-secondary-hero:hover {
    background: rgba(255,255,255,.15);
    border-color: rgba(255,255,255,.7);
    color: #fff;
}

/* Splide customization */
.hero-section .splide__arrow {
    background: rgba(255,255,255,.6);
    width: 45px;
    height: 45px;
}

.hero-section .splide__arrow:hover {
    background: rgba(255,255,255,.9);
}

.hero-section .splide__pagination__page {
    background: rgba(255,255,255,.4);
    width: 10px;
    height: 10px;
}

.hero-section .splide__pagination__page.is-active {
    background: #fff;
}

@keyframes fadeUp {
    from {
        opacity: 0;
        transform: translateY(40px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@media (max-width: 768px) {
    .hero-content {
        margin-left: 5%;
        max-width: 92%;
    }

    .hero-content h1 {
        font-size: clamp(2.4rem, 8vw, 3.8rem);
    }

    .hero-content p {
        font-size: 1rem;
    }

    .btn-primary-hero,
    .btn-secondary-hero {
        padding: 14px 28px;
        font-size: 0.95rem;
    }
}</style>

<section class="hero-section"> 
    <div class="splide" id="heroSlider" role="region" aria-label="Hero Slider">
        <div class="splide__track">
            <ul class="splide__list">
                <li class="splide__slide hero-slide-video" data-splide-interval="10000">
                    <video autoplay muted loop playsinline poster="img/hero-image.jpg">
                        <source src="{{ asset('videos/Website.mp4') }}" type="video/mp4">
                    </video>
                    <div class="hero-overlay"></div>
                    <div class="hero-content">
                        <h1>The School of<br>Future Islamic Leaders</h1>
                        <p>An Islamic school that nurtures strong character, academic excellence, and global perspectives to shape future Islamic leaders.</p>
                        <div class="hero-buttons">
                            <a href="#" class="btn-primary-hero">Enroll Now</a>
                            <a href="#" class="btn-secondary-hero">School Tour</a>
                        </div>
                    </div>
                </li>

                <li class="splide__slide" style="background-image: url('img/embun-default-img.jpg')">
                    <div class="hero-overlay"></div>
                    <div class="hero-content">
                        <h1>Preparing<br>Future Leaders</h1>
                        <p>Our programs combine Islamic values, academic excellence, and international standards to prepare future Islamic leaders for a changing world.</p>
                        <div class="hero-buttons">
                            <a href="#" class="btn-primary-hero">Learn More</a>
                        </div>
                    </div>
                </li>

                <li class="splide__slide" style="background-image: url('img/HAY_3600.jpg')">
                    <div class="hero-overlay"></div>
                    <div class="hero-content">
                        <h1>Discover Your<br>True Potential</h1>
                        <p>Clubs, activities, and community service to develop leadership and compassion.</p>
                        <div class="hero-buttons">
                            <a href="#" class="btn-primary-hero">Learn More</a>
                        </div>
                    </div>
                </li>

                <li class="splide__slide" style="background-image: url('img/embun_logo_ig.jpg')">
                    <div class="hero-overlay"></div>
                    <div class="hero-content">
                        <h1>World-Class Facilities</h1>
                        <p>A welcoming learning environment where students feel at home while growing through innovation, collaboration, and academic excellence.</p>
                        <div class="hero-buttons">
                            <a href="#" class="btn-primary-hero">Learn More</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const heroSection = document.querySelector('.hero-section');
        const heroImages = ['img/hero-image.jpg', 'img/embun-default-img.jpg', 'img/HAY_3600.jpg', 'img/embun_logo_ig.jpg'];
        const slideItems = document.querySelectorAll('.hero-content');

        const imagePromises = heroImages.map((src) => {
            return new Promise((resolve) => {
                const img = new Image();
                img.src = src;
                img.onload = resolve;
                img.onerror = resolve;
            });
        });

        Promise.all(imagePromises).then(() => {
            heroSection.classList.add('is-ready');
        });

        const splide = new Splide('#heroSlider', {
            type: 'fade',
            rewind: true,
            rewindSpeed: 500,
            pagination: false,
            arrows: false,
            autoplay: false,
            interval: 10000,
            speed: 500,
            pauseOnHover: false,
            pauseOnFocus: false,
            drag: false
        });

        let autoplayTimer = null;
        const firstSlideInterval = 15000;
        const defaultSlideInterval = 10000;
        const heroSliderElement = document.getElementById('heroSlider');

        const getCurrentSlideInterval = () => {
            return splide.index === 0 ? firstSlideInterval : defaultSlideInterval;
        };

        const clearAutoplayTimer = () => {
            if (autoplayTimer !== null) {
                clearTimeout(autoplayTimer);
                autoplayTimer = null;
            }
        };

        const scheduleAutoplay = () => {
            clearAutoplayTimer();
            autoplayTimer = setTimeout(() => {
                splide.go('>');
            }, getCurrentSlideInterval());
        };

        splide.on('mounted active', () => {
            slideItems.forEach((item) => {
                item.classList.remove('is-animated');
            });

            const activeContent = document.querySelector('.splide__slide.is-active .hero-content');
            if (activeContent) {
                activeContent.classList.add('is-animated');
            }

            scheduleAutoplay();
        });

        heroSliderElement.addEventListener('mouseenter', clearAutoplayTimer);
        heroSliderElement.addEventListener('mouseleave', scheduleAutoplay);
        heroSliderElement.addEventListener('focusin', clearAutoplayTimer);
        heroSliderElement.addEventListener('focusout', scheduleAutoplay);

        splide.mount();
    });
</script>