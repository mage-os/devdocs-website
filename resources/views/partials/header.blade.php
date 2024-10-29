<header
    x-trap.inert.noscroll="navIsOpen"
    class="main-header relative z-50 text-gray-700"
    @keydown.window.escape="navIsOpen = false"
    @click.away="navIsOpen = false"
>
    <div class="relative max-w-screen-2xl mx-auto w-full py-4 bg-white transition duration-200 lg:bg-transparent lg:py-6">
        <div class="max-w-screen-xl mx-auto px-5 flex items-center justify-between">
            <div class="flex-1">
                <a href="/" class="inline-flex items-center">
                    <img class="w-8 h-8 shrink-0 transition-all duration-300 lg:w-64 lg:h-12" src="/img/Mage-OSLogoOrange.svg" alt="mage-os">
                </a>
            </div>
            <div class="flex-1 flex items-center justify-end">
                <button id="docsearch"></button>
                <x-button.secondary href="/docs/main" class="hidden lg:ml-4 lg:inline-flex">Documentation</x-button.secondary>
                <button
                    class="ml-2 relative w-10 h-10 inline-flex items-center justify-center p-2 text-gray-700 lg:hidden"
                    aria-label="Toggle Menu"
                    @click.prevent="navIsOpen = !navIsOpen"
                >
                    <svg x-show="! navIsOpen" class="w-6" viewBox="0 0 28 12" fill="none" xmlns="http://www.w3.org/2000/svg"><line y1="1" x2="28" y2="1" stroke="currentColor" stroke-width="2"/><line y1="11" x2="28" y2="11" stroke="currentColor" stroke-width="2"/></svg>
                    <svg x-show="navIsOpen" x-cloak class="absolute inset-0 mt-2.5 ml-2.5 w-5" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg"><rect y="1.41406" width="2" height="24" transform="rotate(-45 0 1.41406)" fill="currentColor"/><rect width="2" height="24" transform="matrix(0.707107 0.707107 0.707107 -0.707107 0.192383 16.9707)" fill="currentColor"/></svg>
                </button>
            </div>
        </div>
    </div>
    <div
        x-show="navIsOpen"
        class="lg:hidden"
        x-transition:enter="duration-150"
        x-transition:leave="duration-100 ease-in"
        x-cloak
    >
        <nav class="bg-white shadow-lg">
            <ul class="space-y-2">
                <li class="has-children">
                    <a href="#" class="block px-4 py-2 text-gray-700">Parent Item</a>
                    <ul class="pl-4 space-y-1">
                        <li class="child-indicator">
                            <a href="#" class="block px-4 py-2 text-gray-700">Child Item</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</header>
