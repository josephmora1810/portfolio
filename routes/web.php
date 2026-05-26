<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Middleware\SetLocale;

// Redirección base al idioma por defecto (Inglés)
Route::get('/', function () {
    return redirect('/en');
});

// Grupo con prefijo de idioma y nuestro nuevo middleware
Route::prefix('{locale}')->middleware(SetLocale::class)->group(function () {
    
    Volt::route('/', 'home')->name('home');
    Volt::route('/about', 'about-page')->name('about');
    Volt::route('/projects', 'projects')->name('projects');
    Volt::route('/project/{slug}', 'project-details')->name('project.details');
    Volt::route('/playground', 'playground')->name('playground');
    
    Route::get('/cv', function () {
        $locale = app()->getLocale();
        
        $fileName = "CV_Josep_Ricardo_{$locale}.pdf";
        $path = resource_path("assets/{$fileName}");

        return response()->file($path, [
            'Content-Type' => 'application/pdf',
        ]);
    })->name('cv');

});