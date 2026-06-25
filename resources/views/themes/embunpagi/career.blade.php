@extends('layout')

@section('content')

<section class="py-20 pb-0 relative">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
    <div class="m-auto w-full lg:w-10/12 text-center">
      <h2 class="mb-10 lg:mb-10 font-semibold text-blue text-3xl leading-relaxed manrope">Join us and grow together at Embun Pagi Islamic School!</h2>
    </div>

    <img src="{{ asset('storage') }}/Website-Career.png?ver=1.0.0" alt="teachers-embun-group.png" class="w-full" />
  </div>
</section>

<section class="py-20 bg-white relative">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
    <h2 class="mb-10 lg:m-0 font-semibold text-blue text-3xl leading-relaxed manrope text-center">Job Available</h2>
    <div class="py-5 pb-16 w-full lg:w-8/12 m-auto flex flex-col lg:flex-row flex-wrap">
        <div class="p-8 border-b flex flex-col gap-5 w-full lg:w-6/12">
            <h4 class="text-xl text-blue font-semibold m-0">Career Kindergarten</h4>
            <div class="m-0 leading-relaxed text-sm">
                <p class="mb-2">Please scan this QR code to apply for a career in Kindergarten</p>
                <img src="{{ asset('storage') }}/Career_Kindergarten.jpg?ver=1.0.0" alt="Career_Kindergarten.jpg" class="w-52 h-52"  />
            </div>
        </div>
        <div class="p-8 border-b flex flex-col gap-5 w-full lg:w-6/12">
            <h4 class="text-xl text-blue font-semibold m-0">Career Junior High School</h4>
            <div class="m-0 leading-relaxed text-sm">
                <p class="mb-2">Please scan this QR code to apply for a career in Junior High School</p>
                <img src="{{ asset('storage') }}/Career_Junior_High.jpg?ver=1.0.0" alt="Career_Junior_High.jpg" class="w-52 h-52"  />
            </div>
        </div>
        <div class="p-8 border-b flex flex-col gap-5 w-full lg:w-6/12">
            <h4 class="text-xl text-blue font-semibold m-0">Career Primary High School</h4>
            <div class="m-0 leading-relaxed text-sm">
                <p class="mb-2">Please scan this QR code to apply for a career in Junior High School</p>
                <img src="{{ asset('storage') }}/Career_Primary.jpg?ver=1.0.0" alt="Career_Primary.jpg" class="w-52 h-52"  />
            </div>
        </div>
        <div class="p-8 border-b flex flex-col gap-5 w-full lg:w-6/12">
            <h4 class="text-xl text-blue font-semibold m-0">Career Senior High School</h4>
            <div class="m-0 leading-relaxed text-sm">
                <p class="mb-2">Please scan this QR code to apply for a career in Senior High School</p>
                <img src="{{ asset('storage') }}/Career_Senior_High.jpg?ver=1.0.0" alt="Career_Senior_High.jpg" class="w-52 h-52"  />
            </div>
        </div>
        <!--
      @foreach ($dataCareer as $item)
      <div class="py-8 border-b flex flex-col gap-5">
        <h4 class="text-xl text-blue font-semibold m-0">{{ $item->translation[0]->title }}</h4>
        <div class="m-0 leading-relaxed text-sm hidden">
          {!! $item->translation[0]->description !!}
        </div>
        <div class="flex gap-5">
          <a href="{{ route('detail_career', $item->translation[0]->slug) }}" class="text-blue font-semibold text-sm">Read Detail</a>
          <a href="{{ route('apply_career', $item->translation[0]->slug) }}" class="text-green font-semibold text-sm">Apply Now</a>
        </div>
      </div>
      @endforeach
      -->
    </div>
    
    <!--
    <a href="javascript:void(0)" class="bg-orange text-white font-semibold p-1 pl-8 flex justify-between gap-5 items-center rounded-full w-fit min-w-52 m-auto">
      <span>View More</span>
      <div class="w-10 h-10 bg-white p-1 flex items-center justify-center rounded-full">
        <i class="bi bi-arrow-right text-orange text-xl"></i>
      </div>
    </a> -->
  </div>
</section>
@stop