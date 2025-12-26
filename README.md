# Singleton Pattern in Laravel

This project demonstrates the Singleton design pattern implementation in Laravel.

## About This Project

This is a Laravel application that showcases the Singleton design pattern. The Singleton pattern ensures that a class has only one instance and provides a global point of access to that instance.

### What is the Singleton Pattern?

The Singleton pattern is a creational design pattern that:
- Ensures a class has only one instance throughout the application lifecycle
- Provides a global access point to that instance
- Prevents direct instantiation, cloning, and serialization

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

## Testing the Singleton Pattern

### Via Web Browser or API

Visit `http://localhost:8000/slack` to see a JSON response demonstrating that:
- Both instances have the same object ID
- State is shared between instances
- The singleton pattern is working correctly


## Running Tests

Run the test suite:
```bash
php artisan test
```

Or run specific test suites:
```bash
# Run only feature tests
php artisan test --testsuite=Feature
```

## Learning Resources

- [Singleton Pattern on Wikipedia](https://en.wikipedia.org/wiki/Singleton_pattern)
- [Laravel Documentation](https://laravel.com/docs)
- [Design Patterns in PHP](https://designpatternsphp.readthedocs.io/)

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
