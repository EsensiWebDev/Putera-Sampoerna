<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach (App\Models\Article::when($locale == 'id', function ($query) {
            return $query->whereNotNull('slug_ind');
        })
        ->when($locale == 'en', function ($query) {
            return $query->where('slug', '!=', '-');
        })
        ->get() as $post)
        <url>
            <loc>{{ url("/$locale/media/news/" . ($locale == 'id' ? $post->slug_ind : $post->slug)) }}</loc>
            <lastmod>{{ $post->updated_at->toW3cString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach
</urlset>
