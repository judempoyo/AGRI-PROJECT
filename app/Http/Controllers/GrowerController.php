<?php

namespace App\Http\Controllers;

use App\Models\Grower;
use App\Http\Requests\StoreGrowerRequest;
use App\Http\Requests\UpdateGrowerRequest;


use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Spatie\Permission\Models\Role;


class GrowerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreGrowerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Grower $grower)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grower $grower)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGrowerRequest $request, Grower $grower)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grower $grower)
    {
        //
    }
}
