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
app/
│── Http/
│   ├── Controllers/
│   │   ├── Admin/
│   │   └── ...
│
database/
│── migrations/
│── seeders/
│   ├── AdminUserSeeder.php
│
public/
│── storage → imágenes accesibles públicamente
│
resources/
│── views/
│   ├── admin/
│   ├── portfolio/
│   └── layouts/
│
routes/
│── web.php

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

