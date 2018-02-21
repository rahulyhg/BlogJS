<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($series as $serie)
        <url>
            <loc>http://jordysantamaria.com/serie/{{ $serie->id_subcategoria }}/{{ $serie->subcategoria }}</loc>
            <lastmod>{{ $serie->created_at }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach
</urlset>