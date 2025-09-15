@php
    $locale = app()->getLocale(); // Get the current locale

    // Set title based on locale
    if ($article !== null) {
        $metaTitle =
            $article->meta_title ??
            ($locale == 'id'
                ? $article->title_indonesia ?? ($article->title_english ?? '')
                : $article->title_english ?? ($article->title_indonesia ?? ''));
        // Set description based on locale
        $metaDescription =
            $locale == 'id'
                ? $article->meta_description_ind ?? ($article->meta_description ?? '')
                : $article->meta_description ?? ($article->meta_description_ind ?? '');

        // Set keywords based on locale
        $metaKeywords =
            $locale == 'id'
                ? $article->keyword_ind ?? ($article->keyword ?? '')
                : $article->keyword ?? ($article->keyword_ind ?? '');

        // Set Open Graph image
        $ogImage = asset($article->thumbnail ?? '');
        $hrefSlugId = $article->slug_ind;
        $hrefSlugEn = $article->slug;
        $publishedAt = $article->created_at;
    }
@endphp

@if ($article !== null)
    @section('title', $metaTitle)
    @section('author', isset($author) ? $author->name : 'Default Author')
    @section('meta_description', $metaDescription)
    @section('meta_keywords', $metaKeywords)
    @section('href_slug_ind', $hrefSlugId)
    @section('href_slug_en', $hrefSlugEn)
    @section('published_at', $publishedAt)
    @section('og_title', $metaTitle)
    @section('og_description', $metaDescription)
    @section('og_image', $ogImage)
@endif

<section id="news" style="{{ is_null($article) ? 'background-color: #2b3035' : '' }}">
    @if (is_null($article))
        <div style="color: white;display: flex; justify-content: center; align-items: center; height: 100vh;">
            <h1>{{ __('Article Not Found') }}</h1>
        </div>
    @else
        <section>
            <div class="d-flex align-items-end position-relative"
                style="height: 600px; 
                   background: linear-gradient(to bottom, rgba(0, 0, 0, 0.7) 0%, rgba(0, 0, 0, 0) 100%), 
                               url('{{ str_contains($article->thumbnail, '/uploads') ? asset($article->thumbnail) : asset('storage/' . $article->thumbnail) }}') center / cover no-repeat;">

                <div
                    style="position: absolute; bottom: 0; left: 0; width: 100%; height: 200px;
                       background: linear-gradient(to top, rgba(0, 0, 0, 0.6), transparent);">
                </div>

                <div class="container" style="padding-bottom: 64px; position: relative; z-index: 2;">
                    <div class="row">
                        <div class="col-md-12">
                            @php
                                $locale = app()->getLocale();
                                $title =
                                    $locale == 'id'
                                        ? $article->title_indonesia ?? $article->title_english
                                        : $article->title_english ?? $article->title_indonesia;
                                $content =
                                    $locale == 'id'
                                        ? $article->content_indonesia ?? $article->content_english
                                        : $article->content_english ?? $article->content_indonesia;
                            @endphp
                            <h1 style="font-family: Campton; color: white !important;">{!! $title !!}</h1>
                            <p style="font-size:14px; margin-top:10px; color:white; font-weight:500">
                                {{ \Carbon\Carbon::parse($article->created_at)->format('M d, Y') }} by Admin
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <div class="d-flex justify-content-between flex-wrap p-5">
            <section id="content" class=" image-handles">
                {!! $content !!}
            </section>
            <div class="flex-article2">
                <div class="d-flex flex-column">
                    @if (isset($articles) && $articles->count() > 0)
                        <h3 style="color:#8a8a8a">Recent Post</h3>
                        @foreach ($articles as $article)
                            <div style="background-color: #292F78; border-radius:10px; margin-top:20px; width:300px"
                                wire:key="{{ $loop->iteration }}">
                                <a href="{{ app()->getLocale() === 'id'
                                    ? url('/id/media/news/' . ($article->slug_ind ?? $article->slug))
                                    : route('read-news', [
                                        'locale' => app()->getLocale(),
                                        'slug' => app()->getLocale() === 'id' ? $article->slug_ind ?? $article->slug : $article->slug,
                                    ]) }}"
                                    style="text-decoration:none; cursor: pointer; color: white">
                                    <img class="img-fluid"
                                        style=" height: 204px; width: 100%; object-fit: cover; border-radius:10px;"
                                        src="{{ str_contains($article->thumbnail, '/uploads') ? asset($article->thumbnail) : asset('storage/' . $article->thumbnail) }}"
                                        alt="" />
                                    <div class="recent" style="padding:20px; color:white !important">
                                        @if ($article->category_name)
                                            <p
                                                style="width: fit-content; color:white; background-color:#00A7CF; border-radius:50px; padding:3px; padding-left:10px; padding-right:10px; margin-bottom:10px">
                                                {!! $article->category_name !!}
                                            </p>
                                        @endif
                                        <p class="text-white">
                                            {{ \Carbon\Carbon::parse($article->created_at)->format('M d, Y') }}
                                        </p>
                                        <br>
                                        <a style=" text-decoration:none; color: white; font-weight:bold; "
                                            href="{{ app()->getLocale() === 'id'
                                                ? url('/id/media/news/' . ($article->slug_ind ?? $article->slug))
                                                : route('read-news', [
                                                    'locale' => app()->getLocale(),
                                                    'slug' => app()->getLocale() === 'id' ? $article->slug_ind ?? $article->slug : $article->slug,
                                                ]) }}">
                                            {{ app()->getLocale() == 'id' ? $article->title_indonesia : $article->title_english }}
                                        </a>

                                        <p class="desc " style=" margin-top:5px ">
                                            {!! app()->getLocale() == 'id'
                                                ? \Illuminate\Support\Str::limit($article->content_indonesia, 60, '...')
                                                : \Illuminate\Support\Str::limit($article->content_english, 60, '...') !!}
                                        </p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>





    @endif
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const links = document.querySelectorAll('#content a');

            links.forEach(link => {
                link.setAttribute('target', '_blank');
            });
        });
    </script>
    <style>
        .recent p {
            color: white !important;
        }

        .image-handles img {
            width: 100% !important;
            /* Ensure the image takes up the full width of its container */
            max-width: 100%;
            /* Prevent the image from exceeding the container width */
            height: auto;
            /* Maintain aspect ratio, preventing stretching */
            object-fit: contain;
            /* Ensures the image scales within its box without being distorted */
        }

        .image-handles figcaption {
            display: none !important;
        }
    </style>
</section>
