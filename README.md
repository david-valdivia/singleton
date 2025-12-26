# Singleton Pattern in Laravel

This project demonstrates the Singleton design pattern implementation in Laravel.

## About This Project

This is a Laravel application that showcases the Singleton design pattern. The Singleton pattern ensures that a class has only one instance and provides a global point of access to that instance.

## Requirements

- PHP 8.3 or higher
- Composer
- SQLite (for database)

## Installation

1. Clone the repository
2. Install dependencies:
   ```bash
   composer install
   ```
3. Copy the environment file:
   ```bash
   cp .env.example .env
   ```
4. Generate application key:
   ```bash
   php artisan key:generate
   ```
5. Run migrations:
   ```bash
   php artisan migrate
   ```

## Running the Application

Start the development server:
```bash
php artisan serve
```

The application will be available at `http://localhost:8000`

## Testing

Run the test suite:
```bash
php artisan test
```

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
