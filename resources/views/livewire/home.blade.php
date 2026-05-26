<?php
use function Livewire\Volt\{state};
// Lógica de Livewire en el futuro, si es necesaria
?>

<div class="min-h-[calc(100vh-80px)] flex flex-col justify-center items-center px-4 sm:px-6 lg:px-8 overflow-visible relative mb-5">

    {{-- Efecto de fondo sutil --}}
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-150 h-150 bg-dripping-wisteria rounded-full blur-[120px] opacity-10 pointer-events-none"></div>

    {{-- Contenedor principal con animación de entrada --}}
    <div x-data="{ shown: false }"
        x-init="setTimeout(() => shown = true, 100)"
        class="text-center max-w-3xl mx-auto z-10 w-full"
    >
        {{-- Badge superior --}}
        <div :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
            class="transition-all duration-700 ease-out mb-8 mt-5 inline-block">
            <span class="px-5 py-2 rounded-full border border-heartless bg-cosmic-explorer/50 backdrop-blur-sm text-monet-magic text-sm font-medium tracking-wide shadow-[0_0_15px_rgba(94,13,71,0.2)]">
                Disponible para nuevos proyectos
            </span>
        </div>

        {{-- Titulo principal --}}
        <h1 :class="shown ? 'opacity-100 scale-100' : 'opacity-0 scale-95'"
            class="text-5xl sm:text-6xl md:text-7xl font-display font-bold mb-4 tracking-tight transition-all duration-700 ease-out delay-100">
            <span class="text-white">¡Hola! Soy </span>
            <span class="bg-linear-to-r from-cyber-yellow via-deadly-yellow to-dripping-wisteria bg-clip-text text-transparent">Joseph</span>
        </h1>

        {{-- Subtitulo --}}
        <h2 :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
            class="text-3xl sm:text-4xl font-display font-semibold text-monet-magic mb-8 transition-all duration-700 ease-out delay-200">
            Ingeniero de Sistemas
        </h2>

        {{-- Párrafo descriptivo --}}
        <p :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
        class="text-lg text-dripping-wisteria/80 max-w-2xl mx-auto mb-12 leading-relaxed transition-all duration-700 ease-out delay-300">
            Construyo arquitecturas sólidas y experiencias digitales multiplataforma. Especializado en desarrollo fullstack moderno y apasionado por llevar ideas complejas a la realidad mediante código limpio y eficiente.
        </p>

        {{-- Botones de acción principales --}}
        <div :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
            class="flex flex-col sm:flex-row gap-4 justify-center items-center transition-all duration-700 ease-out delay-500 mb-10">

            <a href="{{ route('about') }}" wire:navigate
            class="w-full sm:w-auto px-8 py-3.5 rounded-full bg-dripping-wisteria text-white font-semibold tracking-wide hover:bg-cyber-yellow hover:text-haiti transition-all duration-300 shadow-[0_0_20px_rgba(155,89,182,0.3)] hover:shadow-[0_0_25px_rgba(255,212,0,0.5)] transform hover:-translate-y-1">
                Acerca de mí
            </a>

            <a href="{{ route('projects') }}" wire:navigate
            class="w-full sm:w-auto px-8 py-3.5 rounded-full border border-heartless text-monet-magic font-semibold tracking-wide hover:border-cyber-yellow hover:text-cyber-yellow transition-all duration-300 transform hover:-translate-y-1">
                Ver mis proyectos
            </a>

            <a href="{{ route('playground') }}" wire:navigate
            class="w-full sm:w-auto px-8 py-3.5 rounded-full border border-heartless text-monet-magic font-semibold tracking-wide hover:border-cyber-yellow hover:text-cyber-yellow transition-all duration-300 transform hover:-translate-y-1">
                Ver demostración
            </a>

        </div>

        {{-- Sección de Contacto (Input + Iconos) --}}
        <div :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
            x-data="{ email: 'josephmora18102002@gmail.com', copied: false }"
            class="transition-all duration-700 ease-out delay-700 flex flex-col sm:flex-row items-center justify-center gap-3 mb-5">

            {{-- Input de correo --}}
            <div class="relative w-full sm:w-auto">
                <input type="text"
                    readonly
                    :value="email"
                    class="w-full sm:w-72 bg-cosmic-explorer/40 border border-heartless text-monet-magic text-sm rounded-full focus:outline-none focus:border-cyber-yellow px-5 py-3 text-center sm:text-left transition-colors font-mono tracking-tight" />
            </div>

            {{-- Botones de iconos --}}
            <div class="flex gap-3 mt-3 sm:mt-0">
                {{-- Botón Mailto --}}
                <a :href="'mailto:' + email"
                class="p-3 rounded-full bg-cosmic-explorer/40 border border-heartless text-dripping-wisteria hover:text-cyber-yellow hover:border-cyber-yellow transition-all duration-300 transform hover:-translate-y-1 group"
                title="Enviar correo electrónico">
                    <x-icon-gmail class="w-5 h-5 bg-cosmic-explorer/40" />
                </a>

                {{-- Botón Copiar al portapapeles --}}
                <button @click="navigator.clipboard.writeText(email); copied = true; setTimeout(() => copied = false, 2000)"
                        class="p-3 rounded-full bg-cosmic-explorer/40 border border-heartless text-dripping-wisteria hover:text-cyber-yellow hover:border-cyber-yellow transition-all duration-300 transform hover:-translate-y-1 group relative"
                        title="Copiar al portapapeles">

                    {{-- Icono original --}}
                    <span x-show="!copied">
                        <x-icon-clipboard class="w-5 h-5" />
                    </span>

                    {{-- Checkmark de éxito (SVG nativo simple para cuando se copia) --}}
                    <span x-show="copied" x-cloak>
                        <x-icon-checkmark-circle class="w-5 h-5 text-green-500"/>
                    </span>

                </button>
            </div>

        </div>

    </div>
</div>
