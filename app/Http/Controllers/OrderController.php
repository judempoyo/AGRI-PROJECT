<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Filament\Notifications\Notification;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all()->where('customer_id', Auth::user()->id);

        return view('order.index', compact('orders'))->with('i', (request()->input('page', 1) - 1) * 5);
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
    public function store(StoreOrderRequest $request)
    {

        //dd($request);
        $order = Order::insertGetId([
            'date' => today(),
            'total' => $request->total,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'payment_method' => $request->payment_method,
            'delivery_method' => $request->delivery_method,
            'delivery_adress' => $request->delivery_adress . '/' . $request->city . '/' . $request->state,
            'customer_id' => Auth::user()->id,

        ]);

        //$order->save();



        if (session()->has('cart') && session('cart') != []) {
            foreach (session('cart') as $key => $value) {
                //dd($order);
                OrderDetail::create([


                    'quantity' => $value['quantity'],
                    'unitPrice' => $value['unitPrice'],
                    'subTotal' => $value['quantity'] * $value['unitPrice'],
                    'product_id' => $value['id'],
                    'order_id' => $order,
                ]);

                $product = Product::FindOrFail($value['id']);

                $product->Quantity -= $value['quantity'];
                $product->save();


                //$orderDetail->save();
            }
        }


        Notification::make()
            ->title('Commande passée avec succès')
            ->success()
            ->send();
        return redirect(route('cart.empty'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
