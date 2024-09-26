<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ isset($title) ? $title . ' - ' : null }}Mage-OS - Community driven eCommerce</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">

    @if (isset($canonical))
    <link rel="canonical" href="{{ url($canonical) }}">
    @endif

    <!-- Primary Meta Tags -->
    <meta name="title" content="{{ $metaTitle }}">
    <meta name="description" content="{{ $metaDescription }}">
    <meta name="keywords" content="{{ $metaKeywords }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $canonical ? url($canonical) : 'https://mage-os.org/' }}">
    <meta property="og:title" content="{{ $metaTitle }}">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="og:image" content="https://mage-os.org/wp-content/uploads/2023/05/page-icon.png">

    <!-- Twitter / X -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="og:url" content="{{ $canonical ? url($canonical) : 'https://mage-os.org/' }}">
    <meta property="og:title" content="{{ $metaTitle }}">
    <meta property="twitter:description" content="{{ $metaDescription }}">
    <meta property="twitter:image" content="https://mage-os.org/wp-content/uploads/2023/05/page-icon.png">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="/img/favicon/safari-pinned-tab.svg" color="#FF6700">
    <meta name="msapplication-TileColor" content="#FF6700">
    <meta name="msapplication-config" content="/img/favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <meta name="color-scheme" content="light">

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-5DBRTJMQ');</script>
    <!-- End Google Tag Manager -->

    <link rel="preconnect" href="https://{{ config('algolia.connections.main.id') }}-dsn.algolia.net" crossorigin />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @php
        $routesThatAreAlwaysLightMode = collect([
            'frontend',
            'marketing',
            'team',
            'trademark',
        ])
    @endphp

    <script>
        const alwaysLightMode = {{ ($routesThatAreAlwaysLightMode->contains(request()->route()->getName())) ? 'true' : 'false' }};
    </script>

    @include('partials.theme')
</head>
<body
    x-data="{
        navIsOpen: false,
    }"
    class="w-full h-full font-sans antialiased text-gray-900 language-php"
>

@yield('content')

@include('partials.footer')

<script>
    var algolia_app_id = '{{ config('algolia.connections.main.id', false) }}';
    var algolia_search_key = '{{ config('algolia.connections.main.search_key', false) }}';
    var version = '{{ isset($currentVersion) ? $currentVersion : DEFAULT_VERSION }}';
</script>

<div class="fixed">
    <input type="text">
</div>

</body>
</html>
