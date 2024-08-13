<?php

namespace App\Http\Controllers;

use App\Models\Adress;
use App\Http\Requests\StoreAdressRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateAdressRequest;
use Filament\Notifications\Notification;


class AdressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adresses = Adress::all()->where('user_id', Auth::user()->id);

        return View('adresses.index', compact('adresses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adresses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdressRequest $request)
    {
        $adress = Adress::create([
            'adress' => $request->adress,
            'city' => $request->city,
            'state' => $request->state,
            'user_id' => Auth::user()->id,
        ]);

        $adress->save();

        Notification::make()
            ->title('Adresse ajoutée avec succès')
            ->success()
            ->send();

        return redirect(route('adresses.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Adress $adress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Adress $adress)
    {
        return view('adresses.edit', compact('adress'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdressRequest $request, Adress $adress)
    {
        $adress->update([
            'adress' => $request->adress,
            'city' => $request->city,
            'state' => $request->state,
        ]);

        Notification::make()
            ->title('Adresse Modifié avec succès')
            ->success()
            ->send();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Adress $adress)
    {
        $adress->delete();

        Notification::make()
            ->title('Adresse supprimé avec succès')
            ->success()
            ->send();
        return redirect(route('adresses.index'));
    }
}
