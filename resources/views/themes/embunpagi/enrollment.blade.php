@extends('layout')

@section('content')

@include('components.enrollnow-section')

<section class="py-20 bg-green-light relative">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
    <h2 class="text-center mb-10 lg:m-0 font-semibold text-blue text-3xl leading-relaxed manrope">How to Enroll</h2>
    <div class="py-5 mx-auto w-full lg:w-9/12">
      <div class="splide slide-how-to-enroll">
        <div class="splide__track">
          <ul class="splide__list">
            <li class="splide__slide p-5">
              <div class="bg-white p-5 py-14 rounded-2xl h-full">
                <div class="flex flex-col justify-center gap-5">
                  <img src="{{ asset('storage') }}/fill-form.svg" class="h-32 mb-5" />
                  <h4 class="text-blue font-semibold text-center">Fill online form</h4>
                </div>
              </div>
            </li>
            <li class="splide__slide p-5">
              <div class="bg-white p-5 py-14 rounded-2xl h-full">
                <div class="flex flex-col justify-center gap-5">
                  <img src="{{ asset('storage') }}/confirm-email.svg" class="h-32 mb-5" />
                  <h4 class="text-blue font-semibold text-center">Confirmation Email</h4>
                </div>
              </div>
            </li>
            <li class="splide__slide p-5">
              <div class="bg-white p-5 py-14 rounded-2xl h-full">
                <div class="flex flex-col justify-center gap-5">
                  <img src="{{ asset('storage') }}/assessment.svg" class="h-32 mb-5" />
                  <h4 class="text-blue font-semibold text-center">Assessment</h4>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="absolute left-0 bottom-0 w-full h-80 bg-repeat bg-bottom" style="background-image: url('{{ asset('img/bg-pattern.png') }}'); background-size: auto 100%"></div>
</section>

