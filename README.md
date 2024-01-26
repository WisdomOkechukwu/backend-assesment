# Product Catalog API

Welcome to the Product Catalog API, a simple Laravel application for managing and sorting product catalogs.

## Getting Started

### Prerequisites

-   [Composer](https://getcomposer.org/) installed
-   [PHP](https://www.php.net/) installed
-   [Laravel](https://laravel.com/) installed

### Installation

## Setup A(Without DB) - Dummy Data

1.  **Clone the repository:**
    ```bash
    git clone git@github.com:WisdomOkechukwu/backend-assessment.git
    cd backend-assessment
    ```
2.  **Install dependencies:**

    ```bash
    composer install
    cp .env.example .env
    php artisan key:generate
    ```

3.  **Start the server:**
    `bash php artisan serve `

4.  **Test the Data:**
    `bash  http://localhost:8000/products/no-migration`

## Setup B(With DB)

1.  **Clone the repository:**
    ```bash
    git clone git@github.com:WisdomOkechukwu/backend-assessment.git
    cd backend-assessment
    ```
2.  **Install dependencies:**

    ```bash
    composer install
    cp .env.example .env
    php artisan key:generate
    ```

3.  **Setup the database:**

    ```bash
    php artisan migrate
    php artisan db:seed --class=ProductsTableSeeder
    ```

4.  **Start the server:**
    `bash php artisan serve `

5.  **Test the Data:**
    `bash  http://localhost:8000/products`
