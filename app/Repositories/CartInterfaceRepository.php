<?php

namespace App\Repositories;

use App\Models\Product;

interface CartInterfaceRepository
{
    /**
     * add a product to cart.
     */
    public function add(Product $product, $quantity);

    /**
     * add a product to cart.
     */
    public function remove(Product $product);
    /**
     * show the cart
     */
    public function show();

    /**
     * empty the cart
     */
    public function empty();
}