<section id="enroll-now-section" class="py-20 bg-white relative">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
    <h2 class="text-center mb-5 font-semibold text-blue text-3xl leading-relaxed manrope">Enrollment Form</h2>
    <div class="py-5 mx-auto w-full lg:w-9/12">
      <div class="flex flex-wrap">
        <div class="w-full lg:w-6/12 p-5">
          <div class="bg-blue-light p-7 lg:p-10 rounded-3xl h-full">
            <div class="flex gap-5 mb-5">
              <div class="w-32 h-32 bg-gray-100 rounded-full overflow-hidden">
                <img src="{{ asset('storage') }}/KG/75262309_10217898345622764_3688027827971555328_o.jpg" alt="Nursery & Kindergarten" class="w-full h-full object-cover" />
              </div>
            </div>
            <h3 class="text-xl font-semibold text-blue mb-5">Nursery &amp; Kindergarten</h3>
            <a href="https://tinyurl.com/EPISKGRegistrasi2627" class="bg-orange text-white font-semibold p-1 pl-8 flex justify-between gap-5 items-center rounded-full w-fit min-w-52" target="_blank">
              <span class="text-sm">Enroll Now</span>
              <div class="w-8 h-8 bg-white p-1 flex items-center justify-center rounded-full">
                <i class="bi bi-arrow-right text-orange -rotate-45"></i>
              </div>
            </a>
          </div>
        </div>
        <div class="w-full lg:w-6/12 p-5">
          <div class="bg-green-light p-7 lg:p-10 rounded-3xl h-full">
            <div class="flex items-center gap-5 mb-5">
              <div class="w-32 h-32 bg-gray-100 rounded-full overflow-hidden">
                <img src="{{ asset('storage') }}/SD/School Facilities/Library_6516.jpg" alt="Primary School" class="w-full h-full object-cover" />
              </div>
              <h3 class="text-xl font-semibold text-blue mb-5">Primary School</h3>
            </div>
            
            <div class="flex gap-5 pt-3">
              <a href="https://bit.ly/episregistrasiSD-exK2-2627" target="_blank" class="bg-orange text-white font-semibold p-4 flex justify-between gap-5 items-center rounded-xl w-6/12 m-auto lg:m-0 relative">
                <span class="text-sm text-center w-full leading-relaxed">From EPIS<br/>Kindergarten</span>
                <div class="w-4 h-4 bg-white p-1 flex items-center justify-center rounded-full absolute top-2 right-2">
                  <i class="bi bi-arrow-right text-orange -rotate-45 text-sm"></i>
                </div>
              </a>
              <a href="https://bit.ly/episregistrasiSD-2627" target="_blank" class="bg-palegoldenrod text-black font-semibold p-4 flex justify-between gap-5 items-center rounded-xl w-6/12 m-auto lg:m-0 relative">
                <span class="text-sm text-center w-full leading-relaxed">From other<br/>Kindergarten</span>
                <div class="w-4 h-4 bg-white p-1 flex items-center justify-center rounded-full absolute top-2 right-2">
                  <i class="bi bi-arrow-right text-orange -rotate-45 text-sm"></i>
                </div>
              </a>
            </div>
          </div>
        </div>
        <div class="w-full lg:w-6/12 p-5">
          <div class="bg-yellow-light p-7 lg:p-10 rounded-3xl h-full">
            <div class="flex items-center gap-5 mb-5">
              <div class="w-32 h-32 bg-gray-100 rounded-full overflow-hidden">
                <img src="{{ asset('storage') }}/SMP-SMA/School Facilities/Art Room.JPG" alt="Junior High School" class="w-full h-full object-cover" />
              </div>
              <h3 class="text-xl font-semibold text-blue mb-5">Junior High School</h3>
            </div>
            
            <div class="flex gap-5 pt-3">
              <a href="https://tinyurl.com/RegistrasiSMP2627" target="_blank" class="bg-orange text-white font-semibold p-4 flex justify-between gap-5 items-center rounded-xl w-6/12 m-auto lg:m-0 relative">
                <span class="text-sm text-center w-full leading-relaxed">From EPIS<br/>Primary School</span>
                <div class="w-4 h-4 bg-white p-1 flex items-center justify-center rounded-full absolute top-2 right-2">
                  <i class="bi bi-arrow-right text-orange -rotate-45 text-sm"></i>
                </div>
              </a>
              <a href="https://tinyurl.com/RegistrasiSMP2627" target="_blank" class="bg-palegoldenrod text-black font-semibold p-4 flex justify-between gap-5 items-center rounded-xl w-6/12 m-auto lg:m-0 relative">
                <span class="text-sm text-center w-full leading-relaxed">From other<br/>Primary School</span>
                <div class="w-4 h-4 bg-white p-1 flex items-center justify-center rounded-full absolute top-2 right-2">
                  <i class="bi bi-arrow-right text-orange -rotate-45 text-sm"></i>
                </div>
              </a>
            </div>
          </div>
        </div>
        <div class="w-full lg:w-6/12 p-5">
          <div class="bg-orange-light p-7 lg:p-10 rounded-3xl h-full">
            <div class="flex items-center gap-5 mb-5">
              <div class="w-32 h-32 bg-gray-100 rounded-full overflow-hidden">
                <img src="{{ asset('storage') }}/SMP-SMA/School Facilities/Science Lab.JPG" alt="Senior High School" class="w-full h-full object-cover" />
              </div>
              <h3 class="text-xl font-semibold text-blue mb-5">Senior High School</h3>
            </div>
            
            <div class="flex gap-5 pt-3">
              <a href="https://tinyurl.com/OpenHouseSMAEPIS2627" target="_blank" class="bg-orange text-white font-semibold p-4 flex justify-between gap-5 items-center rounded-xl w-6/12 m-auto lg:m-0 relative">
                <span class="text-sm text-center w-full leading-relaxed">From EPIS<br/>Junior High School</span>
                <div class="w-4 h-4 bg-white p-1 flex items-center justify-center rounded-full absolute top-2 right-2">
                  <i class="bi bi-arrow-right text-orange -rotate-45 text-sm"></i>
                </div>
              </a>
              <a href="https://tinyurl.com/OpenHouseSMAEPIS2627" target="_blank" class="bg-palegoldenrod text-black font-semibold p-4 flex justify-between gap-5 items-center rounded-xl w-6/12 m-auto lg:m-0 relative">
                <span class="text-sm text-center w-full leading-relaxed">From other<br/>Junior High School</span>
                <div class="w-4 h-4 bg-white p-1 flex items-center justify-center rounded-full absolute top-2 right-2">
                  <i class="bi bi-arrow-right text-orange -rotate-45 text-sm"></i>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@stop