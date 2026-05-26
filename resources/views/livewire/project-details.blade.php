<?php

use function Livewire\Volt\{state, mount};
use App\Models\Project;

// Estado del componente
state(['project' => Project::firstOrFail()]);

// Se ejecuta al cargar la página, recibe el {slug} de la URL
mount(function (string $slug) {
    $this->project = Project::firstOrFail();
});

?>

<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12" x-data="{ shown: false }" x-init="setTimeout(() => shown = true, 100)">

    {{-- Botón de regreso --}}
    <div class="mb-8">
        <a href="{{ route('projects') }}" wire:navigate class="inline-flex items-center gap-2 text-monet-magic hover:text-cyber-yellow transition-colors group">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Volver a Proyectos
        </a>
    </div>

    {{-- Cabecera del Proyecto --}}
    <header :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'" class="transition-all duration-700 ease-out mb-12">
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-display font-bold text-white mb-6 leading-tight">
            {{ $project->title }}
        </h1>

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
            {{-- Etiquetas --}}
            <div class="flex flex-wrap gap-2">

            </div>

            {{-- Botones de Enlace (Privacidad y Live) --}}
            <div class="flex items-center gap-4">
                <div class="flex items-center gap-2 px-4 py-2 rounded-full border border-heartless bg-cosmic-explorer text-monet-magic text-sm">
                    @if($project->is_public)
                        <x-icon-unlock class="w-4 h-4 text-cyber-yellow" />
                        <span>Repo Público</span>
                    @else
                        <x-icon-lock-alt class="w-4 h-4 text-rose-400" />
                        <span>Repo Privado</span>
                    @endif
                </div>

                @if($project->live_url)
                    <a href="{{ $project->live_url }}" target="_blank" rel="noopener noreferrer"
                    class="flex items-center gap-2 px-6 py-2 rounded-full bg-dripping-wisteria text-white hover:bg-cyber-yellow hover:text-eggplant transition-all duration-300 font-semibold text-sm shadow-[0_0_15px_rgba(155,89,182,0.3)] hover:shadow-[0_0_20px_rgba(255,212,0,0.5)]">

                        Ver en vivo
                    </a>
                @endif
            </div>
        </div>
    </header>

    {{-- Imagen Principal --}}
    <div :class="shown ? 'opacity-100 scale-100' : 'opacity-0 scale-95'" class="transition-all duration-1000 ease-out delay-200 w-full h-100 md:h-125 rounded-3xl overflow-hidden mb-16 border border-heartless relative group">
        <img src="{{ $project->thumbnail_path }}" alt="Thumbnail de {{ $project->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
        <div class="absolute inset-0 bg-linear-to-t from-eggplant/80 to-transparent"></div>
    </div>

    {{-- Contenido e Información Adicional --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 mb-20">


        <div :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'" class="transition-all duration-700 ease-out delay-300 lg:col-span-2 prose prose-invert prose-lg max-w-none prose-p:text-monet-magic prose-headings:font-display prose-headings:text-white prose-a:text-cyber-yellow">
            <h2 class="text-2xl font-bold mb-4 text-white font-display">Acerca del Proyecto</h2>
            <p class="leading-relaxed text-monet-magic font-sans text-lg">

            </p>
        </div>


        <div :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'" class="transition-all duration-700 ease-out delay-400">
            <div class="bg-cosmic-explorer/50 backdrop-blur-sm border border-heartless rounded-2xl p-6">
                <h3 class="text-white font-display font-bold mb-4 text-lg">Resumen</h3>
                <p class="text-monet-magic text-sm leading-relaxed mb-6">

                </p>

                <hr class="border-heartless mb-6">

                <h3 class="text-white font-display font-bold mb-4 text-lg">Stack Tecnológico</h3>
                <ul class="space-y-3">
                $project->tags
                </ul>
            </div>
        </div>
    </div>

    {{-- Galería de Imágenes Adicionales --}}
    @if(is_countable($project->gallery) && count($project->gallery) > 0)
        <div :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'" class="transition-all duration-700 ease-out delay-500">
            <h2 class="text-3xl font-display font-bold text-white mb-8">Galería del Proyecto</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($project->gallery as $index => $image)
                    <div class="h-64 rounded-2xl overflow-hidden border border-heartless hover:border-dripping-wisteria transition-colors group cursor-pointer">
                        <img src="{{ $image }}" alt="Imagen de galería {{ $index + 1 }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    </div>
                @endforeach
            </div>
        </div>
    @endif

</div>
