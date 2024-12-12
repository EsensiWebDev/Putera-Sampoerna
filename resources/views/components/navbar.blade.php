<nav class="navbar navbar-expand-md fixed-top" style="padding-top: 24px;padding-bottom: 24px;" data-bs-theme="dark">
    <div class="container"><a class="navbar-brand" href="{{ route("home", ['locale' => app()->getLocale()])  }}"
                              style="background: url({{ asset("assets/img/Logo/PSF%20Logo.webp") }}) center / contain no-repeat;width: 228px;height: 93.82px;margin-right: 0px;padding-bottom: 0px;padding-top: 0px;"></a>
        <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"
                style="border-style: none;border-radius: 0px;"><span
                class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <div class="ms-auto">
                <ul class="navbar-nav d-md-flex d-lg-flex ms-auto justify-content-md-end justify-content-lg-end">
                    <li class="nav-item" style="font-family: Campton;"><a class="nav-link fw-normal link-body-emphasis"
                                                                          href="{{ route("career", ['locale' => app()->getLocale()]) }}"
                                                                          style="color: var(--bs-white);font-family: Campton;">{{ __("Career") }}</a>
                    </li>
                    <li class="nav-item" style="font-family: Campton;"><a class="nav-link fw-normal link-body-emphasis"
                                                                          href="{{ route("contact-us", ['locale' => app()->getLocale()]) }}"
                                                                          style="color: var(--bs-white);font-family: Campton;">{{ __("Contact us") }}</a></li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item d-flex flex-row align-items-center align-items-lg-center align-items-xxl-center">
                        <a class="nav-link fs-5 link-body-emphasis" href="{{ route("aboutus", ['locale' => app()->getLocale()]) }}"
                           style="font-family: Campton;padding-right: 0px;">{{ __("About Us") }}</a>
                        <div class="nav-item dropdown" style="font-family: Campton;"><a class="fs-5 link-body-emphasis"
                                                                                        aria-expanded="false"
                                                                                        data-bs-toggle="dropdown"
                                                                                        href="aboutus.html"
                                                                                        style="color: var(--bs-white);">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 20 20"
                                     fill="none">

                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M5.29289 7.29289C5.68342 6.90237 6.31658 6.90237 6.70711 7.29289L10 10.5858L13.2929 7.29289C13.6834 6.90237 14.3166 6.90237 14.7071 7.29289C15.0976 7.68342 15.0976 8.31658 14.7071 8.70711L10.7071 12.7071C10.3166 13.0976 9.68342 13.0976 9.29289 12.7071L5.29289 8.70711C4.90237 8.31658 4.90237 7.68342 5.29289 7.29289Z"
                                          fill="currentColor"></path>
                                </svg>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end"
                                 style="padding-left: 8px;padding-right: 8px;border-radius: 0px;"><a
                                    class="dropdown-item fw-light" href="{{ route("aboutus.ourjourney", ['locale' => app()->getLocale()]) }}">{{ __("Our Journey") }}</a>
                                <div class="dropdown-divider"
                                     style="border-width: 1px;border-color: rgb(0,0,0);margin-left: 14px;margin-right: 14px;"></div>
                                <a class="dropdown-item fw-light" href="{{ route("aboutus.boardmember", ['locale' => app()->getLocale()]) }}">{{ __("Board Members") }}</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item d-flex flex-row align-items-center align-items-lg-center align-items-xxl-center">
                        <a class="nav-link fs-5 link-body-emphasis" href="{{ route("ourpillar", ['locale' => app()->getLocale()]) }}"
                           style="font-family: Campton;padding-right: 0px;">{{ __("Our Pillar") }}</a>
                        <div class="nav-item dropdown" style="font-family: Campton;"><a class="fs-5 link-body-emphasis"
                                                                                        aria-expanded="false"
                                                                                        data-bs-toggle="dropdown"
                                                                                        href="academics.html"
                                                                                        style="color: var(--bs-white);">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 20 20"
                                     fill="none">

                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M5.29289 7.29289C5.68342 6.90237 6.31658 6.90237 6.70711 7.29289L10 10.5858L13.2929 7.29289C13.6834 6.90237 14.3166 6.90237 14.7071 7.29289C15.0976 7.68342 15.0976 8.31658 14.7071 8.70711L10.7071 12.7071C10.3166 13.0976 9.68342 13.0976 9.29289 12.7071L5.29289 8.70711C4.90237 8.31658 4.90237 7.68342 5.29289 7.29289Z"
                                          fill="currentColor"></path>
                                </svg>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end"
                                 style="padding-top: 8px;padding-bottom: 8px;padding-left: 8px;padding-right: 8px;border-radius: 0px;">
                                <a class="dropdown-item fw-light" href={{ route("ourpillar.sampoerna-school-system", ['locale' => app()->getLocale()]) }}>{{ __("Sampoerna School System") }}</a>
                                <div class="dropdown-divider"
                                     style="margin: 8px 14px;border-width: 1px;border-color: rgb(0,0,0);"></div>
                                <a class="dropdown-item fw-light" href="{{ route("ourpillar.school-development", ['locale' => app()->getLocale()]) }}">{{ __("School Development Outreach") }}</a>
                                <div class="dropdown-divider"
                                     style="margin: 8px 14px;border-width: 1px;border-color: rgb(0,0,0);"></div>
                                <a class="dropdown-item fw-light" href="{{ route("ourpillar.scholarship", ['locale' => app()->getLocale()]) }}">{{ __("Scholarship") }}</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item d-flex flex-row align-items-center align-items-lg-center align-items-xxl-center">
                        <a class="nav-link fs-5 link-body-emphasis" href="{{ route("partners", ['locale' => app()->getLocale()]) }}"
                           style="font-family: Campton;padding-right: 0px;">{{ __("Partners") }}</a>
                        <div class="nav-item dropdown" style="font-family: Campton;"><a class="fs-5 link-body-emphasis"
                                                                                        aria-expanded="false"
                                                                                        data-bs-toggle="dropdown"
                                                                                        href="#"
                                                                                        style="color: var(--bs-white);">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 20 20"
                                     fill="none" style="color: var(--bs-btn-hover-color);">

                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M5.29289 7.29289C5.68342 6.90237 6.31658 6.90237 6.70711 7.29289L10 10.5858L13.2929 7.29289C13.6834 6.90237 14.3166 6.90237 14.7071 7.29289C15.0976 7.68342 15.0976 8.31658 14.7071 8.70711L10.7071 12.7071C10.3166 13.0976 9.68342 13.0976 9.29289 12.7071L5.29289 8.70711C4.90237 8.31658 4.90237 7.68342 5.29289 7.29289Z"
                                          fill="currentColor"></path>
                                </svg>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end"
                                 style="padding-left: 8px;padding-right: 8px;border-radius: 0px;"><a
                                    class="dropdown-item fw-light" href="{{ route("partners.government-sector", ['locale' => app()->getLocale()]) }}">{{ __("Government Sectors") }}</a>
                                <div class="dropdown-divider"
                                     style="border-width: 1px;border-color: rgb(0,0,0);margin: 8px 14px;"></div>
                                <a class="dropdown-item fw-light" href="{{ route("partners.private-sector", ['locale' => app()->getLocale()]) }}">{{ __("Private Sector") }}</a>
                                <div class="dropdown-divider"
                                     style="border-width: 1px;border-color: rgb(0,0,0);margin: 8px 14px;"></div>
                                <a class="dropdown-item fw-light" href="{{ route("partners.how-to-involve", ['locale' => app()->getLocale()]) }}">{{ __("How to Involve") }}</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item d-flex flex-row align-items-center align-items-lg-center align-items-xxl-center">
                        <a class="nav-link fs-5 link-body-emphasis" href="{{ route("media", ['locale' => app()->getLocale()]) }}"
                           style="font-family: Campton;padding-right: 0px;">{{ __("Media") }}</a>
                        <div class="nav-item dropdown" style="font-family: Campton;"><a class="fs-5 link-body-emphasis"
                                                                                        aria-expanded="false"
                                                                                        data-bs-toggle="dropdown"
                                                                                        href="#"
                                                                                        style="color: var(--bs-white);">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 20 20"
                                     fill="none" style="color: #fff;">

                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M5.29289 7.29289C5.68342 6.90237 6.31658 6.90237 6.70711 7.29289L10 10.5858L13.2929 7.29289C13.6834 6.90237 14.3166 6.90237 14.7071 7.29289C15.0976 7.68342 15.0976 8.31658 14.7071 8.70711L10.7071 12.7071C10.3166 13.0976 9.68342 13.0976 9.29289 12.7071L5.29289 8.70711C4.90237 8.31658 4.90237 7.68342 5.29289 7.29289Z"
                                          fill="currentColor"></path>
                                </svg>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end"
                                 style="padding-left: 8px;padding-right: 8px;border-radius: 0px;"><a
                                    class="dropdown-item fw-light" href="{{ route("media.news", ['locale' => app()->getLocale()]) }}">{{ __("Latest News") }}</a>
                                <div class="dropdown-divider"
                                     style="margin: 8px 14px;border-width: 1px;border-color: rgb(0,0,0);"></div>
                                <a class="dropdown-item fw-light" href="{{ route("media.annual-reports", ['locale' => app()->getLocale()]) }}">{{ __("Annual Reports") }}</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item" style="font-family: Campton;"><a class="nav-link fs-5 link-body-emphasis"
                                                                          href="/donatenow.html"
                                                                          style="color: var(--bs-white);">{{ __("Donate Now") }}</a>
                    </li>
                </ul>
            </div>
            <div class="ms-auto">
                <ul class="navbar-nav d-md-flex d-lg-flex ms-auto justify-content-md-end justify-content-lg-end">
                    <li class="nav-item dropdown" style="font-family: Campton;">
                        <a class="nav-link fw-normal link-body-emphasis dropdown-toggle"
                           href="#"
                           id="languageDropdown"
                           role="button"
                           data-bs-toggle="dropdown"
                           aria-expanded="false"
                           style="color: var(--bs-white);font-family: Campton;">
                            @php
                                $currentLocale = app()->getLocale();
                                $flagImage = $currentLocale == 'id' ? 'emojione_flag-for-indonesia.webp' : 'circle-flags_us.webp';
                                $languageText = $currentLocale == 'id' ? 'Bahasa Indonesia' : 'English';
                            @endphp
                            <img src="{{ asset("assets/img/Icon/$flagImage") }}" width="26" height="20"
                                 style="width: 20px;">&nbsp;{{ $languageText }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                            <li>
                                <a class="dropdown-item" href="/language/en">
                                    <img src="{{ asset("assets/img/Icon/circle-flags_us.webp") }}" width="26"
                                         height="20" alt="Bender inggriss" style="width: 20px;">&nbsp;English
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/language/id">
                                    <img src="{{ asset("assets/img/Icon/emojione_flag-for-indonesia.webp") }}"
                                         alt="Bendera indonesia" style="width: 20px;">&nbsp;Bahasa
                                    Indonesia
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
