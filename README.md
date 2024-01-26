# Product Catalog API

This is a simple Laravel API for managing and sorting a product catalog.

## Setup

1.  **Clone the repository:**
    `bash
git clone git@github.com:WisdomOkechukwu/backend-assesment.git
cd backend-assesment
`
2.  **Install dependencies:**
    `bash
composer install
`

             `bash

        cp .env.example .env
        php artisan key:generate
        `

3.  **Setup the database:**
    `bash
php artisan migrate
php artisan db:seed --class=ProductsTableSeeder
`

4.  **Start the server:**
    `bash
php artisan serve
`

5.  **Test the Data:**
    `bash
   http://localhost:8000/products
`
