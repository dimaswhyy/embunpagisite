<style>
.image-sun {
    top: -66px;
    bottom: auto;
    transform: rotate(211deg);
}
</style>

<section class="bg-gradient-ivory py-16 relative overflow-hidden">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-12 relative z-10">
        <div class="flex gap-10 md:gap-16 flex-col lg:flex-row items-center justify-center">

            <div class="w-full lg:w-5/12 relative">
                <img class="w-full h-auto object-cover rounded-[2.5rem]" src="path_ke_foto_kamu.jpg"
                    alt="Embun Pagi Islamic School" />
            </div>

            <div class="w-full lg:w-7/12 flex flex-col justify-center text-left">

                <div class="mb-4">
                    <h2 class="font-bold text-[#0F172A] text-3xl md:text-4xl leading-tight">
                        About
                    </h2>
                </div>

                <div class="text-[#475569] text-base md:text-lg leading-relaxed mb-8">
                    <p>
                        Since its founding in 2005 with just 24 kindergarten students, EPIS has grown significantly. We established our Elementary School in 2007 and expanded to include Junior High School and Senior High School. Driven by a passion to advance education in Indonesia, particularly Islamic education, EPIS is committed to continuous improvement in curriculum, human resources, services, and facilities.
                    </p>
                </div>

                <a href="#" class="btn-primary text-white font-semibold py-3 px-8 rounded-full w-fit transition duration-200">
                    See more ...
                </a>

            </div>

        </div>
    </div>

    <img src="{{ asset('img/ellipse-ivory.svg') }}" class="absolute bottom-5 -left-36" />
    <img src="{{ asset('img/sun-vector.svg') }}"
        class="absolute -bottom-16 -right-40 -rotate-12 w-96 hidden md:block image-sun">
</section>