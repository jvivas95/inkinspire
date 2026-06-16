# InkInspire 📚

**A community platform for book lovers — Una comunidad para amantes de los libros**

[🌐 Live Demo](https://inkinspire.es) · [💻 GitHub](https://github.com/jvivas95/inkinspire)

## 🇬🇧 English

### About the Project

InkInspire is a community-driven book review platform where readers can discover books, share their thoughts, and track their reading journey. Built with Laravel 13 and integrated with the Google Books API, it offers a complete social reading experience.

### ✨ Features

- **Book Discovery** — Search millions of books powered by Google Books API with advanced filters (title, author, year range)
- **Reviews & Ratings** — Write reviews and rate books with a 1-5 star system
- **Reading Lists** — Organize books into "Want to Read", "Reading" and "Read" lists
- **Favorites** — Save your favorite books with an interactive carousel on the dashboard
- **Likes** — Like other users' reviews
- **Dashboard** — Personal stats, reading progress and top-rated books at a glance
- **Community** — See the latest reviews and recent activity from other readers
- **Authentication** — Full auth system with registration, login and profile management

### 🛠️ Tech Stack

| Technology | Purpose |
|---|---|
| Laravel 13 | Backend framework |
| PHP 8.3 | Server-side language |
| MySQL (Aiven) | Production database |
| Tailwind CSS | Styling |
| Alpine.js | Reactive UI components |
| Vite | Asset bundling |
| Docker | Containerization |
| Render | Cloud deployment |
| Google Books API | Book data source |
| Pest | Testing framework |

### 🏗️ Architecture Highlights

- **Observer Pattern** — `ReviewObserver` automatically recalculates book ratings on every review change
- **Policies** — Laravel Policies enforce authorization rules (only authors can edit/delete their reviews)
- **Form Requests** — Dedicated request classes for all form validations
- **Service Layer** — `GoogleBooksService` encapsulates all external API communication
- **Eager Loading** — N+1 queries prevented throughout the application

### 🚀 Local Installation

**Requirements:** PHP 8.3+, Composer, Node.js 20+, MySQL

```bash
# 1. Clone the repository
git clone https://github.com/jvivas95/inkinspire.git
cd inkinspire

# 2. Install PHP dependencies
composer install

# 3. Install Node dependencies
npm install

# 4. Configure environment
cp .env.example .env
php artisan key:generate

# 5. Configure your .env file
# Set DB_*, APP_URL and GOOGLE_BOOKS_API_KEY

# 6. Run migrations and seeders
php artisan migrate:fresh --seed

# 7. Create storage symlink
php artisan storage:link

# 8. Compile assets and start server
npm run dev
php artisan serve
```

### ⚙️ Environment Variables

```env
APP_NAME=InkInspire
APP_ENV=local
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=inkinspire
DB_USERNAME=root
DB_PASSWORD=

GOOGLE_BOOKS_API_KEY=your_api_key_here
```

Get your Google Books API key at [console.cloud.google.com](https://console.cloud.google.com)

### 🧪 Running Tests

```bash
php artisan test
```

### 📁 Project Structure

```
app/
├── Http/
│   ├── Controllers/     # BookController, ReviewController, etc.
│   └── Requests/        # Form validation classes
├── Models/              # Eloquent models with relationships
├── Observers/           # ReviewObserver for automatic rating updates
├── Policies/            # Authorization rules
└── Services/            # GoogleBooksService
database/
├── migrations/          # Database schema
├── factories/           # Test data factories
└── seeders/             # Database seeders
resources/
└── views/
    ├── books/           # Book catalog and detail views
    ├── dashboard/       # User dashboard
    └── layouts/         # App and home layouts
```

### 🗺️ Roadmap

- [✅] Public user profiles (`/users/{username}`)
- [ ] Follow system between users
- [ ] Public REST API with Sanctum
- [ ] Redis caching for top-rated books
- [ ] Email notifications for likes and comments
- [ ] Comments on reviews

### 👨‍💻 Author

**Jefferson Vivas Vásquez**

LinkedIn: https://linkedin.com/in/jefferson-vivas-vasquez
Portfolio: https://jvivas.es

---

## 🇪🇸 Español

### Sobre el Proyecto

InkInspire es una plataforma de reseñas de libros impulsada por la comunidad donde los lectores pueden descubrir libros, compartir sus opiniones y hacer seguimiento de su progreso lector. Construida con Laravel 13 e integrada con la API de Google Books, ofrece una experiencia social de lectura completa.

### ✨ Funcionalidades

- **Descubrimiento de libros** — Busca millones de libros con la API de Google Books con filtros avanzados (título, autor, rango de años)
- **Reseñas y puntuaciones** — Escribe reseñas y puntúa libros con un sistema de 1 a 5 estrellas
- **Listas de lectura** — Organiza tus libros en "Quiero leer", "Leyendo" y "Leído"
- **Favoritos** — Guarda tus libros favoritos con un carrusel interactivo en el dashboard
- **Likes** — Da like a las reseñas de otros usuarios
- **Dashboard** — Estadísticas personales, progreso lector y libros mejor valorados de un vistazo
- **Comunidad** — Ve las últimas reseñas y actividad reciente de otros lectores
- **Autenticación** — Sistema completo con registro, login y gestión de perfil

### 🛠️ Stack Tecnológico

| Tecnología | Uso |
|---|---|
| Laravel 13 | Framework backend |
| PHP 8.3 | Lenguaje servidor |
| MySQL (Aiven) | Base de datos en producción |
| Tailwind CSS | Estilos |
| Alpine.js | Componentes reactivos |
| Vite | Compilación de assets |
| Docker | Contenerización |
| Render | Despliegue en la nube |
| Google Books API | Fuente de datos de libros |
| Pest | Framework de testing |

### 🏗️ Decisiones de Arquitectura

- **Observer Pattern** — `ReviewObserver` recalcula automáticamente la puntuación media del libro en cada cambio de reseña
- **Policies** — Las Policies de Laravel controlan las reglas de autorización (solo los autores pueden editar/eliminar sus reseñas)
- **Form Requests** — Clases de request dedicadas para todas las validaciones de formularios
- **Capa de Servicios** — `GoogleBooksService` encapsula toda la comunicación con la API externa
- **Eager Loading** — Las consultas N+1 están prevenidas en toda la aplicación

### 🚀 Instalación Local

**Requisitos:** PHP 8.3+, Composer, Node.js 20+, MySQL

```bash
# 1. Clonar el repositorio
git clone https://github.com/jvivas95/inkinspire.git
cd inkinspire

# 2. Instalar dependencias PHP
composer install

# 3. Instalar dependencias Node
npm install

# 4. Configurar entorno
cp .env.example .env
php artisan key:generate

# 5. Configurar el archivo .env
# Configura DB_*, APP_URL y GOOGLE_BOOKS_API_KEY

# 6. Ejecutar migraciones y seeders
php artisan migrate:fresh --seed

# 7. Crear enlace de storage
php artisan storage:link

# 8. Compilar assets e iniciar servidor
npm run dev
php artisan serve
```

### ⚙️ Variables de Entorno

```env
APP_NAME=InkInspire
APP_ENV=local
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=inkinspire
DB_USERNAME=root
DB_PASSWORD=

GOOGLE_BOOKS_API_KEY=tu_clave_aqui
```

Obtén tu clave de Google Books API en [console.cloud.google.com](https://console.cloud.google.com)

### 🧪 Ejecutar Tests

```bash
php artisan test
```

### 🗺️ Próximas Funcionalidades

- [✅] Perfiles públicos de usuario (`/users/{username}`)
- [ ] Sistema de seguimiento entre usuarios
- [ ] API REST pública con Sanctum
- [ ] Caché con Redis para libros mejor valorados
- [ ] Notificaciones por email para likes y comentarios
- [ ] Comentarios en reseñas

### 👨‍💻 Autor

**Jefferson Vivas Vásquez**

LinkedIn: https://linkedin.com/in/jefferson-vivas-vasquez
Portfolio: https://jvivas.es
