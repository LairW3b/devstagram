# Apuntes

- php artisan migrate=> me permite migrar la base de datos
- php artisan migrate:rollback=>para deshacer los cambios

## Livewire en Laravel

-Livewire es un framework Full Stack para Laravel
-Soluciona el Problema de interacciones y realizar sitios web dinámicos de forma sencilla.
-Si creas un proyecto con React o Vue, es necesario crear una API; y una serie de pasos
 que pueden ser complicados, livewire soluciona este detalle

## Como funciona Livewire
Livewire es una mezcla cliente / servidor

Utiliza Templates de Blade, pero también automáticamente realiza
peticiones Ajax para actualizar y enviar información al servidor.

El servidor obtiene datos, los procesa y realiza un re-render del HTML.

Livewire es suficientemente inteligente para realizar los cambios en el DOM,
de lo que cambió.

## Funciones soportadas por Livewire

-Validación de Formularios
-Subida de Archivos
-Paginación
-Redireccionar
-Mensajes Flash
-Autorización
-Eventos

## Instalación de Livewire

composer require livewire/livewire