@extends('layout')
@section('content')
<!-- @include('components.slideshow') -->

<!-- @include('components.why-section') -->

@include('components.hero')

@include ('components.about')

@include('components.core')

@include('components.academic-program')

@include('components.testimonials')

<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-20 pb-0 relative">
    <h2 class="text-center mb-10 lg:m-0 font-semibold text-blue text-3xl leading-relaxed manrope pb-5">School Tour</h2>
    @include('components.school-tour')
</div>

@include('components.enrollnow-section')

@stop

