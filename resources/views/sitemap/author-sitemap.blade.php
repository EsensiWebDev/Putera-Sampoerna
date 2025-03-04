{{-- <?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach (App\Models\Author::where('locale', $locale == 'id' ? 'id' : 'en')->get() as $author)
        <url>
            <loc>{{ url(($locale == 'id' ? '/id' : '') . '/author/' . $author->slug) }}</loc>
            <lastmod>{{ $author->updated_at->toW3cString() }}</lastmod>
            <changefreq>yearly</changefreq>
            <priority>0.5</priority>
        </url>
    @endforeach
</urlset> --}}
