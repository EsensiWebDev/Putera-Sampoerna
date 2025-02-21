<section style="margin-top: 200px;">
    <div class="container mb-4">
        <div class="row">
            <div class="col-md-12">
                <h1 class="fs-2 text-center" style="font-family: Campton;color: var(--bs-black);">
                    {{ __('Latest Updates') }}</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @php
                $locale = app()->getLocale();

                $article = \App\Models\Article::where(function ($query) use ($locale) {
                    if ($locale === 'id') {
                        // For 'id' locale, ensure content_indonesia and title_indonesia are not empty
                        $query
                            ->whereNotNull('content_indonesia')
                            ->whereNotNull('title_indonesia')
                            ->where('content_indonesia', '!=', '')
                            ->where('title_indonesia', '!=', '');
                    } else {
                        // For 'en' locale, ensure content and title_english are not empty
                        $query
                            ->whereNotNull('content_english')
                            ->whereNotNull('title_english')
                            ->where('content_english', '!=', '')
                            ->where('title_english', '!=', '');
                    }
                })
                    ->orderBy('created_at', 'DESC')
                    ->first();
                if (isset($article) && $article->isPublished) {
                    $title = '';
                    $content = '';

                    // Tentukan judul berdasarkan locale
                    if ($locale == 'id') {
                        $title = $article->title_indonesia ?? $article->title_english;
                    } elseif ($locale == 'en') {
                        $title = $article->title_english ?? $article->title_indonesia;
                    }

                    // Tentukan konten berdasarkan locale
                    if ($locale == 'id') {
                        $content =
                            \Illuminate\Support\Str::limit($article->content_indonesia, 250, '...') ??
                            \Illuminate\Support\Str::limit($article->content_english, 250, '...');
                    } elseif ($locale == 'en') {
                        $content =
                            \Illuminate\Support\Str::limit($article->content_english, 250, '...') ??
                            \Illuminate\Support\Str::limit($article->content_indonesia, 250, '...');
                    }
                }
            @endphp
            @if (isset($article))
                <div class="col-md-6 px-0 py-0">
                    <div class="card py-3" style="border-radius: 0px; border-style: none; position: relative;">
                        <!-- Image container -->
                        <div style="position: relative;">
                            <img class="img-fluid card-img d-block" style="border-radius: 0px; width: 100%;"
                                src="{{ str_contains($article->thumbnail, '/uploads') ? asset($article->thumbnail) : asset('storage/' . $article->thumbnail) }}"
                                alt="Beasiswa">

                            <!-- Dark gradient overlay -->
                            <div
                                style="position: absolute; bottom: 0; left: 0; width: 100%; height: 100%; 
                                        background: linear-gradient(to top, rgba(0, 0, 0, 0.7) 10%, transparent 80%);">
                            </div>
                        </div>

                        <!-- Text content (Above Image) -->
                        <div class="card-img-overlay d-flex flex-column justify-content-end py-5"
                            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 2; background: rgba(0,0,0,0);">

                            <div class="container">
                                <h4 class="text-light" style="font-family: Campton; font-weight: bold;">
                                    {!! $title !!}
                                </h4>
                                <p class="text-light" style="font-family: Campton;">{!! strip_tags(preg_replace('/<img[^>]+>/i', '', $content)) !!}</p>
                                <a class="link-light"
                                    href="{{ route('read-news', ['locale' => app()->getLocale(), 'slug' => app()->getLocale() === 'id' ? $article->slug_ind ?? $article->slug : $article->slug]) }}"
                                    style="font-family: Campton;">
                                    {{ __('Read More') }}&nbsp;
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 20 20" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M12.2929 5.29289C12.6834 4.90237 13.3166 4.90237 13.7071 5.29289L17.7071 9.29289C18.0976 9.68342 18.0976 10.3166 17.7071 10.7071L13.7071 14.7071C13.3166 15.0976 12.6834 15.0976 12.2929 14.7071C11.9024 14.3166 11.9024 13.6834 12.2929 13.2929L14.5858 11H3C2.44772 11 2 10.5523 2 10C2 9.44772 2.44772 9 3 9H14.5858L12.2929 6.70711C11.9024 6.31658 11.9024 5.68342 12.2929 5.29289Z"
                                            fill="currentColor"></path>
                                    </svg>&nbsp;
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            @else
                <h1>No Article..</h1>
            @endif
            <div class="col-md-6 py-2 mx-0 px-0">
                @if (isset($articles) && $articles->count() > 1)
                    @foreach ($articles->skip(1) as $article)
                        @php
                            $locale = app()->getLocale();
                            $title =
                                $locale == 'id'
                                    ? $article->title_indonesia ?? $article->title_english
                                    : $article->title_english ?? $article->title_indonesia;
                            $content =
                                $locale == 'id'
                                    ? \Illuminate\Support\Str::limit(
                                        preg_replace('/$$[^$$]*$$/', '', strip_tags($article->content_indonesia)),
                                        100,
                                        '...',
                                    )
                                    : \Illuminate\Support\Str::limit(
                                        preg_replace('/$$[^$$]*$$/', '', strip_tags($article->content_english)),
                                        100,
                                        '...',
                                    );
                        @endphp
                        <div class="d-flex flex-row py-2 px-3 pb-3">
                            <div class="col">
                                <div
                                    style="background: url('{{ str_contains($article->thumbnail, '/uploads') ? asset($article->thumbnail) : asset('storage/' . $article->thumbnail) }}') center / cover no-repeat;height: 232px;">
                                </div>
                            </div>
                            <div class="col d-flex flex-column justify-content-xxl-center px-3">
                                <h1 class="fs-5"
                                    style="color: var(--bs-black); font-family: Campton; margin-bottom: 0;">
                                    {{ $title }}
                                </h1>
                                <p class="fs-6 fw-light my-2"
                                    style="font-family: Campton; color: var(--bs-black); margin-bottom: -1px;">
                                    {!! $content !!}
                                </p>
                                <a class="fs-6"
                                    href="{{ route('read-news', ['locale' => app()->getLocale(), 'slug' => app()->getLocale() === 'id' ? $article->slug_ind ?? $article->slug : $article->slug]) }}"
                                    style="color: #292F78; font-family: Campton;">
                                    {{ __('Read More') }}&nbsp;
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 20 20" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M12.2929 5.29289C12.6834 4.90237 13.3166 4.90237 13.7071 5.29289L17.7071 9.29289C18.0976 9.68342 18.0976 10.3166 17.7071 10.7071L13.7071 14.7071C13.3166 15.0976 12.6834 15.0976 12.2929 14.7071C11.9024 14.3166 11.9024 13.6834 12.2929 13.2929L14.5858 11H3C2.44772 11 2 10.5523 2 10C2 9.44772 2.44772 9 3 9H14.5858L12.2929 6.70711C11.9024 6.31658 11.9024 5.68342 12.2929 5.29289Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </a>
                            </div>

                        </div>
                    @endforeach
                @else
                    <h1></h1>
                @endif
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 d-flex d-lg-flex justify-content-center justify-content-lg-center"><a
                    class="btn btn-primary" role="button" style="font-family: Campton;"
                    href="{{ route('media.news', ['locale' => app()->getLocale()]) }}">{{ __('See More Updates') }}&nbsp;<svg
                        xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 20 20"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M12.2929 5.29289C12.6834 4.90237 13.3166 4.90237 13.7071 5.29289L17.7071 9.29289C18.0976 9.68342 18.0976 10.3166 17.7071 10.7071L13.7071 14.7071C13.3166 15.0976 12.6834 15.0976 12.2929 14.7071C11.9024 14.3166 11.9024 13.6834 12.2929 13.2929L14.5858 11H3C2.44772 11 2 10.5523 2 10C2 9.44772 2.44772 9 3 9H14.5858L12.2929 6.70711C11.9024 6.31658 11.9024 5.68342 12.2929 5.29289Z"
                            fill="currentColor"></path>
                    </svg></a></div>
        </div>
    </div>
</section>
