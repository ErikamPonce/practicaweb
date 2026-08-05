# Sistema Escolar (crud-productos)

Aplicación Laravel 10 para la administración de escuelas, alumnos, personal,
carreras, asignaturas y horarios, con autenticación y control de acceso por
roles (Administrador / Usuario).

## Requisitos

- Docker y Docker Compose (recomendado), **o**
- PHP 8.1+, Composer, Node.js 18+/npm, y MySQL 8 (para correr sin Docker)

## Base de datos: local vs. en la nube

Este proyecto **no incluye un contenedor de MySQL** en `docker-compose.yml`:
la app se conecta directamente a la base de datos que definas en `DB_HOST` /
`DB_PORT` / `DB_DATABASE` / `DB_USERNAME` / `DB_PASSWORD` dentro de `.env`,
sea local o en la nube (ej. FreeMySQLDatabase.com, freemysqlhosting.net,
AWS RDS, PlanetScale, etc.).

Pasos para usar una base en la nube (ejemplo con FreeMySQLDatabase):

1. Crea la base en el panel del proveedor y copia el host, puerto, nombre
   de base, usuario y contraseña que te asignen.
2. Pégalos en tu `.env`:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=sqlXXX.freemysqlhosting.net
   DB_PORT=3306
   DB_DATABASE=sqlXXX
   DB_USERNAME=sqlXXX
   DB_PASSWORD=tu_password_real
   ```

3. Levanta la app normalmente:

   ```bash
   docker compose up --build
   ```

   El `entrypoint` espera a que la base responda y corre las migraciones
   automáticamente contra la base en la nube.

> **Nota:** los planes gratuitos como FreeMySQLDatabase suelen tener límites
> muy bajos de almacenamiento (~5 MB) y de conexiones simultáneas — son
> útiles para pruebas, no para producción real. Si el proveedor exige
> conexión por SSL/TLS, deberás añadir `DB_SSLMODE`/certificados según su
> documentación (Laravel lo soporta vía `sslmode` en `config/database.php`).

## Puesta en marcha con Docker (recomendado)

1. Copia el archivo de entorno de ejemplo y complétalo:

   ```bash
   cp .env.example .env
   ```

   Como mínimo define:
   - `DB_HOST`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD` (datos de tu base
     de datos, local o en la nube)
   - `ADMIN_EMAIL` / `ADMIN_PASSWORD` (usuario Administrador inicial)

2. Levanta todo con un solo comando:

   ```bash
   docker compose up --build
   ```

   Esto construye la imagen de la app (PHP-FPM + assets de Vite ya
   compilados), levanta Nginx, MySQL, instala dependencias, genera
   `APP_KEY` si falta, corre las migraciones y cachea la configuración.

3. La app queda disponible en `http://localhost:8080` (o el puerto que
   definas en `APP_PORT`).

4. Para crear los datos de catálogo (estados, municipios, carreras, etc.)
   y el usuario Administrador inicial:

   ```bash
   docker compose exec app php artisan db:seed
   ```

   El usuario Administrador se crea con las credenciales `ADMIN_EMAIL` /
   `ADMIN_PASSWORD` definidas en tu `.env` (ver
   `database/seeders/AdminUserSeeder.php`). El registro público
   (`/register`) siempre asigna el rol "Usuario", nunca "Administrador",
   por seguridad.

   Alternativamente, define `DB_SEED_ON_BOOT=true` en `.env` para que el
   `entrypoint` corra los seeders automáticamente en cada arranque
   (útil solo en desarrollo).

> **Nota sobre permisos:** el contenedor de la app corre como el usuario
> `www` (UID 1000). Si tu usuario local tiene un UID distinto, puede que
> necesites ajustar permisos de `storage/` y `bootstrap/cache` en el host,
> o cambiar el UID en el `Dockerfile`.

## Puesta en marcha sin Docker

```bash
composer install
cp .env.example .env
php artisan key:generate
# Ajusta DB_* en .env para tu MySQL local
php artisan migrate --seed
npm install
npm run build   # o `npm run dev` para desarrollo con recarga en caliente
php artisan serve
```

## Roles y acceso

- Las rutas de gestión (`/escuelas`, `/alumnos`, `/personal`, `/carreras`,
  `/asignaturas`, `/horarios`, `/admin`) requieren sesión iniciada **y**
  rol `Administrador` (middleware `auth` + `role:Administrador`).
- Cualquier usuario autenticado puede acceder a `/home`.
- El registro público solo crea usuarios con rol `Usuario`.

## Tests

```bash
php artisan test
```
