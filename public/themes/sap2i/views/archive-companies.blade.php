@extends('global.base')

@section('content')

    <main id="inter" class="{!! (empty($options['banner']['url']) ? 'no_banner' : '') !!}">
        
        @empty (!$options['banner'])
            <div id="banner" style="background-image: url({!! $options['banner']['url'] !!});"></div>
        @endempty
        
        <section class="section content">
            <div class="bg_blanc shadow">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h3>Nos partenaires</h3>
                        </div>
                        <div class="col-12">
                            @empty (!$options['accroche'])
                                {!! $options['accroche'] !!}
                            @endempty
                        </div>
                    </div>
                    <div class="row">
                        <!-- code -->
                        @foreach ($companies as $i => $company)
                            <div class="col-6 col-md-4 col-lg-2 picture-company">
                                <a class="company" href="{!! $company->company_website_url !!}" target="_blank">
                                    <picture data-aos="fade-down" data-aos-offset="50" data-aos-delay="{!! $i*200 !!}" data-aos-duration="900" data-aos-easing="linear">
                                        <source srcset="{!! useResize($company->companies_logo['url'], 200, null, true) !!}" type="image/webp">
                                        <source srcset="{!! useResize($company->companies_logo['url'], 200) !!}" type="image/jpeg">
                                        <img src="{!! useResize($company->companies_logo['url'], 200) !!}">
                                    </picture>
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection

