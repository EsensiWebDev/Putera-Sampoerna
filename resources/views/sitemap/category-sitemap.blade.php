{{-- <?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach (App\Models\Category::where('locale', $locale == 'id' ? 'id' : 'en')->get() as $category)
        <url>
            <loc>{{ url(($locale == 'id' ? '/id' : '') . '/news/category/' . $category->slug) }}</loc>
            <lastmod>{{ $category->updated_at->toW3cString() }}</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.6</priority>
        </url>
    @endforeach
</urlset> --}}
