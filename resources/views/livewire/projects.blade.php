<?php

use function Livewire\Volt\{state, with};
use App\Models\Project; // Descomentar cuando tengas el modelo

with(fn () => [
    'projects' => Project::all()
]);

?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

    {{-- Encabezado de la página --}}
    <div class="text-center mb-16" x-data="{ shown: false }" x-init="setTimeout(() => shown = true, 100)">
        <h1 :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 -translate-y-8'"
            class="text-4xl md:text-5xl font-display font-bold text-white mb-6 transition-all duration-700 ease-out">
            Mis Proyectos
        </h1>
        <p :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
            class="text-monet-magic max-w-2xl mx-auto text-lg transition-all duration-700 ease-out delay-200">
            Una colección de arquitecturas, aplicaciones y desarrollos en los que he trabajado, abarcando desde ecosistemas Kotlin hasta el TALL stack.
        </p>
    </div>

    {{-- Grid de Proyectos --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" x-data="{ shown: false }" x-intersect.once="shown = true">

        @foreach($projects as $index => $project)
            <div :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-16'"
                class="bg-linear-to-b from-cosmic-explorer to-haiti rounded-2xl border border-heartless hover:border-dripping-wisteria overflow-hidden transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_10px_30px_rgba(255,212,0,0.1)] flex flex-col group"
                 style="transition-delay: {{ $index * 150 }}ms;">

                {{-- Imagen del Proyecto (desde storage) --}}
                <div class="h-48 w-full overflow-hidden relative border-b border-heartless group-hover:border-cyber-yellow transition-colors duration-500">
                    <img src="{{ asset('storage/' . $project->thumbnail_path) }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-haiti/20 group-hover:bg-transparent transition-colors duration-500"></div>
                </div>

                {{-- Contenido de la Tarjeta --}}
                <div class="p-6 flex flex-col grow">
                    <h3 class="text-xl font-display font-bold text-white mb-3 group-hover:text-cyber-yellow transition-colors">
                        {{ $project->title }}
                    </h3>

                    <p class="text-sm text-monet-magic leading-relaxed mb-6 grow">
                        {{ $project->short_description }}
                    </p>

                    {{-- Tags con iconos --}}
                    <div class="flex flex-wrap gap-2 mb-8">
                        @foreach($project->tags as $tag)
                            <span class="px-3 py-1 text-xs font-mono rounded-full border border-black text-black bg-yellow-300/30 hover:bg-deadly-yellow inline-flex items-center gap-1.5">
                                @if($tag->icon)
                                    <x-dynamic-component :component="'icon-' . $tag->icon" class="w-3 h-3" />
                                @endif
                                {{ $tag->name }}
                            </span>
                        @endforeach
                    </div>

                    {{-- Botones de Acción --}}
                    <div class="flex items-center gap-3 mt-auto">

                        {{-- Botón Principal --}}
                        <a href="/projects/{{ $project->slug }}" wire:navigate
                        class="flex-1 bg-muted-berry/60 hover:bg-cyber-yellow text-white hover:text-haiti py-2.5 rounded-full text-center font-semibold text-sm transition-all duration-300 transform active:scale-95 shadow-[0_0_15px_rgba(155,89,182,0.2)] hover:shadow-[0_0_20px_rgba(255,212,0,0.4)]">
                            Ver Detalles
                        </a>

                        {{-- Botón Privacidad (Lock/Unlock) --}}
                        <button class="w-10 h-10 rounded-full border border-heartless flex items-center justify-center text-monet-magic hover:border-cyber-yellow hover:text-cyber-yellow transition-all duration-300 bg-muted-berry/60"
                                title="{{ $project->is_public ? 'Repositorio Público' : 'Repositorio Privado' }}">
                            @if($project->is_public)
                                <x-icon-unlock class="w-4 h-4" />
                            @else
                                <x-icon-lock-alt class="w-4 h-4" />
                            @endif
                        </button>

                        {{-- Botón Live Demo (Solo si existe URL) --}}
                        @if($project->live_url)
                            <a href="{{ $project->live_url }}" target="_blank" rel="noopener noreferrer"
                                class="w-10 h-10 rounded-full border border-heartless flex items-center justify-center text-monet-magic hover:border-cyber-yellow hover:bg-deadly-yellow transition-all duration-300 bg-muted-berry/60"
                                title="Visitar proyecto en vivo">
                                <x-icon-arrow-top-right class="w-4 h-4" />
                            </a>
                        @endif

                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>
