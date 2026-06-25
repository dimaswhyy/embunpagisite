<style>
.eapps-instagram-feed-header-user-picture-wrapper {
    background: linear-gradient(40deg,#f99b4a 15%,#dd3071 50%,#c72e8d 85%);
    width: 48px;
    height: 48px;
    border-radius: 50%;
    padding: 4px;
    box-sizing: border-box;
    overflow: hidden;
}
</style>

<section class="py-20 bg-green-light relative">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
    <div class="lg:flex gap-5 justify-between items-center">
      <h2 class="text-center lg:text-left mb-10 lg:m-0 font-semibold text-blue text-3xl leading-relaxed manrope">Latest News, Events & Achievements</h2>
      <a href="{{ route('page_front', 'news') }}" class="bg-orange text-white font-semibold p-1 pl-8 flex justify-between gap-5 items-center rounded-full w-fit min-w-52 m-auto lg:m-0">
        <span>View More</span>
        <div class="w-10 h-10 bg-white p-1 flex items-center justify-center rounded-full">
          <i class="bi bi-arrow-right text-orange text-xl"></i>
        </div>
      </a>
    </div>
    <div class="w-full mt-20 mb-10">
      <div class="splide slide-news">
        <div class="splide__track">
          <ul class="splide__list">
            @foreach ($dataNews as $item)
            <li class="splide__slide pr-5">
              <div class="bg-white rounded-xl mb-5 overflow-hidden h-full relative">
                <div class="w-full h-60 bg-gray-100">
                  <img class="w-full h-full object-cover" src="{{ env('USE_AWS') ? env('AWS_URL') : asset('storage') }}/{{ $item->translation[0]->image }}" alt="{{ $item->translation[0]->image }}" />
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
    
    <!-- Hidden Instagram -->
    <div class="w-full hidden" >
        <div class="lg:flex gap-5 justify-between items-center pt-10 mb-10">
          <h2 class="text-center lg:text-left mb-10 lg:m-0 font-semibold text-blue text-3xl leading-relaxed manrope">For more updates, visit us on Instagram</h2>
        </div>
        <div class="w-full bg-white mt-6">
            <!-- Header -->
            <div class="flex items-center justify-between w-full p-6">
              <div class="flex items-center gap-4">
                  <a href="https://www.instagram.com/embunpagischool" class="eapps-instagram-feed-header-user-picture-wrapper" target="_blank">
                    <img src="{{ asset('img') }}/embun_logo_ig.jpg" class="w-full h-full rounded-full" style="aspect-ratio: 1 / 1;" />
                  </a>
                <div>
                  <h1 class="font-semibold text-lg">Embun Pagi Islamic School (EPIS)</h1>
                  <p class="text-gray-500 text-sm m-0">@embunpagischool</p>
                </div>
              </div>
        
              <div class="flex items-center gap-6 text-center">
                <div>
                  <p class="font-semibold m-0">1.3K</p>
                  <p class="text-xs text-gray-500 m-0">Posts</p>
                </div>
                <div>
                  <p class="font-semibold m-0">100.8K</p>
                  <p class="text-xs text-gray-500 m-0">Followers</p>
                </div>
                <div>
                  <p class="font-semibold m-0">12</p>
                  <p class="text-xs text-gray-500 m-0">Following</p>
                </div>
        
                <a href="https://www.instagram.com/embunpagischool" class="bg-blue-500 text-white px-4 py-2 rounded-lg text-sm font-medium" target="_blank">
                  Follow
                </a>
              </div>
            </div>
            <!-- Grid -->
            <div class="grid grid-cols-3">
        
              @foreach ($dataInstagramPost as $itemInstagram)
              <a href="{{ $itemInstagram->href }}" class="relative group" target="_blank">
                <img src="{{ asset('storage') }}/{{ $itemInstagram->image }}" class="w-full h-full object-cover aspect-square" alt="{{ $itemInstagram->alt }}" style="aspect-ratio: 1 / 1;" />
              </a>
              @endforeach
        
            </div>
        </div>
    </div>
  </div>

  <div class="absolute left-0 bottom-0 w-full h-80 bg-repeat bg-bottom" style="background-image: url('{{ asset('img/bg-pattern.png') }}'); background-size: auto 100%"></div>
</section>