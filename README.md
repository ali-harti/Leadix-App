# 💼 LeadiX CRM

[![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20.svg?logo=laravel)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4.svg?logo=php)](https://php.net)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind-CSS-38B2AC.svg?logo=tailwind-css)](https://tailwindcss.com)
[![Alpine.js](https://img.shields.io/badge/Alpine.js-3.x-8BC0D0.svg)](https://alpinejs.dev)
[![Vite](https://img.shields.io/badge/Vite-7.x-646CFF.svg?logo=vite)](https://vitejs.dev)

A modern, high-performance, and multi-tenant Customer Relationship Management (CRM) platform built with Laravel 12. LeadiX centralizes and automates the entire business cycle for organizations, perfectly bridging the gap between sales and finance.

**The Core Workflow:**
`Lead` ➔ `Deal` ➔ `Invoice` ➔ `Payment`

## ✨ Features

- **Multi-tenant Architecture**: Complete data isolation between different organizations and teams.
- **Lead & Deal Pipeline**: Visually manage your sales funnel with a drag-and-drop Kanban board.
- **Automated Invoicing**: Deals marked as "Won" instantly generate PDF invoices (powered by `dompdf`).
- **Cashflow Dashboard**: Track revenue, manage overdue invoices, and monitor financial performance.
- **Real-time Notifications**: Never miss an important pipeline update or overdue payment.
- **Role-Based Access Control (RBAC)**: Strict permission boundaries for `Admin`, `Sales`, and `Finance` roles.
- **Premium Dark Mode UI**: Beautiful glassmorphic design system ("Dark Nebula") with micro-animations.

## 🚀 Quick Start

### Prerequisites

Ensure you have **PHP 8.2+**, **Composer**, and **Node.js** installed on your system.

### Installation

1. Clone the repository:
```bash
git clone https://github.com/ali-harti/Leadix-App.git
cd Leadix-App
```

2. Install PHP and Frontend dependencies:
```bash
composer install
npm install
npm run build
```

3. Configure your environment:
```bash
copy .env.example .env
php artisan key:generate
```

4. Prepare the database (using SQLite for local development):
```bash
# Create the local SQLite file (Windows PowerShell)
New-Item -ItemType File -Force -Path database\database.sqlite

# Run the migrations and seed dummy data
php artisan migrate --seed
```

### Running the App

Open **two** terminal windows to run the backend and frontend servers simultaneously:

**Terminal 1 (Backend):**
```bash
php artisan serve
```

**Terminal 2 (Frontend):**
```bash
npm run dev
```

The application will be available at: **http://localhost:8000**

## 🧠 Tech Stack & Architecture

- **Backend Framework**: Laravel 12.x
- **Frontend Stack**: Laravel Blade, Tailwind CSS 4, Alpine.js 3, SortableJS (for Kanban)
- **Database Engine**: MySQL (Production) / SQLite (Local)
- **Asset Bundler**: Vite
- **Architecture Pattern**: MVC paired with specialized Domain Services (`DealService`, `InvoicePdfService`) and Observers.

## 📂 Project Structure

```text
Leadix-App/
├── app/
│   ├── Http/Controllers/     # Route logic and orchestration
│   ├── Models/               # Eloquent Models & Relationships
│   ├── Observers/            # Automated business logic (e.g. Deal to Invoice conversion)
│   └── Services/             # Complex business logic separation
├── database/
│   ├── migrations/           # Database schema definitions
│   └── seeders/              # Dummy data population
├── resources/
│   ├── css/                  # Tailwind configuration
│   └── views/                # Blade UI Templates & Layouts
├── routes/                   # Web routes and API endpoints
└── README.md                 # Project documentation
```

## 📝 License

This project is open-source and available under the [MIT License](LICENSE).

**Developed by Ali Harti**
