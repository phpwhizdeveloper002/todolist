# Laravel + Vue.js + Inertia.js + Tailwind CSS Todo List

A modern **Todo List Application** built with **Laravel (backend + Inertia.js)**, **Vue.js (frontend)**, and **Tailwind CSS (UI styling)**.  
This project demonstrates CRUD operations (Add, View, Edit, Delete) for managing posts/todos in a clean, responsive interface.

---

## 🚀 Features

- Add new posts (todos)
- View all posts in a list
- Edit existing posts
- Delete posts
- Responsive UI with Tailwind CSS
- Inertia.js for seamless frontend + backend integration
- Single-page app experience with Laravel + Vue

---

## 🛠️ Tech Stack

- **Backend**: [Laravel 10+](https://laravel.com/)
- **Frontend**: [Vue.js 3](https://vuejs.org/)
- **SPA Bridge**: [Inertia.js](https://inertiajs.com/)
- **Styling**: [Tailwind CSS](https://tailwindcss.com/)
- **Database**: MySQL (default, can use others supported by Laravel)
- **Package Manager**: NPM

---

## 📂 Project Structure

```

laravel-vue-app/
│
├── app/               # Laravel backend
├── database/
│   └── migrations/    # Table definitions
│
├── resources/
│   ├── js/            # Vue components
│   └── views/         # Inertia-powered Blade views
│
├── routes/
│   ├── web.php        # App routes (Inertia pages)
│
└── public/            # Public assets

````

---

## 📋 Requirements

- PHP >= 8.2
- Composer
- Node.js >= 16.x & npm
- MySQL or any Laravel-supported database

---

## ⚙️ Installation & Setup

1. **Clone the repository**

   ```bash
   git clone https://github.com/phpwhizdeveloper002/todolist.git
````

2. **Backend (Laravel setup)**

   ```bash
   composer install
   cp .env.example .env
   php artisan key:generate
   ```

   Update your `.env` file with database credentials:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=todo_app
   DB_USERNAME=root
   DB_PASSWORD=
   ```

3. **Run Migrations**

   ```bash
   php artisan migrate
   ```

4. **Frontend (Vue + Tailwind + Inertia setup)**

   ```bash
   npm install
   npm run build
   npm run dev
   ```

5. **Run Laravel server**

   ```bash
   php artisan serve
   ```

   The application will be available at:

   * `http://127.0.0.1:8000`

---

## 🗄️ Database Schema

**Table: posts**

| Column      | Type        | Description              |
| ----------- | ----------- | ------------------------ |
| id          | BIGINT (PK) | Unique identifier        |
| title       | VARCHAR     | Title of the post        |
| content     | TEXT        | Post content / todo body |
| created\_at | TIMESTAMP   | Created timestamp        |
| updated\_at | TIMESTAMP   | Updated timestamp        |

### Migration File Example

```php
public function up()
{
    Schema::create('posts', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('content')->nullable();
        $table->timestamps();
    });
}
```

---

## 🎨 Pages

* **Home Page** → Displays all posts in a clean list
* **Add Post** → Form to create a new post
* **Edit Post** → Update an existing post
* **Delete Post** → Remove post from list
* **Responsive Design** → Works across devices

---

## 🧪 Running Tests

```bash
php artisan test
```

---

## 📜 License

This project is open-source and the source code is available on GitHub.


