@extends('layout')

@section('content')

<div class="mx-auto w-full lg:w-6/12 px-4 sm:px-6 lg:px-8 py-20 relative">
  <h2 class="text-center mb-10 lg:m-0 font-semibold text-blue text-3xl leading-relaxed manrope pb-10">
    {{ $news->translation[0]->title }}
  </h2>
  <div class="flex flex-wrap -mx-5 pb-10">
    <img src="{{ asset('storage') }}/{{ $news->translation[0]->image }}" alt="{{ $news->translation[0]->title }}" class="w-full rounded-2xl h-96 object-cover mb-10">

    <div class="leading-loose">
      {!! $news->translation[0]->description !!}
    </div>
  </div>
</div>

<section class="pb-10 relative">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
    <h2 class="text-center mb-10 lg:m-0 font-semibold text-blue text-3xl leading-relaxed manrope">Other News</h2>
    <div class="w-full mt-20 mb-10">
      <div class="splide slide-news">
        <div class="splide__track">
          <ul class="splide__list">
            @foreach ($dataNews as $item)
            <li class="splide__slide pr-5">
              <div class="bg-white rounded-xl border mb-5 overflow-hidden h-full relative">
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
            </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

@stop