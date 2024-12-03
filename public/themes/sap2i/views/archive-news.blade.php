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
                            <h2>Les actualités de SAP2I</h2>
                        </div>
                        <div class="col-12">
                            @empty (!$options['accroche'])
                                {!! $options['accroche'] !!}
                            @endempty
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($news as $i => $new)
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="actu" data-aos="fade-down" data-aos-offset="50" data-aos-delay="{!! $i*200 !!}" data-aos-duration="900" data-aos-easing="ease-in-out">
                                    <p class="date">{!! $new->published['date'] !!}</p>
                                    <h3>{!! $new->title !!}</h3>
                                    <p>{!! $new->news_desc !!}</p>
                                    <a href="{!! $new->permalink !!}" class="see_more">En savoir plus</a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection

