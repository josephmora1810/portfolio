<header x-data="{ mobileMenuOpen: false }" class="sticky top-0 z-40 w-full bg-eggplant/80 backdrop-blur-md border-b border-heartless">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-4">
            <a href="{{ route('about') }}" wire:navigate class="text-xl font-display font-bold tracking-tight text-cyber-yellow hover:text-white transition-colors duration-300 italic">
                Joseph Ricardo
            </a>

            <nav class="hidden md:flex space-x-8 font-medium text-sm">
                <a href="{{ route('home') }}" wire:navigate class="text-monet-magic hover:text-cyber-yellow transition-colors duration-200">Inicio</a>
                <a href="{{ route('about') }}" wire:navigate class="text-monet-magic hover:text-cyber-yellow transition-colors duration-200">Sobre mí</a>
                <a href="{{ route('projects') }}" wire:navigate.hover class="text-monet-magic hover:text-cyber-yellow transition-colors duration-200">Proyectos</a>
                <a href="{{ route('playground') }}" wire:navigate class="text-monet-magic hover:text-cyber-yellow transition-colors duration-200">Demostración</a>
                <a href="{{ route('cv') }}" class="text-monet-magic hover:text-cyber-yellow transition-colors duration-200">CV</a>
            </nav>

            <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden rounded-md p-2 text-heartless hover:bg-eggplant focus:outline-none transition-colors">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path x-show="mobileMenuOpen" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <div x-show="mobileMenuOpen"
                x-collapse
                x-cloak
                class="md:hidden pb-4 space-y-2">
            <a href="{{ route('home') }}" wire:navigate class="block px-3 py-2 rounded-md text-base font-medium text-heartless hover:bg-eggplant hover:text-cyber-yellow transition-colors">Inicio</a>
            <a href="{{ route('about') }}" wire:navigate class="block px-3 py-2 rounded-md text-base font-medium text-heartless hover:bg-eggplant hover:text-cyber-yellow transition-colors">Sobre mí</a>
            <a href="{{ route('projects') }}" wire:navigate class="block px-3 py-2 rounded-md text-base font-medium text-heartless hover:bg-eggplant hover:text-cyber-yellow transition-colors">Proyectos</a>
            <a href="{{ route('playground') }}" wire:navigate class="block px-3 py-2 rounded-md text-base font-medium text-heartless hover:bg-eggplant hover:text-cyber-yellow transition-colors">Demostración</a>
            <a href="{{ route('cv') }}" class="block px-3 py-2 rounded-md text-base font-medium text-heartless hover:bg-eggplant hover:text-cyber-yellow transition-colors">CV</a>
        </div>
    </div>
</header>
