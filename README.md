# Laravel CRUD API with Authentication

This is a simple Laravel CRUD API that allows you to create, read, update, and delete data from a PostgreSQL database. The API also has login and logout functionality to protect certain routes from unauthorized access.

## Installation

To install this application, follow these steps:

1. Clone the repository:
```
   git clone https://github.com/Muhammed-Burhan/Laravel-crud-api.git
```
2. Install the dependencies:
```
   composer install
```
3. Copy the `.env.example` file to `.env`:

4. Update the `.env` file with the appropriate database information and other settings.

5. Run the database migrations:
```
   php artisan migrate
```
6. Start the local development server:
```
   php artisan serve
```

## Usage

Once the application is running, you can access it using a web browser or an HTTP client such as Postman. The API endpoints are as follows:

- `POST /api/login` - Log in to the application and get an access token
- `POST /api/logout` - Log out of the application and invalidate the access token
- `GET /api/products` - Get a list of all products 
- `GET /api/products/{id}` - Get a single products by ID
- `Get /api/products/search/{name}` - Search for a products by name
- `POST /api/products` - Create a new products (requires authentication)
- `PUT /api/products/{id}` - Update an existing products (requires authentication)
- `DELETE /api/products/{id}` - Delete a user by ID (requires authentication)
 

To access the protected routes, you need to include an `Authorization` header in your request with a valid access token. The access token is returned when you log in to the application.
