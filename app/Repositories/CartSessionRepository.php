<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\CartInterfaceRepository;

class CartSessionRepository implements CartInterfaceRepository
{
    /**
     * add a product to cart.
     */
    public function add(Product $product, $quantity)
    {
        $cart = session()->get('cart');

        $product_details = [
            'name' => $product->name,
            'quantity' => $quantity,
            'unitPrice' => $product->price,
        ];

        $cart[$product->id] = $product_details;

        session()->put('cart', $cart);
    }

    /**
     * add a product to cart.
     */
    public function remove(Product $product)
    {
        $cart = session()->get('cart');

        unset($cart[$product->id]);

        session()->put('cart', $cart);
    }

    /**
     * show the cart
     */
    public function show()
    {
        return view('home.cart');
    }

    /**
     * empty the cart
     */
    public function empty()
    {
        session()->forget('cart');
    }
}
