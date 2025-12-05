<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReservationProduct extends Model
{
    protected $table = 'reservation_products';
    protected $fillable = [
        'user_id',
        'product_id',
        'phone',
        'quantity'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
