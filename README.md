# PropInsight - Holistic Real Estate Analytics Ecosystem

Welcome to the **PropInsight** project workspace. This repository contains a multi-tiered real estate platform, encompassing a high-fidelity frontend prototype and a fully functional data-driven Laravel backend.

## 📂 Project Structure

This workspace is organized into two primary modules:

### 1. [webteach_backend](./webteach_backend) (Core Analytics Engine)
The primary intelligence of the platform. A **Laravel 11** application that manages the database, calculates investment metrics, and renders dynamic property inventory.
*   **Key Features**: Mortgage Calculator, Property Comparison Matrix, Search Engine, and Location Trends.
*   **Tech**: Laravel, Eloquent ORM, MySQL, Blade, Bootstrap.

### 2. [webteach_labmid](./webteach_labmid) (Frontend Prototype)
The initial architectural design and UI/UX mockup of the PropInsight platform.
*   **Key Features**: Static HTML/CSS layouts for Property Analysis, Listings, and Map visualization.
*   **Tech**: Vanilla HTML5, CSS3, JavaScript, FontAwesome.

---

## 🚀 Quick Start Guide

### Step 1: Local Environment Setup
Ensure you have **XAMPP** or **Laragon** running with:
*   **Apache** (Port 80)
*   **MySQL** (Port 3306)
*   **PHP 8.2+**

### Step 2: Backend Configuration
Navigate to the backend directory and set up the Laravel application:
```bash
cd webteach_backend
composer install
cp .env.example .env
php artisan key:generate
```

### Step 3: Database Initialization
1.  Create a database named `webteach_labmid` in phpMyAdmin.
2.  Import the seed data or run migrations:
```bash
php artisan migrate --seed
```

### Step 4: Accessing the Project
*   **Dynamic Platform**: `http://localhost/webteach_backend/public`
*   **Static Prototype**: `http://localhost/webteach_labmid/index.html`

---

## 📈 System Documentation
For detailed technical analysis and code implementation details, refer to the following reports:
*   [**Full Project Analysis (Markdown)**](./webteach_backend/PROJECT_ANALYSIS_REPORT.md)
*   [**Technical Code Snippets**](./webteach_backend/documentation/CODE_SNIPPETS.md)
*   [**Installation Guide**](./webteach_backend/README.md)

## 🛠️ Core Functionality Overview

### 🔍 Real Estate Search
A multi-parameter search engine that allows users to filter by City, Property Type, and Price Range with built-in validation to ensure maximum price exceeds minimum price.

### 📊 Investment Matrix
A session-persistent comparison tool that allows for side-by-side technical evaluation of up to three properties, including Rental Yield and ROI projections.

### 🧮 Mortgage Estimator
A Pakistan-centric financial tool calibrated for current KIBOR rates, supporting loan tenures up to 25 years with detailed amortization breakdowns.

---
© 2026 PropInsight™ Ecosystem | Developed for Web Technologies Lab Evaluation.
