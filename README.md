# Simple Task Manager REST API

## Table of Contents

- [Project Scope](#project-scope)
- [Functionality](#functionality)
- [Setup Instructions (Running Locally)](#setup-instructions-running-locally)
- [Running with Docker](#running-with-docker)
- [Sample Requests (cURL)](#sample-requests-curl)
- [Using Postman Collections](#using-postman-collections)
- [API Documentation](#api-documentation)

## 📋 Project Scope

This project is a **RESTful API** for managing tasks, built with **Laravel 12**. It is designed as a backend-only service (no frontend), following modern API best practices. The API allows users to create, read, update, and delete tasks, with all data persisted in a database (using Eloquent ORM and SQLite by default).

This project is ideal for learning or demonstrating:
- Laravel 12 API development
- Eloquent ORM usage
- RESTful design patterns
- Request validation and API resource formatting
- Clean code organization (controllers, models, routes, migrations)

## Functionality

### Task Model

| Field         | Type      | Description                          |
|---------------|-----------|--------------------------------------|
| id            | integer   | Primary key, auto-increment          |
| title         | string    | **Required**. Task title             |
| description   | text      | Optional. Task details               |
| status        | enum      | `pending` (default), `in_progress`, `done` |
| created_at    | timestamp | Auto-managed by Laravel              |
| updated_at    | timestamp | Auto-managed by Laravel              |

### API Endpoints

| Method | Endpoint           | Description                |
|--------|--------------------|----------------------------|
| GET    | `/api/tasks`       | List all tasks             |
| GET    | `/api/tasks/{id}`  | Get a specific task        |
| POST   | `/api/tasks`       | Create a new task          |
| PUT    | `/api/tasks/{id}`  | Update an existing task    |
| DELETE | `/api/tasks/{id}`  | Delete a task              |

**Bonus:**  
- Filter tasks by status: `GET /api/tasks?status=done`
- Sort tasks by property: `GET /api/tasks?sort=created_at&direction=desc`

  > You can use any task property (e.g., `id`, `title`, `status`, `created_at`, `updated_at`) as the value for the `sort` parameter. The `direction` parameter accepts `asc` (ascending) or `desc` (descending), with `desc` as the default if not specified.

## 🛠️ Setup Instructions (Running Locally)

### Prerequisites

- PHP 8.2+  
- Composer  
- SQLite (or another supported DB)  
- Git

### 1. Clone the Repository

```bash
git clone https://github.com/your-username/your-repo-name.git
cd your-repo-name
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Environment Setup

Copy the example environment file and generate an app key:

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Configure Database

By default, this project uses SQLite for simplicity.

- Create a SQLite database file:

  ```bash
  touch database/database.sqlite
  ```

- In your `.env` file, set:

  ```
  DB_CONNECTION=sqlite
  DB_DATABASE=${PWD}/path/to/your/database.sqlite
  # Note: DB_DATABASE is not required if your database is in the default location (database/database.sqlite)
  ```

### 5. Run Migrations

```bash
php artisan migrate
```

### 6. (Optional) Populate the database with some data (if you want to)

```bash
php artisan db:seed
```

### 7. Start the Development Server

```bash
php artisan serve
```

The API will be available at `http://localhost:8000/api`.

## 🐳 Running with Docker

This project uses **[Laravel Sail](https://laravel.com/docs/12.x/sail)** to provide a simple Docker-based development environment. Sail makes it easy to run Laravel projects in Docker containers, so you don't need to install PHP, Composer, or a database server on your local machine.

### Quick Start

**Before starting Sail, update your `.env` file:**

- By default, the `.env` file is preconfigured for SQLite, but Sail uses MySQL. Update the following values in your `.env` file:
  ```env
  DB_CONNECTION=mysql
  DB_HOST=mysql
  DB_PORT=3306
  DB_DATABASE=laravel
  DB_USERNAME=sail
  DB_PASSWORD=password
  ```
- Set the application port to `8000` so the container runs on the same port as the local setup. This makes it easier to use the sample cURL and Postman requests:
  ```env
  APP_PORT=8000
  ```

1. **Start Sail (Docker containers):**
   ```bash
   ./vendor/bin/sail up
   ```
   This will build and start the containers in the background. The first run may take a few minutes as Docker images are downloaded and built.

2. **Run Migrations:**
   ```bash
   ./vendor/bin/sail artisan migrate
   ```
   > This is the same as running `php artisan migrate`, but inside the Docker container.

3. **(Optional) Populate the database with some data (if you want to):**
   ```bash
   ./vendor/bin/sail artisan db:seed
   ```
   > This will populate the database with sample data, just like in the local setup instructions above.

All commands above are executed inside the Docker container using Sail.

### (Optional) Create a Sail Alias

To make running Sail commands easier, you can add this alias to your shell:

```bash
alias sail='sh $([ -f sail ] && echo sail || echo vendor/bin/sail)'
```

After adding the alias, you can use shorter commands:

```bash
sail up
sail artisan migrate
sail artisan db:seed
```

### Rebuilding Sail Images

If you need to rebuild the Docker images (for example, after changing dependencies or configuration), run:

```bash
docker compose down -v
sail build --no-cache
sail up
```

For more details, see the [Laravel Sail documentation](https://laravel.com/docs/12.x/sail).

## 🧪 Sample Requests (cURL)

### Create a Task

```bash
curl -X POST http://localhost:8000/api/tasks \
  -H "Content-Type: application/json" \
  -d '{"title": "Buy groceries", "description": "Milk, eggs, bread"}'
```

### List All Tasks

```bash
curl http://localhost:8000/api/tasks
```

### Get a Task by ID

```bash
curl http://localhost:8000/api/tasks/1
```

### Update a Task

```bash
curl -X PUT http://localhost:8000/api/tasks/1 \
  -H "Content-Type: application/json" \
  -d '{"title": "Buy groceries and fruit", "status": "in_progress"}'
```

### Delete a Task

```bash
curl -X DELETE http://localhost:8000/api/tasks/1
```

### Filter by Status

```bash
curl http://localhost:8000/api/tasks?status=done
```

### Sort Tasks by Created Date (Descending)

```bash
curl "http://localhost:8000/api/tasks?sort=created_at&direction=desc"
```

## 📦 Using Postman Collections

To be created...

## 📝 API Documentation

To be created...