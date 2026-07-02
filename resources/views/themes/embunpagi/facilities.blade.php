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
                Facilities</div>
        </div>

        <!-- Submenu Navigasi -->
        <div class="bg-white rounded-2xl shadow-md border border-gray-100 w-full overflow-hidden">
            <!-- Menggunakan flex-wrap agar aman dan rapi saat dibuka di mobile -->
            <div
                class="flex flex-wrap justify-center items-center gap-x-2 md:gap-x-6 text-sm font-semibold text-gray-500 py-1">

                <!-- Kondisi AKTIF (Misal saat ini di halaman Our History) -->
                <!-- Menggunakan border-b-4 hijau dan teks biru gelap agar kontras -->
                <a href="{{ route('page_front', 'facilities') }}"
                    class="text-sm font-semibold hover:text-blue p-2 px-5 block whitespace-nowrap @if($lastSegment == 'facilities') text-blue @endif">
                    Facilities
                </a>

                <!-- Kondisi HOVER (Halaman Biasa) -->
                <!-- hover:text-blue-600 -> Teks berubah biru -->
                <!-- hover:border-b-4 hover:border-green-400 -> Garis hijau muncul saat di-hover -->
                <a href="{{ route('page_front', 'clubs') }}"
                    class="text-sm font-semibold hover:text-blue p-2 px-5 block whitespace-nowrap @if($lastSegment == 'clubs') text-blue @endif">
                    Clubs
                </a>

                <a href="{{ route('page_front', 'islamic-life') }}"
                    class="text-sm font-semibold hover:text-blue p-2 px-5 block whitespace-nowrap @if($lastSegment == 'islamic-life') text-blue @endif">
                    Islamic Life
                </a>

                <a href="{{ route('page_front', 'school-life') }}"
                    class="text-sm font-semibold hover:text-blue p-2 px-5 block whitespace-nowrap @if($lastSegment == 'school-life') text-blue @endif">
                    School Life
                </a>

            </div>
        </div>

    </div>
</section>

<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-20 pb-0 relative">
    <h2 class="text-center mb-10 lg:m-0 font-semibold text-blue text-3xl leading-relaxed manrope pb-5">School Tour</h2>
    @include('components.school-tour')
</div>

<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pb-20 relative">
  <h2 class="text-center mb-10 lg:m-0 font-semibold text-blue text-3xl leading-relaxed manrope pb-5">Facilities</h2>

  <div class="hidden lg:flex gap-5 justify-center filter-button-group py-5">
    <button type="button" class="p-2 px-5 rounded-3xl border border-blue text-center uppercase bg-blue text-white filter-button" data-filter="*">All</button>
    @if (count($dataFacilitiesCategory) > 0)
    @foreach ($dataFacilitiesCategory as $item)
    <button type="button" class="bg-white p-2 px-5 rounded-3xl border border-blue text-center text-blue uppercase filter-button" data-filter=".group-{{ $item->id }}">{{ $item->translation[0]->title }}</button>
    @endforeach
    @endif
  </div>

  <div class="flex flex-wrap -mx-5 pb-10 list-facilities">
    @if (count($dataFacilities) > 0)
    @foreach ($dataFacilities as $item)
    <a href="{{ asset('storage') }}/{{ $item->translation[0]->image }}" data-fancybox="gallery" data-caption="{{ $item->translation[0]->title }}" class="w-full lg:w-4/12 p-5 item group-{{ $item->facilities_category_id }}">
      <img src="{{ asset('storage') }}/{{ $item->translation[0]->image }}" alt="{{ $item->translation[0]->title }}" class="w-full h-56 object-cover rounded-2xl mb-3" />
      <p class="text-center m-0">{{ $item->translation[0]->title }}</p>
    </a>
    @endforeach
    @endif
  </div>

  <!-- <a href="javascript:void(0)" class="bg-orange text-white font-semibold p-1 pl-8 flex justify-between gap-5 items-center rounded-full w-fit min-w-52 m-auto">
    <span>View More</span>
    <div class="w-10 h-10 bg-white p-1 flex items-center justify-center rounded-full">
      <i class="bi bi-arrow-right text-orange text-xl"></i>
    </div>
  </a> -->

  <!--<div class="mt-20 w-full rounded-3xl bg-blue-deepsky flex relative overflow-hidden">-->
  <!--  <div class="p-10 w-full lg:w-6/12 flex flex-col justify-center items-center gap-5 relative z-20">-->
  <!--    <h2 class="text-white font-semibold text-4xl m-0">Book a School Tour</h2>-->
  <!--    <p class="p-0 text-white ">Every Monday - Friday, 09:00 WIB - 12.00 WIB</p>-->
  <!--    <a href="{{ route('page_front', 'booking-school-tour') }}" class="bg-orange text-white font-semibold p-3 flex justify-center gap-5 items-center rounded-full w-fit min-w-52 uppercase">-->
  <!--      <span>Book Here!</span>-->
  <!--    </a>-->
  <!--  </div>-->
  <!--  <div class="hidden lg:block lg:w-6/12 relative z-20">-->
  <!--    <img src="{{ asset('storage') }}/img-banner-school-tour.png" alt="img-banner-school-tour.png" class="w-full ">-->
  <!--  </div>-->
  <!--  <div class="absolute left-0 bottom-0 w-full h-52 bg-repeat bg-bottom" style="background-image: url('{{ asset('img/bg-pattern.png') }}'); background-size: auto 100%"></div>-->
  <!--</div>-->
</div>

@stop