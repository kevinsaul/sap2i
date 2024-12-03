@extends('global.base')

@section('content')

    <main id="inter" class="no_banner">
        
        <section class="section content">
            <div class="bg_blanc shadow">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-10 offset-md-1">
                            
                            @foreach ($sitemap as $item)
                                {!! $item !!} 
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection

