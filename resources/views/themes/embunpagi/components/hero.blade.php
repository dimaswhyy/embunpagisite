<style>
.hero-section {
    position: relative;
    height: 100vh;
    display: flex;
    align-items: center;

    background-image: url('img/hero-ige.jpg');
    background-size: cover;
    background-position: center;

    overflow: hidden;
}

.hero-section::before {
    content: "";
    position: absolute;
    inset: 0;

    background-image: url('img/hero-ime.jpg');
    background-size: cover;
    background-position: center;

    animation: zoomHero 15s ease-in-out infinite alternate;
}

.hero-overlay {
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, .35);
    z-index: 1;
}

.hero-content {
    position: relative;
    z-index: 2;

    max-width: 700px;
    margin-left: 10%;
    color: white;
}

.hero-badge {
    display: inline-block;
    padding: 10px 18px;

    background: rgba(255, 255, 255, .15);
    backdrop-filter: blur(10px);

    border-radius: 50px;

    animation: fadeUp 1s ease forwards;
}

.hero-content h1 {
    font-size: clamp(3rem, 6vw, 5rem);
    line-height: 1.1;
    margin: 20px 0;

    animation: fadeUp 1s ease .3s forwards;
    opacity: 0;
}

.hero-content p {
    font-size: 1.2rem;
    line-height: 1.8;

    animation: fadeUp 1s ease .6s forwards;
    opacity: 0;
}

.hero-buttons {
    display: flex;
    gap: 15px;
    margin-top: 30px;

    animation: fadeUp 1s ease .9s forwards;
    opacity: 0;
}

.btn-primary-hero {
    background: linear-gradient(to right, #118bcc 0%, #b3d334 100%);
    color: #fff;
    padding: 15px 35px;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 600;
    transition: all .3s ease;
}

.btn-primary-hero:hover {
    background: linear-gradient(to right, #0f7db6 0%, #9fbc2b 100%);
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(17, 139, 204, .25);
}

.btn-secondary-hero {
    background: rgba(255,255,255,.08);
    backdrop-filter: blur(10px);

    color: #fff;
    border: 2px solid rgba(255,255,255,.4);

    padding: 15px 35px;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 600;

    transition: all .3s ease;
}

.btn-secondary-hero:hover {
    background: rgba(255,255,255,.15);
    border-color: rgba(255,255,255,.7);
    color: #fff;
}

@keyframes fadeUp{
    from{
        opacity:0;
        transform:translateY(40px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}
</style>

<section class="hero-section">
    <div class="hero-overlay"></div>

    <div class="hero-content">
        <span class="hero-badge">
            Welcome to Embun Pagi Islamic School
        </span>

        <h1>
            Developing Future<br>
            Islamic Leaders
        </h1>

        <p>
            Nurturing young minds with Islamic values,
            academic excellence, and character development
            for a brighter future.
        </p>

        <div class="hero-buttons">
            <a href="#" class="btn-primary-hero">Enroll Now</a>
            <a href="#" class="btn-secondary-hero">School Tour</a>
        </div>
    </div>
</section>