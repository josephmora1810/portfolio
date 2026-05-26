<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    public function run()
    {
        $tags = [
            ['name' => 'PHP', 'icon' => 'php'],
            ['name' => 'HTML', 'icon' => 'html5'],
            ['name' => 'CSS', 'icon' => 'css3'],
            ['name' => 'Javascript', 'icon' => 'javascript'],
            ['name' => 'Bootstrap', 'icon' => 'bootstrap'],
            ['name' => 'Mysql', 'icon' => 'mysql'],
            ['name' => 'MariaDB', 'icon' => 'mariadb'],
            ['name' => 'Sqlite', 'icon' => 'sqlite'],
            ['name' => 'Laravel', 'icon' => 'laravel'],
            ['name' => 'Livewire', 'icon' => 'livewire'],
            ['name' => 'Tailwind CSS', 'icon' => 'tailwindcss'],
            ['name' => 'Node', 'icon' => 'nodedotjs'],
            ['name' => 'Npm', 'icon' => 'npm'],
            ['name' => 'Alpine.js', 'icon' => 'alpinedotjs'],
            ['name' => 'Kotlin', 'icon' => 'kotlin'],
            ['name' => 'Spring Boot', 'icon' => 'spring'],
            ['name' => 'Spring Web', 'icon' => 'spring'],
            ['name' => 'Spring Security', 'icon' => 'springsecurity'],
            ['name' => 'Jetpack Compose', 'icon' => 'jetpackcompose'],
            ['name' => 'Kotlin Multiplatform', 'icon' => 'kotlin'],
            ['name' => 'Git', 'icon' => 'git'],
            ['name' => 'GitHub', 'icon' => 'github'],
            ['name' => 'Docker', 'icon' => 'docker'],
            ['name' => 'Linux', 'icon' => 'linux'],
            ['name' => 'Apache', 'icon' => 'apache'],
            ['name' => 'Android', 'icon' => 'android'],
            ['name' => 'Firebase', 'icon' => 'firebase'],
            // Backend tags
            ['name' => 'API REST', 'icon' => 'openapiinitiative'],
            ['name' => 'Auth', 'icon' => 'lock'],
            ['name' => 'Caching', 'icon' => 'redis'],
            ['name' => 'Microservices', 'icon' => 'serverless'],
            // Frontend / Design tags
            ['name' => 'UX/UI', 'icon' => 'figma'],
            ['name' => 'Accessibility', 'icon' => 'ux'],
            ['name' => 'Responsive Design', 'icon' => 'mobile'],
            ['name' => 'CSSAnimations', 'icon' => 'laptop-phone'],
        ];

        foreach ($tags as $tag) {
            echo "Seeding tag: " . $tag['name'] . "\n";
            Tag::updateOrCreate(
                ['name' => $tag['name']],
                ['icon' => $tag['icon']]
            );
        }
    }
}
