<?php

use function Livewire\Volt\{state};
state(['count' => 0]);
$increment = fn () => $this->count++;

?>

<div x-data="{the: 'text', show: false}">
    <h1>{{ $count }}</h1>
    <button wire:click="increment">+</button>

    <p x-show="show" x-text="the"></p>
    <button x-on:click="show = !show">dss</button>
</div>
