{!! '<' . '?xml version="1.0" encoding="UTF-8"?' . '>' !!}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
@foreach($staticUrls as $url)
  <url>
    <loc>{{ $url }}</loc>
    <changefreq>weekly</changefreq>
    <priority>0.8</priority>
  </url>
@endforeach
@foreach($jobs as $job)
  <url>
    <loc>{{ route('jobs.show', $job) }}</loc>
    <lastmod>{{ optional($job->updated_at)->toAtomString() ?? date('c') }}</lastmod>
    <changefreq>daily</changefreq>
    <priority>0.9</priority>
  </url>
@endforeach
@foreach($trainings as $training)
  <url>
    <loc>{{ route('trainings.show', $training) }}</loc>
    <lastmod>{{ optional($training->updated_at)->toAtomString() ?? date('c') }}</lastmod>
    <changefreq>weekly</changefreq>
    <priority>0.8</priority>
  </url>
@endforeach
@foreach($pages as $page)
  <url>
    <loc>{{ route('page.show', $page) }}</loc>
    <lastmod>{{ optional($page->updated_at)->toAtomString() ?? date('c') }}</lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.7</priority>
  </url>
@endforeach
@foreach($albums as $album)
  <url>
    <loc>{{ route('gallery.show', $album) }}</loc>
    <lastmod>{{ optional($album->updated_at)->toAtomString() ?? date('c') }}</lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.6</priority>
  </url>
@endforeach
</urlset>
