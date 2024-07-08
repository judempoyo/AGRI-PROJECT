<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Http\Requests\StoreDepositRequest;
use App\Http\Requests\UpdateDepositRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deposits = Deposit::latest()->paginate(5)->where('user_id', Auth::user()->id);

        return view('grower.deposit.index', compact('deposites'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('grower');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(StoreDepositRequest $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:50', 'unique:' . Deposit::class],
            'adresse' => ['required', 'string', 'max:200'],
            'country' => ['required', 'string', 'max:100'],
            'area' => ['required', 'string', 'max:20'],
            'maxCapacity' => ['required', 'int'],
        ]);

        $deposit = Deposit::create([
            'name' => $request->name,
            'adresse' => $request->adresse,
            'country' => $request->country,
            'area' => $request->area,
            'maxCapacity' => $request->maxCapacity,
        ]);

        return redirect(route('dashboard', absolute: false));
    }

    /**
     * Display the specified resource.
     */
    public function show(Deposit $deposit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Deposit $deposit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepositRequest $request, Deposit $deposit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deposit $deposit)
    {
        //
    }
}
