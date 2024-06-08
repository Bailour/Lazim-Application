# Lazim Application

Lazim Application is a simple RESTful API for managing tasks within a Task Manager application, built using Laravel. This project provides basic CRUD (Create, Read, Update, Delete) operations for tasks and includes basic authentication to secure the API endpoints.

## Setup and Installation

1. **Clone the repository:**
    ```bash
    git clone https://github.com/Bailour/Lazim-Application.git
    ```


2. **Configure the database connection:**
    - Update the `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` fields in the `.env` file with your database configuration.
`

3. **Run database migrations:**
    ```bash
    php artisan migrate
    ```

4. **Install Laravel Breeze for Sanctum API for authentication:**
    ```bash
    composer require laravel/breeze --dev
    php artisan breeze:install api
    php artisan migrate
    ```


## Usage

1. **Start the development server:**
    ```bash
    php artisan serve
    ```

2. **API Endpoints:**
    - **GET** `/api/tasks`: Get all tasks.
    - **POST** `/api/tasks`: Create a new task.
    - **GET** `/api/tasks/{id}`: Get a specific task.
    - **PUT** `/api/tasks/{id}`: Update a task.
    - **DELETE** `/api/tasks/{id}`: Delete a task.
    - **POST** `/register`: Register a new user.
    - **POST** `/login`: Login a user.
    - **POST** `/logout`: Logout the authenticated user.

3. **Authentication:**
    - For API authentication, use Laravel Sanctum.

4. **Testing:**
    - Use Postman or any other API testing tool to test the API endpoints.


    json data for Creating Users in the database:
    {
        "name": "John Doe",
        "email": "john@example.com",
        "password": "password",
        "password_confirmation": "password"
    }

    For User Authentication
    {
        "email": "john@example.com",
        "password": "password",
    }


    json data for creating records in the database:
    {
        "title": "Laravel Task 1 Updated",
        "description": "Restful API",
        "completed": false
    }

    Attach a bearer AccessToken in header to create a new record.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.
