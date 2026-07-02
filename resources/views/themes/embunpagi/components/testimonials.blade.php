<style>
/* =====================================================
   TESTIMONIAL SECTION
===================================================== */

.testimonial-section {
    position: relative;
    overflow: hidden;
    padding: 120px 0;
    background:
        radial-gradient(circle at top left, #dff3ff 0%, transparent 35%),
        radial-gradient(circle at bottom right, #eaf9df 0%, transparent 30%),
        linear-gradient(180deg, #ffffff 0%, #f7fbff 100%);
}

/* =========================
    CONTAINER
========================= */

.testimonial-section .container {
    position: relative;
    z-index: 2;
}

/* =========================
    HEADING
========================= */

.testimonial-heading {
    max-width: 700px;
    margin: auto;
    text-align: center;
    margin-bottom: 70px;
}

.testimonial-badge {

    display: inline-flex;
    align-items: center;
    gap: 10px;

    padding: 10px 20px;

    border-radius: 999px;

    background: #EAF6FF;

    color: #118BCC;

    font-weight: 600;

    margin-bottom: 22px;

    font-size: .95rem;

}

.testimonial-badge i {

    color: #8CC63F;

}

.testimonial-heading h2 {

    font-size: 3rem;

    line-height: 1.2;

    font-weight: 700;

    color: #16314F;

    margin-bottom: 18px;

}

.testimonial-heading h2 span {

    color: #118BCC;

}

.testimonial-heading p {

    color: #6b7280;

    font-size: 1.05rem;

    line-height: 1.8;

}

/* =========================
    SPLIDE
========================= */

#testimonial-slider {

    padding: 60px 0;
    visibility: visible;

}

#testimonial-slider .splide__track {
    overflow: visible;
}

#testimonial-slider .splide__list {
    display: flex;
    align-items: stretch;
}

.splide {
    visibility: visible !important;
}

#testimonial-slider .splide__slide {
    padding: 0 0.75rem;
    width: 300px !important;
    min-width: 300px;
    flex: 0 0 auto;
    display: flex;
    justify-content: center;
}

/* =========================
    CARD
========================= */

.testimonial-card {
    position: relative;
    width: 100%;
    max-width: 300px;
    background: #ffffff;
    border-radius: 30px;
    padding: 90px 28px 30px;
    text-align: center;
    min-height: 520px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: transform .35s, box-shadow .35s;
    border: 1px solid rgba(14, 57, 121, 0.08);
    box-shadow: 0 24px 70px rgba(18, 45, 82, .08);
}

.testimonial-card:hover {

    transform: translateY(-8px);
    box-shadow: 0 30px 90px rgba(18, 45, 82, .14);

}

/* =========================
    AVATAR
========================= */

