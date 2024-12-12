<x-layouts.app>
    <section>
        <div class="d-flex align-items-end" style="height: 600px;background: url({{ asset("assets/img/Contact%20Us/contact%20us.jpg") }}) center / cover no-repeat;">
            <div class="container" style="padding-bottom: 64px;">
                <div class="row">
                    <div class="col-md-12">
                        <h1 style="font-family: Campton;color: var(--bs-light);">{{ __("Contact Us") }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section style="margin-top: 200px;margin-bottom: 200px;">
        <section class="position-relative py-4 py-xl-5">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-md-8 col-lg-12 col-xl-6 offset-lg-1 text-center mx-auto">
                        <h1 class="display-5 fw-normal" style="font-family: Campton;color: var(--bs-black);">{{ __("Partner with Us to Transform Education in Indonesia") }}</h1>
                        <p class="fs-5 fw-light w-lg-50 my-5" style="color: #555770;font-family: Campton;margin-top: 0px;margin-bottom: 0px;">{{ __("Your partnership will enable us to reach more students, improve teaching quality, and create a brighter future for generations to come.") }}</p>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-12 col-md-8 col-lg-8 col-xl-7 col-xxl-7 offset-0 offset-xxl-0">
                        <div class="card mb-5">
                            <form action="/contact" method="POST" class="d-flex flex-column px-4 py-4" style="width: auto;">
                                @csrf
                                <div class="py-3"><label class="form-label" style="font-family: Campton;">{{ __("Name") }}<span class="text-danger">*</span></label><input class="form-control" type="text"></div>
                                <div class="d-flex flex-row">
                                    <div class="flex-fill py-3 pe-2"><label class="form-label" style="font-family: Campton;">{{ __("Phone Number") }}<span class="text-danger">*</span></label><input class="form-control" type="tel"></div>
                                    <div class="flex-fill py-3 ps-2"><label class="form-label" style="font-family: Campton;">Email<span class="text-danger">*</span></label><input class="form-control" type="email"></div>
                                </div>
                                <div class="py-3"><label class="form-label" style="font-family: Campton;">{{ __("Your Message") }}<span class="text-danger">*</span></label><textarea class="form-control" style="height: 184px;"></textarea></div>
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                @endif
                                {!! \Anhskohbo\NoCaptcha\Facades\NoCaptcha::renderJs() !!}
                                {!! \Anhskohbo\NoCaptcha\Facades\NoCaptcha::display() !!}
                                <div class="d-flex d-lg-flex justify-content-end justify-content-lg-end mt-4"><button class="btn btn-primary" type="submit" style="width: 120px;">{{ __("Submit") }}</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
</x-layouts.app>
