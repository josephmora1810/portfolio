<?php
use function Livewire\Volt\{state, with};
use App\Models\{Project, Tag, Certification};

with(fn () => [
    'projects' => Project::select('title','short_description_es', 'short_description_en', 'year')
        ->latest()->take(5)->get(),
    'certifications' => Certification::orderBy('date')->get()
]);

state([
    'techStack' => [
        [
            'title' => 'ui.about.stack.web_modern.title',
            'short_description' => 'ui.about.stack.web_modern.desc',
            'tags' => Tag::whereIn('name', ['PHP','Node','Npm','Laravel', 'Livewire', 'Alpine.js', 'Tailwind CSS','Mysql', 'MariaDB'])
                        ->get(['name', 'icon'])
                        ->toArray()
        ],
        [
            'title' => 'ui.about.stack.web_basic.title',
            'short_description' => 'ui.about.stack.web_basic.desc',
            'tags' => Tag::whereIn('name', ['HTML', 'CSS','Javascript','Bootstrap', 'Sqlite','Apache'])
                        ->get(['name', 'icon'])
                        ->toArray()
        ],
        [
            'title' => 'ui.about.stack.kotlin.title',
            'short_description' => 'ui.about.stack.kotlin.desc',
            'tags' => Tag::whereIn('name', ['Kotlin', 'Android','Firebase','Spring Boot','Spring Web', 'Spring Security','Kotlin Multiplatform', 'Jetpack Compose'])
                        ->get(['name', 'icon'])
                        ->toArray()
        ],
        [
            'title' => 'ui.about.stack.vcs.title',
            'short_description' => 'ui.about.stack.vcs.desc',
            'tags' => Tag::whereIn('name', ['Git', 'GitHub'])
                        ->get(['name', 'icon'])
                        ->toArray()
        ],
        [
            'title' => 'ui.about.stack.backend.title',
            'short_description' => 'ui.about.stack.backend.desc',
            'tags' => Tag::whereIn('name', ['API REST','Linux', 'Auth', 'Caching', 'Microservices', 'Docker', 'Redis'])
                        ->get(['name', 'icon'])
                        ->toArray()
        ],
        [
            'title' => 'ui.about.stack.frontend.title',
            'short_description' => 'ui.about.stack.frontend.desc',
            'tags' => Tag::whereIn('name', ['UX/UI', 'Accessibility', 'Responsive Design', 'CSSAnimations', 'Figma', 'CSS'])
                        ->get(['name', 'icon'])
                        ->toArray()
        ]
    ]
]);

?>

