# Singleton Pattern in Laravel

This project demonstrates the Singleton design pattern implementation in Laravel.

## About This Project

This is a Laravel application that showcases the Singleton design pattern. The Singleton pattern ensures that a class has only one instance and provides a global point of access to that instance.

### What is the Singleton Pattern?

The Singleton pattern is a creational design pattern that:
- Ensures a class has only one instance throughout the application lifecycle
- Provides a global access point to that instance
- Prevents direct instantiation, cloning, and serialization

### Implementation

This project includes:
- **ConfigurationService** (`app/Services/ConfigurationService.php`) - A singleton service class that demonstrates the pattern
- **SingletonController** (`app/Http/Controllers/SingletonController.php`) - A controller that demonstrates singleton usage
- **Unit Tests** (`tests/Unit/SingletonTest.php`) - Tests that verify the singleton behavior
- **Feature Tests** (`tests/Feature/SingletonControllerTest.php`) - Tests for the demonstration endpoint

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

Visit `http://localhost:8000/singleton-demo` to see a JSON response demonstrating that:
- Both instances have the same object ID
- State is shared between instances
- The singleton pattern is working correctly

Example response:
```json
{
    "message": "Singleton Pattern Demonstration",
    "are_same_instance": true,
    "value_from_first_instance": "This is set from the first instance",
    "value_from_second_instance": "This is set from the first instance",
    "all_configuration": {
        "app_name": "Singleton Pattern Demo",
        "version": "1.0.0",
        "environment": "development",
        "demo": "This is set from the first instance"
    },
    "instance_id_1": 261,
    "instance_id_2": 261,
    "explanation": "Both instance IDs are the same, proving it's a singleton..."
}
```

### Via Command Line

```bash
curl http://localhost:8000/singleton-demo
```

## Running Tests

Run the test suite:
```bash
php artisan test
```

Or run specific test suites:
```bash
# Run only unit tests
php artisan test --testsuite=Unit

# Run only feature tests
php artisan test --testsuite=Feature
```

## Key Features of the Implementation

1. **Private Constructor**: Prevents direct instantiation using `new ConfigurationService()`
2. **Private Clone Method**: Prevents cloning of the singleton instance
3. **Static Instance**: Maintains a single static instance of the class
4. **Public Static Accessor**: Provides `getInstance()` method for accessing the singleton
5. **State Persistence**: Demonstrates that state is shared across all references to the singleton

## Learning Resources

- [Singleton Pattern on Wikipedia](https://en.wikipedia.org/wiki/Singleton_pattern)
- [Laravel Documentation](https://laravel.com/docs)
- [Design Patterns in PHP](https://designpatternsphp.readthedocs.io/)

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
