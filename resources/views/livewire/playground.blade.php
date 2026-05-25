<?php

use function Livewire\Volt\{state};

//

?>

<div class="max-w-4xl mx-auto py-16 px-4">
    <h2 class="text-3xl font-display font-bold text-white mb-6">Playground</h2>
    <p class="text-monet-magic mb-10">Un espacio de experimentación en tiempo real. Aquí conecto eventos vía WebSockets para demostrar la comunicación bidireccional entre cliente y servidor.</p>

    {{-- Aquí va el componente de la terminal o chat que visualmente se vea "hacker" --}}
    <div class="bg-black border border-heartless rounded-xl p-6 font-mono text-sm shadow-2xl">
        <div class="flex gap-2 mb-4 border-b border-heartless pb-4">
            <div class="w-3 h-3 rounded-full bg-red-500"></div>
            <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
            <div class="w-3 h-3 rounded-full bg-green-500"></div>
        </div>

        <div id="terminal-output" class="text-cyber-yellow h-64 overflow-y-auto space-y-2">
            <div>> System initialized...</div>
            <div>> Waiting for websocket connection...</div>
            {{-- Aquí se inyectarán los mensajes en tiempo real --}}
        </div>

        <div class="mt-4 flex gap-2">
            <span class="text-white">></span>
            <input type="text" class="bg-transparent border-none outline-none text-white w-full" placeholder="Escribe un comando o mensaje...">
        </div>
    </div>
</div>
