<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Certification;

class CertificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    $items = [
        [
            'type' => 'course',
            'title' => 'Introducción a Docker para Principiantes',
            'slug' => 'introduccion-a-docker-para-principiantes',
            'short_description_es' => 'Aprende los pilares fundamentales de Docker con la creación de imagenes y el despliegue de contenedores de software.',
            'short_description_en' => 'Learn the fundamentals of Docker with image creation and software container deployment.',
            'certificate_url' => 'certifications/Docker.pdf',
            'date' => '2026-01-29',
            'extra_info' => 'Udemy',
            'order' => 1,
        ],
        [
            'type' => 'course',
            'title' => 'Android App Development with Kotlin | Beginner to Advanced',
            'slug' => 'kotlin-android',
            'short_description_es' => 'Kotlin | Desarrollo de Apps Android con Kotlin Android A-Z, Firebase Android, Android Studio, Proyectos de Desarrollo Android',
            'short_description_en' => 'Kotlin | Android App Development with Kotlin Android A-Z, Firebase Android, Android Studio, Android Development projects',
            'certificate_url' => 'hcertifications/AndroidAppDev.pdf',
            'date' => '2026-01-17',
            'extra_info' => 'Udemy',
            'order' => 2,
        ],
        [
            'type' => 'event',
            'title' => 'IATechDay Caracas 2025',
            'slug' => 'iatechday-2025',
            'short_description_es' => '1era Jornada tecnológica sobre IA aplicada a la industria tecnológica y al marketing digital',
            'short_description_en' => '1st Tech conference on AI applied to industry and digital marketing',
            'certificate_url' => 'certifications/IATechDay.pdf',
            'date' => '2024-11-09',
            'extra_info' => 'Caracas, Venezuela',
            'order' => 1,
        ],
    ];

    foreach ($items as $item) {
        Certification::updateOrCreate(['slug' => $item['slug']], $item);
    }
}
}
