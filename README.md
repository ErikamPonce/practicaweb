# Sistema Escolar

Aplicación web desarrollada con **Laravel  PHP y MySQL**, para la gestión de información escolar. El proyecto cuenta con autenticación, control de roles y operaciones CRUD.

## Tecnologías

* Laravel 10
* PHP
* MySQL
* Node.js / npm
* Docker
* Nginx
* Git / GitHub

## Requisitos

Para ejecutar el proyecto localmente se necesita:

* PHP
* Composer
* Node.js y npm
* MySQL
* Git

## Instalación local

### 1. Clonar el repositorio

Crear una carpeta, abrir una terminal dentro de ella y ejecutar:

```bash
git clone https://github.com/ErikamPonce/practicaweb.git
cd crud-productos
```

### 2. Instalar dependencias

```bash
composer install
npm install
```

### 3. Configurar variables de entorno

Crear el archivo `.env` a partir de `.env.example`.

En Windows:

```powershell
Copy-Item .env.example .env
```

En Linux/macOS:

```bash
cp .env.example .env
```

Abrir `.env` y configurar los datos de la base de datos:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_bd
DB_USERNAME=root
DB_PASSWORD=tu_contraseña
```

Configurar también las credenciales del administrador:

```env
ADMIN_EMAIL=admin@example.com
ADMIN_PASSWORD=tu_contraseña
```

Los valores anteriores son ejemplos y deben sustituirse por los correspondientes al entorno local.

### 4. Preparar la aplicación

```bash
php artisan key:generate
php artisan migrate
php artisan db:seed
```

### 5. Ejecutar

En una terminal:

```bash
php artisan serve
```

En otra terminal:

```bash
npm run dev
```

Abrir:

```text
http://127.0.0.1:8000
```

## Docker

Para ejecutar la aplicación mediante Docker:

```bash
docker compose up --build
```

Para detener los contenedores:

```bash
docker compose down
```

## Pruebas

```bash
php artisan test
```

Para generar los archivos frontend de producción:

```bash
npm run build
```

## Variables de entorno

El proyecto incluye el archivo:

```text
.env.example
```

Este archivo contiene las variables necesarias para configurar la aplicación, pero **no contiene credenciales reales**.

Las credenciales y secretos deben configurarse únicamente en `.env` o directamente en las variables de entorno del servidor.

## Seguridad y `.gitignore`

El repositorio incluye un archivo `.gitignore` configurado para evitar subir archivos sensibles o generados localmente, incluyendo:

```text
.env
/vendor/
/node_modules/
/storage/*.key
```

El archivo `.env` **no debe subirse al repositorio**.

Únicamente se incluye `.env.example` como plantilla de configuración.


## Aplicación desplegada

**https://practicaweb-92ef.onrender.com/**


