<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($posts as $post)
        <url>
            <loc>http://jordysantamaria.com/post/{{ $post->id_post }}/{{ str_replace(" ", "-", $post->titulo)  }}</loc>
            <lastmod>{{ $post->created_at }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.9</priority>
        </url>
    @endforeach
</urlset>