# Short URL Generator

A simple URL shortening web application built using **React.js**, **CodeIgniter 4**, and **MySQL**.

## Project Overview

This project allows users to convert long URLs into shorter and more manageable links. Users can enter a long URL through the React frontend, and the CodeIgniter 4 backend will generate a unique short code, store the URL in MySQL, and redirect users to the original URL when the short link is visited.

The system also includes a click counter to track how many times each short URL has been accessed.

## Architecture

```text
User
 ↓
React.js Frontend
 ↓
CodeIgniter 4 API
 ↓
MySQL Database
```

The React frontend handles the user interface, while the CodeIgniter 4 backend handles URL validation, short code generation, database storage, and redirection.

## Features

- Generate short URLs from long URLs
- React.js frontend interface
- CodeIgniter 4 API backend
- MySQL database storage
- Redirect short URLs to original URLs
- URL input validation
- Unique short code generation
- Click counter tracking
- Responsive user interface

## Technology Stack

### Frontend

- React.js
- Vite
- CSS3

### Backend

- PHP
- CodeIgniter 4

### Database

- MySQL

## Example Usage

### Input

```text
https://www.google.com/search?q=force-tech
```

### Generated Short URL

```text
http://localhost:8080/abc123
```

### Redirect Result

When the user visits:

```text
http://localhost:8080/abc123
```

the application redirects to:

```text
https://www.google.com/search?q=force-tech
```

## Database Setup

Create database:

```sql
CREATE DATABASE short_url_generator;
```

Create table:

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

```bash
cd short-url-generator
```

### 2. Backend Setup

Install PHP dependencies:

```bash
composer install
```

Copy `env` to `.env` and configure database:

```env
CI_ENVIRONMENT = development

app.baseURL = 'http://localhost:8080/'

database.default.hostname = localhost
database.default.database = short_url_generator
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.port = 3306
```

Run backend server:

```bash
php spark serve
```

Backend runs at:

```text
http://localhost:8080
```

### 3. Frontend Setup

Open a new terminal:

```bash
cd frontend
npm install
npm run dev
```

Frontend runs at:

```text
http://localhost:5173
```

## Project Structure

```text
short-url-generator/
├── app/
│   ├── Controllers/
│   │   └── ShortUrlController.php
│   ├── Models/
│   │   └── ShortUrlModel.php
│   └── Views/
│       └── home.php
│
├── frontend/
│   ├── src/
│   │   ├── App.jsx
│   │   └── App.css
│   └── index.html
│
├── public/
├── README.md
└── composer.json
```

## Future Improvements

- Custom short URL alias
- QR code generation
- URL expiration date
- Analytics dashboard
- User authentication
- Copy short URL button

## Author

Nana Balqis

Software Developer Internship Screening Task