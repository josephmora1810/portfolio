<header x-data="{ mobileMenuOpen: false }" class="sticky top-0 z-40 w-full bg-haiti/80 backdrop-blur-md border-b border-heartless">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-4">
            
            {{-- Logo --}}
            <a href="{{ route('home') }}" wire:navigate class="text-xl font-jetbrains-mono font-semibold tracking-tight text-cyber-yellow hover:text-white transition-colors duration-300">
                Joseph Ricardo
            </a>

            {{-- Navegación Desktop --}}
            <nav class="hidden md:flex items-center space-x-8 font-medium text-sm">
                <a href="{{ route('home') }}" wire:navigate class="{{ request()->routeIs('home') ? 'text-cyber-yellow' : 'text-monet-magic' }} hover:text-cyber-yellow transition-colors duration-200">
                    {{ __('ui.nav.home') }}
                </a>
                <a href="{{ route('about') }}" wire:navigate class="{{ request()->routeIs('about') ? 'text-cyber-yellow' : 'text-monet-magic' }} hover:text-cyber-yellow transition-colors duration-200">
                    {{ __('ui.nav.about') }}
                </a>
                <a href="{{ route('projects') }}" wire:navigate.hover class="{{ request()->routeIs('projects') ? 'text-cyber-yellow' : 'text-monet-magic' }} hover:text-cyber-yellow transition-colors duration-200">
                    {{ __('ui.nav.projects') }}
                </a>
                <a href="{{ route('playground') }}" wire:navigate class="{{ request()->routeIs('playground') ? 'text-cyber-yellow' : 'text-monet-magic' }} hover:text-cyber-yellow transition-colors duration-200">
                    {{ __('ui.nav.playground') }}
                </a>
                <a href="{{ route('cv') }}" class="{{ request()->routeIs('cv') ? 'text-cyber-yellow' : 'text-monet-magic' }} hover:text-cyber-yellow transition-colors duration-200">
                    {{ __('ui.nav.cv') }}
                </a>
                
                {{-- Language Switcher Desktop --}}
                <div class="border-l border-heartless pl-6 flex items-center gap-2">
                    @php
                        $currentRoute = request()->route()->getName();
                        $enParams = array_merge(request()->route()->parameters(), ['locale' => 'en']);
                        $esParams = array_merge(request()->route()->parameters(), ['locale' => 'es']);
                    @endphp

                    <a href="{{ route($currentRoute, $enParams) }}" wire:navigate 
                        class="text-xs font-mono px-2 py-1 rounded {{ app()->getLocale() === 'en' ? 'bg-cyber-yellow text-haiti font-bold' : 'text-monet-magic hover:text-cyber-yellow' }} transition-colors">
                        EN
                    </a>
                    <a href="{{ route($currentRoute, $esParams) }}" wire:navigate 
                        class="text-xs font-mono px-2 py-1 rounded {{ app()->getLocale() === 'es' ? 'bg-cyber-yellow text-haiti font-bold' : 'text-monet-magic hover:text-cyber-yellow' }} transition-colors">
                        ES
                    </a>
                </div>
            </nav>

            {{-- Botón Menú Móvil --}}
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden rounded-md p-2 text-heartless hover:bg-haiti focus:outline-none transition-colors">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path x-show="mobileMenuOpen" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        {{-- Menú Móvil --}}
        <div x-show="mobileMenuOpen" x-collapse x-cloak class="md:hidden pb-4 space-y-2 border-t border-heartless mt-2 pt-2">
            <a href="{{ route('home') }}" wire:navigate class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('home') ? 'text-cyber-yellow' : 'text-heartless' }} hover:bg-haiti hover:text-cyber-yellow transition-colors">
                {{ __('ui.nav.home') }}
            </a>
            <a href="{{ route('about') }}" wire:navigate class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('about') ? 'text-cyber-yellow' : 'text-heartless' }} hover:bg-haiti hover:text-cyber-yellow transition-colors">
                {{ __('ui.nav.about') }}
            </a>
            <a href="{{ route('projects') }}" wire:navigate class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('projects') ? 'text-cyber-yellow' : 'text-heartless' }} hover:bg-haiti hover:text-cyber-yellow transition-colors">
                {{ __('ui.nav.projects') }}
            </a>
            <a href="{{ route('playground') }}" wire:navigate class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('playground') ? 'text-cyber-yellow' : 'text-heartless' }} hover:bg-haiti hover:text-cyber-yellow transition-colors">
                {{ __('ui.nav.playground') }}
            </a>
            <a href="{{ route('cv') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('cv') ? 'text-cyber-yellow' : 'text-heartless' }} hover:bg-haiti hover:text-cyber-yellow transition-colors">
                {{ __('ui.nav.cv') }}
            </a>
            
            {{-- Language Switcher Móvil --}}
            <div class="flex gap-4 px-3 pt-4 pb-2">
                <a href="{{ route($currentRoute ?? 'home', array_merge(request()->route()?->parameters() ?? [], ['locale' => 'en'])) }}" 
                    class="flex-1 text-center py-2 rounded border border-heartless {{ app()->getLocale() === 'en' ? 'bg-cyber-yellow text-haiti font-bold' : 'text-monet-magic' }}">
                    {{ __('ui.languages.en') }}
                </a>
                <a href="{{ route($currentRoute ?? 'home', array_merge(request()->route()?->parameters() ?? [], ['locale' => 'es'])) }}" 
                    class="flex-1 text-center py-2 rounded border border-heartless {{ app()->getLocale() === 'es' ? 'bg-cyber-yellow text-haiti font-bold' : 'text-monet-magic' }}">
                    {{ __('ui.languages.es') }}
                </a>
            </div>
        </div>
    </div>
</header>