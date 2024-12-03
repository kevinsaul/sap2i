@extends('global.base')

@section('content')

    <main id="inter" class="{!! (empty($page->banner['url']) ? 'no_banner' : '') !!}">
        
        @empty (!$page->banner)
            <div id="banner" style="background-image: url({!! useResize($page->banner['url'], 1700, 750) !!});"></div>
        @endempty

        @include('views.modules.blocs.blocs')

    </main>

@endsection
