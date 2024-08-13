<?php

namespace App\Http\Controllers;

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
use Filament\Notifications\Notification;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */



    public function __construct()
    {
    }
    public function index(): View
    {
        $products = Product::all()->where('user_id', Auth::user()->id);
        $deposits = Deposit::all()->where('user_id', Auth::user()->id);
        $categories = Categorie::all();
        $sellUnits = SellUnit::all();

        return view('product.index', compact('products', 'deposits', 'categories', 'sellUnits'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $deposits = Deposit::all()->where('user_id', Auth::user()->id);
        $categories = Categorie::all();
        $sellUnits = SellUnit::all();

        return view('product.create',  compact('deposits', 'categories', 'sellUnits'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'deposit_id' => $request->deposit_id,
            'categorie_id' => $request->categorie_id,
            'sell_unit_id' => $request->sell_unit_id,
            'user_id' => $request->user_id,

        ]);

        $product->save();

        if ($files = $request->file('images')) {
            foreach ($files as $file) {
                $name = time() . '_' . $file->getClientOriginalName();
                $file->move('storage/images/uploads/products/', $name);
                //$images[] = $name;

                ProductImage::create([
                    'image' => $name,
                    'product_id' => $product->id,
                ]);
            }
        }

        Notification::make()
            ->title('Produit créer avec succès')
            ->success()
            ->send();

        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product): View
    {
        $product_id = $product->id;
        $images = ProductImage::all()->where('product_id', $product_id);
        $deposits = Deposit::all()->where('user_id', Auth::user()->id);
        $categories = Categorie::all();
        $sellUnits = SellUnit::all();
        return view('product.show', compact('product', 'images', 'categories', 'deposits', 'sellUnits'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): View
    {
        $deposits = Deposit::all()->where('user_id', Auth::user()->id);
        $categories = Categorie::all();
        $sellUnits = SellUnit::all();

        return view('product.edit', compact('product', 'deposits', 'categories', 'sellUnits'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'deposit_id' => $request->deposit_id,
            'categorie_id' => $request->categorie_id,
            'sell_unit_id' => $request->sell_unit_id,
        ]);

        Notification::make()
            ->title('Produit Modifié avec succès')
            ->success()
            ->send();

        return redirect(route('products.index'));
        /* ->with('success', 'Produit modifié avec succès.'); */
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        Notification::make()
            ->title('Produit supprimé avec succès')
            ->success()
            ->send();
        return redirect(route('products.index'));
    }
}
