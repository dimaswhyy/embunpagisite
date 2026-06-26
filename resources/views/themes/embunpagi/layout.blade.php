<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <base href="{{ URL::to('/'); }}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Embun Pagi Islamic School | {{ $dataThisPage->title }} | Leading Islamic School for Future Muslim Leaders
    </title>

    <meta name="description" content="{{ $dataThisPage->description }}">
    <meta name="keyword" content="{{ $dataThisPage->keyword }}">

    <meta property="og:title" content="{{ $dataThisPage->title }}">
    <meta property="og:description" content="{{ $dataThisPage->description }}">
    <meta property="og:image" content="{{ asset('storage/' . $dataThisPage->image) }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name"
        content="Embun Pagi Islamic School | {{ $dataThisPage->title }} | Leading Islamic School for Future Muslim Leaders">

    <meta name="robots" content="index, follow">
    <meta name="theme-color" content="#ffffff">

    <link rel="canonical" href="{{ url()->current() }}">

    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />
    <link rel="icon" type="image/png" href="{{ asset('favicon-96x96.png') }}" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}" />
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}" />
    <meta name="apple-mobile-web-app-title" content="Embun Pagi Islamic School" />
    <link rel="manifest" href="{{ asset('site.webmanifest') }}" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    @if (env('APP_ENV') === 'production')
    @php
    // in production
    $cwd = getcwd();
    $cssName = basename(glob($cwd . '/build/assets/embunpagi-*.css')[0], '.css');
    $jsName = basename(glob($cwd . '/build/assets/embunpagi-*.js')[0], '.js');
    $css = env('USE_CDN_GIT') ? env('CDN_LINK') . '/build/assets/' . $cssName . '.css' : asset('build/assets/' .
    $cssName . '.css');
    $js = env('USE_CDN_GIT') ? env('CDN_LINK') . '/build/assets/' . $jsName . '.js' : asset('build/assets/' . $jsName .
    '.js');
    @endphp
    <link rel="stylesheet" href="{{ $css }}" id="css">
    <script type="module" src="{{ $js }}" id="js"></script>
    @else
    @vite('resources/css/embunpagi.css')
    @vite('resources/js/embunpagi.js')
    @endif

    <style>
    .hover\:border-white:hover {
        border-color: #fff;
    }

    .btn-primary {
        background: linear-gradient(to right, #118bcc 0%, #b3d334 100%);
        color: #fff;
    }

    .btn-primary:hover {
        background: linear-gradient(to right, #0f7db6 0%, #9fbc2b 100%);
    }

    .btn-secondary {
        background: transparent;
        color: #118bcc;
        border: 2px solid transparent;
        border-color: #86ccf1;
    }

    .btn-secondary:hover {
        background: rgba(17, 139, 204, 0.08);
        color: #0f7db6;
    }

    /* WhatsApp Float */
    .wa-container {
        position: fixed;
        bottom: 25px;
        right: 25px;
        z-index: 999999;
    }

    .whatsapp-float {
        position: fixed;
        bottom: 25px;
        right: 25px;

        display: flex;
        align-items: center;
        gap: 12px;

        background: #25D366;
        color: #fff;
        text-decoration: none;

        padding: 12px 20px;
        border-radius: 50px;

        font-size: 18px;
        font-weight: 600;

        z-index: 999999;
        box-shadow: 0 6px 20px rgba(0, 0, 0, .2);

        transition: .3s ease;
    }

    .whatsapp-float i {
        font-size: 34px;
    }

    .whatsapp-float:hover {
        color: #fff;
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, .25);
    }

    .wa-menu {
        position: absolute;
        bottom: 80px;
        right: 0;
        width: 220px;

        background: #25D366;
        border-radius: 15px;
        overflow: hidden;

        opacity: 0;
        visibility: hidden;
        transform: translateY(20px);

        transition: .3s ease;
        box-shadow: 0 10px 25px rgba(0, 0, 0, .2);
    }

    .wa-menu a {
        display: block;
        padding: 16px 20px;
        color: #fff;
        text-decoration: none;
        border-bottom: 1px solid rgba(255, 255, 255, .15);
        transition: .2s;
    }

    .wa-menu a:last-child {
        border-bottom: none;
    }

    .wa-menu a:hover {
        background: rgba(255, 255, 255, .1);
    }

    .wa-container:hover .wa-menu {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    /* Efek seleksi teks di seluruh halaman web */
    ::selection {
        background-color: #b3d334;
        color: #ffffff;
        /* Warna teks menjadi putih saat diblok */
    }

    /* Dukungan untuk browser Firefox lama */
    ::-moz-selection {
        background-color: #b3d334;
        color: #ffffff;
    }
    </style>

    <script type="text/javascript">
    let csrfToken = "{{ csrf_token() }}";
    let baseHref = "{{ config('app.url') }}";
    const storagePath = "{{ asset('storage') }}";
    </script>

    <!-- Meta Pixel Code -->
    <script>
    ! function(f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function() {
            n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
        'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '712942437755120');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=712942437755120&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->
</head>

<body class="overflow-x-hidden">

    <div class="absolute top-0 left-0 w-full">
        <img src="{{ asset('img/blue-background.svg') }}" class="w-full" />
    </div>

    <div class="relative z-10">
        <div id="header-main" class="sticky top-0 lg:overflow-y-visible py-5 z-30 transition-all">
            <div class="relative flex justify-between items-center gap-5 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="block">
                    <a href="{{ URL::to('/'); }}">
                        <img class="block h-12 w-auto"
                            src="{{ env('USE_CDN_GIT') ? env('CDN_LINK') . '/img/Logo-EPIS-Horizontal.png' : asset('img/Logo-EPIS-Horizontal.png') }}"
                            alt="Embun Pagi Islamic School">
                    </a>
                </div>
                <div class="lg:block">
                    <div id="menu-mobile"
                        class="hidden lg:flex justify-center absolute left-0 top-16 z-50 bg-white py-3 w-full border lg:relative lg:top-0 lg:p-0 lg:border-0 lg:bg-transparent">
                        @include('menu-list')
                    </div>
                </div>
                <div class="flex gap-8 items-center">
                    <button id="btn-menu-mobile" type="button" class="bg-none border-0 p-0 lg:hidden">
                        <i class="bi bi-list text-xl"></i>
                    </button>
                    <button type="button" class="bg-none border-0 p-0 hidden">
                        <i class="bi bi-search"></i>
                    </button>
                    <a href="#" class="btn-secondary text-sm font-semibold px-5 py-2 rounded-full transition">
                        LEARN SIGN IN
                    </a>
                    <a href="#" class="btn-primary text-white text-sm font-semibold px-5 py-2 rounded-full transition">
                        ENROLLMENT
                    </a>
                    <button type="button"
                        class="w-50 h-50 px-2 py-1 bg-orange-400 text-white border-0 rounded-full hidden">
                        <i class="bi bi-person"></i>
                    </button>
                </div>
            </div>
        </div>

        @yield('content')

        <footer class="bg-blue-dark py-20 text-white">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative">

                <div class="flex flex-col md:flex-row gap-6 justify-between w-full">

                    <div class="flex-1 min-w-[200px] pb-10 md:pb-0">
                        <div class="mb-5">
                            <img src="{{ asset('img/logo-epis-white.png') }}" alt="Logo-White"
                                class="h-20 w-auto mb-3 object-contain">
                        </div>
                        <div class="flex gap-4 text-xl">
                            <a href="#" target="_blank"
                                class="w-10 h-10 rounded-full bg-white flex items-center justify-center hover:opacity-90 transition-opacity">
                                <i class="bi bi-facebook" style="color: #063046;"></i>
                            </a>

                            <a href="https://www.instagram.com/embunpagischool" target="_blank"
                                class="w-10 h-10 rounded-full bg-white flex items-center justify-center hover:opacity-90 transition-opacity">
                                <i class="bi bi-instagram" style="color: #063046;"></i>
                            </a>
                            <a href="https://www.youtube.com/@embunpagischool" target="_blank"
                                class="w-10 h-10 rounded-full bg-white flex items-center justify-center hover:opacity-90 transition-opacity">
                                <i class="bi bi-youtube" style="color: #063046;"></i>
                            </a>
                        </div>
                    </div>

                    <div class="flex-1 min-w-[200px] pb-10 md:pb-0">
                        <p class="mb-3"><strong>Nursery & Kindergarten</strong></p>
                        <p class="mb-3 text-sm flex gap-2">
                            <i class="bi bi-geo-alt"></i>
                            <a href="https://www.google.com/maps/place/Embun+Pagi+Islamic+School+-+Kindergarten/@-6.2474652,106.9166343,17z/data=!4m15!1m8!3m7!1s0x2e698cd1766d6bc5:0x143e51cc8f785784!2sJl.+Raya+Kalimalang+No.39,+RT.1%2FRW.7,+Pd.+Klp.,+Kec.+Duren+Sawit,+Kota+Jakarta+Timur,+Daerah+Khusus+Ibukota+Jakarta+13450!3b1!8m2!3d-6.2475045!4d106.9192137!16s%2Fg%2F11t54kn2cr!3m5!1s0x2e69f340830eafc3:0x60112f790002f6aa!8m2!3d-6.2475337!4d106.9192371!16s%2Fg%2F1v6gbk91?entry=ttu&g_ep=EgoyMDI1MTIwMi4wIKXMDSoASAFQAw%3D%3D"
                                target="_blank" class="text-white border-b border-transparent hover:border-white pb-1">
                                Jl. Raya Kalimalang No. 39,<br />
                                Jakarta Timur 13440
                            </a>
                        </p>
                        <p class="text-sm mb-2 flex gap-2">
                            <i class="bi bi-telephone"></i>
                            <a href="tel:62218601626" target="_blank"
                                class="text-white border-b border-transparent hover:border-white pb-1">+6221-8601626</a>
                        </p>
                        <p class="text-sm mb-2 flex gap-2">
                            <i class="bi bi-whatsapp"></i>
                            <a href="https://wa.me/628118601626" target="_blank"
                                class="text-white border-b border-transparent hover:border-white pb-1">+62-811-860-1626</a>
                        </p>
                    </div>

                    <div class="flex-1 min-w-[200px] pb-10 md:pb-0">
                        <p class="mb-3"><strong>Primary School</strong></p>
                        <p class="mb-3 text-sm flex gap-2">
                            <i class="bi bi-geo-alt"></i>
                            <a href="https://www.google.com/maps/place/Embun+Pagi+Islamic+School+-+Primary,+Junior+High,+%26+Senior+High/@-6.2489967,106.92656,17z/data=!4m15!1m8!3m7!1s0x2e698cdbe55da37b:0xde1acc8042878f32!2sJl.+Kapin+Raya+Jl.+Raya+Kalimalang+No.8,+RT.9%2FRW.8,+Pd.+Klp.,+Kec.+Duren+Sawit,+Kota+Jakarta+Timur,+Daerah+Khusus+Ibukota+Jakarta+13450!3b1!8m2!3d-6.249002!4d106.9291349!16s%2Fg%2F11g0m91tpq!3m5!1s0x2e698cdbee1f6f25:0x36e0849ebbe1b698!8m2!3d-6.2489727!4d106.9291416!16s%2Fg%2F1pzrj11ll?entry=ttu&g_ep=EgoyMDI1MTIwMi4wIKXMDSoASAFQAw%3D%3D"
                                target="_blank" class="text-white border-b border-transparent hover:border-white pb-1">
                                Jl. Raya Kapin No 8 <br />
                                Kalimalang, <br />
                                Jakarta Timur 13450
                            </a>
                        </p>
                        <p class="text-sm m-0 flex gap-2">
                            <i class="bi bi-telephone"></i>
                            <a href="tel:62218651578" target="_blank"
                                class="text-white border-b border-transparent hover:border-white pb-1">+6221-8651578</a>
                        </p>
                        <p class="text-sm m-0 flex gap-2">
                            <i class="bi bi-whatsapp"></i>
                            <a href="https://wa.me/628118651578" target="_blank"
                                class="text-white border-b border-transparent hover:border-white pb-1">+62-811-865-1578</a>
                        </p>
                    </div>

                    <div class="flex-1 min-w-[200px] pb-10 md:pb-0">
                        <p class="mb-3"><strong>Junior & Senior High School</strong></p>
                        <p class="mb-3 text-sm flex gap-2">
                            <i class="bi bi-geo-alt"></i>
                            <a href="https://www.google.com/maps/place/Embun+Pagi+Islamic+School+-+Primary,+Junior+High,+%26+Senior+High/@-6.2489967,106.92656,17z/data=!4m15!1m8!3m7!1s0x2e698cdbe55da37b:0xde1acc8042878f32!2sJl.+Kapin+Raya+Jl.+Raya+Kalimalang+No.8,+RT.9%2FRW.8,+Pd.+Klp.,+Kec.+Duren+Sawit,+Kota+Jakarta+Timur,+Daerah+Khusus+Ibukota+Jakarta+13450!3b1!8m2!3d-6.249002!4d106.9291349!16s%2Fg%2F11g0m91tpq!3m5!1s0x2e698cdbee1f6f25:0x36e0849ebbe1b698!8m2!3d-6.2489727!4d106.9291416!16s%2Fg%2F1pzrj11ll?entry=ttu&g_ep=EgoyMDI1MTIwMi4wIKXMDSoASAFQAw%3D%3D"
                                target="_blank" class="text-white border-b border-transparent hover:border-white pb-1">
                                Jl. Raya Kapin No 8 <br />
                                Kalimalang, <br />
                                Jakarta Timur 13450
                            </a>
                        </p>
                        <p class="text-sm m-0 flex gap-2">
                            <i class="bi bi-whatsapp"></i>
                            <a href="https://wa.me/6281188810170" target="_blank"
                                class="text-white border-b border-transparent hover:border-white pb-1">+62-811-8881-0170</a>
                        </p>
                    </div>

                </div>
            </div>
        </footer>
        <!-- Footer Lanjutan -->
        <div class="bg-white py-4 border-t border-gray-100 font-sans">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

                <!-- LOGO: Sudah diubah ke justify-start (rata kiri) di semua ukuran layar & padding bottom diperkecil (pb-4) -->
                <div class="flex flex-wrap items-center justify-start gap-6 md:gap-10 pb-4">
                    <img src="{{ asset('img/logo-tutwurihandayani.png') }}" alt="Tut Wuri Handayani"
                        class="h-10 md:h-12 w-auto object-contain" />
                    <img src="{{ asset('img/logo-kurmer.png') }}" alt="Kurikulum Merdeka"
                        class="h-8 md:h-10 w-auto object-contain" />
                    <img src="{{ asset('img/logo-cambridge.png') }}" alt="Cambridge International School"
                        class="h-8 md:h-9 w-auto object-contain" />
                    <img src="{{ asset('img/logo-acreditation.png') }}" alt="Cambridge International School"
                        class="h-8 md:h-9 w-auto object-contain" />
                </div>

                <hr class="border-gray-200" />

                <!-- COPYRIGHT: Padding top diperkecil (pt-4) -->
                <div class="pt-4 text-left">
                    <p class="text-sm text-[#0F172A] font-semibold">
                        ©2026. Embun Pagi Islamic School. All Rights Reserved.
                    </p>
                </div>

            </div>
        </div>
        <!-- Floating WhatsApp -->
        <div class="wa-container">

            <div class="wa-menu">
                <a href="https://wa.me/6281234567890?text=Saya ingin bertanya tentang Kindergarten">Nursery &
                    Kindergarten</a>

                <a href="https://wa.me/6281234567890?text=Saya ingin bertanya tentang Primary School">Primary</a>

                <a href="https://wa.me/6281234567890?text=Saya ingin bertanya tentang Middle School">Junior & Senior
                    High</a>
            </div>

            <a href="#" class="whatsapp-float">
                <i class="fab fa-whatsapp"></i>
                <span>I'm Interested</span>
            </a>

        </div>

        @stack('script')

        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-WN8M3NLBD4"></script>
        <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-WN8M3NLBD4');
        </script>
</body>

</html>