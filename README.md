# Sistema Escolar

Aplicación web desarrollada con **Laravel** para la gestión de información escolar. Cuenta con autenticación, control de roles, operaciones CRUD y conexión con MySQL.

## Tecnologías

* Laravel 10
* PHP
* MySQL
* Node.js / npm
* Docker
* Nginx
* Git

## Requisitos

Para ejecutarlo localmente necesitas:
* PHP
* Composer
* Node.js y npm
* MySQL
* Git

## Instalación local

### 1. Clonar el repositorio

Crea una carpeta y abre una terminal dentro de ella:

```bash
git clone https://github.com/ErikamPonce/practicaweb.git
cd crud-productos
```

### 2. Instalar dependencias

```bash
composer install
npm install
```

### 3. Configurar `.env`

Copia `.env.example` como `.env`.

**Windows:**

```powershell
Copy-Item .env.example .env
```

**Linux/macOS:**

```bash
cp .env.example .env
```

Después abre `.env` y configura tu base de datos:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_bd
DB_USERNAME=root
DB_PASSWORD=tu_contraseña
```

También configura el administrador:

```env
ADMIN_EMAIL=admin@example.com
ADMIN_PASSWORD=tu_contraseña
```

> Los valores anteriores son ejemplos. Deben sustituirse por los datos de tu entorno local.

### 4. Preparar Laravel

```bash
php artisan key:generate
php artisan migrate
php artisan db:seed
```

### 5. Ejecutar el proyecto

En una terminal:

```bash
php artisan serve
```

En otra:

```bash
npm run dev
```

Abre en el navegador:

```text
http://127.0.0.1:8000
```

## Docker

Para ejecutar el proyecto mediante Docker:

```bash
docker compose up --build
```

Para detenerlo:

```bash
docker compose down
```

## Pruebas

```bash
php artisan test
```

Para generar la compilación de producción:

```bash
npm run build
```

## Seguridad

* Las credenciales se manejan mediante variables de entorno.
* `.env` no debe subirse al repositorio.
* `.env.example` contiene las variables necesarias.
* `.gitignore` evita incluir archivos sensibles.

## Aplicación desplegada

**https://practicaweb-92ef.onrender.com/**


