<section class="section content">
    <div class="shadow">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-10 offset-md-1">
                    @if (!empty($news->news_title))
                        <h2>{!! $news->news_title !!}</h2>
                    @else
                        <h2>{!! $news->title !!}</h2>
                    @endif
                    <div class="content_news_mod">
                        {!! $news->content_desc_actu!!}
                        <picture>
                            <source media="(max-width: 450px)" srcset="{{ useResize($news->img_actu['url'], 450, 300, true) }}" type="image/webp">
                            <source media="(max-width: 992px)" srcset="{{ useResize($news->img_actu['url'], 950, 500, true) }}" type="image/webp">
                            <source srcset="{{ useResize($news->img_actu['url'], 950, 500, true) }}" type="image/webp">
                            <source media="(max-width: 450px)" srcset="{{ useResize($news->img_actu['url'], 450, 300) }}" type="image/jpeg">
                            <source media="(max-width: 992px)" srcset="{{ useResize($news->img_actu['url'], 950, 500) }}" type="image/jpeg">
                            <source srcset="{{ useResize($news->img_actu['url'], 950, 500) }}" type="image/jpeg">
                            <img alt="{{ $news->img_actu['alt'] }}" loading="lazy">
                        </picture>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>