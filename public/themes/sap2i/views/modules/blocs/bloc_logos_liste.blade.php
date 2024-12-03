<section class="section nos_partenaires content">
    <h2 class="bandeau_bluelight"><span>{!! $bloc['titre_bloc'] !!}</span></h2>
    <div class="bg_blanc shadow">
        <div class="container">
            <div id="slide-logos" class="row slide-logos">
                @empty (!$bloc['logos_selected'])
                    @foreach ($bloc['logos_selected'] as $i => $logo)
                        <div class="col-6 col-md-2 col-lg-2 picture-company slide">
                            <div class="company">
                                <picture data-aos="fade-down" data-aos-offset="50" data-aos-delay="{!! $i*200 !!}" data-aos-duration="900" data-aos-easing="linear">
                                    <source srcset="{!! useResize($logo->companies_logo['url'], 200, null, true) !!}" type="image/webp">
                                    <source srcset="{!! useResize($logo->companies_logo['url'], 200) !!}" type="image/jpeg">
                                    <img src="{!! useResize($logo->companies_logo['url'], 200) !!}">
                                </picture>
                            </div>
                        </div>
                    @endforeach
                @endempty
            </div>
        </div>
    </div>
</section>
