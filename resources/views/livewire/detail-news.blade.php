<section id="news" style="{{ is_null($article) ? 'background-color: #2b3035' : '' }}">
    @if (is_null($article))
        <div style="color: white;display: flex; justify-content: center; align-items: center; height: 100vh;">
            <h1>{{ __('Article Not Found') }}</h1>
        </div>
    @else
        <section>
            <div class="d-flex align-items-end"
                style="height: 600px;
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0.7) 0%, rgba(0, 0, 0, 0) 100%),
        url('{{ str_contains($article->thumbnail, '/uploads') ? asset($article->thumbnail) : asset('storage/' . $article->thumbnail) }}') center / cover no-repeat,
        linear-gradient(to top, rgba(0, 0, 0, 0.7) 0%, rgba(0, 0, 0, 0) 100%);">

                <div class="container" style="padding-bottom: 64px;">
                    <div class="row">
                        <div class="col-md-12">
                            @php
                                $locale = app()->getLocale();
                                $title = '';
                                $content = '';

                                if ($locale == 'id') {
                                    $title = !is_null($article->title_indonesia)
                                        ? $article->title_indonesia
                                        : $article->title_english;
                                } elseif ($locale == 'en') {
                                    $title = !is_null($article->title_english)
                                        ? $article->title_english
                                        : $article->title_indonesia;
                                }

                                if ($locale == 'id') {
                                    $content = !is_null($article->content_indonesia)
                                        ? $article->content_indonesia
                                        : $article->content_english;
                                } elseif ($locale == 'en') {
                                    $content = !is_null($article->content_english)
                                        ? $article->content_english
                                        : $article->content_indonesia;
                                }
                            @endphp

                            <h1 style="font-family: Campton; color: white !important;">{!! $title !!}</h1>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <section id="content" class="px-4 py-4 mx-4">
            {!! $content !!}
        </section>

        <section style="margin-top: 200px;margin-bottom: 200px;">
            <div class="container d-sm-block d-md-none">
                @section('style')
                    <link rel="stylesheet" href="{{ asset('assets/slick-1.8.1/slick/slick.css') }}">
                    <link rel="stylesheet" href="{{ asset('assets/slick-1.8.1/slick/slick-theme.css') }}">
                @endsection

                <div class="slick-slider d-flex flex-row" style="margin-bottom: 72px;">
                    @if (isset($articles) && $articles->count() > 0)
                        @foreach ($articles as $article)
                            <a href="{{ route('read-news', ['locale' => app()->getLocale(), $article->slug]) }}"
                                style="color: black;">
                                <div class="slick-item" wire:key="{{ $loop->iteration }}">
                                    <div>
                                        <img class="img-fluid" style="margin-bottom: 36px; height: 334px;"
                                            src="{{ str_contains($article->thumbnail, '/uploads') ? asset($article->thumbnail) : asset('storage/' . $article->thumbnail) }}"
                                            alt="Article Thumbnail">
                                    </div>
                                    <p class="fw-light" style="font-family: Campton; color: #8F90A6;">
                                        {{ \Carbon\Carbon::parse($article->created_at)->format('F j, Y') }}
                                    </p>
                                    <h1 class="fs-4 fw-semibold"
                                        style="color: var(--bs-black); font-family: Campton; margin-top: 8px; margin-bottom: 8px;">
                                        {!! app()->getLocale() == 'id' ? $article->title_indonesia : $article->title_english !!}
                                    </h1>
                                    <p class="fs-5 fw-light" style="color: var(--bs-black); font-family: Campton;">
                                        {!! app()->getLocale() == 'id'
                                            ? \Illuminate\Support\Str::limit($article->content_indonesia, 60, '...')
                                            : \Illuminate\Support\Str::limit($article->content_english, 60, '...') !!}
                                    </p>
                                </div>
                            </a>
                        @endforeach
                    @endif
                </div>

                @section('script')
                    <script src="{{ asset('assets/slick-1.8.1/slick/slick.min.js') }}"></script>
                    <script>
                        $(document).ready(function() {
                            $('.slick-slider').slick({
                                dots: true, // untuk menampilkan dot navigasi
                                infinite: true, // untuk mengatur infinite scrolling
                                speed: 500, // kecepatan transisi
                                slidesToShow: 1, // jumlah slide yang tampil per halaman
                                slidesToScroll: 1, // jumlah slide yang digulirkan per klik
                                adaptiveHeight: true, // untuk menyesuaikan tinggi slider dengan konten
                            });
                        });
                    </script>
                @endsection
            </div>


        </section>



    @endif

</section>
