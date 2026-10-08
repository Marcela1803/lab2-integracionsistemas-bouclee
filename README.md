Laboratorio II - Integración de Sistemas
Información del Equipo
Nombre del Equipo: Bouclée
Integrantes y Coevaluación de Participación
Cada integrante ha sido evaluado en una escala independiente del 0% al 100% respecto a su aporte en el desarrollo de este laboratorio.

Adriana Marcela Hernández Recinos — carnet HR-64876-23 — 100%

Descripción del Proyecto

Este proyecto es la evolución del sistema de gestión administrativa para la pastelería Bouclée. En este Laboratorio II, el sistema original construido con PHP nativo ha sido exitosamente migrado utilizando Laravel 11.

La aplicación permite la administración segura de los encargos de postres a través de un Tablero Kanban dinámico e interactivo. El personal autenticado puede registrar nuevos pedidos y gestionar su flujo de trabajo moviendo las tarjetas a través de tres estados operativos:

- Pendiente
- En Preparación
- Entregado

El sistema implementa el modelo de arquitectura MVC, Eloquent ORM, autenticación de usuarios mediante Laravel Breeze, diseño visual con Tailwind CSS y protección CSRF.
Instrucciones de Instalación y Ejecución

Para clonar y desplegar este proyecto en un entorno local, sigue los siguientes pasos en tu terminal:
Instalar las dependencias de PHP (Composer):
composer install

Configurar las variables de entorno:
Copia el archivo de ejemplo para crear tu propio archivo .env:
cp .env.example .env

Nota: Abre el archivo .env recién creado y asegúrate de configurar las credenciales de tu base de datos local (DB_DATABASE, DB_USERNAME, DB_PASSWORD).
Generar la clave de la aplicación:
php artisan key:generate

Ejecutar las migraciones:
Esto creará las tablas necesarias en la base de datos:
php artisan migrate

Instalar y compilar los recursos de Frontend (Tailwind/Breeze):
npm install
npm run dev

Iniciar el servidor local:
Abre una nueva terminal y ejecuta:
php artisan serve

La aplicación estará disponible en http://localhost:8000.

NOTA: Uso de Herramientas de IA.

La herramienta funcionó como soporte técnico y tutor interactivo para la estructuración del código en la arquitectura MVC de Laravel, la traducción de consultas PDO a Eloquent ORM, y la depuración de errores durante el acoplamiento de las vistas Blade y el enrutamiento.

Validación de resultados:
Ningún código generado fue implementado directamente sin revisión. Todos los fragmentos y sugerencias estructurales fueron analizados, adaptados a la lógica de negocio específica de la pastelería Bouclée y validados mediante pruebas de ejecución local en el servidor de pruebas para garantizar el cumplimiento estricto de los requerimientos de la rúbrica.
