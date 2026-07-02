<style>
.image-sun {
    top: -66px;
    bottom: auto;
    transform: rotate(211deg);
}
</style>

<section class="bg-gradient-ivory py-16 relative overflow-hidden">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
    <div class="flex gap-10 md:gap-20 flex-col lg:flex-row">
      <div class="w-full h-auto lg:w-6/12 lg:h-45rem relative">
        @foreach($moduleContents as $item)
        @if ($item->type === 'why-section')
        @if ($item->translation[0]->image)
        <img class="w-full h-full object-cover rounded-lg rounded-br-3xl" src="{{ env('USE_AWS') ? env('AWS_URL') : asset('storage') }}/{{ $item->translation[0]->image }}" alt="{{ $item->translation[0]->image }}" />
        @endif
        @endif
        @endforeach

        <img src="{{ asset('img/abstract-dots.svg') }}" class="absolute top-20 -right-10 w-20" />
      </div>
      <div class="w-full sm:w-9/12 md:w-7/12 xl:w-6/12 block m-auto lg:m-0 flex flex-col items-center">
        @foreach($moduleContents as $item)
        @if ($item->type === 'why-section')
        <h2 class="font-semibold text-blue text-3xl leading-relaxed w-full lg:w-80 manrope text-center">
        {{ $item->translation[0]->title }}
        </h2>
        @endif
        @endforeach

        <div class="relative block py-10 pb-20 sm:w-9/12">
          <div class="flex gap-5 pb-14">
            @foreach($moduleContents as $key => $item)
            @if ($item->type === 'why-section-content')
            @if ($key === 8)
            <div class="w-48 h-48 p-2 bg-blue-light flex items-center justify-center rounded-full relative group">
              <div class="absolute -top-28 -left-50 w-64 hidden group-hover:block">
                <div class="bg-white p-5 border text-center rounded-lg">
                {!! $item->translation[0]->description !!}
                </div>
                <div class="-mt-1">
                  <div class="w-0 h-0 m-auto border-l-[10px] border-l-transparent border-t-[15px] border-t-white border-r-[10px] border-r-transparent"></div>
                </div>
              </div>
              <h4 class="text-blue text-2xl leading-snug font-semibold text-center">{{ $item->translation[0]->title }}</h4>
            </div>
            @endif
            @endif
            @endforeach

            @foreach($moduleContents as $key => $item)
            @if ($item->type === 'why-section-content')
            @if ($key === 7)
            <div class="w-40 h-40 p-2 bg-green-light self-end -mb-8 flex items-center justify-center rounded-full relative group">
              <div class="absolute -top-28 -left-50 w-64 hidden group-hover:block">
                <div class="bg-white p-5 border text-center rounded-lg">
                {!! $item->translation[0]->description !!}
                </div>
                <div class="-mt-1">
                  <div class="w-0 h-0 m-auto border-l-[10px] border-l-transparent border-t-[15px] border-t-white border-r-[10px] border-r-transparent"></div>
                </div>
              </div>
              <h4 class="text-blue text-2xl leading-snug font-semibold text-center">{{ $item->translation[0]->title }}</h4>
            </div>
            @endif
            @endif
            @endforeach

          </div>
          <div class="flex gap-5 justify-end">
            @foreach($moduleContents as $key => $item)
            @if ($item->type === 'why-section-content')
            @if ($key === 6)
            <div class="w-32 h-32 p-2 bg-orange-light self-start -mt-10 flex items-center justify-center rounded-full relative group">
              <div class="absolute -top-36 -left-50 w-64 hidden group-hover:block">
                <div class="bg-white p-5 border text-center rounded-lg">
                {!! $item->translation[0]->description !!}
                </div>
                <div class="-mt-1">
                  <div class="w-0 h-0 m-auto border-l-[10px] border-l-transparent border-t-[15px] border-t-white border-r-[10px] border-r-transparent"></div>
                </div>
              </div>
              <h4 class="text-blue text-xl leading-snug font-semibold text-center">{{ $item->translation[0]->title }}</h4>
            </div>
            @endif
            @endif
            @endforeach

            @foreach($moduleContents as $key => $item)
            @if ($item->type === 'why-section-content')
            @if ($key === 5)
            <div class="w-40 h-40 p-2 bg-blue-light flex items-center justify-center rounded-full relative group">
              <div class="absolute -top-20 -left-50 w-64 hidden group-hover:block">
                <div class="bg-white p-5 border text-center rounded-lg">
                {!! $item->translation[0]->description !!}
                </div>
                <div class="-mt-1">
                  <div class="w-0 h-0 m-auto border-l-[10px] border-l-transparent border-t-[15px] border-t-white border-r-[10px] border-r-transparent"></div>
                </div>
              </div>
              <h4 class="text-blue text-xl leading-snug font-semibold text-center">{{ $item->translation[0]->title }}</h4>
            </div>
            @endif
            @endif
            @endforeach
          </div>
        </div>
        <a href="#" class="bg-orange text-white font-semibold p-2 pl-6 flex justify-between gap-5 items-center rounded-full w-fit">
          <span>Learn more about our programs</span>
          <div class="w-10 h-10 bg-white p-1 flex items-center justify-center rounded-full">
            <i class="bi bi-arrow-right text-orange text-xl"></i>
          </div>
        </a>
      </div>
    </div>
  </div>

    

    <img src="{{ asset('img/ellipse-ivory.svg') }}" class="absolute bottom-5 -left-36" />
    <img src="{{ asset('img/sun-vector.svg') }}"
        class="absolute -bottom-16 -right-40 -rotate-12 w-96 hidden md:block image-sun">
</section>