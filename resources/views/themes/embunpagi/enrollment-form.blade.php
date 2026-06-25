@extends('layout')

@section('content')

<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-20 relative">
  <h2 class="text-center mb-10 lg:m-0 font-semibold text-blue text-3xl leading-relaxed manrope pb-5">
    {{ $thisDataPage->translation[0]->title }}
  </h2>

  <div class="py-10">
    <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSeovnHEQVo6q-Dr9qjY4MBkKur5t95AxsBldvcn4qBeA1bdyQ/viewform?embedded=true" width="100%" height="1100" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe>
  </div>
</div>

@stop