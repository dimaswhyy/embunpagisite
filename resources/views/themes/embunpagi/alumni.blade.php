@extends('layout')

@section('content')
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
        <!-- Judul Section -->
        <h2 class="text-blue text-4xl font-bold mb-6">Leaders</h2>

        <!-- Deskripsi -->
        <p class="text-gray-700 mb-10 max-w-4xl leading-relaxed">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>

        <!-- Tab Buttons -->
        <div class="flex gap-4 mb-12">
            <button
                class="bg-green-500 hover:bg-green-600 text-white font-semibold py-3 px-8 rounded-full transition-colors">
                Yayasan Multi Vorinta & Board of Directors
            </button>
            <button
                class="border-2 border-gray-400 text-gray-600 hover:text-blue hover:border-blue font-semibold py-3 px-8 rounded-full transition-colors">
                School Leaders
            </button>
        </div>

        <!-- Grid Leaders -->
        <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-x-8 gap-y-10 justify-items-center">
            <!-- Leader Card 1 -->
            <div class="text-center w-full">
                <div class="mb-4 overflow-hidden rounded-full mx-auto w-36 h-36">
                    <img class="w-full h-full object-cover" src="{{ asset('storage') }}/leader-1.jpg"
                        alt="Tata Eka Putra, B.Bus" />
                </div>
                <h3 class="text-blue text-lg font-semibold mb-2">Tata Eka Putra</h3>
                <p class="text-gray-600 text-sm">Chairman of Governing Board</p>
            </div>

            <!-- Leader Card 2 -->
            <div class="text-center w-full">
                <div class="mb-4 overflow-hidden rounded-full mx-auto w-36 h-36">
                    <img class="w-full h-full object-cover" src="{{ asset('storage') }}/leader-2.jpg"
                        alt="Ivo Fauziah, S.Kom" />
                </div>
                <h3 class="text-blue text-lg font-semibold mb-2">Ivo Fauziah</h3>
                <p class="text-gray-600 text-sm">Branch Administrator</p>
            </div>

            <!-- Leader Card 3 -->
            <div class="text-center w-full">
                <div class="mb-4 overflow-hidden rounded-full mx-auto w-36 h-36">
                    <img class="w-full h-full object-cover" src="{{ asset('storage') }}/leader-3.jpg"
                        alt="Ririn Samarinda Wangi" />
                </div>
                <h3 class="text-blue text-lg font-semibold mb-2">Ririn Samarinda Wangi</h3>
                <p class="text-gray-600 text-sm">Accounting Manager</p>
            </div>

            <!-- Leader Card 4 -->
            <div class="text-center w-full">
                <div class="mb-4 overflow-hidden rounded-full mx-auto w-36 h-36">
                    <img class="w-full h-full object-cover" src="{{ asset('storage') }}/leader-4.jpg"
                        alt="Tania" />
                </div>
                <h3 class="text-blue text-lg font-semibold mb-2">Tania</h3>
                <p class="text-gray-600 text-sm">Marketing Manager</p>
            </div>
        </div>
    </div>

    <img src="{{ asset('img/sun-vector.svg') }}" class="absolute -bottom-16 -left-32 w-72 hidden md:block">
</section>
@stop