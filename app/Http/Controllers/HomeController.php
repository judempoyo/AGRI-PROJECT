<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Deposit;
use App\Models\Categorie;
use App\Models\SellUnit;
use App\Models\ProductImage;
use App\Models\Order;
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

        return View('welcome', compact('products', 'deposits', 'categories', 'sellUnits', 'images'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function checkout()
    {
        return View('home.checkout');
    }

    public function show_deposits()
    {
        $deposits = Deposit::all();
        return View('home.show_deposits', compact('deposits'));
    }
    public function today_deals()
    {

        $orders = Order::all()->where('customer_id', Auth::user()->id)
            ->where('date', today());

        return view('home.today_deals', compact('orders'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function show_product_by_category($id_cat)
    {
        if ($id_cat != 0)
            $products = Product::all()->where('categorie_id', $id_cat);

        $deposits = Deposit::all();
        $categories = Categorie::all();
        $sellUnits = SellUnit::all();
        $images = ProductImage::all();

        return View('welcome', compact('products', 'deposits', 'categories', 'sellUnits', 'images'))->with('i', (request()->input('page', 1) - 1) * 5);
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
