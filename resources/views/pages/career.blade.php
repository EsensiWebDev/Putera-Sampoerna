<x-layouts.app>
    <section>
        <div class="d-flex align-items-end" style="height: 600px;background: url({{ asset("assets/img/Career/Career.webp") }}) center / cover no-repeat;">
            <div class="container" style="padding-bottom: 64px;">
                <div class="row">
                    <div class="col-md-12">
                        <h1 style="font-family: Campton;color: var(--bs-light);">{{ __("Career") }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section style="margin-top: 200px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <h1 class="display-5 fw-semibold" style="font-family: Campton;color: var(--bs-black);">{{ __("Join with us!") }}</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div style="padding-top: 26px;padding-bottom: 16px;">
                        <p class="fs-5 fw-light" style="margin-bottom: -1px;font-family: Campton;color: var(--bs-black);">{{ __("Be part of a diverse global community, working towards our vision that everyone should have a chance.") }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include("components.contact-us")
</x-layouts.app>
