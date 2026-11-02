# Backend – Explore Bosnia

## Overview

The backend of Explore Bosnia is developed using PHP and MySQL. It handles database connections and provides database access through the DAO (Data Access Object) layer.

## Database

The project uses a MySQL database named `explore_bosnia`.

The database contains six tables:

1. `users`
2. `destinations`
3. `categories`
4. `reviews`
5. `favorites`
6. `destination_category`

The database includes primary keys, foreign keys, and sample data.

The SQL database export is located at:

`database/explore_bosnia.sql`

## Database Configuration

Database credentials are stored in:

`config/config.php`

For security reasons, this file is excluded from Git.

A template configuration file is provided as:

`config/config.example.php`

Before running the backend, copy the example configuration to `config.php` and update the database credentials if necessary.

## DAO Layer

The project uses a reusable `BaseDAO` class that provides common database operations:

- Create
- Read
- Update
- Delete

The following DAO classes are implemented:

- `UserDAO`
- `DestinationDAO`
- `CategoryDAO`
- `ReviewDAO`
- `FavoriteDAO`
- `DestinationCategoryDAO`

Prepared statements are used for database queries.

## API Routes

The backend currently includes a destinations API route:

`routes/destinations.php`

Supported HTTP methods:

- GET – Retrieve all destinations or one destination by ID.
- POST – Create a destination.
- PUT – Update a destination.
- PATCH – Update a destination.
- DELETE – Delete a destination.

## Testing

The database connection and DAO classes were tested using PHP CLI.

The destinations API was tested using Postman. GET, POST, PUT, and DELETE requests were successfully executed.

## Requirements

- PHP 8.2 or newer
- MySQL
- Apache (XAMPP can be used)
- PDO MySQL extension