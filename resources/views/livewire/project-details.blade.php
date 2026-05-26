<?php

use function Livewire\Volt\{state, mount};
use App\Models\Project;
use Illuminate\Support\Str;

// Estado del componente
state(['project' => null]);

// Se ejecuta al cargar la página, recibe el {slug} de la URL y busca el registro correcto
mount(function (string $slug) {
    $this->project = Project::where('slug', $slug)->with('tags')->firstOrFail();
});

?>

<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12 overflow-visible relative" 
        x-data="{ shown: false }" 
        x-init="setTimeout(() => shown = true, 100)">

    {{-- Efecto de fondo sutil --}}
    <div class="absolute top-0 right-1/4 w-96 h-96 bg-dripping-wisteria rounded-full blur-[150px] opacity-10 pointer-events-none"></div>

    {{-- Botón de regreso --}}
    <div class="mb-10" :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 -translate-y-4'" class="transition-all duration-500 ease-out">
        <a href="{{ route('projects') }}" wire:navigate 
            class="inline-flex items-center gap-2.5 px-5 py-2.5 rounded-full border border-heartless bg-cosmic-explorer/30 backdrop-blur-sm text-monet-magic hover:text-cyber-yellow hover:border-cyber-yellow transition-all duration-300 group text-sm font-medium">
            <x-icon-arrow-left class="w-4 h-4 text-white" />
            {{ __('ui.project_details.back') }}
        </a>
    </div>

    {{-- Cabecera del Proyecto --}}
    <header :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'" class="transition-all duration-700 ease-out mb-12">
        <div class="flex flex-col gap-4 mb-4">
            <span class="font-mono text-sm tracking-widest text-dripping-wisteria uppercase">{{ $project->year }}</span>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-display font-bold text-white leading-none tracking-tight">
                {{ $project->title }}
            </h1>
        </div>

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 pt-4 border-t border-heartless/30">
            {{-- Listado de tags principales --}}
            <div class="flex flex-wrap gap-2">
                @foreach($project->tags as $tag)
                    <span class="px-3 py-1.5 text-xs font-semibold tracking-wide rounded-md bg-haiti border border-heartless text-monet-magic inline-flex items-center gap-1.5">
                        @if($tag->icon)
                            <x-dynamic-component :component="'icon-' . $tag->icon" class="w-3.5 h-3.5 text-white" />
                        @endif
                        {{ $tag->name }}
                    </span>
                @endforeach
            </div>

            {{-- Botones de Enlace (Privacidad y Live) --}}
            <div class="flex items-center gap-4 shrink-0">
                <div class="flex items-center gap-2 px-4 py-2 rounded-full border border-heartless bg-cosmic-explorer/50 backdrop-blur-sm text-monet-magic text-xs font-medium font-mono">
                    @if($project->is_public)
                        <x-icon-unlock class="w-3.5 h-3.5 text-cyber-yellow animate-pulse" />
                        <span class="text-white">{{ __('ui.project_details.public') }}</span>
                    @else
                        <x-icon-lock-alt class="w-3.5 h-3.5 text-rose-400" />
                        <span>{{ __('ui.project_details.private') }}</span>
                    @endif
                </div>

                @if($project->live_url)
                    <a href="{{ $project->live_url }}" target="_blank" rel="noopener noreferrer"
                        class="flex items-center gap-2 px-6 py-2.5 rounded-full bg-dripping-wisteria text-white hover:bg-cyber-yellow hover:text-haiti transition-all duration-300 font-semibold text-sm shadow-[0_0_20px_rgba(155,89,182,0.3)] hover:shadow-[0_0_25px_rgba(255,212,0,0.5)] transform hover:-translate-y-0.5">
                        <span>{{ __('ui.project_details.live') }}</span>
                        <x-icon-arrow-top-right class="w-3.5 h-3.5" />
                    </a>
                @endif
            </div>
        </div>
    </header>

    {{-- Imagen Principal --}}
    <div :class="shown ? 'opacity-100 scale-100' : 'opacity-0 scale-95'" 
            class="duration-1000 ease-out delay-200 w-full h-64 sm:h-96 md:h-120 rounded-3xl overflow-hidden mb-16 border border-heartless relative group shadow-[0_20px_50px_rgba(0,0,0,0.4)] hover:border-dripping-wisteria transition-colors">
        <img src="{{ asset('storage/' . $project->thumbnail_path) }}" alt="Thumbnail de {{ $project->title }}" class="w-full h-full object-cover group-hover:scale-102 transition-transform duration-700">
        <div class="absolute inset-0 bg-linear-to-t from-haiti via-transparent to-transparent opacity-60"></div>
    </div>

    {{-- Contenido Estructurado --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 mb-20">
        
        {{-- Bloque de descripción principal (Markdown parseado con Tailwind Prose) --}}
        <div :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'" 
                class="transition-all duration-700 ease-out delay-300 lg:col-span-2 prose prose-invert max-w-none focus:outline-none wrap-break-words overflow-auto">
            
            <h2 class="text-2xl font-bold mb-6 text-white font-display flex items-center gap-2">
                <span class="text-cyber-yellow wrap-break-words">//</span> {{ __('ui.project_details.about') }}
            </h2>
            
            <div class="text-monet-magic/90 tracking-wide font-sans markdown-content">
                {{-- Aquí ocurre la magia del formateo automático --}}
                {!! Str::markdown($project->{'content_' . app()->getLocale()}) !!}
            </div>
        </div>

        {{-- Widget lateral (Resumen de Metadatos) --}}
        <div :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'" 
                class="transition-all duration-700 ease-out delay-400">
            <div class="bg-linear-to-b from-cosmic-explorer to-haiti border border-heartless rounded-2xl p-6 shadow-xl relative overflow-hidden group hover:border-heartless/80">
                
                <h3 class="text-white font-display font-bold mb-4 text-lg tracking-wide flex items-center gap-2">
                    <span class="w-1.5 h-1.5 bg-cyber-yellow rounded-full"></span> {{ __('ui.project_details.summary') }}
                </h3>
                
                <p class="text-monet-magic text-sm leading-relaxed mb-6">
                    {{ $project->{'short_description_' . app()->getLocale()} }}
                </p>

                <hr class="border-heartless/40 mb-6">

                <h3 class="text-white font-display font-bold mb-4 text-lg tracking-wide flex items-center gap-2">
                    <span class="w-1.5 h-1.5 bg-dripping-wisteria rounded-full"></span> {{ __('ui.project_details.key_tech') }}
                </h3>
                
                <div class="flex flex-wrap gap-2">
                    @foreach($project->tags as $tag)
                        <span class="px-2.5 py-1 text-xs font-mono rounded bg-haiti/60 border border-heartless/60 text-dripping-wisteria hover:border-deadly-yellow hover:text-deadly-yellow transition-colors">
                            {{ $tag->name }}
                        </span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- Galería de Imágenes Adicionales --}}
    @if(is_countable($project->gallery) && count($project->gallery) > 0)
        <div :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'" 
                class="transition-all duration-700 ease-out delay-500 pt-12 border-t border-heartless/30">
            
            <h2 class="text-3xl font-display font-bold text-white mb-8 flex items-center gap-3">
                <span class="text-cyber-yellow">#</span> {{ __('ui.project_details.gallery') }}
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($project->gallery as $index => $image)
                    <div class="h-64 rounded-2xl overflow-hidden border border-heartless bg-cosmic-explorer/40 hover:border-cyber-yellow shadow-md transition-all duration-500 group cursor-pointer hover:-translate-y-1">
                        <img src="{{ asset('storage/' . $image) }}" alt="Captura de pantalla {{ $index + 1 }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    </div>
                @endforeach
            </div>
        </div>
    @endif

</div>