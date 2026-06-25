@extends('layout')

@section('content')

<div class="mx-auto w-full lg:w-6/12 px-4 sm:px-6 lg:px-8 py-20 relative">
  <h2 class="text-center mb-10 lg:m-0 font-semibold text-blue text-3xl leading-relaxed manrope pb-10">
    {{ $dataJob->translation[0]->title }}
  </h2>
  <div class="flex flex-wrap -mx-5 pb-10">
    <div class="leading-loose">
      {!! $dataJob->translation[0]->description !!}
    </div>
  </div>
  <div class="flex justify-center">
    <a href="{{ route('apply_career', $dataJob->translation[0]->slug) }}" class="bg-orange text-white font-semibold p-1 pl-8 flex justify-between gap-5 items-center rounded-full w-fit min-w-52 m-auto">
      <span>Apply Now</span>
      <div class="w-10 h-10 bg-white p-1 flex items-center justify-center rounded-full">
        <i class="bi bi-arrow-right text-orange text-xl"></i>
      </div>
    </a>
  </div>
</div>

@stop