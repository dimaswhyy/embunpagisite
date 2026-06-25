<style>
    @media (min-width: 1024px) {
        .slide-home .splide__track {
            height: 250px;
            padding-left: 8rem !important;
            padding-right: 8rem !important;
        }
        
        .slide-home .item-slide {
            height: 100%;
            width: 33.33333333% !important;
            padding-top: 0;
        }
    }
    
    @media (max-width: 860px) {
        .slide-home .splide__track {
            padding: 0 !important;
            height: auto;
        }
    }
</style>

<section class="pt-10 pb-10 splide slide-home">
  <div class="splide__track">
    <ul class="splide__list">
      @foreach($dataModuleContents as $item)
      @if ($item->type === 'slideshow')
      @if ($item->translation[0]->image)
      <li class="px-2 lg:px-5 w-full splide__slide item-slide">
        <div class="wrap-img">
          <img class="w-full h-full object-cover rounded-3xl" src="{{ env('USE_AWS') ? env('AWS_URL') : asset('storage') }}/{{ $item->translation[0]->image }}" alt="{{ $item->translation[0]->image }}" />
        </div>
      </li>
      @endif
      @endif
      @endforeach
    </ul>
  </div>
</section>