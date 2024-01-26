<?php

namespace App\Services;

class PriceSortingService implements ProductSortingService
{
    function sortProduct($products)
    {
        return $products->sortByDesc('price');
    }
}
