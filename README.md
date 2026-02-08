# School Library Management System

A simple and complete Laravel-based library management system for schools, demonstrating clean MVC architecture, authentication, and full CRUD operations.

## Features

### Core Features
- **Role-based Authentication**: Admin and Student roles with proper middleware
- **Book Management**: Full CRUD operations for books and categories
- **Student Management**: Admin can manage student accounts
- **Borrowing Workflow**: Complete book borrowing process with approval and return
- **Fine System**: Automatic fine calculation for late returns (1000 IDR per day)
- **Dashboard**: Statistics and quick actions for both roles

### Tech Stack
- **Backend**: Laravel 12
- **Frontend**: Blade Templates + Bootstrap 5
- **Authentication**: Laravel Breeze
- **Database**: MySQL

## Installation

### Prerequisites
- PHP 8.2+
- Composer
- **Laragon** (recommended) OR MySQL/MariaDB
- Node.js & NPM (for frontend assets)

### Laragon Setup (Recommended)

**Step 1: Project Setup in Laragon**
1. Extract your project to: `C:\laragon\www\deden-perpus\`
2. Open Laragon
3. Click "Menu" → "Quick create" → "Create project" (optional)
4. Laragon will automatically create virtual host: `http://deden-perpus.test`

**Step 2: Database Setup**
1. Open Laragon Menu → Database → phpMyAdmin
2. Create new database: `library_db`
3. Default Laragon MySQL credentials are:
   - Host: `127.0.0.1`
   - Port: `3306` 
   - Username: `root`
   - Password: (empty)

**Step 3: Install Dependencies**
- Navigate to project folder in terminal:
  ```bash
  cd C:\laragon\www\deden-perpus
  composer install
  npm install
  ```

**Step 4: Environment Setup**
```bash
php artisan key:generate
```

**Step 5: Run Migrations & Seed**
```bash
php artisan migrate --seed
```

**Step 6: Build Assets**
```bash
npm run dev
```

**Step 7: Start Application**
- Laragon serves automatically at: `http://deden-perpus.test`
- Or manually: `php artisan serve` → `http://localhost:8000`

### Alternative Setup (Without Laragon)

### Setup Instructions

1. **Clone/Extract the project to your directory**

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database configuration**
   - For **Laragon MySQL**, the database is pre-configured!
   - Just create a database named `library_db` in Laragon or use your preferred name
   - Edit `.env` file if needed (Laragon defaults usually work):
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=library_db
   DB_USERNAME=root
   DB_PASSWORD=
   ```
   
   **Laragon Setup Tips:**
   - Laragon MySQL usually has: `root` user, no password, port 3306
   - Access phpMyAdmin via Laragon menu → Database → phpMyAdmin
   - Create database `library_db` (or update .env with your preferred name)
   - URL will be: `http://deden-perpus.test` (Laragon auto-creates .test domains)

5. **Run migrations and seed data**
   ```bash
   php artisan migrate --seed
   ```

6. **Build frontend assets**
   ```bash
   npm run dev
   ```

7. **Start the server**
   - **For Laragon**: Just open Laragon and it will automatically serve your project
   - **Or manually**: 
     ```bash
     php artisan serve
     ```
   - Access the app at: `http://deden-perpus.test` (Laragon) or `http://localhost:8000`

## Default Accounts

### Admin Account
- **Email**: admin@library.com
- **Password**: password

### Student Accounts
- **Email**: student1@school.com through student10@school.com
- **Password**: password

## Application Structure

### Directory Structure
```
app/
├── Http/Controllers/
│   ├── Admin/
│   │   ├── DashboardController.php
│   │   ├── CategoryController.php
│   │   ├── BookController.php
│   │   ├── StudentController.php
│   │   └── BorrowingController.php
│   ├── Student/
│   │   ├── DashboardController.php
│   │   ├── BookController.php
│   │   └── BorrowingController.php
│   └── Auth/
│       └── AuthenticatedSessionController.php
├── Models/
│   ├── User.php
│   ├── Category.php
│   ├── Book.php
│   └── Borrowing.php
└── Http/Middleware/
    ├── AdminMiddleware.php
    └── SiswaMiddleware.php

resources/views/
├── admin/
│   ├── dashboard/
│   ├── categories/
│   ├── books/
│   ├── students/
│   └── borrowings/
└── student/
    ├── dashboard/
    ├── books/
    └── borrowings/
```

