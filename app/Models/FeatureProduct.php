<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeatureProduct extends Model
{
    protected $table = 'product_feature_product';

    protected $fillable = [
        'product_id',
        'product_feature_id'
    ];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function feature()
    {
        return $this->belongsTo(ProductFeatures::class, 'product_feature_id');
    }
}
