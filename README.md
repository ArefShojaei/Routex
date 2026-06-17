# 🚀 Routex - PHP File-based Routing Framework

[![PHP Version](https://img.shields.io/badge/PHP-%5E8.0-blue.svg)](https://php.net)
[![License](https://img.shields.io/badge/license-MIT-green.svg)](LICENSE)
[![GitHub](https://img.shields.io/badge/github-Anchor-black?logo=github)](https://github.com/ArefShojaei/Anchor)

A lightweight and modern PHP framework with <b>file-based routing</b> inspired by Next.js, designed around the MVC architecture and developer-friendly CLI tools.

Build fast PHP applications with automatic routing, controllers, models, views, and custom commands.


<img width="1200" height="900" alt="Routex" src="https://github.com/user-attachments/assets/95536577-b33b-48b2-a901-8b2d5afdc9dd" />

---

## ✨ Features

* 🗂️ **File-based Routing** - Create routes using the file system structure
* ⚡ **Dynamic Routes** - Support for parameterized routes like `/products/:id`
* 🏗️ **MVC Architecture** - Organized structure with Models, Controllers, and Views
* 🧩 **Controller Injection** - Connect views to controllers seamlessly
* 🖥️ **Built-in Development Server** - Run your application with a simple CLI command
* 🔧 **Custom CLI Commands** - Extend your application with your own console commands
* 📦 **Composer Support** - Easy installation and dependency management
* 🪶 **Lightweight & Fast** - Minimal core with zero unnecessary complexity

---

# 🛣️ File-based Routing

Routex automatically converts your `pages/` directory into application routes.

Example:

```txt
pages/
│
├── index.php                 → /
├── about.php                 → /about
│
├── auth/
│   ├── login.php             → /auth/login
│   └── register.php          → /auth/register
│
├── products/
│   ├── index.php             → /products
│   └── [id].php              → /products/:id
│
└── admin/
    └── [id]/
        └── dashboard.php     → /admin/:id/dashboard
```

---

# 🏗️ Project Structure (MVC)

```txt
Routex/
│
├── app/
│   ├── Console/
│   │   └── Commands/
│   │
│   ├── Controllers/
│   └── Models/
│
├── config/
│   ├── app.php
│   └── database.php
│
├── pages/                    # Views
│   └── index.php
│
├── public/
│   ├── assets/
│   └── index.php
│
├── vendor/
├── cli
├── composer.json
└── README.md
```

---

# 📥 Installation & Setup

## Requirements

* PHP 8.0 or higher
* Composer

---

## Install using Composer

```bash
composer create-project arefshojaei/routex my-app
```

Move into your project:

```bash
cd my-app
```

---

## Clone from GitHub

```bash
git clone https://github.com/ArefShojaei/Routex.git
cd Routex
```

Install dependencies:

```bash
composer install
```

---

# 🚀 Running the Application

Routex comes with a built-in PHP development server.

### Default

```bash
php cli serve
```

### Custom Host

```bash
php cli serve --host:0.0.0.0
```

### Custom Port

```bash
php cli serve --port:3000
```

### Custom Host & Port

```bash
php cli serve --host:0.0.0.0 --port:3000
```

After running the server, open:

```txt
http://localhost:8000
```

---

# 🧠 MVC Usage

## 📦 Model

**File:** `app/Models/Product.php`

```php
<?php

namespace App\Models;

final class Product
{
    public string $title;
    public float $price;

    public function __construct(string $title, float $price)
    {
        $this->title = $title;
        $this->price = $price;
    }

    public function find()
    {
        // Find data
    }

    public function save()
    {
        // Save data
    }

    public function update()
    {
        // Update data
    }

    public function remove()
    {
        // Delete data
    }
}
```

---

## 🎮 Controller

**File:** `app/Controllers/ProductController.php`

```php
<?php

namespace App\Controllers;

use Routex\Contracts\BaseController;
use Routex\Http\Request;

final class ProductController implements BaseController
{
    public function __invoke(Request $request): array
    {
        return [
            "id" => 1,
            "title" => "Book",
            "price" => 99
        ];
    }
}
```

---

## 🎨 View

**File:** `pages/product.php`

```php
<?php

use App\Controllers\ProductController;
use Routex\View\Page;

extract(Page::resolve(ProductController::class));

?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Page</title>
</head>
<body>
    <span><?= $id ?></span>
    <h3><?= $title ?></h3>
    <p><?= $price ?></p>
</body>
</html>
```

---

# 💻 Custom CLI Commands (Optional)

Create your own commands inside:

```txt
app/Console/Commands/
```

Example:

```php
<?php

namespace App\Console\Commands;

use PhpX\Components\Console\Command;

final class ExampleCommand extends Command
{
    public function exec(array $params): string
    {
        // Command logic
        return "Command executed successfully!";
    }
}
```

---

# 🔥 Why Routex?

Routex provides a simple yet powerful development experience:

* No complex route configuration
* Familiar file-based routing system
* Clean MVC separation
* Simple CLI workflow
* Lightweight and easy to understand
* Perfect for small to medium PHP projects and learning purposes

---

# 🤝 Contributing

Contributions are always welcome.

1. Fork the repository
2. Create a feature branch

```bash
git checkout -b feature/amazing-feature
```

3. Commit your changes

```bash
git commit -m "Add amazing feature"
```

4. Push your branch

```bash
git push origin feature/amazing-feature
```

5. Open a Pull Request

---

# 👨‍💻 Author

**Aref Shojaei**
- 📧 Email: [arefshojaei82@gmail.com](mailto:arefshojaei82@gmail.com)
- 🐙 GitHub: [@ArefShojaei](https://github.com/ArefShojaei)
- 📦 Packagist: [arefshojaei/routex](https://packagist.org/packages/arefshojaei/routex)

---

# ⭐ Show Your Support

If Routex helps you in your projects, consider giving the repository a **Star ⭐** on GitHub.

Your support motivates further development and improvements.
