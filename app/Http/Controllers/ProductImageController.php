<?php

namespace App\Http\Controllers;

use App\Models\ProductImage;
use App\Models\Product;
use App\Http\Requests\StoreProductImageRequest;
use App\Http\Requests\UpdateProductImageRequest;
use Illuminate\Support\Facades\File;

class ProductImageController extends Controller
{


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('productImage.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductImageRequest $request)
    {
        //dd($request);
        $ProductImage = ProductImage::create([
            'image' => $request->image,

        ]);

        $ProductImage->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductImage $productImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductImage $productsImage)
    {
        return view('productImage.edit', compact('productsImage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductImageRequest $request, ProductImage $productsImage)
    {
        //dd($productsImage);
        File::delete('storage/images/uploads/products/' . $productsImage->image);

        $file = $request->file('image');
        $name = time() . '_' . $file->getClientOriginalName();
        //dd($name);

        $file->move('storage/images/uploads/products/', $name);
        //$images[] = $name;

        $productsImage->update([
            'image' => $name,
        ]);




        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductImage $productsImage)
    {
        File::delete('storage/images/uploads/products/' . $productsImage->image);

        $productsImage->delete();

        return back();
    }
}
