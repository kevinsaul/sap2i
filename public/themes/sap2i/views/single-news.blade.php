@extends('global.base')

@section('content')

    <main id="inter" class="no_banner">
        @include('views.modules.content_actualite')

        <section>
            <div class="container">
                @if (pll_current_language() == 'en')
                    <a href="{{ get_post_type_archive_link('news') }}" class="big_btn">Back to news</a>
                @else
                    <a href="{{ get_post_type_archive_link('news') }}" class="big_btn">Retour aux actualités</a>
                @endif
            </div>
        </section>
        
    </main>

@endsection
