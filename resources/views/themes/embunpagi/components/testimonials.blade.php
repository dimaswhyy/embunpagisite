<section class="py-20 bg-gradient-blue-light relative">
  <!-- <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
    <div class="m-auto w-full lg:w-4/12 text-center">
      <h2 class="mb-10 lg:m-0 font-semibold text-blue text-3xl leading-relaxed manrope">What they say about Embun Pagi Islamic School</h2>
    </div>
    <div class="w-full lg:w-9/12 m-auto py-10">
      <div class="flex flex-col lg:flex-row items-center gap-10">
        <div id="testimoni-thumbnail" class="splide w-full md:w-11/12 md:px-6 lg:p-0 lg:w-full testimoni-thumbnail">
          <div class="splide__track h-full">
            <ul class="splide__list">
              @foreach($dataModuleContents as $item)
              @if ($item->type === 'testimonials')
              <li class="splide__slide rounded-full cursor-pointer">
                @if ($item->translation[0]->image)
                <img class="w-full h-full rounded-full object-cover overflow-hidden" src="{{ env('USE_AWS') ? env('AWS_URL') : asset('storage') }}/{{ $item->translation[0]->image }}" alt="{{ $item->translation[0]->image }}" />
                @else
                <img src="{{ asset('img/embun-default-img.jpg') }}" alt="{{ $item->translation[0]->title }}" class="w-24 h-24 rounded-full object-cover overflow-hidden" />
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
  </div> -->

  <div class="mx-auto max-w-7xl px-4 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-x-6 gap-y-16">

            <div
                class="relative bg-white border-2 border-[#633a94] rounded-3xl p-6 pt-16 flex flex-col items-center text-center shadow-sm">
                <div
                    class="absolute -top-14 w-28 h-28 rounded-full overflow-hidden border-4 border-white bg-gradient-to-tr from-[#633a94] to-[#ff9800] p-1 shadow-md">
                    <img src="path-foto-arrayan.jpg" alt="Arrayan"
                        class="w-full h-full object-cover rounded-full bg-slate-200">
                </div>

                <h3 class="text-xl font-bold text-[#0f172a] mb-1">Arrayan Muhammad Pasha</h3>
                <p class="text-sm font-semibold text-[#e91e63] mb-4">SAPPK - Institut Teknologi Bandung</p>

                <div class="text-sm text-slate-600 flex gap-2 text-left mt-auto">
                    <i class="bi bi-quote text-xl text-[#0f172a] shrink-0 leading-none"></i>
                    <p>Di SMM itu benar-benar bisa belajar yang menyenangkan, karena pembelajaran dan gurunya memahami
                        kebutuhan kami sebagai murid.</p>
                </div>
            </div>

            <div
                class="relative bg-white border-2 border-[#633a94] rounded-3xl p-6 pt-16 flex flex-col items-center text-center shadow-sm">
                <div
                    class="absolute -top-14 w-28 h-28 rounded-full overflow-hidden border-4 border-white bg-gradient-to-tr from-[#633a94] to-[#ff9800] p-1 shadow-md">
                    <img src="path-foto-chiara.jpg" alt="Chiara"
                        class="w-full h-full object-cover rounded-full bg-slate-200">
                </div>
                <h3 class="text-xl font-bold text-[#0f172a] mb-1">Chiara Aulia Fayza</h3>
                <p class="text-sm font-semibold text-[#e91e63] mb-4">MIPA Biologi - Universitas Indonesia</p>
                <div class="text-sm text-slate-600 flex gap-2 text-left mt-auto">
                    <i class="bi bi-quote text-xl text-[#0f172a] shrink-0 leading-none"></i>
                    <p>SMM adalah sekolah yang sangat mendukung pengembangan potensi setiap anak dengan guru-guru yang
                        sangat suportif dan metode pembelajaran yang fleksibel.</p>
                </div>
            </div>

            <div
                class="relative bg-white border-2 border-[#633a94] rounded-3xl p-6 pt-16 flex flex-col items-center text-center shadow-sm">
                <div
                    class="absolute -top-14 w-28 h-28 rounded-full overflow-hidden border-4 border-white bg-gradient-to-tr from-[#633a94] to-[#ff9800] p-1 shadow-md">
                    <img src="path-foto-naura.jpg" alt="Naura"
                        class="w-full h-full object-cover rounded-full bg-slate-200">
                </div>
                <h3 class="text-xl font-bold text-[#0f172a] mb-1">Naura Alzahrifa Juliandi</h3>
                <p class="text-sm font-semibold text-[#e91e63] mb-4">DKV - Institut Kesenian Jakarta (IKJ)</p>
                <div class="text-sm text-slate-600 flex gap-2 text-left mt-auto">
                    <i class="bi bi-quote text-xl text-[#0f172a] shrink-0 leading-none"></i>
                    <p>Menjadi pilihan dan keputusan terbaik bisa belajar di SMM. Fleksibilitas kelas online di SMM
                        memberikan kesempatan untuk saya bisa terus mengasah kemampuan dan keterampilan yang diminati.
                    </p>
                </div>
            </div>

            <div
                class="relative bg-white border-2 border-[#633a94] rounded-3xl p-6 pt-16 flex flex-col items-center text-center shadow-sm">
                <div
                    class="absolute -top-14 w-28 h-28 rounded-full overflow-hidden border-4 border-white bg-gradient-to-tr from-[#633a94] to-[#ff9800] p-1 shadow-md">
                    <img src="path-foto-danish.jpg" alt="Danish"
                        class="w-full h-full object-cover rounded-full bg-slate-200">
                </div>
                <h3 class="text-xl font-bold text-[#0f172a] mb-1">Danish Fikri Sunjayadi</h3>
                <p class="text-sm font-semibold text-[#e91e63] mb-4">Teknik Elektro - Universitas Indonesia</p>
                <div class="text-sm text-slate-600 flex gap-2 text-left mt-auto">
                    <i class="bi bi-quote text-xl text-[#0f172a] shrink-0 leading-none"></i>
                    <p>SMM punya sistem belajar yang efektif dan fleksibel. Proyek dari guru jadi lebih mudah
                        dikerjakan, dan jam belajarnya memberi saya cukup waktu untuk fokus mempersiapkan UTBK.</p>
                </div>
            </div>

        </div>
    </div>

</section>