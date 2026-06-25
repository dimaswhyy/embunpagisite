@extends('layout')

@section('content')

<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-20 relative">
  <h2 class="text-center mb-10 lg:m-0 font-semibold text-blue text-3xl leading-relaxed manrope pb-5">{{ $gallery->title }}</h2>
  <div class="flex flex-wrap -mx-5 pb-10 relative">
    @foreach ($gallery->images as $image)
    <div class="w-full lg:w-4/12 p-5">
      <a href="{{ asset('storage') }}/{{ $image->image }}" data-fancybox="gallery" data-caption="{{ $image->title }}" class="w-full h-52">
        <img src="{{ asset('storage') }}/{{ $image->image }}" alt="{{ $image->image }}" class="w-full h-full object-cover rounded-2xl" />
      </a>
    </div>
    @endforeach
  </div>
</div>

@stop