<section>
    <section class="py-4 py-xl-5"
             style="background: url({{ asset("assets/img/Homepage/PSF%20Homepage%20Hero%20Image.webp") }}) center / cover no-repeat;max-height: 1089px;min-height: 515px;height: 800px;">
        <div class="container h-100">
            <div class="row h-100">
                <div
                    class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 text-center d-flex d-sm-flex d-md-flex justify-content-center align-items-end mx-auto justify-content-md-start align-items-md-center align-items-lg-end justify-content-xl-center"
                    style="padding-top: 100px;padding-bottom: 100px;">
                    <div>
                        <h1 class="display-4 text-uppercase fw-semibold text-light mb-3" style="font-family: Campton;">
                            {{ __("EDUCATION IS A FUNDAMENTAL RIGHT") }} <br>{{ __("FOR EVERY PERSON") }}</h1>
                        <p class="fs-4 fw-normal text-light mb-4" style="font-family: Campton;">{{ __("Be part of our mission to make it a reality for all.") }}</p><a
                            class="btn btn-primary fs-5 fw-light py-2 px-4 me-lg-3 me-3" role="button"
                            style="font-family: Campton;height: 48px;" href="{{ route("contact-us", ['locale' => app()->getLocale()]) }}">{{ __("Get Involved") }}&nbsp;<svg
                                xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 20 20"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M12.2929 5.29289C12.6834 4.90237 13.3166 4.90237 13.7071 5.29289L17.7071 9.29289C18.0976 9.68342 18.0976 10.3166 17.7071 10.7071L13.7071 14.7071C13.3166 15.0976 12.6834 15.0976 12.2929 14.7071C11.9024 14.3166 11.9024 13.6834 12.2929 13.2929L14.5858 11H3C2.44772 11 2 10.5523 2 10C2 9.44772 2.44772 9 3 9H14.5858L12.2929 6.70711C11.9024 6.31658 11.9024 5.68342 12.2929 5.29289Z"
                                      fill="currentColor"></path>
                            </svg>
                        </a><a class="btn btn-outline-light fs-5 fw-light py-2 px-4" role="button"
                               style="font-family: Campton;" href="{{ route("aboutus", ['locale' => app()->getLocale()]) }}">{{ __("Learn More") }}&nbsp;<svg
                                xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 20 20"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M12.2929 5.29289C12.6834 4.90237 13.3166 4.90237 13.7071 5.29289L17.7071 9.29289C18.0976 9.68342 18.0976 10.3166 17.7071 10.7071L13.7071 14.7071C13.3166 15.0976 12.6834 15.0976 12.2929 14.7071C11.9024 14.3166 11.9024 13.6834 12.2929 13.2929L14.5858 11H3C2.44772 11 2 10.5523 2 10C2 9.44772 2.44772 9 3 9H14.5858L12.2929 6.70711C11.9024 6.31658 11.9024 5.68342 12.2929 5.29289Z"
                                      fill="currentColor"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
