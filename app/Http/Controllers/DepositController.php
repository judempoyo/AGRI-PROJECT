<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Http\Requests\StoreDepositRequest;
use App\Http\Requests\UpdateDepositRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\File;
use Filament\Notifications\Notification;



class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $deposits = Deposit::latest()->paginate(5)->where('user_id', Auth::user()->id);

        return view('deposit.index', compact('deposits'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('deposit.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(StoreDepositRequest $request): RedirectResponse
    {
        $file = $request->file('image');
        $name = time() . '_' . $file->getClientOriginalName();
        //dd($name);

        $file->move('storage/images/uploads/deposits/', $name);

        $deposit = Deposit::create([
            'name' => $request->name,
            'adress' => $request->adress,
            'country' => $request->country,
            'description' => $request->description,
            'area' => $request->area,
            'image' => $name,
            'maxCapacity' => $request->maxCapacity,
            'user_id' => $request->user_id,
        ]);

        $deposit->save();

        Notification::make()
            ->title('Dépot crée avec succès')
            ->success()
            ->send();
        return redirect(route('deposits.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Deposit $deposit)
    {
        return view('deposit.show', compact('deposit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Deposit $deposit)
    {
        return view('deposit.edit', compact('deposit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepositRequest $request, Deposit $deposit)
    {
        File::delete('storage/images/uploads/deposits/' . $deposit->image);
        $file = $request->image;

        $name = time() . '_' . $file->getClientOriginalName();

        $file->move('storage/images/uploads/deposits/', $name);

        $deposit->update([
            'name' => $request->name,
            'adress' => $request->adress,
            'country' => $request->country,
            'description' => $request->description,
            'area' => $request->area,
            'image' => $name,
            'maxCapacity' => $request->maxCapacity,
        ]);

        Notification::make()
            ->title('Dépot Modifié avec succès')
            ->success()
            ->send();

        return redirect(route('deposits.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deposit $deposit)
    {
        $deposit->delete();

        Notification::make()
            ->title('Dépot supprimé avec succès')
            ->success()
            ->send();

        return redirect(route('deposits.index'));
    }
}
