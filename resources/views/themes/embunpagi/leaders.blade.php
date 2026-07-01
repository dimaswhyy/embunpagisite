@extends('layout')

@section('content')
<style>
/* Animasi */
.filter-btn {
    transition: all .3s ease;
    cursor: pointer;
}

/* Tombol aktif */
.filter-btn.active {
    background: linear-gradient(to right, #118bcc 0%, #b3d334 100%);
    color: #fff;
    border: none;
}

/* Hover saat tombol aktif */
.filter-btn.active:hover {
    background: linear-gradient(to right, #0f7db6 0%, #9fbc2b 100%);
}

/* Tombol tidak aktif */
.filter-btn:not(.active) {
    background: transparent;
    color: #118bcc;
    border: 2px solid #86ccf1;
}

/* Hover tombol tidak aktif */
.filter-btn:not(.active):hover {
    background: rgba(17, 139, 204, 0.08);
    color: #0f7db6;
}

/* ===== Leaders Grid ===== */

.leaders-grid {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 2rem;
    width: 100%;
    position:relative;
    overflow:hidden;
}

/* Gradient yang menyapu */
.leaders-grid::before{

    content:"";

    position:absolute;

    inset:0;

    width:35%;

    background:linear-gradient(
        90deg,
        rgba(17,139,204,0),
        rgba(17,139,204,.18),
        rgba(179,211,52,.25),
        rgba(255,255,255,.95),
        rgba(255,255,255,0)
    );

    filter:blur(30px);

    transform:translateX(-180%);

    z-index:20;

    pointer-events:none;
}


.leader-card {
    text-align: center;
    transition: 
        opacity .45s ease,
        transform .35s ease,
        box-shadow .35s ease,
        filter .45s ease;
}

.leader-card.hide{
    opacity:0;
    transform:
        scale(.94)
        translateY(12px);
    filter:blur(6px);
}

.leader-card.show{
    opacity:1;
    transform:scale(1);
    filter:blur(0);
}

.leader-card:hover{
    transform:translateY(-8px);
}

.leader-card:hover .leader-image{

    transform:scale(1.06);

}

.leader-image {
    width: 150px;
    height: 150px;
    margin: 0 auto 1rem;
    border-radius: 50%;
    overflow: hidden;
    transition:transform .4s ease;
}

.leader-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

/* Tablet */
@media (max-width:1024px) {
    .leaders-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

/* Mobile */
@media (max-width:640px) {
    .leaders-grid {
        grid-template-columns: 2fr;
    }
}
</style>

<section class="my-10">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10 space-y-4">
        <!-- Banner Utama -->
        <div class="rounded-3xl w-full h-96 overflow-hidden relative shadow-lg">
            <img class="w-full h-full object-cover" src="{{ asset('storage') }}/WEBSITE%20FOTO%20SLIDE%20(2).png"
                alt="WEBSITE%20FOTO%20SLIDE%20(2).png" />
            <div
                class="absolute top-0 left-0 w-full h-full p-10 text-white flex justify-center items-end text-3xl font-bold bg-gradient-blue-transparent">
                Leaders</div>
        </div>

        <!-- Submenu Navigasi -->
        <div class="bg-white rounded-2xl shadow-md border border-gray-100 w-full overflow-hidden">
            <!-- Menggunakan flex-wrap agar aman dan rapi saat dibuka di mobile -->
            <div
                class="flex flex-wrap justify-center items-center gap-x-2 md:gap-x-6 text-sm font-semibold text-gray-500 py-1">

                <!-- Kondisi AKTIF (Misal saat ini di halaman Our History) -->
                <!-- Menggunakan border-b-4 hijau dan teks biru gelap agar kontras -->
                <a href="{{ route('page_front', 'our-history') }}"
                    class="text-sm font-semibold hover:text-blue p-2 px-5 block whitespace-nowrap @if($lastSegment == 'our-history') text-blue @endif">
                    Our History
                </a>

                <!-- Kondisi HOVER (Halaman Biasa) -->
                <!-- hover:text-blue-600 -> Teks berubah biru -->
                <!-- hover:border-b-4 hover:border-green-400 -> Garis hijau muncul saat di-hover -->
                <a href="{{ route('page_front', 'vision-mission') }}"
                    class="text-sm font-semibold hover:text-blue p-2 px-5 block whitespace-nowrap @if($lastSegment == 'vision-mission') text-blue @endif">
                    Vision & Mission
                </a>

                <a href="{{ route('page_front', 'leaders') }}"
                    class="text-sm font-semibold hover:text-blue p-2 px-5 block whitespace-nowrap @if($lastSegment == 'leaders') text-blue @endif">
                    Leaders
                </a>

                <a href="{{ route('page_front', 'alumni') }}"
                    class="text-sm font-semibold hover:text-blue p-2 px-5 block whitespace-nowrap @if($lastSegment == 'alumni') text-blue @endif">
                    Alumni
                </a>

                <a href="{{ route('page_front', 'career') }}"
                    class="text-sm font-semibold hover:text-blue p-2 px-5 block whitespace-nowrap @if($lastSegment == 'career') text-blue @endif">
                    Career
                </a>

            </div>
        </div>

    </div>
</section>

<section class="bg-gradient-ivory py-20 relative overflow-hidden">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Judul Section -->
        <h2 class="text-blue text-4xl font-bold mb-6">Leaders</h2>

        <!-- Deskripsi -->
        <p class="text-gray-700 mb-10 max-w-4xl leading-relaxed">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
            ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
            nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
            anim id est laborum.
        </p>

        <!-- Tab Buttons -->
        <div class="flex gap-4 mb-12">
            <button
                class="btn-primary hover:bg-green-600 text-white font-semibold py-3 px-8 rounded-full transition-colors filter-btn active" data-filter="yayasan">
                Yayasan Multi Vorinta & Board of Directors
            </button>
            <button
                class="btn-secondary hover:bg-blue-600 text-blue font-semibold py-3 px-8 rounded-full transition-colors filter-btn" data-filter="sekolah">
                School Leaders
            </button>
        </div>

        <!-- Grid Leaders -->
        <div class="leaders-grid">

        <!-- Yayasan -->
        <!-- Leader Card 1 -->
            <div class="leader-card" data-category="yayasan">
                <div class="mb-4 overflow-hidden rounded-full mx-auto w-36 h-36 leader-image">
                    <img class="w-full h-full object-cover" src="{{ asset('storage') }}/leader-1.jpg"
                        alt="Mr. Tata Eka Putra, B.Bus." />
                </div>
                <h3 class="text-blue text-lg font-semibold mb-2">Mr. Tata Eka Putra, B.Bus.</h3>
                <p class="text-gray-600 text-sm">School Director</p>
            </div>
    
            <!-- Leader Card 2 -->
            <div class="leader-card" data-category="yayasan">
                <div class="mb-4 overflow-hidden rounded-full mx-auto w-36 h-36 leader-image">
                    <img class="w-full h-full object-cover" src="{{ asset('storage') }}/leader-2.jpg"
                        alt="Ms. Ririn Samarindawani" />
                </div>
                <h3 class="text-blue text-lg font-semibold mb-2">Ms. Ririn Samarindawani</h3>
                <p class="text-gray-600 text-sm">Foundation Secretary</p>
            </div>

            <!-- Leader Card 3 -->
            <div class="leader-card" data-category="yayasan">
                <div class="mb-4 overflow-hidden rounded-full mx-auto w-36 h-36 leader-image">
                    <img class="w-full h-full object-cover" src="{{ asset('storage') }}/leader-3.jpg"
                        alt="Ms. Ivo Fauziah, S.Kom" />
                </div>
                <h3 class="text-blue text-lg font-semibold mb-2">Ms. Ivo Fauziah, S.Kom</h3>
                <p class="text-gray-600 text-sm">Foundation Treasurer</p>
            </div>

            <!-- Leader Card 4 -->
            <div class="leader-card" data-category="yayasan">
                <div class="mb-4 overflow-hidden rounded-full mx-auto w-36 h-36 leader-image">
                    <img class="w-full h-full object-cover" src="{{ asset('storage') }}/leader-4.jpg" alt="Ms. Shabrina Tania Ekaputri, B.Bus." />
                </div>
                <h3 class="text-blue text-lg font-semibold mb-2">Ms. Shabrina Tania Ekaputri, B.Bus.</h3>
                <p class="text-gray-600 text-sm">Foundation Executive</p>
            </div>

            <!-- Leader Card 5 -->
            <div class="leader-card" data-category="yayasan">
                <div class="mb-4 overflow-hidden rounded-full mx-auto w-36 h-36 leader-image">
                    <img class="w-full h-full object-cover" src="{{ asset('storage') }}/leader-4.jpg" alt="Ms. Nova Indriyani" />
                </div>
                <h3 class="text-blue text-lg font-semibold mb-2">Ms. Nova Indriyani</h3>
                <p class="text-gray-600 text-sm">Academic Manager</p>
            </div>

            <!-- Leader Card 6 -->
            <div class="leader-card" data-category="yayasan">
                <div class="mb-4 overflow-hidden rounded-full mx-auto w-36 h-36 leader-image">
                    <img class="w-full h-full object-cover" src="{{ asset('storage') }}/leader-4.jpg" alt="Mr. Supriyanto" />
                </div>
                <h3 class="text-blue text-lg font-semibold mb-2">Mr. Supriyanto</h3>
                <p class="text-gray-600 text-sm">General Manager</p>
            </div>

            <!-- Sekolah -->
            <!-- Leader Card 8 -->
            <div class="leader-card" data-category="sekolah">
                <div class="mb-4 overflow-hidden rounded-full mx-auto w-36 h-36 leader-image">
                    <img class="w-full h-full object-cover" src="{{ asset('storage') }}/leader-5.jpg" alt="Ms. Nurul R. Septina, S.Si., M.Pd." />
                </div>
                <h3 class="text-blue text-lg font-semibold mb-2">Ms. Nurul R. Septina, S.Si., M.Pd.</h3>
                <p class="text-gray-600 text-sm">Upper Level Quality Assurance</p>
            </div>

            <!-- Leader Card 9 -->
            <div class="leader-card" data-category="sekolah">
                <div class="mb-4 overflow-hidden rounded-full mx-auto w-36 h-36 leader-image">
                    <img class="w-full h-full object-cover" src="{{ asset('storage') }}/leader-6.jpg"
                        alt="Ms. Sri Lestariningsih" />
                </div>
                <h3 class="text-blue text-lg font-semibold mb-2">Ms. Sri Lestariningsih</h3>
                <p class="text-gray-600 text-sm">Lower Level Quality Assurance</p>
            </div>

            <!-- Leader Card 10 -->
            <div class="leader-card" data-category="sekolah">
                <div class="mb-4 overflow-hidden rounded-full mx-auto w-36 h-36 leader-image">
                    <img class="w-full h-full object-cover" src="{{ asset('storage') }}/leader-6.jpg"
                        alt="Mr. Yargustiwan" />
                </div>
                <h3 class="text-blue text-lg font-semibold mb-2">Mr. Yargustiwan</h3>
                <p class="text-gray-600 text-sm">Cambridge and English Quality Assurance</p>
            </div>

            <!-- Leader Card 11 -->
            <div class="leader-card" data-category="sekolah">
                <div class="mb-4 overflow-hidden rounded-full mx-auto w-36 h-36 leader-image">
                    <img class="w-full h-full object-cover" src="{{ asset('storage') }}/leader-6.jpg"
                        alt="Mr. Rizko" />
                </div>
                <h3 class="text-blue text-lg font-semibold mb-2">Mr. Rizko</h3>
                <p class="text-gray-600 text-sm">EPIS Senior High Principal</p>
            </div>

            <!-- Leader Card 12 -->
            <div class="leader-card" data-category="sekolah">
                <div class="mb-4 overflow-hidden rounded-full mx-auto w-36 h-36 leader-image">
                    <img class="w-full h-full object-cover" src="{{ asset('storage') }}/leader-6.jpg"
                        alt="Mr. Syahrul Aripin, S.Pd.I., M.Pd." />
                </div>
                <h3 class="text-blue text-lg font-semibold mb-2">Mr. Syahrul Aripin, S.Pd.I., M.Pd.</h3>
                <p class="text-gray-600 text-sm">EPIS Junior High Principal</p>
            </div>

            <!-- Leader Card 13 -->
            <div class="leader-card" data-category="sekolah">
                <div class="mb-4 overflow-hidden rounded-full mx-auto w-36 h-36 leader-image">
                    <img class="w-full h-full object-cover" src="{{ asset('storage') }}/leader-6.jpg"
                        alt="Ms. Diana" />
                </div>
                <h3 class="text-blue text-lg font-semibold mb-2">Ms. Diana</h3>
                <p class="text-gray-600 text-sm">EPIS Primary Principal</p>
            </div>

            <!-- Leader Card 14 -->
            <div class="leader-card" data-category="sekolah">
                <div class="mb-4 overflow-hidden rounded-full mx-auto w-36 h-36 leader-image">
                    <img class="w-full h-full object-cover" src="{{ asset('storage') }}/leader-6.jpg"
                        alt="Mr. Ihsan" />
                </div>
                <h3 class="text-blue text-lg font-semibold mb-2">Mr. Ihsan</h3>
                <p class="text-gray-600 text-sm">EPIS Kindergarten Principal</p>
            </div>
        </div>
    </div>

    <img src="{{ asset('img/sun-vector.svg') }}" class="absolute -bottom-16 -left-32 w-72 hidden md:block">
</section>




<script>
// Animasi Filter Data
document.addEventListener("DOMContentLoaded",()=>{

    const buttons=document.querySelectorAll(".filter-btn");
    const cards=document.querySelectorAll(".leader-card");
    const grid=document.querySelector(".leaders-grid");

    function filterCards(category){

        // mulai animasi cahaya
        grid.classList.add("animate");

        // card lama menghilang
        cards.forEach(card=>{

            card.classList.add("hide");
            card.classList.remove("show");

        });

        // setelah cahaya mulai lewat
        setTimeout(()=>{

            cards.forEach(card=>{

                if(card.dataset.category===category){

                    card.style.display="block";

                }else{

                    card.style.display="none";

                }

            });

        },250);

        // munculkan card baru
        setTimeout(()=>{

            cards.forEach(card=>{

                if(card.dataset.category===category){

                    card.classList.remove("hide");
                    card.classList.add("show");

                }

            });

        },350);

        // reset animasi
        setTimeout(()=>{

            grid.classList.remove("animate");

        },900);

    }

    filterCards("yayasan");

    buttons.forEach(button=>{

        button.addEventListener("click",function(){

            buttons.forEach(btn=>btn.classList.remove("active"));

            this.classList.add("active");

            filterCards(this.dataset.filter);

        });

    });

});

// Filter Data
document.addEventListener("DOMContentLoaded", function() {

    const buttons = document.querySelectorAll(".filter-btn");
    const cards = document.querySelectorAll(".leader-card");

    // fungsi filter
    function showCategory(category) {

        cards.forEach(card => {

            if (card.dataset.category === category) {
                card.style.display = "block";
            } else {
                card.style.display = "none";
            }

        });

    }

    // default
    showCategory("yayasan");

    buttons.forEach(button => {

        button.addEventListener("click", function() {

            // reset semua button
            buttons.forEach(btn => {
                btn.classList.remove("active");
            });

            // button aktif
            this.classList.add("active");

            // tampilkan data
            showCategory(this.dataset.filter);

        });

    });

});
</script>
@stop