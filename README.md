# e_tienda_backend
PHP laravel 10 sanctum Api

Esta es la carpeta que contiene la Api con PHP, el framework Laravel 10 y los tokens de Sanctum.

base_url :http://127.0.0.1:8000/api/

Rutas públicas

"/register" - Post method
"/login"    -post method


Rutas protegidas con sanctum Middleware

"/mostrar" - Get method
"/cotizar"  Post method
"/show"   - Get method
"/logout" -Post method

Database 

Crear base de datos tienda
  
Commands to run 

composer install //para instalar los paquetes
phh artisan migrate // para crear las tablas en la base de datos 
php artisan make:seeder ProductsTableSeeder or php artisan db:seed // para llenar la tabla productos con los productos de muestra
