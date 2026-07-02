<style>
/* ==========================================================
   ACADEMIC PROGRAM
========================================================== */

.academic-program {
    position: relative;
    overflow: hidden;
    padding: 120px 0;
    background:
        radial-gradient(circle at bottom left, #dff6ff 0%, transparent 35%),
        /* radial-gradient(circle at bottom right, #edf9e6 0%, transparent 35%), */
        #fff;
}

.academic-program .container {
    position: relative;
    z-index: 2;
}

/* ==========================================================
   HEADING
========================================================== */

.program-heading {

    max-width: 700px;
    margin: 0 auto 70px;
    text-align: center;

}

.section-badge {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 10px 22px;
    border-radius: 999px;
    background: #eef8ff;
    color: #118BCC;
    font-weight: 600;
    margin-bottom: 22px;
}

.section-badge i {
    color: #8CC63F;
}

.program-heading h2 {
    font-size: 56px;
    font-weight: 800;
    line-height: 1.1;
    margin-bottom: 20px;
    color: #16314F;
}

.program-heading span {
    color: #118BCC;
}

.program-heading p {
    font-size: 18px;
    line-height: 1.8;
    color: #667085;
}

/* ==========================================================
   GRID
========================================================== */

.program-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 28px;
}

/* ==========================================================
   CARD
========================================================== */

.program-card {
    position: relative;
    display: flex;
    flex-direction: column;
    text-decoration: none;
    overflow: hidden;
    border-radius: 28px;
    background: #fff;
    transition: .4s;
    box-shadow: 0 18px 40px rgba(20, 35, 70, .08);
}

/* ==========================================================
   IMAGE
========================================================== */

.program-image {
    position: relative;
    height: 200px;
    overflow: hidden;
}

.program-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: .6s;
}

.card-wave {
    position: absolute;
    left: 0;
    bottom: -1px;
    width: 100%;
    height: 70px;
    display: block;
    z-index: 3;
}

.card:hover .wave {
    transform: scale(1.05);
}

.program-card:hover img {
    transform: scale(1.08);
}

/* ==========================================================
   CORNER ICON
========================================================== */

.corner-icon {
    position: absolute;
    top: 18px;
    left: 18px;
    width: 52px;
    height: 52px;
    border-radius: 18px;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #fff;
    font-size: 20px;
    z-index: 5;
}

/* warna */

.program-card.green .corner-icon {
    background: #7ED321;
}

.program-card.blue .corner-icon {
    background: #169BFF;
}

/* ==========================================================
   BODY
========================================================== */

.program-body {
    position: relative;
    padding:
        55px 28px 30px;
}

/* ==========================================================
   FLOATING ICON
========================================================== */

.floating-icon {
    position: absolute;
    left: 50%;
    top: -50px;
    transform: translateX(-150%);
    width: 76px;
    height: 76px;
    border-radius: 50%;
    background: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 34px;
    box-shadow:
        0 15px 30px rgba(0, 0, 0, .08);
    z-index: 10;
}

.program-card.green .floating-icon {
    color: #7ED321;
}

.program-card.blue .floating-icon {
    color: #169BFF;
}

/* ==========================================================
   TITLE
========================================================== */

.program-body h3 {
    font-size: 23px;
    line-height: 1.15;
    font-weight: 800;
    color: #16314F;
    margin-bottom: 10px;
}

/* ==========================================================
   LINE
========================================================== */

.program-line {
    width: 48px;
    height: 5px;
    border-radius: 30px;
    margin-bottom: 18px;
}

.program-card.green .program-line {
    background: #7ED321;
}

.program-card.blue .program-line {
    background: #169BFF;
}

/* ==========================================================
   DESCRIPTION
========================================================== */

.program-body p {
    font-size: 16px;
    line-height: 1.8;
    color: #5f6b7a;
    min-height: 90px;
}

/* ==========================================================
   FOOTER
========================================================== */

.program-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 30px;
}

.program-footer span {
    font-size: 17px;
    font-weight: 700;
    color: #16314F;
}

.title-row{
    display: flex;
    justify-content: space-between;
    align-items: center; /* atau flex-start */
    gap: 20px;
}

.title-row h3{
    margin: 0;
    flex: 1;
    line-height: 1.15;
}

.circle-arrow{
    width: 46px;
    height: 46px;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-shrink: 0;
    transition: .35s;
}

.program-card.green .circle-arrow {
    background: #7ED321;
    color: #fff;
}

.program-card.blue .circle-arrow {
    background: #169BFF;
    color: #fff;
}

.program-card:hover .circle-arrow {
    transform: translateX(8px) rotate(-15deg);
}

/* ==========================================================
   BOTTOM BORDER
========================================================== */

