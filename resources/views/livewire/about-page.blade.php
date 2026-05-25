<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-20 overflow-hidden">

    {{-- Hero Section --}}
{{-- Hero Section --}}
    <section class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-32 items-center"
        x-data="{ shown: false }"
        x-init="setTimeout(() => shown = true, 100);"
    >

        {{-- TEXTO: Abajo en móvil (order-2), a la izquierda en tablet/desktop (md:order-1) --}}
        <div :class="shown ? 'opacity-100 translate-x-0' : 'opacity-0 -translate-x-12'"
            class="order-2 md:order-1 transition-all duration-1000 ease-out transform">
            <h1 class="text-5xl md:text-6xl font-display font-bold mb-6 leading-tight">
                <span class="text-white">Sobre</span>
                <span class="bg-linear-to-r from-cyber-yellow via-deadly-yellow to-dripping-wisteria bg-clip-text text-transparent">mí</span>
            </h1>
            <div class="space-y-6 text-monet-magic leading-relaxed text-lg font-sans">
                <p>
                    Soy un ingeniero de sistemas de 23 años apasionado por la construcción de arquitecturas sólidas y el desarrollo multiplataforma. Me especializo en ecosistemas modernos, trabajando activamente con el TALL stack y el entorno de Kotlin.
                </p>
                <p>
                    Cuando no estoy escribiendo código, suelo investigar sobre ciberseguridad, explorando distribuciones como Kali Linux, o me sumerjo en mi otra gran pasión: la preservación de software y el hardware retro, especialmente en consolas portátiles y ports nativos para PC.
                </p>
                <p class="border-l-4 border-cyber-yellow pl-4 italic text-dripping-wisteria">
                    "Siempre busco el equilibrio perfecto entre un backend robusto y una experiencia de usuario impecable."
                </p>
            </div>
        </div>

        {{-- IMAGEN: Arriba en móvil (order-1), a la derecha en tablet/desktop (md:order-2) --}}
        <div :class="shown ? 'opacity-100 translate-x-0' : 'opacity-0 translate-x-12'"
            class="order-1 md:order-2 transition-all duration-1000 ease-out delay-200 transform flex justify-center md:justify-end relative">

            <div class="absolute inset-0 bg-cyber-yellow rounded-2xl blur-3xl opacity-20 animate-pulse"></div>

            <div class="w-72 h-80 rounded-2xl bg-cosmic-explorer/80 backdrop-blur-sm border border-heartless flex flex-col items-center justify-center text-dripping-wisteria shadow-[0_0_30px_rgba(94,13,71,0.5)] relative overflow-hidden group hover:border-cyber-yellow transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_10px_40px_rgba(255,212,0,0.2)]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mb-4 opacity-50 group-hover:text-cyber-yellow group-hover:scale-125 group-hover:rotate-6 transition-all duration-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span class="text-sm font-medium tracking-widest uppercase group-hover:text-cyber-yellow transition-colors">Tu Fotografía</span>
            </div>
        </div>
    </section>

    {{-- Skills Section --}}
    <section x-data="{ shown: false }"
        x-intersect.half="shown = true"
        class="mb-32 relative">

        <h2 :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'"
            class="text-4xl font-display font-bold mb-12 flex items-center gap-4 transition-all duration-700 ease-out">
            <span class="text-cyber-yellow">#</span> Stack Tecnológico
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-16'"
                class="group bg-linear-to-b from-cosmic-explorer to-eggplant rounded-2xl p-8 border border-heartless hover:border-dripping-wisteria transition-all duration-500 ease-out delay-100 shadow-xl hover:-translate-y-3">
                <h3 class="text-xl font-display font-semibold mb-6 text-white group-hover:text-cyber-yellow transition-colors">PHP & Web</h3>
                <div class="flex flex-wrap gap-2.5">
                    <span class="px-3 py-1.5 text-xs font-semibold tracking-wide rounded-md bg-eggplant border border-heartless text-monet-magic shadow-inner">Laravel</span>
                    <span class="px-3 py-1.5 text-xs font-semibold tracking-wide rounded-md bg-eggplant border border-heartless text-monet-magic shadow-inner">Livewire</span>
                    <span class="px-3 py-1.5 text-xs font-semibold tracking-wide rounded-md bg-eggplant border border-heartless text-monet-magic shadow-inner">Alpine.js</span>
                    <span class="px-3 py-1.5 text-xs font-semibold tracking-wide rounded-md bg-eggplant border border-heartless text-monet-magic shadow-inner">Tailwind CSS</span>
                </div>
            </div>

            <div :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-16'"
                class="group bg-linear-to-b from-cosmic-explorer to-eggplant rounded-2xl p-8 border border-heartless hover:border-dripping-wisteria transition-all duration-500 ease-out delay-200 shadow-xl hover:-translate-y-3">
                <h3 class="text-xl font-display font-semibold mb-6 text-white group-hover:text-cyber-yellow transition-colors">Kotlin Ecosystem</h3>
                <div class="flex flex-wrap gap-2.5">
                    <span class="px-3 py-1.5 text-xs font-semibold tracking-wide rounded-md bg-eggplant border border-heartless text-monet-magic shadow-inner">Spring Boot</span>
                    <span class="px-3 py-1.5 text-xs font-semibold tracking-wide rounded-md bg-eggplant border border-heartless text-monet-magic shadow-inner">Kotlin Multiplatform</span>
                    <span class="px-3 py-1.5 text-xs font-semibold tracking-wide rounded-md bg-eggplant border border-heartless text-monet-magic shadow-inner">Jetpack Compose</span>
                </div>
            </div>

            <div :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-16'"
                class="group bg-linear-to-b from-cosmic-explorer to-eggplant rounded-2xl p-8 border border-heartless hover:border-dripping-wisteria transition-all duration-500 ease-out delay-300 shadow-xl hover:-translate-y-3">
                <h3 class="text-xl font-display font-semibold mb-6 text-white group-hover:text-cyber-yellow transition-colors">Herramientas</h3>
                <div class="flex flex-wrap gap-2.5">
                    <span class="px-3 py-1.5 text-xs font-semibold tracking-wide rounded-md bg-eggplant border border-heartless text-monet-magic shadow-inner">MySQL / JWT</span>
                    <span class="px-3 py-1.5 text-xs font-semibold tracking-wide rounded-md bg-eggplant border border-heartless text-monet-magic shadow-inner">Linux / Termux</span>
                    <span class="px-3 py-1.5 text-xs font-semibold tracking-wide rounded-md bg-eggplant border border-heartless text-monet-magic shadow-inner">Diseño de APIs</span>
                </div>
            </div>
        </div>
    </section>

    {{-- Projects Section --}}
    <section x-data="{ shown: false }"
        x-intersect="shown = true"
        class="mb-10">

        <h2 :class="shown ? 'opacity-100 translate-x-0' : 'opacity-0 -translate-x-10'"
            class="text-4xl font-display font-bold mb-12 flex items-center gap-4 transition-all duration-700 ease-out">
            <span class="text-cyber-yellow">#</span> Proyectos Destacados
        </h2>

        <div class="relative ml-6 md:ml-12 border-l-2 border-heartless space-y-16 pb-8">

            <div :class="shown ? 'opacity-100 translate-x-0' : 'opacity-0 translate-x-16'"
                class="relative pl-10 md:pl-16 transition-all duration-700 ease-out delay-100">
                <div class="absolute -left-3.5 top-2 bg-cyber-yellow w-7 h-7 rounded-full border-4 border-eggplant shadow-[0_0_10px_rgba(255,212,0,0.5)]">
                    <div class="absolute inset-0 rounded-full bg-cyber-yellow animate-ping opacity-20"></div>
                </div>

                <div class="group bg-cosmic-explorer/50 backdrop-blur-md rounded-2xl p-6 md:p-8 border border-heartless hover:border-cyber-yellow transition-all duration-500 hover:bg-cosmic-explorer hover:shadow-[0_0_30px_rgba(255,212,0,0.05)] cursor-pointer">
                    <h3 class="text-xl font-display font-bold text-white group-hover:text-cyber-yellow transition-colors">App de Gestión Financiera</h3>
                    <p class="text-dripping-wisteria font-mono text-sm mt-2 mb-4 tracking-tight">PLATAFORMA ESTILO QUICKBOOKS</p>
                    <p class="text-monet-magic text-sm md:text-base leading-relaxed">
                        Desarrollo de una aplicación web diseñada para facilitar la gestión contable de dueños de negocios, simplificando procesos financieros complejos mediante una interfaz intuitiva y limpia.
                    </p>
                </div>
            </div>

            <div :class="shown ? 'opacity-100 translate-x-0' : 'opacity-0 translate-x-16'"
                class="relative pl-10 md:pl-16 transition-all duration-700 ease-out delay-300">
                <div class="absolute -left-3.5 top-2 bg-cyber-yellow w-7 h-7 rounded-full border-4 border-eggplant shadow-[0_0_10px_rgba(255,212,0,0.5)]">
                    <div class="absolute inset-0 rounded-full bg-cyber-yellow animate-ping opacity-20"></div>
                </div>

                <div class="group bg-cosmic-explorer/50 backdrop-blur-md rounded-2xl p-6 md:p-8 border border-heartless hover:border-cyber-yellow transition-all duration-500 hover:bg-cosmic-explorer hover:shadow-[0_0_30px_rgba(255,212,0,0.05)] cursor-pointer">
                    <h3 class="text-xl font-display font-bold text-white group-hover:text-cyber-yellow transition-colors">memora-app</h3>
                    <p class="text-dripping-wisteria font-mono text-sm mt-2 mb-4 tracking-tight">KOTLIN MULTIPLATFORM APP</p>
                    <p class="text-monet-magic text-sm md:text-base leading-relaxed">
                        Aplicación desarrollada utilizando Kotlin Multiplatform. Implementación de backend robusto con Spring Boot y autenticación segura mediante JWT interactuando con bases de datos MySQL.
                    </p>
                </div>
            </div>

        </div>
    </section>

</div>
