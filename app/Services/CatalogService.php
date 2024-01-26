<?php

namespace App\Services;

class CatalogService
{
    public function getSortedProducts($products, ProductSortingService $productSortingService)
    {
        return $productSortingService->sortProduct($products);
    }
}
