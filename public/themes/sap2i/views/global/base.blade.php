<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="{{ get_template_directory_uri() }}/assets/images/favicon.png"/>

    @if (!is_plugin_active('wordpress-seo/wp-seo.php'))
        <title>{{ wp_title("|", true, "right") }}</title>
    @endif

    {{ wp_head() }}
</head>
    <body>

        @include('global.navigation')

        @yield('content')

        @include('global.footer')

        @includeIf('global.stats')

        {{ wp_footer() }}

    </body>
</html>
