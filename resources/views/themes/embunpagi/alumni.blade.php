@extends('layout')

@section('content')

<style>
.story-header {
    max-width: 860px;
    margin: 0 auto 48px;
    text-align: center;
}

.story-header .badge-category {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background-color: rgba(217, 245, 255, 0.8);
    color: #0f5e8f;
    padding: 10px 18px;
    border-radius: 9999px;
    font-size: 0.85rem;
    font-weight: 700;
    letter-spacing: 0.5px;
    margin-bottom: 18px;
}

.story-header h2 {
    font-size: clamp(3rem, 4vw, 4.4rem);
    color: #0f4a7b;
    margin: 0 0 18px;
    font-weight: 800;
    line-height: 1.02;
}

.story-header h2 .highlight {
    color: #b3d334;
}

.story-header p {
    color: #475569;
    font-size: 1rem;
    max-width: 680px;
    margin: 0 auto;
    line-height: 1.8;
}

.story-slider-container {
    width: 100%;
    margin: 0 auto;
    padding: 0;
    max-width: 100%;
}

.story-slider-container .splide {
    width: 100%;
}

.splide__slide {
    display: block;
    width: 100% !important;
    padding: 0 !important;
    margin: 0 !important;
}

/* .story-card {
    display: grid;
    grid-template-columns: 1.35fr 1fr;
    width: 100%;
    max-width: 100%;
    background: #ffffff;
    border-radius: 32px;
    border: 2px solid rgba(14, 57, 121, 0.08);
    overflow: hidden;
    min-height: 420px;
    align-items: stretch;
} */

.story-card {
    display: grid;
    grid-template-columns: 1.35fr 1fr;
    width: 100%;
    max-width: 100%;
    background: #ffffff;
    border-radius: 32px;
    border: 2px solid rgba(14, 57, 121, 0.08);
    overflow: hidden;

    /* MODIFIKASI: Kunci tinggi card di desktop agar mutlak sama semua */
    height: 800px;
    align-items: stretch;
}

/* .story-content {
    padding: 44px 44px 38px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
} */

.story-content {
    padding: 44px 44px 38px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 100%; /* Tambahan agar merata */
}

.badge-tag {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background-color: #f2fbff;
    color: #0f5e8f;
    padding: 10px 16px;
    border-radius: 9999px;
    font-size: 0.85rem;
    font-weight: 700;
}

.quote-icon {
    font-size: 3.5rem;
    color: #53b24f;
    margin-top: 22px;
    margin-bottom: -14px;
}

.quote-text {
    font-size: 1rem;
    color: #102840;
    font-weight: 700;
    line-height: 1.5;
    margin: 0 0 28px 0;
}

.alumni-meta {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 22px;
    border-top: 1px solid rgba(31, 112, 166, 0.1);
    padding-top: 24px;
    margin-top: 18px;
}

.meta-item {
    display: flex;
    gap: 12px;
    align-items: flex-start;
    color: #4a5a6a;
    font-size: 0.9rem;
}

.meta-item i {
    color: #53b24f;
    font-size: 1rem;
    margin-top: 3px;
}

.meta-item strong {
    display: block;
    color: #0f3f72;
    font-weight: 700;
}

.meta-item span {
    display: block;
    color: #68788f;
    font-size: 0.8rem;
    margin-top: 2px;
}

.alumni-profile {
    display: flex;
    align-items: center;
    gap: 16px;
    margin-top: 28px;
    margin-bottom: 24px;
}

.profile-avatar {
    width: 52px;
    height: 52px;
    background: radial-gradient(circle at top, #eaf9ff 0%, #d4eefb 100%);
    color: #0f5e8f;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.1rem;
    font-weight: 700;
}

.profile-info h3 {
    margin: 0;
    font-size: 1.05rem;
    color: #0f3f72;
    font-weight: 700;
}

.profile-info p {
    margin: 1px 0 0;
    font-size: 0.9rem;
    color: #5a6b7d;
}

.btn-read-more {
    align-self: flex-start;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    border: 1px solid #53b24f;
    color: #0f4c2d;
    padding: 12px 24px;
    border-radius: 9999px;
    text-decoration: none;
    font-size: 0.95rem;
    font-weight: 700;
    background: rgba(83, 178, 79, 0.08);
    transition: all 0.2s ease;
}

.btn-read-more:hover {
    background-color: #53b24f;
    color: #ffffff;
}

.story-image {
    position: relative;
    overflow: hidden;
    height: 100%; /* Mengikuti tinggi .story-card */
    width: 100%;
}

.story-image img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Memotong gambar secara proporsional agar tidak gepeng */
    display: block;
}

