<style>
.card-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 40px;
}

.program-info {
    min-height: 20px;
    grid-column: 1 / -1;
}

.program-card {
    background: #fff;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 10px 25px rgba(0, 0, 0, .08);
    transition: .3s ease;
    cursor: pointer;
}

.program-card:hover {
    transform: translateY(-8px);
}

.program-card img {
    width: 100%;
    height: 320px;
    object-fit: cover;
    display: block;
}

.card-content {
    padding: 24px 28px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.card-content h3 {
    font-size: 18px;
    font-weight: 700;
    color: #111;
    margin: 0;
    line-height: 1.4;
}

.arrow {
    font-size: 32px;
    color: #111;
    transition: .3s;
}

.program-card:hover .arrow {
    transform: translateX(6px);
}

/* Tablet */
@media(max-width:1024px) {
    .card-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

/* Mobile */
@media(max-width:768px) {
    .card-grid {
        grid-template-columns: 1fr;
    }

    .program-card img {
        height: 250px;
    }
}

/* Academic Video */
.academic-video{
    width:100%;
    border-radius:30px;
    overflow:hidden;
    box-shadow:
        0 15px 40px rgba(0,0,0,.12),
        0 5px 15px rgba(0,0,0,.08);
    grid-column: 1 / -1;
    aspect-ratio: 16 / 9;
}

.academic-video iframe {
    width: 100%;
    height: 100%;
}
</style>

<section class="academic-program py-20 bg-green-light relative">
    <div class="card-grid mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="academic-video">
            <iframe src="https://www.youtube.com/embed/msHDrvEpTLM?si=HpeCY8Tul6CF8R1d" title="Academic Program Video" frameborder="0"
                allowfullscreen>
            </iframe>
        </div>
        <div class="program-info">
            <h2 class="text-center lg:text-left mb-10 lg:m-0 font-semibold text-blue text-3xl leading-relaxed manrope">
                Academic Program</h2>
            <p class="text-center lg:text-left text-gray-600">Explore our comprehensive academic programs designed to
                nurture and develop your child's potential.</p>
        </div>
        <div class="program-card">
            <img src="images/early-childhood.jpg" alt="">
            <div class="card-content">
                <h3>Nursery & Kindergarten</h3>
                <span class="arrow">→</span>
            </div>
        </div>

        <a href="https://embunpagi.sch.id/primary" class="program-card">
            <img src="images/primary-school.jpg" alt="">
            <div class="card-content">
                <h3>Primary</h3>
                <span class="arrow">→</span>
            </div>
        </a>

        <div class="program-card">
            <img src="images/middle-school.jpg" alt="">
            <div class="card-content">
                <h3>Junior High</h3>
                <span class="arrow">→</span>
            </div>
        </div>

        <div class="program-card">
            <img src="images/high-school.jpg" alt="">
            <div class="card-content">
                <h3>Senoir High</h3>
                <span class="arrow">→</span>
            </div>
        </div>
    </div>

    <div class="absolute left-0 bottom-0 w-full h-80 bg-repeat bg-bottom"
        style="background-image: url('{{ asset('img/bg-pattern.png') }}'); background-size: auto 100%"></div>
</section>