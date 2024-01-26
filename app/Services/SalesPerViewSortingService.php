<?php

namespace App\Services;

class SalesPerViewSortingService implements ProductSortingService
{
    public function sortProduct($products)
    {
        return $products->sortByDesc(function ($product) {
            // $product->ratio = $product->sales_count / $product->views_count;
            return $product->sales_count / $product->views_count;
        });
    }
}