/* Prevent very tall images from expanding the card on desktop: fix max height for card */
@media (min-width: 1025px) {
    .story-card {
        /* Hapus max-height lama, karena tingginya sudah kita kunci di .story-card atas */
        height: 530px; 
    }
}

/* On smaller screens the layout stacks; allow natural height */
@media (max-width: 1024px) {
    .story-card {
        grid-template-columns: 1fr; /* Stack konten atas-bawah di mobile */
        height: auto; /* Biarkan mengalir alami di mobile agar konten tidak terpotong */
        min-height: unset;
    }

    .story-image {
        height: 280px; /* Tentukan tinggi gambar yang seragam khusus saat di HP */
    }
}

.splide.slide-alumni {
    position: relative;
}

.splide .splide__track {
    overflow: hidden;
}

.splide .splide__list {
    display: flex;
    width: 100%;
}

.splide .splide__slide {
    position: relative;
    width: 100% !important;
    min-width: 100% !important;
    margin: 0 !important;
    padding: 0 !important;
}

.splide .splide__slide>.story-card {
    width: 100%;
}

.splide .splide__pagination {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 26px;
    padding: 0;
}

.splide .splide__pagination__page {
    width: 10px;
    height: 10px;
    border-radius: 9999px;
    background: #d1e8ff;
    transition: all 0.25s ease;
}

.splide .splide__pagination__page.is-active {
    width: 18px;
    background: #0f4a7b;
}


.splide {
    visibility: visible !important;
    position: relative;
}
</style>

<section class="my-10">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10 space-y-4">
        <!-- Banner Utama -->
        <div class="rounded-3xl w-full h-96 overflow-hidden relative shadow-lg">
            <img class="w-full h-full object-cover" src="{{ asset('storage') }}/WEBSITE%20FOTO%20SLIDE%20(2).png"
                alt="WEBSITE%20FOTO%20SLIDE%20(2).png" />
            <div
                class="absolute top-0 left-0 w-full h-full p-10 text-white flex justify-center items-end text-3xl font-bold bg-gradient-blue-transparent">
                Alumni</div>
        </div>

        <!-- Submenu Navigasi -->
        <div class="bg-white rounded-2xl shadow-md border border-gray-100 w-full overflow-hidden">
            <!-- Menggunakan flex-wrap agar aman dan rapi saat dibuka di mobile -->
            <div
                class="flex flex-wrap justify-center items-center gap-x-2 md:gap-x-6 text-sm font-semibold text-gray-500 py-1">

                <!-- Kondisi AKTIF (Misal saat ini di halaman Our History) -->
                <!-- Menggunakan border-b-4 hijau dan teks biru gelap agar kontras -->
                <a href="{{ route('page_front', 'our-history') }}"
                    class="text-sm font-semibold hover:text-blue p-2 px-5 block whitespace-nowrap @if($lastSegment == 'our-history') text-blue @endif">
                    Our History
                </a>

                <!-- Kondisi HOVER (Halaman Biasa) -->
                <!-- hover:text-blue-600 -> Teks berubah biru -->
                <!-- hover:border-b-4 hover:border-green-400 -> Garis hijau muncul saat di-hover -->
                <a href="{{ route('page_front', 'vision-mission') }}"
                    class="text-sm font-semibold hover:text-blue p-2 px-5 block whitespace-nowrap @if($lastSegment == 'vision-mission') text-blue @endif">
                    Vision & Mission
                </a>

                <a href="{{ route('page_front', 'leaders') }}"
                    class="text-sm font-semibold hover:text-blue p-2 px-5 block whitespace-nowrap @if($lastSegment == 'leaders') text-blue @endif">
                    Leaders
                </a>

                <a href="{{ route('page_front', 'alumni') }}"
                    class="text-sm font-semibold hover:text-blue p-2 px-5 block whitespace-nowrap @if($lastSegment == 'alumni') text-blue @endif">
                    Alumni
                </a>

                <a href="{{ route('page_front', 'career') }}"
                    class="text-sm font-semibold hover:text-blue p-2 px-5 block whitespace-nowrap @if($lastSegment == 'career') text-blue @endif">
                    Career
                </a>

            </div>
        </div>

    </div>
</section>

