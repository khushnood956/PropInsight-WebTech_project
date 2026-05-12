# PROJECT ANALYSIS REPORT: PropInsight - Real Estate Analytics Platform

## 1. System Architecture Overview
PropInsight is built on the **Laravel 11** PHP framework, following the **Model-View-Controller (MVC)** architectural pattern. The system is designed for high maintainability, separating business logic (Controllers), data structure (Models), and the user interface (Blade Templates).

*   **Backend**: PHP 8.2+ with Laravel.
*   **Database**: MySQL/MariaDB utilizing Eloquent ORM for relationship management.
*   **Frontend**: Blade Templating Engine, Bootstrap 5.3, and Custom CSS3.
*   **Workflow**: Request → Routing → Middleware (CSRF) → Controller → Model → View.

---

## 2. Backend Workflow & Routing
The application uses a centralized routing structure (`routes/web.php`) that maps HTTP requests to specific controller methods.

| Controller | Responsibility |
| :--- | :--- |
| **HomeController** | Manages the landing page and featured property retrieval. |
| **PropertyController** | Handles inventory listings, search/filtering, and property details. |
| **CalculatorController** | Processes mortgage and ROI calculations using financial formulas. |
| **CompareController** | Manages user-selected property comparisons using Laravel Sessions. |
| **PageController** | Handles auxiliary pages like the Interactive Location Map. |

---

## 3. Database Design & Models
The data layer is normalized into several key tables managed via **Eloquent Relationships**:

### 3.1 Core Models
*   **City**: One-to-Many relationship with Properties. Stores names and slugs.
*   **PropertyType**: One-to-Many relationship with Properties (e.g., Residential, Commercial).
*   **Property**: The central entity containing price, area, and bedroom/bathroom attributes.
    *   `belongsTo(City)`
    *   `belongsTo(PropertyType)`

### 3.2 Schema Management
*   **Migrations**: Version-controlled schema management with foreign key constraints.
*   **Seeding**: Automated population of market data via `seed_data.php`.

---

## 4. Feature Modules

### 4.1 Dynamic Property Inventory
*   **Logic**: Implements a robust query builder that handles Search keywords, City slugs, Type slugs, and Price Range (Min/Max).
*   **Performance**: Uses Eloquent's `with()` eager loading to prevent N+1 query issues.
*   **UX**: Integrated Laravel pagination for smooth navigation through large datasets.

### 4.2 Property Comparison Matrix
*   **Mechanism**: A 3-slot system stored in the **Laravel Session**.
*   **Selection**: Dynamic dropdowns populated directly from the database allow for precise side-by-side analysis.
*   **Persistence**: Selections persist across browser refreshes until explicitly cleared.

### 4.3 Investment Calculator
*   **Formula**: Implements a standard Mortgage/EMI formula.
*   **Localized Logic**: Configured for Pakistan-specific KIBOR rates and loan tenures (up to 25 years).
*   **ROI Analysis**: Projects annual rental yield and 5-year appreciation.

### 4.4 Image Fallback System
*   **Fallback Strategy**: Checks for custom images; defaults to a deterministic rotation of verified placeholders (`p1.jpg`, `p2.jpg`, etc.) based on the Property ID.

---

## 5. Frontend & Blade Layout System
The project implements a **DRY (Don't Repeat Yourself)** approach using a Master Layout.

*   **Master Layout**: `layouts/app.blade.php` (Global Navbar, Ticker, Footer).
*   **Active Navigation**: Uses `Route::is()` to dynamically highlight the current menu item.
*   **Inheritance**: Child views utilize `@extends` and `@section` to inject page-specific content.

---

## 6. Validation & Security

### 6.1 Validation Rules
*   **Price Range**: `max_price` must be `gt:min_price` (validated server-side).
*   **Calculator**: Strict numeric constraints and range limits (Tenure: 1-25 years).
*   **Lead Gen**: Mandatory fields with email format verification.

### 6.2 Security Measures
*   **CSRF Protection**: All POST requests are protected via the `@csrf` directive.
*   **SQL Injection**: Prevented through Eloquent's built-in parameter binding.
*   **XSS Protection**: Blade's `{{ }}` syntax automatically escapes malicious output.

---

## 7. Refactoring & Optimization
The project underwent a significant stabilization phase to reach production standards:
*   **Code Consolidation**: Merged 6+ duplicate HTML structures into a single Layout file.
*   **Architectural Cleanup**: Moved all logic from Route closures into dedicated Controllers.
*   **Data Liquidation**: Replaced 100% of static/hardcoded values with dynamic Eloquent bindings.

---

## 8. Roadmap & Improvements
*   **User Auth**: Implement Login/Register for saved property lists.
*   **Live Data**: Connect the Market Ticker to a real-time financial API.
*   **Admin Panel**: Create a CRUD interface for property management.

---

## 9. Conclusion
PropInsight is a robust, data-driven application demonstrating professional Laravel implementation. By combining strict validation, efficient relationships, and a component-based frontend, the platform provides a scalable solution for real estate analytics in the Pakistani market.

---
*© 2026 PropInsight Technical Documentation | Project Midterm Submission*
