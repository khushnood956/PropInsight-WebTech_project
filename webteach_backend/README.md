# PropInsight - Real Estate Analytics Platform

PropInsight is a data-driven real estate analytics application built with Laravel. It provides users with deep insights into the Pakistani property market through dynamic listings, investment calculators, side-by-side property comparisons, and location-based trend analysis.

## 🚀 Features

*   **Dynamic Property Inventory**: Browse verified real estate listings with advanced filtering by city, property type, and price range.
*   **Property Comparison Matrix**: Select up to three properties from a dynamic dropdown system for a side-by-side technical and financial analysis.
*   **Investment Calculator**: Calculate mortgage payments (EMI), ROI projections, and break-even periods tailored to Pakistan's banking guidelines (KIBOR).
*   **Location Analytics**: Interactive map-based view to visualize hotspot zones and emerging property trends.
*   **Search Engine**: Global search functionality to find properties by keyword and location across the entire platform.
*   **Automated Data Binding**: Fully dynamic backend using Eloquent ORM, ensuring all UI elements reflect real-time database state.

## 🛠️ Technology Stack

*   **Backend**: Laravel 11.x
*   **Frontend**: Blade Templating, Bootstrap 5.3, FontAwesome 6
*   **Database**: MySQL / MariaDB
*   **Design**: Inter Font Family, Custom CSS3 for modern animations and card hover effects.

## 📦 Installation Guide

### Prerequisites
*   XAMPP / Laragon (PHP 8.2+, MySQL)
*   Composer

### Setup Steps

1.  **Clone the Repository**
    ```bash
    git clone <repository-url>
    cd webteach_backend
    ```

2.  **Install Dependencies**
    ```bash
    composer install
    ```

3.  **Environment Configuration**
    *   Rename `.env.example` to `.env`.
    *   Configure your database credentials:
    ```env
    DB_DATABASE=webteach_labmid
    DB_USERNAME=root
    DB_PASSWORD=
    ```

4.  **Database Migration & Seeding**
    ```bash
    php artisan migrate
    # To populate cities, types, and sample properties:
    php artisan db:seed 
    # OR run the custom seed file if available:
    php seed_data.php
    ```

5.  **Generate Application Key**
    ```bash
    php artisan key:generate
    ```

6.  **Run the Application**
    ```bash
    # Via XAMPP: Access via http://localhost/htdocs/webteach_backend/public
    # OR via Artisan:
    php artisan serve
    ```

## 📂 Project Structure

*   `app/Http/Controllers`: Contains logic for Home, Properties, Comparisons, and Calculators.
*   `resources/views/layouts`: Shared `app.blade.php` master layout for UI consistency.
*   `resources/views/pages`: Individual page templates (Index, Listings, Property Details, etc.).
*   `public/css/style.css`: Custom branding and property card enhancement styles.

## 🤝 Contribution

This project was developed as part of a Web Technologies lab midterm evaluation. It adheres to clean code standards and Laravel best practices.

---
© 2026 PropInsight™ | All Rights Reserved.