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



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */



    public function __construct(){

    }
    public function index() : View
    {
        $products = Product::latest()->paginate(5)->where('user_id', Auth::user()->id);
        $deposits = Deposit::all()->where('user_id', Auth::user()->id);
        $categories = Categorie::all();
        $sellUnits = SellUnit::all();

        return view('product.index', compact('products','deposits','categories','sellUnits'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $deposits = Deposit::all()->where('user_id', Auth::user()->id);
        $categories = Categorie::all();
        $sellUnits = SellUnit::all();

        return view('product.create',  compact('deposits','categories','sellUnits'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {

        //$images = array();
        //dd($request);
        /* $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string', 'max:200'],
            'price' => ['required', 'decimal:2'],
            'quantity' => ['required', 'int'],
            'deposit_id' => ['required', 'iint'],
            'category_id' => ['required', 'int'],
            'sell_unit_id' => ['required', 'int'],
            'user_id' => ['required']
        ]); */

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'deposit_id' => $request->deposit_id,
            'category_id' => $request->category_id,
            'sell_unit_id' => $request->sell_unit_id,
            'user_id' => $request->user_id,
            
        ]);

        $product->save();

        if($files = $request->file('images')) {
            foreach ($files as $file) {
                $name = time().'_'.$file->getClientOriginalName();
                $file->move('storage/images/uploads/products/', $name);
                //$images[] = $name;

                ProductImage::create([
                    'image' => $name,
                    'product_id' => $product->id,
                ]);
                

            }
        }

        //dd($images);

        

        //dd($deposit);
        //dd(Auth::user());
        //Deposit::save()



        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product) : View
    {
        $product_id = $product->id;
        $images = ProductImage::all()->where('product_id',$product_id);
        $deposits = Deposit::all()->where('user_id', Auth::user()->id);
        $categories = Categorie::all();
        $sellUnits = SellUnit::all();
        return view('product.show', compact('product', 'images','categories','deposits','sellUnits'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product) : View
    {
        $deposits = Deposit::all()->where('user_id', Auth::user()->id);
        $categories = Categorie::all();
        $sellUnits = SellUnit::all();

        return view('product.edit', compact('product', 'deposits','categories','sellUnits'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {

        //dd($request);
        /* $request->validate([
            'name' => ['string', 'max:50'],
            'description' => ['string', 'max:200'],
            'price' => ['decimal:2'],
            'quantity' => ['int'],
            'deposit_id' => ['int'],
            'category_id' => ['int'],
            'sell_unit_id' => ['int'],
        ]); */

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'deposit_id' => $request->deposit_id,
            'category_id' => $request->category_id,
            'sell_unit_id' => $request->sell_unit_id,
        ]);

        return redirect(route('products.index'));


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect(route('products.index'));
    }
}
