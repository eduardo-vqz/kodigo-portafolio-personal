# 🌐 Portafolio Personal — Panel de Administración en Laravel

Este proyecto es un **portafolio profesional dinámico** construido con **Laravel 12**, que permite mostrar información personal, proyectos, habilidades y una biografía pública.  
Incluye además un **panel de administración seguro**, desde el cual el usuario puede gestionar todo el contenido del sitio.

---

## 🌍 Accesos principales del sistema

### 🔹 Sitio público (portafolio)
http://localhost:8000/

### 🔸 Panel de administración

#### Login:
http://localhost:8000/login

#### Dashboard:
http://localhost:8000/admin

#### Secciones del panel:
- /admin/profile → Editar perfil  
- /admin/skills → Listado de habilidades  
- /admin/skills/create → Crear habilidad  
- /admin/projects → Listado de proyectos  
- /admin/projects/create → Crear proyecto  

---

## 🚀 Características principales

### 🖥️ Sitio Público
- Presentación con nombre, título, foto y biografía.
- Habilidades organizadas por categorías.
- Proyectos con imagen, descripción, tecnologías y enlaces.
- Sección de **proyectos destacados**.
- Diseño responsivo con Bootstrap 5.

### 🔐 Panel de Administración
Incluye autenticación (login) y permite:
- Gestionar el perfil del usuario.
- CRUD de habilidades.
- CRUD de proyectos.
- Subida de imágenes.
- Destacar proyectos.
- Panel moderno y responsive.

---

## 🛠️ Tecnologías utilizadas
### Backend
- Laravel 12  
- PHP 8.2  
- MySQL  

### Frontend
- Bootstrap 5.3  
- Blade Templates  

### Otros
- Laravel Breeze  
- Composer  
- NPM & Vite  
- Storage público para imágenes  

---

## 📂 Estructura principal del proyecto
portafolio-personal/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── PortfolioController.php
│   │   │   ├── Admin/
│   │   │   │   ├── AdminController.php
│   │   │   │   ├── ProfileController.php
│   │   │   │   ├── SkillController.php
│   │   │   │   └── ProjectController.php
│   │   │   └── Auth/              # Controladores Breeze
│   │   ├── Middleware/
│   │   └── Kernel.php
│   ├── Models/
│   │   ├── User.php
│   │   ├── Profile.php
│   │   ├── Skill.php
│   │   └── Project.php
│   └── Providers/
│       └── AppServiceProvider.php
│
├── bootstrap/
│   └── app.php
│
├── config/
│   ├── app.php
│   ├── auth.php
│   ├── database.php
│   └── filesystems.php
│
├── database/
│   ├── migrations/
│   │   ├── 0001_01_01_000000_create_users_table.php
│   │   ├── 0001_01_01_000001_create_cache_table.php
│   │   ├── 0001_01_01_000002_create_jobs_table.php
│   │   ├── 20xx_xx_xx_xxxxxx_create_profiles_table.php
│   │   ├── 20xx_xx_xx_xxxxxx_create_skills_table.php
│   │   └── 20xx_xx_xx_xxxxxx_create_projects_table.php
│   └── seeders/
│       ├── DatabaseSeeder.php
│       ├── AdminUserSeeder.php
│       ├── SkillSeeder.php        # (opcional, si los creaste)
│       └── ProjectSeeder.php      # (opcional)
│
├── public/
│   ├── index.php
│   ├── favicon.ico
│   ├── build/                     # Archivos generados por Vite (si los tienes)
│   └── storage -> ../storage/app/public   # enlace simbólico (php artisan storage:link)
│
├── resources/
│   ├── css/
│   │   └── app.css
│   ├── js/
│   │   └── app.js
│   └── views/
│       ├── layouts/
│       │   ├── app.blade.php      # Layout principal auth (Breeze)
│       │   ├── guest.blade.php    # Layout para login/registro
│       │   └── admin.blade.php    # Layout del panel de administración
│       │
│       ├── portfolio/
│       │   └── index.blade.php    # Página pública del portafolio (/)
│       │
│       ├── admin/
│       │   ├── dashboard.blade.php
│       │   ├── profile/
│       │   │   └── edit.blade.php
│       │   ├── skills/
│       │   │   ├── index.blade.php
│       │   │   ├── create.blade.php
│       │   │   └── edit.blade.php
│       │   └── projects/
│       │       ├── index.blade.php
│       │       ├── create.blade.php
│       │       └── edit.blade.php
│       │
│       └── auth/                  # Vistas de autenticación Breeze
│           ├── login.blade.php
│           ├── register.blade.php
│           ├── forgot-password.blade.php
│           ├── reset-password.blade.php
│           ├── verify-email.blade.php
│           └── layouts/partials según Breeze
│
├── routes/
│   ├── web.php        # Rutas públicas + admin + dashboard redirect
│   └── auth.php       # Rutas generadas por Breeze (login, register, etc.)
│
├── storage/
│   ├── app/
│   │   └── public/
│   │       ├── profile_photos/    # Fotos de perfil
│   │       └── project_images/    # (si decides usar imágenes por proyecto)
│   ├── framework/
│   └── logs/
│
├── tests/
│   ├── Feature/
│   └── Unit/
│
├── .env
├── .env.example
├── artisan
├── composer.json
├── composer.lock
├── package.json
├── vite.config.js
└── README.md

---

## ⚙️ Instalación del proyecto

### 1️⃣ Clonar el repositorio
git clone https://github.com/usuario/portafolio-personal.git
cd portafolio-personal

### 2️⃣ Instalar dependencias PHP
composer install

### 3️⃣ Instalar dependencias frontend
npm install
npm run build

### 4️⃣ Configurar .env
cp .env.example .env

Editar variables:
DB_DATABASE=tu_base  
DB_USERNAME=root  
DB_PASSWORD=

### 5️⃣ Generar APP KEY
php artisan key:generate

### 6️⃣ Migrar base de datos + Seeders
php artisan migrate --seed

### 7️⃣ Crear enlace simbólico para imágenes
php artisan storage:link

### 8️⃣ Iniciar servidor
php artisan serve

---

## 👤 Usuario administrador por defecto
Email: admin@admin.com  
Password: admin123456  

---

## ✨ Funcionalidades del Panel

### Perfil
- Subida de fotografía  
- Editar nombre, correo, título profesional  
- Biografía  
- Enlaces profesionales  

### Habilidades
- Crear categorías  
- Registrar habilidades  
- Editar & Eliminar  

### Proyectos
- Subida de imagen  
- Tecnologías usadas  
- Enlaces (GitHub/Demo)  
- Marcar como destacado  
- CRUD completo  

---

## 📤 Despliegue en producción
composer install --optimize-autoloader --no-dev  
npm run build  
php artisan migrate --force  
php artisan config:cache  
php artisan route:cache  
php artisan storage:link  

---

