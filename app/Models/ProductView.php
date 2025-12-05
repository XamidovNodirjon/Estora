<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductView extends Model
{
    protected $fillable = [
        'manager_id',
        'product_id',
    ];

    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
