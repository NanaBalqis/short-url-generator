# Short URL Generator

A simple URL shortening web application built using CodeIgniter 4 and MySQL.

## Project Overview

This project allows users to convert long URLs into shorter, more manageable links. The generated short URLs can be shared and used to redirect users to the original URL. The application also tracks the number of clicks for each shortened URL.

## Features

- Generate short URLs from long URLs
- Redirect short URLs to the original destination
- Store URL mappings in MySQL database
- Input validation for URLs
- Unique short code generation
- Click counter for tracking URL usage
- Simple and responsive user interface using Bootstrap 5

## Technology Stack

### Backend
- PHP
- CodeIgniter 4

### Frontend
- HTML5
- Bootstrap 5

### Database
- MySQL

## Database Setup

Create a database named:

```sql
CREATE DATABASE short_url_generator;
```

Select the database and run:

```sql
CREATE TABLE short_urls (
    id INT AUTO_INCREMENT PRIMARY KEY,
    original_url TEXT NOT NULL,
    short_code VARCHAR(10) NOT NULL UNIQUE,
    clicks INT DEFAULT 0,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
```

## Installation Guide

### 1. Clone Repository

```bash
git clone https://github.com/NanaBalqis/short-url-generator.git
```

### 2. Move Into Project Directory

```bash
cd short-url-generator
```

### 3. Install Dependencies

```bash
composer install
```

### 4. Configure Environment

Copy:

```text
env
```

to:

```text
.env
```

Configure database settings in `.env`:

```env
database.default.hostname = localhost
database.default.database = short_url_generator
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.port = 3306
```

### 5. Start Development Server

```bash
php spark serve
```

### 6. Open Application

```text
http://localhost:8080
```

## Example Usage

### Input

```text
https://www.google.com/search?q=force-tech
```

### Generated Short URL

```text
http://localhost:8080/abc123
```

### Result

When a user accesses:

```text
http://localhost:8080/abc123
```

the application automatically redirects to:

```text
https://www.google.com/search?q=force-tech
```

## Project Structure

```text
app/
├── Controllers
│   └── ShortUrlController.php
│
├── Models
│   └── ShortUrlModel.php
│
├── Views
│   └── home.php
│
app/Config
│   └── Routes.php
```

## Future Improvements

- Custom short URLs
- QR Code generation
- URL expiration
- User authentication
- Analytics dashboard
- REST API support

## Author

Nana Balqis

Software Developer Internship Screening Task