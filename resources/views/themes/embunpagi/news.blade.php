@extends('layout')

@section('content')

<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-20 relative">
  <h2 class="text-center mb-10 lg:m-0 font-semibold text-blue text-3xl leading-relaxed manrope pb-5">News</h2>
  <div class="flex flex-wrap -mx-5 pb-10">
    @if (count($dataNewsPage) > 0)
    @foreach ($dataNewsPage as $item)
    <div class="w-full lg:w-4/12 p-5">
      <div class="bg-white rounded-xl mb-5 overflow-hidden h-full relative">
        <div class="w-full h-60 bg-gray-100">
          <img src="{{ asset('storage') }}/{{ $item->translation[0]->image }}" alt="{{ $item->translation[0]->image }}" class="w-full h-full object-cover">
        </div>
        <div class="p-8 pb-12">
          <p class="m-0 mb-3 font-semibold text-xs">
            @foreach ($dataNewsCategory as $item_category)
              @if ($item_category->id == $item->news_category_id)
              {{ $item_category->translation[0]->title }}
              @endif
            @endforeach
          </p>
          <h4 class="manrope text-xl leading-relaxed text-blue font-semibold m-0">{{ $item->translation[0]->title }}</h4>
          <a href="{{ route('news_detail', $item->translation[0]->slug) }}" class="text-blue text-sm flex gap-2 font-semibold mt-8 absolute bottom-8">
            <span>Readmore</span>
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>
      </div>
    </div>
    @endforeach
    @else 
    <div class="text-center w-full">Data empty</div>
    @endif
  </div>
  @if (count($dataNewsPage) > 9)
  <a href="javascript:void(0)" class="bg-orange text-white font-semibold p-1 pl-8 flex justify-between gap-5 items-center rounded-full w-fit min-w-52 m-auto">
    <span>Load More</span>
    <div class="w-10 h-10 bg-white p-1 flex items-center justify-center rounded-full">
      <i class="bi bi-arrow-right text-orange text-xl"></i>
    </div>
  </a>
  @endif
</div>

@stop