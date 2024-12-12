<section style="margin-top: 200px; margin-bottom: 200px;">
    @section("style")
        <link rel="stylesheet" href="{{ asset("assets/slick-1.8.1/slick/slick.css") }}">
        <link rel="stylesheet" href="{{ asset("assets/slick-1.8.1/slick/slick-theme.css") }}">
    @endsection

    <div class="container">
        <div class="row mb-4">
            <div class="col-md-12">
                <h1 style="font-family: Campton; color: var(--bs-black); text-align: center;">{{ __("Core Educational Programs") }}</h1>
            </div>
        </div>
        <div class="row slider">
            <div class="col-md-4 slider-item">
                <div class="card" style="border-style: none; border-radius: 12px;">
                    <img class="img-fluid card-img-top w-100 d-block" src="{{ asset('assets/img/About%20Us/sampoerna%20schools%20system.webp') }}" style="border-top-left-radius: 12px; border-top-right-radius: 12px;" width="416px" height="268px" alt="SSC">
                    <div class="card-body" style="border-style: none;">
                        <h4 class="card-title" style="font-family: Campton; color: #1C1C28;">{{ __("Sampoerna Schools System") }}</h4>
                        <p class="fs-5 fw-light card-text" style="font-family: Campton; color: #1C1C28;">{{ __("Sampoerna Schools System was established by Putera Sampoerna Foundation to provide world-class education to the Indonesian youths.") }}</p>
                        <a class="fs-5 card-link" href="{{ route("ourpillar.sampoerna-school-system", ['locale' => app()->getLocale()]) }}" style="color: #292F78; font-family: Campton;">{{ __("Read More") }}&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 20 20" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.2929 5.29289C12.6834 4.90237 13.3166 4.90237 13.7071 5.29289L17.7071 9.29289C18.0976 9.68342 18.0976 10.3166 17.7071 10.7071L13.7071 14.7071C13.3166 15.0976 12.6834 15.0976 12.2929 14.7071C11.9024 14.3166 11.9024 13.6834 12.2929 13.2929L14.5858 11H3C2.44772 11 2 10.5523 2 10C2 9.44772 2.44772 9 3 9H14.5858L12.2929 6.70711C11.9024 6.31658 11.9024 5.68342 12.2929 5.29289Z" fill="currentColor"></path>
                            </svg></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 slider-item">
                <div class="card" style="border-style: none; border-radius: 12px;">
                    <img class="img-fluid card-img-top w-100 d-block" src="{{ asset('assets/img/About%20Us/school%20outreach.webp') }}" style="border-top-left-radius: 12px; border-top-right-radius: 12px;" alt="SDO" width="416px" height="268px">
                    <div class="card-body" style="border-style: none;">
                        <h4 class="card-title" style="font-family: Campton; color: #1C1C28;">{{ __("School Development Outreach") }}</h4>
                        <p class="fs-5 fw-light card-text" style="font-family: Campton; color: #1C1C28;">{{ __("School Development Outreach is an educational service provider that offers comprehensive programs to build global competition.") }}</p>
                        <a class="fs-5 card-link" href="{{ route("ourpillar.school-development", ['locale' => app()->getLocale()]) }}" style="color: #292F78; font-family: Campton;">Read More&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 20 20" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.2929 5.29289C12.6834 4.90237 13.3166 4.90237 13.7071 5.29289L17.7071 9.29289C18.0976 9.68342 18.0976 10.3166 17.7071 10.7071L13.7071 14.7071C13.3166 15.0976 12.6834 15.0976 12.2929 14.7071C11.9024 14.3166 11.9024 13.6834 12.2929 13.2929L14.5858 11H3C2.44772 11 2 10.5523 2 10C2 9.44772 2.44772 9 3 9H14.5858L12.2929 6.70711C11.9024 6.31658 11.9024 5.68342 12.2929 5.29289Z" fill="currentColor"></path>
                            </svg></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 slider-item">
                <div class="card" style="border-style: none; border-radius: 12px;">
                    <img class="img-fluid card-img-top w-100 d-block" src="{{ asset('assets/img/About%20Us/scholarship%20(1).webp') }}" style="border-top-left-radius: 12px; border-top-right-radius: 12px;" width="416px" height="268px" alt="scholarship">
                    <div class="card-body" style="border-style: none;">
                        <h4 class="card-title" style="font-family: Campton; color: #1C1C28;">{{ __("Scholarship") }}</h4>
                        <p class="fs-5 fw-light card-text" style="font-family: Campton; color: #1C1C28;">{{ __("Education Scholarships are a key initiative of the Putera Sampoerna Foundation. We firmly believe that this scholarship program stands as a crucial milestone in shaping high-caliber prospective leaders for Indonesia.") }}</p>
                        <a class="fs-5 card-link" href="{{ route("ourpillar.scholarship", ['locale' => app()->getLocale()]) }}" style="color: #292F78; font-family: Campton;">{{ __("Read More") }}&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 20 20" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.2929 5.29289C12.6834 4.90237 13.3166 4.90237 13.7071 5.29289L17.7071 9.29289C18.0976 9.68342 18.0976 10.3166 17.7071 10.7071L13.7071 14.7071C13.3166 15.0976 12.6834 15.0976 12.2929 14.7071C11.9024 14.3166 11.9024 13.6834 12.2929 13.2929L14.5858 11H3C2.44772 11 2 10.5523 2 10C2 9.44772 2.44772 9 3 9H14.5858L12.2929 6.70711C11.9024 6.31658 11.9024 5.68342 12.2929 5.29289Z" fill="currentColor"></path>
                            </svg></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section("script")
        <script>
            $(document).ready(function() {
                function initializeSlider() {
                    if ($(window).width() < 768) {
                        if (!$('.slider').hasClass('slick-initialized')) {
                            $('.slider').slick({
                                dots: false,
                                infinite: false,
                                speed: 300,
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                variableWidth: true

                            });
                        }

                        $(".slider-item").width("270px");
                        $(".slider-item").css("margin-right", "18px");
                    } else {
                        if ($('.slider').hasClass('slick-initialized')) {
                            $('.slider').slick('unslick'); // Destroy the slider if it was initialized
                        }
                    }
                }

                initializeSlider(); // Initialize on page load

                $(window).resize(function() {
                    initializeSlider(); // Re-initialize on window resize
                });
            });
        </script>

            <script src="{{ asset("assets/slick-1.8.1/slick/slick.min.js") }}"></script>
    @endsection
</section>
