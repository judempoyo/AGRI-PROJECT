<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Deposit;
use App\Models\Categorie;
use App\Models\SellUnit;
use App\Models\ProductImage;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->paginate(8);
        $deposits = Deposit::all();
        $categories = Categorie::all();
        $sellUnits = SellUnit::all();
        $images = ProductImage::all();

        return view('welcome', compact('products', 'deposits', 'categories', 'sellUnits', 'images'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function add_to_cart(Request $request)
    {

        /* if ($request->session()->has('panier')) {
            //$request->session()->forget('panier');
        } else {
            $request->session()->put('panier', []);

            $request->session()->push('panier', [
                'product_id' => 1,
                'quantity' => 2,
                'unit_price' => 1500,
                'subTotal' => (int)'unit_price' * (int)'quantity'
            ]);
        } */
    }

    public function show_product_by_category($id_cat)
    {
        if ($id_cat != 0)
            $products = Product::all()->where('category_id', $id_cat);




        $deposits = Deposit::all();
        $categories = Categorie::all();
        $sellUnits = SellUnit::all();
        $images = ProductImage::all();

        return view('welcome', compact('products', 'deposits', 'categories', 'sellUnits', 'images'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function show_product()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
