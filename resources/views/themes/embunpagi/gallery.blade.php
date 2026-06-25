@extends('layout')

@section('content')

<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-20 relative">
  <h2 class="text-center mb-10 lg:m-0 font-semibold text-blue text-3xl leading-relaxed manrope pb-5">Gallery</h2>
  <div class="flex flex-wrap -mx-5 pb-10 relative">
    @foreach ($dataGalleries as $item)
    <div class="w-full lg:w-4/12 p-5 relative">
      <a href="{{ route('gallery_detail', $item->slug) }}" class="w-full relative">
        <div class="relative pb-14">
          @foreach ($item->images as $key => $image)
          @if ($key == 0)
          <div class="relative top-0 z-50">
            <img src="{{ asset('storage') }}/{{ $image->image }}" alt="{{ $image->image }}" class="w-full object-cover rounded-2xl shadow-xl" />
          </div>
          @endif
          @if ($key == 1)
          <div class="absolute top-10 left-0 z-30">
            <img src="{{ asset('storage') }}/{{ $image->image }}" alt="{{ $image->image }}" class="w-11/12 object-cover rounded-2xl block shadow-lg mx-auto" />
          </div>
          @endif
          @if ($key == 2)
          <div class="absolute top-20 left-0 z-10">
            <img src="{{ asset('storage') }}/{{ $image->image }}" alt="{{ $image->image }}" class="w-10/12 object-cover rounded-2xl block shadow-lg mx-auto" />
          </div>
          @endif
          @endforeach
        </div>
        <p class="text-center">{{ $item->title }}</p>
      </a>
    </div>
    @endforeach
  </div>
  <a href="javascript:void(0)" class="bg-orange text-white font-semibold p-1 pl-8 flex justify-between gap-5 items-center rounded-full w-fit min-w-52 m-auto">
    <span>Load More</span>
    <div class="w-10 h-10 bg-white p-1 flex items-center justify-center rounded-full">
      <i class="bi bi-arrow-right text-orange text-xl"></i>
    </div>
  </a>
</div>

@stop