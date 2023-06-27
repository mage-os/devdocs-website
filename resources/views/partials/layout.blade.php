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
    <meta name="title" content="Mage-OS - Community driven eCommerce">
    <meta name="description" content="The Mage-OS Association is a non-profit association Formed by people within the Magento community to represent and further the interests of that community as a whole: Merchants, developers, agencies, and all of the many people supporting and supported by this ecosystem.">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://mage-os.org/">
    <meta property="og:title" content="Mage-OS - Community driven eCommerce">
    <meta property="og:description" content="The Mage-OS Association is a non-profit association Formed by people within the Magento community to represent and further the interests of that community as a whole: Merchants, developers, agencies, and all of the many people supporting and supported by this ecosystem.">
    <meta property="og:image" content="https://mage-os.org/wp-content/uploads/2023/05/page-icon.png">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://mage-os.org/">
    <meta property="twitter:title" content="Mage-OS - Community driven eCommerce">
    <meta property="twitter:description" content="The Mage-OS Association is a non-profit association Formed by people within the Magento community to represent and further the interests of that community as a whole: Merchants, developers, agencies, and all of the many people supporting and supported by this ecosystem.">
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
