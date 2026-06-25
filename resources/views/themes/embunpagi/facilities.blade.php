@extends('layout')

@section('content')

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