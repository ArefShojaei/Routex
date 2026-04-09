<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome to Routex</title>
        <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="/assets/css/styles.css">
        <link rel="icon" href="/assets/images/logo.png" sizes="192x192" />
    </head>
    <body>
        <nav class="pt-2">
            <div class="container">
                <ul>
                    <li>
                        <a href="https://github.com/ArefShojaei/Routex#README">Document</a>
                    </li>
                    <li>
                        <a href="https://github.com/ArefShojaei/Routex">Github</a>
                    </li>
                    <li>
                        <a href="https://github.com/ArefShojaei">Author</a>
                    </li>
                </ul>
            </div>
        </nav>

        <section class="hero container">
        <h1>Next.js Style Routing <span>for PHP</span></h1>
        <p class="subtitle mt-3">
        A lightweight file‑based routing system inspired by Next.js, built with PHP and structured around the MVC architecture.
        </p>
        </section>

        <section class="section container">

        <div class="row g-4">

        <div class="col-md-4">
        <div class="feature">
        <h6 class="mb-2">File Based Routing</h6>
        <p class="text-secondary mb-0">
        Routes are generated directly from the <strong>pages</strong> folder structure.
        </p>
        </div>
        </div>

        <div class="col-md-4">
        <div class="feature">
        <h6 class="mb-2">MVC Architecture</h6>
        <p class="text-secondary mb-0">
        Pages handle the <strong>View layer</strong> while Models and Controllers manage logic and data.
        </p>
        </div>
        </div>

        <div class="col-md-4">
        <div class="feature">
        <h6 class="mb-2">Clean Structure</h6>
        <p class="text-secondary mb-0">
        Organized project layout similar to modern frameworks.
        </p>
        </div>
        </div>

        </div>

        </section>

        <section class="section container">

        <h5 class="mb-3">Example Routing</h5>

        <div class="code">
        pages/
        |
        ├── index.php                →  /
        ├── about.php                →  /about
        ├── auth
        |   |     
        │   ├── login.php            →  /auth/login
        │   └── register.php         →  /auth/register
        | 
        ├── products 
        |   |     
        │   ├── index.php            →  /products
        │   └── [id].php             →  /products/:id
        | 
        ├── admin  
        |   |    
        │   └── [id]
        |       |
        │       └── dashboard.php    →  /admin/:id/dashboard
        |
        </div>

        <p class="text-secondary mt-3 mb-0">
        Creating a file automatically creates the route.
        </p>

        </section>

        <section class="section container">

        <h5 class="mb-3">MVC Project Structure</h5>

        <div class="code">
        Project
        |
        ├── app/
        │   ├── Controllers/
        │   └── Models/
        |
        ├── config/
        │   └── app.php
        │   └── database.php
        │
        ├── pages/        (Views)
        │   └── index.php
        │
        ├── public/
        │   ├── assets/
        │   └── index.php
        │
        ├── vendor/
        ├── .gitignore
        ├── composer.json
        └── README.md
        </div>

        <p class="text-secondary mt-3">
        The router maps URLs to files in <strong>pages</strong>, which act as the View layer in the MVC architecture.
        </p>

        </section>

        <footer>
        PHP • File Based Routing • MVC Inspired
        </footer>

    </body>
</html>