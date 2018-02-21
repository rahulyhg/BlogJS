<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($categorias as $categoria)
        <url>
            <loc>http://jordysantamaria.com/categoria/{{ $categoria->id_categoria }}/{{ $categoria->categoria }}</loc>
            <lastmod>{{ $categoria->created_at }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.7</priority>
        </url>
    @endforeach
</urlset>