<section class="bg-gradient-ivory py-20 relative overflow-hidden">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="story-header">
            <h2>Our Alumni, <span class="highlight">Our Pride</span></h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua.
            </p>
        </div>

        <!-- Konten Alumni -->
        <div class="story-slider-container">
            <div class="splide slide-alumni w-full">
                <div class="splide__track">
                    <ul class="splide__list">

                        @php
                        $alumniStories = [
                        [
                        'name' => 'Alya Putri Rahma',
                        'role' => 'Computer Science Graduate',
                        'quote' => 'Embun Pagi taught me to be disciplined, confident, and always curious. Today I am
                        thriving in the technology industry because of the strong foundation I received here.',
                        'batch' => 'Angkatan 2018',
                        'school' => 'Institut Teknologi Bandung',
                        'job' => 'Software Engineer',
                        'company' => 'Digital Startup',
                        'image' => asset('img/HAY_3600.jpg'),
                        'avatar' => 'AP',
                        ],
                        [
                        'name' => 'Rizky Ananda',
                        'role' => 'Entrepreneur & Business Owner',
                        'quote' => 'The values of integrity and leadership from school shaped the way I build my
                        business and connect with people around me.',
                        'batch' => 'Angkatan 2016',
                        'school' => 'Universitas Indonesia',
                        'job' => 'Founder',
                        'company' => 'Cafe Creative',
                        'image' => asset('img/embun-default-img.jpg'),
                        'avatar' => 'RA',
                        ],
                        [
                        'name' => 'Nadia Farah',
                        'role' => 'Medical Student',
                        'quote' => 'The supportive learning environment helped me grow academically and spiritually. I
                        am proud to carry the school values into my future career.',
                        'batch' => 'Angkatan 2019',
                        'school' => 'Universitas Airlangga',
                        'job' => 'Student Volunteer',
                        'company' => 'Community Health',
                        'image' => asset('img/embun-default-img.jpg'),
                        'avatar' => 'NF',
                        ],
                        [
                        'name' => 'Fathir Hadi',
                        'role' => 'Creative Designer',
                        'quote' => 'I learned how to think creatively and lead with empathy. Those lessons are the
                        reason my design work now resonates with so many people.',
                        'batch' => 'Angkatan 2017',
                        'school' => 'Universitas Padjadjaran',
                        'job' => 'Lead Designer',
                        'company' => 'Creative Agency',
                        'image' => asset('img/embun-default-img.jpg'),
                        'avatar' => 'FH',
                        ],
                        ];
                        @endphp

                        @foreach($alumniStories as $story)
                        <li class="splide__slide px-2 lg:px-6">
                            <div class="story-card">
                                <div class="story-content">
                                    <span class="badge-tag"><i class="fas fa-star"></i> SUCCESS STORIES</span>

                                    <div class="quote-icon">“</div>
                                    <blockquote class="quote-text">
                                        {{ $story['quote'] }}
                                    </blockquote>

                                    <div class="alumni-meta">
                                        <div class="meta-item">
                                            <i class="fas fa-graduation-cap"></i>
                                            <div><strong>{{ $story['batch'] }}</strong></div>
                                        </div>
                                        <div class="meta-item">
                                            <i class="fas fa-university"></i>
                                            <div>
                                                <strong>{{ $story['school'] }}</strong><span>{{ $story['role'] }}</span>
                                            </div>
                                        </div>
                                        <div class="meta-item">
                                            <i class="fas fa-briefcase"></i>
                                            <div>
                                                <strong>{{ $story['job'] }}</strong><span>{{ $story['company'] }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="alumni-profile">
                                        <div class="profile-avatar">{{ $story['avatar'] }}</div>
                                        <div class="profile-info">
                                            <h3>{{ $story['name'] }}</h3>
                                            <p>Alumni Embun Pagi Islamic School</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="story-image">
                                    <img src="{{ $story['image'] }}" alt="{{ $story['name'] }}">
                                </div>
                            </div>
                        </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </div>

    <img src="{{ asset('img/sun-vector.svg') }}" class="absolute -bottom-16 -left-32 w-72 hidden md:block">
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Cek apakah library Splide sudah ter-load
    if (typeof Splide !== 'undefined') {
        var alumniSlider = new Splide('.slide-alumni', {
            type: 'loop', // Memutar kembali ke awal jika sudah habis
            perPage: 1, // Menampilkan 1 slide per halaman
            autoplay: true, // MENGIKUTI KEINGINAN: Mengaktifkan autoslide
            interval: 4000, // Durasi perpindahan (4 detik)
            pauseOnHover: true, // Berhenti sementara jika mouse di atas slider
            arrows: false, // Hilangkan panah jika hanya ingin pagination dots
            pagination: true, // Aktifkan titik navigasi di bawah
            speed: 800, // Kecepatan transisi (ms)
            autoHeight  : false,
        });

        alumniSlider.mount();
    } else {
        console.error("Splide.js belum di-load di layout utama Anda.");
    }
});
</script>

@stop