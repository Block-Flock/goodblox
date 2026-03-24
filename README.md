# GoodBlox Project Documentation

## Overview
This project is an ongoing migration to Laravel 11 from legacy PHP code. Laravel provides an elegant syntax and powerful tools for building modern web applications.

## Setup Instructions

### Prerequisites
- PHP 8.1 or higher
- Composer

### Installing Dependencies
1. Clone the repository:
   ```bash
   git clone https://github.com/Block-Flock/goodblox.git
   cd goodblox
   ```

2. Install Composer dependencies:
   ```bash
   composer install
   ```

### Configuring Environment
1. Rename the `.env.example` file to `.env`:
   ```bash
   cp .env.example .env
   ```

2. Generate application key:
   ```bash
   php artisan key:generate
   ```

3. Configure your database settings in the `.env` file. Ensure to set `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` correctly.

### Running Migrations
To create the database tables, run the Laravel migrations:
```bash
php artisan migrate
```

### Seeding the Database
If you have seeders, you can populate your database using:
```bash
php artisan db:seed
```

## Features
- **User Authentication**: Leverage Laravel's built-in authentication features.
- **Eloquent ORM**: Use the Eloquent ORM for database interactions.

## Contribution
Please follow the standard procedures for contributing to the project. Pull requests are welcome!

## License
This project is licensed under the MIT License. See the LICENSE file for details.

## Acknowledgements
- Laravel team for their outstanding framework.

**Last Updated**: 2026-03-24 16:23:03 UTC