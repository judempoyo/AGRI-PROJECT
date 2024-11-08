<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'sell_unit_id',
        'deposit_id',
        'categorie_id',
        'user_id',
    ];

    public function SellUnit()
    {
        return $this->belongsTo(SellUnit::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function deposit()
    {
        return $this->belongsTo(Deposit::class);
    }

    public function productImage()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function orderdetail()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