.testimonial-avatar {

    position: absolute;
    top: -55px;
    left: 50%;
    transform: translateX(-50%);
    width: 110px;
    height: 110px;
    border-radius: 50%;
    padding: 6px;
    background: linear-gradient(135deg, #118BCC, #8CC63F);
    display: grid;
    place-items: center;

}

.testimonial-avatar img {

    width: 100%;
    height: 100%;
    border-radius: 50%;
    object-fit: cover;
    border: 4px solid #ffffff;

}

/* =========================
    NAME
========================= */

.testimonial-card h3 {

    font-size: 1.45rem;
    color: #16314F;
    margin: 0;
    margin-top: 18px;
    font-weight: 800;
    line-height: 1.18;

}

/* =========================
    ROLE
========================= */

.testimonial-role {

    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.6rem;
    margin: 16px auto 0;
    padding: 12px 18px;
    border-radius: 999px;
    background: #eef6ff;
    color: #0d4f8d;
    font-size: .92rem;
    font-weight: 700;
    box-shadow: inset 0 0 0 1px rgba(17, 139, 204, .15);

}

.testimonial-role i {
    color: #118BCC;
    font-size: 1rem;
}

.testimonial-batch {

    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    margin: 20px auto 0;
    padding: 10px 18px;
    border-radius: 999px;
    background: rgba(140, 198, 63, .12);
    color: #2d6a1f;
    font-size: .92rem;
    font-weight: 700;

}

.testimonial-batch i {
    color: #8cc63f;
}

.testimonial-content {

    color: #475569;
    line-height: 1.85;
    font-size: .96rem;
    margin: 20px 0 0;
    min-height: 120px;

}

/* =========================
    STARS
========================= */

.testimonial-stars {

    letter-spacing: 5px;

    color: #FFD54A;

    font-size: 20px;

    margin-bottom: 25px;

}

/* =========================
    CONTENT
========================= */

.testimonial-content {
    color: #475569;
    line-height: 1.9;
    font-size: .98rem;
    margin: 22px 0 0;
    min-height: 140px;
    flex: 1;
}

/* =========================
    QUOTE ICON
========================= */

.quote-icon {

    position: absolute;

    top: 25px;

    right: 30px;

    font-size: 90px;

    font-family: Georgia;

    color: #118BCC;

    opacity: .08;

    line-height: 1;

    pointer-events: none;

}

/* =========================
    DECORATION
========================= */

.testimonial-circle {

    position: absolute;

    border-radius: 50%;

    filter: blur(80px);

    opacity: .25;

}

.testimonial-circle.one {

    width: 280px;

    height: 280px;

    background: #8CC63F;

    left: -80px;

    top: 120px;

}

.testimonial-circle.two {

    width: 340px;

    height: 340px;

    background: #118BCC;

    right: -120px;

    top: 100px;

}

.testimonial-circle.three {

    width: 260px;

    height: 260px;

    background: #D6F3FF;

    bottom: -80px;

    left: 45%;

}

/* =========================
    SPLIDE DOTS
========================= */

.splide__pagination {

    margin-top: 35px;
    position: relative;
    display: flex;
    justify-content: center;
    gap: 0.75rem;

}

.splide__pagination__page {

    width: 12px;

    height: 12px;

    background: #D7E6F3;

    opacity: 1;

    transition: .3s;

}

.splide__pagination__page.is-active {

    background: #118BCC;

    transform: scale(1.4);

}

/* =========================
    SPLIDE ARROWS
========================= */

.splide__arrow {

    width: 52px;

    height: 52px;

    border-radius: 50%;

    background: white;

    opacity: 1;

    box-shadow:

        0 10px 25px rgba(0, 0, 0, .08);

    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    pointer-events: auto;

}

#testimonial-slider .splide__arrows {
    position: absolute;
    top: 50%;
    left: 0;
    width: 100%;
    display: flex;
    justify-content: space-between;
    transform: translateY(-50%);
    padding: 0 0.5rem;
    pointer-events: none;
    z-index: 2;
}

#testimonial-slider .splide__arrow {
    pointer-events: auto;
}

.splide__arrow svg {

    fill: #118BCC;

}

.splide__arrow:hover {

    background: #118BCC;

}

.splide__arrow:hover svg {

    fill: white;

}
</style>


