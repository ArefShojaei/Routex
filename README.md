<div align="center">
    <img src="docs/Logo.png" width="350" />
</div>
<h1 align="center">PHP File based Routing</h1>
<p>A lightweight file‑based Routing system inspired by Next.js, built with PHP and structured around the MVC architecture.</p>


## Routing patterns
```txt
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
```

### Folder structure (MVC)
```txt
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
```

## Installation
> Composer
```bash
composer create-project arefshojaei/routex my-app
```

> Github
```bash
git clone https://github.com/ArefShojaei/Routex/Routex.git
```

## How to run the App?
You can use two ways for running such as:
> Built-in PHP web-server
```bash
php -S [host]:[port] -t public/
```

> Apache web-server
```txt
Soon...
```

## How to use the MVC?
### Model
> app/Models/Post.php
```php
<?php

namespace App\Models;

final class Product {
    public function __construct(
        public string $title,
        public float $price
    ) {}

    public function find() {...}
    public function save() {...}
    public function update() {...}
    public function remove() {...}
}
```

### Controller
> app/Controllers/PostController.php
```php
<?php

namespace App\Controllers;

use Routex\Contracts\BaseController;

final class ProductController implements BaseController {
    public function __invoke(): array
    {
        return [
            "id" => 1,
            "title" => "Book",
            "price" => 99,
        ];
    }
}
```

### View
> app/pages/post.php
```php
<?php

use App\Controllers\ProductController;
use Routex\View\Page;

extract(Page::resolve(ProductController::class));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product page</title>
</head>
<body>
    <div>
        <span><?= $id ?></span> 
        <h3><?= $title ?></h3>
        <p><?= $price ?></p>
    </div>
</body>
</html>
```