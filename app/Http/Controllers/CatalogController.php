<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\CatalogService;
use App\Services\PriceSortingService;
use App\Services\SalesPerViewSortingService;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function sortProduct(CatalogService $catalogService)
    {
        $products = Product::all();

        //PRICING SORTING
        $priceSortingService = new PriceSortingService();
        $sortByPrice = $catalogService->getSortedProducts($products, $priceSortingService);

        //SALES PER VIEW SORTING
        $salesPerViewSortingService = new SalesPerViewSortingService();
        $sortBySalesPerView = $catalogService->getSortedProducts($products, $salesPerViewSortingService);

        echo "Products sorted by price:\n";
        $this->printProducts($sortByPrice);

        echo "\nProducts sorted by sales per view:\n";
        $this->printProducts($sortBySalesPerView);
    }

    public function sortProductWithoutMigration(CatalogService $catalogService)
    {
        $products = collect([
            new Product([
                'id' => 1,
                'name' => 'Alabaster Table',
                'price' => 12.99,
                'created_at' => '2019-01-04',
                'sales_count' => 32,
                'views_count' => 730,
            ]),
            new Product([
                'id' => 2,
                'name' => 'Zebra Table',
                'price' => 44.49,
                'created_at' => '2012-01-04',
                'sales_count' => 301,
                'views_count' => 3279,
            ]),
            new Product([
                'id' => 3,
                'name' => 'Coffee Table',
                'price' => 10.00,
                'created_at' => '2014-05-28',
                'sales_count' => 1048,
                'views_count' => 20123,
            ]),
        ]);

        //PRICING SORTING
        $priceSortingService = new PriceSortingService();
        $sortByPrice = $catalogService->getSortedProducts($products, $priceSortingService);

        //SALES PER VIEW SORTING
        $salesPerViewSortingService = new SalesPerViewSortingService();
        $sortBySalesPerView = $catalogService->getSortedProducts($products, $salesPerViewSortingService);

        echo "Products sorted by price:\n";
        $this->printProducts($sortByPrice);

        echo "\nProducts sorted by sales per view:\n";
        $this->printProducts($sortBySalesPerView);
        // dd($sortByPrice, $sortBySalesPerView);
    }

    public function printProducts($products)
    {
        foreach ($products as $product) {
            echo "<pre> {$product->name} - Price: {$product->price}, Sales/View Ratio: " . ($product->sales_count / $product->views_count) . "</pre>\n";
        }
    }
}
