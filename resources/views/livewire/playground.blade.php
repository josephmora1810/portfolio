<?php

use function Livewire\Volt\{state, mount};
use Illuminate\Support\Facades\Lang;
use App\Models\Message;

state([
    'username' => '',
    'newMessage' => '',
    'messages' => []
]);

// Se ejecuta solo una vez al cargar el componente
mount(function () {
    $prefixes = ['guest', 'anon', 'hacker', 'node', 'bot', 'cipher', 'null', 'void'];
    $this->username = $prefixes[array_rand($prefixes)] . '_' . rand(1000, 9999);

    $this->loadMessages();
});

$loadMessages = function () {
    $this->messages = Message::latest()->take(7)->get()->reverse()->values();
};

// Acción para enviar el mensaje
$sendMessage = function () {
    $validated = trim($this->newMessage);
    
    if (empty($validated)) return;

    Message::create([
        'username' => $this->username,
        'message' => $validated
    ]);

    $parts = explode(' ', strtolower($validated));
    $baseCommand = $parts[0];

    if (Lang::has("commands.{$baseCommand}")) {
        // Crear la respuesta automática del sistema con la traducción correspondiente
        Message::create([
            'username' => 'root', // Un alias para el bot del sistema
            'message' => __("commands.{$baseCommand}")
        ]);
    }

    $this->newMessage = '';
    $this->loadMessages();
    $this->dispatch('message-sent');
};

?>

<div class="max-w-4xl mx-auto py-16 px-4" 
        x-data="{ shown: false }" 
        x-init="setTimeout(() => shown = true, 100)">
    
    {{-- Cabecera con animación --}}
    <div :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'" 
            class="transition-all duration-700 ease-out mb-12">
        
        <h2 class="text-4xl font-display font-bold text-white mb-4 flex items-center gap-3">
            <span class="text-cyber-yellow">>_</span> {{ __('ui.playground.title') }}
        </h2>
        
        <p class="text-monet-magic text-lg leading-relaxed max-w-3xl">
            {!! __('ui.playground.description') !!}
        </p>
    </div>

    {{-- Contenedor de la Terminal --}}
    <div :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-12'" 
            class="transition-all duration-700 ease-out delay-200">
        
        <div class="bg-[#0a0a0a] border border-heartless rounded-2xl p-6 font-mono text-sm shadow-[0_0_40px_rgba(255,212,0,0.05)] relative overflow-hidden group hover:border-dripping-wisteria/60 transition-colors duration-500"
                x-data="{ 
                    init() {
                        // Escuchar el evento de Livewire al enviar un mensaje para hacer scroll
                        Livewire.on('message-sent', () => this.scrollToBottom());
                        
                        // Hacer scroll inicial
                        setTimeout(() => this.scrollToBottom(), 300);
                    },
                    scrollToBottom() {
                        this.$refs.chatContainer.scrollTop = this.$refs.chatContainer.scrollHeight;
                    }
                }">
            
            {{-- Botones estilo macOS --}}
            <div class="flex gap-2.5 mb-6 border-b border-heartless/50 pb-4">
                <div class="w-3 h-3 rounded-full bg-red-500/80 shadow-[0_0_10px_rgba(239,68,68,0.5)]"></div>
                <div class="w-3 h-3 rounded-full bg-cyber-yellow/80 shadow-[0_0_10px_rgba(255,212,0,0.5)]"></div>
                <div class="w-3 h-3 rounded-full bg-green-500/80 shadow-[0_0_10px_rgba(34,197,94,0.5)]"></div>
                <span class="ml-auto text-xs text-heartless font-sans">bash — 80x24</span>
            </div>

            {{-- Área de Mensajes (Polling cada 2.5 segundos) --}}
            <div x-ref="chatContainer" 
                    wire:poll.2500ms="loadMessages" 
                    class="h-80 overflow-y-auto space-y-1.5 pb-4 pr-2 scroll-smooth scrollbar-thin scrollbar-thumb-heartless scrollbar-track-transparent">
                
                    <div class="text-green-500/70 mb-4 opacity-80 select-none">
                        <div>> {{ __('ui.playground.system_init') }}</div>
                        <div>> {{ __('ui.playground.secure_conn') }}</div>
                        <div>> {{ __('ui.playground.welcome') }}, <span class="text-white">{{ $username }}</span>.</div>
                        <div class="mt-2 text-heartless">{{ __('ui.playground.log_start') }}</div>
                    </div>

                    @foreach($messages as $msg)
                        <div class="wrap-break-words">
                            @if($msg->username === 'root')
                                {{-- Estilo para la respuesta automática del sistema --}}
                                <span class="text-heartless font-bold">[SYSTEM]</span>
                                <span class="text-green-400 ml-2 font-mono">{{ $msg->message }}</span>
                            @else
                                {{-- Estilo normal para usuarios invitados --}}
                                <span class="text-dripping-wisteria font-semibold">{{ $msg->username }}</span><span class="text-heartless">@</span><span class="text-monet-magic">system</span><span class="text-white">:~$</span> 
                                <span class="text-cyber-yellow ml-2">{{ $msg->message }}</span>
                            @endif
                        </div>
                    @endforeach
            </div>

            {{-- Input Formulario --}}
            <div class="mt-4 border-t border-heartless/50 pt-4 flex gap-2 items-center">
                <span class="text-dripping-wisteria font-semibold">{{ $username }}</span><span class="text-heartless">@</span><span class="text-monet-magic">system</span><span class="text-white">:~$</span>
                
                <form wire:submit="sendMessage" class="flex-1 flex items-center">
                    <input type="text" 
                        wire:model="newMessage" 
                        class="bg-transparent border-none outline-none text-cyber-yellow w-full placeholder-heartless font-mono focus:ring-0 px-2" 
                        placeholder="{{ __('ui.playground.placeholder') }}"
                        autocomplete="off"
                        autofocus>
                </form>

                {{-- Loading indicator para el request --}}
                <div wire:loading wire:target="sendMessage" class="w-4 h-4 border-2 border-cyber-yellow border-t-transparent rounded-full animate-spin shrink-0"></div>
            </div>
            
            {{-- Efecto de scanline de terminal retro --}}
            <div class="absolute inset-0 pointer-events-none bg-[linear-gradient(rgba(18,16,16,0)_50%,rgba(0,0,0,0.25)_50%),linear-gradient(90deg,rgba(255,0,0,0.06),rgba(0,255,0,0.02),rgba(0,0,255,0.06))] bg-size-[100%_4px,3px_100%] opacity-20"></div>
        </div>
    </div>
</div>