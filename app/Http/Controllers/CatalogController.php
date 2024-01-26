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
        // dd($sortByPrice, $sortBySalesPerView);
    }

    public function printProducts($products)
    {
        foreach ($products as $product) {
            echo "<pre> {$product->name} - Price: {$product->price}, Sales/View Ratio: " . ($product->sales_count / $product->views_count) . "</pre>\n";
        }
    }
}
