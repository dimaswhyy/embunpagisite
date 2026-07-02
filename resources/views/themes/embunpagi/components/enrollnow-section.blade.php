<section class="bg-gradient-blue-light-reverse relative">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">  
    <div class="flex flex-col-reverse lg:flex-row lg:gap-20 items-end justify-center">
      <div class="w-full lg:w-10/12">
        @foreach($moduleContents as $item)
        @if ($item->type === 'enrollnow-section')
        @if ($item->translation[0]->image)
        <img class="w-full" src="{{ env('USE_AWS') ? env('AWS_URL') : asset('storage') }}/{{ $item->translation[0]->image }}" alt="{{ $item->translation[0]->image }}" />
        @endif
        @endif
        @endforeach
      </div>
      <div class="w-full p-10 pb-0 lg:2/12 self-center">
        @foreach($moduleContents as $item)
        @if ($item->type === 'enrollnow-section')
        <h2 class="mb-10 font-semibold text-blue text-3xl leading-relaxed manrope lg:w-8/12 text-center lg:text-left">{{ $item->translation[0]->title }}</h2>
        @endif
        @endforeach
        <a href="{{ route('page_front', 'enrollment#enroll-now-section') }}" class="btn-primary text-white font-semibold p-1 pl-8 flex justify-between gap-5 items-center rounded-full w-fit min-w-52 m-auto lg:m-0">
          <span class="uppercase">Enroll Now</span>
          <div class="w-10 h-10 bg-white p-1 flex items-center justify-center rounded-full">
            <i class="bi bi-arrow-right text-green text-xl"></i>
          </div>
        </a>
      </div>
    </div>
  </div>

  <div class="absolute left-0 bottom-0 w-full h-60 bg-repeat bg-bottom" style="background-image: url('{{ asset('img/bg-pattern.png') }}'); background-size: auto 100%"></div>
</section>