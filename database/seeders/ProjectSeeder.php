<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use App\Models\Tag;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        // Obtener tags una sola vez
        $allTags = Tag::all()->keyBy('name');

        $getTagIds = function ($tagNames) use ($allTags) {
            $ids = [];
            foreach ($tagNames as $name) {
                if (isset($allTags[$name])) {
                    $ids[] = $allTags[$name]->id;
                } else {
                    $this->command->warn("Tag '{$name}' no encontrado, omitido.");
                }
            }
            return $ids;
        };

        // ----------------------------------------------
        // Proyecto 1: La Venezolana
        // ----------------------------------------------
        $this->command->info('Creando proyecto: La Venezolana...');
        $project1Tags = $getTagIds(['PHP', 'Laravel', 'Bootstrap', 'Mysql', 'Javascript', 'Apache', 'Linux']);

        $project1 = Project::updateOrCreate(
            ['slug' => 'canal.lavenezolanadeseguros'],
            [
                'title' => 'La Venezolana de Seguros y Vida',
                'short_description_es' => 'Sistema integral de gestión de pólizas, clientes y comisiones para un canal alterno de seguros.',
                'short_description_en' => 'Comprehensive policy, client, and commission management system for an alternative insurance channel.',
                'content_es' => <<<TEXT
                    **Contexto:** Desarrollé un sistema completo para un canal alterno de la aseguradora "La Venezolana", especializado en pólizas de Responsabilidad Civil Vehículos (RCV). El sistema permite a los agentes de seguros gestionar pólizas, clientes, pagos y comisiones de forma centralizada.\n

                    **Arquitectura & Base de Datos:**  
                    - Modelado relacional con MySQL: tablas principales `polizas`, `clientes`, `vehiculos`, `coberturas`, `pagos`, `comisiones`. Relaciones Eloquent (hasMany, belongsTo).  
                    - Uso de migraciones, seeders y fábricas para datos de prueba.  
                    - Consultas optimizadas con índices y eager loading para reportes.\n

                    **Backend (Laravel + Livewire):**  
                    - Autenticación con roles: agentes (solo ven sus clientes) y administradores (gestión global).  
                    - Panel de administración con Livewire para CRUD de pólizas, gestión de comisiones y generación de reportes en PDF (Dompdf) y Excel (Laravel Excel).  
                    - API REST para validación de coberturas y cálculo de primas en tiempo real.\n

                    **Frontend & UX/UI:**  
                    - Diseño responsive con Bootstrap 5, con paleta corporativa de la aseguradora.  
                    - Formularios dinámicos con JavaScript para cotizaciones (cálculo automático de primas).  
                    - Tablas interactivas con datatables y modales para confirmación de acciones.  
                    - Notificaciones toastr para feedback al usuario.\n

                    **Logros:**  
                    - Reducción del 70% en tiempo de emisión de pólizas (de 2 días a 2 horas).  
                    - Aumento del 40% en retención de clientes gracias a recordatorios automáticos de vencimiento.  
                    - Sistema adoptado a nivel nacional.
                TEXT,
                'content_en' => <<<TEXT
                    **Context:** I developed a complete system for an alternative channel of the insurer "La Venezolana", specialized in Vehicle Civil Liability (RCV) policies. The system allows insurance agents to manage policies, clients, payments, and commissions centrally.\n

                    **Architecture & Database:**  
                    - Relational modeling with MySQL: main tables `polizas`, `clientes`, `vehiculos`, `coberturas`, `pagos`, `comisiones`. Eloquent relationships (hasMany, belongsTo).  
                    - Use of migrations, seeders, and factories for test data.  
                    - Optimized queries with indexes and eager loading for reports.\n

                    **Backend (Laravel + Livewire):**  
                    - Role-based authentication: agents (only see their clients) and administrators (global management).  
                    - Admin panel with Livewire for policy CRUD, commission management, and PDF (Dompdf) and Excel (Laravel Excel) report generation.  
                    - REST API for coverage validation and real-time premium calculation.\n

                    **Frontend & UX/UI:**  
                    - Responsive design with Bootstrap 5, using the insurer's corporate palette.  
                    - Dynamic JavaScript forms for quotes (automatic premium calculation).  
                    - Interactive tables with datatables and confirmation modals.  
                    - Toastr notifications for user feedback.\n

                    **Achievements:**  
                    - 70% reduction in policy issuance time (from 2 days to 2 hours).  
                    - 40% increase in client retention thanks to automatic expiration reminders.  
                    - System adopted nationwide.
                TEXT,
                'thumbnail_path' => 'projects/lavenezolana/index.png',
                'is_public' => false,
                'live_url' => 'https://canal.lavenezolanadeseguros.com',
                'year' => 2025,
            ]
        );
        $project1->tags()->sync($project1Tags);

        // ----------------------------------------------
        // Proyecto 2: Grupo Mundial
        // ----------------------------------------------
        $this->command->info('Creando proyecto: Grupo Mundial...');
        $project2Tags = $getTagIds(['PHP', 'Laravel', 'Bootstrap', 'Mysql', 'Javascript', 'Apache', 'Linux']);

        $project2 = Project::updateOrCreate(
            ['slug' => 'grupo-mundial'],
            [
                'title' => 'Grupo Mundial',
                'short_description_es' => 'Fork del sistema anterior con integración vía API REST para pólizas de vida, funerarios y RCV.',
                'short_description_en' => 'Fork of the previous system with REST API integration for life, funeral, and RCV policies.',
                'content_es' => <<<TEXT
                    **Contexto:** A partir del sistema de La Venezolana, realicé un fork adaptándolo a las necesidades del Grupo Mundial. La principal diferencia fue la comunicación bidireccional mediante API REST con el backend central de la aseguradora (sistema legacy en Java).\n

                    **Arquitectura & Base de Datos:**  
                    - Base de datos MySQL con estructura similar a la anterior pero añadiendo tablas de `sincronizacion_logs` para auditoría.  
                    - Uso de jobs y colas (Redis) para procesar lotes de actualizaciones desde/hacia la API.  
                    - Endpoints personalizados para consultar estado de pólizas, clientes, y siniestros.\n

                    **Backend (Laravel):**  
                    - Implementación de un cliente API usando Guzzle con manejo de autenticación JWT.  
                    - Webhooks para recibir notificaciones de cambios en tiempo real (actualización de estado de pólizas, pagos).  
                    - Sistema de caché (Redis) para reducir llamadas repetitivas a la API externa.\n

                    **UX/UI:**  
                    - Se mantuvo el diseño responsive con Bootstrap, pero se añadió un dashboard con métricas personalizadas para agentes.  
                    - Iconografía clara y botones de acción contextuales.  
                    - Formularios con validación en tiempo real y autocompletado de datos de clientes desde el API.\n

                    **Resultados:**  
                    - Integración exitosa con sistemas heredados de la aseguradora sin downtime.
                    - Tasa de error de sincronización inferior al 0.5% gracias a reintentos automáticos.
                TEXT,
                'content_en' => <<<TEXT
                    **Context:** Based on La Venezolana's system, I created a fork adapted to Grupo Mundial's needs. The main difference was bidirectional communication via REST API with the insurer's central backend (legacy Java system).\n

                    **Architecture & Database:**  
                    - MySQL database with a similar structure but adding `sincronizacion_logs` table for auditing.  
                    - Use of jobs and queues (Redis) to process batch updates to/from the API.  
                    - Custom endpoints to query policy, client, and claim status.\n

                    **Backend (Laravel):**  
                    - API client implementation using Guzzle with JWT authentication.  
                    - Webhooks to receive real-time change notifications (policy status updates, payments).  
                    - Caching system (Redis) to reduce repetitive calls to the external API.\n

                    **UX/UI:**  
                    - Maintained responsive design with Bootstrap, but added a dashboard with personalized metrics for agents.  
                    - Clear iconography and contextual action buttons.  
                    - Forms with real-time validation and client data autocomplete from the API.\n

                    **Results:**  
                    - Successful integration with legacy systems without downtime.  
                    - Synchronization error rate below 0.5% thanks to automatic retries.
                TEXT,
                'thumbnail_path' => 'projects/lamundial/index.png',
                'is_public' => false,
                'live_url' => 'https://grupo-mundial.com',
                'year' => 2025,
            ]
        );
        $project2->tags()->sync($project2Tags);

        // ----------------------------------------------
        // Proyecto 3: UbikGo
        // ----------------------------------------------
        $this->command->info('Creando proyecto: UbikGo...');
        $project3Tags = $getTagIds(['PHP', 'Laravel', 'Livewire', 'Tailwind CSS', 'Mysql', 'Alpine.js', 'Apache', 'Linux']);

        $project3 = Project::updateOrCreate(
            ['slug' => 'ubik.go'],
            [
                'title' => 'UbikGo ',
                'short_description_es' => 'Plataforma de gestión de servicios de grúas con geolocalización en tiempo real y notificaciones. (En desarrollo)',
                'short_description_en' => 'Tow truck service management platform with real-time geolocation and notifications. (Under development)',
                'content_es' => <<<TEXT
                    **Contexto:** UbikGo es un sistema automatizado para empresas de grúas que permite a clientes solicitar asistencia vial y a operadores gestionar flota, rutas y costos. Actualmente en desarrollo con TALL stack y Mapbox. \n

                    **Arquitectura & Base de Datos:**  
                    - Modelado avanzado: `servicios` (solicitudes), `gruas` (vehículos), `operadores`, `clientes`, `facturas`, `historial_ubicaciones`.  
                    - Uso de migraciones y relaciones polimórficas (por ejemplo, para adjuntar imágenes de daños a servicios).  
                    - Base de datos MySQL con índices espaciales (puntos geográficos) para consultas de proximidad.  
                    - Triggers para actualizar estado de grúas automáticamente. \n

                    **Backend (Laravel + Livewire):**  
                    - Panel de control en tiempo real para administradores: visualización de grúas en mapa (Mapbox GL JS).  
                    - API interna para actualización de geolocalización de grúas (cada 30 segundos desde apps móviles).  
                    - Sistema de notificaciones: Laravel Notifications + WebSockets (Reverb) para enviar alertas push a clientes y operadores.  
                    - Generación de facturas y presupuestos automáticos basados en distancia y tiempo. \n

                    **Frontend & UX/UI:**  
                    - Tailwind CSS + Alpine.js para interfaces rápidas y modernas.  
                    - Componentes Livewire para formularios multi-paso en la solicitud de servicio.  
                    - Integración con Mapbox: marcadores interactivos, rutas estimadas, área de cobertura.  
                    - Diseño mobile-first pensado para conductores que usan el celular desde la vía. \n

                    **Próximos features:**  
                    - Aplicación móvil híbrida (Laravel + NativePHP o Kotlin Multiplatform).  
                    - Chat entre cliente y operador.  
                    - Dashboard de análisis con métricas de tiempo de respuesta, costos, etc.
                TEXT,
                'content_en' => <<<TEXT
                    **Context:** UbikGo is an automated system for tow truck companies that allows clients to request roadside assistance and operators to manage fleet, routes, and costs. Currently under development with TALL stack and Mapbox. \n

                    **Architecture & Database:**  
                    - Advanced modeling: `servicios` (requests), `gruas` (vehicles), `operadores`, `clientes`, `facturas`, `historial_ubicaciones`.  
                    - Use of migrations and polymorphic relationships (e.g., attaching damage images to services).  
                    - MySQL database with spatial indexes (geographic points) for proximity queries.  
                    - Triggers to automatically update tow truck status. \n

                    **Backend (Laravel + Livewire):**  
                    - Real-time admin dashboard: tow truck visualization on map (Mapbox GL JS).  
                    - Internal API for tow truck geolocation updates (every 30 seconds from mobile apps).  
                    - Notification system: Laravel Notifications + WebSockets (Reverb) to send push alerts to clients and operators.  
                    - Automatic invoice and quote generation based on distance and time. \n

                    **Frontend & UX/UI:**  
                    - Tailwind CSS + Alpine.js for fast, modern interfaces.  
                    - Livewire components for multi-step service request forms.  
                    - Mapbox integration: interactive markers, estimated routes, coverage area.  
                    - Mobile-first design intended for drivers using their phone on the road. \n

                    **Upcoming features:**  
                    - Hybrid mobile app (Laravel + NativePHP or Kotlin Multiplatform).  
                    - Client-operator chat.  
                    - Analytics dashboard with response time, cost, and other metrics.
                TEXT,
                'thumbnail_path' => 'projects/ubikgo/index.png',
                'is_public' => false,
                'live_url' => null,
                'year' => 2026,
            ]
        );
        $project3->tags()->sync($project3Tags);

        $this->command->info('✅ Todos los proyectos se han seedeado correctamente.');
    }
}