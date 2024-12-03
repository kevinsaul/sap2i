@extends('global.base')

@section('content')

    <main id="home">
        <section class="sections slider_section">  
            @empty(!$page->home_slider)
                <div id="slider_home">
                    @foreach ($page->home_slider as $slide)
                        <div class="item_slider" style="background-image: url('{!! useResize($slide['image']['url'], 1700, 7500) !!}');">
                        </div>
                    @endforeach
                </div>
            @endempty
            <div id="title_plus_nav" data-aos="fade-left" data-aos-offset="50" data-aos-delay="0" data-aos-duration="900" data-aos-easing="linear">
                <div class="txt_item">
                    <h1>{!! $page->title_slide !!}</h1>
                </div>
            </div>

            @empty (!$news)
                <div id="a_la_une" data-aos="fade-left" data-aos-offset="50" data-aos-delay="250" data-aos-duration="900" data-aos-easing="linear"> 
                    <div class="actu">
                        <p class="date">{!! $news->published['date'] !!}</p>
                        <h3>{!! $news->title !!}</h3>
                        <p>{!! $news->news_desc !!}</p>
                        @if (pll_current_language() == 'en')
                            <a href="{!! $news->permalink !!}" class="see_more">Learn more</a>
                        @else
                            <a href="{!! $news->permalink !!}" class="see_more">En savoir plus</a>
                        @endif
                    </div>
                </div>
            @endempty
        </section>

        <section class="section qui_sommes_nous content" id="qui_sommes_nous">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-5">
                        <div class="content" data-aos="fade-right" data-aos-offset="50" data-aos-delay="50" data-aos-duration="900" data-aos-easing="linear">
                            <h2>{!! $page->qui_sommes_nous['title'] !!}</h2>
                            @empty (!$page->qui_sommes_nous['bloc'])
                                {!! $page->qui_sommes_nous['bloc'] !!}
                            @endempty
                            <span class="blue_line"></span> 
                        </div>
                    </div>
                    <div class="col-12 col-md-7 ">
                        <div id="img_mosaique">
                            @empty (!$page->qui_sommes_nous['img_top_left'])
                                <picture class="mosaiques mos_top_left" data-aos="fade-left" data-aos-offset="50" data-aos-delay="250" data-aos-duration="900" data-aos-easing="linear">
                                    <source srcset="{!! useResize($page->qui_sommes_nous['img_top_left']['url'], 400, 400, true) !!}" type="image/webp">
                                    <source srcset="{!! useResize($page->qui_sommes_nous['img_top_left']['url'], 400, 400) !!}" type="image/jpeg">
                                    <img src="{!! useResize($page->qui_sommes_nous['img_top_left']['url'], 400, 400) !!}">
                                </picture>
                            @endempty
                            @empty (!$page->qui_sommes_nous['img_top_right'])
                                <picture class="mosaiques mos_top_right" data-aos="fade-left" data-aos-offset="50" data-aos-delay="250" data-aos-duration="900" data-aos-easing="linear">
                                    <source srcset="{!! useResize($page->qui_sommes_nous['img_top_right']['url'], 400, 400, true) !!}" type="image/webp">
                                    <source srcset="{!! useResize($page->qui_sommes_nous['img_top_right']['url'], 400, 400) !!}" type="image/jpeg">
                                    <img src="{!! useResize($page->qui_sommes_nous['img_top_right']['url'], 400, 400) !!}">
                                </picture>
                            @endempty
                            @empty (!$page->qui_sommes_nous['img_bottom_left'])
                                <picture class="mosaiques mos_bottom_left" data-aos="fade-left" data-aos-offset="50" data-aos-delay="250" data-aos-duration="900" data-aos-easing="linear">
                                    <source srcset="{!! useResize($page->qui_sommes_nous['img_bottom_left']['url'], 400, 400, true) !!}" type="image/webp">
                                    <source srcset="{!! useResize($page->qui_sommes_nous['img_bottom_left']['url'], 400, 400) !!}" type="image/jpeg">
                                    <img src="{!! useResize($page->qui_sommes_nous['img_bottom_left']['url'], 400, 400) !!}">
                                </picture>
                            @endempty
                            @empty (!$page->qui_sommes_nous['img_bottom_right'])
                                <picture class="mosaiques mos_bottom_right" data-aos="fade-left" data-aos-offset="50" data-aos-delay="250" data-aos-duration="900" data-aos-easing="linear">
                                    <source srcset="{!! useResize($page->qui_sommes_nous['img_bottom_right']['url'], 400, 400, true) !!}" type="image/webp">
                                    <source srcset="{!! useResize($page->qui_sommes_nous['img_bottom_right']['url'], 400, 400) !!}" type="image/jpeg">
                                    <img src="{!! useResize($page->qui_sommes_nous['img_bottom_right']['url'], 400, 400) !!}">
                                </picture>
                            @endempty
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section content certifications">
            <div class="row">
                <div class="col-12 bandeau_bluelight">
                    @if (pll_current_language() == 'en')
                        <h2>Our certifications</h2>
                    @else
                        <h2>Nos certifications</h2>
                    @endif
                </div>
            </div>
            <div class="bg_white">
                <div class="container">
                    @empty (!$page->nos_certifications)
                        <div class="row align_certif">
                            @foreach ($page->nos_certifications as $i=> $certificat)
                                <div class="col-6 col-md-2">
                                    <a href="{!! $certificat->company_website_url !!}" target="_blank">
                                        <div class="company">
                                            <picture data-aos="fade-down" data-aos-offset="50" data-aos-delay="{!! $i*200 !!}" data-aos-duration="900" data-aos-easing="linear">
                                                <source srcset="{!! useResize($certificat->companies_logo['url'], 200, null, true) !!}" type="image/webp">
                                                <source srcset="{!! useResize($certificat->companies_logo['url'], 200) !!}" type="image/jpeg">
                                                <img src="{!! useResize($certificat->companies_logo['url'], 200) !!}">
                                            </picture>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endempty
                </div>
            </div>
        </section>
    </main>

@endsection
