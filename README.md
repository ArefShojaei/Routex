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