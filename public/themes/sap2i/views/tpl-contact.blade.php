@extends('global.base')

@section('content')

    <main id="inter" class="{!! (empty($page->banner_contact['url']) ? 'no_banner' : '') !!}">
        
        @empty (!$page->banner_contact)
            <div id="banner" style="background-image: url({!! useResize($page->banner_contact['url'], 1700, 750) !!});"></div>
        @endempty


        <section class="section content">
            <div class="bg_blanc shadow">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-10 offset-md-1">
                            @if (pll_current_language() == 'en')
                                <h3>Contact Us</h3>
                            @else
                                <h3>Contactez-nous</h3>
                            @endif
                            @empty(!$page->accroche_contact)
                                {!! $page->accroche_contact !!}
                            @endempty
                            <br>

                            @empty(!$contact_form)
                                {!! $contact_form !!}
                            @endempty
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection

