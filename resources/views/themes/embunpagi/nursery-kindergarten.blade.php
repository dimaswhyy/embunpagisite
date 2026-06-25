@extends('layout')

@section('content')

<section class="my-10">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10"> 
    <div class="rounded-3xl w-full h-96 overflow-hidden relative">
      <img class="w-full h-full object-cover" src="{{ asset('storage') }}/KG/IMG_9662-scaled.jpg" alt="IMG_9662-scaled.jpg" />
      <div class="absolute top-0 left-0 w-full h-full p-10 text-white flex justify-center items-end text-3xl font-bold bg-gradient-blue-transparent">Nursery & Kindergarten</div>
    </div>
  </div>
</section>

<section class="bg-gradient-ivory py-32 relative overflow-hidden">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10"> 
    <div class="flex flex-col lg:flex-row gap-20 justify-between items-center">
      <div class="w-full lg:w-6/12">
        <h2 class="text-center lg:text-left mb-10 lg:m-0 font-semibold text-blue text-3xl leading-relaxed manrope">Nursery / Pre School & Kindergarten</h2>
        <div class="py-8 leading-loose text-center lg:text-left">
          <p>Based on early childhood development, we provide fun learning, methods and facilities where children can explore knowledge by playing. Our purpose in Kindergarten is to provide, stimulate and facilitate kids to develop their cognitive, motoric, socio-emotional, language and spiritual skills. Islamic values as a foundation for children are also introduced and taught in a fun way.</p>
        </div>
        <img src="{{ asset('storage') }}/Accreditation-Nursery.png" alt="Accreditation A" class="w-auto h-24 m-auto lg:m-0" />
      </div>
      <div class="w-full lg:w-6/12 relative">
        <div class="relative w-11/12 h-80">
          <img class="w-full h-full object-cover rounded-3xl relative z-10" src="{{ asset('storage') }}/KG/75262309_10217898345622764_3688027827971555328_o.jpg" alt="75262309_10217898345622764_3688027827971555328_o.jpg" />
          <div class="absolute left-0 top-0 w-full h-full bg-orange-light rotate-6 rounded-3xl"></div>
        </div>
        <img src="{{ asset('img/star-1.svg') }}" class="absolute -top-20 right-0 w-20 hidden md:block">
        <img src="{{ asset('img/star-2.svg') }}" class="absolute -bottom-10 -left-24 w-20 hidden md:block">
      </div>
    </div>
  </div>

  <img src="{{ asset('img/sun-vector.svg') }}" class="absolute -bottom-16 -left-32 w-72 hidden md:block">
  <img src="{{ asset('img/bg-pattern-half.svg') }}" class="absolute bottom-0 right-0 h-44 hidden md:block">
</section>

