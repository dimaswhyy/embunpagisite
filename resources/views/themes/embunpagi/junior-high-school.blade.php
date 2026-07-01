@extends('layout')

@section('content')

<style>
.chart-wrapper {
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>

<section class="my-10">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="rounded-3xl w-full h-96 overflow-hidden relative">
            <img src="{{ asset('storage') }}/SMP-SMA/School Facilities/EPIS JHS&SHS_20230801_111225.jpg"
                class="w-full h-full object-cover" />
            <div
                class="absolute top-0 left-0 w-full h-full p-10 text-white flex justify-center items-end text-3xl font-bold bg-gradient-blue-transparent">
                Junior High School</div>
        </div>
        <!-- Submenu Navigasi -->
        <div class="bg-white rounded-2xl shadow-md border border-gray-100 w-full overflow-hidden">
            <!-- Menggunakan flex-wrap agar aman dan rapi saat dibuka di mobile -->
            <div
                class="flex flex-wrap justify-center items-center gap-x-2 md:gap-x-6 text-sm font-semibold text-gray-500 py-1">

                <!-- Menggunakan border-b-4 hijau dan teks biru gelap agar kontras -->
                <a href="{{ route('page_front', 'nursery-kindergarten') }}"
                    class="text-sm font-semibold hover:text-blue p-2 px-5 block whitespace-nowrap @if($lastSegment == 'nursery-kindergarten') text-blue @endif">
                    Nursery & Kindergarten
                </a>

                <!-- Kondisi HOVER (Halaman Biasa) -->
                <!-- hover:text-blue-600 -> Teks berubah biru -->
                <!-- hover:border-b-4 hover:border-green-400 -> Garis hijau muncul saat di-hover -->
                <a href="{{ route('page_front', 'primary-school') }}"
                    class="text-sm font-semibold hover:text-blue p-2 px-5 block whitespace-nowrap @if($lastSegment == 'primary-school') text-blue @endif">
                    Primary School
                </a>

                <a href="{{ route('page_front', 'junior-high-school') }}"
                    class="text-sm font-semibold hover:text-blue p-2 px-5 block whitespace-nowrap @if($lastSegment == 'junior-high-school') text-blue @endif">
                    Junior High School
                </a>

                <a href="{{ route('page_front', 'senior-high-school') }}"
                    class="text-sm font-semibold hover:text-blue p-2 px-5 block whitespace-nowrap @if($lastSegment == 'senior-high-school') text-blue @endif">
                    Senior High School
                </a>
            </div>
        </div>
    </div>
</section>

<section class="bg-gradient-ivory py-32 relative overflow-hidden">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="pb-20">
            <p class="leading-loose">The curriculum, activities and school culture at EPIS JHS are designed by taking
                into account the development process of early teens in order to prepare students to be ready to face the
                next level of lives and begin to become leaders for those closest to them. The cultivation of Islamic
                values is also strictly applied in the hope that students have a strong foundation in their lives.</p>
        </div>
        <div class="flex flex-col lg:flex-row gap-20 justify-between items-center">
            <div class="w-full lg:w-6/12">
                <h2
                    class="text-center lg:text-left mb-10 lg:m-0 font-semibold text-blue text-3xl leading-relaxed manrope">
                    Curriculum</h2>
                <div class="py-8 leading-loose text-center lg:text-left">
                    <p class="mb-4">The Junior High School uses a combination of:</p>
                    <ul class="p-0 pb-5">
                        <li class="flex gap-3 items-start mb-3 text-left">
                            <img src="{{ asset('img/item-list-type.svg') }}" class="w-5 h-5 mt-2" />
                            <span><strong>National curicullum</strong></span>
                        </li>
                        <li class="flex gap-3 items-start mb-3 text-left">
                            <img src="{{ asset('img/item-list-type.svg') }}" class="w-5 h-5 mt-2" />
                            <span><strong>Cambridge curicullum</strong><em> (English and Science)</em></span>
                        </li>
                        <li class="flex gap-3 items-start text-left">
                            <img src="{{ asset('img/item-list-type.svg') }}" class="w-5 h-5 mt-2" />
                            <span><strong>EPIS curicullum</strong><br /><em>(Character Building (Anti Bullying &
                                    Self-love Campaigns), Tahsin, Tajwid, Muroja'ah, Tahfidz Juz 29)</em></span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="w-full lg:w-6/12 relative">
                <div class="relative w-11/12 h-80">
                    <img src="{{ asset('storage') }}/SMP-SMA/School Facilities/Class room-8671.jpg"
                        alt="Junior School Image" class="w-full h-full object-cover rounded-3xl relative z-10" />
                    <div class="absolute left-0 top-0 w-full h-full bg-orange-light rotate-6 rounded-3xl"></div>
                </div>
                <img src="{{ asset('img/star-1.svg') }}" class="absolute -top-20 right-0 w-20 hidden md:block">
                <img src="{{ asset('img/star-2.svg') }}" class="absolute -bottom-10 -left-24 w-20 hidden md:block">
            </div>
        </div>
    </div>

    <img src="{{ asset('img/sun-vector.svg') }}" class="absolute -bottom-16 -left-32 w-72 hidden md:block">
    <img src="{{ asset('img/bg-pattern-half.svg') }}" class="absolute bottom-0 right-0 h-44 hidden md:block">
</section>

<section class="py-10 relative">
    <div class="chart-wrapper">
        <div id="chart-program-highlights"></div>
    </div>
</section>

<section class="py-10 relative">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
        <h2 class="text-center mb-10 lg:m-0 font-semibold text-blue text-3xl leading-relaxed manrope pb-5">
            Extracurricular</h2>
        <div class="py-5">
            <div class="flex flex-wrap justify-center gap-5 -mx-5 py-5">
                <div class="w-5/12 lg:w-2/12">
                    <div class="block text-center pb-10">
                        <div class="card-flip card-ekskul">
                            <div class="card-inner">
                                <div class="card-front">
                                    <img src="{{ asset('storage') }}/basketball-icon.svg" alt="Basket Icon">
                                </div>
                                <div class="card-back">
                                    <img src="{{ asset('storage') }}/SMP-SMA/Extracurricular/Basket.jpeg"
                                        alt="Basket Image">
                                </div>
                            </div>
                        </div>
                        <p class="text-center">Basketball</p>
                    </div>
                </div>
                <div class="w-5/12 lg:w-2/12">
                    <div class="block text-center pb-10">
                        <div class="card-flip card-ekskul">
                            <div class="card-inner">
                                <div class="card-front">
                                    <img src="{{ asset('storage') }}/futsal-icon.svg" alt="Futsal Icon">
                                </div>
                                <div class="card-back">
                                    <img src="{{ asset('storage') }}/SMP-SMA/Extracurricular/Futsal_0101.png"
                                        alt="Futsal Image">
                                </div>
                            </div>
                        </div>
                        <p class="text-center">Futsal</p>
                    </div>
                </div>
                <div class="w-5/12 lg:w-2/12">
                    <div class="block text-center pb-10">
                        <div class="card-flip card-ekskul">
                            <div class="card-inner">
                                <div class="card-front">
                                    <img src="{{ asset('storage') }}/swim-icon.svg" alt="Swimming Icon">
                                </div>
                                <div class="card-back">
                                    <img src="{{ asset('storage') }}/SMP-SMA/Extracurricular/Renang.png"
                                        alt="Swimming Image">
                                </div>
                            </div>
                        </div>
                        <p class="text-center">Swimming</p>
                    </div>
                </div>
                <div class="w-5/12 lg:w-2/12">
                    <div class="block text-center pb-10">
                        <div class="card-flip card-ekskul">
                            <div class="card-inner">
                                <div class="card-front">
                                    <img src="{{ asset('storage') }}/dance-icon.svg" alt="Traditional Dance Icon">
                                </div>
                                <div class="card-back">
                                    <img src="{{ asset('storage') }}/SMP-SMA/Extracurricular/Traditional Dance.JPG"
                                        alt="Traditional Dance Image">
                                </div>
                            </div>
                        </div>
                        <p class="text-center">Traditional Dance</p>
                    </div>
                </div>
                <div class="w-5/12 lg:w-2/12">
                    <div class="block text-center pb-10">
                        <div class="card-flip card-ekskul">
                            <div class="card-inner">
                                <div class="card-front">
                                    <img src="{{ asset('storage') }}/vocal-icon.svg" alt="Vocal Icon">
                                </div>
                                <div class="card-back">
                                    <img src="{{ asset('storage') }}/SMP-SMA/Extracurricular/Vocal.JPG"
                                        alt="Vocal Image">
                                </div>
                            </div>
                        </div>
                        <p class="text-center">Vocal</p>
                    </div>
                </div>
                <div class="w-5/12 lg:w-2/12">
                    <div class="block text-center pb-10">
                        <div class="card-flip card-ekskul">
                            <div class="card-inner">
                                <div class="card-front">
                                    <img src="{{ asset('storage') }}/robotic-icon.svg" alt="Robotic Icon">
                                </div>
                                <div class="card-back">
                                    <img src="{{ asset('storage') }}/SMP-SMA/Extracurricular/Robotic (2).png"
                                        alt="Robotic Image">
                                </div>
                            </div>
                        </div>
                        <p class="text-center">Robotic</p>
                    </div>
                </div>
                <div class="w-5/12 lg:w-2/12">
                    <div class="block text-center pb-10">
                        <div class="card-flip card-ekskul">
                            <div class="card-inner">
                                <div class="card-front">
                                    <img src="{{ asset('storage') }}/pencak-silat-icon.svg" alt="Pencak Silat Icon">
                                </div>
                                <div class="card-back">
                                    <img src="{{ asset('storage') }}/SMP-SMA/Extracurricular/Taekwondo (6).png"
                                        alt="Pencak Silat Image">
                                </div>
                            </div>
                        </div>
                        <p class="text-center">Pencak Silat</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('components.facilities')

@stop