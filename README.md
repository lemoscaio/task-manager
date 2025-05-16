# Simple Task Manager REST API

## 📋 Project Scope

This project is a **RESTful API** for managing tasks, built with **Laravel 12**. It is designed as a backend-only service (no frontend), following modern API best practices. The API allows users to create, read, update, and delete tasks, with all data persisted in a database (using Eloquent ORM and SQLite by default).

This project is ideal for learning or demonstrating:
- Laravel 12 API development
- Eloquent ORM usage
- RESTful design patterns
- Request validation and API resource formatting
- Clean code organization (controllers, models, routes, migrations)

---

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

---

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

### 6. (OPTIONAL) Populate the database with some data (if you want to)

```bash
php artisan db:seed
```

### 7. Start the Development Server

```bash
php artisan serve
```

The API will be available at `http://localhost:8000/api`.

---

## 🐳 Running with Docker

To be created...

---

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

---

## 📦 Using Postman Collections

To be created...

## 📝 API Documentation

To be created...
