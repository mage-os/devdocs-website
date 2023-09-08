@extends('partials.layout')

@section('content')
    <x-accessibility.skip-to-content-link />

    <x-header-news-bar />

    <div class="relative overflow-auto dark:bg-dark-700" id="docsScreen">
        <div class="relative lg:flex lg:items-start">
            <aside class="hidden fixed top-0 bottom-0 left-0 z-20 h-full w-16 bg-gradient-to-b from-gray-100 to-white transition-all duration-300 overflow-hidden lg:sticky lg:w-80 lg:shrink-0 lg:flex lg:flex-col lg:justify-end lg:items-end 2xl:max-w-lg 2xl:w-full dark:from-dark-800 dark:to-dark-700">
                <div class="relative min-h-0 flex-1 flex flex-col xl:w-80">
                    <a href="/" class="flex items-center py-8 px-4 lg:px-8 xl:px-16">
                        <img
                            class="w-8 h-8 shrink-0 transition-all duration-300 lg:w-64 lg:h-12"
                            src="/img/Mage-OSLogoOrange.svg"
                            alt="mage-os"
                        >
                    </a>
                    <div class="overflow-y-auto overflow-x-hidden px-4 lg:overflow-hidden lg:px-8 xl:px-16">
                        <nav id="indexed-nav" class="hidden lg:block lg:mt-4">
                            <div class="docs_sidebar">
                                {!! $index !!}
                            </div>
                        </nav>
                    </div>
                </div>
            </aside>

            <header
                class="lg:hidden"
                @keydown.window.escape="navIsOpen = false"
                @click.away="navIsOpen = false"
            >
                <div class="relative mx-auto w-full py-10 bg-white transition duration-200 dark:bg-dark-700">
                    <div class="mx-auto px-8 sm:px-16 flex items-center justify-between">
                        <a href="/" class="flex items-center">
                            <img class="w-[250px]" src="/img/Mage-OSLogoOrange.svg" alt="Mage-OS">
                            <img class="hidden ml-5 sm:block w-[250px]" src="/img/Mage-OSLogoOrange.svg" alt="Mage-OS">
                        </a>
                        <div class="flex-1 flex items-center justify-end">
                            <button id="header__sun" onclick="toSystemMode()" title="Switch to system theme" class="relative w-10 h-10 focus:outline-none focus:shadow-outline text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-sun" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="12" cy="12" r="4"></circle>
                                    <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7"></path>
                                 </svg>
                            </button>
                            <button id="header__moon" onclick="toLightMode()" title="Switch to light mode" class="relative w-10 h-10 focus:outline-none focus:shadow-outline text-gray-500">
                                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M17.75,4.09L15.22,6.03L16.13,9.09L13.5,7.28L10.87,9.09L11.78,6.03L9.25,4.09L12.44,4L13.5,1L14.56,4L17.75,4.09M21.25,11L19.61,12.25L20.2,14.23L18.5,13.06L16.8,14.23L17.39,12.25L15.75,11L17.81,10.95L18.5,9L19.19,10.95L21.25,11M18.97,15.95C19.8,15.87 20.69,17.05 20.16,17.8C19.84,18.25 19.5,18.67 19.08,19.07C15.17,23 8.84,23 4.94,19.07C1.03,15.17 1.03,8.83 4.94,4.93C5.34,4.53 5.76,4.17 6.21,3.85C6.96,3.32 8.14,4.21 8.06,5.04C7.79,7.9 8.75,10.87 10.95,13.06C13.14,15.26 16.1,16.22 18.97,15.95M17.33,17.97C14.5,17.81 11.7,16.64 9.53,14.5C7.36,12.31 6.2,9.5 6.04,6.68C3.23,9.82 3.34,14.64 6.35,17.66C9.37,20.67 14.19,20.78 17.33,17.97Z" />
                                </svg>
                            </button>
                            <a href="{!! $edit_link !!}" target="_blank" title="edit this site">
                                <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 100 100" x="0px" y="0px" width="40" height="40">
                                    <defs>
                                        <style>.cls-1,.cls-2{fill:none;stroke:#000;stroke-linejoin:round;}.cls-1{stroke-linecap:round;}</style>
                                    </defs>
                                    <path class="cls-1" d="M42.16,66,30,70l3.23-12.33L63.38,25.78a.87.87,0,0,1,1.23,0L72.23,33a.87.87,0,0,1,.05,1.23Z"/>
                                    <line class="cls-1" x1="58.58" y1="30.85" x2="67.48" y2="39.26"/>
                                    <line class="cls-1" x1="31.2" y1="65.5" x2="34.44" y2="68.56"/>
                                    <line class="cls-2" x1="27.49" y1="74.49" x2="64.48" y2="74.49"/>
                                </svg>
                            </a>
                            <button id="header__indeterminate" onclick="toDarkMode()" title="Switch to dark mode" class="relative w-10 h-10 focus:outline-none focus:shadow-outline text-gray-500">
                                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M12 2A10 10 0 0 0 2 12A10 10 0 0 0 12 22A10 10 0 0 0 22 12A10 10 0 0 0 12 2M12 4A8 8 0 0 1 20 12A8 8 0 0 1 12 20V4Z" />
                                </svg>
                            </button>
                            <button class="ml-2 relative w-10 h-10 p-2 text-gray-600 dark:text-gray-400 lg:hidden focus:outline-none focus:shadow-outline" aria-label="Menu" @click.prevent="navIsOpen = !navIsOpen">
                                <svg x-show="! navIsOpen" x-transition.opacity class="absolute inset-0 mt-2 ml-2 w-6 h-6" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                                <svg x-show="navIsOpen" x-transition.opacity x-cloak class="absolute inset-0 mt-2 ml-2 w-6 h-6" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                            </button>
                        </div>
                    </div>
                    <span :class="{ 'shadow-sm': navIsOpen }" class="absolute inset-0 z-20 pointer-events-none"></span>
                </div>
                <div
                    x-show="navIsOpen"
                    x-transition:enter="duration-150"
                    x-transition:leave="duration-100 ease-in"
                    x-cloak
                >
                    <nav
                        x-show="navIsOpen"
                        x-cloak
                        class="absolute w-full transform origin-top shadow-sm z-10"
                        x-transition:enter="duration-150 ease-out"
                        x-transition:enter-start="opacity-0 -translate-y-8 scale-75"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="duration-100 ease-in"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 -translate-y-8 scale-75"
                    >
                        <div class="relative p-8 bg-white docs_sidebar dark:bg-dark-600">
                            {!! $index !!}
                        </div>
                    </nav>
                </div>
            </header>

            <section class="flex-1 dark:bg-dark-700">
                <div class="max-w-screen-lg px-8 sm:px-16 lg:px-24">
                    <div class="flex flex-col items-end border-b border-gray-200 py-1 transition-colors dark:border-gray-700 lg:mt-8 lg:flex-row-reverse">
                        <div class="hidden lg:flex items-center justify-center ml-8">
                            <button id="header__sun" onclick="toSystemMode()" title="Switch to system theme" class="relative w-10 h-10 focus:outline-none focus:shadow-outline text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-sun" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="12" cy="12" r="4"></circle>
                                    <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7"></path>
                                 </svg>
                            </button>
                            <a href="{!! $edit_link !!}" target="_blank" title="edit this site">
                                <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 100 100" x="0px" y="0px" width="40" height="40">
                                    <defs>
                                        <style>.cls-1,.cls-2{fill:none;stroke:#000;stroke-linejoin:round;}.cls-1{stroke-linecap:round;}</style>
                                    </defs>
                                    <path class="cls-1" d="M42.16,66,30,70l3.23-12.33L63.38,25.78a.87.87,0,0,1,1.23,0L72.23,33a.87.87,0,0,1,.05,1.23Z"/>
                                    <line class="cls-1" x1="58.58" y1="30.85" x2="67.48" y2="39.26"/>
                                    <line class="cls-1" x1="31.2" y1="65.5" x2="34.44" y2="68.56"/>
                                    <line class="cls-2" x1="27.49" y1="74.49" x2="64.48" y2="74.49"/>
                                </svg>
                            </a>
                            <button id="header__moon" onclick="toLightMode()" title="Switch to light mode" class="relative w-10 h-10 focus:outline-none focus:shadow-outline text-gray-500">
                                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M17.75,4.09L15.22,6.03L16.13,9.09L13.5,7.28L10.87,9.09L11.78,6.03L9.25,4.09L12.44,4L13.5,1L14.56,4L17.75,4.09M21.25,11L19.61,12.25L20.2,14.23L18.5,13.06L16.8,14.23L17.39,12.25L15.75,11L17.81,10.95L18.5,9L19.19,10.95L21.25,11M18.97,15.95C19.8,15.87 20.69,17.05 20.16,17.8C19.84,18.25 19.5,18.67 19.08,19.07C15.17,23 8.84,23 4.94,19.07C1.03,15.17 1.03,8.83 4.94,4.93C5.34,4.53 5.76,4.17 6.21,3.85C6.96,3.32 8.14,4.21 8.06,5.04C7.79,7.9 8.75,10.87 10.95,13.06C13.14,15.26 16.1,16.22 18.97,15.95M17.33,17.97C14.5,17.81 11.7,16.64 9.53,14.5C7.36,12.31 6.2,9.5 6.04,6.68C3.23,9.82 3.34,14.64 6.35,17.66C9.37,20.67 14.19,20.78 17.33,17.97Z" />
                                </svg>
                            </button>
                            <button id="header__indeterminate" onclick="toDarkMode()" title="Switch to dark mode" class="relative w-10 h-10 focus:outline-none focus:shadow-outline text-gray-500">
                                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M12 2A10 10 0 0 0 2 12A10 10 0 0 0 12 22A10 10 0 0 0 22 12A10 10 0 0 0 12 2M12 4A8 8 0 0 1 20 12A8 8 0 0 1 12 20V4Z" />
                                </svg>
                            </button>
                        </div>
                        <div class="relative mt-8 flex items-center justify-end w-full h-10 lg:mt-0">
                            <div class="flex-1 flex items-center">
                                <button id="docsearch" class="text-gray-800 transition-colors dark:text-gray-400 w-full"></button>
                            </div>
                        </div>
                    </div>

                    <section class="mt-8 md:mt-16">
                        <section class="docs_main max-w-prose">
                            @unless ($currentVersion == 'main' || version_compare($currentVersion, DEFAULT_VERSION) >= 0)
                                <blockquote>
                                    <div class="mb-10 max-w-2xl mx-auto px-4 py-8 shadow-lg dark:bg-dark-600 lg:flex lg:items-center">
                                        <div class="w-20 h-20 mb-6 flex items-center justify-center shrink-0 bg-orange-600 lg:mb-0">
                                            <img src="{{ asset('/img/callouts/exclamation.min.svg') }}" alt="Icon" class="opacity-75" />
                                        </div>

                                        <p class="mb-0 lg:ml-4">
                                            <strong>WARNING</strong> You're browsing the documentation for an old version of Mage-OS.
                                            Consider upgrading your project to <a href="{{ route('docs.version', DEFAULT_VERSION) }}">Mage-OS {{ DEFAULT_VERSION }}</a>.
                                        </p>
                                    </div>
                                </blockquote>
                            @endunless

                            @if ($currentVersion == 'master' || version_compare($currentVersion, DEFAULT_VERSION) > 0)
                                <blockquote>
                                    <div class="callout">
                                        <div class="mb-10 max-w-2xl mx-auto px-4 py-8 shadow-lg lg:flex lg:items-center">
                                            <div class="w-20 h-20 mb-6 flex items-center justify-center shrink-0 bg-orange-600 lg:mb-0">
                                                <img src="{{ asset('/img/callouts/exclamation.min.svg') }}" alt="Icon" class="opacity-75" />
                                            </div>

                                            <p class="mb-0 lg:ml-4">
                                                <strong>WARNING</strong> You're browsing the documentation for an upcoming version of Mage-OS.
                                                The documentation and features of this release are subject to change.
                                            </p>
                                        </div>
                                    </div>
                                </blockquote>
                            @endif

                            <x-accessibility.main-content-wrapper>
                                {!! $content !!}
                            </x-accessibility.main-content-wrapper>
                        </section>
                    </section>
                </div>
            </section>
        </div>
    </div>
@stop
