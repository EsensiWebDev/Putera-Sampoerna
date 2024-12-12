<section style="margin-bottom: 200px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-lg-flex justify-content-lg-center">
                <div>
                    <ul class="nav nav-tabs" role="tablist" style="border-style: none;">
                        <li class="nav-item" role="presentation"><a class="nav-link active fs-3" role="tab" data-bs-toggle="tab" href="#tab-1" style="border-style: none;border-radius: 0px;font-family: Campton;">{{ __("Vision") }}</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link fs-3" role="tab" data -bs-toggle="tab" href="#tab-2" style="border-style: none;border-radius: 0px;font-family: Campton;">{{ __("Mission") }}</a></li>
                    </ul>
                    <div class="tab-content"></div>
                </div>
            </div>
        </div>
        <div class="row" style="background: #F2F2F5;border-radius: 12px;">
            <div class="col-md-6 d-xxl-flex justify-content-xxl-center align-items-xxl-center px-5">
                <div>
                    <ul class="nav nav-tabs" role="tablist" style="border-style: none;">
                        <li class="nav-item" role="presentation"><a class="nav-link active" role="tab" data-bs-toggle="tab" href="#tab-1" style="border-style: none;border-radius: 0px;color: transparent;background: transparent;">Tab 1</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-bs-toggle="tab" href="#tab-2" style="border-style: none;border-radius: 0px;color: transparent;background: transparent;">Tab 2</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" role="tabpanel" id="tab-1">
                            <h1 class="fs-3" style="font-family: Campton;color: #191C48;">{{ __("Vision") }}</h1>
                            <div class="d-flex flex-row align-items-lg-start py-2">
                                <p class="fs-6 fw-light" style="font-family: Campton;color: #191C48;margin-bottom: 0px;">{{ __("To produce high caliber future leaders for Indonesia to meet the challenges of global competition.") }}</p>
                            </div>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="tab-2">
                            <h1 class="fs-3" style="font-family: Campton;color: #191C48;">{{ __("Mission") }}</h1>
                            <div class="d-flex flex-row align-items-lg-start py-2"><span><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-dot">
                                            <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3"></path>
                                        </svg></span>
                                <p class="fs-6 fw-light" style="font-family: Campton;color: #191C48;margin-bottom: 0px;">{{ __("To develop an international education pathway that supports our future leaders to become work-ready and world-ready in facing the global market competition") }}</p>
                            </div>
                            <div class="d-flex flex-row align-items-lg-start py-2"><span><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-dot">
                                            <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3"></path>
                                        </svg></span>
                                <p class="fs-6 fw-light" style="font-family: Campton;color: #191C48;margin-bottom: 0px;">{{ __("To establish an integrated school system that is financially sustainable and scalable") }}</p>
                            </div>
                            <div class="d-flex flex-row align-items-lg-start py-2"><span><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-dot">
                                            <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3"></path>
                                        </svg></span>
                                <p class="fs-6 fw-light" style="font-family: Campton;color: #191C48;margin-bottom: 0px;">{{ __("To become a role model for other social business organization in Indonesia") }}</p>
                            </div>
                            <div class="d-flex flex-row align-items-lg-start py-2"><span><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-dot">
                                            <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3"></path>
                                        </svg></span>
                                <p class="fs-6 fw-light" style="font-family: Campton;color: #191C48;margin-bottom: 0px;">{{ __("To be professional, compassionate, transparent and to constantly strive for excellence") }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-xxl-flex justify-content-xxl-end align-items-xxl-end px-0"><img class="img-fluid" src="{{ asset("assets/img/About%20Us/about%20us%20kids.webp") }}" style="border-bottom-right-radius: 12px;" alt="Tabs image" width="660px" height="548px"></div>
        </div>
        <div class="row" style="margin-top: 24px;margin-bottom: 24px;">
            <div class="col-md-12 d-flex d-sm-flex d-md-flex d-lg-flex justify-content-center justify-content-sm-center justify-content-md-center justify-content-lg-center">
                <div><a class="btn btn-primary" role="button" style="font-family: Campton;color: var(--bs-btn-color);padding-top: 14px;padding-bottom: 14px;padding-left: 24px;padding-right: 24px;" href="{{ route("aboutus.boardmember", ['locale' => app()->getLocale()]) }}">{{ __("Our Visionary Leaders") }}&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 20 20" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.2929 5.29289C12.6834 4.90237 13.3166 4.90237 13.7071 5.29289L17.7071 9.29289C18.0976 9.68342 18.0976 10.3166 17.7071 10.7071L13.7071 14.7071C13.3166 15.0976 12.6834 15.0976 12.2929 14.7071C11.9024 14.3166 11.9024 13.6834 12.2929 13.2929L14.5858 11H3C2.44772 11 2 10.5523 2 10C2 9.44772 2.44772 9 3 9H14.5858L12.2929 6.70711C11.9024 6.31658 11.9024 5.68342 12.2929 5.29289Z" fill="currentColor"></path>
                        </svg></a></div>
            </div>
        </div>
    </div>
</section>