<section class="py-14 pt-24 relative">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
    <h2 class="text-center lg:text-left mb-10 lg:m-0 font-semibold text-blue text-3xl leading-relaxed manrope pb-5">Curriculum</h2>
    <div class="leading-loose">
      <p><strong>The Beyond Center and Circle Time (BCCT)</strong> are learning approaches that center on children, where they learn through play in multiple play centers. Interaction with the learning environment enhances their wealth of knowledge, experience, and social development.</p>

      <div class="flex flex-wrap -mx-5 py-5">
        <div class="w-full lg:w-6/12 p-5">
          <div class="w-full h-80 overflow-hidden rounded-2xl relative">
            <img class="w-full h-full object-cover relative" src="{{ asset('storage') }}/KG/Sentra/Art&Craft (2).jpg" alt="Art&Craft (2).jpg" />
            <noscript>
              <img src="{{ asset('storage') }}/KG/Sentra/Art&Craft (2).jpg" alt="Art&Craft (2).jpg" />
            </noscript>
            <div class="absolute bottom-5 left-5 bg-white rounded-3xl p-1 px-4 text-center text-blue font-semibold shadow-lg">Art & Craft Center</div>
          </div>
        </div>
        <div class="w-full lg:w-6/12 p-5">
          <div class="w-full h-80 overflow-hidden rounded-2xl relative">
            <img class="w-full h-full object-cover relative" src="{{ asset('storage') }}/KG/Sentra/Dramatic Macro.jpg" alt="Dramatic Macro.jpg" />
            <noscript>
              <img src="{{ asset('storage') }}/KG/Sentra/Dramatic Macro.jpg" alt="Dramatic Macro.jpg" />
            </noscript>
            <div class="absolute bottom-5 left-5 bg-white rounded-3xl p-1 px-4 text-center text-blue font-semibold shadow-lg">Dramatic Center</div>
          </div>
        </div>
        <div class="w-full lg:w-6/12 p-5">
          <div class="w-full h-80 overflow-hidden rounded-2xl relative">
            <img class="w-full h-full object-cover relative" src="{{ asset('storage') }}/KG/Sentra/IT Centre.jpg" alt="IT Centre.jpg" />
            <noscript>
              <img src="{{ asset('storage') }}/KG/Sentra/IT Centre.jpg" alt="IT Centre.jpg" />
            </noscript>
            <div class="absolute bottom-5 left-5 bg-white rounded-3xl p-1 px-4 text-center text-blue font-semibold shadow-lg">IT Center</div>
          </div>
        </div>
        <div class="w-full lg:w-6/12 p-5">
          <div class="w-full h-80 overflow-hidden rounded-2xl relative">
            <img class="w-full h-full object-cover relative" src="{{ asset('storage') }}/KG/Sentra/Science Class.jpg" alt="Science Class.jpg" />
            <noscript>
              <img src="{{ asset('storage') }}/KG/Sentra/Science Class.jpg" alt="Science Class.jpg" />
            </noscript>
            <div class="absolute bottom-5 left-5 bg-white rounded-3xl p-1 px-4 text-center text-blue font-semibold shadow-lg">Science Center</div>
          </div>
        </div>
        <div class="w-full lg:w-6/12 p-5">
          <div class="w-full h-80 overflow-hidden rounded-2xl relative">
            <img class="w-full h-full object-cover relative" src="{{ asset('storage') }}/KG/Sentra/Block Centre.jpeg" alt="Block Centre.jpeg" />
            <noscript>
              <img src="{{ asset('storage') }}/KG/Sentra/Block Centre.jpeg" alt="Block Centre.jpeg" />
            </noscript>
            <div class="absolute bottom-5 left-5 bg-white rounded-3xl p-1 px-4 text-center text-blue font-semibold shadow-lg">Block Center</div>
          </div>
        </div>
        <div class="w-full lg:w-6/12 p-5">
          <div class="w-full h-80 overflow-hidden rounded-2xl relative">
            <img class="w-full h-full object-cover relative" src="{{ asset('storage') }}/KG/Sentra/Physical Motoric Centre.jpg" alt="Physical Motoric Centre.jpg" />
            <noscript>
              <img src="{{ asset('storage') }}/KG/Sentra/Physical Motoric Centre.jpg" alt="Physical Motoric Centre.jpg" />
            </noscript>
            <div class="absolute bottom-5 left-5 bg-white rounded-3xl p-1 px-4 text-center text-blue font-semibold shadow-lg">Physic & Motoric Center</div>
          </div>
        </div>
        <div class="w-full lg:w-6/12 p-5">
          <div class="w-full h-80 overflow-hidden rounded-2xl relative">
            <img class="w-full h-full object-cover relative" src="{{ asset('storage') }}/KG/Sentra/Islamic studies centre.jpeg" alt="Islamic studies centre.jpeg" />
            <noscript>
              <img src="{{ asset('storage') }}/KG/Sentra/Islamic studies centre.jpeg" alt="Islamic studies centre.jpeg" />
            </noscript>
            <div class="absolute bottom-5 left-5 bg-white rounded-3xl p-1 px-4 text-center text-blue font-semibold shadow-lg">Ibadah Center</div>
          </div>
        </div>
        <div class="w-full lg:w-6/12 p-5">
          <div class="w-full h-80 overflow-hidden rounded-2xl relative">
            <img class="w-full h-full object-cover relative" src="{{ asset('storage') }}/KG/Sentra/Readiness Centre.jpeg" alt="Readiness Centre.jpeg" />
            <noscript>
              <img src="{{ asset('storage') }}/KG/Sentra/Readiness Centre.jpeg" alt="Readiness Centre.jpeg" />
            </noscript>
            <div class="absolute bottom-5 left-5 bg-white rounded-3xl p-1 px-4 text-center text-blue font-semibold shadow-lg">Literacy Center</div>
          </div>
        </div>
        <div class="w-full lg:w-6/12 p-5">
          <div class="w-full h-80 overflow-hidden rounded-2xl relative">
            <img class="w-full h-full object-cover relative" src="{{ asset('storage') }}/KG/Sentra/Dramatic Micro Centre.jpg" alt="Dramatic Micro Centre.jpg" />
            <noscript>
              <img src="{{ asset('storage') }}/KG/Sentra/Dramatic Micro Centre.jpg" alt="Dramatic Micro Centre.jpg" />
            </noscript>
            <div class="absolute bottom-5 left-5 bg-white rounded-3xl p-1 px-4 text-center text-blue font-semibold shadow-lg">Numeracy Center</div>
          </div>
        </div>
        <div class="w-full lg:w-6/12 p-5">
          <div class="w-full h-80 overflow-hidden rounded-2xl relative">
            <img class="w-full h-full object-cover relative" src="{{ asset('storage') }}/KG/Sentra/Dramatic Micro Centre.jpg" alt="Dramatic Micro Centre.jpg" />
            <noscript>
              <img src="{{ asset('storage') }}/KG/Sentra/Dramatic Micro Centre.jpg" alt="Dramatic Micro Centre.jpg" />
            </noscript>
            <div class="absolute bottom-5 left-5 bg-white rounded-3xl p-1 px-4 text-center text-blue font-semibold shadow-lg">Co-curricular Activity: Music & Native</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-10 relative">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
    <h2 class="text-center mb-10 lg:m-0 font-semibold text-blue text-3xl leading-relaxed manrope pb-5">Extracurricular</h2>
    <div class="py-5">
      <div class="flex flex-wrap justify-center gap-5 -mx-5 py-5">
        <div class="w-5/12 lg:w-2/12">
          <div class="block text-center pb-10">
            <div class="card-flip card-ekskul">
              <div class="card-inner">
                <div class="card-front">
                  <img src="{{ asset('storage') }}/basketball-icon.svg" alt="Basket Icon">
                </div>
                <div class="card-back">
                  <img class="lazyload" src="{{ asset('storage') }}/KG/Extracurricular/Basket.jpg" alt="Basket.jpg" />
                  <noscript>
                    <img src="{{ asset('storage') }}/KG/Extracurricular/Basket.jpg" alt="Basket.jpg" />
                  </noscript>
                </div>
              </div>
            </div>
            <p class="text-center">Basketball</p>
          </div>
        </div>
        <div class="w-5/12 lg:w-2/12">
          <div class="block text-center pb-10">
            <div class="card-flip card-ekskul">
              <div class="card-inner">
                <div class="card-front">
                  <img src="{{ asset('storage') }}/futsal-icon.svg" alt="Futsal Icon">
                </div>
                <div class="card-back">
                  <img class="lazyload" src="{{ asset('storage') }}/KG/Extracurricular/Futsal_0101.jpg" alt="Futsal_0101.jpg" />
                  <noscript>
                    <img src="{{ asset('storage') }}/KG/Extracurricular/Futsal_0101.jpg" alt="Futsal_0101.jpg" />
                  </noscript>
                </div>
              </div>
            </div>
            <p class="text-center">Futsal</p>
          </div>
        </div>
        <div class="w-5/12 lg:w-2/12">
          <div class="block text-center pb-10">
            <div class="card-flip card-ekskul">
              <div class="card-inner">
                <div class="card-front">
                  <img src="{{ asset('storage') }}/vocal-icon.svg" alt="Vocal Icon">
                </div>
                <div class="card-back">
                  <img class="lazyload" src="{{ asset('storage') }}/KG/Extracurricular/VOCAL.jpg" alt="VOCAL.jpg" />
                  <noscript>
                    <img src="{{ asset('storage') }}/KG/Extracurricular/VOCAL.jpg" alt="VOCAL.jpg" />
                  </noscript>
                </div>
              </div>
            </div>
            <p class="text-center">Vocal</p>
          </div>
        </div>
        <div class="w-5/12 lg:w-2/12">
          <div class="block text-center pb-10">
            <div class="card-flip card-ekskul">
              <div class="card-inner">
                <div class="card-front">
                  <img src="{{ asset('storage') }}/dance-icon.svg" alt="Traditional Dance Icon">
                </div>
                <div class="card-back">
                  <img class="lazyload" src="{{ asset('storage') }}/KG/Extracurricular/Traditional Dance.jpg" alt="Traditional Dance.jpg" />
                  <noscript>
                    <img src="{{ asset('storage') }}/KG/Extracurricular/Traditional Dance.jpg" alt="Traditional Dance.jpg" />
                  </noscript>
                </div>
              </div>
            </div>
            <p class="text-center">Traditional Dance</p>
          </div>
        </div>
        <div class="w-5/12 lg:w-2/12">
          <div class="block text-center pb-10">
            <div class="card-flip card-ekskul">
              <div class="card-inner">
                <div class="card-front">
                  <img src="{{ asset('storage') }}/ballet-icon.svg" alt="BalletIcon">
                </div>
                <div class="card-back">
                  <img class="lazyload" src="{{ asset('storage') }}/KG/Extracurricular/Ballet.jpg" alt="Ballet.jpg" />
                  <noscript>
                    <img src="{{ asset('storage') }}/KG/Extracurricular/Ballet.jpg" alt="Ballet.jpg" />
                  </noscript>
                </div>
              </div>
            </div>
            <p class="text-center">Ballet</p>
          </div>
        </div>

        <div class="w-5/12 lg:w-2/12">
          <div class="block text-center pb-10">
            <div class="card-flip card-ekskul">
              <div class="card-inner">
                <div class="card-front">
                  <img src="{{ asset('storage') }}/painting-icon.svg" alt="Painting Icon">
                </div>
                <div class="card-back">
                  <img class="lazyload" src="{{ asset('storage') }}/KG/Extracurricular/Lukis (4).jpg" alt="Lukis (4).jpg" />
                  <noscript>
                    <img src="{{ asset('storage') }}/KG/Extracurricular/Lukis (4).jpg" alt="Lukis (4).jpg" />
                  </noscript>
                </div>
              </div>
            </div>
            <p class="text-center">Painting</p>
          </div>
        </div>
        <div class="w-5/12 lg:w-2/12">
          <div class="block text-center pb-10">
            <div class="card-flip card-ekskul">
              <div class="card-inner">
                <div class="card-front">
                  <img src="{{ asset('storage') }}/taekwondo-icon.svg" alt="Taekwondo Icon">
                </div>
                <div class="card-back">
                  <img class="lazyload" src="{{ asset('storage') }}/KG/Extracurricular/Taekwondo (6).jpg" alt="Taekwondo (6).jpg" />
                  <noscript>
                    <img src="{{ asset('storage') }}/KG/Extracurricular/Taekwondo (6).jpg" alt="Taekwondo (6).jpg" />
                  </noscript>
                </div>
              </div>
            </div>
            <p class="text-center">Taekwondo</p>
          </div>
        </div>
        <div class="w-5/12 lg:w-2/12">
          <div class="block text-center pb-10">
            <div class="card-flip card-ekskul">
              <div class="card-inner">
                <div class="card-front">
                  <img src="{{ asset('storage') }}/swim-icon.svg" alt="Swimming Icon">
                </div>
                <div class="card-back">
                  <img class="lazyload" src="{{ asset('storage') }}/KG/Extracurricular/Renang.jpg" alt="Renang.jpg" />
                  <noscript>
                    <img src="{{ asset('storage') }}/KG/Extracurricular/Renang.jpg" alt="Renang.jpg" />
                  </noscript>
                </div>
              </div>
            </div>
            <p class="text-center">Swimming</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@include('components.facilities')

@stop