### Database Schema

#### Users Table
- `id`, `name`, `email`, `password`
- `role` (enum: admin, siswa)
- `nis` (Student ID, nullable)
- `kelas` (Class, nullable)

#### Categories Table
- `id`, `name`, `timestamps`

#### Books Table
- `id`, `kode_buku` (unique book code)
- `judul`, `penulis`, `penerbit`
- `tahun_terbit`, `stok`
- `category_id` (foreign key)

#### Borrowings Table
- `id`, `user_id`, `book_id`
- `tanggal_pinjam`, `tanggal_kembali_rencana`
- `tanggal_kembali_real` (nullable)
- `status` (enum: pending, dipinjam, selesai)
- `denda` (fine amount)

## Routes Structure

### Admin Routes (`/admin/*`)
- `/admin/dashboard` - Admin dashboard
- `/admin/categories/*` - Category management
- `/admin/books/*` - Book management  
- `/admin/students/*` - Student management
- `/admin/borrowings/*` - Borrowing management

### Student Routes (`/student/*`)
- `/student/dashboard` - Student dashboard
- `/student/books/*` - Book catalog and borrowing
- `/student/my-borrowings/*` - Personal borrowing history

## User Roles & Permissions

### Admin / Petugas
- Full access to all features
- Manage categories, books, and students
- Approve/reject borrowing requests
- Process book returns and calculate fines
- View system statistics and reports

### Student / Siswa
- View book catalog and search
- Request book borrowing
- View personal borrowing history
- Track current borrowed books
- Cannot access admin pages

## Borrowing Workflow

1. **Student Request**: Student browses catalog and requests to borrow a book
2. **Admin Approval**: Admin reviews and approves pending requests
3. **Book Issued**: Stock is decremented, status changes to "dipinjam"
4. **Return Process**: Admin processes returns and calculates fines if overdue
5. **Book Available**: Stock is incremented, status changes to "selesai"

## Fine Calculation

- **Maximum borrow duration**: 7 days
- **Fine rate**: 1000 IDR per late day
- **Calculation**: Fine = (actual_return_date - planned_return_date) × 1000

## Key Features Demonstrated

### Laravel Architecture
- **MVC Pattern**: Proper separation of concerns
- **Eloquent ORM**: Database relationships and queries
- **Middleware**: Role-based access control
- **Blade Templates**: Dynamic content rendering
- **Form Validation**: Request validation and error handling
- **Resource Controllers**: RESTful API patterns

### Authentication & Authorization
- **Laravel Breeze**: Simple authentication setup
- **Role Management**: Admin and Student roles
- **Route Protection**: Middleware-based access control
- **Session Management**: Secure user sessions

### Database Design
- **Relational Model**: Foreign keys and relationships
- **Data Integrity**: Proper constraints and validation
- **Migration System**: Version-controlled database schema
- **Seeders**: Sample data generation

### Development Best Practices
- **Clean Code**: Well-organized and readable code
- **Security**: Input validation and CSRF protection
- **Responsive Design**: Bootstrap-based UI
- **Error Handling**: Flash messages and validation feedback

## Running Tests

The project includes basic setup for testing. To run tests:

```bash
php artisan test
```

## Deployment Considerations

For production deployment:

1. Set appropriate file permissions
2. Configure proper database credentials
3. Set up SSL certificate
4. Configure environment variables
5. Optimize autoloader and cache
6. Set up proper backup system

## Contributing

This project serves as a portfolio demonstration of Laravel development skills. Feel free to use it as a reference for your own projects.

## License

This project is for educational and portfolio purposes.