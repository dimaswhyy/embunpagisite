<section class="py-20 bg-gradient-blue-light relative">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="m-auto w-full lg:w-4/12 text-center">
            <h2 class="mb-10 lg:m-0 font-semibold text-blue text-3xl leading-relaxed manrope">What they say about Embun
                Pagi Islamic School</h2>
        </div>
        <div class="w-full lg:w-9/12 m-auto py-10">
            <div class="flex flex-col lg:flex-row items-center gap-10">
                <div id="testimoni-thumbnail"
                    class="splide w-full md:w-11/12 md:px-6 lg:p-0 lg:w-full testimoni-thumbnail">
                    <div class="splide__track h-full">
                        <ul class="splide__list">
                            @foreach($dataModuleContents as $item)
                            @if ($item->type === 'testimonials')
                            <li class="splide__slide rounded-full cursor-pointer">
                                @if ($item->translation[0]->image)
                                <img class="w-full h-full rounded-full object-cover overflow-hidden"
                                    src="{{ env('USE_AWS') ? env('AWS_URL') : asset('storage') }}/{{ $item->translation[0]->image }}"
                                    alt="{{ $item->translation[0]->image }}" />
                                @else
                                <img src="{{ asset('img/embun-default-img.jpg') }}"
                                    alt="{{ $item->translation[0]->title }}"
                                    class="w-24 h-24 rounded-full object-cover overflow-hidden" />
                                @endif
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div id="testimoni-carousel" class="splide w-full md:w-10/12">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach($dataModuleContents as $item)
                            @if ($item->type === 'testimonials')
                            <li class="splide__slide flex lg:items-center">
                                <div class="text-sm">
                                    <div class="mb-10">
                                        {!! $item->translation[0]->description !!}
                                    </div>
                                    <p class="font-bold mb-1">{{ $item->translation[0]->title }}</p>
                                    <p class="text-sm">{{ $item->translation[0]->subtitle }}</p>
                                </div>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <img src="{{ asset('img/swirl-arrow.svg') }}" class="absolute left-10 top-12 h-32 hidden lg:block" />
        <img src="{{ asset('img/wave-pattern.svg') }}" class="absolute left-10 -bottom-10 h-24 hidden lg:block" />
        <img src="{{ asset('img/arrow-up-doddle.svg') }}" class="absolute right-20 -bottom-10 h-24 hidden lg:block" />
        <img src="{{ asset('img/bulb-blue.svg') }}" class="absolute right-10 top-10 h-56 hidden lg:block" />
    </div>

</section>