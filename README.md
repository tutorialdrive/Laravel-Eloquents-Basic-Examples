# Laravel-Eloquents-Basic-Examples


Set of eloquents examples with simple CURD application.

## System requirements
- PHP >= 7.1.3
-  PDO PHP Extension
-  Mbstring PHP Extension
-  Tokenizer PHP Extension
-  XML PHP Extension
-  Ctype PHP Extension
-  JSON PHP Extension

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

- GIT version control
- Web server

### Installing

1. Clone repository into your local machine
```
git clone https://github.com/tutorialdrive/Laravel-Eloquents-Basic-Examples.git
```

2. Create database schema into MySQL server

```
mysql> create schema <your_schema_name>;
```
3. Go to your project directory and edit **.env** file and change **APP_URL**, **DB_DATABASE**, **DB_USERNAME** and **DB_PASSWORD** based on your server's configuration values. I.e. Host name, database username and password.

4. Run following migration command to create database tables into your selected schema. It will create required tables into database. (There is database dump into database/dump directory, you can also use that.)
```
php artisan migrate
```

5. You can create virtual host or can you use PHP Laravel's built-in development server by running following command to serve your application.
```
php artisan serve
```

## Built With

* [Laravel](https://laravel.com/) - The PHP web framework used
* [Composer](https://getcomposer.org/) - Dependency package manager


## License
The Laravel framework is open-sourced software licensed under the GPL V3.
