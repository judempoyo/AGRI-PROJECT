<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Product;
use app\Repositories\CartInterfaceRepository;

class CartController extends Controller
{

    /**
     * add a product to cart.
     */
    public function add(Product $product, Request $request)
    {
        $cart = session()->get('cart');

        $request->validate([
            'quantity' => 'numeric|min:1',
        ]);

        $product_details = [
            'id' => $product->id,
            'name' => $product->name,
            'quantity' => $request->quantity,
            'unitPrice' => $product->price,
        ];

        $cart[$product->id] = $product_details;

        session()->put('cart', $cart);

        return redirect()->back();
    }

    /**
     * add a product to cart.
     */
    public function remove($product)
    {
        $cart = session()->get('cart');

        unset($cart[$product]);

        session()->put('cart', $cart);

        return redirect()->back();
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

        return redirect()->back();
    }

    /* protected $cartReposirtory;

    // /**
    // Create a new class instance.
    //
    public function __construct(CartInterfaceRepository $cartRepotitory)
    {
        $this->cartReposirtory = $cartRepotitory;
    }


    // /**
    // add a product to cart.
    //
    public function add(Product $product, Request $request)
    {
        $request->validate([
            'quantity' => 'numeric|min:1',
        ]);

        $this->cartReposirtory->add($product, $request->quantity);
    }

    // /**
    // add a product to cart.
    //
    public function remove(Product $product)
    {
        $this->cartReposirtory->remove($product);
    }

    // /**
    // show the cart
    //
    public function show()
    {
        return view('home.cart');
    }

    // /**
    // empty the cart
    //
    public function empty()
    {
        $this->cartReposirtory->empty();
    } */
}
