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
                Our History</div>
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
                    Vision Mission
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
        <div class="flex flex-col lg:flex-row gap-5 justify-between items-center">
            <div class="p-0 lg:pl-16 lg:w-6/12">
                <div class="pb-8">
                    <h3 class="text-blue text-2xl font-semibold pb-5">Vision</h3>
                    <p>Developing the Islamic leaders of the future.</p>
                </div>

                <div class="pb-8">
                    <h3 class="text-blue text-xl font-semibold pb-5">Mission</h3>
                    <ul class="p-0 pb-5">
                        <li class="flex gap-3 items-center pb-5">
                            <img src="{{ asset('img/item-list-type.svg') }}" class="w-5 h-5" />
                            <span>Making Akhlaqul Karimah as a habit</span>
                        </li>
                        <li class="flex gap-3 items-center pb-5">
                            <img src="{{ asset('img/item-list-type.svg') }}" class="w-5 h-5" />
                            <span>Creating a leadership learning environment</span>
                        </li>
                        <li class="flex gap-3 items-center">
                            <img src="{{ asset('img/item-list-type.svg') }}" class="w-5 h-5" />
                            <span>Exploring the students' potentials</span>
                        </li>
                    </ul>
                </div>

                <div class="pb-8">
                    <h3 class="text-blue text-2xl font-semibold pb-5">Goal</h3>
                    <p>To become the leading islamic school with a global vision</p>
                </div>
            </div>
            <div class="flex flex-row flex-wrap lg:w-6/12">
                <div class="w-6/12 p-2">
                    <img class="w-full h-44 object-cover rounded-xl"
                        src="{{ asset('storage') }}/ac210d76-900f-46e4-b29b-1946ca01c4af.jpg"
                        alt="ac210d76-900f-46e4-b29b-1946ca01c4af.jpg" />
                </div>
                <div class="w-6/12 p-2">
                    <img class="w-full h-44 object-cover rounded-xl"
                        src="{{ asset('storage') }}/VideoCapture_20230705-103918.jpg"
                        alt="VideoCapture_20230705-103918.jpg" />
                </div>
                <div class="w-6/12 p-2">
                    <img class="w-full h-44 object-cover rounded-xl"
                        src="{{ asset('storage') }}/68751603_10217200172248866_7609920817098391552_o.jpg"
                        alt="68751603_10217200172248866_7609920817098391552_o.jpg" />
                </div>
                <div class="w-6/12 p-2">
                    <img class="w-full h-44 object-cover rounded-xl" src="{{ asset('storage') }}/IMG_0518-2048x1365.jpg"
                        alt="IMG_0518-2048x1365.jpg" />
                </div>
            </div>
        </div>
    </div>

    <img src="{{ asset('img/sun-vector.svg') }}" class="absolute -bottom-16 -left-32 w-72 hidden md:block">
</section>

