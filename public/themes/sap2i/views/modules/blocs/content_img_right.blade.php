<section class="section content">
    <div class="bg_{!! $bloc['background_color'] !!} shadow">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-5 center_vertical">
                    {!! $bloc['content_left'] !!}
                </div>
                <div class="col-12 col-md-6 offset-md-1">
                    @empty(!$bloc['img_right'])
                        <picture data-aos="fade-down" data-aos-offset="50" data-aos-delay="100" data-aos-duration="900" data-aos-easing="linear">
                            <source srcset="{!! useResize($bloc['img_right']['url'], 500, 500, true) !!}" type="image/webp">
                            <source srcset="{!! useResize($bloc['img_right']['url'], 500, 500) !!}" type="image/jpeg">
                            <img src="{!! useResize($bloc['img_right']['url'], 500, 500) !!}">
                        </picture>
                    @endempty
                </div>
            </div>
           </div>
    </div>
</section>