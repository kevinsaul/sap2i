<section class="section nos_partenaires content">
    @empty (!$bloc['titre_bloc_categories'])
        <h2 class="bandeau_bluelight"><span>{!! $bloc['titre_bloc_categories'] !!}</span></h2>
    @endempty
    <div class="bg_blanc shadow">
        <div class="container">
            <div class="row">
                @empty (!$bloc['categories'])
                    @foreach ($bloc['categories'] as $i => $categorie)
                        <div class="col-12 col-sm-6 col-md-3 md_category">
                        <h3>{!! $categorie['nom_cat'] !!}</h3>
                            <div class="col-12 col-sm-6 col-md-10">
                                @empty (!$categorie['logos_selected_par_cat'])
                                    @foreach ($categorie['logos_selected_par_cat'] as $i => $logo)
                                        <div class="company">
                                            <picture data-aos="fade-down" data-aos-offset="50" data-aos-delay="{!! $i*200 !!}" data-aos-duration="900" data-aos-easing="linear">
                                                <source srcset="{!! useResize($logo->companies_logo['url'], 200, null, true) !!}" type="image/webp">
                                                <source srcset="{!! useResize($logo->companies_logo['url'], 200) !!}" type="image/jpeg">
                                                <img src="{!! useResize($logo->companies_logo['url'], 200) !!}">
                                            </picture>
                                        </div>
                                    @endforeach
                                @endempty
                            </div>
                        </div>
                    @endforeach
                @endempty
            </div>
        </div>
    </div>
</section>
