@if(isset($page->slider) && !empty($page->slider['imgs']))
    <section id="home_slider">
        <div class="home_slider">
            @foreach ($page->slider['imgs'] as $slide)
                <div class="item" style="background:url({{ useResize($slide['url'], 1920, 800) }}) center center /cover;">
                </div>
            @endforeach
        </div>

        @empty(!$page->slider['txt'])
            <h1 class="title">{!! $page->slider['txt'] !!}</h1>
        @endempty
    </section>
@endif
