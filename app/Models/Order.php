<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'date',
        'total',
        'name',
        'email',
        'phone',
        'payment_method',
        'delivery_method',
        'delivery_adress',
        'state',
        'customer_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