<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-20 overflow-visible">

    {{-- Hero Section --}}
    <section class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-32 items-center"
        x-data="{ shown: false }"
        x-init="setTimeout(() => shown = true, 100);"
    >
        {{-- TEXTO --}}
        <div :class="shown ? 'opacity-100 translate-x-0' : 'opacity-0 -translate-x-12'"
            class="order-2 md:order-1 transition-all duration-1000 ease-out transform">
            <h1 class="text-5xl md:text-6xl font-display font-bold mb-6 leading-tight">
                <span class="text-white">{{ __('ui.about.title_1') }}</span>
                <span class="bg-linear-to-r from-cyber-yellow via-deadly-yellow to-dripping-wisteria bg-clip-text text-transparent">{{ __('ui.about.title_2') }}</span>
            </h1>
            <div class="space-y-6 text-monet-magic leading-relaxed text-lg font-sans">
                <p>{{ __('ui.about.bio_p1') }}</p>
                <p>{{ __('ui.about.bio_p2') }}</p>
                <p class="border-l-4 border-cyber-yellow pl-4 italic text-dripping-wisteria">
                    {{ __('ui.about.quote') }}
                </p>
            </div>
        </div>

        {{-- IMAGEN --}}
        <div :class="shown ? 'opacity-100 translate-x-0' : 'opacity-0 translate-x-12'"
            class="order-1 md:order-2 transition-all duration-1000 ease-out delay-200 transform flex justify-center md:justify-end relative">
            <div class="absolute inset-1 bg-cyber-yellow rounded-3xl blur-3xl opacity-20 animate-pulse "></div>
            <div class="w-72 h-80 rounded-2xl bg-cosmic-explorer/80 backdrop-blur-sm border border-heartless flex flex-col items-center justify-center text-dripping-wisteria shadow-[0_0_30px_rgba(94,13,71,0.5)] relative overflow-hidden group hover:border-cyber-yellow transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_10px_40px_rgba(255,212,0,0.2)]">
                <img src="{{ asset('storage/photo.jpeg') }}" alt="Foto de perfil" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
            </div>
        </div>
    </section>

    {{-- Skills Section --}}
    <section x-data="{ shown: false }"
        x-intersect.half="shown = true"
        class="mb-32 relative">

        <h2 :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'"
            class="text-4xl font-display font-bold mb-12 flex items-center gap-4 transition-all duration-700 ease-out">
            <span class="text-cyber-yellow">#</span> {{ __('ui.about.sections.stack') }}
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach ($techStack as $st)
                <div :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-16'"
                    class="group flex flex-col h-full bg-linear-to-b from-cosmic-explorer to-haiti rounded-2xl p-8 border border-heartless hover:border-dripping-wisteria transition-all duration-500 ease-out delay-100 shadow-xl hover:-translate-y-3">
                    
                    <div>
                        <h3 class="text-xl font-display font-semibold mb-1 text-white group-hover:text-cyber-yellow transition-colors">
                            {{ __($st['title']) }}
                        </h3>
                        <p class="text-xs text-gray-300/50 mb-6">
                            {{ __($st['short_description']) }}
                        </p>
                    </div>

                    {{-- mt-auto empuja los tags al fondo para que todas las cards alineen perfecto --}}
                    <div class="mt-auto flex flex-wrap gap-2.5">
                        @foreach ($st['tags'] as $tag)
                            <span class="px-3 py-1.5 text-xs font-semibold tracking-wide rounded-md bg-haiti border border-heartless text-monet-magic hover:border-deadly-yellow hover:text-deadly-yellow shadow-inner inline-flex items-center gap-1.5">
                                @if($tag['icon'])
                                    <x-dynamic-component :component="'icon-' . $tag['icon']" class="w-3.5 h-3.5 shrink-0 text-white" />
                                @endif
                                {{ $tag['name'] }}
                            </span>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Certificaciones --}}
    <section x-data="{ shown: false }"
        x-intersect.half="shown = true"
        class="mb-32 relative">

        <h2 :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'"
            class="text-4xl font-display font-bold mb-12 flex items-center gap-4 transition-all duration-700 ease-out">
            <span class="text-cyber-yellow">#</span> {{ __('ui.about.sections.certs') }}
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach ($certifications as $cert)
                <article :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-16'"
                    class="group flex h-full flex-col rounded-4xl border border-heartless bg-cosmic-explorer/80 p-6 shadow-[0_20px_80px_rgba(0,0,0,0.2)] transition-all duration-500 ease-out delay-100 hover:-translate-y-2 hover:border-cyber-yellow hover:bg-cosmic-explorer">
                    <div>
                        <div class="flex items-start justify-between gap-4 mb-6">
                            <div>
                                <h3 class="text-md font-display font-semibold text-white group-hover:text-cyber-yellow transition-colors">{{ $cert->title }}</h3>
                            </div>
                            <span class="inline-flex items-center rounded-full border border-cyber-yellow/40 bg-cyber-yellow/10 px-3 py-1 text-xs font-semibold text-cyber-yellow">
                                {{ __('ui.about.certs_types.' . $cert->type) }}
                            </span>
                        </div>

                        {{-- Descripción dinámica según idioma activo --}}
                        <p class="text-monet-magic text-xs leading-relaxed mb-6 min-h-20">
                            {{ $cert->{'short_description_' . app()->getLocale()} }}
                        </p>
                    </div>

                    <div class="mt-auto flex flex-wrap items-center gap-3 pt-4 border-t border-heartless/20">
                        <a href="{{ asset('storage/' . $cert->certificate_url) }}" target="_blank" rel="noopener noreferrer"
                            class="inline-flex items-center justify-center rounded-full bg-yellow-300/50 px-4 py-2 text-sm font-semibold text-haiti transition-colors duration-300 hover:bg-yellow-300 hover:text-haiti shadow-[0_0_20px_rgba(255,212,0,0.25)]">
                            {{ __('ui.about.view_certificate') }}
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    {{-- Projects Section --}}
    <section x-data="{ shown: false }"
        x-intersect="shown = true"
        class="mb-10">

        <h2 :class="shown ? 'opacity-100 translate-x-0' : 'opacity-0 -translate-x-10'"
            class="text-4xl font-display font-bold mb-12 flex items-center gap-4 transition-all duration-700 ease-out">
            <span class="text-cyber-yellow">#</span> {{ __('ui.about.sections.projects') }}
        </h2>

        <div class="relative ml-6 md:ml-12 border-l-2 border-heartless space-y-16 pb-8">
            @foreach ($projects as $project)
                <div :class="shown ? 'opacity-100 translate-x-0' : 'opacity-0 translate-x-16'"
                class="relative pl-10 md:pl-16 transition-all duration-700 ease-out delay-100">
                    <div class="absolute -left-3.5 top-2 bg-cyber-yellow w-7 h-7 rounded-full border-4 border-haiti shadow-[0_0_10px_rgba(255,212,0,0.5)]">
                        <div class="absolute inset-0 rounded-full bg-cyber-yellow animate-ping opacity-20"></div>
                    </div>

                    <div class="group bg-cosmic-explorer/50 backdrop-blur-md rounded-2xl p-6 md:p-8 border border-heartless hover:border-cyber-yellow transition-all duration-500 hover:bg-cosmic-explorer hover:shadow-[0_0_30px_rgba(255,212,0,0.05)] cursor-pointer">
                        <h3 class="text-xl font-display font-bold text-white group-hover:text-cyber-yellow transition-colors">{{ $project['title'] }}</h3>
                        <p class="text-dripping-wisteria font-mono text-sm mt-2 mb-4 tracking-tight">{{ $project['year'] }}</p>
                        <p class="text-monet-magic text-sm md:text-base leading-relaxed">
                            {{ $project['short_description_' . app()->getLocale()] }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

</div>