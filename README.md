# Sistema-gestion-educativa-final
 Pagina Web curso de taller de programación Laravel
 
<h2>Diagrama de Base de datos</h2>

![imagen alt](https://github.com/user-attachments/assets/2f63271c-4671-4556-b4f4-d042b2bbe9bf)


<h2>Integrantes</h2>

- Soriano Hancco, Edson Ivan
- Ramirez Enciso, Ruby Angelica
- Sánchez Auccapuclla, Edgar

<h2>Alcanze del proyecto</h2>

El presente proyecto tiene como finalidad el desarrollo de una plataforma web orientada a la administración integral de una institución educativa. Esta plataforma automatizará los procesos relacionados con la gestión de:

-Apoderados

-Estudiantes

-Matrículas

-Docentes

El sistema contará con un login para administradores, quienes podrán realizar operaciones de registro , actualización y eliminación (CRUD) sobre las distintas entidades mencionadas. Además, se busca facilitar la centralización y organización de la información, mejorando la eficiencia de los procesos internos de la institución.

<h2>Requisitos</h2>

.node js 18>= validar con node -v

.PHP

.Instalar composer: https://getcomposer.org

<h2>Crear el Archivo .env con el contenido de .env.example</h2>

Modificar sus respectivos nombre bd, usuario, contraseña
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sistema_gestion_educativo
DB_USERNAME=root
DB_PASSWORD=6kaled159
```

## Instalar dependencias

```bash
composer install
```

<h2>Instalar Dependencias JavaScript</h2>

```bash
npm install
```

<h2>Ejecutar en la Terminal</h2>

```bash
php artisan key:generate
```

<h2>Pasos para Ejecutar el proyecto</h2>

```bash
php artisan serve
npm run dev
```

<h2>Comando de creación para Model y Controller en la Terminal</h2>

.Ejecutar php artisan make:model [name del model]

.Ejecutar php artisan make:controller [name del controller]