<section class="bg-blue-light py-24 relative">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
        <h2 class="text-center lg:text-left mb-10 lg:m-0 font-semibold text-blue text-3xl leading-relaxed manrope pl-8">
            Our Core Values</h2>
        <div class="py-5">
            <div class="splide slide-core-values">
                <div class="splide__track">
                    <ul class="splide__list">
                        <li class="splide__slide p-5">
                            <div class="bg-white p-5 py-8 rounded-2xl h-full">
                                <div class="flex flex-col justify-center gap-5">
                                    <img src="{{ asset('storage') }}/integrity-icon.svg" class="h-32" />
                                    <h4 class="text-blue text-xl font-semibold text-center">Shiddiq</h4>
                                    <p class="text-center">Educate students to be truthful, have integrity, and be
                                        trustworthy.</p>
                                </div>
                            </div>
                        </li>
                        <li class="splide__slide p-5">
                            <div class="bg-white p-5 py-8 rounded-2xl h-full">
                                <div class="flex flex-col justify-center gap-5">
                                    <img src="{{ asset('storage') }}/integrity-icon-2.svg" class="h-32" />
                                    <h4 class="text-blue text-xl font-semibold text-center">Amanah</h4>
                                    <p class="text-center">Teach students to always act with integrity and be
                                        responsible. </p>
                                </div>
                            </div>
                        </li>
                        <li class="splide__slide p-5">
                            <div class="bg-white p-5 py-8 rounded-2xl h-full">
                                <div class="flex flex-col justify-center gap-5">
                                    <img src="{{ asset('storage') }}/creative-icon.svg" class="h-32" />
                                    <h4 class="text-blue text-xl font-semibold text-center">Fathonah</h4>
                                    <p class="text-center">Foster in students greater knowledge, creativity, innovation,
                                        and critical thinking skills.</p>
                                </div>
                            </div>
                        </li>
                        <li class="splide__slide p-5">
                            <div class="bg-white p-5 py-8 rounded-2xl h-full">
                                <div class="flex flex-col justify-center gap-5">
                                    <img src="{{ asset('storage') }}/confidence-icon.svg" class="h-32" />
                                    <h4 class="text-blue text-xl font-semibold text-center">Tabligh</h4>
                                    <p class="text-center">Train students to be confident in their abilities and educate
                                        them about the joy of collaboration and sharing.</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-white pt-16 pb-0 relative">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex flex-col lg:flex-row gap-5 items-center">
            <div class="w-full lg:w-6/12">
                <h2
                    class="text-center lg:text-left mb-10 lg:m-0 font-semibold text-blue text-3xl leading-relaxed manrope">
                    Director's Note</h2>

                <div class="py-8">
                    <p><strong>Assalamu'alaikum Wr. Wb.</strong></p>
                    <p>&nbsp;</p>
                    <p>Since its founding in 2005 with just 24 kindergarten students, EPIS has grown significantly. We
                        established our Elementary School in 2007 and expanded to include Junior High School and Senior
                        High School. Driven by a passion to advance education in Indonesia, particularly Islamic
                        education, EPIS is committed to continuous improvement in curriculum, human resources, services,
                        and facilities.</p>
                    <p>&nbsp;</p>
                    <p>Our vision is to cultivate the Islamic leaders of tomorrow. We are dedicated to equipping our
                        students with 21st-century skills while upholding the values of Akhlakul Karimah, as exemplified
                        by Rasulullah Muhammad SAW. Our goal is to prepare students to face the future with both worldly
                        knowledge and understanding of the hereafter.</p>
                    <p>&nbsp;</p>
                    <p>We firmly believe that a strong foundation in religious education and character development will
                        produce leaders who contribute to progress and prosperity for all. May Allah SWT guide and bless
                        us in every step of this journey.</p>
                    <p>&nbsp;</p>

                    <p><strong>Wassalamu'alaikum Wr. Wb</strong></p>
                    <p>&nbsp;</p>

                    <p><strong>Tata Eka Putra, B.Bus.</strong><br />
                        <em class="text-sm">Embun Pagi Islamic School Director</em>
                    </p>
                </div>
            </div>
            <div class="w-full lg:w-6/12">
                <div class="w-8/12 h-auto bg-gray-100 border rounded-2xl m-auto px-8 pt-5">
                    <img class="w-full h-auto" src="{{ asset('storage') }}/director-photo.png"
                        alt="director-photo.png" />
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-green-light relative">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
        <h2 class="text-center mb-10 lg:m-0 font-semibold text-blue text-3xl leading-relaxed manrope">Our Teams</h2>
        <div class="py-10 mx-auto w-full lg:w-10/12">
            <div class="splide slide-team">
                <div class="splide__track">
                    <ul class="splide__list">
                        <li class="splide__slide p-5">
                            <div class="flex flex-col justify-center items-center gap-2">
                                <div class="w-52 h-52 bg-white mb-3 rounded-full overflow-hidden">
                                    <img class="m-auto h-full object" src="{{ asset('storage') }}/1676448059.jpg"
                                        alt="1676448059.jpg" />
                                </div>
                                <p class="font-semibold text-blue p-0">Principal of Kindergarten</p>
                                <p class="p-0 text-sm">Sri Lestariningsih, S.Pd.</p>
                            </div>
                        </li>
                        <li class="splide__slide p-5">
                            <div class="flex flex-col justify-center items-center gap-2">
                                <div class="w-52 h-52 bg-white mb-3 rounded-full overflow-hidden">
                                    <img class="m-auto h-full object" src="{{ asset('storage') }}/1676448050.jpg"
                                        alt="1676448050.jpg" />
                                </div>
                                <p class="font-semibold text-blue p-0">Principal of Primary</p>
                                <p class="p-0 text-sm">Yargustiwan, S.Pd.</p>
                            </div>
                        </li>
                        <li class="splide__slide p-5">
                            <div class="flex flex-col justify-center items-center gap-2">
                                <div class="w-52 h-52 bg-white mb-3 rounded-full overflow-hidden">
                                    <img class="m-auto h-full object" src="{{ asset('storage') }}/1678438778.png"
                                        alt="1678438778.png" />
                                </div>
                                <p class="font-semibold text-blue p-0">Principal of Junior High</p>
                                <p class="p-0 text-sm">Syahrul Aripin, S.Pd.I.</p>
                            </div>
                        </li>
                        <li class="splide__slide p-5">
                            <div class="flex flex-col justify-center items-center gap-2">
                                <div class="w-52 h-52 bg-white mb-3 rounded-full overflow-hidden">
                                    <img class="m-auto h-full object" src="{{ asset('storage') }}/1678359637.jpg"
                                        alt="1678359637.jpg" />
                                </div>
                                <p class="font-semibold text-blue p-0">Principal of Senior High</p>
                                <p class="p-0 text-sm">Nurul R Septina, S.Si., M.Pd.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="absolute left-0 bottom-0 w-full h-80 bg-repeat bg-bottom opacity-50"
        style="background-image: url('{{ asset('img/bg-pattern.png') }}'); background-size: auto 100%"></div>
</section>
@stop