<section class="section nos_partenaires content">
    <h2 class="bandeau_bluelight"><span>{!! $bloc['titre_bloc_all'] !!}</span></h2>
    <div class="bg_blanc shadow">
        <div class="container">
            <div class="col">
                @empty (!$bloc['logos_selected_all'])
                    @foreach ($bloc['logos_selected_all'] as $logo)
                        <div class="col-12 col-md-2 col-lg-3 col-sm-3 picture-company slide">
                            @foreach ($logo as $i => $logos)
                                <div class="company">
                                    <div>
                                        <picture data-aos-offset="50" data-aos-delay="{!! $i*200 !!}" data-aos-duration="900" data-aos-easing="linear">
                                            <source srcset="{!! useResize($logos->companies_logo['url'], 400, null, true) !!}" type="image/webp">
                                            <source srcset="{!! useResize($logos->companies_logo['url'], 400) !!}" type="image/jpeg">
                                            <img src="{!! useResize($logos->companies_logo['url'], 400) !!}">
                                        </picture>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                @endempty
            </div>
        </div>
    </div>
</section>
