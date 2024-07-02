<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'adress',
        'country',
        'area',
        'maxCapacity',
    ];

    public function grower()
    {
        return $this->belongsTo(Grower::class);
    }

}
