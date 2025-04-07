# 🚀 Laravel Mix Setup Guide
 
Welcome to your **Laravel Mix** setup! This guide walks you through creating a Laravel project, integrating Laravel Mix, and organizing your project structure in a fun and efficient way. 
This guide is a custom setup I created for my Laravel projects. Feel free to use it as a reference or as a base setup for your own projects. Let's build something awesome! Let's get started! 😎

---  
 
## 🛠️ Prerequisites

Before diving in, make sure you have the following installed: 

- [Node.js](https://nodejs.org/) (Latest LTS version recommended)
- [npm](https://www.npmjs.com/) or [yarn](https://yarnpkg.com/)
- [Composer](https://getcomposer.org/)
- [PHP](https://www.php.net/)

---

## 🐘 What is Laravel?

**Laravel** is a PHP framework designed for web artisans. It provides an elegant syntax, tools for database migration, robust routing, and much more to make web development seamless and enjoyable. In this guide, we're using **Laravel version 11**, which includes the latest features and improvements for your projects. 🎉

---

## ⚙️ Step-by-Step Setup

### 1️⃣ Create Your Laravel Project
Run the following command to create a Laravel project named `myApp`. This initializes a fresh Laravel installation:

```bash
composer create-project laravel/laravel myApp
```

### 2️⃣ Navigate to the Project Folder
Move into your newly created Laravel project directory:

```bash
cd myApp
```

### 3️⃣ Install npm Dependencies
Install all required frontend dependencies using npm:

```bash
npm install
```

### 4️⃣ Initialize Node.js
Set up `package.json` with default settings by running:

```bash
npm init -y
```

This creates a basic configuration file for managing your project's Node.js dependencies.

### 5️⃣ Install Laravel Mix
Add Laravel Mix, a tool that simplifies compiling assets like CSS and JavaScript:

```bash
npm install laravel-mix --save-dev
```

### 6️⃣ Create `webpack.mix.js`
Generate the `webpack.mix.js` file in the root of your project:

```bash
New-Item webpack.mix.js -ItemType File
```

Fill it with the following configuration:

```javascript
const mix = require("laravel-mix");

// Compile CSS
mix.postCss("resources/css/style.css", "public/css/app.css", [
    require("autoprefixer")({
        overrideBrowserslist: ["last 10 versions"],
        grid: true,
    }),
]);

// Compile JS
mix.scripts(
    ["resources/js/main.js", "resources/js/jquery-3.7.1.min.js"],
    "public/js/app.js"
);

// Minify files
mix.minify("public/css/app.css");
mix.minify("public/js/app.js");

// Enable live reload
mix.browserSync("localhost:8000");
```

This file tells Laravel Mix how to compile, combine, and optimize your assets.

---

## 🗂️ Project Structure
Here’s how your folder structure should look after setup:

```
app
|
|___/Functions
|   |
|   |___/MyFunctions.php
|
|___/Http
|
|___/Models
|
|___/Providers

public
|
|___/css
|
|___/img
|
|___/js

resources
|
|___/css
|   |
|   |___/style.css
|
|___/js
|   |
|   |___/jquery-3.7.1.min.js
|   |
|   |___/main.js
|
|___/views
    |
    |___/pages
    |   |
    |   |___/admin
    |   |   |
    |   |   |___/components
    |   |   |
    |   |   |___/dashboard.blade.php
    |   |   
    |   |___/user
    |       |
    |       |___/components
    |       |
    |       |___/home.blade.php
    |
    |___/templates
    |   |
    |   |___/footer.blade.php
    |   |
    |   |___/header.blade.php
    |
    |___/index.blade.php

```

### 🔧 File Adjustments

1. **Replace `welcome.blade.php`:** Delete the default `welcome.blade.php` file in `resources/views`. Rename `app.css` to `style.css` in `resources/css`.

2. **Create Functions Class:** Add custom utility functions for your project in `app/Functions/MyFunctions.php`:

```php
<?php
namespace App\Functions;

class MyFunctions
{
    public static function greet($name): string
    {
        return "Hello, " . $name;
    }
}
```

3. **Update Controller:** Use the custom function in your controller:

```php
<?php

namespace App\Http\Controllers;

use App\Functions\MyFunctions;

abstract class Controller
{
    public function showGreeting()
    {
        $greeting = MyFunctions::greet('Samuel Rai');
        return view('pages.user.home', ['greeting' => $greeting]);
    }
}
```

4. **Edit `composer.json`** to autoload the `Functions` namespace:

```json
"autoload": {
        "psr-4": {
            "App\\": "app/",
            "Database\\Factories\\": "database/factories/",
            "Database\\Seeders\\": "database/seeders/",

            "App\\Functions\\": "app/Functions/"
        }
    },
```

5. **Run `composer dump-autoload`:**
   After editing `composer.json`, make sure to regenerate the autoload files by running the following command:

   ```bash
   composer dump-autoload
   ```

6. Create `HomeController.php`.
   Generate a new `HomeController` using the following command:

    ```bash
    php artisan make:controller HomeController
    ```

8. **Add jQuery to `resources/js`:** Download the latest version of jQuery from [jQuery Official Website](https://jquery.com/) and place it in the `resources/js` folder.
   Initialize `main.js`: Create a `main.js` file in `resources/js` with the following content:

```javascript
$(function () {
    console.log("ready!");
});
```

8. **Set Routes in `web.php`:** Configure routes for the homepage and admin dashboard in `routes/web.php`:

```php
<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'showGreeting'])->name('index');

Route::get('/dashboard', function () {
    return view('pages/admin/dashboard');
})->name('admin-dashboard');
```

9. **CSS Initialization (`style.css`):** Initialize your CSS file with the following content:

```css
* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: "Roboto", sans-serif;
}

:root {
    --black: #000000;
    --white: #ffffff;
}

::-webkit-scrollbar {
    width: 12px;
    height: 12px;
}
::-webkit-scrollbar-track {
    background-color: #f1f1f1;
    border-radius: 10px;
}
::-webkit-scrollbar-thumb {
    background-color: #b1b1b1;
    border-radius: 10px;
}
::-webkit-scrollbar-thumb:hover {
    background-color: #9d9d9d;
}
```

10. **Blade Template (`index.blade.php`):** Create or update your main Blade template with the following content:

```blade
<!DOCTYPE html>
<html lang="en">

<head>
    {{-- Declaring character encoding as UTF-8 to support various international characters --}}
    <meta charset="UTF-8">
    {{-- Setting viewport for responsive design --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Import Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    {{-- Import custom CSS --}}
    <link rel="stylesheet" href="{{ mix('css/app.min.css') }}">
    {{-- Import custom JS --}}
    <script src="{{ mix('js/app.min.js') }}"></script>

    @yield('title')
</head>

<body>
    @yield('content')
</body>

</html>
```

11. **Child Blade Template (`home.blade.php`):** Create or update your child Blade template:

```blade
{{-- 
Using Laravel Blade's feature to inherit a template from the `main.blade.php` file. 
This `main` template is typically located in the `resources/views` folder. 
--}}
@extends('index')

@section('title')

<title>Document</title>

@endsection
{{-- 
Defining a section named `content`.
This section will replace @ yield('content') found in the `main` template. 
--}}
@section('content')

{{-- content area --}}

<body id="home">
    @include('templates/header')
    @if(isset($greeting))
    <h1>{{ $greeting }}</h1>
    @endif
    @include('templates/footer')
</body>

{{-- 
Closing the definition of the `content` section. All content between @ section and @ endsection
will be rendered in place of @ yield('content') in the `main.blade.php` template file. 
--}}
@endsection
```

## 🔥 Compile Assets

To compile your assets, run:

```bash
npx mix
npx mix
```

Start the Laravel server with:

```bash
php artisan serve
```

For live reload during development, open a new terminal in the root directory of your project (myApp) and run the following command:

```bash
npx mix watch
```

🎉 Tada! Your Laravel project is ready to go! 🚀