.program-card::before {
    content: "";
    position: absolute;
    left: 0;
    bottom: 0;
    width: 100%;
    height: 6px;
}

.program-card.green::before {
    background: #7ED321;
}

.program-card.blue::before {
    background: #169BFF;
}

@media(max-width:1200px) {

    .program-grid {

        grid-template-columns: repeat(2, 1fr);

    }

}

@media(max-width:768px) {
    .program-heading h2 {
        font-size: 40px;
    }

    .program-grid {
        grid-template-columns: 1fr;
    }

    .program-image {
        height: 240px;
    }

    .program-body h3 {
        font-size: 30px;
    }
}
</style>

<section class="academic-program py-24 position-relative">
    <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        {{-- Heading --}}
        <div class="program-heading">
            <h2>
                Academic <span>Program</span>
            </h2>
            <p>
                Explore our comprehensive academic programs designed to nurture,
                inspire and prepare every learner for a bright future.
            </p>
        </div>

        {{-- Program Cards --}}

        <div class="program-grid">
            {{-- Nursery --}}
            <a href="#" class="program-card green">
                <div class="program-image">
                    <img src="{{ asset('img/HAY_3600.jpg') }}">
                    <svg class="card-wave" viewBox="-20 0 540 80" preserveAspectRatio="none">
                        <path fill="#ffffff" d="M-30 80 C80 80, 170 58, 250 42 C340 22, 430 0, 530 18 L530 100 L-30 100 Z" />
                    </svg>
                    <span class="corner-icon">
                        <i class="fa-regular fa-heart"></i>
                    </span>
                </div>

                <div class="program-body">
                    <div class="floating-icon">
                        <i class="fa-solid fa-baby"></i>
                    </div>
                    <div class="title-row">
                        <h3>
                            Nursery &
                            Kindergarten
                        </h3>
                        <div class="circle-arrow">
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                    <div class="program-line"></div>
                </div>
            </a>

            {{-- Primary --}}

            <a href="#" class="program-card blue">
                <div class="program-image">
                    <img src="{{ asset('img/HAY_3600.jpg') }}">
                    <svg class="card-wave" viewBox="-20 0 540 80" preserveAspectRatio="none">
                        <path fill="#ffffff" d="M-30 80 C80 80, 170 58, 250 42 C340 22, 430 0, 530 18 L530 100 L-30 100 Z" />
                    </svg>
                    <span class="corner-icon">
                        <i class="fa-regular fa-star"></i>
                    </span>
                </div>

                <div class="program-body">
                    <div class="floating-icon">
                        <i class="fa-solid fa-baby"></i>
                    </div>
                    <div class="title-row">
                        <h3>
                            Primary School
                        </h3>
                        <div class="circle-arrow">
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                    <div class="program-line"></div>
                </div>
            </a>

            {{-- Junior High --}}
            <a href="#" class="program-card green">
                <div class="program-image">
                    <img src="{{ asset('img/HAY_3600.jpg') }}">
                    <svg class="card-wave" viewBox="-20 0 540 80" preserveAspectRatio="none">
                        <path fill="#ffffff" d="M-30 80 C80 80, 170 58, 250 42 C340 22, 430 0, 530 18 L530 100 L-30 100 Z" />
                    </svg>
                    <span class="corner-icon">
                        <i class="fa-regular fa-paper-plane"></i>
                    </span>
                </div>
                <div class="program-body">
                    <div class="floating-icon">
                        <i class="fa-solid fa-baby"></i>
                    </div>
                    <div class="title-row">
                        <h3>
                            Junior High
                        </h3>
                        <div class="circle-arrow">
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                    <div class="program-line"></div>
                </div>
            </a>

            {{-- Senior High --}}
            <a href="#" class="program-card blue">
                <div class="program-image">
                    <img src="{{ asset('img/HAY_3600.jpg') }}">
                    <svg class="card-wave" viewBox="-20 0 540 80" preserveAspectRatio="none">
                        <path fill="#ffffff" d="M-30 80 C80 80, 170 58, 250 42 C340 22, 430 0, 530 18 L530 100 L-30 100 Z" />
                    </svg>
                    <span class="corner-icon">
                        <i class="fa-solid fa-trophy"></i>
                    </span>
                </div>
                <div class="program-body">
                    <div class="floating-icon">
                        <i class="fa-solid fa-graduation-cap"></i>
                    </div>
                    <div class="title-row">
                        <h3>
                            Senior High
                        </h3>
                        <div class="circle-arrow">
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                    <div class="program-line"></div>
                </div>
            </a>
        </div>
    </div>

    {{-- Decoration --}}

    <div class="shape one"></div>
    <div class="shape two"></div>
    <div class="shape three"></div>

</section>