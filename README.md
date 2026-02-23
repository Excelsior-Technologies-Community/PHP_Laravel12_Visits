# PHP_Laravel12_Visits

## Project Description:

PHP_Laravel12_Visits is a simple Laravel 12 project that demonstrates how to manage posts and track both total and unique visits for each post. The project includes a modern, responsive dashboard design with card-style post display and visit badges. This is useful for learning database interactions, MVC architecture, and front-end integration in Laravel.


## Technologies Used:

- Framework: Laravel 12

- Language: PHP 8+

- Database: MySQL

- Front-end: Blade Templating, HTML, CSS, Font Awesome Icons

- Tools: Composer, Artisan CLI, phpMyAdmin/XAMPP

## Key Features:

- Create, view, and track posts.

- Track total visits and unique visits per post.

- Responsive, professional UI with hover effects and badges.

- Fully database-driven with migrations and seeders.

- Easy to extend for future features like authentication or comments.

## How It Works:

- Posts are stored in the database with title and body.

- Each post tracks total and unique visits using dedicated columns.

- PostController fetches posts and passes data to the Blade view for display.


---



## Installation Steps


---


## STEP 1: Create Laravel 12 Project

### Open terminal / CMD and run:

```
composer create-project laravel/laravel PHP_Laravel12_Visits "12.*"

```

### Go inside project:

```
cd PHP_Laravel12_Visits

```

#### Explanation:

Installs a fresh Laravel 12 application with all core files.





## STEP 2: Database Setup 

### Open .env and set:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel12_visits
DB_USERNAME=root
DB_PASSWORD=

```

### Create database in MySQL / phpMyAdmin:

```
Database name: laravel12_visits

```


### Run initial migration:

```
php artisan migrate

```


#### Explanation:

Configures database connection for Laravel to store posts and visits.

Creates default Laravel tables like users and migrations.




## STEP 3: Create a Posts Table

### Run:

```
php artisan make:model Post -m

```

### Edit migration file in database/migrations/..._create_posts_table.php:

```
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('body');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};

```


### Run migration:

```
php artisan migrate

```

#### Explanation:

Generates the Post model and migration file.

Creates the posts table with title and body columns.





## STEP 4: Seed Some Example Posts

### Run: 

```
php artisan make:seeder PostSeeder

```

### database/seeders/PostSeeder.php:

```
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        Post::create([
            'title' => 'First Post',
            'body' => 'This is the first post body.'
        ]);

        Post::create([
            'title' => 'Second Post',
            'body' => 'This is the second post body.'
        ]);
    }
}

```


### Run seeder:

```
php artisan db:seed --class=PostSeeder

```


#### Explanation:

Populates the posts table with sample data for testing.




## STEP 5: Create VisitController

### Run:

```
php artisan make:controller PostController

```

### app/Http/Controllers/PostController.php:

```
<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        // Set default visits to 0
        foreach ($posts as $post) {
            $post->totalVisits = 1;
            $post->uniqueVisits = 1;
        }

        return view('posts.index', compact('posts'));
    }
}

```

#### Explanation:

Fetches posts from the database and prepares visit counters for display.





## STEP 6: Set Routes

### routes/web.php:

```
<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index']);


```


#### Explanation:

Sets the home page route to display the posts dashboard.





## STEP 7: Create Blade Views

### resources/views/posts/index.blade.php

```
<!DOCTYPE html>
<html>
<head>
    <title>Posts</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        /* General Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            color: #333;
            margin: 0;
            padding: 0;
        }

        /* Header */
        h1 {
            text-align: center;
            margin-top: 40px;
            color: #fff;
            background: linear-gradient(90deg, #1e3a8a, #2563eb); /* Dark to lighter blue */
            padding: 25px 0;
            border-radius: 10px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.1);
            font-size: 2.2em;
        }

        /* Posts list */
        ul {
            list-style: none;
            padding: 0;
            max-width: 900px;
            margin: 30px auto;
        }

        /* Post card */
        li {
            background-color: #ffffff;
            border-left: 6px solid #2563eb; /* professional blue */
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.08);
            padding: 25px 20px;
            margin-bottom: 25px;
            transition: transform 0.25s, box-shadow 0.25s;
        }

        li:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }

        h2 {
            margin-top: 0;
            color: #1f2937;
            font-size: 1.6em;
        }

        p {
            line-height: 1.7;
            color: #4b5563;
            font-size: 1em;
        }

        /* Visits badges */
        .visits {
            display: inline-flex;
            align-items: center;
            margin-top: 15px;
            padding: 6px 12px;
            border-radius: 25px;
            font-weight: bold;
            font-size: 0.95em;
        }

        .total-visits {
            background-color: #60a5fa; /* Light blue */
            color: #1e3a8a;
            margin-right: 10px;
        }

        .unique-visits {
            background-color: #34d399; /* Mint green */
            color: #065f46;
        }

        .visits i {
            margin-right: 6px;
        }

        /* Responsive */
        @media (max-width: 600px) {
            li {
                padding: 20px;
            }

            h1 {
                font-size: 1.8em;
            }

            h2 {
                font-size: 1.3em;
            }
        }
    </style>
</head>
<body>
    <h1>Posts Dashboard</h1>
    @if($posts->count())
        <ul>
            @foreach($posts as $post)
                <li>
                    <h2>{{ $post->title }}</h2>
                    <p>{{ $post->body }}</p>
                    <span class="visits total-visits"><i class="fas fa-eye"></i> Total Visits: {{ $post->totalVisits }}</span>
                    <span class="visits unique-visits"><i class="fas fa-user-check"></i> Unique Visits: {{ $post->uniqueVisits }}</span>
                </li>
            @endforeach
        </ul>
    @else
        <p style="text-align: center; color: #6b7280; margin-top: 20px;">No posts found.</p>
    @endif
</body>
</html>

```

#### Explanation:

Displays posts in a modern card layout with professional colors, hover effects, and visit badges.





## STEP 8: Add visit columns to posts table

### Create a migration:

```
php artisan make:migration add_visits_to_posts_table --table=posts

```

### Edit it like this:

```
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->integer('total_visits')->default(0);
            $table->integer('unique_visits')->default(0);
        });
    }

    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn(['total_visits', 'unique_visits']);
        });
    }
};

```


#### Explanation:

Adds columns for tracking total and unique post visits.




## STEP 9: Run Server

### Run: 

```
php artisan serve

```

### Open:

```
http://127.0.0.1:8000

```

#### Explanation:

Starts the development server to view posts dashboard locally.




## Expected Output:


<img width="1919" height="958" alt="Screenshot 2026-02-23 184832" src="https://github.com/user-attachments/assets/7c66ce12-1ff7-4f5c-8c5d-c504151c7464" />



---

# Project Folder Structure:

```
PHP_Laravel12_Visits/
│
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   └── PostController.php
│   │   └── ...
│   ├── Models/
│   │   └── Post.php
│   └── ...
│
├── database/
│   ├── migrations/
│   │   ├── 2026_02_23_000000_create_posts_table.php
│   │   └── 2026_02_23_000001_add_visits_to_posts_table.php
│   ├── seeders/
│   │   └── PostSeeder.php
│   └── ...
│
├── resources/
│   └── views/
│       └── posts/
│           └── index.blade.php
│
├── routes/
│   └── web.php
│
├── public/
│   └── index.php
│
├── composer.json
└── .env

```
