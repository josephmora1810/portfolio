<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Volt::route('/', 'home')->name('home');
Volt::route('/about', 'about-page')->name('about');
Volt::route('/projects', 'projects')->name('projects');
Volt::route('/project/{id}', 'project-details')->name('project.details');
Volt::route('/playground', 'playground')->name('playground');
Route::get('/cv', fn () => response()->file(resource_path('assets/CV_Josep_Ricardo.pdf')))->name('cv');
