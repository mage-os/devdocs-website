@php
    $links = [
        [
            'title' => 'Highlights',
            'links' => [
                'Our Vision' => 'https://mage-os.org/about/',
                'The Docs Team' => '/team',
                'Mage-OS vs Adobe Commerce vs Magento' => 'https://mage-os.org/why-magento/magento-vs-adobe-vs-mage-os/',
                'Community' => 'https://mage-os.org/community/',
                'Get Involved' => 'https://mage-os.org/about/get-involved/',
                'Conference Calender' => 'https://mage-os.org/community/magento-events/',
                'Local Mage-OS Communities' => 'https://mage-os.org/community/local-mage-os-communities/'
            ],
        ],
        [
            'title' => 'Resources',
            'links' => [
                'Magento 2 Awesome List' => 'https://github.com/run-as-root/awesome-magento2',
                'MageTalk: A Magento Podcast' => 'https://magetalk.com/',
                'Proceed to Checkout Podcast ' => 'https://www.magentoassociation.org/podcast',
                'Magento StackExchange' => 'https://magento.stackexchange.com/',
            ],
        ],
        [
             'title' => 'Partners',
             'links' => [
                 'run_as_root' => 'https://run-as-root.sh/',
                 'Yireo' => 'https://www.yireo.com/',
                 'Hyvä' => 'https://www.hyva.io/',
                 'Amasty' => 'https://amasty.com/',
                 'Elgentos' => 'https://elgentos.nl/',
                 'maxcluster' => 'https://maxcluster.de/',
                 'Aonach' => 'https://aonach.com/',
             ]
         ],
        [
            'title' => 'Community',
            'links' => [
                'MageChat Slack (Paid)' => 'https://magchat.slack.com/',
                'Magento Association Slack' => 'https://magentoassociation.slack.com/',
                '🇩🇪 Magento Community Slack' => 'https://magento-de.slack.com/',
                'Discord' => 'https://discord.gg/mE6PBDE8GR',
                'Mage-OS Newsletter' => 'https://mage-os.org/newsletter/',
            ],
        ],
    ];

    $is_docs_page = request()->is('docs/*');
@endphp

<footer class="relative pt-12 {{ $is_docs_page ? 'dark:bg-dark-700' : '' }}">
    <div class="max-w-screen-2xl mx-auto w-full {{ $is_docs_page ? 'px-8' : 'px-5' }}">
        <div>
            <a href="/" class="inline-flex">
                <img class="" src="/img/Mage-OSLogomarkOrange.svg" alt="Mage-OS" loading="lazy">
            </a>
        </div>

        <div class="mt-6 grid grid-cols-12 md:gap-x-8 gap-y-12 sm:mt-12">
            <div class="col-span-12 lg:col-span-4">
                <p class="max-w-sm text-xs text-gray-700 sm:text-sm {{ $is_docs_page ? 'dark:text-gray-500' : '' }}">Magento Open Source has been a uniquely inspired platform for eCommerce merchants, developers, and agencies worldwide since 2008. Today Mage-OS builds on this well-established product, and leverages its vast Community to be the open source eCommerce operating system of the future.</p>
                <ul class="mt-6 flex items-center space-x-1 md:space-x-3">
                    <li>
                        <a href="https://twitter.com/mage_os" class="p-2 md:p-0">
                            <img class="{{ $is_docs_page ? 'hidden dark:inline-block' : 'hidden' }} w-6 h-6" src="/img/social/twitter.dark.min.svg" alt="Twitter" width="24" height="20" loading="lazy">
                            <img class="{{ $is_docs_page ? 'inline-block dark:hidden' : 'inline-block' }} w-6 h-6" src="/img/social/twitter.min.svg" alt="Twitter" width="24" height="20" loading="lazy">
                        </a>
                    </li>
                    <li>
                        <a href="https://github.com/mage-os" class="p-2 md:p-0">
                            <img class="{{ $is_docs_page ? 'hidden dark:inline-block' : 'hidden' }} w-6 h-6" src="/img/social/github.dark.min.svg" alt="GitHub" width="24" height="24" loading="lazy">
                            <img class="{{ $is_docs_page ? 'inline-block dark:hidden' : 'inline-block' }} w-6 h-6" src="/img/social/github.min.svg" alt="GitHub" width="24" height="24" loading="lazy">
                        </a>
                    </li>
                    <li>
                        <a href="https://discord.gg/mE6PBDE8GR" class="p-2 md:p-0">
                            <img class="{{ $is_docs_page ? 'hidden dark:inline-block' : 'hidden' }} w-6 h-6" src="/img/social/discord.dark.min.svg" alt="Discord" width="21" height="24" loading="lazy">
                            <img class="{{ $is_docs_page ? 'inline-block dark:hidden' : 'inline-block' }} w-6 h-6" src="/img/social/discord.min.svg" alt="Discord" width="21" height="24" loading="lazy">
                        </a>
                    </li>
                </ul>
            </div>
            @foreach ($links as $column)
                <div class="text-xs col-span-6 md:col-span-3 lg:col-span-2">
                    <span class="uppercase {{ $is_docs_page ? 'dark:text-gray-200' : '' }}">{{ $column['title'] }}</span>
                    <div class="mt-5">
                        <ul class="space-y-3.5 md:space-y-3 text-gray-700 {{ $is_docs_page ? 'dark:text-gray-500' : '' }}">
                            @foreach ($column['links'] as $title => $href)
                                <li>
                                    <a href="{{ $href }}" class="transition-colors hover:text-gray-600 py-1.5 md:py-1 {{ $is_docs_page ? 'dark:hover:text-gray-400' : '' }}">{{ $title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-10 border-t pt-6 pb-16 border-gray-200 {{ $is_docs_page ? 'dark:border-dark-500' : '' }}">
            <p class="text-xs text-gray-700 {{ $is_docs_page ? 'dark:text-gray-400' : '' }}">
                © 2022-{{ now()->format('Y') }} Mage-OS Association
                Magento® is a registered trademark of Adobe Inc. <b>Mage-OS is not affiliated with Adobe or Magento Open Source in any way.</b>
            </p>
            <p class="mt-6 text-xs text-gray-700 {{ $is_docs_page ? 'dark:text-gray-400' : '' }}">
                Documentation framework forked from <a href="https://laravel.com/docs">Laravel</a>. Code highlighting provided by <a href="https://torchlight.dev">Torchlight</a>
            </p>
        </div>
    </div>
</footer>
