<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductFeatures extends Model
{
    protected $table = 'product_features';
    protected $fillable = ['feature_name'];

    public function products()
    {
        return $this->belongsToMany(
            Product::class,
            'product_feature_product',
            'product_feature_id',
            'product_id'
        );
    }
}
