<section>
    @php
        $locale = app()->getLocale();
        $title = '';
        $content = '';
        
        $article = \App\Models\Article::where(function ($query) use ($locale) {
            if ($locale === 'id') {
                // For 'id' locale, ensure content_indonesia and title_indonesia are not empty
                $query
                    ->whereNotNull('content_indonesia')
                    ->whereNotNull('title_indonesia')
                    ->whereNotNull('slug_ind')
                    ->where('content_indonesia', '!=', '')
                    ->where('title_indonesia', '!=', '')
                    ->where('isPublished', '1');
            } else {
                // For 'en' locale, ensure content and title_english are not empty
                $query
                    ->whereNotNull('content_english')
                    ->whereNotNull('title_english')
                    ->whereNotNull('slug')
                    ->where('content_english', '!=', '')
                    ->where('title_english', '!=', '')
                    ->where('isPublished', '1');
            }
        })
            ->orderBy('created_at', 'DESC')
            ->first();
        if (isset($article)) {
           

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

    <section style="margin-top: 200px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex flex-row justify-content-start align-items-end image-data"
                        style="background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 10%, rgba(11, 11, 11, 0.71) 100%), url('{{ str_contains($article->thumbnail, '/uploads') ? asset($article->thumbnail) : asset('storage/' . $article->thumbnail) }}') center / cover no-repeat;height: 676px;">
                        <div class="flex-fill px-5" style="padding-left: 140px;padding-bottom: 36px;">
                            <h1 class="fs-4" style="font-family: Campton;color: white;">{{ $title }}
                            </h1>
                            <p class="fw-light" style="font-family: Campton;color: white;margin-top: 10px;">
                                {!! strip_tags(preg_replace('/<img[^>]+>/i', '', $content)) !!}
                                &nbsp;</p>
                            <a href="{{ route('read-news', ['locale' => app()->getLocale(), 'slug' => app()->getLocale() === 'id' ? $article->slug_ind ?? $article->slug : $article->slug]) }}"
                                style="font-family: Campton;color: white;">{{ __('Read More') }}&nbsp;<svg
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
        </div>
    </section>

    <section style="margin-top: 80px;margin-bottom: 280px;">
        <div class="container">
            <div class="row">
                @if (isset($articles) && $articles->count() > 1)
                    @foreach ($articles->skip(1) as $article)
                        @php
                            $locale = app()->getLocale();
                            $title =
                                $locale == 'id'
                                    ? $article->title_indonesia ?? $article->title_english
                                    : $article->title_english ?? $article->title_indonesia;

                            // Use meta_description if it exists
                            if (!empty($article->meta_description)) {
                                // Determine which meta description to use based on the locale
                                $metaDescription =
                                    $locale === 'id' ? $article->meta_description_ind : $article->meta_description;

                                // Limit the content to 100 characters
                                $content = \Illuminate\Support\Str::limit($metaDescription, 100, '...');
                            } else {
                                // Fallback to the first <p> tag in the content
                                $content = $locale == 'id' ? $article->content_indonesia : $article->content_english;

                                // Extract the first <p> tag's content
    preg_match('/<p>(.*?)<\/p>/', $content, $matches);
    $content = $matches[1] ?? ''; // Use the first <p> tag's content if found

                                // Clean up the content
                                $content = \Illuminate\Support\Str::limit(
                                    preg_replace(
                                        '/<[^>]*>/', // Remove all HTML tags
                                        '',
                                        $content,
                                    ),
                                    100,
                                    '...',
                                );
                            }
                        @endphp
                        <div class="col col-6 col-sm-6 col-lg-4 py-2 px-2"><a
                                href="{{ route('read-news', ['locale' => app()->getLocale(), 'slug' => app()->getLocale() === 'id' ? $article->slug_ind ?? $article->slug : $article->slug]) }}">
                                <div><img class="img-fluid"
                                        style="margin-bottom: 36px; height: 204px; width: 100%; object-fit: cover;"
                                        src="{{ str_contains($article->thumbnail, '/uploads') ? asset($article->thumbnail) : asset('storage/' . $article->thumbnail) }}"
                                        width="424px" height="290px" alt="Media Image"></div>
                                @php
                                    $createdAt = \Carbon\Carbon::parse($article->created_at);

                                    // Format tanggal sesuai dengan yang diinginkan
                                    $formattedDate = $createdAt->translatedFormat('F j, Y');
                                @endphp
                                <p class="fw-light" style="font-family: Campton;color: #8F90A6;">{{ $formattedDate }}
                                </p>
                                <h1 class="fs-4 fw-semibold"
                                    style="color: var(--bs-black);font-family: Campton;margin-top: 8px;margin-bottom: 8px;">
                                    {{ $title }}</h1>
                                <p class="fs-5 fw-light" style="color: var(--bs-black);font-family: Campton;">
                                    {!! $content !!}</p>
                            </a>
                        </div>
                    @endforeach
                @else
                    <h1>This does not have the latest update</h1>
                @endif
            </div>
            @if ($articles->hasPages())
                <div class="row justify-content-center" style="margin-top: 100px">
                    <div class="col-12 d-flex justify-content-center">
                        <div class="pagination-container">
                            {{ $articles->onEachSide(0)->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

</section>