<section class="testimonial-section">
    <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        {{-- Heading --}}
        <div class="testimonial-heading">
            <span class="testimonial-badge">
                <i class="fa-solid fa-heart"></i>
                Testimonials
            </span>
            <h2>
                What They Say About
                <span>Embun Pagi Islamic School</span>
            </h2>
            <p>
                Stories from parents, students, alumni and our educational partners
                who have become part of the Embun Pagi family.
            </p>
        </div>

        @php
            $testimonials = collect($dataDummyModuleContents ?? [])->filter(function ($item) {
                return isset($item->type) && $item->type === 'testimonials';
            })->values();

            $dummyTestimonials = collect([
                (object)[
                    'trans' => [
                        (object)[
                            'image' => null,
                            'title' => 'Siti Nurhaliza',
                            'subtitle' => 'Teknik Elektro Universitas Indonesia',
                            'batch' => 'Angkatan 2020',
                            'description' => 'Embun Pagi Islamic School has been a wonderful place for my child to grow academically and spiritually.',
                        ],
                    ],
                ],
                (object)[
                    'trans' => [
                        (object)[
                            'image' => null,
                            'title' => 'Ahmad Fauzi',
                            'subtitle' => 'MIPA Biologi Universitas Indonesia',
                            'batch' => 'Angkatan 2020',
                            'description' => 'The teachers really care, and the learning environment is safe and supportive for every student.',
                        ],
                    ],
                ],
                (object)[
                    'trans' => [
                        (object)[
                            'image' => null,
                            'title' => 'Nina Khairunnisa',
                            'subtitle' => 'Desain Komunikasi Visual Binus University',
                            'batch' => 'Angkatan 2019',
                            'description' => 'I am proud to be part of a school that balances academic excellence with Islamic values.',
                        ],
                    ],
                ],
                (object)[
                    'trans' => [
                        (object)[
                            'image' => null,
                            'title' => 'Arrayan Muhammad Pasha',
                            'subtitle' => 'SAPPK – Institut Teknologi Bandung',
                            'batch' => 'Angkatan 2021',
                            'description' => 'Di EMBUN PAGI itu benar-benar belajar yang menyenangkan, karena pembelajaran dari gurunya memahami kebutuhan kami sebagai murid.',
                        ],
                    ],
                ],
                (object)[
                    'trans' => [
                        (object)[
                            'image' => null,
                            'title' => 'Arrayan Delta Muhammad Pasha',
                            'subtitle' => 'SAPPK – Institut Teknologi Bandung',
                            'batch' => 'Angkatan 2021',
                            'description' => 'Di EMBUN PAGI itu benar-benar belajar yang menyenangkan, karena pembelajaran dari gurunya memahami kebutuhan kami sebagai murid.',
                        ],
                    ],
                ],
            ]);

            if ($testimonials->isEmpty()) {
                $testimonials = $dummyTestimonials;
            }

            while ($testimonials->count() < 4) {
                $testimonials->push($dummyTestimonials[$testimonials->count() % $dummyTestimonials->count()]);
            }
        @endphp

        {{-- Splide --}}
        <div id="testimonial-slider" class="splide">
            <div class="splide__track">
                <ul class="splide__list">
                    @foreach($testimonials as $item)
                    <li class="splide__slide">
                        <div class="testimonial-card">
                            <div class="quote-icon">“</div>
                            <div class="testimonial-avatar">
                                @php
                                    $trans = data_get($item, 'trans.0');
                                @endphp
                                @if(!empty($trans->image))
                                    <img src="{{ env('USE_AWS') ? env('AWS_URL') : asset('storage') }}/{{ $trans->image }}"
                                        alt="{{ $trans->title }}">
                                @else
                                    <img src="{{ asset('img/embun-default-img.jpg') }}"
                                        alt="{{ $trans->title }}">
                                @endif
                            </div>

                            <h3>
                                {{ $trans->title ?? 'Guest' }}
                            </h3>

                            @if(!empty($trans->subtitle))
                            <div class="testimonial-role">
                                <i class="fa-solid fa-graduation-cap"></i>
                                {{ $trans->subtitle }}
                            </div>
                            @endif

                            <div class="testimonial-content">
                                {!! Str::limit(strip_tags($trans->description ?? ''), 260) !!}
                            </div>

                            @if(!empty($trans->batch))
                            <div class="testimonial-batch">
                                {{ $trans->batch }}
                            </div>
                            @endif
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    {{-- Decorative Shapes --}}
    <div class="testimonial-circle one"></div>
    <div class="testimonial-circle two"></div>
    <div class="testimonial-circle three"></div>

</section>