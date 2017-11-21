<?php

namespace App\Observers;

use App\Product;
use Illuminate\Support\Facades\Cache;

class ProductObserver
{

    /**
     * @param Product $product
     */
    public function saved(Product $product)
    {
        Cache::flush();
    }
}