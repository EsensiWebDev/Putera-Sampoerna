<section style="margin-top: 200px;">
    <div class="container" style="margin-bottom: 50px;">
        <div class="row">
            <div class="col-md-12">
                <h1 class="fs-2 fw-semibold text-center" style="font-family: Campton;color: var(--bs-emphasis-color);">{{ __("Partnerships") }}</h1>
            </div>
        </div>
    </div><div class="marquee-container">
        <div class="marquee">
            <div class="marquee-content">
                <img src="{{ asset("assets/img/Marquee/marquee%20image%201.webp") }}" alt="marquee image 1" class="brand-logo">
                <img src="{{ asset("assets/img/Marquee/marquee%20image%202.webp") }}" alt="marquee image 2" class="brand-logo">
                <img src="{{ asset("assets/img/Marquee/marquee%20image%203.webp") }}" alt="marquee image 3" class="brand-logo">
                <img src="{{ asset("assets/img/Marquee/marquee%20image%204.webp") }}" alt="marquee image 4" class="brand-logo">
                <img src="{{ asset("assets/img/Marquee/marquee%20image%205.webp") }}" alt="marquee image 5" class="brand-logo">
                <img src="{{ asset("assets/img/Marquee/marquee%20image%206.webp") }}" alt="marquee image 6" class="brand-logo">
                <img src="{{ asset("assets/img/Marquee/marquee%20image%207.webp") }}" alt="marquee image 7" class="brand-logo">
                <img src="{{ asset("assets/img/Marquee/marquee%20image%208.webp") }}" alt="marquee image 8" class="brand-logo">
                <img src="{{ asset("assets/img/Marquee/marquee%20image%209.webp") }}" alt="marquee image 9" class="brand-logo">
                <img src="{{ asset("assets/img/Marquee/marquee%20image%2010.webp") }}" alt="marquee image 10" class="brand-logo">
                <img src="{{ asset("assets/img/Marquee/marquee%20image%2011.webp") }}" alt="marquee image 11" class="brand-logo">
                <img src="{{ asset("assets/img/Marquee/marquee%20image%2012.webp") }}" alt="marquee image 12" class="brand-logo">
                <img src="{{ asset("assets/img/Marquee/marquee%20image%2013.webp") }}" alt="marquee image 13" class="brand-logo">
                <img src="{{ asset("assets/img/Marquee/marquee%20image%2014.webp") }}" alt="marquee image 14" class="brand-logo">
                <img src="{{ asset("assets/img/Marquee/marquee%20image%2015.webp") }}" alt="marquee image 15" class="brand-logo">
                <img src="{{ asset("assets/img/Marquee/marquee%20image%2016.webp") }}" alt="marquee image 16" class="brand-logo">
                <img src="{{ asset("assets/img/Marquee/marquee%20image%2017.webp") }}" alt="marquee image 17" class="brand-logo">
                <img src="{{ asset("assets/img/Marquee/marquee%20image%2018.webp") }}" alt="marquee image 18" class="brand-logo">
                <img src="{{ asset("assets/img/Marquee/marquee%20image%2019.webp") }}" alt="marquee image 19" class="brand-logo">
                <img src="{{ asset("assets/img/Marquee/marquee%20image%2020.webp") }}" alt="marquee image 20" class="brand-logo">
            </div>
        </div>
    </div>

    <style>
        .marquee-container {
            overflow: hidden;
            width: 100%;
            background-color: transparent;
            padding: 10px 0;
        }

        .marquee {
            display: flex;
            width: calc(200% + 20px); /* Memastikan elemen marquee menyesuaikan dengan kontennya */
            animation: marquee 40s linear infinite;
        }

        .marquee-content {
            display: flex;
        }

        .brand-logo {
            height: 76px; /* Atur tinggi logo sesuai kebutuhan */
            margin-right: 56px; /* Jarak antar logo */
            object-fit: contain; /* Memastikan lebar proporsional */
        }

        @keyframes marquee {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(-50%);
            }
        }
    </style>
</section>
