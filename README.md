# Product Catalog API

This is a simple Laravel API for managing and sorting a product catalog.

## Setup

1.  **Clone the repository:**
    `git clone git@github.com:WisdomOkechukwu/backend-assesment.git
cd backend-assesment`
2.  **Install dependencies:**
    `composer install
    cp .env.example .env
    php artisan key:generate
`

3.  **Setup the database:**
    `    php artisan migrate
php artisan db:seed --class=ProductsTableSeeder`

4.  **Start the server:**
    `php artisan serve`

5.  **Test the Data:**
    `  http://localhost:8000/products`
